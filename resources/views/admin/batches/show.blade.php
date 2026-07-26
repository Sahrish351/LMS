@extends('layouts.admin')

@section('title', 'Batch Details')
@section('page-title', 'Batch Details')
@section('page-subtitle', 'View batch information')

@section('content')

<div class="page-header">
    <div>
        <h2>{{ $batch['name'] }}</h2>
        <p>{{ $batch['course'] }} · {{ $batch['status'] }}</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.batches.edit', $batch['id']) }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('admin.batches.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-8">
        <div class="form-card mb-3">
            <div class="form-section-title">Batch Information</div>
            <div class="row g-3">
                <div class="col-md-6">
                    <p><span class="text-muted">Batch Name:</span> <strong>{{ $batch['name'] }}</strong></p>
                    <p><span class="text-muted">Course:</span> <strong>{{ $batch['course'] }}</strong></p>
                    <p><span class="text-muted">Instructor:</span> <strong>{{ $batch['instructor'] }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="text-muted">Start Date:</span> <strong>{{ date('d M, Y', strtotime($batch['start_date'])) }}</strong></p>
                    <p><span class="text-muted">End Date:</span> <strong>{{ date('d M, Y', strtotime($batch['end_date'])) }}</strong></p>
                    <p><span class="text-muted">Status:</span> <span class="status-badge {{ $batch['status'] == 'active' ? 'confirmed' : ($batch['status'] == 'upcoming' ? 'pending' : 'cancelled') }}">{{ $batch['status'] }}</span></p>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-section-title">Description</div>
            <p style="color:var(--text-muted);">{{ $batch['description'] ?? 'No description provided.' }}</p>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="list-card mb-3">
            <div class="list-card-header">
                <p class="list-card-title">Students</p>
                <a href="#" class="view-all-link">View all <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="p-3">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Enrolled:</span>
                    <span style="font-weight:600;">{{ $batch['students'] }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Capacity:</span>
                    <span style="font-weight:600;">{{ $batch['capacity'] }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Availability:</span>
                    <span style="font-weight:600;color:{{ ($batch['capacity'] - $batch['students']) > 0 ? '#059669' : '#dc2626' }};">
                        {{ $batch['capacity'] - $batch['students'] }} spots left
                    </span>
                </div>
                <div class="mt-2">
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill" style="width:{{ ($batch['students'] / $batch['capacity']) * 100 }}%;"></div>
                    </div>
                    <span style="font-size:12px;color:var(--text-muted);">{{ round(($batch['students'] / $batch['capacity']) * 100) }}% full</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection