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
  if (event) {
    event.preventDefault();
  }

  const validTabs = [
    'dashboard',
    'datagame',
    'genre',
    'import',
    'pengguna',
    'bantuan',
    'pengaturan'
  ];
  if (!validTabs.includes(tabName)) {
    tabName = 'dashboard';
  }

  // Sembunyikan semua pane tab modul
  document.querySelectorAll('.admin-tab-pane').forEach(function (pane) {
    pane.classList.add('hidden');
  });

  // Tampilkan pane target
  const targetPane = document.getElementById('tab-content-' + tabName);
  if (targetPane) {
    targetPane.classList.remove('hidden');
  }

  // Perbarui styling navigasi di sidebar
  document.querySelectorAll('.admin-nav-item').forEach(function (link) {
    const itemTab = link.getAttribute('data-tab');
    const isCurrent = itemTab === tabName;

    if (isCurrent) {
      link.classList.add(
        'bg-gradient-to-r',
        'from-primary/15',
        'via-surface-container',
        'to-transparent',
        'text-primary',
        'font-bold',
        'border-l-4',
        'border-primary',
        'shadow-sm',
        'glow-cyan-sm'
      );
      link.classList.remove('text-on-surface-variant', 'font-medium');
      const badge = link.querySelector('.tab-badge-active');
      if (badge) badge.classList.remove('hidden');
    } else {
      link.classList.remove(
        'bg-gradient-to-r',
        'from-primary/15',
        'via-surface-container',
        'to-transparent',
        'text-primary',
        'font-bold',
        'border-l-4',
        'border-primary',
        'shadow-sm',
        'glow-cyan-sm'
      );
      link.classList.add('text-on-surface-variant', 'font-medium');
      const badge = link.querySelector('.tab-badge-active');
      if (badge && itemTab === 'dashboard') badge.classList.add('hidden');
    }
  });

  // Sinkronisasi Judul & Subtitle Header Top Command Bar
  const titleEl = document.getElementById('admin-header-title');
  const subEl = document.getElementById('admin-header-subtitle');
  const tabMeta = {
    dashboard: {
      title: 'Konsol Administrasi & Mesin Rekomendasi ML',
      sub: 'Manajemen pipeline dataset Steam Kaggle & matriks Cosine Similarity'
    },
    datagame: {
      title: 'Katalog & Manajemen Data Game PC',
      sub: 'Eksplorasi, kurasi, dan manajemen metadata 52.840 game Steam'
    },
    genre: {
      title: 'Klasifikasi & Taksonomi 32 Genre Game',
      sub: 'Peta sebaran kategori, bobot vektor TF-IDF, dan standarisasi genre'
    },
    import: {
      title: 'Pipeline Ingesti Dataset Steam Kaggle',
      sub: 'Unggah batch CSV, pemetaan atribut kolom, dan sinkronisasi vektor'
    },
    pengguna: {
      title: 'Kontrol Akses & Manajemen Akun Pengguna',
      sub: 'Daftar pengguna terdaftar, verifikasi akun, dan pengaturan role SuperAdmin'
    },
    bantuan: {
      title: 'Terminal Bantuan & Dokumentasi Sistem ML',
      sub: 'Spesifikasi arsitektur Content-Based Filtering dan format dataset'
    },
    pengaturan: {
      title: 'Konfigurasi Mesin Rekomendasi & Algoritma',
      sub: 'Parameter Cosine Similarity, batasan TF-IDF, dan optimasi performa'
    }
  };

  if (titleEl && tabMeta[tabName]) titleEl.textContent = tabMeta[tabName].title;
  if (subEl && tabMeta[tabName]) subEl.textContent = tabMeta[tabName].sub;

  // Perbarui URL hash tanpa lompatan scroll yang kasar
  if (window.history && window.history.replaceState) {
    window.history.replaceState(null, null, '#' + tabName);
  } else {
    window.location.hash = '#' + tabName;
  }

  // Scroll ke atas secara halus
  window.scrollTo({ top: 0, behavior: 'smooth' });
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
  if (document.getElementById('admin-nav-list')) {
    const activeHash = window.location.hash.replace('#', '') || 'dashboard';
    switchAdminTab(activeHash);

    window.addEventListener('hashchange', function () {
      const newHash = window.location.hash.replace('#', '') || 'dashboard';
      switchAdminTab(newHash);
    });
  }
});
