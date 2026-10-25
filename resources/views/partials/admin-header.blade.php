<!-- TOP COMMAND BAR -->
<header class="sticky top-0 z-30 bg-surface-container-lowest/90 backdrop-blur-xl border-b border-outline-variant px-8 py-3.5 flex items-center justify-between shadow-2xl">
  <div>
    <div class="flex items-center gap-2">
      <span class="w-2 h-2 rounded bg-primary"></span>
      <h1 id="admin-header-title" class="font-headline font-bold text-xl text-white tracking-wide uppercase flex items-center gap-2">
        Konsol Administrasi &amp; Mesin Rekomendasi ML
      </h1>
    </div>
    <p id="admin-header-subtitle" class="font-mono text-xs text-on-surface-variant mt-0.5 tracking-tight">
      Manajemen pipeline dataset Steam Kaggle &amp; matriks Cosine Similarity
    </p>
  </div>
  <div class="flex items-center gap-5">
    <!-- Neon Pulse Engine Status (Tactical Armed & Ready) -->
    <div class="flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-surface-container-low border border-tertiary/40 glow-green">
      <span class="relative flex h-2.5 w-2.5">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-tertiary opacity-80"></span>
        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-tertiary"></span>
      </span>
      <span class="font-mono text-xs font-bold text-tertiary tracking-wider uppercase">
        ML COSINE ENGINE: ARMED &amp; READY
      </span>
    </div>
    <!-- Link Langsung ke Portal Gamer & Beranda -->
    <!-- <a href="{{ route('dashboard.user') }}" onclick="if(window.GameMatchFlow) GameMatchFlow.ensureUserSession(event)" class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-lg bg-surface-container-low border border-primary/40 hover:border-primary text-primary hover:bg-primary/10 transition-all text-xs font-mono font-bold uppercase tracking-wider shadow-sm hover:glow-cyan-sm" title="Buka Tampilan Portal Pengguna / Gamer">
      <span class="material-symbols-outlined text-[16px]">sports_esports</span>
      <span>Portal Gamer</span>
    </a> -->
    <!-- <a href="{{ route('landing') }}" class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low border border-outline-variant hover:border-white/30 text-on-surface-variant hover:text-white transition-all text-xs font-mono tracking-wider uppercase" title="Ke Beranda Publik">
      <span class="material-symbols-outlined text-[16px]">home</span>
      <span>Beranda</span>
    </a> -->
    <!-- Live Broadcast / Alert Beacon -->
    <button class="relative p-2 rounded-lg text-on-surface-variant hover:text-primary bg-surface-container-low border border-outline-variant hover:border-primary/50 transition-all">
      <span class="material-symbols-outlined text-[20px]" data-icon="notifications">notifications</span>
      <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-secondary ring-2 ring-background"></span>
    </button>
    <div class="h-6 w-px bg-outline-variant"></div>
    <!-- Commander Profile -->
    <div class="flex items-center gap-3">
      <div class="relative w-9 h-9 rounded-lg bg-gradient-to-tr from-purple-900 to-cyan-500 border border-primary/60 flex items-center justify-center font-headline font-bold text-black text-xs shadow-md glow-cyan-sm uppercase">
        {{ strtoupper(substr(auth()->user()->name ?? 'SA', 0, 2)) }}
        <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 rounded-full bg-tertiary border-2 border-background"></span>
      </div>
      <div class="flex flex-col text-left">
        <span class="font-headline font-bold text-xs text-white tracking-wide">{{ auth()->user()->name ?? 'SuperAdmin' }}</span>
        <span class="font-mono text-[10px] text-primary tracking-wider uppercase font-semibold">{{ auth()->user()->role ?? 'Admin ML' }}</span>
      </div>
    </div>
  </div>
</header>
