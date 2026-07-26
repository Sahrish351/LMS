<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        // TODO:
        // $batch    = Batch::findOrFail($request->batch_id ?? Batch::first()->id);
        // $date     = $request->date ?? today()->toDateString();
        // $students = $batch->students()->with(['attendance' => fn($q) => $q->whereDate('date', $date)])->get();
        // $existing = Attendance::whereDate('date', $date)->where('batch_id', $batch->id)->get();
 
        return view('admin.attendance.index', [
            'students'           => collect([]),
            'totalStudentsInBatch' => 47,
            'presentToday'       => 41,
            'absentToday'        => 6,
        ]);
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'attendance'   => 'required|array',
            'attendance.*' => 'required|in:present,absent,late',
            'batch_id'     => 'nullable|integer',
            'date'         => 'nullable|date',
        ]);
 
        $date    = $request->date ?? today()->toDateString();
        $batchId = $request->batch_id;
 
        // TODO: foreach ($request->attendance as $studentId => $status) {
        //   Attendance::updateOrCreate(
        //     ['student_id' => $studentId, 'batch_id' => $batchId, 'date' => $date],
        //     ['status' => $status]
        //   );
        // }
 
        return back()->with('success', 'Attendance saved successfully.');
    }
}
 