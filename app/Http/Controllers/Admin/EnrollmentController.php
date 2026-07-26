<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
 
class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        // TODO: $enrollments = Enrollment::with('student','course','batch')->latest()->paginate(15);
        $enrollments = new LengthAwarePaginator([], 0, 15, 1, ['path' => $request->url()]);
 
        return view('admin.enrollments.index', [
            'enrollments'     => $enrollments,
            'totalEnrollments'=> 12847,
            'approvedCount'   => 11932,
            'pendingCount'    => 234,
            'rejectedCount'   => 81,
        ]);
    }
 
    public function create()
    {
        return view('admin.enrollments.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'student_id'    => 'required',
            'course_id'     => 'required',
            'batch_id'      => 'required',
            'enrolled_date' => 'required|date',
            'fees'          => 'required|numeric|min:0',
            'status'        => 'required|in:Approved,Pending',
        ]);
        // TODO: Enrollment::create($request->validated());
        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment created successfully.');
    }
 
    public function approve($id)
    {
        // TODO: Enrollment::findOrFail($id)->update(['status' => 'Approved']);
        return back()->with('success', 'Enrollment approved.');
    }
 
    public function reject($id)
    {
        // TODO: Enrollment::findOrFail($id)->update(['status' => 'Rejected']);
        return back()->with('success', 'Enrollment rejected.');
    }
 
    public function destroy($id)
    {
        // TODO: Enrollment::findOrFail($id)->delete();
        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment removed.');
    }
}