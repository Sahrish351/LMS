@extends('layouts.admin')

@section('title', 'Certificate Management')
@section('page-title', 'Certificate Management')
@section('page-subtitle', 'Manage student certificates')

@section('content')

<div class="page-header">
    <div>
        <h2>Certificate Management</h2>
        <p>Manage student certificates</p>
    </div>
    <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#issueCertificateModal">
        <i class="fas fa-plus"></i> Issue Certificate
    </button>
</div>

<!-- ===== STATS CARDS ===== -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:#ede9fe;">
                <i class="fas fa-certificate" style="color:#7c3aed;"></i>
            </div>
            <div class="stat-value" style="color:#7c3aed;">{{ $totalCertificates ?? 2341 }}</div>
            <div class="stat-label">Total Certificates</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:#d1fae5;">
                <i class="fas fa-check-circle" style="color:#059669;"></i>
            </div>
            <div class="stat-value" style="color:#059669;">{{ $issuedThisMonth ?? 183 }}</div>
            <div class="stat-label">Issued This Month</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:#fef3c7;">
                <i class="fas fa-clock" style="color:#d97706;"></i>
            </div>
            <div class="stat-value" style="color:#d97706;">{{ $pendingIssue ?? 24 }}</div>
            <div class="stat-label">Pending Issue</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background:#fce7f3;">
                <i class="fas fa-trophy" style="color:#ec4899;"></i>
            </div>
            <div class="stat-value" style="color:#ec4899;">A+</div>
            <div class="stat-label">Top Grade</div>
        </div>
    </div>
</div>

