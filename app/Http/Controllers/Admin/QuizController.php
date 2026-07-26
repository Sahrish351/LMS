<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
 
class QuizController extends Controller
{
    public function index(Request $request)
    {
        // TODO: $quizzes = Quiz::with('lesson.module.course')->withCount('questions','attempts')->latest()->paginate(15);
        $quizzes = new LengthAwarePaginator([], 0, 15, 1, ['path' => $request->url()]);
 
        return view('admin.quizzes.index', [
            'quizzes'      => $quizzes,
            'totalQuizzes' => 86,
        ]);
    }
 
    public function create()
    {
        return view('admin.quizzes.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'course_id'     => 'required',
            'questions'     => 'required|array|min:1',
            'questions.*.text'    => 'required|string',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.correct' => 'required|integer',
            'time_limit'    => 'nullable|integer|min:1',
            'passing_score' => 'nullable|integer|min:0|max:100',
            'status'        => 'required|in:Draft,Published',
        ]);
        // TODO: $quiz = Quiz::create([...]); foreach questions save QuizQuestion::create([...]);
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz created successfully.');
    }
 
    public function edit($id)
    {
        // TODO: $quiz = Quiz::with('questions')->findOrFail($id);
        $quiz = null;
        return view('admin.quizzes.create', compact('quiz'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255']);
        // TODO: Quiz::findOrFail($id)->update([...]); sync questions;
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated.');
    }
 
    public function destroy($id)
    {
        // TODO: Quiz::findOrFail($id)->delete();
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz deleted.');
    }
}
 