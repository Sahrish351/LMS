@extends('layouts.admin')
@section('title','Live Classes')
@section('page-title','Live Classes')
@section('page-subtitle','EduAdmin LMS Platform')
 
@section('content')
<div class="page-header">
  <div><h2>Live Classes</h2><p>Schedule and manage live teaching sessions</p></div>
  <a href="{{ route('admin.live-classes.create') }}" class="btn-primary-custom"><i class="fas fa-plus"></i> Schedule Class</a>
</div>
 
<div class="row g-3 mb-3">
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#fee2e2;"><i class="fas fa-broadcast-tower" style="color:#dc2626;"></i></div><div class="stat-value" style="color:#dc2626;">{{ $liveNow ?? 2 }}</div><div class="stat-label">Live Now</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-clock" style="color:#d97706;"></i></div><div class="stat-value" style="color:#d97706;">{{ $upcomingClasses ?? 12 }}</div><div class="stat-label">Upcoming Today</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-video" style="color:#059669;"></i></div><div class="stat-value" style="color:#059669;">{{ $completedClasses ?? 246 }}</div><div class="stat-label">Sessions Held</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-users" style="color:#0891b2;"></i></div><div class="stat-value" style="color:#0891b2;">84%</div><div class="stat-label">Avg. Attendance</div></div>
  </div>
</div>
 
<div class="data-table-card">
  <div class="data-table-header">
    <div class="search-box"><i class="fas fa-search"></i><input type="text" placeholder="Search classes..." onkeyup="filterTable(this,'liveTable')"></div>
  </div>
  <div class="table-responsive">
    <table class="table mb-0" id="liveTable">
      <thead><tr><th>Session</th><th>Course / Batch</th><th>Instructor</th><th>Date & Time</th><th>Platform</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
        @forelse(($classes ?? []) as $c)
        <tr>
          <td style="font-weight:600;">{{ $c->title }}</td><td>{{ $c->batch_name }}</td><td>{{ $c->instructor }}</td>
          <td>{{ $c->datetime }}</td><td><i class="fas fa-video me-1"></i>{{ $c->platform }}</td>
          <td>
            @if($c->status=='Live')<span class="status-badge cancelled"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;color:#dc2626;"></i>Live</span>
            @elseif($c->status=='Upcoming')<span class="status-badge pending">Upcoming</span>
            @else<span class="status-badge confirmed">Completed</span>@endif
          </td>
          <td>
            @if($c->status=='Live')<a href="{{ $c->join_url }}" target="_blank" class="btn btn-sm" style="background:#dc2626;color:#fff;"><i class="fas fa-video"></i> Join</a>
            @else
            <a href="{{ route('admin.live-classes.edit',$c->id) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a>
            <form id="del-lc-{{ $c->id }}" action="{{ route('admin.live-classes.destroy',$c->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-light text-danger" onclick="confirmDelete('del-lc-{{ $c->id }}','Cancel this class?')"><i class="fas fa-trash"></i></button>
            </form>
            @endif
          </td>
        </tr>
        @empty
        <tr>
          <td style="font-weight:600;">React Hooks Deep Dive</td><td>Full Stack Web Dev · Batch Jan-25</td><td>Rajesh Kumar</td>
          <td>Today, 6:00 PM</td><td><i class="fas fa-video me-1"></i>Zoom</td>
          <td><span class="status-badge cancelled"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;color:#dc2626;"></i>Live</span></td>
          <td><a href="#" target="_blank" class="btn btn-sm" style="background:#dc2626;color:#fff;"><i class="fas fa-video"></i> Join</a></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Pandas Data Manipulation</td><td>Data Science Python · Batch Feb-25</td><td>Priya Mehta</td>
          <td>Today, 8:00 PM</td><td><i class="fas fa-video me-1"></i>Google Meet</td>
          <td><span class="status-badge pending">Upcoming</span></td>
          <td><a href="{{ route('admin.live-classes.edit',2) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Figma Prototyping Workshop</td><td>UI/UX Design · Batch Dec-24</td><td>Amit Sharma</td>
          <td>Jun 27, 5:00 PM</td><td><i class="fas fa-video me-1"></i>Zoom</td>
          <td><span class="status-badge confirmed">Completed</span></td>
          <td><a href="{{ route('admin.live-classes.edit',3) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
 