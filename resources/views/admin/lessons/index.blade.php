@extends('layouts.admin')

@section('title', 'Lessons')
@section('page-title', 'Lessons')
@section('page-subtitle', 'EduAdmin LMS Platform')

@section('content')

  <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height:60vh;">
    <div style="width:90px;height:90px;background:#ede9fe;border-radius:20px;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
      <i class="fas fa-file-alt" style="font-size:36px;color:#7c3aed;"></i>
    </div>
    <h2 style="font-size:22px;font-weight:700;color:var(--text-main);margin-bottom:10px;">Lessons</h2>
    <p style="font-size:14px;color:var(--text-muted);max-width:420px;margin-bottom:24px;">
      Build interactive lessons with video, text, quizzes, and attachments.
    </p>
    <a href="{{ route('admin.lessons.create') }}" class="btn-primary-custom" style="padding:11px 28px;font-size:14px;">
      <i class="fas fa-plus"></i> Get Started
    </a>
  </div>

@endsection
