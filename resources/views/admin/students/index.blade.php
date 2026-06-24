@extends('layouts.admin')

@section('title', 'Students')
@section('page-title', 'Students')
@section('page-subtitle', 'EduAdmin LMS Platform')

@section('content')

  <div class="page-header">
    <div>
      <h2>Student Management</h2>
      <p>{{ number_format($totalStudents ?? 12847) }} total students enrolled</p>
    </div>
    <div class="d-flex gap-2">
      <a href="#" class="btn-primary-custom" style="background:#fff;color:var(--text-main);border:1.5px solid var(--border);">
        <i class="fas fa-download"></i> Export
      </a>
      <a href="{{ route('admin.students.create') }}" class="btn-primary-custom">
        <i class="fas fa-plus"></i> Add Student
      </a>
    </div>
  </div>

  <!-- STAT CARDS -->
  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-users" style="color:#7c3aed;"></i></div>
        <div class="stat-value">{{ number_format($totalStudents ?? 12847) }}</div>
        <div class="stat-label">Total Students</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-check-circle" style="color:#059669;"></i></div>
        <div class="stat-value" style="color:#059669;">{{ number_format($activeThisMonth ?? 10453) }}</div>
        <div class="stat-label">Active This Month</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-hourglass-half" style="color:#d97706;"></i></div>
        <div class="stat-value" style="color:#d97706;">{{ $pendingVerification ?? 234 }}</div>
        <div class="stat-label">Pending Verification</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-chart-line" style="color:#0891b2;"></i></div>
        <div class="stat-value" style="color:#0891b2;">{{ $avgCompletionRate ?? '74.3%' }}</div>
        <div class="stat-label">Avg. Completion Rate</div>
      </div>
    </div>
  </div>

  <!-- DATA TABLE -->
  <div class="data-table-card">
    <div class="data-table-header">
      <form action="{{ route('admin.students.index') }}" method="GET" class="d-flex gap-2 flex-grow-1" style="max-width:600px;">
        <div class="search-box flex-grow-1">
          <i class="fas fa-search"></i>
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Search students..." onkeyup="filterTable(this, 'studentsTable')">
        </div>
        <button type="button" class="btn btn-light d-flex align-items-center gap-2" data-bs-toggle="collapse" data-bs-target="#filterPanel">
          <i class="fas fa-filter"></i> Filters
        </button>
      </form>
      <div style="font-size:13px;color:var(--text-muted);white-space:nowrap;">
        Showing {{ $students->count() > 0 ? $students->count() : 8 }} of {{ number_format($totalStudents ?? 12847) }} records
      </div>
    </div>

    <!-- Collapsible filter panel -->
    <div class="collapse" id="filterPanel">
      <div class="p-3 border-bottom d-flex gap-2 flex-wrap" style="background:#f9fafb;">
        <select class="form-select form-select-sm" style="width:auto;" name="course">
          <option value="">All Courses</option>
          <option>Full Stack Web Dev</option>
          <option>Data Science Python</option>
          <option>UI/UX Design</option>
          <option>Machine Learning</option>
          <option>Digital Marketing</option>
        </select>
        <select class="form-select form-select-sm" style="width:auto;" name="batch">
          <option value="">All Batches</option>
          <option>Batch Jan-25</option>
          <option>Batch Feb-25</option>
          <option>Batch Mar-25</option>
        </select>
        <select class="form-select form-select-sm" style="width:auto;" name="status">
          <option value="">All Status</option>
          <option>Active</option>
          <option>Pending</option>
          <option>Inactive</option>
        </select>
        <button class="btn btn-sm btn-primary-custom" style="border-radius:6px;">Apply</button>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table mb-0" id="studentsTable">
        <thead>
          <tr>
            <th>Student</th>
            <th>Course & Batch</th>
            <th>Enrolled</th>
            <th>Progress</th>
            <th>Fees</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse(($students ?? []) as $student)
          <tr>
            <td>
              <a href="{{ route('admin.students.show', $student->id) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:{{ $student->color }};">{{ $student->initials }}</div>
                <div>
                  <div style="font-weight:600;">{{ $student->name }}</div>
                  <div style="font-size:11px;color:var(--text-muted);">{{ $student->student_code }}</div>
                </div>
              </a>
            </td>
            <td>
              <div style="font-weight:500;">{{ $student->course_name }}</div>
              <div style="font-size:12px;color:var(--text-muted);">{{ $student->batch_name }}</div>
            </td>
            <td style="color:var(--text-muted);">{{ $student->enrolled_date }}</td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <div class="progress-bar-bg" style="width:80px;">
                  <div class="progress-bar-fill" style="width:{{ $student->progress }}%; background:{{ $student->progress >= 50 ? 'linear-gradient(90deg,#10b981,#34d399)' : '#e5e7eb' }};"></div>
                </div>
                <span style="font-size:12px;color:var(--text-muted);">{{ $student->progress }}%</span>
              </div>
            </td>
            <td style="font-weight:600;">₹{{ number_format($student->fees) }}</td>
            <td>
              <span class="status-badge {{ $student->status == 'Active' ? 'confirmed' : ($student->status == 'Pending' ? 'pending' : 'cancelled') }}">
                <i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>{{ $student->status }}
              </span>
            </td>
            <td>
              <a href="mailto:{{ $student->email }}" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <div class="dropdown d-inline-block">
                <button class="btn btn-sm btn-light" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="{{ route('admin.students.show', $student->id) }}"><i class="fas fa-eye me-2"></i>View Profile</a></li>
                  <li><a class="dropdown-item" href="{{ route('admin.students.edit', $student->id) }}"><i class="fas fa-edit me-2"></i>Edit</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form id="del-student-{{ $student->id }}" action="{{ route('admin.students.destroy', $student->id) }}" method="POST">
                      @csrf @method('DELETE')
                      <button type="button" class="dropdown-item text-danger" onclick="confirmDelete('del-student-{{ $student->id }}','Remove this student?')"><i class="fas fa-trash me-2"></i>Delete</button>
                    </form>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
          @empty
          {{-- Static sample rows matching the reference design --}}
          <tr>
            <td>
              <a href="{{ route('admin.students.show', 1) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#7c3aed;">AP</div>
                <div><div style="font-weight:600;">Aisha Patel</div><div style="font-size:11px;color:var(--text-muted);">STU-001</div></div>
              </a>
            </td>
            <td><div style="font-weight:500;">Full Stack Web Dev</div><div style="font-size:12px;color:var(--text-muted);">Batch Jan-25</div></td>
            <td style="color:var(--text-muted);">Jan 5, 2025</td>
            <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:68%;background:linear-gradient(90deg,#7c3aed,#a855f7);"></div></div><span style="font-size:12px;color:var(--text-muted);">68%</span></div></td>
            <td style="font-weight:600;">₹18,500</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:aisha.patel@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.students.show', 2) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#0891b2;">RV</div>
                <div><div style="font-weight:600;">Rohit Verma</div><div style="font-size:11px;color:var(--text-muted);">STU-002</div></div>
              </a>
            </td>
            <td><div style="font-weight:500;">Data Science Python</div><div style="font-size:12px;color:var(--text-muted);">Batch Feb-25</div></td>
            <td style="color:var(--text-muted);">Jan 8, 2025</td>
            <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:0%;"></div></div><span style="font-size:12px;color:var(--text-muted);">0%</span></div></td>
            <td style="font-weight:600;">₹22,000</td>
            <td><span class="status-badge pending"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Pending</span></td>
            <td>
              <a href="mailto:rohit.verma@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.students.show', 3) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#059669;">KN</div>
                <div><div style="font-weight:600;">Kavya Nair</div><div style="font-size:11px;color:var(--text-muted);">STU-003</div></div>
              </a>
            </td>
            <td><div style="font-weight:500;">UI/UX Design</div><div style="font-size:12px;color:var(--text-muted);">Batch Jan-25</div></td>
            <td style="color:var(--text-muted);">Dec 20, 2024</td>
            <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:82%;background:linear-gradient(90deg,#10b981,#34d399);"></div></div><span style="font-size:12px;color:var(--text-muted);">82%</span></div></td>
            <td style="font-weight:600;">₹15,000</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:kavya.nair@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.students.show', 4) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#d97706;">AD</div>
                <div><div style="font-weight:600;">Arjun Das</div><div style="font-size:11px;color:var(--text-muted);">STU-004</div></div>
              </a>
            </td>
            <td><div style="font-weight:500;">Machine Learning</div><div style="font-size:12px;color:var(--text-muted);">Batch Mar-25</div></td>
            <td style="color:var(--text-muted);">Jan 10, 2025</td>
            <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:15%;"></div></div><span style="font-size:12px;color:var(--text-muted);">15%</span></div></td>
            <td style="font-weight:600;">₹24,000</td>
            <td><span class="status-badge cancelled"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Inactive</span></td>
            <td>
              <a href="mailto:arjun.das@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.students.show', 5) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#ec4899;">NG</div>
                <div><div style="font-weight:600;">Neha Gupta</div><div style="font-size:11px;color:var(--text-muted);">STU-005</div></div>
              </a>
            </td>
            <td><div style="font-weight:500;">Digital Marketing</div><div style="font-size:12px;color:var(--text-muted);">Batch Jan-25</div></td>
            <td style="color:var(--text-muted);">Dec 28, 2024</td>
            <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:91%;background:linear-gradient(90deg,#10b981,#34d399);"></div></div><span style="font-size:12px;color:var(--text-muted);">91%</span></div></td>
            <td style="font-weight:600;">₹12,000</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:neha.gupta@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.students.show', 6) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#7c3aed;">FS</div>
                <div><div style="font-weight:600;">Farhan Sheikh</div><div style="font-size:11px;color:var(--text-muted);">STU-006</div></div>
              </a>
            </td>
            <td><div style="font-weight:500;">Full Stack Web Dev</div><div style="font-size:12px;color:var(--text-muted);">Batch Jan-25</div></td>
            <td style="color:var(--text-muted);">Jan 3, 2025</td>
            <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:54%;background:linear-gradient(90deg,#7c3aed,#a855f7);"></div></div><span style="font-size:12px;color:var(--text-muted);">54%</span></div></td>
            <td style="font-weight:600;">₹18,500</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:farhan.sheikh@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.students.show', 7) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#a78bfa;">MI</div>
                <div><div style="font-weight:600;">Meera Iyer</div><div style="font-size:11px;color:var(--text-muted);">STU-007</div></div>
              </a>
            </td>
            <td><div style="font-weight:500;">Data Science Python</div><div style="font-size:12px;color:var(--text-muted);">Batch Jan-25</div></td>
            <td style="color:var(--text-muted);">Dec 15, 2024</td>
            <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:77%;background:linear-gradient(90deg,#10b981,#34d399);"></div></div><span style="font-size:12px;color:var(--text-muted);">77%</span></div></td>
            <td style="font-weight:600;">₹22,000</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:meera.iyer@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.students.show', 8) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#f472b6;">KS</div>
                <div><div style="font-weight:600;">Karan Sharma</div><div style="font-size:11px;color:var(--text-muted);">STU-008</div></div>
              </a>
            </td>
            <td><div style="font-weight:500;">Digital Marketing</div><div style="font-size:12px;color:var(--text-muted);">Batch Feb-25</div></td>
            <td style="color:var(--text-muted);">Jan 12, 2025</td>
            <td><div class="d-flex align-items-center gap-2"><div class="progress-bar-bg" style="width:80px;"><div class="progress-bar-fill" style="width:0%;"></div></div><span style="font-size:12px;color:var(--text-muted);">0%</span></div></td>
            <td style="font-weight:600;">₹12,000</td>
            <td><span class="status-badge pending"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Pending</span></td>
            <td>
              <a href="mailto:karan.sharma@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- PAGINATION -->
    <div class="d-flex align-items-center justify-content-between p-3" style="border-top:1px solid var(--border);">
      <div style="font-size:13px;color:var(--text-muted);">
        Page {{ $students->currentPage() ?? 1 }} of {{ $students->lastPage() ?? 1606 }}
      </div>
      <nav>
        <ul class="pagination pagination-sm mb-0">
          <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
          <li class="page-item active"><a class="page-link" href="#" style="background:var(--primary);border-color:var(--primary);">1</a></li>
          <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
          <li class="page-item disabled"><span class="page-link">...</span></li>
          <li class="page-item"><a class="page-link" href="?page=1606">1606</a></li>
          <li class="page-item"><a class="page-link" href="?page=2"><i class="fas fa-chevron-right"></i></a></li>
        </ul>
      </nav>
    </div>
  </div>

@endsection
