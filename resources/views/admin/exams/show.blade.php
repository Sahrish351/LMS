@extends('layouts.admin')
@section('title','Exam Results')
@section('page-title','Exam Results')
@section('page-subtitle','Exam Management')
 
@section('content')
<div class="page-header">
  <div>
    <h2>{{ $exam->title ?? 'Mid-Term Assessment' }}</h2>
    <p>{{ $exam->course_name ?? 'Full Stack Web Dev' }} · {{ $exam->date ?? 'Jul 15, 2026' }} · {{ $exam->duration ?? 90 }} min · {{ $exam->total_marks ?? 100 }} marks</p>
  </div>
  <div class="d-flex gap-2">
    <a href="{{ route('admin.exams.edit', $exam->id ?? 1) }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-edit"></i> Edit</a>
    <a href="{{ route('admin.exams.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
</div>
 
<div class="row g-3 mb-3">
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-users" style="color:#7c3aed;"></i></div><div class="stat-value">47</div><div class="stat-label">Attempted</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-check-circle" style="color:#059669;"></i></div><div class="stat-value" style="color:#059669;">38</div><div class="stat-label">Passed</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#fee2e2;"><i class="fas fa-times-circle" style="color:#dc2626;"></i></div><div class="stat-value" style="color:#dc2626;">9</div><div class="stat-label">Failed</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-chart-line" style="color:#0891b2;"></i></div><div class="stat-value" style="color:#0891b2;">74.2</div><div class="stat-label">Avg. Score</div></div>
  </div>
</div>
 
<div class="data-table-card">
  <div class="data-table-header"><p class="list-card-title mb-0">Student Results</p></div>
  <div class="table-responsive">
    <table class="table mb-0">
      <thead><tr><th>Student</th><th>Marks Obtained</th><th>Percentage</th><th>Result</th><th>Submitted At</th></tr></thead>
      <tbody>
        @forelse(($results ?? []) as $r)
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:{{ $r->color }};">{{ $r->initials }}</div>{{ $r->student_name }}</div></td>
          <td style="font-weight:600;">{{ $r->marks }}/{{ $r->total }}</td>
          <td>{{ $r->percentage }}%</td>
          <td><span class="status-badge {{ $r->result=='Pass'?'confirmed':'cancelled' }}">{{ $r->result }}</span></td>
          <td>{{ $r->submitted_at }}</td>
        </tr>
        @empty
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:#7c3aed;">AP</div>Aisha Patel</div></td>
          <td style="font-weight:600;">88/100</td><td>88%</td><td><span class="status-badge confirmed">Pass</span></td><td>Jul 15, 11:24 AM</td>
        </tr>
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:#0891b2;">RV</div>Rohit Verma</div></td>
          <td style="font-weight:600;">34/100</td><td>34%</td><td><span class="status-badge cancelled">Fail</span></td><td>Jul 15, 11:18 AM</td>
        </tr>
        <tr>
          <td><div class="d-flex align-items-center gap-2"><div class="avatar-circle" style="background:#059669;">KN</div>Kavya Nair</div></td>
          <td style="font-weight:600;">92/100</td><td>92%</td><td><span class="status-badge confirmed">Pass</span></td><td>Jul 15, 11:30 AM</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection