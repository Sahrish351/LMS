@extends('layouts.admin')
@section('title', isset($batch) ? 'Edit Batch' : 'Create Batch')
@section('page-title', isset($batch) ? 'Edit Batch' : 'Create Batch')
@section('page-subtitle','Batch Management')
 
@section('content')
<div class="page-header">
  <div>
    <h2>{{ isset($batch) ? 'Edit Batch' : 'Create New Batch' }}</h2>
    <p>Schedule a new batch for a course</p>
  </div>
  <a href="{{ route('admin.batches.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-arrow-left"></i> Back</a>
</div>
 
<form action="{{ isset($batch) ? route('admin.batches.update',$batch->id) : route('admin.batches.store') }}" method="POST">
  @csrf
  @if(isset($batch)) @method('PUT') @endif
 
  <div class="row g-3">
    <div class="col-lg-8">
      <div class="form-card mb-3">
        <div class="form-section-title">Batch Details</div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Batch Name</label>
            <input type="text" name="name" class="form-control" placeholder="e.g. Batch Jan-25" value="{{ old('name',$batch->name ?? '') }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Course</label>
            <select name="course_id" class="form-select" required>
              <option value="">Select Course</option>
              <option value="1">Full Stack Web Development</option>
              <option value="2">Data Science with Python</option>
              <option value="3">UI/UX Design Masterclass</option>
              <option value="4">Digital Marketing Pro</option>
              <option value="5">Machine Learning A-Z</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Instructor</label>
            <select name="teacher_id" class="form-select" required>
              <option value="">Select Instructor</option>
              <option value="1">Rajesh Kumar</option>
              <option value="2">Priya Mehta</option>
              <option value="3">Amit Sharma</option>
              <option value="4">Sunita Verma</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Total Seats</label>
            <input type="number" name="capacity" class="form-control" placeholder="60" value="{{ old('capacity',$batch->capacity ?? '') }}" required>
          </div>
        </div>
      </div>
      <div class="form-card">
        <div class="form-section-title">Schedule</div>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date',$batch->start_date ?? '') }}" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date',$batch->end_date ?? '') }}">
          </div>
          <div class="col-md-4">
            <label class="form-label">Class Days & Time</label>
            <input type="text" name="schedule" class="form-control" placeholder="Mon, Wed · 6:00 PM">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-card mb-3">
        <div class="form-section-title">Status</div>
        <select name="status" class="form-select">
          <option value="Upcoming" {{ old('status',$batch->status ?? '')==='Upcoming'?'selected':'' }}>Upcoming</option>
          <option value="Active"   {{ old('status',$batch->status ?? '')==='Active'?'selected':'' }}>Active</option>
          <option value="Completed"{{ old('status',$batch->status ?? '')==='Completed'?'selected':'' }}>Completed</option>
        </select>
      </div>
      <button type="submit" class="btn-primary-custom w-100 justify-content-center">
        <i class="fas fa-save"></i> {{ isset($batch) ? 'Update Batch' : 'Create Batch' }}
      </button>
    </div>
  </div>
</form>
@endsection