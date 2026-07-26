@extends('layouts.admin')
@section('title', isset($exam) ? 'Edit Exam' : 'Create Exam')
@section('page-title', isset($exam) ? 'Edit Exam' : 'Create Exam')
@section('page-subtitle','Exam Management')
 
@section('content')
<div class="page-header">
  <div><h2>{{ isset($exam) ? 'Edit Exam' : 'Create New Exam' }}</h2><p>Schedule an exam for a batch</p></div>
  <a href="{{ route('admin.exams.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-arrow-left"></i> Back</a>
</div>
 
<form action="{{ isset($exam) ? route('admin.exams.update',$exam->id) : route('admin.exams.store') }}" method="POST">
  @csrf
  @if(isset($exam)) @method('PUT') @endif
 
  <div class="row g-3">
    <div class="col-lg-8">
      <div class="form-card mb-3">
        <div class="form-section-title">Exam Details</div>
        <div class="row g-3">
          <div class="col-12">
            <label class="form-label">Exam Title</label>
            <input type="text" name="title" class="form-control" placeholder="e.g. Mid-Term Assessment" value="{{ old('title',$exam->title ?? '') }}" required>
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
          <div class="col-12">
            <label class="form-label">Instructions for Students</label>
            <textarea name="instructions" class="form-control" rows="3" placeholder="Exam rules and instructions...">{{ old('instructions',$exam->instructions ?? '') }}</textarea>
          </div>
        </div>
      </div>
      <div class="form-card">
        <div class="form-section-title">Schedule & Marking</div>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date',$exam->date ?? '') }}" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Duration (minutes)</label>
            <input type="number" name="duration" class="form-control" placeholder="90" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Total Marks</label>
            <input type="number" name="total_marks" class="form-control" placeholder="100" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Passing Marks</label>
            <input type="number" name="passing_marks" class="form-control" placeholder="40">
          </div>
          <div class="col-md-4">
            <label class="form-label">Exam Type</label>
            <select name="type" class="form-select">
              <option value="mcq">Multiple Choice</option>
              <option value="written">Written</option>
              <option value="mixed">Mixed</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-card mb-3">
        <div class="form-section-title">Status</div>
        <select name="status" class="form-select">
          <option value="Upcoming">Upcoming</option>
          <option value="Live">Live</option>
          <option value="Completed">Completed</option>
        </select>
      </div>
      <button type="submit" class="btn-primary-custom w-100 justify-content-center">
        <i class="fas fa-save"></i> {{ isset($exam) ? 'Update Exam' : 'Create Exam' }}
      </button>
    </div>
  </div>
</form>
@endsection