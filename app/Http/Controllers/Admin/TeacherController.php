<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TeacherController extends Controller
{
    /**
     * Display a listing of teachers with stats and pagination.
     */
    public function index(Request $request)
    {
        // ===== TODO: Replace with real Eloquent queries once Teacher model exists =====
        // $query = Teacher::withCount('courses', 'students')->withAvg('reviews', 'rating');
        //
        // if ($request->filled('search')) {
        //     $query->where('name', 'like', '%'.$request->search.'%');
        // }
        // if ($request->filled('specialization')) {
        //     $query->where('specialization', $request->specialization);
        // }
        // if ($request->filled('status')) {
        //     $query->where('status', $request->status);
        // }
        //
        // $teachers = $query->latest()->paginate(15)->withQueryString();
        //
        // $totalTeachers  = Teacher::count();
        // $activeTeachers = Teacher::where('status', 'Active')->count();
        // $avgRating      = round(Teacher::avg('rating'), 2);
        // $totalRevenue   = Teacher::sum('revenue');

        // ----- TEMPORARY: empty paginator so the Blade view's pagination
        // calls all work safely until the real Teacher model is wired up. -----
        $teachers = new LengthAwarePaginator(
            [],
            0,
            15,
            1,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admin.teachers.index', [
            'teachers'       => $teachers,
            'totalTeachers'  => 342,
            'activeTeachers' => 318,
            'avgRating'      => '4.76',
            'totalRevenue'   => '14.8L',
        ]);
    }

    /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created teacher in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|unique:teachers,email',
            'phone'            => 'nullable|string|max:20',
            'joined_date'      => 'nullable|date',
            'bio'              => 'nullable|string',
            'specialization'   => 'required|string',
            'experience'       => 'nullable|integer',
            'courses'          => 'nullable|array',
            'commission_rate'  => 'nullable|numeric|min:0|max:100',
            'status'           => 'nullable|in:Active,Inactive',
            'password'         => 'nullable|string|min:6',
            'photo'            => 'nullable|image|max:2048',
        ]);

        // TODO: Teacher::create($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher added successfully.');
    }

    /**
     * Display the specified teacher's profile.
     */
    public function show($id)
    {
        // TODO: $teacher = Teacher::with('courses', 'reviews')->findOrFail($id);
        $teacher = null;
        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified teacher.
     */
    public function edit($id)
    {
        // TODO: $teacher = Teacher::findOrFail($id);
        $teacher = null;
        return view('admin.teachers.create', compact('teacher'));
    }

    /**
     * Update the specified teacher in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email',
            'specialization' => 'required|string',
        ]);

        // TODO: Teacher::findOrFail($id)->update($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified teacher from storage.
     */
    public function destroy($id)
    {
        // TODO: Teacher::findOrFail($id)->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher removed successfully.');
    }
}
