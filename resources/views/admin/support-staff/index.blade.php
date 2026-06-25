@extends('layouts.admin')

@section('title', 'Support Staff')
@section('page-title', 'Support Staff')
@section('page-subtitle', 'EduAdmin LMS Platform')

@section('content')

  <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height:60vh;">
    <div style="width:90px;height:90px;background:#ede9fe;border-radius:20px;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
      <i class="fas fa-headset" style="font-size:36px;color:#7c3aed;"></i>
    </div>
    <h2 style="font-size:22px;font-weight:700;color:var(--text-main);margin-bottom:10px;">Support Staff</h2>
    <p style="font-size:14px;color:var(--text-muted);max-width:420px;margin-bottom:24px;">
      Manage support agents, assign roles, and track performance across departments.
    </p>
    <a href="{{ route('admin.support-staff.create') }}" class="btn-primary-custom" style="padding:11px 28px;font-size:14px;">
      <i class="fas fa-plus"></i> Get Started
    </a>
  </div>

@endsection
