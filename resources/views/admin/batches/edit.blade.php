@extends('layouts.admin')

@section('title', 'Edit Batch')
@section('page-title', 'Edit Batch')
@section('page-subtitle', 'Update batch information')

@section('content')

<div class="page-header">
    <div>
        <h2>Edit Batch</h2>
        <p>Update batch information</p>
    </div>
    <a href="{{ route('admin.batches.index') }}" class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);">
        <i class="fas fa-arrow-left"></i> Back to Batches
    </a>
</div>

<form action="{{ route('admin.batches.update', $batch['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row g-3">
        <!-- LEFT COLUMN -->
        <div class="col-12 col-lg-8">
            <div class="form-card mb-3">
                <div class="form-section-title">
                    <i class="fas fa-info-circle me-2" style="color:#7c3aed;"></i>
                    Batch Details
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Batch Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" 
                               placeholder="e.g. Batch 1 - Web Development" 
                               value="{{ old('name', $batch['name']) }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Course <span class="text-danger">*</span></label>
                        <select name="course_id" class="form-select" required>
                            <option value="">Select Course</option>
                            @foreach($courses ?? ['Full Stack Web Development', 'Data Science with Python', 'UI/UX Design Masterclass', 'Digital Marketing Pro', 'Machine Learning A-Z'] as $course)
                                <option value="{{ $loop->index + 1 }}" {{ old('course_id', $batch['course'] ?? '') == $course ? 'selected' : '' }}>
                                    {{ $course }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Instructor <span class="text-danger">*</span></label>
                        <select name="instructor_id" class="form-select" required>
                            <option value="">Select Instructor</option>
                            @foreach($instructors ?? ['Rajesh Kumar', 'Priya Mehta', 'Amit Sharma', 'Sunita Verma', 'Vikram Singh'] as $instructor)
                                <option value="{{ $loop->index + 1 }}" {{ old('instructor_id', $batch['instructor'] ?? '') == $instructor ? 'selected' : '' }}>
                                    {{ $instructor }}
                                </option>
                            @endforeach
                        </select>
                        @error('instructor_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-card mb-3">
                <div class="form-section-title">
                    <i class="fas fa-calendar-alt me-2" style="color:#7c3aed;"></i>
                    Schedule
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Start Date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" class="form-control" 
                               value="{{ old('start_date', $batch['start_date']) }}" required>
                        @error('start_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End Date <span class="text-danger">*</span></label>
                        <input type="date" name="end_date" class="form-control" 
                               value="{{ old('end_date', $batch['end_date']) }}" required>
                        @error('end_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-card">
                <div class="form-section-title">
                    <i class="fas fa-clipboard-list me-2" style="color:#7c3aed;"></i>
                    Additional Information
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" 
                                  placeholder="Enter batch description or notes...">{{ old('description', $batch['description'] ?? '') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-12 col-lg-4">
            <div class="form-card mb-3">
                <div class="form-section-title">
                    <i class="fas fa-users me-2" style="color:#7c3aed;"></i>
                    Capacity
                </div>
                <label class="form-label">Maximum Students <span class="text-danger">*</span></label>
                <input type="number" name="capacity" class="form-control" 
                       placeholder="e.g. 40" value="{{ old('capacity', $batch['capacity']) }}" required min="1">
                @error('capacity')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <small class="text-muted">Set the maximum number of students allowed in this batch.</small>
            </div>

            <div class="form-card mb-3">
                <div class="form-section-title">
                    <i class="fas fa-tag me-2" style="color:#7c3aed;"></i>
                    Status
                </div>
                <select name="status" class="form-select">
                    <option value="upcoming" {{ old('status', $batch['status']) == 'upcoming' ? 'selected' : '' }}>
                        <i class="fas fa-clock"></i> Upcoming
                    </option>
                    <option value="active" {{ old('status', $batch['status']) == 'active' ? 'selected' : '' }}>
                        <i class="fas fa-play"></i> Active
                    </option>
                    <option value="completed" {{ old('status', $batch['status']) == 'completed' ? 'selected' : '' }}>
                        <i class="fas fa-check"></i> Completed
                    </option>
                </select>
                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn-primary-custom w-100 justify-content-center" style="padding:12px;">
                    <i class="fas fa-save me-2"></i> Update Batch
                </button>
                
                <button type="button" class="btn-primary-custom w-100 justify-content-center" 
                        style="background:#fee2e2;color:#dc2626;border:1px solid #fecaca;"
                        onclick="confirmDelete({{ $batch['id'] }}, '{{ $batch['name'] }}')">
                    <i class="fas fa-trash me-2"></i> Delete Batch
                </button>
                <form id="delete-form-{{ $batch['id'] }}" 
                      action="{{ route('admin.batches.destroy', $batch['id']) }}" 
                      method="POST" 
                      style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
function confirmDelete(id, name) {
    if (confirm(`Are you sure you want to delete batch "${name}"? This action cannot be undone.`)) {
        document.getElementById(`delete-form-${id}`).submit();
    }
}
</script>
@endpush