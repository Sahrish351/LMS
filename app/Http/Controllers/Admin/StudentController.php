<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentController extends Controller
{
    /**
     * Display a listing of students with stats and pagination.
     */
    public function index(Request $request)
    {
        // ===== TODO: Replace with real Eloquent queries once Student model exists =====
        // $query = Student::with('course', 'batch');
        //
        // if ($request->filled('search')) {
        //     $query->where('name', 'like', '%'.$request->search.'%')
        //           ->orWhere('student_code', 'like', '%'.$request->search.'%');
        // }
        // if ($request->filled('course')) {
        //     $query->where('course_id', $request->course);
        // }
        // if ($request->filled('batch')) {
        //     $query->where('batch_id', $request->batch);
        // }
        // if ($request->filled('status')) {
        //     $query->where('status', $request->status);
        // }
        //
        // $students = $query->latest()->paginate(15)->withQueryString();

        // ----- TEMPORARY: empty paginator so the Blade view's ->total(),
        // ->count(), ->currentPage(), ->lastPage() calls all work safely
        // until the real Student model + migration are wired up. The view
        // falls back to its own static sample rows via @forelse...@empty. -----
        $students = new LengthAwarePaginator(
            [],   // items for this page (empty -> blade shows static fallback rows)
            0,    // total items
            15,   // items per page
            1,    // current page
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // $totalStudents       = Student::count();
        // $activeThisMonth     = Student::where('status', 'Active')
        //                          ->whereMonth('updated_at', now()->month)->count();
        // $pendingVerification = Student::where('status', 'Pending')->count();
        // $avgCompletionRate   = round(Student::avg('progress'), 1) . '%';

        return view('admin.students.index', [
            'students'             => $students,
            'totalStudents'        => 12847,
            'activeThisMonth'      => 10453,
            'pendingVerification'  => 234,
            'avgCompletionRate'    => '74.3%',
        ]);
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'student_code'   => 'nullable|string|unique:students,student_code',
            'email'          => 'required|email|unique:students,email',
            'phone'          => 'nullable|string|max:20',
            'dob'            => 'nullable|date',
            'gender'         => 'nullable|in:male,female,other',
            'address'        => 'nullable|string',
            'course_id'      => 'required',
            'batch_id'       => 'required',
            'enrolled_date'  => 'nullable|date',
            'fees'           => 'required|numeric|min:0',
            'status'         => 'nullable|in:Active,Pending,Inactive',
            'password'       => 'nullable|string|min:6',
            'photo'          => 'nullable|image|max:2048',
        ]);

        // TODO: Student::create($validated);
        // Generate student_code automatically if blank, e.g. 'STU-' . str_pad($nextId, 3, '0', STR_PAD_LEFT)

        return redirect()->route('admin.students.index')->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified student's profile.
     */
    public function show($id)
    {
        // TODO: $student = Student::with('course', 'batch', 'payments')->findOrFail($id);
        $student = null;
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        // TODO: $student = Student::findOrFail($id);
        $student = null;
        return view('admin.students.create', compact('student'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'course_id' => 'required',
            'batch_id'  => 'required',
            'fees'      => 'required|numeric|min:0',
        ]);

        // TODO: Student::findOrFail($id)->update($validated);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        // TODO: Student::findOrFail($id)->delete();
        return redirect()->route('admin.students.index')->with('success', 'Student removed successfully.');
    }
}
