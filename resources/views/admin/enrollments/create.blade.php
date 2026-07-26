@extends('layouts.admin')
@section('title','New Enrollment')
@section('page-title','New Enrollment')
@section('page-subtitle','Enrollment Management')
 
@section('content')
<div class="page-header">
  <div><h2>Create New Enrollment</h2><p>Manually enroll a student into a course batch</p></div>
  <a href="{{ route('admin.enrollments.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-arrow-left"></i> Back</a>
</div>
 
<form action="{{ route('admin.enrollments.store') }}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-lg-8">
      <div class="form-card mb-3">
        <div class="form-section-title">Student & Course</div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Student</label>
            <select name="student_id" class="form-select" required>
              <option value="">Select Student</option>
              <option value="1">Aisha Patel</option>
              <option value="2">Rohit Verma</option>
              <option value="3">Kavya Nair</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Course</label>
            <select name="course_id" class="form-select" required>
              <option value="">Select Course</option>
              <option value="1">Full Stack Web Development</option>
              <option value="2">Data Science with Python</option>
              <option value="3">UI/UX Design Masterclass</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Batch</label>
            <select name="batch_id" class="form-select" required>
              <option value="">Select Batch</option>
              <option value="1">Batch Jan-25</option>
              <option value="2">Batch Feb-25</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Enrollment Date</label>
            <input type="date" name="enrolled_date" class="form-control" value="{{ date('Y-m-d') }}" required>
          </div>
        </div>
      </div>
      <div class="form-card">
        <div class="form-section-title">Fees</div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Total Fees (₹)</label>
            <input type="number" name="fees" class="form-control" placeholder="0" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Advance Paid (₹)</label>
            <input type="number" name="advance" class="form-control" placeholder="0">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-card mb-3">
        <div class="form-section-title">Status</div>
        <select name="status" class="form-select">
          <option value="Approved">Approved</option>
          <option value="Pending">Pending</option>
        </select>
      </div>
      <button type="submit" class="btn-primary-custom w-100 justify-content-center"><i class="fas fa-save"></i> Create Enrollment</button>
    </div>
  </div>
</form>
@endsection