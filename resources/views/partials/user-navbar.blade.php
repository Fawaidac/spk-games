<!-- TOP NAVIGATION BAR (Esports HUD Style) -->
<header class="sticky top-0 z-40 bg-surface-dim/95 backdrop-blur-xl border-b border-primary/30 shadow-[0_4px_25px_rgba(0,240,255,0.12)]">
  <div class="flex justify-between items-center w-full px-6 py-3 max-w-7xl mx-auto">
    <!-- Brand & Left Navigation Links -->
    <div class="flex items-center gap-8">
      <a class="flex items-center gap-2.5 group transition-all duration-200" href="{{ route('landing') }}" title="Kembali ke Beranda Utama GameMatch">
        <div class="w-10 h-10 rounded-lg bg-surface-container-high border border-primary/50 flex items-center justify-center text-primary group-hover:border-primary group-hover:glow-cyan transition-all">
          <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform duration-200" data-weight="fill">sports_esports</span>
        </div>
        <div class="flex flex-col">
          <span class="text-xl font-orbitron font-black tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-primary via-white to-secondary uppercase">GameMatch</span>
          <span class="text-[9px] font-label-sm text-primary tracking-widest leading-none -mt-0.5">CYBER ALGORITHM HUD</span>
        </div>
      </a>
      <!-- Desktop Navigation: Semantic Authenticated Links -->
      <nav class="hidden md:flex items-center gap-6 font-orbitron text-xs tracking-wider">
        <a class="text-primary border-b-2 border-primary font-bold pb-1 flex items-center gap-2 drop-shadow-[0_0_8px_rgba(0,240,255,0.6)]" href="{{ route('dashboard.user') }}">
          <span class="material-symbols-outlined text-sm" data-weight="fill">dashboard</span>
          <span>DASHBOARD</span>
        </a>
        <a class="text-on-surface-variant font-medium hover:text-primary hover:drop-shadow-[0_0_6px_rgba(0,240,255,0.4)] transition-all flex items-center gap-1.5" href="#preferensi-section">
          <span class="material-symbols-outlined text-sm">tune</span>
          <span>PREFERENSI</span>
        </a>
        <a class="text-on-surface-variant font-medium hover:text-neon-pink hover:drop-shadow-[0_0_6px_rgba(255,0,127,0.4)] transition-all flex items-center gap-1.5" href="#rekomendasi-section">
          <span class="material-symbols-outlined text-sm">auto_awesome</span>
          <span>REKOMENDASI</span>
        </a>
        <!-- Link ke Konsol ML Admin -->
        <a class="text-secondary/90 font-medium hover:text-secondary hover:drop-shadow-[0_0_6px_rgba(181,55,242,0.4)] transition-all flex items-center gap-1.5" href="{{ route('dashboard.admin') }}" onclick="if(window.GameMatchFlow) GameMatchFlow.ensureAdminSession(event)" title="Buka Konsol Algoritma ML Admin">
          <span class="material-symbols-outlined text-sm">admin_panel_settings</span>
          <span>ADMIN ML</span>
        </a>
        <!-- Link ke Landing Page -->
        <a class="text-on-surface-variant font-medium hover:text-primary hover:drop-shadow-[0_0_6px_rgba(0,240,255,0.4)] transition-all flex items-center gap-1.5" href="{{ route('landing') }}" title="Kembali ke Halaman Beranda Publik">
          <span class="material-symbols-outlined text-sm">home</span>
          <span>BERANDA</span>
        </a>
      </nav>
    </div>
    <!-- Right Header Actions (Notifikasi & User Profile Dropdown) -->
    <div class="flex items-center gap-4">
      <!-- Notification Icon with Badge -->
      <button aria-label="Notifikasi" class="relative p-2.5 rounded-lg bg-surface-container border border-outline-variant hover:border-primary/60 text-on-surface transition-all duration-200 hover:glow-cyan active:scale-95">
        <span class="material-symbols-outlined text-xl text-primary">notifications</span>
        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-neon-pink rounded-full ring-2 ring-surface-container animate-pulse shadow-[0_0_8px_#ff007f]"></span>
      </button>
      <!-- User Profile Dropdown Component -->
      <div class="relative group">
        <button class="flex items-center gap-3 pl-2 pr-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high border border-primary/40 hover:border-primary transition-all duration-200 active:scale-95 focus:outline-none hover:glow-cyan">
          <div class="relative">
            <img alt="Avatar profil pengguna gamer" class="w-8 h-8 rounded object-cover ring-2 ring-primary ring-offset-1 ring-offset-surface-dim" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8exb7uIagpRF82W7B7AEbAfRQUdBlnsaQsDNzJV-ikn9obewutkUriQfMBsTexEqYOlBHPVuPWBMx_CayZP7BaATMeQ3LfMZ2_L6q5dev84WpLi9xwY3o_E-6gUCCQvjZiFN30Bj2PBU4XXtS7rqJbeYkfWrHuWXsHU-LK-fwWvVaRPOJKuF-XOB5r5VNxKUOoWu-wpZEmo8V8Knu-vAj595GqW-RgMi5Hn2Uhbm2bGRkl2E6qSAz" />
            <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-tertiary rounded-full border border-black"></span>
          </div>
          <div class="text-left hidden sm:block">
            <div class="flex items-center gap-1.5">
              <span class="text-xs font-orbitron font-bold text-on-surface tracking-wide leading-none">Raka Pratama</span>
              <span class="px-1.5 py-0.5 rounded text-[9px] font-label-sm font-bold bg-secondary/30 text-secondary border border-secondary/60 uppercase tracking-wider leading-none shadow-[0_0_6px_rgba(181,55,242,0.4)]">GAMER PRO</span>
            </div>
            <span class="text-label-sm text-primary/80 text-[10px] leading-tight font-mono">raka.p@gamematch.id</span>
          </div>
          <span class="material-symbols-outlined text-primary text-base">expand_more</span>
        </button>
        <!-- Dropdown Menu items -->
        <div class="absolute right-0 mt-2 w-56 py-2 bg-surface-container-high/95 backdrop-blur-xl border border-primary/40 rounded-lg shadow-[0_10px_35px_rgba(0,0,0,0.8)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
          <div class="px-4 py-2 border-b border-outline-variant/60">
            <p class="text-xs font-orbitron font-bold text-on-surface">Raka Pratama</p>
            <p class="text-[11px] font-label-sm text-primary flex items-center gap-1 mt-0.5">
              <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
              Kalkulasi Cosine Aktif
            </p>
          </div>
          <a class="flex items-center gap-2.5 px-4 py-2 font-label-sm text-xs text-secondary hover:bg-secondary/15 transition-colors" href="{{ route('dashboard.admin') }}" onclick="if(window.GameMatchFlow) GameMatchFlow.ensureAdminSession(event)">
            <span class="material-symbols-outlined text-base">admin_panel_settings</span>
            <span>Konsol ML Admin</span>
          </a>
          <a class="flex items-center gap-2.5 px-4 py-2 font-label-sm text-xs text-on-surface hover:bg-primary/15 hover:text-primary transition-colors" href="{{ route('landing') }}">
            <span class="material-symbols-outlined text-base">home</span>
            <span>Kembali ke Beranda</span>
          </a>
          <div class="my-1 border-t border-outline-variant/60"></div>
          <a class="flex items-center gap-2.5 px-4 py-2 font-label-sm text-xs text-error hover:bg-error/20 transition-colors cursor-pointer" href="{{ route('landing') }}" onclick="if(window.GameMatchFlow) GameMatchFlow.logout(event)">
            <span class="material-symbols-outlined text-base">logout</span>
            <span>Keluar (Logout)</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</header>
