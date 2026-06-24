@extends('layouts.admin')

@section('title', 'Student Profile')
@section('page-title', 'Student Profile')
@section('page-subtitle', 'Student Management')

@section('content')

  <div class="page-header">
    <div>
      <h2>{{ $student->name ?? 'Aisha Patel' }}</h2>
      <p>{{ $student->student_code ?? 'STU-001' }} · Enrolled {{ $student->enrolled_date ?? 'Jan 5, 2025' }}</p>
    </div>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.students.edit', $student->id ?? 1) }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
        <i class="fas fa-edit"></i> Edit
      </a>
      <a href="{{ route('admin.students.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
        <i class="fas fa-arrow-left"></i> Back
      </a>
    </div>
  </div>

  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-book" style="color:#7c3aed;"></i></div>
        <div class="stat-value">{{ $student->course_name ?? 'Full Stack Web Dev' }}</div>
        <div class="stat-label">Current Course</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-chart-line" style="color:#059669;"></i></div>
        <div class="stat-value">{{ $student->progress ?? 68 }}%</div>
        <div class="stat-label">Course Progress</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-rupee-sign" style="color:#d97706;"></i></div>
        <div class="stat-value">₹{{ number_format($student->fees ?? 18500) }}</div>
        <div class="stat-label">Total Fees</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-calendar-check" style="color:#0891b2;"></i></div>
        <div class="stat-value">{{ $student->status ?? 'Active' }}</div>
        <div class="stat-label">Status</div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-12 col-lg-8">
      <div class="list-card mb-3">
        <div class="list-card-header">
          <p class="list-card-title">Course Progress</p>
        </div>
        <div class="p-3">
          <div class="progress-label"><span>{{ $student->course_name ?? 'Full Stack Web Development' }}</span><span style="color:var(--text-muted);">{{ $student->progress ?? 68 }}% complete</span></div>
          <div class="progress-bar-bg" style="height:10px;"><div class="progress-bar-fill" style="width:{{ $student->progress ?? 68 }}%;"></div></div>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box" style="background:#d1fae5;color:#059669;"><i class="fas fa-check"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Module 1: HTML, CSS & JavaScript Basics</div>
            <div class="list-item-sub">Completed on Jan 20, 2025</div>
          </div>
          <span class="status-badge confirmed">completed</span>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box" style="background:#d1fae5;color:#059669;"><i class="fas fa-check"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Module 2: React Fundamentals</div>
            <div class="list-item-sub">Completed on Feb 10, 2025</div>
          </div>
          <span class="status-badge confirmed">completed</span>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box" style="background:#ede9fe;color:#7c3aed;"><i class="fas fa-play"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Module 3: Backend with Laravel</div>
            <div class="list-item-sub">In progress · 45% done</div>
          </div>
          <span class="status-badge pending">in progress</span>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-lock" style="color:var(--text-muted);"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Module 4: Deployment & DevOps</div>
            <div class="list-item-sub">Locked</div>
          </div>
        </div>
      </div>

      <div class="list-card">
        <div class="list-card-header">
          <p class="list-card-title">Payment History</p>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-rupee-sign"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Installment 1</div>
            <div class="list-item-sub">UPI · Jan 5, 2025</div>
          </div>
          <div class="list-item-right">
            <div class="list-item-amount">₹9,500</div>
            <span class="status-badge verified">verified</span>
          </div>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-rupee-sign"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Installment 2</div>
            <div class="list-item-sub">Bank Transfer · Feb 5, 2025</div>
          </div>
          <div class="list-item-right">
            <div class="list-item-amount">₹9,000</div>
            <span class="status-badge verified">verified</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="list-card mb-3">
        <div class="list-card-header">
          <p class="list-card-title">Contact Info</p>
        </div>
        <div class="p-3">
          <p style="margin:0 0 8px;"><i class="fas fa-envelope text-muted me-2"></i>{{ $student->email ?? 'aisha.patel@example.com' }}</p>
          <p style="margin:0 0 8px;"><i class="fas fa-phone text-muted me-2"></i>{{ $student->phone ?? '0301-1234567' }}</p>
          <p style="margin:0;"><i class="fas fa-map-marker-alt text-muted me-2"></i>{{ $student->address ?? 'Karachi, Pakistan' }}</p>
        </div>
      </div>

      <div class="list-card">
        <div class="list-card-header">
          <p class="list-card-title">Batch Information</p>
        </div>
        <div class="p-3">
          <p style="margin:0 0 8px;"><span class="text-muted">Batch:</span> <strong>{{ $student->batch_name ?? 'Batch Jan-25' }}</strong></p>
          <p style="margin:0 0 8px;"><span class="text-muted">Instructor:</span> <strong>Rajesh Kumar</strong></p>
          <p style="margin:0;"><span class="text-muted">Schedule:</span> <strong>Mon, Wed, Fri · 6:00 PM</strong></p>
        </div>
      </div>
    </div>
  </div>

@endsection
