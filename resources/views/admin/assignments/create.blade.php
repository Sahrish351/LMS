@extends('layouts.admin')
@section('title', isset($assignment) ? 'Edit Assignment' : 'Create Assignment')
@section('page-title', isset($assignment) ? 'Edit Assignment' : 'Create Assignment')
@section('page-subtitle','Assignment Management')
 
@section('content')
<div class="page-header">
  <div><h2>{{ isset($assignment) ? 'Edit Assignment' : 'Create New Assignment' }}</h2><p>Set up a task for students to complete and submit</p></div>
  <a href="{{ route('admin.assignments.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-arrow-left"></i> Back</a>
</div>
 
<form action="{{ isset($assignment) ? route('admin.assignments.update',$assignment->id) : route('admin.assignments.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if(isset($assignment)) @method('PUT') @endif
 
  <div class="row g-3">
    <div class="col-lg-8">
      <div class="form-card mb-3">
        <div class="form-section-title">Assignment Details</div>
        <div class="row g-3">
          <div class="col-12">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="e.g. Build a Responsive Portfolio" value="{{ old('title',$assignment->title ?? '') }}" required>
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
            <label class="form-label">Module (optional)</label>
            <select name="module_id" class="form-select">
              <option value="">No specific module</option>
              <option value="1">Module 1: HTML, CSS & JS</option>
              <option value="2">Module 2: React</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Description / Instructions</label>
            <textarea name="description" class="form-control" rows="5" placeholder="Describe the task in detail...">{{ old('description',$assignment->description ?? '') }}</textarea>
          </div>
        </div>
      </div>
      <div class="form-card">
        <div class="form-section-title">Reference Files</div>
        <input type="file" name="attachments[]" class="form-control" multiple>
        <small class="text-muted">Attach any reference material or starter files.</small>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-card mb-3">
        <div class="form-section-title">Submission Settings</div>
        <label class="form-label">Due Date</label>
        <input type="date" name="due_date" class="form-control mb-3" value="{{ old('due_date',$assignment->due_date ?? '') }}" required>
        <label class="form-label">Total Marks</label>
        <input type="number" name="total_marks" class="form-control mb-3" placeholder="100">
        <label class="form-label">Submission Type</label>
        <select name="submission_type" class="form-select">
          <option value="file">File Upload</option>
          <option value="text">Text Entry</option>
          <option value="link">Link/URL</option>
        </select>
      </div>
      <div class="form-card mb-3">
        <div class="form-section-title">Status</div>
        <select name="status" class="form-select">
          <option value="Open" {{ old('status',$assignment->status ?? '')==='Open'?'selected':'' }}>Open</option>
          <option value="Closed"{{ old('status',$assignment->status ?? '')==='Closed'?'selected':'' }}>Closed</option>
        </select>
      </div>
      <button type="submit" class="btn-primary-custom w-100 justify-content-center">
        <i class="fas fa-save"></i> {{ isset($assignment) ? 'Update Assignment' : 'Create Assignment' }}
      </button>
    </div>
  </div>
</form>
@endsection