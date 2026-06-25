@extends('layouts.admin')

@section('title', 'Add Support Staff')
@section('page-title', 'Add Support Staff')
@section('page-subtitle', 'Support Staff Management')

@section('content')

  <div class="page-header">
    <div>
      <h2>Add Support Staff Member</h2>
      <p>Onboard a new support agent to the platform</p>
    </div>
    <a href="{{ route('admin.support-staff.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
      <i class="fas fa-arrow-left"></i> Back
    </a>
  </div>

  <form action="{{ route('admin.support-staff.store') }}" method="POST">
    @csrf

    <div class="row g-3">
      <div class="col-12 col-lg-8">
        <div class="form-card mb-3">
          <div class="form-section-title">Personal Information</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" placeholder="e.g. Sara Ahmed" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="staff@example.com" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="03XX-XXXXXXX">
            </div>
            <div class="col-md-6">
              <label class="form-label">Joining Date</label>
              <input type="date" name="joined_date" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
          </div>
        </div>

        <div class="form-card">
          <div class="form-section-title">Role & Department</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Department</label>
              <select name="department" class="form-select">
                <option value="Student Support">Student Support</option>
                <option value="Technical Support">Technical Support</option>
                <option value="Billing Support">Billing Support</option>
                <option value="General Inquiries">General Inquiries</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Access Level</label>
              <select name="access_level" class="form-select">
                <option value="agent">Agent</option>
                <option value="senior_agent">Senior Agent</option>
                <option value="team_lead">Team Lead</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <div class="form-card mb-3">
          <div class="form-section-title">Status</div>
          <select name="status" class="form-select">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Account Access</div>
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Set a password">
        </div>

        <button type="submit" class="btn-primary-custom w-100 justify-content-center">
          <i class="fas fa-save"></i> Save Staff Member
        </button>
      </div>
    </div>
  </form>

@endsection
