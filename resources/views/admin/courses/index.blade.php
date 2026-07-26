@extends('layouts.admin')

@section('title', 'Courses')
@section('page-title', 'Courses')
@section('page-subtitle', 'EduAdmin LMS Platform')

@section('content')

  <div class="page-header">
    <div>
      <h2>Course Management</h2>
      <p>{{ $totalCourses ?? 6 }} courses · {{ $publishedCourses ?? 5 }} published</p>
    </div>
    <div class="d-flex gap-2 align-items-center">
      <div class="period-tabs">
        <button class="period-tab {{ ($view ?? 'grid') == 'grid' ? 'active' : '' }}" onclick="switchView('grid')">Grid</button>
        <button class="period-tab {{ ($view ?? 'grid') == 'table' ? 'active' : '' }}" onclick="switchView('table')">Table</button>
      </div>
      <a href="{{ route('admin.courses.create') }}" class="btn-primary-custom">
        <i class="fas fa-plus"></i> New Course
      </a>
    </div>
  </div>

  <div class="mb-3" style="max-width:500px;">
    <div class="search-box" style="position:relative;">
      <i class="fas fa-search" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:13px;"></i>
      <input type="text" placeholder="Search courses..." onkeyup="filterCourses(this)"
             style="width:100%;padding:10px 16px 10px 38px;border:1.5px solid var(--border);border-radius:10px;font-size:13px;background:#fff;outline:none;">
    </div>
  </div>

  @php
    $courses = $courses ?? [
      ['id'=>1,'title'=>'Full Stack Web Development','instructor'=>'Rajesh Kumar','category'=>'Technology','category_color'=>'#7c3aed','category_bg'=>'#ede9fe','emoji'=>'💻','students'=>2847,'lessons'=>124,'duration'=>'6 months','completion'=>78,'price'=>18500,'rating'=>4.9,'status'=>'published'],
      ['id'=>2,'title'=>'Data Science with Python','instructor'=>'Priya Mehta','category'=>'Technology','category_color'=>'#7c3aed','category_bg'=>'#ede9fe','emoji'=>'📊','students'=>2341,'lessons'=>98,'duration'=>'5 months','completion'=>72,'price'=>22000,'rating'=>4.8,'status'=>'published'],
      ['id'=>3,'title'=>'UI/UX Design Masterclass','instructor'=>'Amit Sharma','category'=>'Design','category_color'=>'#db2777','category_bg'=>'#fce7f3','emoji'=>'🎨','students'=>1923,'lessons'=>86,'duration'=>'4 months','completion'=>81,'price'=>15000,'rating'=>4.7,'status'=>'published'],
      ['id'=>4,'title'=>'Digital Marketing Pro','instructor'=>'Sunita Verma','category'=>'Marketing','category_color'=>'#d97706','category_bg'=>'#fef3c7','emoji'=>'📣','students'=>1756,'lessons'=>64,'duration'=>'3 months','completion'=>85,'price'=>12000,'rating'=>4.6,'status'=>'published'],
      ['id'=>5,'title'=>'Machine Learning A-Z','instructor'=>'Rajesh Kumar','category'=>'Technology','category_color'=>'#7c3aed','category_bg'=>'#ede9fe','emoji'=>'🤖','students'=>1534,'lessons'=>112,'duration'=>'6 months','completion'=>69,'price'=>24000,'rating'=>4.8,'status'=>'published'],
      ['id'=>6,'title'=>'Cloud & DevOps Essentials','instructor'=>'Vikram Singh','category'=>'Technology','category_color'=>'#7c3aed','category_bg'=>'#ede9fe','emoji'=>'☁️','students'=>642,'lessons'=>58,'duration'=>'3 months','completion'=>54,'price'=>16500,'rating'=>4.5,'status'=>'draft'],
    ];
  @endphp

  <!-- ===== GRID VIEW ===== -->
  <div id="gridView" class="row g-3" style="{{ ($view ?? 'grid') == 'table' ? 'display:none;' : '' }}">
    @foreach($courses as $course)
    @php $course = (object) $course; @endphp
    <div class="col-12 col-md-6 col-lg-4 course-card-wrap" data-title="{{ strtolower($course->title) }}">
      <div class="stat-card p-0" style="overflow:hidden;">
        <div style="background:{{ $course->category_bg }};height:140px;display:flex;align-items:center;justify-content:center;font-size:48px;position:relative;">
          {{ $course->emoji }}
        </div>
        <div class="p-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span style="background:{{ $course->category_bg }};color:{{ $course->category_color }};font-size:11px;font-weight:600;padding:3px 10px;border-radius:20px;">{{ $course->category }}</span>
            <span class="status-badge {{ $course->status == 'published' ? 'confirmed' : 'pending' }}">{{ $course->status }}</span>
          </div>
          <h5 style="font-size:15px;font-weight:700;margin:0 0 4px;">{{ $course->title }}</h5>
          <p style="font-size:12.5px;color:var(--text-muted);margin:0 0 12px;">by {{ $course->instructor }}</p>

          <div class="d-flex gap-3 mb-3" style="font-size:12px;color:var(--text-muted);">
            <span><i class="fas fa-users me-1"></i>{{ number_format($course->students) }}</span>
            <span><i class="fas fa-book me-1"></i>{{ $course->lessons }} lessons</span>
            <span><i class="fas fa-clock me-1"></i>{{ $course->duration }}</span>
          </div>

          <div class="mb-3">
            <div class="d-flex justify-content-between" style="font-size:12px;color:var(--text-muted);margin-bottom:5px;">
              <span>Completion Rate</span><span style="font-weight:600;color:var(--text-main);">{{ $course->completion }}%</span>
            </div>
            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:{{ $course->completion }}%;"></div></div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div style="font-size:17px;font-weight:800;">₹{{ number_format($course->price) }}</div>
              <div class="star-row">★ {{ $course->rating }}</div>
            </div>
            <div class="d-flex gap-2">
              <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-sm" style="background:#ede9fe;color:#7c3aed;border-radius:8px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm" style="background:#f3f4f6;color:var(--text-main);border-radius:8px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-edit"></i></a>
              <form id="del-course-{{ $course->id }}" action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="button" class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border-radius:8px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;border:none;" onclick="confirmDelete('del-course-{{ $course->id }}','Delete this course?')"><i class="fas fa-trash"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <!-- ===== TABLE VIEW ===== -->
  <div id="tableView" class="data-table-card" style="{{ ($view ?? 'grid') == 'table' ? '' : 'display:none;' }}">
    <div class="table-responsive">
      <table class="table mb-0" id="coursesTable">
        <thead>
          <tr>
            <th>Course</th>
            <th>Category</th>
            <th>Instructor</th>
            <th>Students</th>
            <th>Completion</th>
            <th>Price</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($courses as $course)
          @php $course = (object) $course; @endphp
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <div class="avatar-icon-box" style="background:{{ $course->category_bg }};font-size:18px;">{{ $course->emoji }}</div>
                <div style="font-weight:600;">{{ $course->title }}</div>
              </div>
            </td>
            <td><span style="background:{{ $course->category_bg }};color:{{ $course->category_color }};font-size:11px;font-weight:600;padding:3px 10px;border-radius:20px;">{{ $course->category }}</span></td>
            <td>{{ $course->instructor }}</td>
            <td>{{ number_format($course->students) }}</td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <div class="progress-bar-bg" style="width:70px;"><div class="progress-bar-fill" style="width:{{ $course->completion }}%;"></div></div>
                <span style="font-size:12px;color:var(--text-muted);">{{ $course->completion }}%</span>
              </div>
            </td>
            <td style="font-weight:700;">₹{{ number_format($course->price) }}</td>
            <td><span class="star-row" style="font-size:13px;">★ {{ $course->rating }}</span></td>
            <td><span class="status-badge {{ $course->status == 'published' ? 'confirmed' : 'pending' }}">{{ $course->status }}</span></td>
            <td>
              <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a>
              <form id="del-course-tbl-{{ $course->id }}" action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="button" class="btn btn-sm btn-light text-danger" onclick="confirmDelete('del-course-tbl-{{ $course->id }}','Delete this course?')"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection

@push('scripts')
<script>
function switchView(view) {
  const gridBtn = document.querySelectorAll('.period-tab')[0];
  const tableBtn = document.querySelectorAll('.period-tab')[1];
  const gridView = document.getElementById('gridView');
  const tableView = document.getElementById('tableView');

  if (view === 'grid') {
    gridView.style.display = '';
    tableView.style.display = 'none';
    gridBtn.classList.add('active');
    tableBtn.classList.remove('active');
  } else {
    gridView.style.display = 'none';
    tableView.style.display = '';
    tableBtn.classList.add('active');
    gridBtn.classList.remove('active');
  }
  try { localStorage.setItem('coursesView', view); } catch(e) {}
}

function filterCourses(inputEl) {
  const filter = inputEl.value.toLowerCase();
  document.querySelectorAll('.course-card-wrap').forEach(card => {
    card.style.display = card.dataset.title.includes(filter) ? '' : 'none';
  });
  filterTable(inputEl, 'coursesTable');
}

// Restore saved view preference
document.addEventListener('DOMContentLoaded', function() {
  try {
    const saved = localStorage.getItem('coursesView');
    if (saved) switchView(saved);
  } catch(e) {}
});
</script>
@endpush
