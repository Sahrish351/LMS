<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dashboard') – EduAdmin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
  @stack('styles')
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
      <div class="brand-icon"><i class="fas fa-graduation-cap"></i></div>
      <div class="brand-text">
        <div class="name">EduAdmin</div>
        <div class="sub">LMS Platform</div>
      </div>
    </a>
    <button class="sidebar-close" onclick="toggleSidebar()"><i class="fas fa-times"></i></button>
  </div>

  <div class="sidebar-scroll">

    <!-- MAIN -->
    <a class="nav-link-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
       href="{{ route('admin.dashboard') }}">
      <span class="nav-icon"><i class="fas fa-th-large"></i></span>
      <span class="nav-label">Dashboard</span>
    </a>

    <!-- USER MANAGEMENT -->
    <div class="nav-section-label">User Management</div>

    <a class="nav-link-item {{ request()->routeIs('admin.students*') ? 'active' : '' }}"
       href="{{ route('admin.students.index') }}">
      <span class="nav-icon"><i class="fas fa-user-graduate"></i></span>
      <span class="nav-label">Students</span>
      @if(isset($newStudents) && $newStudents > 0)
        <span class="nav-badge">{{ $newStudents }}</span>
      @endif
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.teachers*') ? 'active' : '' }}"
       href="{{ route('admin.teachers.index') }}">
      <span class="nav-icon"><i class="fas fa-chalkboard-teacher"></i></span>
      <span class="nav-label">Teachers</span>
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.support-staff*') ? 'active' : '' }}"
       href="{{ route('admin.support-staff.index') }}">
      <span class="nav-icon"><i class="fas fa-headset"></i></span>
      <span class="nav-label">Support Staff</span>
    </a>

    <!-- COURSE MANAGEMENT -->
    <div class="nav-section-label">Course Management</div>

    <a class="nav-link-item {{ request()->routeIs('admin.categories*') ? 'active' : '' }}"
       href="{{ route('admin.categories.index') }}">
      <span class="nav-icon"><i class="fas fa-folder"></i></span>
      <span class="nav-label">Categories</span>
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.courses*') ? 'active' : '' }}"
       href="{{ route('admin.courses.index') }}">
      <span class="nav-icon"><i class="fas fa-book"></i></span>
      <span class="nav-label">Courses</span>
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.modules*') ? 'active' : '' }}"
       href="{{ route('admin.modules.index') }}">
      <span class="nav-icon"><i class="fas fa-layer-group"></i></span>
      <span class="nav-label">Modules</span>
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.lessons*') ? 'active' : '' }}"
       href="{{ route('admin.lessons.index') }}">
      <span class="nav-icon"><i class="fas fa-file-alt"></i></span>
      <span class="nav-label">Lessons</span>
    </a>

    <!-- OPERATIONS -->
    <div class="nav-section-label">Operations</div>

    <a class="nav-link-item {{ request()->routeIs('admin.batches*') || request()->routeIs('admin.certificates*') ? '' : 'collapsed' }}"
       data-bs-toggle="collapse" data-bs-target="#menuOperations" style="cursor:pointer;">
      <span class="nav-icon"><i class="fas fa-cogs"></i></span>
      <span class="nav-label">Operations</span>
      <i class="fas fa-chevron-down nav-chevron"></i>
    </a>
    <div class="collapse submenu {{ request()->routeIs('admin.batches*') || request()->routeIs('admin.certificates*') ? 'show' : '' }}" id="menuOperations">
      <a class="nav-link-item {{ request()->routeIs('admin.batches.index') ? 'active' : '' }}"
         href="{{ route('admin.batches.index') }}">
        <span class="nav-label">Batches</span>
      </a>
      <a class="nav-link-item {{ request()->routeIs('admin.certificates.index') ? 'active' : '' }}"
         href="{{ route('admin.certificates.index') }}">
        <span class="nav-label">Certificates</span>
      </a>
    </div>

    <!-- FINANCE -->
    <div class="nav-section-label">Finance</div>

    <a class="nav-link-item {{ request()->routeIs('admin.payments*') ? 'active' : '' }}"
       href="{{ route('admin.payments.index') }}">
      <span class="nav-icon"><i class="fas fa-credit-card"></i></span>
      <span class="nav-label">Payments</span>
      @if(isset($pendingPayments) && $pendingPayments > 0)
        <span class="nav-badge">{{ $pendingPayments }}</span>
      @endif
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.revenue-reports*') ? 'active' : '' }}"
       href="{{ route('admin.revenue-reports.index') }}">
      <span class="nav-icon"><i class="fas fa-chart-bar"></i></span>
      <span class="nav-label">Revenue Reports</span>
    </a>

    <!-- COMMUNICATION -->
    <div class="nav-section-label">Communication</div>

    <a class="nav-link-item {{ request()->routeIs('admin.announcements*') ? 'active' : '' }}"
       href="{{ route('admin.announcements.index') }}">
      <span class="nav-icon"><i class="fas fa-bullhorn"></i></span>
      <span class="nav-label">Announcements</span>
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.support-tickets*') ? 'active' : '' }}"
       href="{{ route('admin.support-tickets.index') }}">
      <span class="nav-icon"><i class="fas fa-life-ring"></i></span>
      <span class="nav-label">Support Tickets</span>
      @if(isset($openTickets) && $openTickets > 0)
        <span class="nav-badge">{{ $openTickets }}</span>
      @endif
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.discussion-forum*') ? 'active' : '' }}"
       href="{{ route('admin.discussion-forum.index') }}">
      <span class="nav-icon"><i class="fas fa-comments"></i></span>
      <span class="nav-label">Discussion Forum</span>
    </a>

    <a class="nav-link-item {{ request()->routeIs('admin.notifications*') ? 'active' : '' }}"
       href="{{ route('admin.notifications.index') }}">
      <span class="nav-icon"><i class="fas fa-bell"></i></span>
      <span class="nav-label">Notifications</span>
    </a>

    <!-- ADMINISTRATION -->
    <div class="nav-section-label">Administration</div>

    <a class="nav-link-item {{ request()->routeIs('admin.admin-users*') || request()->routeIs('admin.roles*') || request()->routeIs('admin.settings*') ? '' : 'collapsed' }}"
       data-bs-toggle="collapse" data-bs-target="#menuAdmin" style="cursor:pointer;">
      <span class="nav-icon"><i class="fas fa-user-shield"></i></span>
      <span class="nav-label">Administration</span>
      <i class="fas fa-chevron-down nav-chevron"></i>
    </a>
    <div class="collapse submenu {{ request()->routeIs('admin.admin-users*') || request()->routeIs('admin.roles*') || request()->routeIs('admin.settings*') ? 'show' : '' }}" id="menuAdmin">
      <a class="nav-link-item {{ request()->routeIs('admin.admin-users.index') ? 'active' : '' }}"
         href="{{ route('admin.admin-users.index') }}">
        <span class="nav-label">Admin Users</span>
      </a>
      <a class="nav-link-item {{ request()->routeIs('admin.roles.index') ? 'active' : '' }}"
         href="{{ route('admin.roles.index') }}">
        <span class="nav-label">Roles & Permissions</span>
      </a>
      <a class="nav-link-item {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}"
         href="{{ route('admin.settings.index') }}">
        <span class="nav-label">Settings</span>
      </a>
    </div>

  </div><!-- /sidebar-scroll -->

  <div class="sidebar-footer">
    <a class="logout-btn" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
      <span>Logout</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>
