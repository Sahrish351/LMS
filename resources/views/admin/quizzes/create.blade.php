@extends('layouts.admin')
@section('title', isset($quiz) ? 'Edit Quiz' : 'Create Quiz')
@section('page-title', isset($quiz) ? 'Edit Quiz' : 'Create Quiz')
@section('page-subtitle','Quiz Management')
 
@section('content')
<div class="page-header">
  <div><h2>{{ isset($quiz) ? 'Edit Quiz' : 'Create New Quiz' }}</h2><p>Build a quiz with multiple choice questions</p></div>
  <a href="{{ route('admin.quizzes.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);"><i class="fas fa-arrow-left"></i> Back</a>
</div>
 
<form action="{{ isset($quiz) ? route('admin.quizzes.update',$quiz->id) : route('admin.quizzes.store') }}" method="POST">
  @csrf
  @if(isset($quiz)) @method('PUT') @endif
 
  <div class="row g-3">
    <div class="col-lg-8">
      <div class="form-card mb-3">
        <div class="form-section-title">Quiz Details</div>
        <div class="row g-3">
          <div class="col-12"><label class="form-label">Quiz Title</label>
            <input type="text" name="title" class="form-control" placeholder="e.g. CSS Flexbox Quiz" value="{{ old('title',$quiz->title ?? '') }}" required>
          </div>
          <div class="col-md-6"><label class="form-label">Course</label>
            <select name="course_id" class="form-select" required>
              <option value="">Select Course</option>
              <option value="1">Full Stack Web Development</option>
              <option value="2">Data Science with Python</option>
              <option value="3">UI/UX Design Masterclass</option>
            </select>
          </div>
          <div class="col-md-6"><label class="form-label">Attach to Lesson</label>
            <select name="lesson_id" class="form-select">
              <option value="">Optional</option>
              <option value="1">Intro to Flexbox</option>
              <option value="2">CSS Grid Layout</option>
            </select>
          </div>
        </div>
      </div>
 
      <div class="form-card" id="questionsWrapper">
        <div class="form-section-title">Questions</div>
        <div class="quiz-question-block border rounded p-3 mb-3" style="border-color:var(--border)!important;">
          <div class="d-flex justify-content-between mb-2">
            <strong style="font-size:13px;">Question 1</strong>
            <button type="button" class="btn btn-sm btn-light text-danger remove-question"><i class="fas fa-trash"></i></button>
          </div>
          <input type="text" name="questions[0][text]" class="form-control mb-2" placeholder="Enter question text">
          <div class="row g-2 mb-2">
            <div class="col-md-6"><input type="text" name="questions[0][options][]" class="form-control" placeholder="Option A"></div>
            <div class="col-md-6"><input type="text" name="questions[0][options][]" class="form-control" placeholder="Option B"></div>
            <div class="col-md-6"><input type="text" name="questions[0][options][]" class="form-control" placeholder="Option C"></div>
            <div class="col-md-6"><input type="text" name="questions[0][options][]" class="form-control" placeholder="Option D"></div>
          </div>
          <label class="form-label">Correct Answer</label>
          <select name="questions[0][correct]" class="form-select">
            <option value="0">Option A</option><option value="1">Option B</option><option value="2">Option C</option><option value="3">Option D</option>
          </select>
        </div>
        <button type="button" class="btn btn-light" id="addQuestionBtn"><i class="fas fa-plus me-1"></i> Add Question</button>
      </div>
    </div>
 
    <div class="col-lg-4">
      <div class="form-card mb-3">
        <div class="form-section-title">Quiz Settings</div>
        <label class="form-label">Time Limit (minutes)</label>
        <input type="number" name="time_limit" class="form-control mb-3" placeholder="e.g. 10">
        <label class="form-label">Passing Score (%)</label>
        <input type="number" name="passing_score" class="form-control" placeholder="60">
      </div>
      <div class="form-card mb-3">
        <div class="form-section-title">Status</div>
        <select name="status" class="form-select">
          <option value="Draft" {{ old('status',$quiz->status ?? '')==='Draft'?'selected':'' }}>Draft</option>
          <option value="Published" {{ old('status',$quiz->status ?? '')==='Published'?'selected':'' }}>Published</option>
        </select>
      </div>
      <button type="submit" class="btn-primary-custom w-100 justify-content-center">
        <i class="fas fa-save"></i> {{ isset($quiz) ? 'Update Quiz' : 'Save Quiz' }}
      </button>
    </div>
  </div>
</form>
@endsection
 
@push('scripts')
<script>
let qIdx = 1;
document.getElementById('addQuestionBtn').addEventListener('click', function(){
  const wrap = document.getElementById('questionsWrapper');
  const block = document.createElement('div');
  block.className = 'quiz-question-block border rounded p-3 mb-3';
  block.style.borderColor = 'var(--border)';
  block.innerHTML = `
    <div class="d-flex justify-content-between mb-2">
      <strong style="font-size:13px;">Question ${qIdx+1}</strong>
      <button type="button" class="btn btn-sm btn-light text-danger remove-question"><i class="fas fa-trash"></i></button>
    </div>
    <input type="text" name="questions[${qIdx}][text]" class="form-control mb-2" placeholder="Enter question text">
    <div class="row g-2 mb-2">
      <div class="col-md-6"><input type="text" name="questions[${qIdx}][options][]" class="form-control" placeholder="Option A"></div>
      <div class="col-md-6"><input type="text" name="questions[${qIdx}][options][]" class="form-control" placeholder="Option B"></div>
      <div class="col-md-6"><input type="text" name="questions[${qIdx}][options][]" class="form-control" placeholder="Option C"></div>
      <div class="col-md-6"><input type="text" name="questions[${qIdx}][options][]" class="form-control" placeholder="Option D"></div>
    </div>
    <label class="form-label">Correct Answer</label>
    <select name="questions[${qIdx}][correct]" class="form-select">
      <option value="0">Option A</option><option value="1">Option B</option><option value="2">Option C</option><option value="3">Option D</option>
    </select>`;
  this.parentElement.insertBefore(block, this);
  qIdx++;
});
document.getElementById('questionsWrapper').addEventListener('click', e => {
  if(e.target.closest('.remove-question')) e.target.closest('.quiz-question-block').remove();
});
</script>
@endpush
 