<!-- ===== SEARCH SECTION ===== -->
<div class="data-table-card mb-3">
    <div class="p-3">
        <div class="row g-2 align-items-center">
            <div class="col-12 col-md-5">
                <div class="search-box" style="position:relative;width:100%;">
                    <i class="fas fa-search" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:14px;"></i>
                    <input type="text" id="searchInput" placeholder="Search certificates by student, course..." 
                           onkeyup="filterCertificates()"
                           style="width:100%;padding:10px 16px 10px 42px;border:1.5px solid var(--border);border-radius:10px;font-size:14px;background:#fff;outline:none;">
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="d-flex gap-2 flex-wrap align-items-center">
                    <div class="dropdown" style="position:relative;">
                        <button class="btn-primary-custom dropdown-toggle" 
                                style="background:#f3f4f6;color:var(--text-main);border:1.5px solid var(--border);padding:9px 18px;font-size:13px;border-radius:10px;"
                                data-bs-toggle="dropdown">
                            <i class="fas fa-filter"></i> Filter
                            <i class="fas fa-chevron-down ms-1" style="font-size:11px;"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" style="min-width:220px;padding:12px;top:calc(100% + 5px);left:0;right:auto;z-index:1050;">
                            <li>
                                <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-muted);margin-bottom:4px;">Status</label>
                                <select id="statusFilter" class="form-select form-select-sm" onchange="filterCertificates()" style="font-size:13px;padding:5px 10px;">
                                    <option value="">All Status</option>
                                    <option value="issued">✅ Issued</option>
                                    <option value="pending">🟡 Pending</option>
                                </select>
                            </li>
                            <li><hr class="dropdown-divider" style="margin:8px 0;"></li>
                            <li>
                                <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-muted);margin-bottom:4px;">Grade</label>
                                <select id="gradeFilter" class="form-select form-select-sm" onchange="filterCertificates()" style="font-size:13px;padding:5px 10px;">
                                    <option value="">All Grades</option>
                                    <option value="A+">A+</option>
                                    <option value="A">A</option>
                                    <option value="B+">B+</option>
                                    <option value="B">B</option>
                                </select>
                            </li>
                            <li><hr class="dropdown-divider" style="margin:8px 0;"></li>
                            <li class="d-flex gap-2">
                                <button class="btn btn-sm btn-primary w-50" onclick="applyFilters()" style="background:#7c3aed;border-color:#7c3aed;font-size:13px;padding:5px 10px;">Apply</button>
                                <button class="btn btn-sm btn-light w-50" onclick="resetFilters()" style="font-size:13px;padding:5px 10px;">Reset</button>
                            </li>
                        </ul>
                    </div>
                    <button class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);border:1.5px solid var(--border);padding:9px 18px;font-size:13px;border-radius:10px;" onclick="exportData()">
                        <i class="fas fa-file-export"></i> Export
                    </button>
                    <button class="btn-primary-custom" style="background:#f3f4f6;color:var(--text-main);border:1.5px solid var(--border);padding:9px 18px;font-size:13px;border-radius:10px;" onclick="clearSearch()">
                        <i class="fas fa-times"></i> Clear
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== TABLE ===== -->
<div class="data-table-card">
    <div class="table-responsive" style="max-height:500px;overflow-y:auto;">
        <table class="table table-hover mb-0" id="certificatesTable" style="font-size:14px;min-width:1000px;">
            <thead style="position:sticky;top:0;background:#f9fafb;z-index:10;">
                <tr>
                    <th style="width:50px;padding:12px 10px;text-align:center;">#</th>
                    <th style="padding:12px 15px;cursor:pointer;min-width:160px;" onclick="sortTable(1)">
                        Student <i class="fas fa-sort ms-1" style="font-size:11px;color:var(--text-muted);"></i>
                    </th>
                    <th style="padding:12px 15px;cursor:pointer;min-width:180px;" onclick="sortTable(2)">
                        Course <i class="fas fa-sort ms-1" style="font-size:11px;color:var(--text-muted);"></i>
                    </th>
                    <th style="padding:12px 15px;min-width:100px;">Batch</th>
                    <th style="padding:12px 15px;cursor:pointer;min-width:120px;" onclick="sortTable(4)">
                        Issue Date <i class="fas fa-sort ms-1" style="font-size:11px;color:var(--text-muted);"></i>
                    </th>
                    <th style="padding:12px 15px;min-width:80px;">Grade</th>
                    <th style="padding:12px 15px;min-width:100px;">Status</th>
                    <th style="padding:12px 10px;text-align:center;min-width:130px;">Actions</th>
                </tr>
            </thead>
            <tbody id="certificatesTableBody">
                @forelse(($certificates ?? []) as $index => $cert)
                <tr data-status="{{ $cert['status'] ?? 'issued' }}" data-grade="{{ $cert['grade'] ?? 'A+' }}">
                    <td style="padding:14px 10px;text-align:center;font-weight:700;font-size:15px;color:#7c3aed;">{{ $index + 1 }}</td>
                    <td style="padding:14px 15px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-circle" style="width:36px;height:36px;font-size:13px;background:#7c3aed;">
                                {{ substr($cert['student'] ?? 'SA', 0, 2) }}
                            </div>
                            <div>
                                <div style="font-weight:600;font-size:14px;">{{ $cert['student'] ?? 'Student Name' }}</div>
                                <div style="font-size:12px;color:var(--text-muted);">{{ $cert['email'] ?? 'student@email.com' }}</div>
                            </div>
                        </div>
                    </td>
                    <td style="padding:14px 15px;">
                        <span style="background:#f3f4f6;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:500;display:inline-block;">
                            {{ $cert['course'] ?? 'Web Development' }}
                        </span>
                    </td>
                    <td style="padding:14px 15px;">
                        <span style="background:#ede9fe;color:#7c3aed;padding:4px 14px;border-radius:20px;font-size:12px;font-weight:600;">
                            {{ $cert['batch'] ?? 'Batch 1' }}
                        </span>
                    </td>
                    <td style="padding:14px 15px;font-size:13px;">{{ $cert['issue_date'] ?? date('d M, Y') }}</td>
                    <td style="padding:14px 15px;">
                        <span style="background:#fef3c7;color:#d97706;padding:4px 14px;border-radius:20px;font-weight:700;font-size:13px;">
                            {{ $cert['grade'] ?? 'A+' }}
                        </span>
                    </td>
                    <td style="padding:14px 15px;">
                        <span class="status-badge {{ ($cert['status'] ?? 'issued') == 'issued' ? 'confirmed' : 'pending' }}" 
                              style="font-size:12px;padding:4px 14px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;">
                            <i class="fas {{ ($cert['status'] ?? 'issued') == 'issued' ? 'fa-check-circle' : 'fa-clock' }}" style="font-size:11px;"></i>
                            {{ ucfirst($cert['status'] ?? 'Issued') }}
                        </span>
                    </td>
                    <td style="padding:14px 10px;text-align:center;">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.certificates.download', $cert['id'] ?? 1) }}" 
                               class="btn btn-sm" style="background:#ede9fe;color:#7c3aed;border-radius:8px;width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;border:none;">
                                <i class="fas fa-download" style="font-size:14px;"></i>
                            </a>
                            <button type="button" 
                                    class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border-radius:8px;width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;border:none;"
                                    onclick="confirmDelete({{ $cert['id'] ?? 1 }})">
                                <i class="fas fa-trash" style="font-size:14px;"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <!-- Demo Data -->
                <tr>
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
                    <td style="padding:14px 15px;font-size:13px;">15 Jan 2025</td>
                    <td style="padding:14px 15px;"><span style="background:#fef3c7;color:#d97706;padding:4px 14px;border-radius:20px;font-weight:700;font-size:13px;">A+</span></td>
                    <td style="padding:14px 15px;"><span class="status-badge confirmed" style="font-size:12px;padding:4px 14px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;"><i class="fas fa-check-circle" style="font-size:11px;"></i> Issued</span></td>
                    <td style="padding:14px 10px;text-align:center;">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-sm" style="background:#ede9fe;color:#7c3aed;border-radius:8px;width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;border:none;"><i class="fas fa-download"></i></a>
                            <button class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border-radius:8px;width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;border:none;"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
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
                    <td style="padding:14px 15px;font-size:13px;">01 Feb 2025</td>
                    <td style="padding:14px 15px;"><span style="background:#fef3c7;color:#d97706;padding:4px 14px;border-radius:20px;font-weight:700;font-size:13px;">A</span></td>
                    <td style="padding:14px 15px;"><span class="status-badge pending" style="font-size:12px;padding:4px 14px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;"><i class="fas fa-clock" style="font-size:11px;"></i> Pending</span></td>
                    <td style="padding:14px 10px;text-align:center;">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-sm" style="background:#ede9fe;color:#7c3aed;border-radius:8px;width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;border:none;"><i class="fas fa-download"></i></a>
                            <button class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border-radius:8px;width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;border:none;"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
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
                    <td style="padding:14px 15px;font-size:13px;">15 Feb 2025</td>
                    <td style="padding:14px 15px;"><span style="background:#fef3c7;color:#d97706;padding:4px 14px;border-radius:20px;font-weight:700;font-size:13px;">B+</span></td>
                    <td style="padding:14px 15px;"><span class="status-badge confirmed" style="font-size:12px;padding:4px 14px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;"><i class="fas fa-check-circle" style="font-size:11px;"></i> Issued</span></td>
                    <td style="padding:14px 10px;text-align:center;">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="#" class="btn btn-sm" style="background:#ede9fe;color:#7c3aed;border-radius:8px;width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;border:none;"><i class="fas fa-download"></i></a>
                            <button class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border-radius:8px;width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;border:none;"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ===== ISSUE CERTIFICATE MODAL ===== -->
