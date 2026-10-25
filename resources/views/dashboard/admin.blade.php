@extends('layouts.admin')

@section('title', 'GameMatch Console - Esports Tactical Mission Control')

@section('admin-content')
        <!-- ======================================================== -->
        <!-- TAB 1: DASHBOARD (KONSOL TELEMETRI & KPI ML)             -->
        <!-- ======================================================== -->
        <div id="tab-content-dashboard" class="admin-tab-pane space-y-8">
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
                  52.840
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
                  32
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
                  8.420
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
        </div>

        <!-- ======================================================== -->
        <!-- TAB 2: DATA GAME (KATALOG & MANAJEMEN GAME PC)           -->
        <!-- ======================================================== -->
        <div id="tab-content-datagame" class="admin-tab-pane hidden space-y-6">
        <!-- ========================================== -->
        <!-- 3. SECTION DATA GAME PC (HUD MISSION TABLE)-->
        <!-- ========================================== -->
        <section
          class="bg-surface-container/90 rounded-xl border border-outline-variant shadow-2xl overflow-hidden relative"
          id="datagame"
        >
          <!-- HUD Accent Line Top -->
          <div
            class="h-0.5 w-full bg-gradient-to-r from-primary via-secondary to-tertiary"
          ></div>
          <!-- Header & Filter Bar -->
          <div
            class="p-6 border-b border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-4"
          >
            <div>
              <div class="flex items-center gap-2">
                <span
                  class="material-symbols-outlined text-primary text-[22px]"
                  data-icon="storage"
                  >storage</span
                >
                <h3
                  class="font-headline font-bold text-lg text-white uppercase tracking-wider"
                >
                  Data Game PC
                </h3>
              </div>
              <p class="font-mono text-xs text-on-surface-variant mt-0.5">
                Katalog aktif yang telah di-vektorisasi ke dalam basis data
                similarity
              </p>
            </div>
            <!-- Controls: Search, Filter & Add Button -->
            <div class="flex flex-wrap items-center gap-3">
              <!-- Search Input -->
              <div class="relative min-w-[220px]">
                <span
                  class="material-symbols-outlined absolute left-3 top-2.5 text-primary/70 text-[18px]"
                  data-icon="search"
                  >search</span
                >
                <input
                  class="w-full pl-9 pr-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs placeholder:text-on-surface-variant focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all"
                  placeholder="Cari judul game..."
                  type="text"
                />
              </div>
              <!-- Genre Dropdown -->
              <select
                class="px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary cursor-pointer"
              >
                <option value="all">Semua Genre</option>
                <option value="rpg">RPG</option>
                <option value="action">Action</option>
                <option value="strategy">Strategy</option>
                <option value="shooter">Shooter</option>
              </select>
              <!-- + Tambah Game Button -->
              <button
                class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-primary to-cyan-400 text-black rounded-lg font-headline font-bold text-xs uppercase tracking-wider hover:brightness-110 active:scale-95 shadow-md shadow-primary/20 glow-cyan-sm transition-all"
              >
                <span
                  class="material-symbols-outlined text-[18px] font-bold"
                  data-icon="add"
                  >add</span
                >
                <span>+ Tambah Game</span>
              </button>
            </div>
          </div>
          <!-- Tactical HUD Table -->
          <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr
                  class="bg-surface-container-low border-b border-outline-variant text-primary font-mono text-[11px] uppercase tracking-wider"
                >
                  <th class="py-3.5 px-6">Gambar Cover</th>
                  <th class="py-3.5 px-6">Judul Game</th>
                  <th class="py-3.5 px-6">Genre Tags</th>
                  <th class="py-3.5 px-6">Platform</th>
                  <th class="py-3.5 px-6">Rating Steam</th>
                  <th class="py-3.5 px-6 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody
                class="divide-y divide-outline-variant/60 font-body text-xs"
              >
                <!-- Row 1: Elden Ring -->
                <tr
                  class="hover:bg-primary/10 hover:border-l-4 hover:border-primary transition-all duration-150 group"
                >
                  <td class="py-4 px-6">
                    <div
                      class="relative w-14 h-16 rounded-md overflow-hidden border border-outline-variant group-hover:border-primary transition-colors"
                    >
                      <img
                        class="w-full h-full object-cover"
                        data-alt="Dark fantasy gothic cover of Elden Ring featuring an imposing golden rune tree backdrop, armor-clad tarnished warrior, high resolution, dark precision cinematic aesthetic with ambient gold and purple lighting."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC40E1pwTptIR6vsCFK6_ogTFYyA9w77OCPJ_PcFLV6xM3y4odjvgFiD1jn2_2paqOq7iRGVcrLyrZ6CM_BYyd6yc-2rXW325DooX5DYKUOGBRV5Bz85mEB7vIhLIWdoJG9A6-e1KrLxzdna4e9vVtkx3O1-z4vLmsNtlRe8u-21xyXPYtNPiYeyv7_XLnnz-oXyPI85eUp-4Qz4PSh5PnMrMOMakft9mKjl2j-LzOGCD8fxHJ7a8G9"
                      />
                      <div
                        class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition-opacity"
                      ></div>
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <div
                      class="font-headline font-bold text-sm text-white group-hover:text-primary transition-colors"
                    >
                      Elden Ring
                    </div>
                    <span class="font-mono text-[11px] text-primary/80"
                      >AppID: 1245620</span
                    >
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex flex-wrap gap-1.5 font-mono">
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-primary"
                        >RPG</span
                      >
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-on-surface"
                        >Dark Fantasy</span
                      >
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-on-surface"
                        >Open World</span
                      >
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <span
                      class="inline-flex items-center gap-1.5 text-on-surface font-mono text-[11px]"
                    >
                      <span
                        class="material-symbols-outlined text-[16px] text-primary"
                        data-icon="desktop_windows"
                        >desktop_windows</span
                      >
                      PC (Windows)
                    </span>
                  </td>
                  <td class="py-4 px-6">
                    <div
                      class="flex items-center gap-1.5 text-tertiary font-mono font-bold"
                    >
                      <span
                        class="material-symbols-outlined text-[16px]"
                        data-icon="star"
                        data-weight="fill"
                        style="font-variation-settings: &quot;FILL&quot; 1"
                        >star</span
                      >
                      <span>9.4 / 10</span>
                    </div>
                    <span
                      class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider"
                      >Overwhelmingly Positive</span
                    >
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex items-center justify-center gap-2">
                      <button
                        class="p-2 rounded-lg bg-surface-container-high border border-outline-variant text-primary hover:bg-primary/20 hover:border-primary transition-colors"
                        title="Edit Game"
                      >
                        <span
                          class="material-symbols-outlined text-[18px]"
                          data-icon="edit"
                          >edit</span
                        >
                      </button>
                      <button
                        class="p-2 rounded-lg bg-surface-container-high border border-outline-variant text-error hover:bg-error/20 hover:border-error transition-colors"
                        title="Hapus Game"
                      >
                        <span
                          class="material-symbols-outlined text-[18px]"
                          data-icon="delete"
                          >delete</span
                        >
                      </button>
                    </div>
                  </td>
                </tr>
                <!-- Row 2: Cyberpunk 2077 -->
                <tr
                  class="hover:bg-secondary/10 hover:border-l-4 hover:border-secondary transition-all duration-150 group"
                >
                  <td class="py-4 px-6">
                    <div
                      class="relative w-14 h-16 rounded-md overflow-hidden border border-outline-variant group-hover:border-secondary transition-colors"
                    >
                      <img
                        class="w-full h-full object-cover"
                        data-alt="Futuristic neon metropolis game cover of Cyberpunk 2077, yellow and cyan high tech visuals, cyberware mercenary with glowing implants, moody dark atmospheric lighting."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_0M9msUm9Gk3zLe9KzPP7841rynaSkGm7by63oSygo9XEsEAXsqpDFHL45u1vk97fFhbJqFZpNgeKfW1mAftBGtMWR_GIFHihwOZh9w647QVfQNGKz9b6PKMqGE0sNKXgC9i9YoXCgNjWrD2BE-gDZflPZYrss8N7TwPTBhwvDxrkfLYWbF4kfiPK9jfB6M79maky_F0MsNxQBB26dRG0VZ-MNfjraoYwsrhNsP_goZL5t-CY64XE"
                      />
                      <div
                        class="absolute inset-0 bg-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity"
                      ></div>
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <div
                      class="font-headline font-bold text-sm text-white group-hover:text-secondary transition-colors"
                    >
                      Cyberpunk 2077
                    </div>
                    <span class="font-mono text-[11px] text-secondary/80"
                      >AppID: 1091500</span
                    >
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex flex-wrap gap-1.5 font-mono">
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-secondary"
                        >Sci-Fi</span
                      >
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-on-surface"
                        >Action RPG</span
                      >
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-on-surface"
                        >FPS</span
                      >
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <span
                      class="inline-flex items-center gap-1.5 text-on-surface font-mono text-[11px]"
                    >
                      <span
                        class="material-symbols-outlined text-[16px] text-secondary"
                        data-icon="desktop_windows"
                        >desktop_windows</span
                      >
                      PC (Windows, SteamDeck)
                    </span>
                  </td>
                  <td class="py-4 px-6">
                    <div
                      class="flex items-center gap-1.5 text-tertiary font-mono font-bold"
                    >
                      <span
                        class="material-symbols-outlined text-[16px]"
                        data-icon="star"
                        data-weight="fill"
                        style="font-variation-settings: &quot;FILL&quot; 1"
                        >star</span
                      >
                      <span>8.9 / 10</span>
                    </div>
                    <span
                      class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider"
                      >Very Positive</span
                    >
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex items-center justify-center gap-2">
                      <button
                        class="p-2 rounded-lg bg-surface-container-high border border-outline-variant text-primary hover:bg-primary/20 hover:border-primary transition-colors"
                        title="Edit Game"
                      >
                        <span
                          class="material-symbols-outlined text-[18px]"
                          data-icon="edit"
                          >edit</span
                        >
                      </button>
                      <button
                        class="p-2 rounded-lg bg-surface-container-high border border-outline-variant text-error hover:bg-error/20 hover:border-error transition-colors"
                        title="Hapus Game"
                      >
                        <span
                          class="material-symbols-outlined text-[18px]"
                          data-icon="delete"
                          >delete</span
                        >
                      </button>
                    </div>
                  </td>
                </tr>
                <!-- Row 3: Baldur's Gate 3 -->
                <tr
                  class="hover:bg-tertiary/10 hover:border-l-4 hover:border-tertiary transition-all duration-150 group"
                >
                  <td class="py-4 px-6">
                    <div
                      class="relative w-14 h-16 rounded-md overflow-hidden border border-outline-variant group-hover:border-tertiary transition-colors"
                    >
                      <img
                        class="w-full h-full object-cover"
                        data-alt="High fantasy tactical RPG game box cover for Baldurs Gate 3 showcasing heroes casting arcane spells, illithid shadows, vibrant mystical blue and purple ambient lighting."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUDpidjKApTxklFjg0iFvlptRCVJDCYJ4x6l7qrTthF8JcTbg8JHtjjU8lPKUg6_-M9RP4ljdFXXSZettq8Q11mja-JWcQgdvI3ZD65l026Jr3_Gtf7VksVVBYe2ewIm__yGSIl79vzQA5NhUVrp8LkVMf4Yulp3-SYrzjfgbvs6TCUTkvRfn-G8QRbmVeSk-isFnUNK0Gx1fSe7x4_9sJNbGGqKoaaSTnWhOHSMu8p4UHc_YS_MtJ"
                      />
                      <div
                        class="absolute inset-0 bg-tertiary/10 opacity-0 group-hover:opacity-100 transition-opacity"
                      ></div>
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <div
                      class="font-headline font-bold text-sm text-white group-hover:text-tertiary transition-colors"
                    >
                      Baldur's Gate 3
                    </div>
                    <span class="font-mono text-[11px] text-tertiary/80"
                      >AppID: 1086940</span
                    >
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex flex-wrap gap-1.5 font-mono">
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-tertiary"
                        >CRPG</span
                      >
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-on-surface"
                        >Turn-Based</span
                      >
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-on-surface"
                        >Adventure</span
                      >
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <span
                      class="inline-flex items-center gap-1.5 text-on-surface font-mono text-[11px]"
                    >
                      <span
                        class="material-symbols-outlined text-[16px] text-tertiary"
                        data-icon="desktop_windows"
                        >desktop_windows</span
                      >
                      PC (Windows, Mac)
                    </span>
                  </td>
                  <td class="py-4 px-6">
                    <div
                      class="flex items-center gap-1.5 text-tertiary font-mono font-bold"
                    >
                      <span
                        class="material-symbols-outlined text-[16px]"
                        data-icon="star"
                        data-weight="fill"
                        style="font-variation-settings: &quot;FILL&quot; 1"
                        >star</span
                      >
                      <span>9.6 / 10</span>
                    </div>
                    <span
                      class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider"
                      >Overwhelmingly Positive</span
                    >
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex items-center justify-center gap-2">
                      <button
                        class="p-2 rounded-lg bg-surface-container-high border border-outline-variant text-primary hover:bg-primary/20 hover:border-primary transition-colors"
                        title="Edit Game"
                      >
                        <span
                          class="material-symbols-outlined text-[18px]"
                          data-icon="edit"
                          >edit</span
                        >
                      </button>
                      <button
                        class="p-2 rounded-lg bg-surface-container-high border border-outline-variant text-error hover:bg-error/20 hover:border-error transition-colors"
                        title="Hapus Game"
                      >
                        <span
                          class="material-symbols-outlined text-[18px]"
                          data-icon="delete"
                          >delete</span
                        >
                      </button>
                    </div>
                  </td>
                </tr>
                <!-- Row 4: Red Dead Redemption 2 -->
                <tr
                  class="hover:bg-amber-400/10 hover:border-l-4 hover:border-amber-400 transition-all duration-150 group"
                >
                  <td class="py-4 px-6">
                    <div
                      class="relative w-14 h-16 rounded-md overflow-hidden border border-outline-variant group-hover:border-amber-400 transition-colors"
                    >
                      <img
                        class="w-full h-full object-cover"
                        data-alt="Western frontier outlaw action cover for Red Dead Redemption 2, silhouette cowboy against a dramatic crimson sunset, detailed textures, cinematic grit."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDm8kXNhdI_lKc5wbYuYLCRWp1tTLcLwlZVN3kVdyumindc70B_J8tT-VDaC6VmFJDMyOiIVdIZLFmRgPBlzHtHepK2zRLfDCtezABXgwT3bej6Du1PmsxAh7_GRvzfe2t8GjjFqzFr-i8YukRlqpAw7bNFW2ACzRJnieJaGVhXQKpAlLSCOhVMqxjJVonG3VhCuveAoUoOx2YN_CfIjiA-UPUj23rlnW_xMOCCWkCQ77XSzA0RTWXn"
                      />
                      <div
                        class="absolute inset-0 bg-amber-400/10 opacity-0 group-hover:opacity-100 transition-opacity"
                      ></div>
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <div
                      class="font-headline font-bold text-sm text-white group-hover:text-amber-400 transition-colors"
                    >
                      Red Dead Redemption 2
                    </div>
                    <span class="font-mono text-[11px] text-amber-400/80"
                      >AppID: 1174180</span
                    >
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex flex-wrap gap-1.5 font-mono">
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-amber-400"
                        >Action</span
                      >
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-on-surface"
                        >Open World</span
                      >
                      <span
                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high border border-outline-variant text-on-surface"
                        >Story Rich</span
                      >
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <span
                      class="inline-flex items-center gap-1.5 text-on-surface font-mono text-[11px]"
                    >
                      <span
                        class="material-symbols-outlined text-[16px] text-amber-400"
                        data-icon="desktop_windows"
                        >desktop_windows</span
                      >
                      PC (Windows)
                    </span>
                  </td>
                  <td class="py-4 px-6">
                    <div
                      class="flex items-center gap-1.5 text-tertiary font-mono font-bold"
                    >
                      <span
                        class="material-symbols-outlined text-[16px]"
                        data-icon="star"
                        data-weight="fill"
                        style="font-variation-settings: &quot;FILL&quot; 1"
                        >star</span
                      >
                      <span>9.3 / 10</span>
                    </div>
                    <span
                      class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider"
                      >Overwhelmingly Positive</span
                    >
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex items-center justify-center gap-2">
                      <button
                        class="p-2 rounded-lg bg-surface-container-high border border-outline-variant text-primary hover:bg-primary/20 hover:border-primary transition-colors"
                        title="Edit Game"
                      >
                        <span
                          class="material-symbols-outlined text-[18px]"
                          data-icon="edit"
                          >edit</span
                        >
                      </button>
                      <button
                        class="p-2 rounded-lg bg-surface-container-high border border-outline-variant text-error hover:bg-error/20 hover:border-error transition-colors"
                        title="Hapus Game"
                      >
                        <span
                          class="material-symbols-outlined text-[18px]"
                          data-icon="delete"
                          >delete</span
                        >
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Tactical Pagination Bar -->
          <div
            class="p-4 bg-surface-container-low border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-3 font-mono text-xs"
          >
            <span class="text-on-surface-variant">
              Halaman <span class="text-primary font-bold">1</span> dari
              <span class="text-white font-bold">1.056</span> (Menampilkan 4
              dari 52.840 game)
            </span>
            <div class="flex items-center gap-1.5">
              <button
                class="px-3 py-1.5 rounded bg-surface-container border border-outline-variant text-on-surface-variant hover:text-white disabled:opacity-40"
                disabled=""
              >
                Sebelumnya
              </button>
              <button
                class="px-3 py-1.5 rounded bg-primary text-black font-bold glow-cyan-sm"
              >
                1
              </button>
              <button
                class="px-3 py-1.5 rounded bg-surface-container border border-outline-variant text-on-surface-variant hover:text-primary"
              >
                2
              </button>
              <button
                class="px-3 py-1.5 rounded bg-surface-container border border-outline-variant text-on-surface-variant hover:text-primary"
              >
                3
              </button>
              <span class="px-1 text-on-surface-variant">...</span>
              <button
                class="px-3 py-1.5 rounded bg-surface-container border border-outline-variant text-on-surface-variant hover:text-primary"
              >
                1056
              </button>
              <button
                class="px-3 py-1.5 rounded bg-surface-container border border-outline-variant text-on-surface-variant hover:text-white"
              >
                Selanjutnya
              </button>
            </div>
          </div>
        </section>
        </div>

        <!-- ======================================================== -->
        <!-- TAB 3: GENRE (KLASIFIKASI & TAKSONOMI 32 GENRE STEAM)     -->
        <!-- ======================================================== -->
        <div id="tab-content-genre" class="admin-tab-pane hidden space-y-6">
          <section class="bg-surface-container/90 rounded-xl border border-outline-variant shadow-2xl overflow-hidden relative">
            <div class="h-0.5 w-full bg-gradient-to-r from-secondary via-primary to-tertiary"></div>
            <!-- Header Genre Section -->
            <div class="p-6 border-b border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-4">
              <div>
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-secondary text-[24px]">category</span>
                  <h3 class="font-headline font-bold text-lg text-white uppercase tracking-wider">
                    Manajemen &amp; Taksonomi Genre Steam
                  </h3>
                  <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-secondary/20 text-secondary border border-secondary/40">
                    32 KATEGORI TERSTANDARISASI
                  </span>
                </div>
                <p class="font-mono text-xs text-on-surface-variant mt-1">
                  Atribut multi-label dataset Steam Kaggle yang digunakan sebagai bobot fitur ekstraksi vektor TF-IDF
                </p>
              </div>

              <!-- Quick Action & Search -->
              <div class="flex flex-wrap items-center gap-3">
                <div class="relative min-w-[220px]">
                  <span class="material-symbols-outlined absolute left-3 top-2.5 text-secondary/70 text-[18px]">search</span>
                  <input
                    id="search-genre-input"
                    oninput="filterGenreAdmin(this.value)"
                    class="w-full pl-9 pr-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs placeholder:text-on-surface-variant focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary transition-all"
                    placeholder="Cari kategori genre..."
                    type="text"
                  />
                </div>
                <button
                  type="button"
                  onclick="openModalGenre()"
                  class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-secondary to-purple-500 text-white rounded-lg font-headline font-bold text-xs uppercase tracking-wider hover:brightness-110 active:scale-95 shadow-md shadow-secondary/20 glow-purple transition-all">
                  <span class="material-symbols-outlined text-[18px] font-bold">add</span>
                  <span>+ Tambah Genre</span>
                </button>
              </div>
            </div>

            <!-- KPI Metric Summary Row for Genre -->
            <div class="p-6 grid grid-cols-1 sm:grid-cols-3 gap-4 border-b border-outline-variant bg-surface-container-low/50">
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">Total Kategori</p>
                  <p class="text-2xl font-headline font-extrabold text-white mt-1">32 Genre</p>
                  <p class="text-[10px] font-mono text-secondary mt-0.5">100% Ter-vektorisasi</p>
                </div>
                <div class="p-3 rounded-lg bg-secondary/15 text-secondary border border-secondary/30">
                  <span class="material-symbols-outlined text-2xl">category</span>
                </div>
              </div>
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">Dominansi Multi-Label</p>
                  <p class="text-2xl font-headline font-extrabold text-primary mt-1">Action &bull; RPG</p>
                  <p class="text-[10px] font-mono text-primary/80 mt-0.5">53.8% dari total 52K game</p>
                </div>
                <div class="p-3 rounded-lg bg-primary/15 text-primary border border-primary/30">
                  <span class="material-symbols-outlined text-2xl">insights</span>
                </div>
              </div>
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">Bobot TF-IDF Matrix</p>
                  <p class="text-2xl font-headline font-extrabold text-tertiary mt-1">1.0 (Normal)</p>
                  <p class="text-[10px] font-mono text-tertiary mt-0.5">Cosine Sim Range: 0.0 - 1.0</p>
                </div>
                <div class="p-3 rounded-lg bg-tertiary/15 text-tertiary border border-tertiary/30">
                  <span class="material-symbols-outlined text-2xl">tune</span>
                </div>
              </div>
            </div>

            <!-- Grid 32 Standarisasi Genre Steam -->
            <div class="p-6">
              <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-mono font-bold text-white uppercase tracking-wider flex items-center gap-2">
                  <span class="w-2 h-2 rounded-full bg-secondary"></span>
                  Daftar 32 Standarisasi Kategori Genre Steam
                </span>
                <span class="text-[11px] font-mono text-on-surface-variant" id="genre-count-label">Menampilkan 32 Genre</span>
              </div>

              @php
                $masterGenres = [
                  ['name' => 'Action', 'icon' => 'swords', 'count' => '28.420', 'tag' => 'Core', 'color' => 'primary'],
                  ['name' => 'RPG', 'icon' => 'auto_awesome', 'count' => '19.850', 'tag' => 'Core', 'color' => 'primary'],
                  ['name' => 'Open World', 'icon' => 'public', 'count' => '14.210', 'tag' => 'Setting', 'color' => 'secondary'],
                  ['name' => 'Souls-like', 'icon' => 'skull', 'count' => '3.820', 'tag' => 'Sub-genre', 'color' => 'tertiary'],
                  ['name' => 'Strategy', 'icon' => 'chess', 'count' => '11.400', 'tag' => 'Core', 'color' => 'primary'],
                  ['name' => 'Story Rich', 'icon' => 'menu_book', 'count' => '16.730', 'tag' => 'Narrative', 'color' => 'secondary'],
                  ['name' => 'Roguelike', 'icon' => 'casino', 'count' => '6.940', 'tag' => 'Mechanic', 'color' => 'tertiary'],
                  ['name' => 'Indie', 'icon' => 'interests', 'count' => '34.200', 'tag' => 'Production', 'color' => 'primary'],
                  ['name' => 'Simulation', 'icon' => 'precision_manufacturing', 'count' => '9.820', 'tag' => 'Core', 'color' => 'secondary'],
                  ['name' => 'Shooter', 'icon' => 'crosshair', 'count' => '13.150', 'tag' => 'Core', 'color' => 'primary'],
                  ['name' => 'Horror', 'icon' => 'ghost', 'count' => '7.450', 'tag' => 'Theme', 'color' => 'tertiary'],
                  ['name' => 'Puzzle', 'icon' => 'extension', 'count' => '8.600', 'tag' => 'Mechanic', 'color' => 'secondary'],
                  ['name' => 'Adventure', 'icon' => 'explore', 'count' => '21.300', 'tag' => 'Core', 'color' => 'primary'],
                  ['name' => 'Survival', 'icon' => 'hiking', 'count' => '8.920', 'tag' => 'Theme', 'color' => 'tertiary'],
                  ['name' => 'Multiplayer', 'icon' => 'groups', 'count' => '18.450', 'tag' => 'Mode', 'color' => 'primary'],
                  ['name' => 'Sci-Fi', 'icon' => 'rocket_launch', 'count' => '12.870', 'tag' => 'Setting', 'color' => 'secondary'],
                  ['name' => 'Fantasy', 'icon' => 'flare', 'count' => '15.900', 'tag' => 'Setting', 'color' => 'secondary'],
                  ['name' => 'Cyberpunk', 'icon' => 'memory', 'count' => '4.230', 'tag' => 'Setting', 'color' => 'primary'],
                  ['name' => 'Turn-Based', 'icon' => 'schedule', 'count' => '7.120', 'tag' => 'Combat', 'color' => 'tertiary'],
                  ['name' => 'Platformer', 'icon' => 'terrain', 'count' => '9.340', 'tag' => 'Mechanic', 'color' => 'secondary'],
                  ['name' => 'Stealth', 'icon' => 'visibility_off', 'count' => '4.890', 'tag' => 'Mechanic', 'color' => 'tertiary'],
                  ['name' => 'Sandbox', 'icon' => 'construction', 'count' => '6.450', 'tag' => 'Mode', 'color' => 'secondary'],
                  ['name' => 'Anime', 'icon' => 'palette', 'count' => '9.100', 'tag' => 'Visual', 'color' => 'tertiary'],
                  ['name' => 'VR', 'icon' => 'view_in_ar', 'count' => '3.120', 'tag' => 'Device', 'color' => 'secondary'],
                  ['name' => 'Sports', 'icon' => 'sports_soccer', 'count' => '4.500', 'tag' => 'Core', 'color' => 'primary'],
                  ['name' => 'Racing', 'icon' => 'sports_score', 'count' => '5.200', 'tag' => 'Core', 'color' => 'secondary'],
                  ['name' => 'Casual', 'icon' => 'coffee', 'count' => '17.800', 'tag' => 'Audience', 'color' => 'primary'],
                  ['name' => 'Visual Novel', 'icon' => 'import_contacts', 'count' => '5.980', 'tag' => 'Narrative', 'color' => 'tertiary'],
                  ['name' => 'Tactical', 'icon' => 'military_tech', 'count' => '7.820', 'tag' => 'Sub-genre', 'color' => 'secondary'],
                  ['name' => 'Hack and Slash', 'icon' => 'flash_on', 'count' => '4.910', 'tag' => 'Combat', 'color' => 'primary'],
                  ['name' => 'Card Game', 'icon' => 'playing_cards', 'count' => '3.670', 'tag' => 'Mechanic', 'color' => 'tertiary'],
                  ['name' => 'Mystery', 'icon' => 'psychology', 'count' => '6.150', 'tag' => 'Theme', 'color' => 'secondary'],
                ];
              @endphp

              <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3.5" id="genre-cards-grid">
                @foreach($masterGenres as $g)
                  <div
                    data-genre-item="{{ strtolower($g['name']) }}"
                    class="genre-card p-3.5 rounded-xl bg-surface-container-low border border-outline-variant hover:border-secondary/80 transition-all duration-200 group flex flex-col justify-between hover:shadow-lg hover:shadow-purple-500/10">
                    <div class="flex items-center justify-between mb-2">
                      <div class="w-8 h-8 rounded-lg bg-surface-container border border-outline-variant flex items-center justify-center text-secondary group-hover:scale-110 group-hover:border-secondary transition-all">
                        <span class="material-symbols-outlined text-[18px]">{{ $g['icon'] }}</span>
                      </div>
                      <span class="text-[9px] font-mono px-1.5 py-0.2 rounded bg-surface-container text-on-surface-variant border border-outline-variant uppercase">
                        {{ $g['tag'] }}
                      </span>
                    </div>
                    <div>
                      <h4 class="font-headline font-bold text-sm text-white group-hover:text-secondary transition-colors">{{ $g['name'] }}</h4>
                      <p class="font-mono text-[11px] text-on-surface-variant mt-0.5">{{ $g['count'] }} Game</p>
                    </div>
                    <div class="mt-3 pt-2 border-t border-outline-variant/60 flex items-center justify-between text-[10px] font-mono text-secondary">
                      <span>Bobot: 1.0</span>
                      <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </section>
        </div>

        <!-- ======================================================== -->
        <!-- TAB 4: IMPORT DATASET (PIPELINE CSV INGESTION & SYNC)   -->
        <!-- ======================================================== -->
        <div id="tab-content-import" class="admin-tab-pane hidden space-y-6">
        <!-- ========================================== -->
        <!-- 4. SECTION IMPORT DATASET (KAGGLE STEAM CSV)-->
        <!-- ========================================== -->
        <section
          class="bg-surface-container/90 rounded-xl border border-outline-variant p-6 shadow-2xl space-y-6 relative overflow-hidden"
          id="import"
        >
          <div class="flex items-center justify-between">
            <div>
              <div class="flex items-center gap-2">
                <span
                  class="material-symbols-outlined text-primary text-[22px]"
                  data-icon="cloud_upload"
                  >cloud_upload</span
                >
                <h3
                  class="font-headline font-bold text-lg text-white uppercase tracking-wider"
                >
                  Import Dataset (Kaggle Steam CSV)
                </h3>
              </div>
              <p class="font-mono text-xs text-on-surface-variant mt-0.5">
                Unggah batch data CSV dari Kaggle untuk memutakhirkan model
                ekstraksi fitur TF-IDF dan kalkulasi Cosine Similarity.
              </p>
            </div>
            <div
              class="hidden sm:flex items-center gap-1.5 px-3 py-1 rounded bg-surface-container-high border border-outline-variant font-mono text-[11px] text-tertiary"
            >
              <span
                class="w-2 h-2 rounded-full bg-tertiary animate-pulse"
              ></span>
              PIPELINE ACTIVE
            </div>
          </div>
          <!-- Animated Cyber Dashed Drag-and-Drop Zone with Matrix Scan Effect -->
          <div
            class="relative overflow-hidden border-2 border-dashed border-primary/70 hover:border-primary rounded-xl p-8 bg-surface-container-low/80 flex flex-col items-center justify-center text-center transition-all cursor-pointer group shadow-inner"
          >
            <!-- Matrix Scanline Visual Effect -->
            <div
              class="absolute inset-0 pointer-events-none opacity-20 group-hover:opacity-40 transition-opacity"
            >
              <div
                class="w-full h-1 bg-gradient-to-r from-transparent via-primary to-transparent scanner-line"
              ></div>
            </div>
            <div
              class="w-16 h-16 rounded-full bg-primary/10 border border-primary/40 flex items-center justify-center text-primary group-hover:scale-110 glow-cyan-sm transition-all"
            >
              <span
                class="material-symbols-outlined text-[34px]"
                data-icon="upload_file"
                >upload_file</span
              >
            </div>
            <div class="mt-4">
              <p
                class="font-headline font-bold text-base text-white tracking-wide"
              >
                Tarik &amp; Lepaskan File CSV Kaggle di Sini
              </p>
              <p class="font-mono text-xs text-on-surface-variant mt-1">
                Mendukung format file
                <span class="text-primary font-bold">.csv</span> hingga ukuran
                maksimal 150 MB (Encoding UTF-8)
              </p>
            </div>
            <div class="mt-4">
              <button
                class="px-5 py-2.5 bg-surface-container-high border border-primary/50 rounded-lg text-primary font-headline font-bold text-xs uppercase tracking-wider hover:bg-primary hover:text-black transition-all glow-cyan-sm"
                type="button"
              >
                Pilih Berkas dari Komputer
              </button>
            </div>
            <div
              class="mt-3 px-3 py-1 rounded bg-surface-container-high border border-outline-variant font-mono text-xs text-on-surface-variant"
            >
              File terpilih:
              <strong class="text-tertiary"
                >kaggle_steam_games_2024_full.csv</strong
              >
              <span class="text-primary">(84.2 MB)</span>
            </div>
          </div>
          <!-- Preview Table: 5 Rows of CSV -->
          <div>
            <div
              class="flex items-center justify-between mb-3 font-mono text-xs"
            >
              <span
                class="font-headline font-bold text-white flex items-center gap-2"
              >
                <span
                  class="material-symbols-outlined text-primary text-[18px]"
                  data-icon="table_view"
                  >table_view</span
                >
                Pratinjau 5 Baris Pertama CSV
              </span>
              <span class="text-tertiary font-bold flex items-center gap-1.5">
                <span
                  class="material-symbols-outlined text-[16px]"
                  data-icon="check_circle"
                  >check_circle</span
                >
                Format CSV Valid (5 dari 52.840 baris terdeteksi)
              </span>
            </div>
            <div
              class="overflow-x-auto border border-outline-variant rounded-lg custom-scrollbar"
            >
              <table class="w-full text-left border-collapse font-body text-xs">
                <thead
                  class="bg-surface-container-high text-primary font-mono text-[11px] uppercase tracking-wider"
                >
                  <tr class="border-b border-outline-variant">
                    <th class="py-2.5 px-4">app_id</th>
                    <th class="py-2.5 px-4">name</th>
                    <th class="py-2.5 px-4">release_date</th>
                    <th class="py-2.5 px-4">genres</th>
                    <th class="py-2.5 px-4">description</th>
                  </tr>
                </thead>
                <tbody
                  class="divide-y divide-outline-variant/50 text-on-surface bg-surface-container-low/90 font-mono text-xs"
                >
                  <tr class="hover:bg-primary/5 transition-colors">
                    <td class="py-2.5 px-4 text-primary font-bold">1091500</td>
                    <td
                      class="py-2.5 px-4 font-headline font-semibold text-white"
                    >
                      Cyberpunk 2077
                    </td>
                    <td class="py-2.5 px-4 text-on-surface-variant">
                      2020-12-10
                    </td>
                    <td class="py-2.5 px-4">
                      <span
                        class="px-2 py-0.5 rounded bg-surface-container border border-outline-variant text-[10px] text-secondary"
                        >RPG, Open World</span
                      >
                    </td>
                    <td
                      class="py-2.5 px-4 text-on-surface-variant truncate max-w-xs font-body"
                    >
                      An open-world, action-adventure story set in Night City...
                    </td>
                  </tr>
                  <tr class="hover:bg-primary/5 transition-colors">
                    <td class="py-2.5 px-4 text-primary font-bold">1245620</td>
                    <td
                      class="py-2.5 px-4 font-headline font-semibold text-white"
                    >
                      Elden Ring
                    </td>
                    <td class="py-2.5 px-4 text-on-surface-variant">
                      2022-02-25
                    </td>
                    <td class="py-2.5 px-4">
                      <span
                        class="px-2 py-0.5 rounded bg-surface-container border border-outline-variant text-[10px] text-primary"
                        >Action RPG, Dark Fantasy</span
                      >
                    </td>
                    <td
                      class="py-2.5 px-4 text-on-surface-variant truncate max-w-xs font-body"
                    >
                      A fantasy action-RPG adventure through the Lands
                      Between...
                    </td>
                  </tr>
                  <tr class="hover:bg-primary/5 transition-colors">
                    <td class="py-2.5 px-4 text-primary font-bold">1086940</td>
                    <td
                      class="py-2.5 px-4 font-headline font-semibold text-white"
                    >
                      Baldur's Gate 3
                    </td>
                    <td class="py-2.5 px-4 text-on-surface-variant">
                      2023-08-03
                    </td>
                    <td class="py-2.5 px-4">
                      <span
                        class="px-2 py-0.5 rounded bg-surface-container border border-outline-variant text-[10px] text-tertiary"
                        >Strategy, CRPG</span
                      >
                    </td>
                    <td
                      class="py-2.5 px-4 text-on-surface-variant truncate max-w-xs font-body"
                    >
                      Gather your party and return to the Forgotten Realms...
                    </td>
                  </tr>
                  <tr class="hover:bg-primary/5 transition-colors">
                    <td class="py-2.5 px-4 text-primary font-bold">1174180</td>
                    <td
                      class="py-2.5 px-4 font-headline font-semibold text-white"
                    >
                      Red Dead Redemption 2
                    </td>
                    <td class="py-2.5 px-4 text-on-surface-variant">
                      2019-12-05
                    </td>
                    <td class="py-2.5 px-4">
                      <span
                        class="px-2 py-0.5 rounded bg-surface-container border border-outline-variant text-[10px] text-amber-400"
                        >Adventure, Western</span
                      >
                    </td>
                    <td
                      class="py-2.5 px-4 text-on-surface-variant truncate max-w-xs font-body"
                    >
                      Arthur Morgan and the Van der Linde gang are outlaws on
                      the run...
                    </td>
                  </tr>
                  <tr class="hover:bg-primary/5 transition-colors">
                    <td class="py-2.5 px-4 text-primary font-bold">730</td>
                    <td
                      class="py-2.5 px-4 font-headline font-semibold text-white"
                    >
                      Counter-Strike 2
                    </td>
                    <td class="py-2.5 px-4 text-on-surface-variant">
                      2012-08-21
                    </td>
                    <td class="py-2.5 px-4">
                      <span
                        class="px-2 py-0.5 rounded bg-surface-container border border-outline-variant text-[10px] text-pink-400"
                        >Shooter, Tactical FPS</span
                      >
                    </td>
                    <td
                      class="py-2.5 px-4 text-on-surface-variant truncate max-w-xs font-body"
                    >
                      For over two decades, Counter-Strike has offered an elite
                      competitive experience...
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- Tactical Column Mapping HUD -->
          <div
            class="bg-surface-container-low p-5 rounded-lg border border-outline-variant"
          >
            <h4
              class="font-headline font-bold text-sm text-white mb-3 flex items-center gap-2"
            >
              <span
                class="material-symbols-outlined text-secondary text-[20px]"
                data-icon="tune"
                >tune</span
              >
              Pemetaan Kolom (Header CSV → Skema Database MySQL)
            </h4>
            <div
              class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 font-mono text-xs"
            >
              <div class="space-y-1">
                <label class="text-on-surface-variant"
                  >Header CSV: app_id</label
                >
                <div class="flex items-center gap-2">
                  <span
                    class="material-symbols-outlined text-primary text-[18px]"
                    data-icon="arrow_forward"
                    >arrow_forward</span
                  >
                  <select
                    class="w-full px-3 py-1.5 bg-surface-container border border-outline-variant rounded text-xs text-white focus:border-primary focus:outline-none"
                  >
                    <option selected="">db_games.steam_app_id</option>
                    <option>Abaikan Kolom</option>
                  </select>
                </div>
              </div>
              <div class="space-y-1">
                <label class="text-on-surface-variant">Header CSV: name</label>
                <div class="flex items-center gap-2">
                  <span
                    class="material-symbols-outlined text-primary text-[18px]"
                    data-icon="arrow_forward"
                    >arrow_forward</span
                  >
                  <select
                    class="w-full px-3 py-1.5 bg-surface-container border border-outline-variant rounded text-xs text-white focus:border-primary focus:outline-none"
                  >
                    <option selected="">db_games.title</option>
                    <option>Abaikan Kolom</option>
                  </select>
                </div>
              </div>
              <div class="space-y-1">
                <label class="text-on-surface-variant"
                  >Header CSV: genres</label
                >
                <div class="flex items-center gap-2">
                  <span
                    class="material-symbols-outlined text-primary text-[18px]"
                    data-icon="arrow_forward"
                    >arrow_forward</span
                  >
                  <select
                    class="w-full px-3 py-1.5 bg-surface-container border border-outline-variant rounded text-xs text-white focus:border-primary focus:outline-none"
                  >
                    <option selected="">db_games.genre_vector</option>
                    <option>Abaikan Kolom</option>
                  </select>
                </div>
              </div>
              <div class="space-y-1">
                <label class="text-on-surface-variant"
                  >Header CSV: description</label
                >
                <div class="flex items-center gap-2">
                  <span
                    class="material-symbols-outlined text-primary text-[18px]"
                    data-icon="arrow_forward"
                    >arrow_forward</span
                  >
                  <select
                    class="w-full px-3 py-1.5 bg-surface-container border border-outline-variant rounded text-xs text-white focus:border-primary focus:outline-none"
                  >
                    <option selected="">db_games.overview_text</option>
                    <option>Abaikan Kolom</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- Execution Panel & Glowing Vector Sync Progress Bar (68% Selesai) -->
          <div
            class="pt-2 border-t border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-6"
          >
            <div class="flex-1 space-y-2">
              <div class="flex items-center justify-between font-mono text-xs">
                <span class="text-white flex items-center gap-2">
                  <span
                    class="material-symbols-outlined text-primary animate-spin text-[18px]"
                    data-icon="sync"
                    >sync</span
                  >
                  <span>Sinkronisasi TF-IDF Vektor...</span>
                </span>
                <span class="text-primary font-bold glow-cyan-sm"
                  >68% Selesai (35.931 / 52.840 baris)</span
                >
              </div>
              <!-- Glowing Vector Synchronization Progress Bar -->
              <div
                class="w-full h-3 rounded-full bg-surface-container-high border border-outline-variant p-[1px] overflow-hidden relative shadow-inner"
              >
                <div
                  class="h-full bg-gradient-to-r from-cyan-500 via-primary to-purple-600 rounded-full transition-all duration-300 relative overflow-hidden glow-cyan-sm"
                  style="width: 68%"
                >
                  <div class="absolute inset-0 bg-white/30 animate-pulse"></div>
                </div>
              </div>
              <span class="font-mono text-[11px] text-on-surface-variant block"
                >Estimasi sisa waktu pemrosesan: ~42 detik</span
              >
            </div>
            <div>
              <button
                class="px-6 py-3 rounded-lg bg-gradient-to-r from-primary via-cyan-400 to-purple-500 text-black font-headline font-extrabold text-xs tracking-wider uppercase shadow-lg shadow-primary/30 glow-cyan hover:brightness-110 active:scale-95 transition-all flex items-center gap-2"
              >
                <span
                  class="material-symbols-outlined text-[20px] font-bold"
                  data-icon="play_arrow"
                  >play_arrow</span
                >
                <span>Proses Import Dataset</span>
              </button>
            </div>
          </div>
        </section>
        </div>

        <!-- ======================================================== -->
        <!-- TAB 5: PENGGUNA (KONTROL AKSES & MANAJEMEN AKUN)          -->
        <!-- ======================================================== -->
        <div id="tab-content-pengguna" class="admin-tab-pane hidden space-y-6">
          <section class="bg-surface-container/90 rounded-xl border border-outline-variant shadow-2xl overflow-hidden relative">
            <div class="h-0.5 w-full bg-gradient-to-r from-primary via-tertiary to-secondary"></div>
            <!-- Header Pengguna -->
            <div class="p-6 border-b border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-4">
              <div>
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-primary text-[24px]">group</span>
                  <h3 class="font-headline font-bold text-lg text-white uppercase tracking-wider">
                    Manajemen Akun Pengguna &amp; Akses
                  </h3>
                  <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-primary/20 text-primary border border-primary/40">
                    {{ $totalUsers ?? 4 }} AKUN TERDAFTAR
                  </span>
                </div>
                <p class="font-mono text-xs text-on-surface-variant mt-1">
                  Kontrol otorisasi akun pengguna, role SuperAdmin, dan hak akses dashboard gamer
                </p>
              </div>

              <!-- Controls: Search & Filter User -->
              <div class="flex flex-wrap items-center gap-3">
                <div class="relative min-w-[240px]">
                  <span class="material-symbols-outlined absolute left-3 top-2.5 text-primary/70 text-[18px]">search</span>
                  <input
                    id="search-user-input"
                    oninput="filterUserAdmin(this.value)"
                    class="w-full pl-9 pr-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs placeholder:text-on-surface-variant focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all"
                    placeholder="Cari nama atau email..."
                    type="text"
                  />
                </div>
                <select
                  id="filter-user-role"
                  onchange="filterUserRoleAdmin(this.value)"
                  class="px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs focus:outline-none focus:border-primary cursor-pointer">
                  <option value="all">Semua Role</option>
                  <option value="admin">Admin ML</option>
                  <option value="user">Gamer (User)</option>
                </select>
                <button
                  type="button"
                  onclick="openModalUser()"
                  class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-primary to-cyan-400 text-black rounded-lg font-headline font-bold text-xs uppercase tracking-wider hover:brightness-110 active:scale-95 shadow-md shadow-primary/20 glow-cyan-sm transition-all">
                  <span class="material-symbols-outlined text-[18px] font-bold">person_add</span>
                  <span>+ Tambah Akun</span>
                </button>
              </div>
            </div>

            <!-- KPI Metric Summary Row for Users -->
            <div class="p-6 grid grid-cols-1 sm:grid-cols-3 gap-4 border-b border-outline-variant bg-surface-container-low/50">
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">Total Akun</p>
                  <p class="text-2xl font-headline font-extrabold text-white mt-1">{{ $totalUsers ?? 4 }} User</p>
                  <p class="text-[10px] font-mono text-primary mt-0.5">Basis Database MySQL</p>
                </div>
                <div class="p-3 rounded-lg bg-primary/15 text-primary border border-primary/30">
                  <span class="material-symbols-outlined text-2xl">manage_accounts</span>
                </div>
              </div>
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">SuperAdmin</p>
                  <p class="text-2xl font-headline font-extrabold text-cyan-400 mt-1">{{ $totalAdmin ?? 1 }} Akun</p>
                  <p class="text-[10px] font-mono text-cyan-400/80 mt-0.5">Akses Penuh Pipeline ML</p>
                </div>
                <div class="p-3 rounded-lg bg-cyan-500/15 text-cyan-400 border border-cyan-500/30">
                  <span class="material-symbols-outlined text-2xl">shield_person</span>
                </div>
              </div>
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">Gamer Terdaftar</p>
                  <p class="text-2xl font-headline font-extrabold text-secondary mt-1">{{ $totalGamer ?? 3 }} User</p>
                  <p class="text-[10px] font-mono text-secondary mt-0.5">Portal Rekomendasi Personal</p>
                </div>
                <div class="p-3 rounded-lg bg-secondary/15 text-secondary border border-secondary/30">
                  <span class="material-symbols-outlined text-2xl">sports_esports</span>
                </div>
              </div>
            </div>

            <!-- Tabel Data Pengguna -->
            <div class="overflow-x-auto custom-scrollbar">
              <table class="w-full text-left border-collapse" id="admin-users-table">
                <thead>
                  <tr class="border-b border-outline-variant bg-surface-container-high/40 font-mono text-[11px] text-on-surface-variant uppercase tracking-wider">
                    <th class="py-3 px-6">Pengguna</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Role Akses</th>
                    <th class="py-3 px-4">Status Akun</th>
                    <th class="py-3 px-4">Terdaftar Sejak</th>
                    <th class="py-3 px-6 text-right">Aksi</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/60 font-mono text-xs">
                  @forelse($users ?? [] as $user)
                    <tr class="hover:bg-primary/5 transition-colors user-table-row" data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}" data-role="{{ $user->role }}">
                      <td class="py-3.5 px-6">
                        <div class="flex items-center gap-3">
                          <div class="w-9 h-9 rounded-lg {{ $user->isAdmin() ? 'bg-gradient-to-tr from-cyan-600 to-primary text-black' : 'bg-gradient-to-tr from-purple-800 to-secondary text-white' }} flex items-center justify-center font-headline font-bold text-xs shadow-md">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                          </div>
                          <div>
                            <div class="font-headline font-bold text-white text-sm flex items-center gap-1.5">
                              <span>{{ $user->name }}</span>
                              @if(auth()->check() && auth()->id() === $user->id)
                                <span class="text-[9px] px-1.5 py-0.2 rounded bg-tertiary/20 text-tertiary border border-tertiary/30">ANDA</span>
                              @endif
                            </div>
                            <span class="text-[10px] text-on-surface-variant">ID: #USR-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</span>
                          </div>
                        </div>
                      </td>
                      <td class="py-3.5 px-4 text-on-surface">
                        <span class="text-white font-medium">{{ $user->email }}</span>
                      </td>
                      <td class="py-3.5 px-4">
                        @if($user->isAdmin())
                          <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-primary/15 border border-primary/40 text-primary text-[11px] font-bold shadow-sm glow-cyan-sm">
                            <span class="material-symbols-outlined text-[14px]">shield</span>
                            <span>ADMIN ML</span>
                          </span>
                        @else
                          <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-secondary/15 border border-secondary/40 text-secondary text-[11px] font-bold">
                            <span class="material-symbols-outlined text-[14px]">person</span>
                            <span>GAMER</span>
                          </span>
                        @endif
                      </td>
                      <td class="py-3.5 px-4">
                        <span class="inline-flex items-center gap-1.5 text-tertiary text-xs font-semibold">
                          <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
                          <span>Aktif / Terverifikasi</span>
                        </span>
                      </td>
                      <td class="py-3.5 px-4 text-on-surface-variant text-[11px]">
                        {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '14 Okt 2026' }}
                      </td>
                      <td class="py-3.5 px-6 text-right">
                        <div class="inline-flex items-center gap-1.5">
                          <button
                            type="button"
                            onclick="alert('Fitur edit role pengguna {{ $user->name }} dibuka.')"
                            class="p-1.5 rounded hover:bg-surface-container text-on-surface-variant hover:text-primary transition-colors"
                            title="Edit Akses">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                          </button>
                          <button
                            type="button"
                            onclick="alert('Kirim reset tautan password ke {{ $user->email }}')"
                            class="p-1.5 rounded hover:bg-surface-container text-on-surface-variant hover:text-secondary transition-colors"
                            title="Reset Password">
                            <span class="material-symbols-outlined text-[18px]">lock_reset</span>
                          </button>
                          @if(auth()->id() !== $user->id)
                            <button
                              type="button"
                              onclick="if(confirm('Hapus pengguna {{ $user->name }}?')) alert('Pengguna berhasil dinonaktifkan.');"
                              class="p-1.5 rounded hover:bg-error-container/30 text-on-surface-variant hover:text-error transition-colors"
                              title="Hapus Pengguna">
                              <span class="material-symbols-outlined text-[18px]">delete</span>
                            </button>
                          @endif
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="py-8 text-center text-on-surface-variant">
                        Belum ada data pengguna yang terdaftar.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <!-- Footer Pagination User -->
            <div class="p-4 border-t border-outline-variant flex items-center justify-between text-xs font-mono text-on-surface-variant">
              <span>Menampilkan {{ count($users) }} dari {{ $totalUsers ?? 4 }} akun pengguna</span>
              <div class="flex items-center gap-1.5">
                <button class="px-2.5 py-1 rounded bg-surface-container border border-outline-variant text-on-surface-variant hover:text-white" disabled>Sebelumnya</button>
                <button class="px-2.5 py-1 rounded bg-primary text-black font-bold">1</button>
                <button class="px-2.5 py-1 rounded bg-surface-container border border-outline-variant text-on-surface-variant hover:text-white" disabled>Selanjutnya</button>
              </div>
            </div>
          </section>
        </div>

        <!-- ======================================================== -->
        <!-- TAB 6: BANTUAN (TERMINAL & DOKUMENTASI SISTEM ML)         -->
        <!-- ======================================================== -->
        <div id="tab-content-bantuan" class="admin-tab-pane hidden space-y-6">
          <section class="bg-surface-container/90 rounded-xl border border-outline-variant p-6 shadow-2xl space-y-6 relative overflow-hidden">
            <div class="h-0.5 w-full bg-gradient-to-r from-primary via-secondary to-tertiary"></div>
            <div>
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[24px]">terminal</span>
                <h3 class="font-headline font-bold text-lg text-white uppercase tracking-wider">
                  Terminal Bantuan &amp; Dokumentasi Algoritma
                </h3>
              </div>
              <p class="font-mono text-xs text-on-surface-variant mt-1">
                Panduan komprehensif arsitektur Content-Based Filtering, ekstraksi TF-IDF, dan struktur dataset Steam
              </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Panduan 1: Arsitektur Pipeline -->
              <div class="p-5 rounded-xl bg-surface-container-low border border-outline-variant space-y-3">
                <div class="flex items-center gap-2 text-primary font-headline font-bold text-sm uppercase">
                  <span class="material-symbols-outlined text-lg">schema</span>
                  <span>Alur Pipeline Rekomendasi Game</span>
                </div>
                <p class="font-body text-xs text-on-surface-variant leading-relaxed">
                  Sistem rekomendasi <strong>GameMatch</strong> bekerja murni berbasis <strong>Content-Based Filtering</strong>:
                </p>
                <ol class="list-decimal list-inside font-mono text-xs text-on-surface space-y-2 pl-1">
                  <li><strong>Ingesti Dataset:</strong> Parsing CSV Steam Kaggle (app_id, title, genres, description).</li>
                  <li><strong>Text Preprocessing:</strong> Tokenisasi, lowercasing, stop-word removal, dan lemmatization pada deskripsi &amp; tag game.</li>
                  <li><strong>Vektorisasi TF-IDF:</strong> Pembentukan matriks bobot istilah untuk menangkap karakteristik intrinsik game.</li>
                  <li><strong>Cosine Similarity:</strong> Perhitungan sudut kosinus antar vektor game untuk mengukur derajat kemiripan numerik (0.0 s/d 1.0).</li>
                  <li><strong>Top-K Sorting:</strong> Pengurutan kandidat game teratas untuk disajikan secara real-time ke gamer.</li>
                </ol>
              </div>

              <!-- Panduan 2: Format CSV Dataset Steam -->
              <div class="p-5 rounded-xl bg-surface-container-low border border-outline-variant space-y-3">
                <div class="flex items-center gap-2 text-secondary font-headline font-bold text-sm uppercase">
                  <span class="material-symbols-outlined text-lg">data_object</span>
                  <span>Spesifikasi Kolom CSV Steam</span>
                </div>
                <p class="font-body text-xs text-on-surface-variant leading-relaxed">
                  Pastikan batch file CSV yang diunggah memenuhi skema standar berikut:
                </p>
                <div class="space-y-2 font-mono text-xs">
                  <div class="p-2 rounded bg-surface-container border border-outline-variant">
                    <span class="text-primary font-bold">app_id:</span> <span class="text-on-surface-variant">ID unik Steam (integer)</span>
                  </div>
                  <div class="p-2 rounded bg-surface-container border border-outline-variant">
                    <span class="text-secondary font-bold">name:</span> <span class="text-on-surface-variant">Judul resmi game (string)</span>
                  </div>
                  <div class="p-2 rounded bg-surface-container border border-outline-variant">
                    <span class="text-tertiary font-bold">genres:</span> <span class="text-on-surface-variant">Kategori dipisahkan koma (Action, RPG, ...)</span>
                  </div>
                  <div class="p-2 rounded bg-surface-container border border-outline-variant">
                    <span class="text-pink-400 font-bold">description:</span> <span class="text-on-surface-variant">Sinopsis gameplay atau overview</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- FAQ Section -->
            <div class="p-5 rounded-xl bg-surface-container-low border border-outline-variant space-y-3">
              <h4 class="font-headline font-bold text-sm text-white uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-tertiary text-lg">help</span>
                <span>Pertanyaan Sering Diajukan (FAQ)</span>
              </h4>
              <div class="space-y-3 text-xs">
                <div class="p-3 rounded-lg bg-surface-container border border-outline-variant">
                  <p class="text-white font-bold mb-1">Bagaimana cara menangani Cold-Start pengguna baru?</p>
                  <p class="text-on-surface-variant leading-relaxed">
                    Pengguna baru yang belum memiliki riwayat game akan diminta memilih genre favorit dan minimal 1-3 game referensi di Landing Page. Vektor preferensi langsung dikalkulasi terhadap matriks Steam untuk menghasilkan rekomendasi instan.
                  </p>
                </div>
                <div class="p-3 rounded-lg bg-surface-container border border-outline-variant">
                  <p class="text-white font-bold mb-1">Apakah proses import CSV memerlukan server restart?</p>
                  <p class="text-on-surface-variant leading-relaxed">
                    Tidak. Sistem mendukung live vector recalculation secara background asynchronous tanpa memutus session pengguna aktif.
                  </p>
                </div>
              </div>
            </div>
          </section>
        </div>

        <!-- ======================================================== -->
        <!-- TAB 7: PENGATURAN (KONFIGURASI MESIN RECSYS ML)          -->
        <!-- ======================================================== -->
        <div id="tab-content-pengaturan" class="admin-tab-pane hidden space-y-6">
          <section class="bg-surface-container/90 rounded-xl border border-outline-variant p-6 shadow-2xl space-y-6 relative overflow-hidden">
            <div class="h-0.5 w-full bg-gradient-to-r from-tertiary via-secondary to-primary"></div>
            <div>
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary text-[24px]">settings</span>
                <h3 class="font-headline font-bold text-lg text-white uppercase tracking-wider">
                  Konfigurasi Parameter Mesin Rekomendasi
                </h3>
              </div>
              <p class="font-mono text-xs text-on-surface-variant mt-1">
                Penyesuaian ambang batas kemiripan kosinus, kuantitas top-k, dan parameter komputasi vektor
              </p>
            </div>

            <form onsubmit="event.preventDefault(); alert('Konfigurasi RecSys berhasil disimpan!');" class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 font-mono text-xs">
                <!-- Param 1: Cosine Threshold -->
                <div class="space-y-2 p-4 rounded-xl bg-surface-container-low border border-outline-variant">
                  <label class="text-white font-bold flex items-center justify-between">
                    <span>Minimum Cosine Similarity Threshold:</span>
                    <span class="text-primary" id="thresh-val">0.70</span>
                  </label>
                  <input
                    type="range"
                    min="0.50"
                    max="0.95"
                    step="0.05"
                    value="0.70"
                    oninput="document.getElementById('thresh-val').textContent = this.value"
                    class="w-full accent-primary cursor-pointer"
                  />
                  <p class="text-[11px] text-on-surface-variant">
                    Hanya game dengan skor kesamaan di atas nilai ini yang akan disajikan ke rekomendasi gamer.
                  </p>
                </div>

                <!-- Param 2: Top-K Games Default -->
                <div class="space-y-2 p-4 rounded-xl bg-surface-container-low border border-outline-variant">
                  <label class="text-white font-bold flex items-center justify-between">
                    <span>Jumlah Game Rekomendasi (Top-K):</span>
                    <span class="text-secondary font-bold">8 Game</span>
                  </label>
                  <select class="w-full px-3 py-2 bg-surface-container border border-outline-variant rounded-lg text-white font-mono text-xs focus:border-secondary focus:outline-none">
                    <option value="4">4 Game (Compact)</option>
                    <option value="8" selected>8 Game (Default Grid)</option>
                    <option value="12">12 Game (Expanded)</option>
                    <option value="16">16 Game (Deep Discovery)</option>
                  </select>
                  <p class="text-[11px] text-on-surface-variant">
                    Jumlah kartu game yang ditampilkan dalam satu siklus kalkulasi rekomendasi.
                  </p>
                </div>

                <!-- Param 3: TF-IDF N-Gram Range -->
                <div class="space-y-2 p-4 rounded-xl bg-surface-container-low border border-outline-variant">
                  <label class="text-white font-bold">Rentang N-Gram Tokenizer:</label>
                  <select class="w-full px-3 py-2 bg-surface-container border border-outline-variant rounded-lg text-white font-mono text-xs focus:border-tertiary focus:outline-none">
                    <option selected>Unigram &amp; Bigram (1, 2) - Direkomendasikan</option>
                    <option>Unigram Saja (1, 1)</option>
                    <option>Trigram Ekstra (1, 3) - Memerlukan RAM lebih besar</option>
                  </select>
                  <p class="text-[11px] text-on-surface-variant">
                    Mengekstrak frasa 2 kata penting seperti "Open World" atau "Dark Fantasy".
                  </p>
                </div>

                <!-- Param 4: In-Memory Cache Status -->
                <div class="space-y-2 p-4 rounded-xl bg-surface-container-low border border-outline-variant">
                  <label class="text-white font-bold">Vektor Index Cache:</label>
                  <div class="flex items-center gap-3 pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-white">
                      <input type="checkbox" checked class="w-4 h-4 accent-tertiary rounded" />
                      <span>Aktifkan In-Memory Matrix Caching</span>
                    </label>
                  </div>
                  <p class="text-[11px] text-on-surface-variant pt-1">
                    Menyimpan matriks kesamaan di RAM untuk latensi rekomendasi sub-50 milidetik.
                  </p>
                </div>
              </div>

              <!-- Action Save -->
              <div class="pt-4 border-t border-outline-variant flex items-center justify-end gap-3">
                <button
                  type="reset"
                  class="px-5 py-2.5 rounded-lg border border-outline-variant hover:bg-surface-container text-on-surface-variant hover:text-white font-mono text-xs uppercase transition-all">
                  Reset Default
                </button>
                <button
                  type="submit"
                  class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-primary to-cyan-400 text-black font-headline font-bold text-xs uppercase tracking-wider hover:brightness-110 active:scale-95 shadow-md shadow-primary/20 glow-cyan-sm transition-all flex items-center gap-2">
                  <span class="material-symbols-outlined text-[18px]">save</span>
                  <span>Simpan Konfigurasi</span>
                </button>
              </div>
            </form>
          </section>
        </div>

        <!-- ======================================================== -->
        <!-- MODALS (TAMBAH USER, TAMBAH GENRE, TAMBAH GAME)          -->
        <!-- ======================================================== -->
        <!-- Modal Tambah User -->
        <div id="modal-admin-user" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden flex items-center justify-center p-4">
          <div class="w-full max-w-md bg-surface-container border border-outline-variant rounded-xl p-6 shadow-2xl relative space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-outline-variant">
              <h4 class="font-headline font-bold text-white text-base flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">person_add</span>
                <span>Tambah Akun Pengguna Baru</span>
              </h4>
              <button type="button" onclick="closeModalUser()" class="text-on-surface-variant hover:text-white">
                <span class="material-symbols-outlined">close</span>
              </button>
            </div>
            <form onsubmit="event.preventDefault(); alert('Akun pengguna baru berhasil ditambahkan!'); closeModalUser();" class="space-y-4 font-mono text-xs">
              <div>
                <label class="block text-on-surface-variant mb-1">Nama Lengkap:</label>
                <input required type="text" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-primary focus:outline-none" placeholder="Misal: Ahmad Dani" />
              </div>
              <div>
                <label class="block text-on-surface-variant mb-1">Email:</label>
                <input required type="email" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-primary focus:outline-none" placeholder="nama@example.com" />
              </div>
              <div>
                <label class="block text-on-surface-variant mb-1">Password:</label>
                <input required type="password" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-primary focus:outline-none" placeholder="Minimal 8 karakter" />
              </div>
              <div>
                <label class="block text-on-surface-variant mb-1">Role Akses:</label>
                <select class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-primary focus:outline-none">
                  <option value="user">Gamer (User Standar)</option>
                  <option value="admin">Admin ML (SuperAdmin)</option>
                </select>
              </div>
              <div class="pt-3 border-t border-outline-variant flex items-center justify-end gap-2">
                <button type="button" onclick="closeModalUser()" class="px-4 py-2 rounded-lg border border-outline-variant text-on-surface-variant hover:text-white">Batal</button>
                <button type="submit" class="px-5 py-2 rounded-lg bg-primary text-black font-bold uppercase tracking-wider hover:brightness-110">Simpan Akun</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Modal Tambah Genre -->
        <div id="modal-admin-genre" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden flex items-center justify-center p-4">
          <div class="w-full max-w-md bg-surface-container border border-outline-variant rounded-xl p-6 shadow-2xl relative space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-outline-variant">
              <h4 class="font-headline font-bold text-white text-base flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary">category</span>
                <span>Tambah Kategori Genre</span>
              </h4>
              <button type="button" onclick="closeModalGenre()" class="text-on-surface-variant hover:text-white">
                <span class="material-symbols-outlined">close</span>
              </button>
            </div>
            <form onsubmit="event.preventDefault(); alert('Kategori genre baru berhasil didaftarkan ke taksonomi!'); closeModalGenre();" class="space-y-4 font-mono text-xs">
              <div>
                <label class="block text-on-surface-variant mb-1">Nama Genre:</label>
                <input required type="text" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-secondary focus:outline-none" placeholder="Misal: Metroidvania" />
              </div>
              <div>
                <label class="block text-on-surface-variant mb-1">Material Icon Symbol:</label>
                <input required type="text" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-secondary focus:outline-none" placeholder="Misal: explore, skull, sports_esports" />
              </div>
              <div>
                <label class="block text-on-surface-variant mb-1">Bobot TF-IDF Vektor:</label>
                <input required type="number" step="0.1" value="1.0" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-secondary focus:outline-none" />
              </div>
              <div class="pt-3 border-t border-outline-variant flex items-center justify-end gap-2">
                <button type="button" onclick="closeModalGenre()" class="px-4 py-2 rounded-lg border border-outline-variant text-on-surface-variant hover:text-white">Batal</button>
                <button type="submit" class="px-5 py-2 rounded-lg bg-secondary text-white font-bold uppercase tracking-wider hover:brightness-110">Simpan Genre</button>
              </div>
            </form>
          </div>
        </div>
@endsection
