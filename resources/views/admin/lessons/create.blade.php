@extends('layouts.admin')

@section('title', 'Add Lesson')
@section('page-title', 'Add Lesson')
@section('page-subtitle', 'Lessons')

@section('content')

  <div class="page-header">
    <div>
      <h2>Create New Lesson</h2>
      <p>Add a lesson with video, text content, quizzes, or attachments</p>
    </div>
    <a href="{{ route('admin.lessons.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
      <i class="fas fa-arrow-left"></i> Back
    </a>
  </div>

  <form action="{{ route('admin.lessons.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-3">
      <div class="col-12 col-lg-8">
        <div class="form-card mb-3">
          <div class="form-section-title">Lesson Details</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Course</label>
              <select name="course_id" class="form-select" required>
                <option value="">Select Course</option>
                <option value="1">Full Stack Web Development</option>
                <option value="2">Data Science with Python</option>
                <option value="3">UI/UX Design Masterclass</option>
                <option value="4">Digital Marketing Pro</option>
                <option value="5">Machine Learning A-Z</option>
                <option value="6">Cloud & DevOps Essentials</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Module</label>
              <select name="module_id" class="form-select" required>
                <option value="">Select Module</option>
                <option value="1">Module 1: HTML, CSS & JavaScript Basics</option>
                <option value="2">Module 2: React Fundamentals</option>
                <option value="3">Module 3: Backend with Laravel</option>
                <option value="4">Module 4: Deployment & DevOps</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Lesson Title</label>
              <input type="text" name="title" class="form-control" placeholder="e.g. Introduction to Flexbox" required>
            </div>
          </div>
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Content Type</div>
          <ul class="nav nav-pills mb-3" id="contentTypeTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-video" type="button"><i class="fas fa-video me-1"></i> Video</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-text" type="button"><i class="fas fa-align-left me-1"></i> Text</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-quiz" type="button"><i class="fas fa-question-circle me-1"></i> Quiz</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-attachment" type="button"><i class="fas fa-paperclip me-1"></i> Attachment</button>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-video">
              <label class="form-label">Video URL (YouTube/Vimeo) or Upload</label>
              <input type="text" name="video_url" class="form-control mb-2" placeholder="https://youtube.com/watch?v=...">
              <input type="file" name="video_file" class="form-control" accept="video/*">
              <small class="text-muted">Provide a URL or upload a file (not both required).</small>
            </div>
            <div class="tab-pane fade" id="tab-text">
              <label class="form-label">Lesson Content</label>
              <textarea name="text_content" class="form-control" rows="8" placeholder="Write the lesson content here..."></textarea>
            </div>
            <div class="tab-pane fade" id="tab-quiz">
              <label class="form-label">Quiz Question</label>
              <input type="text" name="quiz_question" class="form-control mb-2" placeholder="e.g. What does CSS stand for?">
              <div class="row g-2 mb-2">
                <div class="col-md-6"><input type="text" name="quiz_option[]" class="form-control" placeholder="Option A"></div>
                <div class="col-md-6"><input type="text" name="quiz_option[]" class="form-control" placeholder="Option B"></div>
                <div class="col-md-6"><input type="text" name="quiz_option[]" class="form-control" placeholder="Option C"></div>
                <div class="col-md-6"><input type="text" name="quiz_option[]" class="form-control" placeholder="Option D"></div>
              </div>
              <label class="form-label">Correct Answer</label>
              <select name="quiz_correct" class="form-select">
                <option value="0">Option A</option>
                <option value="1">Option B</option>
                <option value="2">Option C</option>
                <option value="3">Option D</option>
              </select>
            </div>
            <div class="tab-pane fade" id="tab-attachment">
              <label class="form-label">Attach Files (PDF, slides, code samples, etc.)</label>
              <input type="file" name="attachments[]" class="form-control" multiple>
              <small class="text-muted">You can select multiple files.</small>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <div class="form-card mb-3">
          <div class="form-section-title">Lesson Settings</div>
          <label class="form-label">Duration (minutes)</label>
          <input type="number" name="duration" class="form-control mb-3" placeholder="e.g. 15">
          <label class="form-label">Order in Module</label>
          <input type="number" name="order" class="form-control mb-3" placeholder="1" min="1">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_free_preview" id="freePreview">
            <label class="form-check-label" for="freePreview">Allow as free preview</label>
          </div>
        </div>

        <div class="form-card mb-3">
          <div class="form-section-title">Status</div>
          <select name="status" class="form-select">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
          </select>
        </div>

        <button type="submit" class="btn-primary-custom w-100 justify-content-center">
          <i class="fas fa-save"></i> Save Lesson
        </button>
      </div>
    </div>
  </form>

@endsection

@push('styles')
<style>
  #contentTypeTabs .nav-link {
    color: var(--text-muted);
    font-size: 13px;
    font-weight: 600;
    border-radius: 8px;
    padding: 8px 16px;
  }
  #contentTypeTabs .nav-link.active {
    background: var(--primary);
    color: #fff;
  }
</style>
@endpush