</aside>

<!-- ===== MAIN WRAPPER ===== -->
<div class="main-wrapper">

  <!-- TOPBAR -->
  <header class="topbar">
    <button class="topbar-menu-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>

    <div class="topbar-title">
      <h1>@yield('page-title', 'Dashboard')</h1>
      <p>@yield('page-subtitle', 'EduAdmin LMS Platform')</p>
    </div>

    <div class="topbar-search">
      <i class="fas fa-search search-icon"></i>
      <input type="text" placeholder="Search students, courses, batches..." id="globalSearch"/>
      <span class="search-kbd">⌘K</span>
    </div>

    <div class="topbar-right">
      <a href="{{ route('admin.students.create') }}" class="quick-add-btn">
        <i class="fas fa-plus"></i> Quick Add
      </a>
      <div class="topbar-icon-btn">
        <i class="fas fa-question-circle"></i>
      </div>
      <a href="{{ route('admin.notifications.index') }}" class="topbar-icon-btn" style="text-decoration:none;color:inherit;">
        <i class="fas fa-bell"></i>
        @if(isset($unreadNotifications) && $unreadNotifications > 0)
          <span class="notif-badge">{{ $unreadNotifications }}</span>
        @endif
      </a>
      <div class="topbar-user dropdown">
        <div class="d-flex align-items-center gap-2" data-bs-toggle="dropdown" style="cursor:pointer;">
          <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'SA', 0, 2)) }}</div>
          <div class="user-info">
            <div class="name">{{ auth()->user()->name ?? 'Super Admin' }}</div>
            <div class="email">{{ auth()->user()->email ?? 'admin@eduplatform.com' }}</div>
          </div>
          <i class="fas fa-chevron-down" style="font-size:11px;color:var(--text-muted);"></i>
        </div>
        <ul class="dropdown-menu dropdown-menu-end mt-2">
          <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog me-2"></i>Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item text-danger" href="#"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <!-- PAGE CONTENT -->
  <div class="page-content">
    @yield('content')
  </div>

</div><!-- /main-wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
