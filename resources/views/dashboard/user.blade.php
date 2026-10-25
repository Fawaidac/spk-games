@extends('layouts.user')

@section('title', 'GameMatch - User Area & Cold-Start Preferensi')

@section('user-content')
      <!-- 1. HEADER SALAM & STATUS TELEMETRI VEKTOR (HUD Hero Banner) -->
      <section
        class="relative overflow-hidden rounded-xl bg-surface-container/80 border border-primary/40 p-6 sm:p-8 hud-card glow-cyan-lg"
      >
        <!-- Tactical HUD corner accents -->
        <div
          class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-primary/20 via-transparent to-transparent pointer-events-none"
        ></div>
        <div
          class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-secondary/20 via-transparent to-transparent pointer-events-none"
        ></div>
        <div
          class="absolute top-2 right-4 text-[9px] font-label-sm text-primary/60 tracking-widest hidden md:block"
        >
          SYS_STATUS // SEC_LEVEL_01
        </div>
        <div
          class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6"
        >
          <div>
            <div class="flex flex-wrap items-center gap-2 mb-2">
              <span
                class="px-2.5 py-1 rounded text-label-sm font-bold bg-primary/15 text-primary border border-primary/60 flex items-center gap-1.5 shadow-[0_0_10px_rgba(0,240,255,0.25)]"
              >
                <span
                  class="w-2 h-2 rounded-full bg-primary animate-pulse"
                ></span>
                Mesin Rekomendasi Terkalibrasi
              </span>
              <span class="text-outline text-xs">•</span>
              <span
                class="text-label-sm text-on-surface-variant font-mono text-[11px] bg-surface-container-high px-2 py-0.5 rounded border border-outline-variant"
                >Dataset Kaggle v2.4 (Steam Games)</span
              >
            </div>
            <h1
              class="text-2xl sm:text-4xl font-orbitron font-black text-on-surface tracking-tight uppercase"
            >
              Halo,
              <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-white to-secondary"
                >Raka Pratama!</span
              >
              👋
            </h1>
            <p
              class="text-body-md text-on-surface-variant max-w-2xl mt-2 font-medium"
            >
              Berikut rekomendasi game PC yang disesuaikan dengan preferensi
              vektor akun Anda.
            </p>
          </div>
          <!-- Tombol Aksi Cepat Refresh Vektor -->
          <div class="flex items-center gap-3">
            <button
              class="px-5 py-3 rounded-lg border-2 border-primary bg-primary/10 hover:bg-primary text-primary hover:text-black font-orbitron text-xs font-bold tracking-wider flex items-center gap-2.5 transition-all duration-200 active:scale-95 shadow-[0_0_15px_rgba(0,240,255,0.35)] hover:glow-cyan"
            >
              <span class="material-symbols-outlined text-lg animate-spin-hover"
                >refresh</span
              >
              <span>Hitung Ulang Vektor</span>
            </button>
          </div>
        </div>
      </section>
      <!-- 2. TIGA KARTU KPI RINGKASAN (Bootstrap Grid / Responsive 3 Columns with Esports HUD styling) -->
      <section class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <!-- KPI 1: Game Favorit -->
        <div
          class="rounded-xl bg-surface-container/90 p-5 border border-primary/30 hover:border-primary transition-all duration-200 shadow-lg hover:glow-cyan group relative overflow-hidden"
        >
          <div
            class="absolute top-0 right-0 w-12 h-12 bg-primary/10 rounded-bl-full pointer-events-none"
          ></div>
          <div class="flex items-center justify-between mb-3">
            <span
              class="text-label-sm text-primary font-bold uppercase tracking-widest flex items-center gap-1.5"
            >
              <span class="w-1.5 h-1.5 bg-primary"></span> Game Favorit
            </span>
            <div
              class="w-9 h-9 rounded-lg bg-primary/15 border border-primary/40 flex items-center justify-center text-primary group-hover:scale-110 transition-transform"
            >
              <span class="material-symbols-outlined text-lg" data-weight="fill"
                >favorite</span
              >
            </div>
          </div>
          <div class="flex items-baseline gap-2">
            <span
              class="text-3xl sm:text-4xl font-orbitron font-black text-on-surface"
              >14</span
            >
            <span class="text-body-sm text-on-surface-variant font-medium"
              >Game tersimpan</span
            >
          </div>
          <div
            class="mt-4 pt-3 border-t border-outline-variant flex items-center justify-between text-label-sm"
          >
            <span class="text-tertiary flex items-center gap-1 font-bold">
              <span class="material-symbols-outlined text-xs"
                >arrow_upward</span
              >
              +3 minggu ini
            </span>
            <span class="text-outline font-mono text-[11px]"
              >Basis fitur bobot</span
            >
          </div>
          <div
            class="w-full bg-surface-container-high h-1 mt-3 rounded-full overflow-hidden"
          >
            <div
              class="bg-gradient-to-r from-primary to-secondary h-full w-[70%]"
            ></div>
          </div>
        </div>
        <!-- KPI 2: Genre Dipilih -->
        <div
          class="rounded-xl bg-surface-container/90 p-5 border border-secondary/30 hover:border-secondary transition-all duration-200 shadow-lg hover:glow-purple group relative overflow-hidden"
        >
          <div
            class="absolute top-0 right-0 w-12 h-12 bg-secondary/10 rounded-bl-full pointer-events-none"
          ></div>
          <div class="flex items-center justify-between mb-3">
            <span
              class="text-label-sm text-secondary font-bold uppercase tracking-widest flex items-center gap-1.5"
            >
              <span class="w-1.5 h-1.5 bg-secondary"></span> Genre Dipilih
            </span>
            <div
              class="w-9 h-9 rounded-lg bg-secondary/15 border border-secondary/40 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform"
            >
              <span class="material-symbols-outlined text-lg">category</span>
            </div>
          </div>
          <div class="flex items-baseline gap-2">
            <span
              class="text-3xl sm:text-4xl font-orbitron font-black text-on-surface"
              >6</span
            >
            <span class="text-body-sm text-on-surface-variant font-medium"
              >Genre aktif</span
            >
          </div>
          <p
            class="mt-4 pt-3 border-t border-outline-variant text-body-sm text-on-surface-variant truncate font-mono text-[12px]"
          >
            RPG, Action, Cyberpunk, Open World, Souls-like, Strategy
          </p>
          <div
            class="w-full bg-surface-container-high h-1 mt-3 rounded-full overflow-hidden"
          >
            <div class="bg-secondary h-full w-[60%]"></div>
          </div>
        </div>
        <!-- KPI 3: Rekomendasi Tersedia -->
        <div
          class="rounded-xl bg-surface-container/90 p-5 border border-tertiary/30 hover:border-tertiary transition-all duration-200 shadow-lg hover:shadow-[0_0_20px_rgba(0,255,136,0.35)] group relative overflow-hidden"
        >
          <div
            class="absolute top-0 right-0 w-12 h-12 bg-tertiary/10 rounded-bl-full pointer-events-none"
          ></div>
          <div class="flex items-center justify-between mb-3">
            <span
              class="text-label-sm text-tertiary font-bold uppercase tracking-widest flex items-center gap-1.5"
            >
              <span class="w-1.5 h-1.5 bg-tertiary"></span> Rekomendasi Tersedia
            </span>
            <div
              class="w-9 h-9 rounded-lg bg-tertiary/15 border border-tertiary/40 flex items-center justify-center text-tertiary group-hover:scale-110 transition-transform"
            >
              <span class="material-symbols-outlined text-lg">insights</span>
            </div>
          </div>
          <div class="flex items-baseline gap-2">
            <span
              class="text-3xl sm:text-4xl font-orbitron font-black text-on-surface"
              >48</span
            >
            <span class="text-body-sm text-on-surface-variant font-medium"
              >Judul terhitung</span
            >
          </div>
          <div
            class="mt-4 pt-3 border-t border-outline-variant flex items-center justify-between text-label-sm"
          >
            <span class="text-tertiary flex items-center gap-1 font-bold">
              <span class="material-symbols-outlined text-xs"
                >check_circle</span
              >
              Cosine Similarity &gt; 80%
            </span>
            <span class="text-outline font-mono text-[11px]"
              >Katalog Steam</span
            >
          </div>
          <div
            class="w-full bg-surface-container-high h-1 mt-3 rounded-full overflow-hidden"
          >
            <div class="bg-tertiary h-full w-[85%]"></div>
          </div>
        </div>
      </section>
      <!-- 3. COLD-START & SETUP PREFERENSI (Interactive Bento Configuration Widget) -->
      <section
        class="rounded-xl bg-surface-container/90 border border-primary/40 p-6 sm:p-7 space-y-6 hud-card shadow-xl"
        id="preferensi-section"
      >
        <!-- Baris Judul & Filter Dropdown Platform -->
        <div
          class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-outline-variant"
        >
          <div>
            <h2
              class="text-xl font-orbitron font-bold text-on-surface flex items-center gap-2.5"
            >
              <span
                class="w-7 h-7 rounded bg-primary/20 border border-primary/50 flex items-center justify-center text-primary"
              >
                <span class="material-symbols-outlined text-base">tune</span>
              </span>
              Atur Preferensi Genre &amp; Platform
            </h2>
            <p class="text-body-sm text-on-surface-variant mt-1">
              Pilih genre yang disukai dan pilih game referensi untuk membentuk
              vektor cold-start akun.
            </p>
          </div>
          <div class="flex items-center gap-3">
            <label
              class="text-label-md font-bold text-primary whitespace-nowrap uppercase tracking-wider"
              >PLATFORM HUD:</label
            >
            <div class="relative">
              <select
                class="appearance-none bg-surface-container-high border-2 border-primary/40 hover:border-primary rounded-lg pl-3 pr-9 py-2 text-primary font-mono text-xs font-bold focus:border-primary focus:ring-1 focus:ring-primary outline-none cursor-pointer transition-colors"
              >
                <option value="steam">PC / Steam [STATION 01]</option>
                <option value="epic">PC / Epic Games Store</option>
                <option value="gog">PC / GOG Galaxy</option>
              </select>
              <span
                class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 text-primary pointer-events-none text-base"
                >arrow_drop_down</span
              >
            </div>
          </div>
        </div>
        <!-- Chips Genre Pilihan: Aktif vs Tidak Aktif -->
        <div class="space-y-3">
          <div class="flex items-center justify-between">
            <label
              class="text-label-sm uppercase tracking-wider text-primary font-bold flex items-center gap-1.5"
            >
              <span class="material-symbols-outlined text-xs text-primary"
                >adjust</span
              >
              Genre Pilihan Anda (Klik untuk mengubah status):
            </label>
            <span class="text-[10px] font-mono text-outline"
              >[MULTIPLE_SELECTION_ACTIVE]</span
            >
          </div>
          <div class="flex flex-wrap gap-2.5" id="genre-chips-container">
            <!-- Aktif: Action -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-bold bg-primary/20 border-2 border-primary text-primary glow-cyan flex items-center gap-1.5 transition-all duration-150 uppercase tracking-wider"
            >
              <span
                class="material-symbols-outlined text-xs text-primary"
                data-weight="fill"
                >check</span
              >
              <span>Action</span>
            </button>
            <!-- Tidak Aktif: Adventure -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-medium bg-surface-container-high border border-outline-variant text-on-surface-variant hover:text-primary hover:border-primary/50 transition-all duration-150 uppercase tracking-wider"
            >
              <span>Adventure</span>
            </button>
            <!-- Aktif: RPG -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-bold bg-secondary/20 border-2 border-secondary text-secondary glow-purple flex items-center gap-1.5 transition-all duration-150 uppercase tracking-wider"
            >
              <span
                class="material-symbols-outlined text-xs text-secondary"
                data-weight="fill"
                >check</span
              >
              <span>RPG</span>
            </button>
            <!-- Tidak Aktif: Shooter -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-medium bg-surface-container-high border border-outline-variant text-on-surface-variant hover:text-primary hover:border-primary/50 transition-all duration-150 uppercase tracking-wider"
            >
              <span>Shooter</span>
            </button>
            <!-- Aktif: Strategy -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-bold bg-primary/20 border-2 border-primary text-primary glow-cyan flex items-center gap-1.5 transition-all duration-150 uppercase tracking-wider"
            >
              <span
                class="material-symbols-outlined text-xs text-primary"
                data-weight="fill"
                >check</span
              >
              <span>Strategy</span>
            </button>
            <!-- Tidak Aktif: Simulation -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-medium bg-surface-container-high border border-outline-variant text-on-surface-variant hover:text-primary hover:border-primary/50 transition-all duration-150 uppercase tracking-wider"
            >
              <span>Simulation</span>
            </button>
            <!-- Tidak Aktif: Sports -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-medium bg-surface-container-high border border-outline-variant text-on-surface-variant hover:text-primary hover:border-primary/50 transition-all duration-150 uppercase tracking-wider"
            >
              <span>Sports</span>
            </button>
            <!-- Tidak Aktif: Racing -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-medium bg-surface-container-high border border-outline-variant text-on-surface-variant hover:text-primary hover:border-primary/50 transition-all duration-150 uppercase tracking-wider"
            >
              <span>Racing</span>
            </button>
            <!-- Tidak Aktif: Puzzle -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-medium bg-surface-container-high border border-outline-variant text-on-surface-variant hover:text-primary hover:border-primary/50 transition-all duration-150 uppercase tracking-wider"
            >
              <span>Puzzle</span>
            </button>
            <!-- Tidak Aktif: Fighting -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-medium bg-surface-container-high border border-outline-variant text-on-surface-variant hover:text-primary hover:border-primary/50 transition-all duration-150 uppercase tracking-wider"
            >
              <span>Fighting</span>
            </button>
            <!-- Aktif: Souls-like -->
            <button
              class="px-4 py-1.5 rounded text-label-sm font-bold bg-primary/20 border-2 border-primary text-primary glow-cyan flex items-center gap-1.5 transition-all duration-150 uppercase tracking-wider"
            >
              <span
                class="material-symbols-outlined text-xs text-primary"
                data-weight="fill"
                >check</span
              >
              <span>Souls-like</span>
            </button>
          </div>
        </div>
        <!-- Search Bar Game Favorit Basis Kalkulasi -->
        <div class="space-y-2">
          <label
            class="text-label-sm uppercase tracking-wider text-primary font-bold flex items-center gap-1.5"
          >
            <span class="material-symbols-outlined text-xs text-primary"
              >search</span
            >
            Tambah Basis Game Referensi:
          </label>
          <div class="relative group">
            <span
              class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-primary text-lg"
              >search</span
            >
            <input
              class="w-full pl-11 pr-4 py-3 rounded-lg bg-surface-container-high border-2 border-primary/30 text-on-surface placeholder-on-surface-variant/60 font-body-md focus:border-primary focus:glow-cyan focus:outline-none transition-all duration-200"
              placeholder="Cari game favoritmu untuk basis kalkulasi vektor..."
              type="text"
            />
            <span
              class="absolute right-3.5 top-1/2 -translate-y-1/2 text-[10px] font-mono text-primary/60 border border-primary/30 px-1.5 py-0.5 rounded hidden sm:block"
              >CTRL+K</span
            >
          </div>
        </div>
      </section>
      <!-- 4. SECTION 'REKOMENDASI UNTUKMU' (Grid 8 Game Cards) -->
      <section class="space-y-6" id="rekomendasi-section">
        <div
          class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-primary/20"
        >
          <div>
            <h2
              class="text-xl sm:text-2xl font-orbitron font-extrabold text-on-surface flex items-center gap-2.5"
            >
              <span
                class="w-8 h-8 rounded bg-secondary/20 border border-secondary/60 flex items-center justify-center text-secondary shadow-[0_0_10px_rgba(181,55,242,0.5)]"
              >
                <span
                  class="material-symbols-outlined text-xl"
                  data-weight="fill"
                  >auto_awesome</span
                >
              </span>
              Rekomendasi Untukmu
            </h2>
            <p class="text-body-sm text-on-surface-variant mt-1">
              Hasil Content-Based Filtering &amp; Cosine Similarity dari library
              Steam Anda.
            </p>
          </div>
          <div
            class="flex items-center gap-2 text-label-sm font-mono text-outline"
          >
            <span>DIURUTKAN BERDASARKAN:</span>
            <span
              class="text-primary font-bold flex items-center gap-1 bg-primary/10 border border-primary/30 px-2.5 py-1 rounded"
            >
              <span class="material-symbols-outlined text-xs">tune</span>
              Skor Kemiripan Tertinggi
            </span>
          </div>
        </div>
        <!-- Responsive Grid: 4 columns on large desktop, 2 on tablet, 1 on mobile -->
        <div
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"
        >
          <!-- CARD 1: Elden Ring (96% Cocok) -->
          <div
            class="rounded-xl bg-surface-container border-2 border-primary/40 hover:border-primary transition-all duration-300 flex flex-col overflow-hidden group shadow-lg hover:glow-cyan hover:-translate-y-1.5 relative"
          >
            <div class="relative h-48 overflow-hidden scanlines">
              <img
                alt="Sampul Elden Ring"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                data-alt="Dark fantasy landscape artwork of Elden Ring showcasing a tarnished warrior standing in front of the massive glowing golden Erdtree against a moody dusk sky in high quality video game render style."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOnLaBUJanpII9wbcWasXlESOwboVv6hWa-BE-FPKqdbzLLLktqifw3ZFMx_lcG5PEZhzeILH2bdhFe__6MEwbfjy20co7xVJ2Bgevyy2N8IFBlpEtzCZSS0EZtQEcZBTaMxxNh-k1tbiuNx94c_cKjlXqERR0cYsfXnGOlS1Txiwt-BwIh8V7xeL_YhNKC_q64WAUzEvWYSmtQgvuCiKYRwUkaSpnD52k5Wm6ev3_VDZFfmHidt7P"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-surface-container via-transparent to-transparent"
              ></div>
              <!-- Platform & Similarity Pill Badges with Cybernetic Glow -->
              <div class="absolute top-3 left-3 z-10">
                <span
                  class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-black/80 backdrop-blur-md text-primary border border-primary/50 shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                  >STEAM PC</span
                >
              </div>
              <div class="absolute top-3 right-3 z-10">
                <span
                  class="px-2.5 py-1 rounded text-label-sm font-orbitron font-bold bg-secondary/30 backdrop-blur-md border border-secondary text-white shadow-[0_0_12px_rgba(181,55,242,0.6)]"
                >
                  96% COCOK [S-TIER]
                </span>
              </div>
              <!-- Favorite button -->
              <button
                class="absolute bottom-3 right-3 z-10 w-8 h-8 rounded bg-black/70 backdrop-blur-md border border-neon-pink/50 flex items-center justify-center text-neon-pink hover:scale-110 hover:shadow-[0_0_10px_#ff007f] transition-all"
              >
                <span
                  class="material-symbols-outlined text-base"
                  data-weight="fill"
                  >favorite</span
                >
              </button>
            </div>
            <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
              <div>
                <div class="flex items-center justify-between gap-1 mb-1.5">
                  <h3
                    class="text-base font-orbitron font-bold text-on-surface truncate group-hover:text-primary transition-colors"
                  >
                    Elden Ring
                  </h3>
                  <span
                    class="text-label-sm font-bold text-amber-400 flex items-center gap-0.5 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/30"
                    >★ 4.8</span
                  >
                </div>
                <div class="flex flex-wrap gap-1.5">
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-primary border border-primary/20"
                    >Souls-like</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >RPG</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Open World</span
                  >
                </div>
              </div>
              <button
                class="w-full py-2.5 rounded bg-surface-container-high hover:bg-primary hover:text-black text-primary font-orbitron text-xs font-bold transition-all duration-200 flex items-center justify-center gap-2 active:scale-95 border border-primary/40 hover:glow-cyan"
                onclick="
                  document
                    .getElementById('modal-detail-game')
                    .classList.remove('hidden')
                "
              >
                <span>Lihat Detail</span>
                <span class="material-symbols-outlined text-sm"
                  >arrow_forward</span
                >
              </button>
            </div>
          </div>
          <!-- CARD 2: Cyberpunk 2077 (94% Cocok) -->
          <div
            class="rounded-xl bg-surface-container border-2 border-primary/40 hover:border-primary transition-all duration-300 flex flex-col overflow-hidden group shadow-lg hover:glow-cyan hover:-translate-y-1.5 relative"
          >
            <div class="relative h-48 overflow-hidden scanlines">
              <img
                alt="Sampul Cyberpunk 2077"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                data-alt="Vibrant night city scene from Cyberpunk 2077 with glowing neon signs, wet asphalt reflecting bright cyan and magenta lights, high-tech flying vehicles in a futuristic dystopian metropolis."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQjPavzwmRZx2cqfOCfH8v3nlw6Bx-Ea4jkzGG22O1Pa9BkPcK6IFN4cHuORgWSrpcUR7gGEgrb-RKSa0QLSy8MrRxl9-FWp2vBpyt4Ee3PwPyl-oa7ypP5Gfl5m7lz42Lrwk5bDRTzNlbZ3jRmeAmGQPAhw_KwHx38hpvW27WMR7CsajiOPFQbI-iVrZqXr_lhpbBBZ1sAKS3wnb-Ozz3A0kqwrzBuDsQLKm9VBfOrUt3bTy1-orh"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-surface-container via-transparent to-transparent"
              ></div>
              <div class="absolute top-3 left-3 z-10">
                <span
                  class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-black/80 backdrop-blur-md text-primary border border-primary/50 shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                  >STEAM PC</span
                >
              </div>
              <div class="absolute top-3 right-3 z-10">
                <span
                  class="px-2.5 py-1 rounded text-label-sm font-orbitron font-bold bg-secondary/30 backdrop-blur-md border border-secondary text-white shadow-[0_0_12px_rgba(181,55,242,0.6)]"
                >
                  94% COCOK [S-TIER]
                </span>
              </div>
              <button
                class="absolute bottom-3 right-3 z-10 w-8 h-8 rounded bg-black/70 backdrop-blur-md border border-neon-pink/50 flex items-center justify-center text-neon-pink hover:scale-110 hover:shadow-[0_0_10px_#ff007f] transition-all"
              >
                <span
                  class="material-symbols-outlined text-base"
                  data-weight="fill"
                  >favorite</span
                >
              </button>
            </div>
            <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
              <div>
                <div class="flex items-center justify-between gap-1 mb-1.5">
                  <h3
                    class="text-base font-orbitron font-bold text-on-surface truncate group-hover:text-primary transition-colors"
                  >
                    Cyberpunk 2077
                  </h3>
                  <span
                    class="text-label-sm font-bold text-amber-400 flex items-center gap-0.5 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/30"
                    >★ 4.6</span
                  >
                </div>
                <div class="flex flex-wrap gap-1.5">
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-primary border border-primary/20"
                    >Sci-Fi</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >RPG</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Action</span
                  >
                </div>
              </div>
              <button
                class="w-full py-2.5 rounded bg-surface-container-high hover:bg-primary hover:text-black text-primary font-orbitron text-xs font-bold transition-all duration-200 flex items-center justify-center gap-2 active:scale-95 border border-primary/40 hover:glow-cyan"
                onclick="
                  document
                    .getElementById('modal-detail-game')
                    .classList.remove('hidden')
                "
              >
                <span>Lihat Detail</span>
                <span class="material-symbols-outlined text-sm"
                  >arrow_forward</span
                >
              </button>
            </div>
          </div>
          <!-- CARD 3: Baldur's Gate 3 (93% Cocok) -->
          <div
            class="rounded-xl bg-surface-container border-2 border-primary/40 hover:border-primary transition-all duration-300 flex flex-col overflow-hidden group shadow-lg hover:glow-cyan hover:-translate-y-1.5 relative"
          >
            <div class="relative h-48 overflow-hidden scanlines">
              <img
                alt="Sampul Baldur's Gate 3"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                data-alt="Fantasy group of adventurers preparing for battle in Baldurs Gate 3 with magical spells glowing in hands, intricate armor details, cinematic dark mystical dungeon ambiance."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIfr9TS6q6K97q9lpWA1BXY0X5kE6LigC4X1vZDVZRKAS0Q6jlcWywTlVh7f4FKu1EAahzE36VFdjreYIg7b5yyOxgiJ5QJm-XLZFWfatLIacgfJKJTHjhkEG_oWunQZPjHr8GIOvAcMIWD_OCi0azois8IUdEfcFcdDYSYqRj_6crdPw7zOXbaWudI5hcQHcijku4Cn61P67g9Fvy-iuZpThPrU6kxaByHw0Mk055VAM6-HG69va-"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-surface-container via-transparent to-transparent"
              ></div>
              <div class="absolute top-3 left-3 z-10">
                <span
                  class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-black/80 backdrop-blur-md text-primary border border-primary/50 shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                  >STEAM PC</span
                >
              </div>
              <div class="absolute top-3 right-3 z-10">
                <span
                  class="px-2.5 py-1 rounded text-label-sm font-orbitron font-bold bg-secondary/30 backdrop-blur-md border border-secondary text-white shadow-[0_0_12px_rgba(181,55,242,0.6)]"
                >
                  93% COCOK [S-TIER]
                </span>
              </div>
              <button
                class="absolute bottom-3 right-3 z-10 w-8 h-8 rounded bg-black/70 backdrop-blur-md border border-neon-pink/50 flex items-center justify-center text-neon-pink hover:scale-110 hover:shadow-[0_0_10px_#ff007f] transition-all"
              >
                <span
                  class="material-symbols-outlined text-base"
                  data-weight="fill"
                  >favorite</span
                >
              </button>
            </div>
            <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
              <div>
                <div class="flex items-center justify-between gap-1 mb-1.5">
                  <h3
                    class="text-base font-orbitron font-bold text-on-surface truncate group-hover:text-primary transition-colors"
                  >
                    Baldur's Gate 3
                  </h3>
                  <span
                    class="text-label-sm font-bold text-amber-400 flex items-center gap-0.5 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/30"
                    >★ 4.9</span
                  >
                </div>
                <div class="flex flex-wrap gap-1.5">
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-primary border border-primary/20"
                    >Turn-Based</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >RPG</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Strategy</span
                  >
                </div>
              </div>
              <button
                class="w-full py-2.5 rounded bg-surface-container-high hover:bg-primary hover:text-black text-primary font-orbitron text-xs font-bold transition-all duration-200 flex items-center justify-center gap-2 active:scale-95 border border-primary/40 hover:glow-cyan"
                onclick="
                  document
                    .getElementById('modal-detail-game')
                    .classList.remove('hidden')
                "
              >
                <span>Lihat Detail</span>
                <span class="material-symbols-outlined text-sm"
                  >arrow_forward</span
                >
              </button>
            </div>
          </div>
          <!-- CARD 4: Armored Core VI (91% Cocok) -->
          <div
            class="rounded-xl bg-surface-container border-2 border-primary/40 hover:border-primary transition-all duration-300 flex flex-col overflow-hidden group shadow-lg hover:glow-cyan hover:-translate-y-1.5 relative"
          >
            <div class="relative h-48 overflow-hidden scanlines">
              <img
                alt="Sampul Armored Core VI"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                data-alt="Gigantic mech combat in Armored Core VI firing booster thrusters and plasma rockets across a snowy industrial wasteland under dark dramatic overcast clouds."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBt3kRWe3gqcgNUP7sHXAT6by2CXp7l8gsSWnHhCmjBFYrMKM9JCW570BZT7NoPCWp48iUX5nxmxFkLmstMLFn2WpRCEVLG7CwXSFlaHlyJu8B4amE4kJQgDeSRBkKRrlMKC9Y2-QgIo-LpvNKEcNFTps_qgustrhfblJU9yeLJNPkxsOhjx-4j9l-VHN5dBbTebg_LkKl0jcmZur1KmYpZD-hN8mKgVq92Dj-LELMoHrP23r6n0NNk"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-surface-container via-transparent to-transparent"
              ></div>
              <div class="absolute top-3 left-3 z-10">
                <span
                  class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-black/80 backdrop-blur-md text-primary border border-primary/50 shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                  >STEAM PC</span
                >
              </div>
              <div class="absolute top-3 right-3 z-10">
                <span
                  class="px-2.5 py-1 rounded text-label-sm font-orbitron font-bold bg-secondary/30 backdrop-blur-md border border-secondary text-white shadow-[0_0_12px_rgba(181,55,242,0.6)]"
                >
                  91% COCOK [A-TIER]
                </span>
              </div>
              <button
                class="absolute bottom-3 right-3 z-10 w-8 h-8 rounded bg-black/70 backdrop-blur-md border border-neon-pink/50 flex items-center justify-center text-neon-pink hover:scale-110 hover:shadow-[0_0_10px_#ff007f] transition-all"
              >
                <span
                  class="material-symbols-outlined text-base"
                  data-weight="fill"
                  >favorite</span
                >
              </button>
            </div>
            <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
              <div>
                <div class="flex items-center justify-between gap-1 mb-1.5">
                  <h3
                    class="text-base font-orbitron font-bold text-on-surface truncate group-hover:text-primary transition-colors"
                  >
                    Armored Core VI
                  </h3>
                  <span
                    class="text-label-sm font-bold text-amber-400 flex items-center gap-0.5 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/30"
                    >★ 4.7</span
                  >
                </div>
                <div class="flex flex-wrap gap-1.5">
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-primary border border-primary/20"
                    >Mecha</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Action</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Souls-like</span
                  >
                </div>
              </div>
              <button
                class="w-full py-2.5 rounded bg-surface-container-high hover:bg-primary hover:text-black text-primary font-orbitron text-xs font-bold transition-all duration-200 flex items-center justify-center gap-2 active:scale-95 border border-primary/40 hover:glow-cyan"
                onclick="
                  document
                    .getElementById('modal-detail-game')
                    .classList.remove('hidden')
                "
              >
                <span>Lihat Detail</span>
                <span class="material-symbols-outlined text-sm"
                  >arrow_forward</span
                >
              </button>
            </div>
          </div>
          <!-- CARD 5: Hades II (89% Cocok) -->
          <div
            class="rounded-xl bg-surface-container border-2 border-primary/40 hover:border-primary transition-all duration-300 flex flex-col overflow-hidden group shadow-lg hover:glow-cyan hover:-translate-y-1.5 relative"
          >
            <div class="relative h-48 overflow-hidden scanlines">
              <img
                alt="Sampul Hades II"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                data-alt="Mythological underworld stylized graphic illustration of Hades II featuring a witch warrior summoning emerald green flames with ornate golden Greek ornaments and dark shadows."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAA_oR1WnFa9dMp_IJs43GUkSOiC9MJzzs6WK21UW4AbSf-Ic2OTAqdalaqpNj90kB04OLe-N2pWwxfPejlloiDd9DWzmXUH865xUWYGKgeE3ZWApJ4kVGln5bhTtgmsow962czgzc-pSCsaHA78T8r55dCrRji_k27rlxiYgcx8O1ZDquvRACF9OhBAMQU6QVKjOUW-RZaku-9s3GSHG065bCbBF7mgMch-vG9b9G8zoQKxfgMgwfb"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-surface-container via-transparent to-transparent"
              ></div>
              <div class="absolute top-3 left-3 z-10">
                <span
                  class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-black/80 backdrop-blur-md text-primary border border-primary/50 shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                  >STEAM PC</span
                >
              </div>
              <div class="absolute top-3 right-3 z-10">
                <span
                  class="px-2.5 py-1 rounded text-label-sm font-orbitron font-bold bg-secondary/30 backdrop-blur-md border border-secondary text-white shadow-[0_0_12px_rgba(181,55,242,0.6)]"
                >
                  89% COCOK [A-TIER]
                </span>
              </div>
              <button
                class="absolute bottom-3 right-3 z-10 w-8 h-8 rounded bg-black/70 backdrop-blur-md border border-neon-pink/50 flex items-center justify-center text-neon-pink hover:scale-110 hover:shadow-[0_0_10px_#ff007f] transition-all"
              >
                <span
                  class="material-symbols-outlined text-base"
                  data-weight="fill"
                  >favorite</span
                >
              </button>
            </div>
            <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
              <div>
                <div class="flex items-center justify-between gap-1 mb-1.5">
                  <h3
                    class="text-base font-orbitron font-bold text-on-surface truncate group-hover:text-primary transition-colors"
                  >
                    Hades II
                  </h3>
                  <span
                    class="text-label-sm font-bold text-amber-400 flex items-center gap-0.5 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/30"
                    >★ 4.9</span
                  >
                </div>
                <div class="flex flex-wrap gap-1.5">
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-primary border border-primary/20"
                    >Roguelike</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Action</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Indie</span
                  >
                </div>
              </div>
              <button
                class="w-full py-2.5 rounded bg-surface-container-high hover:bg-primary hover:text-black text-primary font-orbitron text-xs font-bold transition-all duration-200 flex items-center justify-center gap-2 active:scale-95 border border-primary/40 hover:glow-cyan"
                onclick="
                  document
                    .getElementById('modal-detail-game')
                    .classList.remove('hidden')
                "
              >
                <span>Lihat Detail</span>
                <span class="material-symbols-outlined text-sm"
                  >arrow_forward</span
                >
              </button>
            </div>
          </div>
          <!-- CARD 6: Lies of P (88% Cocok) -->
          <div
            class="rounded-xl bg-surface-container border-2 border-primary/40 hover:border-primary transition-all duration-300 flex flex-col overflow-hidden group shadow-lg hover:glow-cyan hover:-translate-y-1.5 relative"
          >
            <div class="relative h-48 overflow-hidden scanlines">
              <img
                alt="Sampul Lies of P"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                data-alt="Belle Epoque gothic city of Krat from Lies of P with a mechanical puppet protagonist holding a curved blade against eerie glowing street lamps in the foggy night."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNswDdYr0ZNIizGj1u97PwBl2PV6Ob7YCS_VLwigiL4yGKMinkOdgJ5NBgw65FlsZhkLZkjQpmQPPxhoXncKv71t-czNfazGde-f17rJRzdEwZGK8xOUtPO-0ColF9uD73CEPAk2SPQHh9qll2GHbhmB5xkmYcK-AsvgToYdIv9UEsFonL_g1o_EzjFBjv2KqJaHz6GqfYwvIG96IFkUGRy3k3M2BtLN5tsetLJv0Xo7nD8vDsgADk"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-surface-container via-transparent to-transparent"
              ></div>
              <div class="absolute top-3 left-3 z-10">
                <span
                  class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-black/80 backdrop-blur-md text-primary border border-primary/50 shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                  >STEAM PC</span
                >
              </div>
              <div class="absolute top-3 right-3 z-10">
                <span
                  class="px-2.5 py-1 rounded text-label-sm font-orbitron font-bold bg-secondary/30 backdrop-blur-md border border-secondary text-white shadow-[0_0_12px_rgba(181,55,242,0.6)]"
                >
                  88% COCOK [A-TIER]
                </span>
              </div>
              <button
                class="absolute bottom-3 right-3 z-10 w-8 h-8 rounded bg-black/70 backdrop-blur-md border border-neon-pink/50 flex items-center justify-center text-neon-pink hover:scale-110 hover:shadow-[0_0_10px_#ff007f] transition-all"
              >
                <span
                  class="material-symbols-outlined text-base"
                  data-weight="fill"
                  >favorite</span
                >
              </button>
            </div>
            <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
              <div>
                <div class="flex items-center justify-between gap-1 mb-1.5">
                  <h3
                    class="text-base font-orbitron font-bold text-on-surface truncate group-hover:text-primary transition-colors"
                  >
                    Lies of P
                  </h3>
                  <span
                    class="text-label-sm font-bold text-amber-400 flex items-center gap-0.5 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/30"
                    >★ 4.7</span
                  >
                </div>
                <div class="flex flex-wrap gap-1.5">
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-primary border border-primary/20"
                    >Souls-like</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Dark Fantasy</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >RPG</span
                  >
                </div>
              </div>
              <button
                class="w-full py-2.5 rounded bg-surface-container-high hover:bg-primary hover:text-black text-primary font-orbitron text-xs font-bold transition-all duration-200 flex items-center justify-center gap-2 active:scale-95 border border-primary/40 hover:glow-cyan"
                onclick="
                  document
                    .getElementById('modal-detail-game')
                    .classList.remove('hidden')
                "
              >
                <span>Lihat Detail</span>
                <span class="material-symbols-outlined text-sm"
                  >arrow_forward</span
                >
              </button>
            </div>
          </div>
          <!-- CARD 7: Starfield (85% Cocok) -->
          <div
            class="rounded-xl bg-surface-container border-2 border-primary/40 hover:border-primary transition-all duration-300 flex flex-col overflow-hidden group shadow-lg hover:glow-cyan hover:-translate-y-1.5 relative"
          >
            <div class="relative h-48 overflow-hidden scanlines">
              <img
                alt="Sampul Starfield"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                data-alt="Astronaut explorer exploring an uncharted alien world in Starfield looking at a massive ringed planet rising over the rocky horizon, NASA-punk aesthetic with deep cosmic colors."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlw2NkjpqFC86PQHxCgF9hRhRQgr5lSqSr9mdssih8rn6OmkX8Y0VQaHUGsLCUwtjvtbF_sVZjWOHv6lROdjkkve9cahFuRsJKJPcf4em8T_eOQbb4KsowB-Pj34Jrg1RbkQ_yILrCFuKnXOqTEPCdYZ4KASRVJj5LH5PD_8PuX9K9dJ0wrsCn2n1EdrkhPxup-6aAbahB3-Pe9BUqg1DedZs_grsm39MspYk5uGWgVKBduoCvon_Z"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-surface-container via-transparent to-transparent"
              ></div>
              <div class="absolute top-3 left-3 z-10">
                <span
                  class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-black/80 backdrop-blur-md text-primary border border-primary/50 shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                  >STEAM PC</span
                >
              </div>
              <div class="absolute top-3 right-3 z-10">
                <span
                  class="px-2.5 py-1 rounded text-label-sm font-orbitron font-bold bg-secondary/30 backdrop-blur-md border border-secondary text-white shadow-[0_0_12px_rgba(181,55,242,0.6)]"
                >
                  85% COCOK [B-TIER]
                </span>
              </div>
              <button
                class="absolute bottom-3 right-3 z-10 w-8 h-8 rounded bg-black/70 backdrop-blur-md border border-neon-pink/50 flex items-center justify-center text-neon-pink hover:scale-110 hover:shadow-[0_0_10px_#ff007f] transition-all"
              >
                <span
                  class="material-symbols-outlined text-base"
                  data-weight="fill"
                  >favorite</span
                >
              </button>
            </div>
            <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
              <div>
                <div class="flex items-center justify-between gap-1 mb-1.5">
                  <h3
                    class="text-base font-orbitron font-bold text-on-surface truncate group-hover:text-primary transition-colors"
                  >
                    Starfield
                  </h3>
                  <span
                    class="text-label-sm font-bold text-amber-400 flex items-center gap-0.5 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/30"
                    >★ 4.3</span
                  >
                </div>
                <div class="flex flex-wrap gap-1.5">
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-primary border border-primary/20"
                    >Sci-Fi</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Open World</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >RPG</span
                  >
                </div>
              </div>
              <button
                class="w-full py-2.5 rounded bg-surface-container-high hover:bg-primary hover:text-black text-primary font-orbitron text-xs font-bold transition-all duration-200 flex items-center justify-center gap-2 active:scale-95 border border-primary/40 hover:glow-cyan"
                onclick="
                  document
                    .getElementById('modal-detail-game')
                    .classList.remove('hidden')
                "
              >
                <span>Lihat Detail</span>
                <span class="material-symbols-outlined text-sm"
                  >arrow_forward</span
                >
              </button>
            </div>
          </div>
          <!-- CARD 8: Final Fantasy VII Remake (83% Cocok) -->
          <div
            class="rounded-xl bg-surface-container border-2 border-primary/40 hover:border-primary transition-all duration-300 flex flex-col overflow-hidden group shadow-lg hover:glow-cyan hover:-translate-y-1.5 relative"
          >
            <div class="relative h-48 overflow-hidden scanlines">
              <img
                alt="Sampul Final Fantasy VII Remake"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                data-alt="Midgar cityscape from Final Fantasy VII Remake with Cloud Strife looking up at the towering Shinra Mako Reactor under starry indigo sky, neon accents illuminating his Buster Sword."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtYx5wxB1xfQm6WhsyK72oYqA815YA3ekhXkSieWr4nzC7nuRcGsL8xCZUwDUkM5j5pLl4uOOVenR1FfekslRzGyb_eosSBz8lZHddEXlPTyBfVW0jj5swVuDSRrRTikElYp8m0-A8sPpQVbrBw3X50YWmPHyapYh5g9FQmIFn2m3oFh8HNBmDkZO3QXC7mFNMpAL1u6dapuZ3ZTCTiiOCfesyNo_d8B4J1nfIjKdlMUv1Z0LWp4M-"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-surface-container via-transparent to-transparent"
              ></div>
              <div class="absolute top-3 left-3 z-10">
                <span
                  class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-black/80 backdrop-blur-md text-primary border border-primary/50 shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                  >STEAM PC</span
                >
              </div>
              <div class="absolute top-3 right-3 z-10">
                <span
                  class="px-2.5 py-1 rounded text-label-sm font-orbitron font-bold bg-secondary/30 backdrop-blur-md border border-secondary text-white shadow-[0_0_12px_rgba(181,55,242,0.6)]"
                >
                  83% COCOK [B-TIER]
                </span>
              </div>
              <button
                class="absolute bottom-3 right-3 z-10 w-8 h-8 rounded bg-black/70 backdrop-blur-md border border-neon-pink/50 flex items-center justify-center text-neon-pink hover:scale-110 hover:shadow-[0_0_10px_#ff007f] transition-all"
              >
                <span
                  class="material-symbols-outlined text-base"
                  data-weight="fill"
                  >favorite</span
                >
              </button>
            </div>
            <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
              <div>
                <div class="flex items-center justify-between gap-1 mb-1.5">
                  <h3
                    class="text-base font-orbitron font-bold text-on-surface truncate group-hover:text-primary transition-colors"
                  >
                    Final Fantasy VII Remake
                  </h3>
                  <span
                    class="text-label-sm font-bold text-amber-400 flex items-center gap-0.5 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/30"
                    >★ 4.8</span
                  >
                </div>
                <div class="flex flex-wrap gap-1.5">
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-primary border border-primary/20"
                    >JRPG</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Action</span
                  >
                  <span
                    class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant"
                    >Fantasy</span
                  >
                </div>
              </div>
              <button
                class="w-full py-2.5 rounded bg-surface-container-high hover:bg-primary hover:text-black text-primary font-orbitron text-xs font-bold transition-all duration-200 flex items-center justify-center gap-2 active:scale-95 border border-primary/40 hover:glow-cyan"
                onclick="
                  document
                    .getElementById('modal-detail-game')
                    .classList.remove('hidden')
                "
              >
                <span>Lihat Detail</span>
                <span class="material-symbols-outlined text-sm"
                  >arrow_forward</span
                >
              </button>
            </div>
          </div>
        </div>
      </section>

    <!-- FLOATING BOTTOM ACTION BAR (Sticky Bar: 4 Game Dipilih & Tombol Hitung - Esports HUD Edition) -->
    <div class="fixed bottom-4 inset-x-0 z-30 px-4 pointer-events-none">
      <div
        class="max-w-4xl mx-auto rounded-xl bg-surface-dim/95 backdrop-blur-2xl border-2 border-primary/60 p-4 shadow-[0_0_35px_rgba(0,240,255,0.35)] glow-cyan flex flex-col sm:flex-row items-center justify-between gap-4 pointer-events-auto"
      >
        <div class="flex items-center gap-3.5">
          <div
            class="w-11 h-11 rounded-lg bg-primary/20 border-2 border-primary flex items-center justify-center text-primary shadow-[0_0_12px_rgba(0,240,255,0.5)] flex-shrink-0"
          >
            <span class="material-symbols-outlined" data-weight="fill"
              >bookmarks</span
            >
          </div>
          <div>
            <div class="flex items-center gap-2">
              <span
                class="text-sm font-orbitron font-bold text-on-surface tracking-wide uppercase"
                >Game Favorit Dipilih</span
              >
              <span
                class="px-2 py-0.5 rounded text-[10px] font-label-sm font-bold bg-primary text-black tracking-wider uppercase"
                >4 game</span
              >
            </div>
            <p
              class="text-body-sm text-on-surface-variant line-clamp-1 font-mono text-xs"
            >
              Cyberpunk 2077, Elden Ring, Baldur's Gate 3, Hades
            </p>
          </div>
        </div>
        <button
          class="w-full sm:w-auto px-7 py-3 rounded bg-gradient-to-r from-primary via-primary to-cyan-300 hover:from-white hover:to-primary text-black font-orbitron text-xs font-black tracking-wider shadow-[0_0_20px_rgba(0,240,255,0.6)] transition-all duration-200 active:scale-95 flex items-center justify-center gap-2 flex-shrink-0 uppercase"
        >
          <span class="material-symbols-outlined text-lg">calculate</span>
          <span>Simpan &amp; Hitung Rekomendasi</span>
        </button>
      </div>
    </div>

@endsection
