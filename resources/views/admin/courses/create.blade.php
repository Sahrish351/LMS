@extends('layouts.admin')

@section('title', isset($course) ? 'Edit Course' : 'New Course')
@section('page-title', isset($course) ? 'Edit Course' : 'New Course')
@section('page-subtitle', 'Course Management')

@section('content')

  <div class="page-header">
    <div>
      <h2>{{ isset($course) ? 'Edit Course' : 'Create New Course' }}</h2>
      <p>{{ isset($course) ? 'Update course information' : 'Add a new course to your catalog' }}</p>
    </div>
    <a href="{{ route('admin.courses.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
      <i class="fas fa-arrow-left"></i> Back to Courses
    </a>
  </div>

  <form action="{{ isset($course) ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($course)) @method('PUT') @endif

    <div class="row g-3">
      <div class="col-12 col-lg-8">
        <div class="form-card mb-3">
          <div class="form-section-title">Course Details</div>
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Course Title</label>
              <input type="text" name="title" class="form-control" placeholder="e.g. Full Stack Web Development" value="{{ old('title', $course->title ?? '') }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Category</label>
              <select name="category_id" class="form-select" required>
                <option value="">Select Category</option>
                <option value="1">Technology</option>
                <option value="2">Design</option>
                <option value="3">Marketing</option>
                <option value="4">Business</option>
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
                <option value="5">Vikram Singh</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" rows="4" placeholder="Detailed course description...">{{ old('description', $course->description ?? '') }}</textarea>
            </div>
          </div>
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Course Structure</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Duration</label>
              <input type="text" name="duration" class="form-control" placeholder="e.g. 6 months" value="{{ old('duration', $course->duration ?? '') }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Total Lessons</label>
              <input type="number" name="lessons_count" class="form-control" placeholder="e.g. 124" value="{{ old('lessons_count', $course->lessons_count ?? '') }}">
            </div>
          </div>
        </div>

        <div class="form-card">
          <div class="form-section-title">Course Thumbnail</div>
          <input type="file" name="thumbnail" class="form-control" accept="image/*">
          <small class="text-muted">Recommended size: 800x450px, max 2MB</small>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <div class="form-card mb-3">
          <div class="form-section-title">Pricing</div>
          <label class="form-label">Price (₹)</label>
          <input type="number" name="price" class="form-control mb-3" placeholder="0" value="{{ old('price', $course->price ?? '') }}" required>
          <label class="form-label">Discount (%)</label>
          <input type="number" name="discount" class="form-control" placeholder="0" value="{{ old('discount', $course->discount ?? '') }}">
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Publish Status</div>
          <select name="status" class="form-select">
            <option value="draft" {{ (old('status', $course->status ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ (old('status', $course->status ?? '') == 'published') ? 'selected' : '' }}>Published</option>
            <option value="archived" {{ (old('status', $course->status ?? '') == 'archived') ? 'selected' : '' }}>Archived</option>
          </select>
        </div>

        <button type="submit" class="btn-primary-custom w-100 justify-content-center">
          <i class="fas fa-save"></i> {{ isset($course) ? 'Update Course' : 'Create Course' }}
        </button>
      </div>
    </div>
  </form>

@endsection
