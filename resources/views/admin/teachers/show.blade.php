@extends('layouts.admin')

@section('title', 'Teacher Profile')
@section('page-title', 'Teacher Profile')
@section('page-subtitle', 'Teacher Management')

@section('content')

  <div class="page-header">
    <div>
      <h2>{{ $teacher->name ?? 'Rajesh Kumar' }}</h2>
      <p>{{ $teacher->specialization ?? 'Web Development' }} · Joined {{ $teacher->joined_date ?? 'Mar 2022' }}</p>
    </div>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.teachers.edit', $teacher->id ?? 1) }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
        <i class="fas fa-edit"></i> Edit
      </a>
      <a href="{{ route('admin.teachers.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
        <i class="fas fa-arrow-left"></i> Back
      </a>
    </div>
  </div>

  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-book" style="color:#7c3aed;"></i></div>
        <div class="stat-value">{{ $teacher->courses_count ?? 5 }}</div>
        <div class="stat-label">Courses Teaching</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-users" style="color:#059669;"></i></div>
        <div class="stat-value">{{ number_format($teacher->students_count ?? 892) }}</div>
        <div class="stat-label">Total Students</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-star" style="color:#d97706;"></i></div>
        <div class="stat-value">{{ $teacher->rating ?? 4.9 }}</div>
        <div class="stat-label">Avg. Rating</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#fce7f3;"><i class="fas fa-rupee-sign" style="color:#ec4899;"></i></div>
        <div class="stat-value">₹{{ $teacher->revenue ?? '1.84L' }}</div>
        <div class="stat-label">Revenue Generated</div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-12 col-lg-8">
      <div class="list-card mb-3">
        <div class="list-card-header">
          <p class="list-card-title">Courses Teaching</p>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-book"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Full Stack Web Development</div>
            <div class="list-item-sub">2,847 students enrolled</div>
          </div>
          <div class="list-item-right">
            <span class="star-row" style="font-size:13px;">★ 4.9</span>
          </div>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-book"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Advanced React Patterns</div>
            <div class="list-item-sub">1,203 students enrolled</div>
          </div>
          <div class="list-item-right">
            <span class="star-row" style="font-size:13px;">★ 4.8</span>
          </div>
        </div>
        <div class="list-item">
          <div class="avatar-icon-box"><i class="fas fa-book"></i></div>
          <div class="list-item-main">
            <div class="list-item-name">Node.js & Express Mastery</div>
            <div class="list-item-sub">876 students enrolled</div>
          </div>
          <div class="list-item-right">
            <span class="star-row" style="font-size:13px;">★ 4.9</span>
          </div>
        </div>
      </div>

      <div class="list-card">
        <div class="list-card-header">
          <p class="list-card-title">Recent Reviews</p>
        </div>
        <div class="p-3" style="border-bottom:1px solid var(--border);">
          <div class="d-flex justify-content-between">
            <strong style="font-size:13.5px;">Aisha Patel</strong>
            <span class="star-row">★★★★★</span>
          </div>
          <p style="margin:6px 0 0;font-size:13px;color:var(--text-muted);">Excellent teaching style, explains complex concepts very clearly.</p>
        </div>
        <div class="p-3">
          <div class="d-flex justify-content-between">
            <strong style="font-size:13.5px;">Farhan Sheikh</strong>
            <span class="star-row">★★★★★</span>
          </div>
          <p style="margin:6px 0 0;font-size:13px;color:var(--text-muted);">Best instructor for web development, very responsive to questions.</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="list-card mb-3">
        <div class="list-card-header">
          <p class="list-card-title">Contact Info</p>
        </div>
        <div class="p-3">
          <p style="margin:0 0 8px;"><i class="fas fa-envelope text-muted me-2"></i>{{ $teacher->email ?? 'rajesh.kumar@example.com' }}</p>
          <p style="margin:0;"><i class="fas fa-phone text-muted me-2"></i>{{ $teacher->phone ?? '0301-9876543' }}</p>
        </div>
      </div>

      <div class="list-card">
        <div class="list-card-header">
          <p class="list-card-title">Earnings Summary</p>
        </div>
        <div class="p-3">
          <p style="margin:0 0 8px;"><span class="text-muted">This Month:</span> <strong>₹24,500</strong></p>
          <p style="margin:0 0 8px;"><span class="text-muted">Commission Rate:</span> <strong>70%</strong></p>
          <p style="margin:0;"><span class="text-muted">Total Earned:</span> <strong>₹{{ $teacher->revenue ?? '1.84L' }}</strong></p>
        </div>
      </div>
    </div>
  </div>

@endsection
