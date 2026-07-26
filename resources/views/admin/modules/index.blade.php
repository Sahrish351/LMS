@extends('layouts.admin')

@section('title', 'Modules')
@section('page-title', 'Modules')
@section('page-subtitle', 'EduAdmin LMS Platform')

@section('content')

  <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height:60vh;">
    <div style="width:90px;height:90px;background:#ede9fe;border-radius:20px;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
      <i class="fas fa-layer-group" style="font-size:36px;color:#7c3aed;"></i>
    </div>
    <h2 style="font-size:22px;font-weight:700;color:var(--text-main);margin-bottom:10px;">Course Modules</h2>
    <p style="font-size:14px;color:var(--text-muted);max-width:420px;margin-bottom:24px;">
      Create and organize modules within your courses for structured learning paths.
    </p>
    <button class="btn-primary-custom" style="padding:11px 28px;font-size:14px;" data-bs-toggle="modal" data-bs-target="#addModuleModal">
      <i class="fas fa-plus"></i> Get Started
    </button>
  </div>

  <!-- Add Module Modal -->
  <div class="modal fade" id="addModuleModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('admin.modules.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Add New Module</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <label class="form-label">Course</label>
            <select name="course_id" class="form-select mb-3" required>
              <option value="">Select Course</option>
              <option value="1">Full Stack Web Development</option>
              <option value="2">Data Science with Python</option>
              <option value="3">UI/UX Design Masterclass</option>
              <option value="4">Digital Marketing Pro</option>
              <option value="5">Machine Learning A-Z</option>
              <option value="6">Cloud & DevOps Essentials</option>
            </select>
            <label class="form-label">Module Title</label>
            <input type="text" name="title" class="form-control mb-3" placeholder="e.g. HTML, CSS & JavaScript Basics" required>
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control mb-3" rows="3" placeholder="Brief description of what this module covers"></textarea>
            <label class="form-label">Order</label>
            <input type="number" name="order" class="form-control" placeholder="1" min="1">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn-primary-custom">Save Module</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
