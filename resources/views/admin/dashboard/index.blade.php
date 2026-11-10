@extends('layouts.admin')

@section('title', 'GameMatch Console - Dashboard Telemetri & KPI ML')
@section('header-title', 'Konsol Administrasi & Mesin Rekomendasi ML')
@section('header-subtitle', 'Manajemen pipeline dataset Steam Kaggle & matriks Cosine Similarity')

@section('admin-content')
        <!-- ========================================== -->
        <!-- 1. 4 TACTICAL KPI METRIC TILES             -->
        <!-- ========================================== -->
        <section aria-labelledby="kpi-heading">
          <h2 class="sr-only" id="kpi-heading">Ringkasan Metrik KPI</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
            <!-- KPI 1: Total Game (Cyan Aura) -->
            <div
              class="relative overflow-hidden bg-surface-container/90 rounded-xl border border-outline-variant hover:border-primary/80 p-5 shadow-xl transition-all duration-200 group hover:shadow-cyan-500/10 hover:shadow-lg"
            >
              <div
                class="absolute -right-8 -top-8 w-24 h-24 bg-primary/10 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"
              ></div>
              <div class="flex items-center justify-between">
                <span
                  class="font-mono text-[11px] font-bold text-on-surface-variant uppercase tracking-widest flex items-center gap-1.5"
                >
                  <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Total Game
                </span>
                <div
                  class="p-2 rounded-lg bg-surface-container-high border border-primary/30 text-primary glow-cyan-sm"
                >
                  <span
                    class="material-symbols-outlined text-[20px]"
                    data-icon="sports_esports"
                    >sports_esports</span
                  >
                </div>
              </div>
              <div class="mt-3">
                <div
                  class="font-headline text-3xl font-extrabold text-white tracking-tight"
                >
                  {{ $totalGames }}
                </div>
                <div
                  class="mt-1.5 flex items-center gap-1.5 font-mono text-xs text-primary font-semibold"
                >
                  <span
                    class="material-symbols-outlined text-[15px]"
                    data-icon="database"
                    >database</span
                  >
                  <span>Dataset Steam Kaggle</span>
                </div>
              </div>
            </div>
            <!-- KPI 2: Total Genre (Neon Purple Aura) -->
            <div
              class="relative overflow-hidden bg-surface-container/90 rounded-xl border border-outline-variant hover:border-secondary/80 p-5 shadow-xl transition-all duration-200 group hover:shadow-purple-500/10 hover:shadow-lg"
            >
              <div
                class="absolute -right-8 -top-8 w-24 h-24 bg-secondary/10 rounded-full blur-2xl group-hover:bg-secondary/20 transition-all"
              ></div>
              <div class="flex items-center justify-between">
                <span
                  class="font-mono text-[11px] font-bold text-on-surface-variant uppercase tracking-widest flex items-center gap-1.5"
                >
                  <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                  Total Genre
                </span>
                <div
                  class="p-2 rounded-lg bg-surface-container-high border border-secondary/30 text-secondary glow-purple"
                >
                  <span
                    class="material-symbols-outlined text-[20px]"
                    data-icon="category"
                    >category</span
                  >
                </div>
              </div>
              <div class="mt-3">
                <div
                  class="font-headline text-3xl font-extrabold text-white tracking-tight"
                >
                  {{ $totalGenres }}
                </div>
                <div
                  class="mt-1.5 flex items-center gap-1.5 font-mono text-xs text-secondary font-semibold"
                >
                  <span
                    class="material-symbols-outlined text-[15px]"
                    data-icon="verified"
                    >verified</span
                  >
                  <span>32 Kategori Terstandarisasi</span>
                </div>
              </div>
            </div>
            <!-- KPI 3: Total Pengguna (Neon Green Aura) -->
            <div
              class="relative overflow-hidden bg-surface-container/90 rounded-xl border border-outline-variant hover:border-tertiary/80 p-5 shadow-xl transition-all duration-200 group hover:shadow-emerald-500/10 hover:shadow-lg"
            >
              <div
                class="absolute -right-8 -top-8 w-24 h-24 bg-tertiary/10 rounded-full blur-2xl group-hover:bg-tertiary/20 transition-all"
              ></div>
              <div class="flex items-center justify-between">
                <span
                  class="font-mono text-[11px] font-bold text-on-surface-variant uppercase tracking-widest flex items-center gap-1.5"
                >
                  <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                  Total Pengguna
                </span>
                <div
                  class="p-2 rounded-lg bg-surface-container-high border border-tertiary/30 text-tertiary glow-green"
                >
                  <span
                    class="material-symbols-outlined text-[20px]"
                    data-icon="group"
                    >group</span
                  >
                </div>
              </div>
              <div class="mt-3">
                <div
                  class="font-headline text-3xl font-extrabold text-white tracking-tight"
                >
                  {{ $totalUsers }}
                </div>
                <div
                  class="mt-1.5 flex items-center gap-1.5 font-mono text-xs text-tertiary font-semibold"
                >
                  <span
                    class="material-symbols-outlined text-[15px]"
                    data-icon="trending_up"
                    >trending_up</span
                  >
                  <span>Akun Terdaftar Aktif</span>
                </div>
              </div>
            </div>
            <!-- KPI 4: Total Difavoritkan (Cyan-Purple Hybrid) -->
            <div
              class="relative overflow-hidden bg-surface-container/90 rounded-xl border border-outline-variant hover:border-pink-500/80 p-5 shadow-xl transition-all duration-200 group hover:shadow-pink-500/10 hover:shadow-lg"
            >
              <div
                class="absolute -right-8 -top-8 w-24 h-24 bg-pink-500/10 rounded-full blur-2xl group-hover:bg-pink-500/20 transition-all"
              ></div>
              <div class="flex items-center justify-between">
                <span
                  class="font-mono text-[11px] font-bold text-on-surface-variant uppercase tracking-widest flex items-center gap-1.5"
                >
                  <span class="w-1.5 h-1.5 rounded-full bg-pink-400"></span>
                  Total Difavoritkan
                </span>
                <div
                  class="p-2 rounded-lg bg-surface-container-high border border-pink-500/30 text-pink-400"
                >
                  <span
                    class="material-symbols-outlined text-[20px]"
                    data-icon="favorite"
                    data-weight="fill"
                    style="font-variation-settings: &quot;FILL&quot; 1"
                    >favorite</span
                  >
                </div>
              </div>
              <div class="mt-3">
                <div
                  class="font-headline text-3xl font-extrabold text-white tracking-tight"
                >
                  34.190
                </div>
                <div
                  class="mt-1.5 flex items-center gap-1.5 font-mono text-xs text-pink-400 font-semibold"
                >
                  <span
                    class="material-symbols-outlined text-[15px]"
                    data-icon="hub"
                    >hub</span
                  >
                  <span>Vektor Interaksi Pengguna</span>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- ========================================== -->
        <!-- 2. TACTICAL CHARTS & HUD METRIC VECTORS    -->
        <!-- ========================================== -->
        <section
          aria-labelledby="charts-heading"
          class="grid grid-cols-1 lg:grid-cols-12 gap-6"
        >
          <h2 class="sr-only" id="charts-heading">
            Visualisasi Data &amp; Statistik Game
          </h2>
          <!-- Widget 1: Laser Bar Chart (7 Kolom) -->
          <div
            class="lg:col-span-7 bg-surface-container/90 rounded-xl border border-outline-variant p-6 shadow-xl flex flex-col justify-between relative overflow-hidden"
          >
            <div
              class="flex items-center justify-between pb-4 border-b border-outline-variant"
            >
              <div class="flex items-center gap-2.5">
                <div
                  class="p-1.5 rounded bg-primary/10 border border-primary/30 text-primary"
                >
                  <span
                    class="material-symbols-outlined text-[20px]"
                    data-icon="query_stats"
                    >query_stats</span
                  >
                </div>
                <h3
                  class="font-headline font-bold text-base text-white tracking-wide"
                >
                  Game Paling Banyak Difavoritkan
                </h3>
              </div>
              <span
                class="font-mono text-[11px] font-bold px-2.5 py-1 rounded bg-surface-container-high border border-outline-variant text-primary uppercase"
                >TOP 4 TITLES</span
              >
            </div>
            <!-- Laser Progress Bars -->
            <div class="mt-6 space-y-5">
              <!-- Elden Ring -->
              <div>
                <div class="flex justify-between font-headline text-xs mb-1.5">
                  <span
                    class="text-white font-semibold flex items-center gap-2"
                  >
                    <span
                      class="w-2 h-2 rounded-sm bg-primary shadow-sm shadow-primary"
                    ></span>
                    Elden Ring
                  </span>
                  <span class="font-mono text-xs text-primary font-bold"
                    >12.430 difavoritkan (94%)</span
                  >
                </div>
                <div
                  class="w-full h-3 rounded bg-surface-container-low border border-outline-variant p-[1px] overflow-hidden"
                >
                  <div
                    class="h-full bg-gradient-to-r from-cyan-600 via-primary to-cyan-300 rounded transition-all duration-700 relative shadow-sm shadow-primary"
                    style="width: 94%"
                  >
                    <div
                      class="absolute inset-0 bg-white/25 animate-pulse"
                    ></div>
                  </div>
                </div>
              </div>
              <!-- Cyberpunk 2077 -->
              <div>
                <div class="flex justify-between font-headline text-xs mb-1.5">
                  <span
                    class="text-white font-semibold flex items-center gap-2"
                  >
                    <span
                      class="w-2 h-2 rounded-sm bg-secondary shadow-sm shadow-secondary"
                    ></span>
                    Cyberpunk 2077
                  </span>
                  <span class="font-mono text-xs text-secondary font-bold"
                    >10.850 difavoritkan (82%)</span
                  >
                </div>
                <div
                  class="w-full h-3 rounded bg-surface-container-low border border-outline-variant p-[1px] overflow-hidden"
                >
                  <div
                    class="h-full bg-gradient-to-r from-purple-700 via-secondary to-fuchsia-400 rounded transition-all duration-700 relative shadow-sm shadow-secondary"
                    style="width: 82%"
                  >
                    <div
                      class="absolute inset-0 bg-white/20 animate-pulse"
                    ></div>
                  </div>
                </div>
              </div>
              <!-- Baldur's Gate 3 -->
              <div>
                <div class="flex justify-between font-headline text-xs mb-1.5">
                  <span
                    class="text-white font-semibold flex items-center gap-2"
                  >
                    <span
                      class="w-2 h-2 rounded-sm bg-tertiary shadow-sm shadow-tertiary"
                    ></span>
                    Baldur's Gate 3
                  </span>
                  <span class="font-mono text-xs text-tertiary font-bold"
                    >9.720 difavoritkan (73%)</span
                  >
                </div>
                <div
                  class="w-full h-3 rounded bg-surface-container-low border border-outline-variant p-[1px] overflow-hidden"
                >
                  <div
                    class="h-full bg-gradient-to-r from-emerald-600 via-tertiary to-green-300 rounded transition-all duration-700 relative shadow-sm shadow-tertiary"
                    style="width: 73%"
                  >
                    <div
                      class="absolute inset-0 bg-white/20 animate-pulse"
                    ></div>
                  </div>
                </div>
              </div>
              <!-- Red Dead Redemption 2 -->
              <div>
                <div class="flex justify-between font-headline text-xs mb-1.5">
                  <span
                    class="text-white font-semibold flex items-center gap-2"
                  >
                    <span
                      class="w-2 h-2 rounded-sm bg-amber-400 shadow-sm shadow-amber-400"
                    ></span>
                    Red Dead Redemption 2
                  </span>
                  <span class="font-mono text-xs text-amber-400 font-bold"
                    >8.190 difavoritkan (62%)</span
                  >
                </div>
                <div
                  class="w-full h-3 rounded bg-surface-container-low border border-outline-variant p-[1px] overflow-hidden"
                >
                  <div
                    class="h-full bg-gradient-to-r from-amber-600 via-amber-400 to-yellow-200 rounded transition-all duration-700 relative"
                    style="width: 62%"
                  ></div>
                </div>
              </div>
            </div>
            <div
              class="mt-6 pt-4 border-t border-outline-variant flex items-center justify-between text-on-surface-variant font-mono text-xs"
            >
              <span class="flex items-center gap-1.5"
                ><span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                Metrik dihitung otomatis via log interaksi pengguna</span
              >
              <span class="text-primary font-bold"
                >Diperbarui: Hari ini, 08:30 WIB</span
              >
            </div>
          </div>
          <!-- Widget 2: Vivid Neon HUD Donut Chart (5 Kolom) -->
          <div
            class="lg:col-span-5 bg-surface-container/90 rounded-xl border border-outline-variant p-6 shadow-xl flex flex-col justify-between relative overflow-hidden"
          >
            <div
              class="flex items-center justify-between pb-4 border-b border-outline-variant"
            >
              <div class="flex items-center gap-2.5">
                <div
                  class="p-1.5 rounded bg-secondary/10 border border-secondary/30 text-secondary"
                >
                  <span
                    class="material-symbols-outlined text-[20px]"
                    data-icon="donut_large"
                    >donut_large</span
                  >
                </div>
                <h3
                  class="font-headline font-bold text-base text-white tracking-wide"
                >
                  Distribusi Genre Game
                </h3>
              </div>
              <span
                class="font-mono text-[11px] font-bold px-2.5 py-1 rounded bg-surface-container-high border border-outline-variant text-secondary uppercase"
                >52.840 DATA</span
              >
            </div>
            <!-- Glowing Donut & Tactical Legend -->
            <div
              class="mt-6 flex flex-col sm:flex-row items-center justify-around gap-6"
            >
              <!-- SVG Glowing Neon Donut Chart -->
              <div
                class="relative w-44 h-44 flex items-center justify-center shrink-0"
              >
                <svg
                  class="w-full h-full transform -rotate-90 filter drop-shadow-[0_0_8px_rgba(0,240,255,0.25)]"
                  viewbox="0 0 36 36"
                >
                  <!-- Grid Track Ring -->
                  <circle
                    cx="18"
                    cy="18"
                    fill="transparent"
                    r="15.9155"
                    stroke="#131c2a"
                    stroke-width="3.5"
                  ></circle>
                  <!-- RPG: 32% (Neon Cyan #00f0ff) -->
                  <circle
                    cx="18"
                    cy="18"
                    fill="transparent"
                    r="15.9155"
                    stroke="#00f0ff"
                    stroke-dasharray="32, 68"
                    stroke-dashoffset="0"
                    stroke-width="4.2"
                  ></circle>
                  <!-- Action: 28% (Neon Purple #a855f7) -->
                  <circle
                    cx="18"
                    cy="18"
                    fill="transparent"
                    r="15.9155"
                    stroke="#a855f7"
                    stroke-dasharray="28, 72"
                    stroke-dashoffset="-32"
                    stroke-width="4.2"
                  ></circle>
                  <!-- Strategy: 18% (Neon Emerald #00ffa3) -->
                  <circle
                    cx="18"
                    cy="18"
                    fill="transparent"
                    r="15.9155"
                    stroke="#00ffa3"
                    stroke-dasharray="18, 82"
                    stroke-dashoffset="-60"
                    stroke-width="4.2"
                  ></circle>
                  <!-- Shooter: 14% (Laser Pink #ff007f) -->
                  <circle
                    cx="18"
                    cy="18"
                    fill="transparent"
                    r="15.9155"
                    stroke="#ff007f"
                    stroke-dasharray="14, 86"
                    stroke-dashoffset="-78"
                    stroke-width="4.2"
                  ></circle>
                  <!-- Lainnya: 8% (Stealth Steel) -->
                  <circle
                    cx="18"
                    cy="18"
                    fill="transparent"
                    r="15.9155"
                    stroke="#485c7b"
                    stroke-dasharray="8, 92"
                    stroke-dashoffset="-92"
                    stroke-width="4.2"
                  ></circle>
                </svg>
                <div class="absolute flex flex-col items-center">
                  <span
                    class="font-headline text-2xl font-black text-white tracking-wider glow-cyan-sm"
                    >100%</span
                  >
                  <span
                    class="font-mono text-[10px] text-primary uppercase font-bold tracking-widest"
                    >Proporsi</span
                  >
                </div>
              </div>
              <!-- Monospace Tactical Legends -->
              <div
                class="space-y-2 text-left w-full sm:w-auto font-mono text-xs"
              >
                <div
                  class="flex items-center justify-between gap-4 py-0.5 border-b border-outline-variant/40"
                >
                  <span class="flex items-center gap-2 text-white">
                    <span
                      class="w-2.5 h-2.5 rounded-sm bg-[#00f0ff] shadow-sm shadow-cyan-400"
                    ></span>
                    RPG
                  </span>
                  <span class="text-primary font-bold">32%</span>
                </div>
                <div
                  class="flex items-center justify-between gap-4 py-0.5 border-b border-outline-variant/40"
                >
                  <span class="flex items-center gap-2 text-white">
                    <span
                      class="w-2.5 h-2.5 rounded-sm bg-[#a855f7] shadow-sm shadow-purple-500"
                    ></span>
                    Action
                  </span>
                  <span class="text-secondary font-bold">28%</span>
                </div>
                <div
                  class="flex items-center justify-between gap-4 py-0.5 border-b border-outline-variant/40"
                >
                  <span class="flex items-center gap-2 text-white">
                    <span
                      class="w-2.5 h-2.5 rounded-sm bg-[#00ffa3] shadow-sm shadow-emerald-400"
                    ></span>
                    Strategy
                  </span>
                  <span class="text-tertiary font-bold">18%</span>
                </div>
                <div
                  class="flex items-center justify-between gap-4 py-0.5 border-b border-outline-variant/40"
                >
                  <span class="flex items-center gap-2 text-white">
                    <span
                      class="w-2.5 h-2.5 rounded-sm bg-[#ff007f] shadow-sm shadow-pink-500"
                    ></span>
                    Shooter
                  </span>
                  <span class="text-pink-400 font-bold">14%</span>
                </div>
                <div class="flex items-center justify-between gap-4 py-0.5">
                  <span class="flex items-center gap-2 text-on-surface-variant">
                    <span class="w-2.5 h-2.5 rounded-sm bg-[#485c7b]"></span>
                    Lainnya
                  </span>
                  <span class="text-on-surface-variant font-bold">8%</span>
                </div>
              </div>
            </div>
            <div
              class="mt-4 pt-3 border-t border-outline-variant text-center font-mono text-xs text-on-surface-variant"
            >
              Representasi sebaran multi-label dataset Steam
            </div>
          </div>
        </section>

@endsection
