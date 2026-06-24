
function toggleSidebar() {
  document.getElementById('sidebar').classList.toggle('open');
}

document.addEventListener('click', function (e) {
  const sidebar = document.getElementById('sidebar');
  const menuBtn = document.querySelector('.topbar-menu-btn');
  if (window.innerWidth < 992 && sidebar.classList.contains('open')) {
    if (!sidebar.contains(e.target) && e.target !== menuBtn && !menuBtn.contains(e.target)) {
      sidebar.classList.remove('open');
    }
  }
});


function switchPeriod(btn, period, callback) {
  btn.closest('.period-tabs').querySelectorAll('.period-tab').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  if (typeof callback === 'function') callback(period);
}


const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

function postJSON(url, data = {}) {
  return fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
      'Accept': 'application/json'
    },
    body: JSON.stringify(data)
  }).then(res => res.json());
}


function confirmDelete(formId, message = 'Are you sure you want to delete this item?') {
  if (confirm(message)) {
    document.getElementById(formId).submit();
  }
}


function showToast(message, type = 'success') {
  const toastEl = document.createElement('div');
  toastEl.className = `toast-msg toast-${type}`;
  toastEl.textContent = message;
  toastEl.style.cssText = `
    position: fixed; top: 20px; right: 20px; z-index: 9999;
    background: ${type === 'success' ? '#10b981' : '#ef4444'};
    color: #fff; padding: 12px 20px; border-radius: 8px;
    font-size: 13px; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  `;
  document.body.appendChild(toastEl);
  setTimeout(() => toastEl.remove(), 3000);
}


function filterTable(inputEl, tableId) {
  const filter = inputEl.value.toLowerCase();
  const rows = document.querySelectorAll(`#${tableId} tbody tr`);
  rows.forEach(row => {
    row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
  });
}

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.alert-dismissible').forEach(alert => {
    setTimeout(() => {
      const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
      bsAlert.close();
    }, 4000);
  });
});
