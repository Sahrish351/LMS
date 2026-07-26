<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display the Modules landing page.
     *
     * Shows an empty/onboarding state ("Get Started") when no modules
     * exist yet, with a quick-add modal. Once modules are added across
     * courses, this can be swapped for a full listing view.
     */
    public function index(Request $request)
    {
        // TODO: once a Module model exists:
        // $modules = Module::with('course')->withCount('lessons')->get();
        // if ($modules->count() > 0) { return view('admin.modules.list', compact('modules')); }

        return view('admin.modules.index');
    }

    /**
     * Show the form for creating a new module.
     * (Currently handled via modal on the index page; this is kept
     * for completeness / future standalone create page.)
     */
    public function create()
    {
        return view('admin.modules.index');
    }

    /**
     * Store a newly created module.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id'   => 'required',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer|min:1',
        ]);

        // TODO: Module::create($validated);

        return redirect()->route('admin.modules.index')->with('success', 'Module created successfully.');
    }

    /**
     * Show the form for editing the specified module.
     */
    public function edit($id)
    {
        // TODO: $module = Module::findOrFail($id);
        $module = null;
        return view('admin.modules.index', compact('module'));
    }

    /**
     * Update the specified module.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer|min:1',
        ]);

        // TODO: Module::findOrFail($id)->update($validated);

        return redirect()->route('admin.modules.index')->with('success', 'Module updated successfully.');
    }

    /**
     * Remove the specified module.
     */
    public function destroy($id)
    {
        // TODO: Module::findOrFail($id)->delete();
        return redirect()->route('admin.modules.index')->with('success', 'Module removed successfully.');
    }
}
