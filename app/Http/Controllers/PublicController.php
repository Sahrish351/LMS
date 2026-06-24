<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Certificate;
use App\Models\User;
 
class PublicController extends Controller
{
    public function home()
    {
        $featuredCourses = Course::with(['category', 'creator'])
            ->withCount(['enrollments' => fn($q) => $q->where('status', 'approved')])
            ->where('status', 'published')
            ->where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();
 
        $upcomingBatches = Batch::with(['course', 'teacher'])
            ->withCount(['enrollments' => fn($q) => $q->where('status', 'approved')])
            ->whereIn('status', ['upcoming', 'ongoing'])
            ->orderBy('start_date', 'asc')
            ->take(4)
            ->get();
 
        $totalStudents = User::whereHas('role', fn($q) => $q->where('name', 'student'))->count();
        $totalCourses  = Course::where('status', 'published')->count();
        $totalTeachers = User::whereHas('role', fn($q) => $q->where('name', 'teacher'))->count();
 
        $totalStudents = $totalStudents >= 1000 ? number_format($totalStudents / 1000, 0).'K+' : ($totalStudents > 0 ? $totalStudents.'+' : '10,000+');
        $totalCourses  = $totalCourses  > 0 ? $totalCourses.'+' : '50+';
        $totalTeachers = $totalTeachers > 0 ? $totalTeachers.'+' : '20+';
 
        $settings = [
            'whatsapp' => '923000000000',
            'phone'    => '+92-300-0000000',
            'email'    => 'info@auraacademy.com',
            'address'  => 'Lahore, Pakistan',
        ];
 
        return view('public.home', compact(
            'featuredCourses',
            'upcomingBatches',
            'totalStudents',
            'totalCourses',
            'totalTeachers',
            'settings'
        ));
    }
 
    public function courses(Request $request)
    {
        $query = Course::with(['category', 'creator'])
            ->withCount(['enrollments' => fn($q) => $q->where('status', 'approved')])
            ->where('status', 'published');
 
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }
        if ($request->filled('search')) {
            $query->where(fn($q) => $q->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('short_description', 'like', '%'.$request->search.'%'));
        }
 
        match ($request->sort ?? 'latest') {
            'price_low'  => $query->orderBy('price', 'asc'),
            'price_high' => $query->orderBy('price', 'desc'),
            'popular'    => $query->orderByDesc('enrollments_count'),
            default      => $query->latest(),
        };
 
        $courses    = $query->paginate(9)->withQueryString();
        $categories = \App\Models\Category::where('status', 'active')->get();
 
        return view('public.courses', compact('courses', 'categories'));
    }
 
    public function courseDetail($slug)
    {
        $course = Course::with([
            'category', 'creator', 'modules.lessons',
            'reviews' => fn($q) => $q->where('is_approved', true)->latest()->take(5),
            'reviews.student',
        ])
        ->withCount(['enrollments' => fn($q) => $q->where('status', 'approved')])
        ->where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();
 
        $availableBatches = Batch::with('teacher')
            ->where('course_id', $course->id)
            ->whereIn('status', ['upcoming', 'ongoing'])
            ->orderBy('start_date')
            ->get();
 
        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', 'published')
            ->take(3)
            ->get();
 
        return view('public.course-detail', compact('course', 'availableBatches', 'relatedCourses'));
    }
 
    public function about()
    {
        return view('public.about');
    }
 
    public function contact()
    {
        return view('public.contact');
    }
 
    public function contactSubmit(Request $request)
{
    $validated = $request->validate([
        'name'    => 'required|string|max:100',
        'email'   => 'required|email',
        'phone'   => 'nullable|string',
        'message' => 'required|string|min:10',
    ]);

   
    Mail::send([], [], function ($mail) use ($validated) {
        $mail->to('sahrish291103@gmail.com')
             ->subject('New Contact Form: ' . $validated['name'])
             ->replyTo($validated['email'], $validated['name'])
             ->html("
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> {$validated['name']}</p>
                <p><strong>Email:</strong> {$validated['email']}</p>
                <p><strong>Phone:</strong> {$validated['phone']}</p>
                <p><strong>Message:</strong> {$validated['message']}</p>
                <hr>
                <p><strong>📩 To reply:</strong> Click Reply and your response will go to {$validated['email']}</p>
             ");
    });

   
    Mail::send([], [], function ($mail) use ($validated) {
        $mail->to($validated['email'], $validated['name'])
             ->subject('Thank you for contacting Aura Academy! 🙏')
             ->html("
                <h2>Thank You for Contacting Us! 🙏</h2>
                <p>Dear {$validated['name']},</p>
                <p>Thank you for reaching out to Aura Academy. We have received your message and will get back to you within 24 hours.</p>
                <p><strong>Your Message:</strong></p>
                <p style='background:#f5f3ff;padding:15px;border-radius:8px;'>{$validated['message']}</p>
                <p>In the meantime, feel free to explore our courses at <a href='{{ url('/') }}'>Aura Academy</a></p>
                <br>
                <p>Best regards,</p>
                <p><strong>Aura Academy Team</strong></p>
                <hr>
                <p style='color:#9ca3af;font-size:12px;'>This is an automated confirmation. Please do not reply to this email.</p>
             ");
    });

    return redirect()->back()->with('contact_success', true);
}
 
    public function verifyCertificate(Request $request)
    {
        $code = $request->get('code');
        $verifiedCertificate = null;
        $notFound = false;
 
        if ($code) {
            $verifiedCertificate = Certificate::with(['student', 'course', 'batch'])
                ->where('certificate_number', strtoupper(trim($code)))
                ->where('is_verified', true)
                ->first();
 
            if (!$verifiedCertificate) {
                $notFound = true;
            }
        }
 
        return view('public.verify-certificate', compact('verifiedCertificate', 'notFound', 'code'));
    }
}
 