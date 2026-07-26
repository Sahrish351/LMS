@extends('layouts.admin')
@section('title','Assignment Submissions')
@section('page-title','Assignment Submissions')
@section('page-subtitle','Assignment Management')
 
@section('content')
<div class="page-header">
  <div>
    <h2>{{ $assignment->title ?? 'Build a Responsive Portfolio' }}</h2>
    <p>{{ $assignment->course_name ?? 'Full Stack Web Development' }} · Due {{ $assignment->due_date ?? 'Jul 20, 2026' }}</p>
  </div>
  <a href="{{ route('admin.assignments.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-arrow-left"></i> Back</a>
</div>
 
<div class="row g-3 mb-3">
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-paper-plane" style="color:#7c3aed;"></i></div><div class="stat-value">38</div><div class="stat-label">Submitted</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-check-circle" style="color:#059669;"></i></div><div class="stat-value" style="color:#059669;">26</div><div class="stat-label">Graded</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-hourglass-half" style="color:#d97706;"></i></div><div class="stat-value" style="color:#d97706;">12</div><div class="stat-label">Pending Review</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#fee2e2;"><i class="fas fa-times-circle" style="color:#dc2626;"></i></div><div class="stat-value" style="color:#dc2626;">9</div><div class="stat-label">Missing</div></div>
  </div>
</div>
 
<div class="list-card">
  <div class="list-card-header">
    <p class="list-card-title">Student Submissions</p>
    <div class="search-box" style="max-width:220px;"><i class="fas fa-search"></i><input type="text" placeholder="Search..."></div>
  </div>
 
  <!-- Graded row -->
  <div class="list-item">
    <div class="avatar-circle" style="background:#7c3aed;">AP</div>
    <div class="list-item-main">
      <div class="list-item-name">Aisha Patel</div>
      <div class="list-item-sub">Submitted Jul 18 · portfolio-final.zip</div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <span class="status-badge confirmed">Graded · 92/100</span>
      <a href="#" class="btn btn-sm btn-light"><i class="fas fa-download"></i></a>
    </div>
  </div>
 
  <!-- Pending row -->
  <div class="list-item">
    <div class="avatar-circle" style="background:#0891b2;">RV</div>
    <div class="list-item-main">
      <div class="list-item-name">Rohit Verma</div>
      <div class="list-item-sub">Submitted Jul 19 · my-portfolio.zip</div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <span class="status-badge pending">Pending Review</span>
      <a href="#" class="btn btn-sm btn-light"><i class="fas fa-download"></i></a>
      <button class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#gradeModal" data-student="Rohit Verma" data-submission="2">Grade</button>
    </div>
  </div>
 
  <!-- Missing row -->
  <div class="list-item">
    <div class="avatar-circle" style="background:#059669;">KN</div>
    <div class="list-item-main">
      <div class="list-item-name">Kavya Nair</div>
      <div class="list-item-sub">No submission yet</div>
    </div>
    <span class="status-badge cancelled">Missing</span>
  </div>
</div>
 
<!-- Grade Modal -->
<div class="modal fade" id="gradeModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('admin.assignments.grade', 0) }}" method="POST">
        @csrf
        <input type="hidden" name="submission_id" id="submissionId">
        <div class="modal-header">
          <h5 class="modal-title">Grade Submission — <span id="gradingStudent"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <label class="form-label">Marks Obtained</label>
          <input type="number" name="marks" class="form-control mb-3" placeholder="out of 100" required>
          <label class="form-label">Feedback</label>
          <textarea name="feedback" class="form-control" rows="3" placeholder="Write feedback for the student..."></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn-primary-custom">Submit Grade</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
 
@push('scripts')
<script>
document.getElementById('gradeModal').addEventListener('show.bs.modal', function(e) {
  const btn = e.relatedTarget;
  document.getElementById('gradingStudent').textContent = btn.dataset.student;
  document.getElementById('submissionId').value = btn.dataset.submission;
});
</script>
@endpush