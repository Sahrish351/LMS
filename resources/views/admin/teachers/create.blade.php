@extends('layouts.admin')

@section('title', isset($teacher) ? 'Edit Teacher' : 'Add Teacher')
@section('page-title', isset($teacher) ? 'Edit Teacher' : 'Add Teacher')
@section('page-subtitle', 'Teacher Management')

@section('content')

  <div class="page-header">
    <div>
      <h2>{{ isset($teacher) ? 'Edit Teacher' : 'Add New Teacher' }}</h2>
      <p>{{ isset($teacher) ? 'Update teacher information' : 'Onboard a new teacher to the platform' }}</p>
    </div>
    <a href="{{ route('admin.teachers.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
      <i class="fas fa-arrow-left"></i> Back to Teachers
    </a>
  </div>

  <form action="{{ isset($teacher) ? route('admin.teachers.update', $teacher->id) : route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($teacher)) @method('PUT') @endif

    <div class="row g-3">
      <div class="col-12 col-lg-8">
        <div class="form-card mb-3">
          <div class="form-section-title">Personal Information</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" placeholder="e.g. Rajesh Kumar" value="{{ old('name', $teacher->name ?? '') }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="teacher@example.com" value="{{ old('email', $teacher->email ?? '') }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="03XX-XXXXXXX" value="{{ old('phone', $teacher->phone ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Joining Date</label>
              <input type="date" name="joined_date" class="form-control" value="{{ old('joined_date', $teacher->joined_date ?? date('Y-m-d')) }}">
            </div>
            <div class="col-12">
              <label class="form-label">Bio</label>
              <textarea name="bio" class="form-control" rows="3" placeholder="Short professional bio...">{{ old('bio', $teacher->bio ?? '') }}</textarea>
            </div>
          </div>
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Professional Details</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Specialization</label>
              <select name="specialization" class="form-select" required>
                <option value="">Select Specialization</option>
                <option value="Web Development" {{ (old('specialization', $teacher->specialization ?? '') == 'Web Development') ? 'selected' : '' }}>Web Development</option>
                <option value="Data Science & AI" {{ (old('specialization', $teacher->specialization ?? '') == 'Data Science & AI') ? 'selected' : '' }}>Data Science & AI</option>
                <option value="Design & UX" {{ (old('specialization', $teacher->specialization ?? '') == 'Design & UX') ? 'selected' : '' }}>Design & UX</option>
                <option value="Digital Marketing" {{ (old('specialization', $teacher->specialization ?? '') == 'Digital Marketing') ? 'selected' : '' }}>Digital Marketing</option>
                <option value="Cloud & DevOps" {{ (old('specialization', $teacher->specialization ?? '') == 'Cloud & DevOps') ? 'selected' : '' }}>Cloud & DevOps</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Years of Experience</label>
              <input type="number" name="experience" class="form-control" placeholder="5" value="{{ old('experience', $teacher->experience ?? '') }}">
            </div>
            <div class="col-12">
              <label class="form-label">Assigned Courses</label>
              <div class="row">
                <div class="col-md-4 form-check mb-2"><input class="form-check-input" type="checkbox" name="courses[]" value="1"> <label class="form-check-label">Full Stack Web Dev</label></div>
                <div class="col-md-4 form-check mb-2"><input class="form-check-input" type="checkbox" name="courses[]" value="2"> <label class="form-check-label">Data Science Python</label></div>
                <div class="col-md-4 form-check mb-2"><input class="form-check-input" type="checkbox" name="courses[]" value="3"> <label class="form-check-label">UI/UX Design</label></div>
                <div class="col-md-4 form-check mb-2"><input class="form-check-input" type="checkbox" name="courses[]" value="4"> <label class="form-check-label">Machine Learning</label></div>
                <div class="col-md-4 form-check mb-2"><input class="form-check-input" type="checkbox" name="courses[]" value="5"> <label class="form-check-label">Digital Marketing</label></div>
                <div class="col-md-4 form-check mb-2"><input class="form-check-input" type="checkbox" name="courses[]" value="6"> <label class="form-check-label">Cloud & DevOps</label></div>
              </div>
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
          <div class="form-section-title">Revenue Share</div>
          <label class="form-label">Commission Rate (%)</label>
          <input type="number" name="commission_rate" class="form-control" placeholder="e.g. 70" value="{{ old('commission_rate', $teacher->commission_rate ?? '') }}">
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Status</div>
          <select name="status" class="form-select">
            <option value="Active" {{ (old('status', $teacher->status ?? '') == 'Active') ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ (old('status', $teacher->status ?? '') == 'Inactive') ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Account Access</div>
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control mb-2" placeholder="{{ isset($teacher) ? 'Leave blank to keep current' : 'Set a password' }}">
          <small class="text-muted">Teacher will use this with their email to log in.</small>
        </div>

        <button type="submit" class="btn-primary-custom w-100 justify-content-center">
          <i class="fas fa-save"></i> {{ isset($teacher) ? 'Update Teacher' : 'Save Teacher' }}
        </button>
      </div>
    </div>
  </form>

@endsection
