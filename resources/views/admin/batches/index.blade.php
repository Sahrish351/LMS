@extends('layouts.admin')
@section('title','Batches')
@section('page-title','Batches')
@section('page-subtitle','EduAdmin LMS Platform')
 
@section('content')
<div class="page-header">
  <div>
    <h2>Batch Management</h2>
    <p>{{ $totalBatches ?? 48 }} active batches across all courses</p>
  </div>
  <a href="{{ route('admin.batches.create') }}" class="btn-primary-custom"><i class="fas fa-plus"></i> Create Batch</a>
</div>
 
<div class="row g-3 mb-3">
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-calendar-alt" style="color:#7c3aed;"></i></div>
      <div class="stat-value">{{ $totalBatches ?? 48 }}</div>
      <div class="stat-label">Active Batches</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-users" style="color:#059669;"></i></div>
      <div class="stat-value" style="color:#059669;">{{ number_format($totalSeats ?? 1840) }}</div>
      <div class="stat-label">Total Seats Filled</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-hourglass-half" style="color:#d97706;"></i></div>
      <div class="stat-value" style="color:#d97706;">{{ $upcomingBatches ?? 7 }}</div>
      <div class="stat-label">Upcoming Batches</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-check-circle" style="color:#0891b2;"></i></div>
      <div class="stat-value" style="color:#0891b2;">{{ $completedBatches ?? 124 }}</div>
      <div class="stat-label">Completed Batches</div>
    </div>
  </div>
</div>
 
<div class="data-table-card">
  <div class="data-table-header">
    <div class="search-box"><i class="fas fa-search"></i>
      <input type="text" placeholder="Search batches..." onkeyup="filterTable(this,'batchesTable')">
    </div>
  </div>
  <div class="table-responsive">
    <table class="table mb-0" id="batchesTable">
      <thead><tr><th>Batch</th><th>Course</th><th>Instructor</th><th>Start Date</th><th>Seats</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
        @forelse(($batches ?? []) as $batch)
        <tr>
          <td style="font-weight:600;">{{ $batch->name }}</td>
          <td>{{ $batch->course_name }}</td>
          <td>{{ $batch->instructor }}</td>
          <td>{{ $batch->start_date }}</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="progress-bar-bg" style="width:70px;"><div class="progress-bar-fill" style="width:{{ $batch->capacity > 0 ? ($batch->filled/$batch->capacity)*100 : 0 }}%;"></div></div>
              <span style="font-size:12px;color:var(--text-muted);">{{ $batch->filled }}/{{ $batch->capacity }}</span>
            </div>
          </td>
          <td><span class="status-badge {{ $batch->status=='Active'?'confirmed':($batch->status=='Upcoming'?'pending':'completed') }}">{{ $batch->status }}</span></td>
          <td>
            <a href="{{ route('admin.batches.edit',$batch->id) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a>
            <form id="del-b-{{ $batch->id }}" action="{{ route('admin.batches.destroy',$batch->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-light text-danger" onclick="confirmDelete('del-b-{{ $batch->id }}','Delete this batch?')"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td style="font-weight:600;">Batch Jan-25</td><td>Full Stack Web Dev</td><td>Rajesh Kumar</td><td>Jan 1, 2025</td>
          <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:70px;"><div class="progress-bar-fill" style="width:78%;"></div></div><span style="font-size:12px;color:var(--text-muted);">47/60</span></div></td>
          <td><span class="status-badge confirmed">Active</span></td>
          <td><a href="{{ route('admin.batches.edit',1) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Batch Feb-25</td><td>Data Science Python</td><td>Priya Mehta</td><td>Feb 5, 2025</td>
          <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:70px;"><div class="progress-bar-fill" style="width:95%;"></div></div><span style="font-size:12px;color:var(--text-muted);">38/40</span></div></td>
          <td><span class="status-badge confirmed">Active</span></td>
          <td><a href="{{ route('admin.batches.edit',2) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Batch Mar-25</td><td>UI/UX Design</td><td>Amit Sharma</td><td>Mar 1, 2025</td>
          <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:70px;"><div class="progress-bar-fill" style="width:73%;"></div></div><span style="font-size:12px;color:var(--text-muted);">22/30</span></div></td>
          <td><span class="status-badge pending">Upcoming</span></td>
          <td><a href="{{ route('admin.batches.edit',3) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Batch Dec-24</td><td>Digital Marketing Pro</td><td>Sunita Verma</td><td>Dec 1, 2024</td>
          <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:70px;"><div class="progress-bar-fill" style="width:100%;"></div></div><span style="font-size:12px;color:var(--text-muted);">42/42</span></div></td>
          <td><span class="status-badge completed">Completed</span></td>
          <td><a href="{{ route('admin.batches.edit',4) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
 