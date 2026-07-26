<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the Categories landing page.
     *
     * Shows an empty/onboarding state ("Get Started") when no categories
     * exist yet. Once categories are added, this can be swapped for a
     * full grid/list view (same pattern as Courses).
     */
    public function index(Request $request)
    {
        // TODO: once a Category model exists:
        // $categories = Category::withCount('courses')->get();
        // if ($categories->count() > 0) { return view('admin.categories.list', compact('categories')); }

        return view('admin.categories.index');
    }

    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string',
        ]);

        // TODO: Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Update the specified category.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // TODO: Category::findOrFail($id)->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category.
     */
    public function destroy($id)
    {
        // TODO: Category::findOrFail($id)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category removed successfully.');
    }
}
