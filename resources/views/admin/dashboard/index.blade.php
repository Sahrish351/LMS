@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'EduAdmin LMS Platform')

@section('content')

  <!-- STAT CARDS ROW 1 -->
  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <span class="stat-badge up"><i class="fas fa-arrow-up"></i> +8.2%</span>
        <div class="stat-icon-wrap" style="background:#ede9fe;"><i class="fas fa-users" style="color:#7c3aed;"></i></div>
        <div class="stat-value">{{ number_format($totalStudents ?? 12847) }}</div>
        <div class="stat-label">Total Students</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <span class="stat-badge up"><i class="fas fa-arrow-up"></i> +3.1%</span>
        <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-graduation-cap" style="color:#059669;"></i></div>
        <div class="stat-value">{{ $totalTeachers ?? 342 }}</div>
        <div class="stat-label">Total Teachers</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <span class="stat-badge up"><i class="fas fa-arrow-up"></i> +12</span>
        <div class="stat-icon-wrap" style="background:#d1fae5;"><i class="fas fa-book-open" style="color:#059669;"></i></div>
        <div class="stat-value">{{ $activeCourses ?? 186 }}</div>
        <div class="stat-label">Active Courses</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <span class="stat-badge up"><i class="fas fa-arrow-up"></i> +5</span>
        <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-calendar-alt" style="color:#d97706;"></i></div>
        <div class="stat-value">{{ $activeBatches ?? 48 }}</div>
        <div class="stat-label">Active Batches</div>
      </div>
    </div>
  </div>

  <!-- STAT CARDS ROW 2 -->
  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <span class="stat-badge up"><i class="fas fa-arrow-up"></i> +14.3%</span>
        <div class="stat-icon-wrap" style="background:#fce7f3;"><i class="fas fa-rupee-sign" style="color:#ec4899;"></i></div>
        <div class="stat-value">₹{{ $monthlyRevenue ?? '48.2L' }}</div>
        <div class="stat-label">Monthly Revenue</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <span class="stat-badge down"><i class="fas fa-arrow-down"></i> +2</span>
        <div class="stat-icon-wrap" style="background:#fee2e2;"><i class="fas fa-clock" style="color:#dc2626;"></i></div>
        <div class="stat-value">₹{{ $pendingAmount ?? '3.84L' }}</div>
        <div class="stat-label">Pending Payments</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <span class="stat-badge up"><i class="fas fa-arrow-up"></i> +183</span>
        <div class="stat-icon-wrap" style="background:#fef3c7;"><i class="fas fa-award" style="color:#d97706;"></i></div>
        <div class="stat-value">{{ number_format($certificatesIssued ?? 2341) }}</div>
        <div class="stat-label">Certificates Issued</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <span class="stat-badge down"><i class="fas fa-arrow-down"></i> -4</span>
        <div class="stat-icon-wrap" style="background:#cffafe;"><i class="fas fa-life-ring" style="color:#0891b2;"></i></div>
        <div class="stat-value">{{ $openTickets ?? 23 }}</div>
        <div class="stat-label">Open Support Tickets</div>
      </div>
    </div>
  </div>

  <!-- CHARTS ROW -->
  <div class="row g-3 mb-3">
    <div class="col-12 col-lg-8">
      <div class="chart-card">
        <div class="chart-card-header">
          <div>
            <p class="chart-card-title">Revenue Analytics</p>
            <p class="chart-card-sub">Total earnings overview</p>
          </div>
          <div class="period-tabs">
            <button class="period-tab" onclick="switchPeriod(this,'daily', updateRevenueChart)">Daily</button>
            <button class="period-tab active" onclick="switchPeriod(this,'monthly', updateRevenueChart)">Monthly</button>
            <button class="period-tab" onclick="switchPeriod(this,'yearly', updateRevenueChart)">Yearly</button>
          </div>
        </div>
        <canvas id="revenueChart" height="130"></canvas>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="chart-card h-100">
        <div class="chart-card-header">
          <div>
            <p class="chart-card-title">Course Distribution</p>
            <p class="chart-card-sub">By category</p>
          </div>
        </div>
        <canvas id="donutChart" height="160"></canvas>
        <ul class="donut-legend">
          <li><span class="legend-label"><span class="legend-dot" style="background:#7c3aed;"></span>Technology</span><span class="legend-pct">45%</span></li>
          <li><span class="legend-label"><span class="legend-dot" style="background:#06b6d4;"></span>Design</span><span class="legend-pct">20%</span></li>
          <li><span class="legend-label"><span class="legend-dot" style="background:#10b981;"></span>Marketing</span><span class="legend-pct">18%</span></li>
          <li><span class="legend-label"><span class="legend-dot" style="background:#f59e0b;"></span>Business</span><span class="legend-pct">12%</span></li>
          <li><span class="legend-label"><span class="legend-dot" style="background:#ef4444;"></span>Others</span><span class="legend-pct">5%</span></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ANALYTICS ROW 2 -->
  <div class="row g-3 mb-3">
    <div class="col-12 col-lg-8">
      <div class="chart-card">
        <div class="chart-card-header">
          <div>
            <p class="chart-card-title">Student Analytics</p>
            <p class="chart-card-sub">Weekly registrations & activity</p>
          </div>
        </div>
        <canvas id="barChart" height="130"></canvas>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="chart-card h-100">
        <div class="chart-card-header">
          <div>
            <p class="chart-card-title">Enrollment Trends</p>
            <p class="chart-card-sub">Active students over time</p>
          </div>
        </div>
        <canvas id="growthChart" height="200"></canvas>
      </div>
    </div>
  </div>

  <!-- RECENT DATA ROW -->
  <div class="row g-3 mb-3">
    <!-- Recent Enrollments -->
    <div class="col-12 col-lg-6">
      <div class="list-card">
        <div class="list-card-header">
          <div>
            <p class="list-card-title">Recent Enrollments</p>
            <p class="list-card-sub">Latest student sign-ups</p>
          </div>
          <a href="{{ route('admin.students.index') }}" class="view-all-link">View all <i class="fas fa-chevron-right"></i></a>
        </div>

        @forelse(($recentEnrollments ?? []) as $enr)
          <div class="list-item">
            <div class="avatar-circle" style="background:{{ $enr->color ?? '#7c3aed' }};">{{ $enr->initials ?? 'NA' }}</div>
            <div class="list-item-main">
              <div class="list-item-name">{{ $enr->student_name }}</div>
              <div class="list-item-sub">{{ $enr->course_name }} · {{ $enr->batch_name }}</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹{{ number_format($enr->amount) }}</div>
              <span class="status-badge {{ $enr->status }}">{{ $enr->status }}</span>
            </div>
          </div>
        @empty
          <div class="list-item">
            <div class="avatar-circle" style="background:#7c3aed;">AP</div>
            <div class="list-item-main">
              <div class="list-item-name">Aisha Patel</div>
              <div class="list-item-sub">Full Stack Web Dev · Batch Jan-25</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹18,500</div>
              <span class="status-badge approved">approved</span>
            </div>
          </div>
          <div class="list-item">
            <div class="avatar-circle" style="background:#0891b2;">RV</div>
            <div class="list-item-main">
              <div class="list-item-name">Rohit Verma</div>
              <div class="list-item-sub">Data Science Python · Batch Feb-25</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹22,000</div>
              <span class="status-badge pending">pending</span>
            </div>
          </div>
          <div class="list-item">
            <div class="avatar-circle" style="background:#059669;">KN</div>
            <div class="list-item-main">
              <div class="list-item-name">Kavya Nair</div>
              <div class="list-item-sub">UI/UX Design · Batch Jan-25</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹15,000</div>
              <span class="status-badge approved">approved</span>
            </div>
          </div>
          <div class="list-item">
            <div class="avatar-circle" style="background:#d97706;">AD</div>
            <div class="list-item-main">
              <div class="list-item-name">Arjun Das</div>
              <div class="list-item-sub">Machine Learning · Batch Mar-25</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹24,000</div>
              <span class="status-badge pending">pending</span>
            </div>
          </div>
          <div class="list-item">
            <div class="avatar-circle" style="background:#ec4899;">NG</div>
            <div class="list-item-main">
              <div class="list-item-name">Neha Gupta</div>
              <div class="list-item-sub">Digital Marketing · Batch Jan-25</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹12,000</div>
              <span class="status-badge approved">approved</span>
            </div>
          </div>
        @endforelse
      </div>
    </div>

    <!-- Recent Payments -->
    <div class="col-12 col-lg-6">
      <div class="list-card">
        <div class="list-card-header">
          <div>
            <p class="list-card-title">Recent Payments</p>
            <p class="list-card-sub">Payment verification queue</p>
          </div>
          <a href="{{ route('admin.payments.index') }}" class="view-all-link">View all <i class="fas fa-chevron-right"></i></a>
        </div>

        @forelse(($recentPayments ?? []) as $pay)
          <div class="list-item">
            <div class="avatar-icon-box"><i class="fas fa-rupee-sign"></i></div>
            <div class="list-item-main">
              <div class="list-item-name">{{ $pay->student_name }}</div>
              <div class="list-item-sub">{{ $pay->method }} · {{ $pay->time_ago }}</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹{{ number_format($pay->amount) }}</div>
              <span class="status-badge {{ $pay->status }}">{{ $pay->status }}</span>
            </div>
          </div>
        @empty
          <div class="list-item">
            <div class="avatar-icon-box"><i class="fas fa-rupee-sign"></i></div>
            <div class="list-item-main">
              <div class="list-item-name">Aisha Patel</div>
              <div class="list-item-sub">UPI · Today, 10:40 AM</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹18,500</div>
              <span class="status-badge verified">verified</span>
            </div>
          </div>
          <div class="list-item">
            <div class="avatar-icon-box"><i class="fas fa-rupee-sign"></i></div>
            <div class="list-item-main">
              <div class="list-item-name">Rohit Verma</div>
              <div class="list-item-sub">Bank Transfer · Today, 09:15 AM</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹22,000</div>
              <span class="status-badge pending">pending</span>
            </div>
          </div>
          <div class="list-item">
            <div class="avatar-icon-box"><i class="fas fa-rupee-sign"></i></div>
            <div class="list-item-main">
              <div class="list-item-name">Kavya Nair</div>
              <div class="list-item-sub">Credit Card · Yesterday</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹15,000</div>
              <span class="status-badge verified">verified</span>
            </div>
          </div>
          <div class="list-item">
            <div class="avatar-icon-box"><i class="fas fa-rupee-sign"></i></div>
            <div class="list-item-main">
              <div class="list-item-name">Arjun Das</div>
              <div class="list-item-sub">UPI · Yesterday</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹8,000</div>
              <span class="status-badge pending">pending</span>
            </div>
          </div>
          <div class="list-item">
            <div class="avatar-icon-box"><i class="fas fa-rupee-sign"></i></div>
            <div class="list-item-main">
              <div class="list-item-name">Meera Iyer</div>
              <div class="list-item-sub">Debit Card · 2 days ago</div>
            </div>
            <div class="list-item-right">
              <div class="list-item-amount">₹12,000</div>
              <span class="status-badge verified">verified</span>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </div>

  <!-- BOTTOM ROW -->
  <div class="row g-3 mb-3">
    <!-- System Activity -->
    <div class="col-12 col-lg-4">
      <div class="list-card">
        <div class="list-card-header">
          <p class="list-card-title"><i class="fas fa-bolt" style="color:#7c3aed;margin-right:6px;"></i>System Activity</p>
        </div>
        <div class="activity-item">
          <div class="activity-icon" style="background:#ede9fe;color:#7c3aed;"><i class="fas fa-user-plus"></i></div>
          <div class="activity-text">
            <p class="title">New student registered</p>
            <p class="desc">Farhan Sheikh joined Web Dev batch</p>
            <p class="activity-time">2 min ago</p>
          </div>
        </div>
        <div class="activity-item">
          <div class="activity-icon" style="background:#d1fae5;color:#059669;"><i class="fas fa-rupee-sign"></i></div>
          <div class="activity-text">
            <p class="title">Payment verified</p>
            <p class="desc">₹18,500 from Aisha Patel approved</p>
            <p class="activity-time">8 min ago</p>
          </div>
        </div>
        <div class="activity-item">
          <div class="activity-icon" style="background:#cffafe;color:#0891b2;"><i class="fas fa-book"></i></div>
          <div class="activity-text">
            <p class="title">Course published</p>
            <p class="desc">'Advanced React Patterns' is now live</p>
            <p class="activity-time">24 min ago</p>
          </div>
        </div>
        <div class="activity-item">
          <div class="activity-icon" style="background:#fef3c7;color:#d97706;"><i class="fas fa-award"></i></div>
          <div class="activity-text">
            <p class="title">Certificate generated</p>
            <p class="desc">42 certificates issued for Batch Dec-24</p>
            <p class="activity-time">1 hr ago</p>
          </div>
        </div>
        <div class="activity-item">
          <div class="activity-icon" style="background:#fce7f3;color:#ec4899;"><i class="fas fa-chalkboard-teacher"></i></div>
          <div class="activity-text">
            <p class="title">New teacher onboarded</p>
            <p class="desc">Sana Sheikh joined as instructor</p>
            <p class="activity-time">3 hrs ago</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Payment Verification -->
    <div class="col-12 col-lg-4">
      <div class="list-card">
        <div class="list-card-header">
          <div class="d-flex align-items-center gap-2">
            <p class="list-card-title" style="margin:0;"><i class="fas fa-rupee-sign" style="color:#7c3aed;margin-right:6px;"></i>Payment Verification</p>
            <span class="status-badge pending" style="font-size:11px;">{{ $pendingPaymentsCount ?? 3 }} pending</span>
          </div>
        </div>
        <a href="{{ route('admin.payments.index') }}" class="verify-item" style="text-decoration:none;color:inherit;">
          <div>
            <div style="font-size:13.5px;font-weight:600;">Rohit Verma</div>
            <div style="font-size:12px;color:var(--text-muted);">Bank Transfer · ₹22,000</div>
          </div>
          <i class="fas fa-chevron-right" style="color:var(--text-muted);font-size:12px;"></i>
        </a>
        <a href="{{ route('admin.payments.index') }}" class="verify-item" style="text-decoration:none;color:inherit;">
          <div>
            <div style="font-size:13.5px;font-weight:600;">Arjun Das</div>
            <div style="font-size:12px;color:var(--text-muted);">UPI · ₹8,000</div>
          </div>
          <i class="fas fa-chevron-right" style="color:var(--text-muted);font-size:12px;"></i>
        </a>
        <div class="verify-placeholder">
          <span>Click a payment to review &amp; verify</span>
        </div>
      </div>
    </div>

    <!-- Upcoming Batches + Pending Approvals -->
    <div class="col-12 col-lg-4">
      <div class="list-card mb-3">
        <div class="list-card-header">
          <p class="list-card-title"><i class="fas fa-calendar-alt" style="color:#d97706;margin-right:6px;"></i>Upcoming Batches</p>
        </div>
        <div class="progress-item">
          <div class="progress-label"><span>Full Stack Web Dev - Batch Feb-25</span><span style="color:var(--text-muted);">47/60 seats</span></div>
          <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:78%;background:linear-gradient(90deg,#7c3aed,#a855f7);"></div></div>
          <div style="font-size:11px;color:var(--text-muted);margin-top:3px;">Starts Feb 1, 2025</div>
        </div>
        <div class="progress-item">
          <div class="progress-label"><span>Data Science - Batch Feb-25</span><span style="color:var(--text-muted);">38/40 seats</span></div>
          <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:95%;background:linear-gradient(90deg,#059669,#10b981);"></div></div>
          <div style="font-size:11px;color:var(--text-muted);margin-top:3px;">Starts Feb 5, 2025</div>
        </div>
        <div class="progress-item">
          <div class="progress-label"><span>UI/UX Design - Batch Mar-25</span><span style="color:var(--text-muted);">22/30 seats</span></div>
          <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:73%;background:linear-gradient(90deg,#0891b2,#06b6d4);"></div></div>
          <div style="font-size:11px;color:var(--text-muted);margin-top:3px;">Starts Mar 1, 2025</div>
        </div>
      </div>

      <div class="list-card">
        <div class="list-card-header">
          <div class="d-flex align-items-center gap-2">
            <p class="list-card-title" style="margin:0;"><i class="fas fa-bolt" style="color:#f59e0b;margin-right:6px;"></i>Pending Approvals</p>
            <span class="status-badge pending">{{ $pendingApprovalsCount ?? 3 }}</span>
          </div>
        </div>
        <div class="approval-item">
          <div class="avatar-circle" style="background:#7c3aed;width:32px;height:32px;font-size:11px;">AR</div>
          <div style="flex:1;min-width:0;">
            <div style="font-size:13px;font-weight:600;">Arjun Das</div>
            <div style="font-size:11px;color:var(--text-muted);">Machine Learning A-Z — Batch Mar...</div>
            <div style="font-size:11px;color:var(--text-muted);">2 hrs ago</div>
          </div>
          <a href="{{ route('admin.students.index') }}" class="review-btn">Review</a>
        </div>
        <div class="approval-item">
          <div class="avatar-circle" style="background:#0891b2;width:32px;height:32px;font-size:11px;">RV</div>
          <div style="flex:1;min-width:0;">
            <div style="font-size:13px;font-weight:600;">Rohit Verma</div>
            <div style="font-size:11px;color:var(--text-muted);">Payment Verification – ₹22,000</div>
            <div style="font-size:11px;color:var(--text-muted);">5 hrs ago</div>
          </div>
          <a href="{{ route('admin.payments.index') }}" class="review-btn">Review</a>
        </div>
      </div>
    </div>
  </div>

  <!-- LAST ROW: Most Popular Courses + Teacher Performance -->
  <div class="row g-3">
    <div class="col-12 col-lg-6">
      <div class="list-card">
        <div class="list-card-header">
          <div>
            <p class="list-card-title">Most Popular Courses</p>
            <p class="list-card-sub">By total enrollments</p>
          </div>
        </div>
        <div class="rank-item">
          <div class="rank-num gold">1</div>
          <div class="rank-info">
            <div class="rank-name">Full Stack Web Development</div>
            <div class="rank-sub">2,847 enrolled <span class="star-row">★ 4.9</span></div>
          </div>
          <div class="rank-pct good">78%<br><small style="font-size:10px;color:var(--text-muted);">completion</small></div>
        </div>
        <div class="rank-item">
          <div class="rank-num silver">2</div>
          <div class="rank-info">
            <div class="rank-name">Data Science with Python</div>
            <div class="rank-sub">2,341 enrolled <span class="star-row">★ 4.8</span></div>
          </div>
          <div class="rank-pct good">72%<br><small style="font-size:10px;color:var(--text-muted);">completion</small></div>
        </div>
        <div class="rank-item">
          <div class="rank-num bronze">3</div>
          <div class="rank-info">
            <div class="rank-name">UI/UX Design Masterclass</div>
            <div class="rank-sub">1,923 enrolled <span class="star-row">★ 4.7</span></div>
          </div>
          <div class="rank-pct good">81%<br><small style="font-size:10px;color:var(--text-muted);">completion</small></div>
        </div>
        <div class="rank-item">
          <div class="rank-num" style="background:#d1d5db;color:#374151;">4</div>
          <div class="rank-info">
            <div class="rank-name">Digital Marketing</div>
            <div class="rank-sub">1,756 enrolled <span class="star-row">★ 4.6</span></div>
          </div>
          <div class="rank-pct good">85%<br><small style="font-size:10px;color:var(--text-muted);">completion</small></div>
        </div>
        <div class="rank-item">
          <div class="rank-num" style="background:#d1d5db;color:#374151;">5</div>
          <div class="rank-info">
            <div class="rank-name">Machine Learning A-Z</div>
            <div class="rank-sub">1,534 enrolled <span class="star-row">★ 4.8</span></div>
          </div>
          <div class="rank-pct good">69%<br><small style="font-size:10px;color:var(--text-muted);">completion</small></div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <div class="list-card">
        <div class="list-card-header">
          <div>
            <p class="list-card-title">Teacher Performance</p>
            <p class="list-card-sub">Top performers this month</p>
          </div>
        </div>
        <div class="rank-item">
          <div class="avatar-circle" style="background:#7c3aed;">RK</div>
          <div class="rank-info">
            <div class="rank-name">Rajesh Kumar</div>
            <div class="rank-sub">892 students · 5 courses</div>
          </div>
          <div class="rank-pct" style="text-align:right;">
            <span class="star-row" style="font-size:13px;">★ 4.9</span><br>
            <small style="color:var(--text-muted);">₹1.8L</small>
          </div>
        </div>
        <div class="rank-item">
          <div class="avatar-circle" style="background:#0891b2;">PM</div>
          <div class="rank-info">
            <div class="rank-name">Priya Mehta</div>
            <div class="rank-sub">743 students · 4 courses</div>
          </div>
          <div class="rank-pct" style="text-align:right;">
            <span class="star-row" style="font-size:13px;">★ 4.8</span><br>
            <small style="color:var(--text-muted);">₹1.6L</small>
          </div>
        </div>
        <div class="rank-item">
          <div class="avatar-circle" style="background:#059669;">AS</div>
          <div class="rank-info">
            <div class="rank-name">Amit Sharma</div>
            <div class="rank-sub">678 students · 6 courses</div>
          </div>
          <div class="rank-pct" style="text-align:right;">
            <span class="star-row" style="font-size:13px;">★ 4.7</span><br>
            <small style="color:var(--text-muted);">₹1.4L</small>
          </div>
        </div>
        <div class="rank-item">
          <div class="avatar-circle" style="background:#ec4899;">SV</div>
          <div class="rank-info">
            <div class="rank-name">Sunita Verma</div>
            <div class="rank-sub">612 students · 3 courses</div>
          </div>
          <div class="rank-pct" style="text-align:right;">
            <span class="star-row" style="font-size:13px;">★ 4.6</span><br>
            <small style="color:var(--text-muted);">₹1.3L</small>
          </div>
        </div>
        <div class="rank-item">
          <div class="avatar-circle" style="background:#d97706;">VS</div>
          <div class="rank-info">
            <div class="rank-name">Vikram Singh</div>
            <div class="rank-sub">534 students · 4 courses</div>
          </div>
          <div class="rank-pct" style="text-align:right;">
            <span class="star-row" style="font-size:13px;">★ 4.8</span><br>
            <small style="color:var(--text-muted);">₹1.1L</small>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script>
const revenueData = {
  monthly: { labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'], data: [32000,35000,48000,52000,58000,62000,70000,75000,78000,72000,85000,92000] },
  daily:   { labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'], data: [8200,9100,7800,11200,13400,15600,12300] },
  yearly:  { labels: ['2020','2021','2022','2023','2024','2025'], data: [280000,340000,410000,520000,680000,820000] }
};

const revenueCtx = document.getElementById('revenueChart').getContext('2d');
const revenueChart = new Chart(revenueCtx, {
  type: 'line',
  data: {
    labels: revenueData.monthly.labels,
    datasets: [{
      data: revenueData.monthly.data,
      borderColor: '#7c3aed', backgroundColor: 'rgba(124,58,237,0.1)',
      borderWidth: 2.5, fill: true, tension: 0.4,
      pointRadius: 0, pointHoverRadius: 5, pointHoverBackgroundColor: '#7c3aed'
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } },
    scales: {
      x: { grid: { display: false }, ticks: { font: { size: 11 }, color: '#9ca3af' } },
      y: { grid: { color: '#f3f4f6' }, ticks: { font: { size: 11 }, color: '#9ca3af', callback: v => '₹' + (v >= 1000 ? (v/1000).toFixed(0) + 'k' : v) } }
    }
  }
});

function updateRevenueChart(period) {
  const d = revenueData[period];
  revenueChart.data.labels = d.labels;
  revenueChart.data.datasets[0].data = d.data;
  revenueChart.update();
}

new Chart(document.getElementById('donutChart').getContext('2d'), {
  type: 'doughnut',
  data: {
    labels: ['Technology','Design','Marketing','Business','Others'],
    datasets: [{ data: [45,20,18,12,5], backgroundColor: ['#7c3aed','#06b6d4','#10b981','#f59e0b','#ef4444'], borderWidth: 0, hoverOffset: 6 }]
  },
  options: { responsive: true, cutout: '68%', plugins: { legend: { display: false }, tooltip: { callbacks: { label: ctx => ctx.label + ': ' + ctx.parsed + '%' } } } }
});

new Chart(document.getElementById('barChart').getContext('2d'), {
  type: 'bar',
  data: {
    labels: ['Week 1','Week 2','Week 3','Week 4','Week 5','Week 6','Week 7','Week 8'],
    datasets: [
      { label: 'New', data: [120,180,160,210,195,230,240,220], backgroundColor: '#7c3aed', borderRadius: 4, barPercentage: 0.45 },
      { label: 'Completed', data: [280,350,420,390,460,490,560,510], backgroundColor: '#10b981', borderRadius: 4, barPercentage: 0.45 }
    ]
  },
  options: {
    responsive: true,
    plugins: { legend: { position: 'bottom', labels: { font: { size: 11 }, usePointStyle: true, pointStyleWidth: 8, padding: 16 } } },
    scales: {
      x: { grid: { display: false }, ticks: { font: { size: 11 }, color: '#9ca3af' } },
      y: { grid: { color: '#f3f4f6' }, ticks: { font: { size: 11 }, color: '#9ca3af' } }
    }
  }
});

new Chart(document.getElementById('growthChart').getContext('2d'), {
  type: 'line',
  data: {
    labels: ['Week 1','Week 2','Week 3','Week 4','Week 5','Week 6','Week 7','Week 8'],
    datasets: [{ data: [9000,9400,9800,10200,10700,11200,11700,12000], borderColor: '#06b6d4', backgroundColor: 'rgba(6,182,212,0.08)', borderWidth: 2.5, fill: true, tension: 0.4, pointRadius: 0, pointHoverRadius: 5, pointHoverBackgroundColor: '#06b6d4' }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } },
    scales: {
      x: { grid: { display: false }, ticks: { font: { size: 10 }, color: '#9ca3af' } },
      y: { grid: { color: '#f3f4f6' }, ticks: { font: { size: 10 }, color: '#9ca3af', callback: v => v >= 1000 ? (v/1000).toFixed(1) + 'k' : v } }
    }
  }
});
</script>
@endpush
