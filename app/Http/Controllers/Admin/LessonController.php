<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display the Lessons landing page.
     *
     * Shows an empty/onboarding state ("Get Started") when no lessons
     * exist yet. "Get Started" links to the full create form since
     * lessons have rich content (video/text/quiz/attachments) that
     * doesn't fit well in a quick modal.
     */
    public function index(Request $request)
    {
        // TODO: once a Lesson model exists:
        // $lessons = Lesson::with('module.course')->get();
        // if ($lessons->count() > 0) { return view('admin.lessons.list', compact('lessons')); }

        return view('admin.lessons.index');
    }

    /**
     * Show the form for creating a new lesson.
     */
    public function create()
    {
        return view('admin.lessons.create');
    }

    /**
     * Store a newly created lesson in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id'       => 'required',
            'module_id'       => 'required',
            'title'           => 'required|string|max:255',
            'video_url'       => 'nullable|url',
            'video_file'      => 'nullable|file|mimetypes:video/mp4,video/quicktime|max:51200',
            'text_content'    => 'nullable|string',
            'quiz_question'   => 'nullable|string',
            'quiz_option'     => 'nullable|array',
            'quiz_correct'    => 'nullable|integer',
            'attachments.*'   => 'nullable|file|max:10240',
            'duration'        => 'nullable|integer|min:1',
            'order'           => 'nullable|integer|min:1',
            'is_free_preview' => 'nullable|boolean',
            'status'          => 'nullable|in:draft,published',
        ]);

        // TODO: Lesson::create($validated);
        // Handle file uploads for video_file/attachments to storage, save quiz as related model, etc.

        return redirect()->route('admin.lessons.index')->with('success', 'Lesson created successfully.');
    }

    /**
     * Show the form for editing the specified lesson.
     */
    public function edit($id)
    {
        // TODO: $lesson = Lesson::with('module', 'quiz', 'attachments')->findOrFail($id);
        $lesson = null;
        return view('admin.lessons.create', compact('lesson'));
    }

    /**
     * Update the specified lesson.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'module_id' => 'required',
        ]);

        // TODO: Lesson::findOrFail($id)->update($validated);

        return redirect()->route('admin.lessons.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified lesson.
     */
    public function destroy($id)
    {
        // TODO: Lesson::findOrFail($id)->delete();
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson removed successfully.');
    }
}
