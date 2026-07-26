<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
 
class BatchController extends Controller
{
    public function index(Request $request)
    {
        // TODO: $batches = Batch::with('course','teacher')->latest()->paginate(15);
        $batches = new LengthAwarePaginator([], 0, 15, 1, ['path' => $request->url()]);
 
        return view('admin.batches.index', [
            'batches'          => $batches,
            'totalBatches'     => 48,
            'totalSeats'       => 1840,
            'upcomingBatches'  => 7,
            'completedBatches' => 124,
        ]);
    }
 
    public function create()
    {
        return view('admin.batches.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'course_id'  => 'required',
            'teacher_id' => 'required',
            'capacity'   => 'required|integer|min:1',
            'start_date' => 'required|date',
            'status'     => 'required|in:Upcoming,Active,Completed',
        ]);
        // TODO: Batch::create($request->validated());
        return redirect()->route('admin.batches.index')->with('success', 'Batch created successfully.');
    }
 
    public function edit($id)
    {
        // TODO: $batch = Batch::findOrFail($id);
        $batch = null;
        return view('admin.batches.create', compact('batch'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255', 'course_id' => 'required']);
        // TODO: Batch::findOrFail($id)->update($request->validated());
        return redirect()->route('admin.batches.index')->with('success', 'Batch updated successfully.');
    }
 
    public function destroy($id)
    {
        // TODO: Batch::findOrFail($id)->delete();
        return redirect()->route('admin.batches.index')->with('success', 'Batch deleted.');
    }
}