<div class="modal fade" id="issueCertificateModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.certificates.issue', 0) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-certificate me-2" style="color:#7c3aed;"></i>Issue New Certificate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Student <span class="text-danger">*</span></label>
                            <select name="student_id" class="form-select" required>
                                <option value="">Select Student</option>
                                <option value="1">Aisha Patel</option>
                                <option value="2">Farhan Sheikh</option>
                                <option value="3">Meera Nair</option>
                                <option value="4">Suresh Reddy</option>
                                <option value="5">Kavya Singh</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Course <span class="text-danger">*</span></label>
                            <select name="course_id" class="form-select" required>
                                <option value="">Select Course</option>
                                <option value="1">Full Stack Web Development</option>
                                <option value="2">Data Science with Python</option>
                                <option value="3">UI/UX Design Masterclass</option>
                                <option value="4">Digital Marketing Pro</option>
                                <option value="5">Machine Learning A-Z</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Batch</label>
                            <select name="batch_id" class="form-select">
                                <option value="">Select Batch</option>
                                <option value="1">Batch 1</option>
                                <option value="2">Batch 2</option>
                                <option value="3">Batch 3</option>
                                <option value="4">Batch 4</option>
                                <option value="5">Batch 5</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Issue Date <span class="text-danger">*</span></label>
                            <input type="date" name="issued_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Grade</label>
                            <select name="grade" class="form-select">
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="issued">Issued</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Certificate ID</label>
                            <input type="text" name="certificate_id" class="form-control" placeholder="CERT-2025-0001" value="CERT-{{ date('Y') }}-0001">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Notes</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="Additional notes..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-primary-custom"><i class="fas fa-certificate"></i> Issue Certificate</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function filterCertificates() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
    const statusFilter = document.getElementById('statusFilter').value.toLowerCase();
    const gradeFilter = document.getElementById('gradeFilter').value.toLowerCase();
    
    const rows = document.querySelectorAll('#certificatesTableBody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const status = row.dataset.status || '';
        const grade = row.dataset.grade || '';
        let show = true;
        if (searchTerm && !text.includes(searchTerm)) show = false;
        if (statusFilter && status !== statusFilter) show = false;
        if (gradeFilter && grade !== gradeFilter) show = false;
        row.style.display = show ? '' : 'none';
    });
}

