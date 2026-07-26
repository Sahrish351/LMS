@extends('layouts.admin')
@section('title','Assignments')
@section('page-title','Assignments')
@section('page-subtitle','EduAdmin LMS Platform')
 
@section('content')
<div class="page-header">
  <div><h2>Assignment Management</h2><p>{{ $totalAssignments ?? 64 }} assignments across all courses</p></div>
  <a href="{{ route('admin.assignments.create') }}" class="btn-primary-custom"><i class="fas fa-plus"></i> Create Assignment</a>
</div>
 
<div class="row g-3 mb-3">
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-tasks" style="color:#7c3aed;"></i></div><div class="stat-value">{{ $totalAssignments ?? 64 }}</div><div class="stat-label">Total Assignments</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-clock" style="color:#d97706;"></i></div><div class="stat-value" style="color:#d97706;">{{ $pendingReview ?? 142 }}</div><div class="stat-label">Pending Review</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-check-circle" style="color:#059669;"></i></div><div class="stat-value" style="color:#059669;">{{ $gradedCount ?? 1208 }}</div><div class="stat-label">Graded</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-percentage" style="color:#0891b2;"></i></div><div class="stat-value" style="color:#0891b2;">82.6%</div><div class="stat-label">Avg. Submission Rate</div></div>
  </div>
</div>
 
<div class="data-table-card">
  <div class="data-table-header">
    <div class="search-box"><i class="fas fa-search"></i><input type="text" placeholder="Search assignments..." onkeyup="filterTable(this,'assignTable')"></div>
  </div>
  <div class="table-responsive">
    <table class="table mb-0" id="assignTable">
      <thead><tr><th>Assignment</th><th>Course</th><th>Due Date</th><th>Submissions</th><th>Pending Review</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
        @forelse(($assignments ?? []) as $a)
        <tr>
          <td style="font-weight:600;">{{ $a->title }}</td><td>{{ $a->course_name }}</td><td>{{ $a->due_date }}</td>
          <td>{{ $a->submissions }}/{{ $a->total_students }}</td>
          <td>@if($a->pending_review > 0)<span class="status-badge pending">{{ $a->pending_review }} pending</span>@else<span class="status-badge confirmed">All graded</span>@endif</td>
          <td><span class="status-badge {{ $a->status=='Open'?'confirmed':'cancelled' }}">{{ $a->status }}</span></td>
          <td>
            <a href="{{ route('admin.assignments.show',$a->id) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a>
            <a href="{{ route('admin.assignments.edit',$a->id) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a>
            <form id="del-a-{{ $a->id }}" action="{{ route('admin.assignments.destroy',$a->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-light text-danger" onclick="confirmDelete('del-a-{{ $a->id }}','Delete assignment?')"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td style="font-weight:600;">Build a Responsive Portfolio</td><td>Full Stack Web Dev</td><td>Jul 20, 2026</td><td>38/47</td>
          <td><span class="status-badge pending">12 pending</span></td><td><span class="status-badge confirmed">Open</span></td>
          <td><a href="{{ route('admin.assignments.show',1) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a> <a href="{{ route('admin.assignments.edit',1) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Data Cleaning Exercise</td><td>Data Science Python</td><td>Jul 10, 2026</td><td>40/40</td>
          <td><span class="status-badge confirmed">All graded</span></td><td><span class="status-badge cancelled">Closed</span></td>
          <td><a href="{{ route('admin.assignments.show',2) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a> <a href="{{ route('admin.assignments.edit',2) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Wireframe & Prototype Design</td><td>UI/UX Design</td><td>Jul 28, 2026</td><td>15/30</td>
          <td><span class="status-badge pending">15 pending</span></td><td><span class="status-badge confirmed">Open</span></td>
          <td><a href="{{ route('admin.assignments.show',3) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a> <a href="{{ route('admin.assignments.edit',3) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
 