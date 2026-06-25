@extends('layouts.admin')

@section('title', 'Teachers')
@section('page-title', 'Teachers')
@section('page-subtitle', 'EduAdmin LMS Platform')

@section('content')

  <div class="page-header">
    <div>
      <h2>Teacher Management</h2>
      <p>{{ $totalTeachers ?? 342 }} teachers onboarded</p>
    </div>
    <div class="d-flex gap-2">
      <a href="#" class="btn-primary-custom" style="background:#fff;color:var(--text-main);border:1.5px solid var(--border);">
        <i class="fas fa-download"></i> Export
      </a>
      <a href="{{ route('admin.teachers.create') }}" class="btn-primary-custom">
        <i class="fas fa-plus"></i> Add Teacher
      </a>
    </div>
  </div>

  <!-- STAT CARDS -->
  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#ede9fe;font-size:22px;">🧑‍🏫</div>
        <div class="stat-value">{{ $totalTeachers ?? 342 }}</div>
        <div class="stat-label">Total Teachers</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-check-circle" style="color:#059669;"></i></div>
        <div class="stat-value" style="color:#059669;">{{ $activeTeachers ?? 318 }}</div>
        <div class="stat-label">Active Teachers</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-star" style="color:#d97706;"></i></div>
        <div class="stat-value" style="color:#d97706;">{{ $avgRating ?? '4.76' }}</div>
        <div class="stat-label">Avg. Rating</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon-wrap" style="background:#fce7f3;font-size:22px;">💰</div>
        <div class="stat-value">₹{{ $totalRevenue ?? '14.8L' }}</div>
        <div class="stat-label">Total Revenue Generated</div>
      </div>
    </div>
  </div>

  <!-- DATA TABLE -->
  <div class="data-table-card">
    <div class="data-table-header">
      <form action="{{ route('admin.teachers.index') }}" method="GET" class="d-flex gap-2 flex-grow-1" style="max-width:600px;">
        <div class="search-box flex-grow-1">
          <i class="fas fa-search"></i>
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Search teachers..." onkeyup="filterTable(this, 'teachersTable')">
        </div>
        <button type="button" class="btn btn-light d-flex align-items-center gap-2" data-bs-toggle="collapse" data-bs-target="#filterPanel">
          <i class="fas fa-filter"></i> Filters
        </button>
      </form>
      <div style="font-size:13px;color:var(--text-muted);white-space:nowrap;">
        Showing {{ $teachers->count() > 0 ? $teachers->count() : 5 }} of {{ number_format($totalTeachers ?? 342) }} records
      </div>
    </div>

    <!-- Collapsible filter panel -->
    <div class="collapse" id="filterPanel">
      <div class="p-3 border-bottom d-flex gap-2 flex-wrap" style="background:#f9fafb;">
        <select class="form-select form-select-sm" style="width:auto;" name="specialization">
          <option value="">All Specializations</option>
          <option>Web Development</option>
          <option>Data Science & AI</option>
          <option>Design & UX</option>
          <option>Digital Marketing</option>
          <option>Cloud & DevOps</option>
        </select>
        <select class="form-select form-select-sm" style="width:auto;" name="status">
          <option value="">All Status</option>
          <option>Active</option>
          <option>Inactive</option>
        </select>
        <button class="btn btn-sm btn-primary-custom" style="border-radius:6px;">Apply</button>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table mb-0" id="teachersTable">
        <thead>
          <tr>
            <th>Teacher</th>
            <th>Specialization</th>
            <th>Courses</th>
            <th>Students</th>
            <th>Rating</th>
            <th>Revenue</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse(($teachers ?? []) as $teacher)
          <tr>
            <td>
              <a href="{{ route('admin.teachers.show', $teacher->id) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:{{ $teacher->color }};">{{ $teacher->initials }}</div>
                <div>
                  <div style="font-weight:600;">{{ $teacher->name }}</div>
                  <div style="font-size:11px;color:var(--text-muted);">Joined {{ $teacher->joined_date }}</div>
                </div>
              </a>
            </td>
            <td>{{ $teacher->specialization }}</td>
            <td style="font-weight:600;">{{ $teacher->courses_count }}</td>
            <td>{{ number_format($teacher->students_count) }}</td>
            <td><span class="star-row" style="font-size:13px;">★ {{ $teacher->rating }}</span></td>
            <td style="font-weight:600;color:#059669;">₹{{ $teacher->revenue }}</td>
            <td>
              <span class="status-badge {{ $teacher->status == 'Active' ? 'confirmed' : 'cancelled' }}">
                <i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>{{ $teacher->status }}
              </span>
            </td>
            <td>
              <a href="mailto:{{ $teacher->email }}" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <div class="dropdown d-inline-block">
                <button class="btn btn-sm btn-light" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="{{ route('admin.teachers.show', $teacher->id) }}"><i class="fas fa-eye me-2"></i>View Profile</a></li>
                  <li><a class="dropdown-item" href="{{ route('admin.teachers.edit', $teacher->id) }}"><i class="fas fa-edit me-2"></i>Edit</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form id="del-teacher-{{ $teacher->id }}" action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST">
                      @csrf @method('DELETE')
                      <button type="button" class="dropdown-item text-danger" onclick="confirmDelete('del-teacher-{{ $teacher->id }}','Remove this teacher?')"><i class="fas fa-trash me-2"></i>Delete</button>
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
              <a href="{{ route('admin.teachers.show', 1) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#7c3aed;">RK</div>
                <div><div style="font-weight:600;">Rajesh Kumar</div><div style="font-size:11px;color:var(--text-muted);">Joined Mar 2022</div></div>
              </a>
            </td>
            <td>Web Development</td>
            <td style="font-weight:600;">5</td>
            <td>892</td>
            <td><span class="star-row" style="font-size:13px;">★ 4.9</span></td>
            <td style="font-weight:600;color:#059669;">₹1.84L</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:rajesh.kumar@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.teachers.show', 2) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#0891b2;">PM</div>
                <div><div style="font-weight:600;">Priya Mehta</div><div style="font-size:11px;color:var(--text-muted);">Joined Jun 2022</div></div>
              </a>
            </td>
            <td>Data Science & AI</td>
            <td style="font-weight:600;">4</td>
            <td>743</td>
            <td><span class="star-row" style="font-size:13px;">★ 4.8</span></td>
            <td style="font-weight:600;color:#059669;">₹1.56L</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:priya.mehta@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.teachers.show', 3) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#059669;">AS</div>
                <div><div style="font-weight:600;">Amit Sharma</div><div style="font-size:11px;color:var(--text-muted);">Joined Jan 2023</div></div>
              </a>
            </td>
            <td>Design & UX</td>
            <td style="font-weight:600;">6</td>
            <td>678</td>
            <td><span class="star-row" style="font-size:13px;">★ 4.7</span></td>
            <td style="font-weight:600;color:#059669;">₹1.42L</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:amit.sharma@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.teachers.show', 4) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#d97706;">SV</div>
                <div><div style="font-weight:600;">Sunita Verma</div><div style="font-size:11px;color:var(--text-muted);">Joined Aug 2022</div></div>
              </a>
            </td>
            <td>Digital Marketing</td>
            <td style="font-weight:600;">3</td>
            <td>612</td>
            <td><span class="star-row" style="font-size:13px;">★ 4.6</span></td>
            <td style="font-weight:600;color:#059669;">₹1.28L</td>
            <td><span class="status-badge confirmed"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Active</span></td>
            <td>
              <a href="mailto:sunita.verma@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
              <button class="btn btn-sm btn-light"><i class="fas fa-ellipsis-h"></i></button>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('admin.teachers.show', 5) }}" class="d-flex align-items-center gap-2 text-decoration-none" style="color:inherit;">
                <div class="avatar-circle" style="background:#ec4899;">VS</div>
                <div><div style="font-weight:600;">Vikram Singh</div><div style="font-size:11px;color:var(--text-muted);">Joined Nov 2023</div></div>
              </a>
            </td>
            <td>Cloud & DevOps</td>
            <td style="font-weight:600;">4</td>
            <td>534</td>
            <td><span class="star-row" style="font-size:13px;">★ 4.8</span></td>
            <td style="font-weight:600;color:#059669;">₹1.12L</td>
            <td><span class="status-badge cancelled"><i class="fas fa-circle" style="font-size:6px;margin-right:4px;"></i>Inactive</span></td>
            <td>
              <a href="mailto:vikram.singh@example.com" class="btn btn-sm btn-light"><i class="fas fa-envelope"></i></a>
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
        Page {{ $teachers->currentPage() ?? 1 }} of {{ $teachers->lastPage() ?? 43 }}
      </div>
      <nav>
        <ul class="pagination pagination-sm mb-0">
          <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
          <li class="page-item active"><a class="page-link" href="#" style="background:var(--primary);border-color:var(--primary);">1</a></li>
          <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
          <li class="page-item disabled"><span class="page-link">...</span></li>
          <li class="page-item"><a class="page-link" href="?page=43">43</a></li>
          <li class="page-item"><a class="page-link" href="?page=2"><i class="fas fa-chevron-right"></i></a></li>
        </ul>
      </nav>
    </div>
  </div>

@endsection
