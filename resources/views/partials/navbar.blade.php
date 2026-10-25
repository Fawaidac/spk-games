<!-- TOP APP BAR / NAVBAR -->
<header class="sticky top-0 z-40 bg-[#080b11]/90 backdrop-blur-md border-b border-[#1e293b] shadow-[0_4px_25px_rgba(0,0,0,0.8)]">
  <div class="flex justify-between items-center w-full px-6 py-3.5 max-w-7xl mx-auto">
    <!-- Brand Logo -->
    <a class="flex items-center gap-3 group" href="{{ route('landing') }}">
      <div class="w-10 h-10 rounded-lg bg-surface-container-high border border-primary/40 flex items-center justify-center text-primary group-hover:border-primary group-hover:scale-105 transition-all duration-200 shadow-[0_0_15px_rgba(0,240,255,0.3)]">
        <span class="material-symbols-outlined text-2xl text-primary" data-icon="sports_esports" style="font-variation-settings: 'FILL' 1">sports_esports</span>
      </div>
      <div class="flex flex-col">
        <div class="flex items-center gap-2">
          <span class="text-xl font-headline-sm font-extrabold text-white tracking-wider uppercase group-hover:text-primary transition-colors">Game<span class="text-primary">Match</span></span>
          <span class="px-1.5 py-0.2 text-[9px] font-label-sm font-bold bg-primary/20 text-primary border border-primary/40 rounded tracking-widest">v2.4</span>
        </div>
        <span class="text-[10px] uppercase tracking-widest text-[#94a3b8] font-code-metric flex items-center gap-1">
          <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
          AI RECSYS // KAGGLE CORE
        </span>
      </div>
    </a>

    <!-- Desktop Navigation Links -->
    <nav class="hidden md:flex items-center gap-8 font-label-md text-xs tracking-wider uppercase">
      <a class="text-primary border-b-2 border-primary pb-1 font-bold flex items-center gap-1.5 transition-colors duration-200 drop-shadow-[0_0_8px_rgba(0,240,255,0.6)]" href="{{ route('landing') }}#hero">
        <span class="text-primary font-mono text-[10px]"></span> Beranda
      </a>
      <a class="text-on-surface-variant hover:text-primary font-medium transition-colors duration-200 flex items-center gap-1.5" href="{{ route('landing') }}#cara-kerja">
        <span class="text-on-surface-variant/60 font-mono text-[10px]"></span>
        Cara Kerja
      </a>
      <a class="text-on-surface-variant hover:text-primary font-medium transition-colors duration-200 flex items-center gap-1.5" href="{{ route('landing') }}#rekomendasi">
        <span class="text-on-surface-variant/60 font-mono text-[10px]"></span>
        Rekomendasi
      </a>
      <a class="text-on-surface-variant hover:text-primary font-medium transition-colors duration-200 flex items-center gap-1.5" href="{{ route('landing') }}#tentang">
        <span class="text-on-surface-variant/60 font-mono text-[10px]"></span>
        Tentang
      </a>
    </nav>

    <!-- Trailing Action Cluster -->
    <div class="flex items-center gap-3">
      @auth
        {{-- ── Admin Only: Tombol Admin ML ── --}}
        @if(auth()->user()->isAdmin())
          <a class="hidden lg:inline-flex items-center gap-1.5 px-3 py-1.5 rounded border border-secondary/50 hover:border-secondary text-secondary hover:bg-secondary/10 text-[11px] font-label-md tracking-wider uppercase transition-all shadow-[0_0_10px_rgba(192,132,252,0.2)] hover:shadow-[0_0_15px_rgba(192,132,252,0.4)]"
             href="{{ route('dashboard.admin') }}"
             title="Buka Konsol Algoritma ML Admin">
            <span class="material-symbols-outlined text-sm">admin_panel_settings</span>
            <span>Admin ML</span>
          </a>
        @endif

        {{-- ── Profile Dropdown ── --}}
        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
          <button @click="open = !open"
                  class="flex items-center gap-2.5 pl-2 pr-3 py-1.5 rounded-lg border border-[#1e293b] hover:border-primary/50 bg-surface-container/60 hover:bg-primary/5 transition-all duration-200 group">
            {{-- Avatar --}}
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary/40 to-secondary/40 border border-primary/50 flex items-center justify-center text-white font-bold text-sm shadow-[0_0_10px_rgba(0,240,255,0.3)] group-hover:shadow-[0_0_15px_rgba(0,240,255,0.5)] transition-all">
              {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="hidden sm:flex flex-col items-start leading-tight">
              <span class="text-white text-xs font-bold tracking-wide max-w-[100px] truncate">{{ auth()->user()->name }}</span>
              <span class="text-[10px] font-code-metric uppercase tracking-wider {{ auth()->user()->isAdmin() ? 'text-secondary' : 'text-primary' }}">
                {{ auth()->user()->isAdmin() ? '⚡ Admin' : '🎮 Gamer' }}
              </span>
            </div>
            <span class="material-symbols-outlined text-on-surface-variant text-sm transition-transform duration-200" :class="open ? 'rotate-180' : ''">expand_more</span>
          </button>

          {{-- Dropdown Menu --}}
          <div x-show="open"
               x-transition:enter="transition ease-out duration-150"
               x-transition:enter-start="opacity-0 translate-y-1"
               x-transition:enter-end="opacity-100 translate-y-0"
               x-transition:leave="transition ease-in duration-100"
               x-transition:leave-start="opacity-100 translate-y-0"
               x-transition:leave-end="opacity-0 translate-y-1"
               class="absolute right-0 top-full mt-2 w-52 bg-[#0f1422] border border-[#1e293b] rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.8)] z-50 overflow-hidden"
               style="display: none;">
            {{-- User Info Header --}}
            <div class="px-4 py-3 border-b border-[#1e293b] bg-surface-container/30">
              <p class="text-white text-sm font-bold truncate">{{ auth()->user()->name }}</p>
              <p class="text-on-surface-variant text-xs truncate">{{ auth()->user()->email }}</p>
              <span class="inline-flex items-center gap-1 mt-1 px-2 py-0.5 rounded text-[10px] font-code-metric font-bold
                {{ auth()->user()->isAdmin() ? 'bg-secondary/20 text-secondary border border-secondary/40' : 'bg-primary/20 text-primary border border-primary/40' }}">
                {{ auth()->user()->isAdmin() ? 'SUPER ADMIN' : 'GAMER' }}
              </span>
            </div>

            {{-- Menu Items --}}
            <div class="py-2">
              <a href="{{ route('landing') }}#rekomendasi"
                 class="flex items-center gap-3 px-4 py-2.5 text-on-surface-variant hover:text-white hover:bg-primary/10 transition-colors text-sm">
                <span class="material-symbols-outlined text-base text-primary">recommend</span>
                Rekomendasi Saya
              </a>
              <button type="button"
                 @click="open = false; toggleModal('modal-history')"
                 class="w-full flex items-center gap-3 px-4 py-2.5 text-on-surface-variant hover:text-white hover:bg-tertiary/10 transition-colors text-sm text-left">
                <span class="material-symbols-outlined text-base text-tertiary">history</span>
                History Game
              </button>
              @if(auth()->user()->isAdmin())
                <div class="my-1 border-t border-[#1e293b]"></div>
                <a href="{{ route('dashboard.admin') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-on-surface-variant hover:text-white hover:bg-secondary/10 transition-colors text-sm">
                  <span class="material-symbols-outlined text-base text-secondary">admin_panel_settings</span>
                  Konsol Admin ML
                </a>
              @endif
              <div class="my-1 border-t border-[#1e293b]"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 text-error/80 hover:text-error hover:bg-error/10 transition-colors text-sm">
                  <span class="material-symbols-outlined text-base">logout</span>
                  Keluar
                </button>
              </form>
            </div>
          </div>
        </div>
      @else
        {{-- ── Guest: Tombol Masuk & Daftar ── --}}
        <button class="hidden sm:inline-flex items-center justify-center px-4 py-2 rounded border border-outline hover:border-primary text-on-surface hover:text-primary text-xs font-label-md tracking-wider uppercase bg-surface-container/60 hover:bg-primary/10 transition-all duration-150 active:scale-95" onclick="toggleModal('modal-login')">
          Masuk
        </button>
        <button class="inline-flex items-center gap-2 px-5 py-2 rounded btn-cyber-primary text-[#002022] font-headline-sm text-xs font-extrabold uppercase tracking-wider transition-all duration-200 active:scale-95" onclick="toggleModal('modal-register')">
          <span>Daftar</span>
          <span class="material-symbols-outlined text-base font-bold" data-icon="arrow_forward">arrow_forward</span>
        </button>
      @endauth
    </div>
  </div>
</header>
