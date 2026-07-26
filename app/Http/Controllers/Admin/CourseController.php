<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of courses (grid or table view).
     */
    public function index(Request $request)
    {
        // ===== TODO: Replace with real Eloquent queries once Course model exists =====
        // $query = Course::with('category', 'teacher')->withCount('students');
        //
        // if ($request->filled('search')) {
        //     $query->where('title', 'like', '%'.$request->search.'%');
        // }
        //
        // $courses = $query->latest()->get(); // or ->paginate(12) for grid pagination
        // $totalCourses     = Course::count();
        // $publishedCourses = Course::where('status', 'published')->count();

        // The view also has its own static @php fallback array if $courses is null,
        // so we simply don't pass it here until the real model exists.
        return view('admin.courses.index', [
            'courses'          => null,
            'totalCourses'     => 6,
            'publishedCourses' => 5,
            'view'             => $request->get('view', 'grid'),
        ]);
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'category_id'   => 'required',
            'teacher_id'    => 'required',
            'description'   => 'nullable|string',
            'duration'      => 'nullable|string',
            'lessons_count' => 'nullable|integer',
            'price'         => 'required|numeric|min:0',
            'discount'      => 'nullable|numeric|min:0|max:100',
            'status'        => 'nullable|in:draft,published,archived',
            'thumbnail'     => 'nullable|image|max:2048',
        ]);

        // TODO: Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified course.
     */
    public function show($id)
    {
        // TODO: $course = Course::with('modules.lessons', 'teacher', 'category')->findOrFail($id);
        $course = null;
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit($id)
    {
        // TODO: $course = Course::findOrFail($id);
        $course = null;
        return view('admin.courses.create', compact('course'));
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required',
            'teacher_id'  => 'required',
            'price'       => 'required|numeric|min:0',
        ]);

        // TODO: Course::findOrFail($id)->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy($id)
    {
        // TODO: Course::findOrFail($id)->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course removed successfully.');
    }
}
