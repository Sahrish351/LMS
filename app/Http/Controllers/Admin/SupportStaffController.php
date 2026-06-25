<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportStaffController extends Controller
{
    /**
     * Display the Support Staff landing page.
     *
     * Currently shows an empty/onboarding state ("Get Started") since
     * this module hasn't been fully built out yet. Once a SupportStaff
     * model + migration exist, this can be swapped for a full listing
     * page (same pattern as Students/Teachers).
     */
    public function index(Request $request)
    {
        // TODO: once built out, check if any staff exist:
        // $staffCount = SupportStaff::count();
        // if ($staffCount > 0) { return view('admin.support-staff.list', [...]); }

        return view('admin.support-staff.index');
    }

    /**
     * Show the form for creating a new support staff member.
     */
    public function create()
    {
        return view('admin.support-staff.create');
    }

    /**
     * Store a newly created support staff member.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:support_staff,email',
            'phone'        => 'nullable|string|max:20',
            'joined_date'  => 'nullable|date',
            'department'   => 'required|string',
            'access_level' => 'required|string',
            'status'       => 'nullable|in:Active,Inactive',
            'password'     => 'nullable|string|min:6',
        ]);

        // TODO: SupportStaff::create($validated);

        return redirect()->route('admin.support-staff.index')->with('success', 'Support staff member added successfully.');
    }

    /**
     * Show the form for editing the specified support staff member.
     */
    public function edit($id)
    {
        // TODO: $staff = SupportStaff::findOrFail($id);
        $staff = null;
        return view('admin.support-staff.create', compact('staff'));
    }

    /**
     * Update the specified support staff member.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // TODO: SupportStaff::findOrFail($id)->update($validated);

        return redirect()->route('admin.support-staff.index')->with('success', 'Support staff member updated successfully.');
    }

    /**
     * Remove the specified support staff member.
     */
    public function destroy($id)
    {
        // TODO: SupportStaff::findOrFail($id)->delete();
        return redirect()->route('admin.support-staff.index')->with('success', 'Support staff member removed successfully.');
    }
}
