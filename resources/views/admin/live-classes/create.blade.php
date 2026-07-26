@extends('layouts.admin')
@section('title','Schedule Live Class')
@section('page-title','Schedule Live Class')
@section('page-subtitle','Live Classes')
 
@section('content')
<div class="page-header">
  <div><h2>Schedule New Live Class</h2><p>Set up a live session for a batch</p></div>
  <a href="{{ route('admin.live-classes.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-arrow-left"></i> Back</a>
</div>
 
<form action="{{ route('admin.live-classes.store') }}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-lg-8">
      <div class="form-card mb-3">
        <div class="form-section-title">Session Details</div>
        <div class="row g-3">
          <div class="col-12"><label class="form-label">Session Title</label>
            <input type="text" name="title" class="form-control" placeholder="e.g. React Hooks Deep Dive" required>
          </div>
          <div class="col-md-6"><label class="form-label">Course</label>
            <select name="course_id" class="form-select" required>
              <option value="">Select Course</option>
              <option value="1">Full Stack Web Development</option>
              <option value="2">Data Science with Python</option>
              <option value="3">UI/UX Design Masterclass</option>
            </select>
          </div>
          <div class="col-md-6"><label class="form-label">Batch</label>
            <select name="batch_id" class="form-select" required>
              <option value="">Select Batch</option>
              <option value="1">Batch Jan-25</option>
              <option value="2">Batch Feb-25</option>
            </select>
          </div>
          <div class="col-md-6"><label class="form-label">Instructor</label>
            <select name="teacher_id" class="form-select" required>
              <option value="">Select Instructor</option>
              <option value="1">Rajesh Kumar</option>
              <option value="2">Priya Mehta</option>
            </select>
          </div>
          <div class="col-md-6"><label class="form-label">Platform</label>
            <select name="platform" class="form-select">
              <option value="Zoom">Zoom</option>
              <option value="Google Meet">Google Meet</option>
              <option value="Microsoft Teams">Microsoft Teams</option>
            </select>
          </div>
          <div class="col-12"><label class="form-label">Meeting Link</label>
            <input type="url" name="join_url" class="form-control" placeholder="https://zoom.us/j/...">
          </div>
          <div class="col-12"><label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="What will be covered in this session..."></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-card mb-3">
        <div class="form-section-title">Schedule</div>
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control mb-3" required>
        <label class="form-label">Start Time</label>
        <input type="time" name="start_time" class="form-control mb-3" required>
        <label class="form-label">Duration (minutes)</label>
        <input type="number" name="duration" class="form-control" placeholder="60">
      </div>
      <button type="submit" class="btn-primary-custom w-100 justify-content-center"><i class="fas fa-save"></i> Schedule Class</button>
    </div>
  </div>
</form>
@endsection
 