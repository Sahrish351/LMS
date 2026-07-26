@extends('layouts.admin')

@section('title', 'Course Details')
@section('page-title', 'Course Details')
@section('page-subtitle', 'Course Management')

@section('content')

  <div class="page-header">
    <div>
      <h2>{{ $course->title ?? 'Full Stack Web Development' }}</h2>
      <p>by {{ $course->instructor ?? 'Rajesh Kumar' }} · {{ $course->category ?? 'Technology' }}</p>
    </div>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.courses.edit', $course->id ?? 1) }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
        <i class="fas fa-edit"></i> Edit
      </a>
      <a href="{{ route('admin.courses.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
        <i class="fas fa-arrow-left"></i> Back
      </a>
    </div>
  </div>

  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-users" style="color:#7c3aed;"></i></div>
        <div class="stat-value">{{ number_format($course->students ?? 2847) }}</div>
        <div class="stat-label">Enrolled Students</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-chart-line" style="color:#059669;"></i></div>
        <div class="stat-value">{{ $course->completion ?? 78 }}%</div>
        <div class="stat-label">Completion Rate</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-star" style="color:#d97706;"></i></div>
        <div class="stat-value">{{ $course->rating ?? 4.9 }}</div>
        <div class="stat-label">Avg. Rating</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#fce7f3;"><i class="fas fa-rupee-sign" style="color:#ec4899;"></i></div>
        <div class="stat-value">₹{{ number_format($course->price ?? 18500) }}</div>
        <div class="stat-label">Price</div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-12 col-lg-8">
      <div class="list-card mb-3">
        <div class="list-card-header">
          <p class="list-card-title">Course Modules</p>
          <a href="{{ route('admin.modules.create') }}" class="view-all-link">Add Module <i class="fas fa-plus"></i></a>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-layer-group"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Module 1: HTML, CSS & JavaScript Basics</div>
            <div class="list-item-sub">12 lessons · 8 hours</div>
          </div>
          <span class="status-badge confirmed">published</span>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-layer-group"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Module 2: React Fundamentals</div>
            <div class="list-item-sub">18 lessons · 12 hours</div>
          </div>
          <span class="status-badge confirmed">published</span>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-layer-group"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Module 3: Backend with Laravel</div>
            <div class="list-item-sub">22 lessons · 16 hours</div>
          </div>
          <span class="status-badge confirmed">published</span>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-layer-group"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Module 4: Deployment & DevOps</div>
            <div class="list-item-sub">10 lessons · 6 hours</div>
          </div>
          <span class="status-badge pending">draft</span>
        </div>
      </div>

      <div class="list-card">
        <div class="list-card-header">
          <p class="list-card-title">Recently Enrolled</p>
          <a href="{{ route('admin.students.index') }}" class="view-all-link">View all <i class="fas fa-chevron-right"></i></a>
        </div>
        <div class="list-item">
          <div class="avatar-circle" style="background:#7c3aed;">AP</div>
          <div class="list-item-main">
            <div class="list-item-name">Aisha Patel</div>
            <div class="list-item-sub">Enrolled Jan 5, 2025</div>
          </div>
          <div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:68%;"></div></div>
        </div>
        <div class="list-item">
          <div class="avatar-circle" style="background:#0891b2;">FS</div>
          <div class="list-item-main">
            <div class="list-item-name">Farhan Sheikh</div>
            <div class="list-item-sub">Enrolled Jan 3, 2025</div>
          </div>
          <div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:54%;"></div></div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="list-card mb-3">
        <div class="list-card-header">
          <p class="list-card-title">Course Info</p>
        </div>
        <div class="p-3">
          <p style="margin:0 0 8px;"><span class="text-muted">Duration:</span> <strong>{{ $course->duration ?? '6 months' }}</strong></p>
          <p style="margin:0 0 8px;"><span class="text-muted">Total Lessons:</span> <strong>{{ $course->lessons ?? 124 }}</strong></p>
          <p style="margin:0 0 8px;"><span class="text-muted">Status:</span> <span class="status-badge confirmed">{{ $course->status ?? 'published' }}</span></p>
          <p style="margin:0;"><span class="text-muted">Created:</span> <strong>Mar 15, 2024</strong></p>
        </div>
      </div>

      <div class="list-card">
        <div class="list-card-header">
          <p class="list-card-title">Description</p>
        </div>
        <div class="p-3">
          <p style="margin:0;font-size:13px;color:var(--text-muted);">{{ $course->description ?? 'A comprehensive program covering frontend, backend, and deployment — designed to take students from beginner to job-ready full stack developer.' }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
