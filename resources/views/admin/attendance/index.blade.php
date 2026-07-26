@extends('layouts.admin')

@section('title', 'Attendance Management')
@section('page-title', 'Attendance Management')
@section('page-subtitle', 'Track student attendance')

@section('content')

<div class="page-header">
    <div>
        <h2>Attendance Management</h2>
        <p>Track student attendance</p>
    </div>
    <div class="d-flex gap-2">
        <form action="{{ route('admin.attendance.store') }}" method="POST" class="d-inline" id="attendanceForm">
            @csrf
            <button type="submit" class="btn-primary-custom" style="background:#059669;">
                <i class="fas fa-save"></i> Save Attendance
            </button>
        </form>
    </div>
</div>

<!-- ===== STATS CARDS ===== -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:#ede9fe;">
                <i class="fas fa-users" style="color:#7c3aed;"></i>
            </div>
            <div class="stat-value" style="color:#7c3aed;">{{ $totalStudentsInBatch ?? 47 }}</div>
            <div class="stat-label">Total Students</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:#d1fae5;">
                <i class="fas fa-user-check" style="color:#059669;"></i>
            </div>
            <div class="stat-value" style="color:#059669;">{{ $presentToday ?? 41 }}</div>
            <div class="stat-label">Present Today</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:#fee2e2;">
                <i class="fas fa-user-times" style="color:#dc2626;"></i>
            </div>
            <div class="stat-value" style="color:#dc2626;">{{ $absentToday ?? 6 }}</div>
            <div class="stat-label">Absent Today</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:#fef3c7;">
                <i class="fas fa-percent" style="color:#d97706;"></i>
            </div>
            <div class="stat-value" style="color:#d97706;">87%</div>
            <div class="stat-label">Attendance Rate</div>
        </div>
    </div>
</div>

