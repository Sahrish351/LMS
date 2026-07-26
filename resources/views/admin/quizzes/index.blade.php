@extends('layouts.admin')
@section('title','Quizzes')
@section('page-title','Quizzes')
@section('page-subtitle','EduAdmin LMS Platform')
 
@section('content')
<div class="page-header">
  <div><h2>Quiz Management</h2><p>{{ $totalQuizzes ?? 86 }} quizzes embedded across lessons</p></div>
  <a href="{{ route('admin.quizzes.create') }}" class="btn-primary-custom"><i class="fas fa-plus"></i> Create Quiz</a>
</div>
 
<div class="row g-3 mb-3">
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-question-circle" style="color:#7c3aed;"></i></div><div class="stat-value">{{ $totalQuizzes ?? 86 }}</div><div class="stat-label">Total Quizzes</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-redo" style="color:#059669;"></i></div><div class="stat-value" style="color:#059669;">4,218</div><div class="stat-label">Total Attempts</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-percentage" style="color:#d97706;"></i></div><div class="stat-value" style="color:#d97706;">71.8%</div><div class="stat-label">Avg. Score</div></div>
  </div>
  <div class="col-6 col-md-3">
    <div class="stat-card"><div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-list-ol" style="color:#0891b2;"></i></div><div class="stat-value" style="color:#0891b2;">12</div><div class="stat-label">Avg. Questions/Quiz</div></div>
  </div>
</div>
 
<div class="data-table-card">
  <div class="data-table-header">
    <div class="search-box"><i class="fas fa-search"></i><input type="text" placeholder="Search quizzes..." onkeyup="filterTable(this,'quizTable')"></div>
  </div>
  <div class="table-responsive">
    <table class="table mb-0" id="quizTable">
      <thead><tr><th>Quiz</th><th>Course / Lesson</th><th>Questions</th><th>Attempts</th><th>Avg. Score</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
        @forelse(($quizzes ?? []) as $q)
        <tr>
          <td style="font-weight:600;">{{ $q->title }}</td><td>{{ $q->lesson_name }}</td>
          <td>{{ $q->questions_count }}</td><td>{{ $q->attempts }}</td><td>{{ $q->avg_score }}%</td>
          <td><span class="status-badge {{ $q->status=='Published'?'confirmed':'pending' }}">{{ $q->status }}</span></td>
          <td>
            <a href="{{ route('admin.quizzes.edit',$q->id) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a>
            <form id="del-q-{{ $q->id }}" action="{{ route('admin.quizzes.destroy',$q->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-light text-danger" onclick="confirmDelete('del-q-{{ $q->id }}','Delete quiz?')"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td style="font-weight:600;">CSS Flexbox Quiz</td><td>Full Stack Web Dev · Module 1</td><td>10</td><td>423</td><td>78%</td>
          <td><span class="status-badge confirmed">Published</span></td>
          <td><a href="{{ route('admin.quizzes.edit',1) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Python Data Types Quiz</td><td>Data Science Python · Module 1</td><td>15</td><td>356</td><td>69%</td>
          <td><span class="status-badge confirmed">Published</span></td>
          <td><a href="{{ route('admin.quizzes.edit',2) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <tr>
          <td style="font-weight:600;">Design Principles Quiz</td><td>UI/UX Design · Module 2</td><td>8</td><td>0</td><td>—</td>
          <td><span class="status-badge pending">Draft</span></td>
          <td><a href="{{ route('admin.quizzes.edit',3) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a> <button class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection