<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
 
class AssignmentController extends Controller
{
    public function index(Request $request)
    {
        // TODO: $assignments = Assignment::with('course','module')->withCount('submissions')->latest()->paginate(15);
        $assignments = new LengthAwarePaginator([], 0, 15, 1, ['path' => $request->url()]);
 
        return view('admin.assignments.index', [
            'assignments'    => $assignments,
            'totalAssignments' => 64,
            'pendingReview'  => 142,
            'gradedCount'    => 1208,
        ]);
    }
 
    public function create()
    {
        return view('admin.assignments.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'course_id'       => 'required',
            'description'     => 'nullable|string',
            'due_date'        => 'required|date',
            'total_marks'     => 'nullable|integer|min:1',
            'submission_type' => 'required|in:file,text,link',
            'status'          => 'required|in:Open,Closed',
        ]);
        // TODO: Assignment::create($request->validated());
        return redirect()->route('admin.assignments.index')->with('success', 'Assignment created successfully.');
    }
 
    public function show($id)
    {
        // TODO: $assignment = Assignment::with('submissions.student')->findOrFail($id);
        $assignment = null;
        return view('admin.assignments.show', compact('assignment'));
    }
 
    public function edit($id)
    {
        // TODO: $assignment = Assignment::findOrFail($id);
        $assignment = null;
        return view('admin.assignments.create', compact('assignment'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255', 'due_date' => 'required|date']);
        // TODO: Assignment::findOrFail($id)->update($request->validated());
        return redirect()->route('admin.assignments.index')->with('success', 'Assignment updated.');
    }
 
    public function destroy($id)
    {
        // TODO: Assignment::findOrFail($id)->delete();
        return redirect()->route('admin.assignments.index')->with('success', 'Assignment deleted.');
    }
 
    public function grade(Request $request, $id)
    {
        $request->validate(['marks' => 'required|integer|min:0', 'feedback' => 'nullable|string']);
        // TODO: Submission::findOrFail($id)->update(['marks' => $request->marks, 'feedback' => $request->feedback, 'status' => 'Graded']);
        return back()->with('success', 'Submission graded successfully.');
    }
}
 