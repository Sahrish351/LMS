<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
 
class LiveClassController extends Controller
{
    public function index(Request $request)
    {
        // TODO: $classes = LiveClass::with('course','batch','teacher')->latest('date')->paginate(15);
        $classes = new LengthAwarePaginator([], 0, 15, 1, ['path' => $request->url()]);
 
        return view('admin.live-classes.index', [
            'classes'          => $classes,
            'liveNow'          => 2,
            'upcomingClasses'  => 12,
            'completedClasses' => 246,
        ]);
    }
 
    public function create()
    {
        return view('admin.live-classes.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'course_id'  => 'required',
            'batch_id'   => 'required',
            'teacher_id' => 'required',
            'platform'   => 'required|string',
            'join_url'   => 'nullable|url',
            'date'       => 'required|date',
            'start_time' => 'required',
            'duration'   => 'nullable|integer|min:1',
        ]);
        // TODO: LiveClass::create($request->validated());
        return redirect()->route('admin.live-classes.index')->with('success', 'Live class scheduled.');
    }
 
    public function edit($id)
    {
        // TODO: $class = LiveClass::findOrFail($id);
        $liveClass = null;
        return view('admin.live-classes.create', ['liveClass' => $liveClass]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255', 'date' => 'required|date']);
        // TODO: LiveClass::findOrFail($id)->update($request->validated());
        return redirect()->route('admin.live-classes.index')->with('success', 'Live class updated.');
    }
 
    public function destroy($id)
    {
        // TODO: LiveClass::findOrFail($id)->delete();
        return redirect()->route('admin.live-classes.index')->with('success', 'Class cancelled.');
    }
}
 