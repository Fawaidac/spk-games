<!-- SIDEBAR: ESPORTS COCKPIT CONTROL PANEL -->
<aside class="fixed left-0 top-0 h-screen w-64 bg-surface-container-lowest/95 backdrop-blur-md border-r border-outline-variant shadow-2xl flex flex-col justify-between p-4 z-40 transition-all duration-200">
  <!-- Top Branding & Tactical Stats -->
  <div>
    <!-- HUD Header -->
    <a href="{{ route('landing') }}" title="Kembali ke Landing Page GameMatch" class="flex items-center gap-3 px-2 py-3 border-b border-outline-variant relative group hover:bg-surface-container/40 rounded-lg transition-colors cursor-pointer">
      <!-- <div class="relative w-11 h-11 rounded-lg bg-surface-container border border-primary/60 flex items-center justify-center text-primary glow-cyan-sm group-hover:border-primary transition-all">
        <span class="material-symbols-outlined text-primary text-[24px]" data-icon="sports_esports">sports_esports</span>
        <div class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-primary animate-ping"></div>
        <div class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-primary"></div>
      </div> -->
      <div class="flex flex-col">
        <div class="flex items-center gap-1.5">
          <span class="font-headline font-bold text-lg text-white tracking-wider uppercase group-hover:text-primary transition-colors">GameMatch</span>
          <span class="px-1.5 py-0.2 rounded text-[10px] font-mono font-bold bg-primary/10 border border-primary/40 text-primary">v1.0</span>
        </div>
        <div class="flex items-center gap-1 text-[11px] font-mono text-on-surface-variant uppercase tracking-widest">
          <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
          <span>Tactical Admin</span>
        </div>
      </div>
    </a>
    <!-- Rapid Re-calibration / Sync CTA -->
    <div class="mt-4 px-1">
      <button class="relative w-full overflow-hidden flex items-center justify-center gap-2 px-3 py-2.5 rounded-lg bg-gradient-to-r from-cyan-500 via-primary to-purple-600 text-black font-headline font-bold text-xs tracking-wider uppercase shadow-lg shadow-primary/25 hover:shadow-cyan-400/40 hover:brightness-110 active:scale-[0.98] transition-all">
        <span class="material-symbols-outlined text-[18px] animate-spin text-black" data-icon="sync" style="animation-duration: 3s">sync</span>
        <span>Sinkronisasi AI</span>
      </button>
    </div>
    <!-- Cockpit Navigation Tabs -->
    <nav aria-label="Navigasi Utama Admin" class="mt-6 space-y-1.5 font-headline" id="admin-nav-list">
      <div class="px-2 pb-1 text-[10px] font-mono font-bold uppercase tracking-widest text-outline">
        Konsol Modul
      </div>
      <!-- Dashboard -->
      <a class="admin-nav-item relative flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-primary/15 via-surface-container to-transparent text-primary font-bold border-l-4 border-primary shadow-sm glow-cyan-sm' : 'text-on-surface-variant font-medium hover:bg-surface-container hover:text-primary hover:border-l-2 hover:border-primary/50 group' }}"
         href="{{ route('admin.dashboard') }}">
        <span class="material-symbols-outlined text-primary" data-icon="dashboard">dashboard</span>
        <span class="text-sm tracking-wide">Dashboard</span>
      </a>
      <!-- Data Game -->
      <a class="admin-nav-item relative flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition-all {{ request()->routeIs('admin.games') ? 'bg-gradient-to-r from-primary/15 via-surface-container to-transparent text-primary font-bold border-l-4 border-primary shadow-sm glow-cyan-sm' : 'text-on-surface-variant font-medium hover:bg-surface-container hover:text-primary hover:border-l-2 hover:border-primary/50 group' }}"
         href="{{ route('admin.games') }}">
        <span class="material-symbols-outlined group-hover:text-primary transition-colors" data-icon="stadia_controller">stadia_controller</span>
        <span class="text-sm tracking-wide">Data Game</span>
      </a>
      <!-- Genre -->
      <a class="admin-nav-item relative flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition-all {{ request()->routeIs('admin.genres') ? 'bg-gradient-to-r from-secondary/15 via-surface-container to-transparent text-secondary font-bold border-l-4 border-secondary shadow-sm transition-all' : 'text-on-surface-variant font-medium hover:bg-surface-container hover:text-secondary hover:border-l-2 hover:border-secondary/50 group' }}"
         href="{{ route('admin.genres') }}">
        <span class="material-symbols-outlined group-hover:text-secondary transition-colors" data-icon="category">category</span>
        <span class="text-sm tracking-wide">Genre</span>
      </a>
      <!-- History Rekomendasi -->
      <a class="admin-nav-item relative flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition-all {{ request()->routeIs('admin.history') ? 'bg-gradient-to-r from-tertiary/15 via-surface-container to-transparent text-tertiary font-bold border-l-4 border-tertiary shadow-sm transition-all' : 'text-on-surface-variant font-medium hover:bg-surface-container hover:text-tertiary hover:border-l-2 hover:border-tertiary/50 group' }}"
         href="{{ route('admin.history') }}">
        <span class="material-symbols-outlined group-hover:text-tertiary transition-colors" data-icon="history">history</span>
        <span class="text-sm tracking-wide">History</span>
      </a>
      <!-- Pengguna -->
      <a class="admin-nav-item relative flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition-all {{ request()->routeIs('admin.users') ? 'bg-gradient-to-r from-primary/15 via-surface-container to-transparent text-white font-bold border-l-4 border-white shadow-sm transition-all' : 'text-on-surface-variant font-medium hover:bg-surface-container hover:text-white hover:border-l-2 hover:border-white/50 group' }}"
         href="{{ route('admin.users') }}">
        <span class="material-symbols-outlined group-hover:text-white transition-colors" data-icon="group">group</span>
        <span class="text-sm tracking-wide">Pengguna</span>
      </a>
      <!-- Import Dataset (Dinonaktifkan / Arsip) -->
      <!-- <a class="admin-nav-item relative flex items-center gap-3 px-3.5 py-2 rounded-lg transition-all text-on-surface-variant/50 hover:text-on-surface-variant hover:bg-surface-container/40 group text-xs opacity-75 {{ request()->routeIs('admin.imports') ? 'bg-surface-container text-white' : '' }}"
         href="{{ route('admin.imports') }}"
         title="Modul Import Dataset dinonaktifkan sementara">
        <span class="material-symbols-outlined text-[18px] group-hover:text-on-surface-variant transition-colors" data-icon="upload_file">upload_file</span>
        <span class="tracking-wide">Import Dataset</span>
        <span class="ml-auto text-[8px] font-mono px-1 py-0.2 rounded bg-surface-container border border-outline-variant text-on-surface-variant/70">NONAKTIF</span>
      </a> -->
    </nav>
  </div>
  <!-- Footer Actions / Diagnostics -->
  <div class="border-t border-outline-variant pt-3 space-y-1 font-headline">
    <div class="px-2 pb-1 text-[10px] font-mono uppercase tracking-widest text-outline">
      Terminal Link
    </div>
    <!-- Navigasi ke Landing Page -->
    <a class="admin-nav-item flex items-center gap-3 px-3.5 py-2 rounded-lg transition-all text-xs text-primary/90 hover:bg-primary/10 hover:text-primary border border-primary/25 hover:border-primary/50 group"
       href="{{ route('landing') }}"
       title="Kembali ke Landing Page Publik">
      <!-- <span class="material-symbols-outlined text-[18px] text-primary group-hover:-translate-x-0.5 transition-transform" data-icon="arrow_back">arrow_back</span> -->
      <span class="font-bold">Landing Page</span>
      <span class="ml-auto text-[9px] font-mono px-1.5 py-0.2 rounded bg-primary/20 text-primary border border-primary/30">BERANDA</span>
    </a>
    <a class="admin-nav-item flex items-center gap-3 px-3.5 py-2 rounded-lg transition-all text-xs {{ request()->routeIs('admin.help') ? 'bg-gradient-to-r from-primary/15 via-surface-container to-transparent text-primary font-bold border-l-4 border-primary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container hover:text-white' }}"
       href="{{ route('admin.help') }}">
      <span class="material-symbols-outlined text-[18px]" data-icon="terminal">terminal</span>
      <span>Bantuan</span>
    </a>
    <a class="admin-nav-item flex items-center gap-3 px-3.5 py-2 rounded-lg transition-all text-xs {{ request()->routeIs('admin.settings') ? 'bg-gradient-to-r from-secondary/15 via-surface-container to-transparent text-secondary font-bold border-l-4 border-secondary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container hover:text-white' }}"
       href="{{ route('admin.settings') }}">
      <span class="material-symbols-outlined text-[18px]" data-icon="settings">settings</span>
      <span>Pengaturan</span>
    </a>
    <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" class="inline">
      @csrf
      <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2 rounded-lg text-error hover:bg-error-container/40 transition-all text-xs font-bold cursor-pointer text-left">
        <span class="material-symbols-outlined text-[18px]" data-icon="power_settings_new">power_settings_new</span>
        <span>Keluar</span>
      </button>
    </form>
  </div>
</aside>