<!-- ===== FILTER SECTION ===== -->
<div class="data-table-card mb-3">
    <div class="p-3">
        <div class="row g-2 align-items-center">
            <div class="col-12 col-md-4">
                <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-muted);margin-bottom:4px;">Batch</label>
                <select name="batch_id" class="form-select form-select-sm" style="font-size:13px;padding:8px 12px;border-radius:8px;">
                    <option value="">All Batches</option>
                    <option value="1">Batch 1 - Web Development</option>
                    <option value="2">Batch 2 - Data Science</option>
                    <option value="3">Batch 3 - UI/UX Design</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-muted);margin-bottom:4px;">Date</label>
                <input type="date" name="date" class="form-control form-control-sm" value="{{ date('Y-m-d') }}" style="font-size:13px;padding:8px 12px;border-radius:8px;">
            </div>
            <div class="col-12 col-md-4 d-flex align-items-end">
                <button class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);border:1.5px solid var(--border);padding:8px 20px;font-size:13px;border-radius:8px;width:100%;">
                    <i class="fas fa-search"></i> Filter
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ===== TABLE ===== -->
<div class="data-table-card">
    <div class="table-responsive" style="max-height:500px;overflow-y:auto;">
        <table class="table table-hover mb-0" style="font-size:14px;min-width:700px;">
            <thead style="position:sticky;top:0;background:#f9fafb;z-index:10;">
                <tr>
                    <th style="width:50px;padding:12px 10px;text-align:center;">#</th>
                    <th style="padding:12px 15px;min-width:160px;">Student</th>
                    <th style="padding:12px 15px;min-width:140px;">Course</th>
                    <th style="padding:12px 15px;min-width:100px;">Batch</th>
                    <th style="padding:12px 15px;min-width:120px;">Status</th>
                    <th style="padding:12px 15px;text-align:center;min-width:200px;">Mark Attendance</th>
                </tr>
            </thead>
            <tbody>
                @forelse(($students ?? []) as $index => $student)
                <tr style="border-bottom:1px solid #f3f4f6;">
                    <td style="padding:14px 10px;text-align:center;font-weight:700;font-size:15px;color:#7c3aed;">{{ $index + 1 }}</td>
                    <td style="padding:14px 15px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-circle" style="width:36px;height:36px;font-size:13px;background:#7c3aed;">
                                {{ substr($student['name'] ?? 'SA', 0, 2) }}
                            </div>
                            <div>
                                <div style="font-weight:600;font-size:14px;">{{ $student['name'] ?? 'Student Name' }}</div>
                                <div style="font-size:12px;color:var(--text-muted);">{{ $student['email'] ?? 'student@email.com' }}</div>
                            </div>
                        </div>
                    </td>
                    <td style="padding:14px 15px;">
                        <span style="background:#f3f4f6;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:500;display:inline-block;">
                            {{ $student['course'] ?? 'Web Development' }}
                        </span>
                    </td>
                    <td style="padding:14px 15px;">
                        <span style="background:#ede9fe;color:#7c3aed;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:600;">
                            {{ $student['batch'] ?? 'Batch 1' }}
                        </span>
                    </td>
                    <td style="padding:14px 15px;">
                        <span class="status-badge confirmed" style="font-size:12px;padding:4px 14px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;">
                            <i class="fas fa-check-circle" style="font-size:11px;"></i>
                            Present
                        </span>
                    </td>
                    <td style="padding:14px 15px;text-align:center;">
                        <div class="btn-group btn-group-sm" role="group" style="gap:4px;">
                            <input type="radio" class="btn-check" name="attendance[{{ $student['id'] ?? 1 }}]" id="present-{{ $student['id'] ?? 1 }}" value="present" checked autocomplete="off">
                            <label class="btn btn-sm" style="background:#d1fae5;color:#059669;border:1px solid #a7f3d0;border-radius:6px 0 0 6px;padding:4px 12px;font-size:12px;cursor:pointer;" for="present-{{ $student['id'] ?? 1 }}">
                                <i class="fas fa-check"></i> P
                            </label>
                            
                            <input type="radio" class="btn-check" name="attendance[{{ $student['id'] ?? 1 }}]" id="absent-{{ $student['id'] ?? 1 }}" value="absent" autocomplete="off">
                            <label class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border:1px solid #fecaca;border-radius:0;padding:4px 12px;font-size:12px;cursor:pointer;" for="absent-{{ $student['id'] ?? 1 }}">
                                <i class="fas fa-times"></i> A
                            </label>
                            
                            <input type="radio" class="btn-check" name="attendance[{{ $student['id'] ?? 1 }}]" id="late-{{ $student['id'] ?? 1 }}" value="late" autocomplete="off">
                            <label class="btn btn-sm" style="background:#fef3c7;color:#d97706;border:1px solid #fde68a;border-radius:0 6px 6px 0;padding:4px 12px;font-size:12px;cursor:pointer;" for="late-{{ $student['id'] ?? 1 }}">
                                <i class="fas fa-clock"></i> L
                            </label>
                        </div>
                    </td>
                </tr>
                @empty
                <!-- Demo Data -->
                <tr style="border-bottom:1px solid #f3f4f6;">
                    <td style="padding:14px 10px;text-align:center;font-weight:700;font-size:15px;color:#7c3aed;">1</td>
                    <td style="padding:14px 15px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-circle" style="width:36px;height:36px;font-size:13px;background:#7c3aed;">AP</div>
                            <div>
                                <div style="font-weight:600;font-size:14px;">Aisha Patel</div>
                                <div style="font-size:12px;color:var(--text-muted);">aisha@email.com</div>
                            </div>
                        </div>
                    </td>
                    <td style="padding:14px 15px;"><span style="background:#f3f4f6;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:500;">Web Development</span></td>
                    <td style="padding:14px 15px;"><span style="background:#ede9fe;color:#7c3aed;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:600;">Batch 1</span></td>
                    <td style="padding:14px 15px;">
                        <span class="status-badge confirmed" style="font-size:12px;padding:4px 14px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;">
                            <i class="fas fa-check-circle" style="font-size:11px;"></i> Present
                        </span>
                    </td>
                    <td style="padding:14px 15px;text-align:center;">
                        <div class="btn-group btn-group-sm" role="group" style="gap:4px;">
                            <input type="radio" class="btn-check" name="attendance[1]" id="present-1" value="present" checked>
                            <label class="btn btn-sm" style="background:#d1fae5;color:#059669;border:1px solid #a7f3d0;border-radius:6px 0 0 6px;padding:4px 12px;font-size:12px;cursor:pointer;" for="present-1"><i class="fas fa-check"></i> P</label>
                            <input type="radio" class="btn-check" name="attendance[1]" id="absent-1" value="absent">
                            <label class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border:1px solid #fecaca;border-radius:0;padding:4px 12px;font-size:12px;cursor:pointer;" for="absent-1"><i class="fas fa-times"></i> A</label>
                            <input type="radio" class="btn-check" name="attendance[1]" id="late-1" value="late">
                            <label class="btn btn-sm" style="background:#fef3c7;color:#d97706;border:1px solid #fde68a;border-radius:0 6px 6px 0;padding:4px 12px;font-size:12px;cursor:pointer;" for="late-1"><i class="fas fa-clock"></i> L</label>
                        </div>
                    </td>
                </tr>
                <tr style="border-bottom:1px solid #f3f4f6;">
                    <td style="padding:14px 10px;text-align:center;font-weight:700;font-size:15px;color:#7c3aed;">2</td>
                    <td style="padding:14px 15px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-circle" style="width:36px;height:36px;font-size:13px;background:#0891b2;">FS</div>
                            <div>
                                <div style="font-weight:600;font-size:14px;">Farhan Sheikh</div>
                                <div style="font-size:12px;color:var(--text-muted);">farhan@email.com</div>
                            </div>
                        </div>
                    </td>
                    <td style="padding:14px 15px;"><span style="background:#f3f4f6;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:500;">Data Science</span></td>
                    <td style="padding:14px 15px;"><span style="background:#ede9fe;color:#7c3aed;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:600;">Batch 2</span></td>
                    <td style="padding:14px 15px;">
                        <span class="status-badge pending" style="font-size:12px;padding:4px 14px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;">
                            <i class="fas fa-clock" style="font-size:11px;"></i> Late
                        </span>
                    </td>
                    <td style="padding:14px 15px;text-align:center;">
                        <div class="btn-group btn-group-sm" role="group" style="gap:4px;">
                            <input type="radio" class="btn-check" name="attendance[2]" id="present-2" value="present">
                            <label class="btn btn-sm" style="background:#d1fae5;color:#059669;border:1px solid #a7f3d0;border-radius:6px 0 0 6px;padding:4px 12px;font-size:12px;cursor:pointer;" for="present-2"><i class="fas fa-check"></i> P</label>
                            <input type="radio" class="btn-check" name="attendance[2]" id="absent-2" value="absent">
                            <label class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border:1px solid #fecaca;border-radius:0;padding:4px 12px;font-size:12px;cursor:pointer;" for="absent-2"><i class="fas fa-times"></i> A</label>
                            <input type="radio" class="btn-check" name="attendance[2]" id="late-2" value="late" checked>
                            <label class="btn btn-sm" style="background:#fef3c7;color:#d97706;border:1px solid #fde68a;border-radius:0 6px 6px 0;padding:4px 12px;font-size:12px;cursor:pointer;" for="late-2"><i class="fas fa-clock"></i> L</label>
                        </div>
                    </td>
                </tr>
                <tr style="border-bottom:1px solid #f3f4f6;">
                    <td style="padding:14px 10px;text-align:center;font-weight:700;font-size:15px;color:#7c3aed;">3</td>
                    <td style="padding:14px 15px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-circle" style="width:36px;height:36px;font-size:13px;background:#059669;">MN</div>
                            <div>
                                <div style="font-weight:600;font-size:14px;">Meera Nair</div>
                                <div style="font-size:12px;color:var(--text-muted);">meera@email.com</div>
                            </div>
                        </div>
                    </td>
                    <td style="padding:14px 15px;"><span style="background:#f3f4f6;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:500;">UI/UX Design</span></td>
                    <td style="padding:14px 15px;"><span style="background:#ede9fe;color:#7c3aed;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:600;">Batch 3</span></td>
                    <td style="padding:14px 15px;">
                        <span class="status-badge cancelled" style="font-size:12px;padding:4px 14px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;">
                            <i class="fas fa-times-circle" style="font-size:11px;"></i> Absent
                        </span>
                    </td>
                    <td style="padding:14px 15px;text-align:center;">
                        <div class="btn-group btn-group-sm" role="group" style="gap:4px;">
                            <input type="radio" class="btn-check" name="attendance[3]" id="present-3" value="present">
                            <label class="btn btn-sm" style="background:#d1fae5;color:#059669;border:1px solid #a7f3d0;border-radius:6px 0 0 6px;padding:4px 12px;font-size:12px;cursor:pointer;" for="present-3"><i class="fas fa-check"></i> P</label>
                            <input type="radio" class="btn-check" name="attendance[3]" id="absent-3" value="absent" checked>
                            <label class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border:1px solid #fecaca;border-radius:0;padding:4px 12px;font-size:12px;cursor:pointer;" for="absent-3"><i class="fas fa-times"></i> A</label>
                            <input type="radio" class="btn-check" name="attendance[3]" id="late-3" value="late">
                            <label class="btn btn-sm" style="background:#fef3c7;color:#d97706;border:1px solid #fde68a;border-radius:0 6px 6px 0;padding:4px 12px;font-size:12px;cursor:pointer;" for="late-3"><i class="fas fa-clock"></i> L</label>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Auto-submit attendance on radio change
document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function() {
        // Optional: Auto-save on change
        // document.getElementById('attendanceForm').submit();
    });
});
</script>
@endpush