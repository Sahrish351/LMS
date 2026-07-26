<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
 
class ExamController extends Controller
{
    public function index(Request $request)
    {
        // TODO: $exams = Exam::with('course','batch')->latest()->paginate(15);
        $exams = new LengthAwarePaginator([], 0, 15, 1, ['path' => $request->url()]);
 
        return view('admin.exams.index', [
            'exams'          => $exams,
            'totalExams'     => 28,
            'upcomingExams'  => 6,
            'completedExams' => 22,
        ]);
    }
 
    public function create()
    {
        return view('admin.exams.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'course_id'     => 'required',
            'batch_id'      => 'required',
            'date'          => 'required|date',
            'duration'      => 'required|integer|min:1',
            'total_marks'   => 'required|integer|min:1',
            'passing_marks' => 'nullable|integer',
            'type'          => 'required|in:mcq,written,mixed',
            'status'        => 'required|in:Upcoming,Live,Completed',
        ]);
        // TODO: Exam::create($request->validated());
        return redirect()->route('admin.exams.index')->with('success', 'Exam created successfully.');
    }
 
    public function show($id)
    {
        // TODO: $exam = Exam::with('results.student')->findOrFail($id);
        $exam = null;
        return view('admin.exams.show', compact('exam'));
    }
 
    public function edit($id)
    {
        // TODO: $exam = Exam::findOrFail($id);
        $exam = null;
        return view('admin.exams.create', compact('exam'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255', 'date' => 'required|date']);
        // TODO: Exam::findOrFail($id)->update($request->validated());
        return redirect()->route('admin.exams.index')->with('success', 'Exam updated successfully.');
    }
 
    public function destroy($id)
    {
        // TODO: Exam::findOrFail($id)->delete();
        return redirect()->route('admin.exams.index')->with('success', 'Exam deleted.');
    }
}
 