function applyFilters() {
    filterCertificates();
    const dropdown = document.querySelector('.dropdown');
    const menu = dropdown?.querySelector('.dropdown-menu');
    const toggle = dropdown?.querySelector('.dropdown-toggle');
    if (menu?.classList.contains('show')) {
        menu.classList.remove('show');
        toggle?.setAttribute('aria-expanded', 'false');
    }
}

function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('statusFilter').value = '';
    document.getElementById('gradeFilter').value = '';
    filterCertificates();
}

function clearSearch() {
    document.getElementById('searchInput').value = '';
    filterCertificates();
    document.getElementById('searchInput').focus();
}

let sortDirection = {};
function sortTable(columnIndex) {
    const tbody = document.getElementById('certificatesTableBody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const dataRows = rows.filter(row => !row.querySelector('td[colspan]'));
    if (dataRows.length === 0) return;
    
    sortDirection[columnIndex] = !sortDirection[columnIndex];
    const direction = sortDirection[columnIndex] ? 1 : -1;
    
    dataRows.sort((a, b) => {
        const aText = a.cells[columnIndex]?.textContent.trim() || '';
        const bText = b.cells[columnIndex]?.textContent.trim() || '';
        return aText.localeCompare(bText) * direction;
    });
    
    dataRows.forEach(row => tbody.appendChild(row));
}

function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this certificate? This action cannot be undone.')) {
        // document.getElementById(`delete-form-${id}`).submit();
        alert('Certificate deleted successfully.');
    }
}

function exportData() {
    const visibleRows = document.querySelectorAll('#certificatesTableBody tr:not([style*="display: none"])');
    const dataRows = Array.from(visibleRows).filter(row => !row.querySelector('td[colspan]'));
    if (dataRows.length === 0) { alert('No data to export.'); return; }
    let csv = 'S.No,Student,Course,Batch,Issue Date,Grade,Status\n';
    dataRows.forEach((row, index) => {
        const cells = row.querySelectorAll('td');
        const data = [];
        data.push(index + 1);
        for (let i = 1; i < cells.length - 1; i++) {
            let text = cells[i].textContent.trim().replace(/,/g, '');
            data.push(text.replace(/\s+/g, ' '));
        }
        csv += data.join(',') + '\n';
    });
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `certificates_export_${new Date().toISOString().slice(0,10)}.csv`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
}
</script>
@endpush