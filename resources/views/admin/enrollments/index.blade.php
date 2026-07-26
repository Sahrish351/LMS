@extends('layouts.admin')
@section('title','Enrollments')
@section('page-title','Enrollments')
@section('page-subtitle','EduAdmin LMS Platform')
 
@section('content')
<div class="page-header">
  <div><h2>Enrollment Management</h2><p>{{ number_format($totalEnrollments ?? 12847) }} total enrollments</p></div>
  <a href="{{ route('admin.enrollments.create') }}" class="btn-primary-custom"><i class="fas fa-plus"></i> New Enrollment</a>
</div>
 
<div class="row g-3 mb-3">
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-user-plus" style="color:#7c3aed;"></i></div>
      <div class="stat-value">{{ number_format($totalEnrollments ?? 12847) }}</div>
      <div class="stat-label">Total Enrollments</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-check-circle" style="color:#059669;"></i></div>
      <div class="stat-value" style="color:#059669;">{{ number_format($approvedCount ?? 11932) }}</div>
      <div class="stat-label">Approved</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-hourglass-half" style="color:#d97706;"></i></div>
      <div class="stat-value" style="color:#d97706;">{{ $pendingCount ?? 234 }}</div>
      <div class="stat-label">Pending</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#fee2e2;"><i class="fas fa-times-circle" style="color:#dc2626;"></i></div>
      <div class="stat-value" style="color:#dc2626;">{{ $rejectedCount ?? 81 }}</div>
      <div class="stat-label">Rejected</div>
    </div>
  </div>
</div>
 
<div class="data-table-card">
  <div class="data-table-header">
    <div class="search-box"><i class="fas fa-search"></i>
      <input type="text" placeholder="Search enrollments..." onkeyup="filterTable(this,'enrollTable')">
    </div>
    <select class="form-select form-select-sm" style="width:auto;">
      <option>All Status</option><option>Approved</option><option>Pending</option><option>Rejected</option>
    </select>
  </div>
  <div class="table-responsive">
    <table class="table mb-0" id="enrollTable">
      <thead><tr><th>Student</th><th>Course</th><th>Batch</th><th>Enrolled On</th><th>Fees</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
        @forelse(($enrollments ?? []) as $enr)
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:{{ $enr->color }};"> {{ $enr->initials }}</div>{{ $enr->student_name }}</div></td>
          <td>{{ $enr->course_name }}</td><td>{{ $enr->batch_name }}</td><td>{{ $enr->enrolled_date }}</td>
          <td style="font-weight:600;">₹{{ number_format($enr->fees) }}</td>
          <td><span class="status-badge {{ $enr->status=='Approved'?'confirmed':($enr->status=='Pending'?'pending':'cancelled') }}">{{ $enr->status }}</span></td>
          <td>
            @if($enr->status=='Pending')
            <form action="{{ route('admin.enrollments.approve',$enr->id) }}" method="POST" class="d-inline">@csrf @method('PATCH')<button type="submit" class="btn btn-sm" style="background:#d1fae5;color:#059669;border:none;"><i class="fas fa-check"></i></button></form>
            <form action="{{ route('admin.enrollments.reject',$enr->id) }}" method="POST" class="d-inline">@csrf @method('PATCH')<button type="submit" class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border:none;"><i class="fas fa-times"></i></button></form>
            @else
            <a href="{{ route('admin.students.show',$enr->student_id) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a>
            @endif
          </td>
        </tr>
        @empty
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:#7c3aed;">AP</div>Aisha Patel</div></td>
          <td>Full Stack Web Dev</td><td>Batch Jan-25</td><td>Jan 5, 2025</td><td style="font-weight:600;">₹18,500</td>
          <td><span class="status-badge confirmed">Approved</span></td>
          <td><a href="#" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a></td>
        </tr>
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:#0891b2;">RV</div>Rohit Verma</div></td>
          <td>Data Science Python</td><td>Batch Feb-25</td><td>Jan 8, 2025</td><td style="font-weight:600;">₹22,000</td>
          <td><span class="status-badge pending">Pending</span></td>
          <td>
            <button class="btn btn-sm" style="background:#d1fae5;color:#059669;border:none;"><i class="fas fa-check"></i></button>
            <button class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border:none;"><i class="fas fa-times"></i></button>
          </td>
        </tr>
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:#059669;">KN</div>Kavya Nair</div></td>
          <td>UI/UX Design</td><td>Batch Jan-25</td><td>Dec 20, 2024</td><td style="font-weight:600;">₹15,000</td>
          <td><span class="status-badge confirmed">Approved</span></td>
          <td><a href="#" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a></td>
        </tr>
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:#d97706;">AD</div>Arjun Das</div></td>
          <td>Machine Learning</td><td>Batch Mar-25</td><td>Jan 10, 2025</td><td style="font-weight:600;">₹24,000</td>
          <td><span class="status-badge cancelled">Rejected</span></td>
          <td><a href="#" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
 