@extends('layouts.admin')

@section('title', 'Enrollment Details')
@section('page-title', 'Enrollment Details')
@section('page-subtitle', 'View enrollment information')

@section('content')

<div class="page-header">
    <div>
        <h2>{{ $enrollment['student'] }}</h2>
        <p>{{ $enrollment['course'] }} · {{ $enrollment['batch'] }}</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.enrollments.edit', $enrollment['id']) }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('admin.enrollments.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-8">
        <div class="form-card mb-3">
            <div class="form-section-title">Student Information</div>
            <div class="row g-3">
                <div class="col-md-6">
                    <p><span class="text-muted">Student Name:</span> <strong>{{ $enrollment['student'] }}</strong></p>
                    <p><span class="text-muted">Email:</span> <strong>{{ $enrollment['email'] }}</strong></p>
                    <p><span class="text-muted">Course:</span> <strong>{{ $enrollment['course'] }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="text-muted">Batch:</span> <strong>{{ $enrollment['batch'] }}</strong></p>
                    <p><span class="text-muted">Enrolled Date:</span> <strong>{{ date('d M, Y', strtotime($enrollment['enrolled_date'])) }}</strong></p>
                    <p><span class="text-muted">Status:</span> <span class="status-badge {{ $enrollment['status'] == 'active' ? 'confirmed' : ($enrollment['status'] == 'pending' ? 'pending' : 'cancelled') }}">{{ $enrollment['status'] }}</span></p>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-section-title">Progress Details</div>
            <div class="row g-3">
                <div class="col-md-4">
                    <p><span class="text-muted">Progress:</span> <strong>{{ $enrollment['progress'] }}%</strong></p>
                </div>
                <div class="col-md-4">
                    <p><span class="text-muted">Modules Completed:</span> <strong>{{ $enrollment['modules_completed'] ?? 0 }} / {{ $enrollment['total_modules'] ?? 10 }}</strong></p>
                </div>
                <div class="col-md-4">
                    <p><span class="text-muted">Last Activity:</span> <strong>{{ isset($enrollment['last_activity']) ? date('d M, Y', strtotime($enrollment['last_activity'])) : 'N/A' }}</strong></p>
                </div>
            </div>
            <div class="mt-2" style="width:100%;">
                <div class="progress-bar-bg" style="height:8px;border-radius:10px;">
                    <div class="progress-bar-fill" style="width:{{ $enrollment['progress'] }}%;height:8px;border-radius:10px;background:{{ $enrollment['progress'] >= 70 ? '#059669' : ($enrollment['progress'] >= 40 ? '#d97706' : '#dc2626') }};"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="list-card mb-3">
            <div class="list-card-header">
                <p class="list-card-title">Course Modules</p>
            </div>
            <div class="p-3">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Total Modules:</span>
                    <span style="font-weight:600;">{{ $enrollment['total_modules'] ?? 10 }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Completed:</span>
                    <span style="font-weight:600;color:#059669;">{{ $enrollment['modules_completed'] ?? 0 }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Remaining:</span>
                    <span style="font-weight:600;color:#d97706;">{{ ($enrollment['total_modules'] ?? 10) - ($enrollment['modules_completed'] ?? 0) }}</span>
                </div>
            </div>
        </div>

        <div class="list-card">
            <div class="list-card-header">
                <p class="list-card-title">Quick Actions</p>
            </div>
            <div class="p-3">
                <a href="#" class="btn-primary-custom w-100 justify-content-center mb-2" style="font-size:13px;padding:8px;">
                    <i class="fas fa-envelope"></i> Send Reminder
                </a>
                <a href="#" class="btn-primary-custom w-100 justify-content-center" style="background:#f3f4f6;color:var(--text-main);font-size:13px;padding:8px;">
                    <i class="fas fa-file-certificate"></i> Generate Certificate
                </a>
            </div>
        </div>
    </div>
</div>

@endsection