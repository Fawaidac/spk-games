/**
 * GameMatch RecSys Platform - Core Application & Modal Controller
 */

// ========================================================
// 1. MODAL CONTROLLERS (GLOBAL)
// ========================================================
function toggleModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.toggle('hidden');
  }
}

function switchModal(fromId, toId) {
  toggleModal(fromId);
  toggleModal(toId);
}

// Close on outside click
window.addEventListener('click', function (event) {
  const loginModal = document.getElementById('modal-login');
  const registerModal = document.getElementById('modal-register');
  const detailModal = document.getElementById('modal-detail-game');
  const historyModal = document.getElementById('modal-history');
  const adminUserModal = document.getElementById('modal-admin-user');
  const adminGenreModal = document.getElementById('modal-admin-genre');

  if (event.target === loginModal) loginModal.classList.add('hidden');
  if (event.target === registerModal) registerModal.classList.add('hidden');
  if (event.target === detailModal) detailModal.classList.add('hidden');
  if (event.target === historyModal) historyModal.classList.add('hidden');
  if (event.target === adminUserModal) adminUserModal.classList.add('hidden');
  if (event.target === adminGenreModal) adminGenreModal.classList.add('hidden');
});

// Close on ESC key
window.addEventListener('keydown', function (event) {
  if (event.key === 'Escape') {
    const modals = [
      'modal-login',
      'modal-register',
      'modal-detail-game',
      'modal-history',
      'modal-admin-user',
      'modal-admin-genre'
    ];
    modals.forEach(function (id) {
      const el = document.getElementById(id);
      if (el) el.classList.add('hidden');
    });
  }
});

// ========================================================
// 2. ADMIN DASHBOARD MODUL TAB SWITCHER
// ========================================================
function switchAdminTab(tabName, event) {
  // Tab switching is now managed by dedicated Laravel routes
  const panes = document.querySelectorAll('.admin-tab-pane');
  if (panes.length > 1) {
    if (event) event.preventDefault();
    panes.forEach(function (pane) {
      pane.classList.add('hidden');
    });
    const targetPane = document.getElementById('tab-content-' + tabName);
    if (targetPane) {
      targetPane.classList.remove('hidden');
    }
  }
}

// ========================================================
// 3. ADMIN FILTER & SEARCH CONTROLLERS
// ========================================================
function filterUserAdmin(query) {
  const q = (query || '').toLowerCase().trim();
  const roleSelect = document.getElementById('filter-user-role');
  const roleFilter = roleSelect ? roleSelect.value : 'all';
  const rows = document.querySelectorAll('.user-table-row');

  rows.forEach(function (row) {
    const name = row.getAttribute('data-name') || '';
    const email = row.getAttribute('data-email') || '';
    const role = row.getAttribute('data-role') || '';

    const matchesText = !q || name.includes(q) || email.includes(q);
    const matchesRole = roleFilter === 'all' || role === roleFilter;

    if (matchesText && matchesRole) {
      row.classList.remove('hidden');
    } else {
      row.classList.add('hidden');
    }
  });
}

function filterUserRoleAdmin(role) {
  const searchInput = document.getElementById('search-user-input');
  filterUserAdmin(searchInput ? searchInput.value : '');
}

function filterGenreAdmin(query) {
  const q = (query || '').toLowerCase().trim();
  const cards = document.querySelectorAll('.genre-card');
  let visibleCount = 0;

  cards.forEach(function (card) {
    const name = card.getAttribute('data-genre-item') || '';
    if (!q || name.includes(q)) {
      card.classList.remove('hidden');
      visibleCount++;
    } else {
      card.classList.add('hidden');
    }
  });

  const countLabel = document.getElementById('genre-count-label');
  if (countLabel) {
    countLabel.textContent = 'Menampilkan ' + visibleCount + ' Genre';
  }
}

function openModalUser() {
  const modal = document.getElementById('modal-admin-user');
  if (modal) modal.classList.remove('hidden');
}

function closeModalUser() {
  const modal = document.getElementById('modal-admin-user');
  if (modal) modal.classList.add('hidden');
}

function openModalGenre() {
  const modal = document.getElementById('modal-admin-genre');
  if (modal) modal.classList.remove('hidden');
}

function closeModalGenre() {
  const modal = document.getElementById('modal-admin-genre');
  if (modal) modal.classList.add('hidden');
}

// Inisialisasi awal saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
  // Event listeners siap
});
