@extends('layouts.admin')

@section('title', isset($student) ? 'Edit Student' : 'Add Student')
@section('page-title', isset($student) ? 'Edit Student' : 'Add Student')
@section('page-subtitle', 'Student Management')

@section('content')

  <div class="page-header">
    <div>
      <h2>{{ isset($student) ? 'Edit Student' : 'Add New Student' }}</h2>
      <p>{{ isset($student) ? 'Update student information' : 'Enroll a new student into the platform' }}</p>
    </div>
    <a href="{{ route('admin.students.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
      <i class="fas fa-arrow-left"></i> Back to Students
    </a>
  </div>

  <form action="{{ isset($student) ? route('admin.students.update', $student->id) : route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($student)) @method('PUT') @endif

    <div class="row g-3">
      <div class="col-12 col-lg-8">
        <div class="form-card mb-3">
          <div class="form-section-title">Personal Information</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" placeholder="e.g. Aisha Patel" value="{{ old('name', $student->name ?? '') }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Student Code</label>
              <input type="text" name="student_code" class="form-control" placeholder="Auto-generated if left blank" value="{{ old('student_code', $student->student_code ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="student@example.com" value="{{ old('email', $student->email ?? '') }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="03XX-XXXXXXX" value="{{ old('phone', $student->phone ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Date of Birth</label>
              <input type="date" name="dob" class="form-control" value="{{ old('dob', $student->dob ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Gender</label>
              <select name="gender" class="form-select">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Address</label>
              <textarea name="address" class="form-control" rows="2">{{ old('address', $student->address ?? '') }}</textarea>
            </div>
          </div>
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Enrollment Details</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Course</label>
              <select name="course_id" class="form-select" required>
                <option value="">Select Course</option>
                <option value="1">Full Stack Web Development</option>
                <option value="2">Data Science with Python</option>
                <option value="3">UI/UX Design Masterclass</option>
                <option value="4">Machine Learning A-Z</option>
                <option value="5">Digital Marketing</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Batch</label>
              <select name="batch_id" class="form-select" required>
                <option value="">Select Batch</option>
                <option value="1">Batch Jan-25</option>
                <option value="2">Batch Feb-25</option>
                <option value="3">Batch Mar-25</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Enrollment Date</label>
              <input type="date" name="enrolled_date" class="form-control" value="{{ old('enrolled_date', $student->enrolled_date ?? date('Y-m-d')) }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Course Fees (₹)</label>
              <input type="number" name="fees" class="form-control" placeholder="0" value="{{ old('fees', $student->fees ?? '') }}" required>
            </div>
          </div>
        </div>

        <div class="form-card">
          <div class="form-section-title">Profile Photo</div>
          <input type="file" name="photo" class="form-control" accept="image/*">
          <small class="text-muted">Square image recommended, max 2MB</small>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <div class="form-card mb-3">
          <div class="form-section-title">Status</div>
          <select name="status" class="form-select">
            <option value="Active" {{ (old('status', $student->status ?? '') == 'Active') ? 'selected' : '' }}>Active</option>
            <option value="Pending" {{ (old('status', $student->status ?? '') == 'Pending') ? 'selected' : '' }}>Pending</option>
            <option value="Inactive" {{ (old('status', $student->status ?? '') == 'Inactive') ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Account Access</div>
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control mb-2" placeholder="{{ isset($student) ? 'Leave blank to keep current' : 'Set a password' }}">
          <small class="text-muted">Student will use this with their email to log in.</small>
        </div>

        <button type="submit" class="btn-primary-custom w-100 justify-content-center">
          <i class="fas fa-save"></i> {{ isset($student) ? 'Update Student' : 'Save Student' }}
        </button>
      </div>
    </div>
  </form>

@endsection
