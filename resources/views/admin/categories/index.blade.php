@extends('layouts.admin')

@section('title', 'Categories')
@section('page-title', 'Categories')
@section('page-subtitle', 'EduAdmin LMS Platform')

@section('content')

  <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height:60vh;">
    <div style="width:90px;height:90px;background:#ede9fe;border-radius:20px;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
      <i class="fas fa-folder-open" style="font-size:36px;color:#7c3aed;"></i>
    </div>
    <h2 style="font-size:22px;font-weight:700;color:var(--text-main);margin-bottom:10px;">Course Categories</h2>
    <p style="font-size:14px;color:var(--text-muted);max-width:420px;margin-bottom:24px;">
      Organize and manage course categories to keep your catalog structured.
    </p>
    <button class="btn-primary-custom" style="padding:11px 28px;font-size:14px;" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
      <i class="fas fa-plus"></i> Get Started
    </button>
  </div>

  <!-- Add Category Modal -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('admin.categories.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Add New Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control mb-3" placeholder="e.g. Technology" required>
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control mb-3" rows="3" placeholder="Brief description of this category"></textarea>
            <label class="form-label">Icon</label>
            <select name="icon" class="form-select">
              <option value="fa-laptop-code">Technology</option>
              <option value="fa-paint-brush">Design</option>
              <option value="fa-bullhorn">Marketing</option>
              <option value="fa-briefcase">Business</option>
              <option value="fa-ellipsis-h">Others</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn-primary-custom">Save Category</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
