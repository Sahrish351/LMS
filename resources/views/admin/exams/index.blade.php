@extends('layouts.admin')
@section('title','Exams')
@section('page-title','Exams')
@section('page-subtitle','EduAdmin LMS Platform')
 
@section('content')
<div class="page-header">
  <div><h2>Exam Management</h2><p>{{ $totalExams ?? 28 }} exams across all courses</p></div>
  <a href="{{ route('admin.exams.create') }}" class="btn-primary-custom"><i class="fas fa-plus"></i> Create Exam</a>
</div>
 
<div class="row g-3 mb-3">
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-file-signature" style="color:#7c3aed;"></i></div>
      <div class="stat-value">{{ $totalExams ?? 28 }}</div><div class="stat-label">Total Exams</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-clock" style="color:#d97706;"></i></div>
      <div class="stat-value" style="color:#d97706;">{{ $upcomingExams ?? 6 }}</div><div class="stat-label">Upcoming</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-check-double" style="color:#059669;"></i></div>
      <div class="stat-value" style="color:#059669;">{{ $completedExams ?? 22 }}</div><div class="stat-label">Completed</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card">
      <div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-percentage" style="color:#0891b2;"></i></div>
      <div class="stat-value" style="color:#0891b2;">76.4%</div><div class="stat-label">Avg. Pass Rate</div>
    </div>
  </div>
</div>
 
<div class="data-table-card">
  <div class="data-table-header">
    <div class="search-box"><i class="fas fa-search"></i>
      <input type="text" placeholder="Search exams..." onkeyup="filterTable(this,'examsTable')">
    </div>
  </div>
  <div class="table-responsive">
    <table class="table mb-0" id="examsTable">
      <thead><tr><th>Exam</th><th>Course</th><th>Batch</th><th>Date</th><th>Duration</th><th>Total Marks</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
        @forelse(($exams ?? []) as $exam)
        <tr>
          <td style="font-weight:600;">{{ $exam->title }}</td>
          <td>{{ $exam->course_name }}</td><td>{{ $exam->batch_name }}</td><td>{{ $exam->date }}</td>
          <td>{{ $exam->duration }} min</td><td>{{ $exam->total_marks }}</td>
          <td><span class="status-badge {{ $exam->status=='Completed'?'completed':($exam->status=='Upcoming'?'pending':'confirmed') }}">{{ $exam->status }}</span></td>
          <td>
            <a href="{{ route('admin.exams.show',$exam->id) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a>
            <a href="{{ route('admin.exams.edit',$exam->id) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a>
            <form id="del-e-{{ $exam->id }}" action="{{ route('admin.exams.destroy',$exam->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-light text-danger" onclick="confirmDelete('del-e-{{ $exam->id }}','Delete exam?')"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td style="font-weight:600;">Mid-Term Assessment</td><td>Full Stack Web Dev</td><td>Batch Jan-25</td><td>Jul 15, 2026</td><td>90 min</td><td>100</td>
          <td><span class="status-badge pending">Upcoming</span></td>
          <td><a href="{{ route('admin.exams.show',1) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a> <a href="{{ route('admin.exams.edit',1) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Python Fundamentals Test</td><td>Data Science Python</td><td>Batch Feb-25</td><td>Jul 30, 2026</td><td>60 min</td><td>50</td>
          <td><span class="status-badge confirmed">Live</span></td>
          <td><a href="{{ route('admin.exams.show',2) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a> <a href="{{ route('admin.exams.edit',2) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Final Examination</td><td>UI/UX Design</td><td>Batch Dec-24</td><td>May 20, 2026</td><td>120 min</td><td>100</td>
          <td><span class="status-badge completed">Completed</span></td>
          <td><a href="{{ route('admin.exams.show',3) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a> <a href="{{ route('admin.exams.edit',3) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
 