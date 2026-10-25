@extends ('layouts.app')

@section ('title', 'GameMatch - Rekomendasi Game PC AI & Cosine Similarity')

@section ('content')
    @include ('partials.navbar')

    <main class="flex-grow">
        <!-- 1. HERO SECTION -->
        <!-- 1. HERO SECTION WITH AUTO-SLIDING GAME BANNER BACKGROUND -->
        <section
            class="relative pt-12 pb-16 md:pt-20 md:pb-24 overflow-hidden border-b border-[#1e293b] select-none"
            id="hero"
            x-data="{
          currentSlide: 0,
          slides: [
            {
              id: 0,
              title: 'Apex Legends',
              shortTitle: 'Apex',
              genre: 'Battle Royale • Hero Shooter',
              image: "
            {{ asset('images/apex.jpg') }}"
            },
            {
            id:
            1,
            title:
            'Call
            of
            Duty:
            Warzone',
            shortTitle:
            'COD
            Warzone',
            genre:
            'Tactical
            Shooter
            •
            Modern
            Warfare',
            image:
            "{{ asset('images/cod.jpg') }}"
            },
            {
            id:
            2,
            title:
            'Counter-Strike
            2',
            shortTitle:
            'CS
            2',
            genre:
            'Tactical
            FPS
            •
            Valve
            Competitive',
            image:
            "{{ asset('images/cs.png') }}"
            },
            {
            id:
            3,
            title:
            'PUBG:
            BATTLEGROUNDS',
            shortTitle:
            'PUBG',
            genre:
            'Tactical
            Battle
            Royale
            •
            Survival',
            image:
            "{{ asset('images/pubg.jpg') }}"
            },
            {
            id:
            4,
            title:
            'VALORANT',
            shortTitle:
            'VALORANT',
            genre:
            'Tactical
            FPS
            ',
            image:
            "{{ asset('images/valorant.jpg') }}"
            }
            ],
            timer:
            null,
            progress:
            0,
            progressInterval:
            null,
            duration:
            2500,
            startSlider()
            {
            this.clearSlider();
            this.progress="0;"
            const
            step="50;"
            this.progressInterval="setInterval(()"
            =""
        >
            { this.progress += (step / this.duration) * 100; if (this.progress >= 100) { this.nextSlide(); } }, step);
            }, nextSlide() { this.currentSlide = (this.currentSlide + 1) % this.slides.length; this.progress = 0; },
            prevSlide() { this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            this.progress = 0; }, goToSlide(idx) { this.currentSlide = idx; this.progress = 0; }, clearSlider() { if
            (this.progressInterval) clearInterval(this.progressInterval); } }" x-init="startSlider()"
            @mouseenter
            ="clearSlider()"
            @mouseleave
            ="startSlider()" >
            <!-- Dynamic Background Banner Carousel (4 Images with Transparent Gradient Overlays) -->
            <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
                @php
                    $heroBanners = [
                        ['src' => asset('images/apex.jpg'), 'alt' => 'Apex Legends Banner'],
                        ['src' => asset('images/cod.jpg'), 'alt' => 'Call of Duty Warzone Banner'],
                        ['src' => asset('images/cs.png'), 'alt' => 'Counter-Strike 2 Banner'],
                        ['src' => asset('images/pubg.jpg'), 'alt' => 'PUBG BATTLEGROUNDS Banner'],
                    ];
                @endphp

                @foreach ($heroBanners as $idx => $banner)
                    <div
                        class="absolute inset-0 transition-all duration-1000 ease-out"
                        :class="currentSlide === {{ $idx }} ? 'opacity-100 scale-100 z-10' : 'opacity-0 scale-105 z-0 pointer-events-none'"
                    >
                        <img
                            src="{{ $banner['src'] }}"
                            alt="{{ $banner['alt'] }}"
                            class="w-full h-full object-cover object-center filter saturate-115 contrast-105"
                            loading="{{ $idx === 0 ? 'eager' : 'lazy' }}"
                        />
                    </div>
                @endforeach

                <!-- Lightweight Overlays: Dark tint on left for text legibility, clear on right for game art, soft fade on edges -->
                <div
                    class="absolute inset-0 bg-gradient-to-r from-[#080b11]/90 via-[#080b11]/55 to-[#080b11]/20 z-20"
                ></div>
                <div
                    class="absolute inset-0 bg-gradient-to-b from-[#080b11]/70 via-transparent to-[#080b11] z-20"
                ></div>

                <!-- Subtle Cyberpunk Scanline / Hex Mesh Overlay -->
                <div
                    class="absolute inset-0 bg-[linear-gradient(rgba(0,240,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(0,240,255,0.02)_1px,transparent_1px)] bg-[size:48px_48px] opacity-25 z-20"
                ></div>
            </div>

            <!-- Tactical Neon Ambient Glows -->
            <div
                class="absolute -top-32 -left-32 w-[32rem] h-[32rem] bg-primary/15 rounded-full blur-[140px] pointer-events-none z-10"
            ></div>
            <div
                class="absolute top-1/3 -right-32 w-[34rem] h-[34rem] bg-secondary/15 rounded-full blur-[150px] pointer-events-none z-10"
            ></div>
            <div
                class="absolute bottom-0 left-1/2 -translate-x-1/2 w-full h-[1px] bg-gradient-to-r from-transparent via-primary/50 to-transparent z-10"
            ></div>

            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-20">
                <!-- Left Column: Copywriting -->
                <div class="lg:col-span-7 flex flex-col gap-6 text-left">
                    <!-- Feature Badges Cluster (Gamer Neon Badges) -->
                    <div class="flex flex-wrap items-center gap-2.5">
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded bg-[#131c2e] border border-primary/50 text-primary text-xs font-label-sm uppercase tracking-wider shadow-[0_0_10px_rgba(0,240,255,0.2)]"
                        >
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                            CONTENT-BASED FILTERING
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded bg-[#1c142b] border border-secondary/50 text-secondary text-xs font-label-sm uppercase tracking-wider shadow-[0_0_10px_rgba(192,132,252,0.2)]"
                        >
                            <span class="material-symbols-outlined text-xs" data-icon="functions">functions</span>
                            COSINE VECTOR ENGINE
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded bg-[#0d231e] border border-tertiary/50 text-tertiary text-xs font-label-sm uppercase tracking-wider shadow-[0_0_10px_rgba(16,185,129,0.2)]"
                        >
                            <span class="material-symbols-outlined text-xs" data-icon="dataset">dataset</span>
                            KAGGLE STEAM DATASET
                        </span>
                    </div>
                    <!-- Headline -->
                    <h2
                        class="text-3xl sm:text-3xl lg:text-4xl font-headline-xl font-extrabold text-white tracking-tight leading-[1.1] uppercase"
                    >
                        Temukan Game PC yang Cocok Untukmu <br class="hidden sm:block" />
                    </h2>
                    <!-- Subheadline -->
                    <p
                        class="text-body-lg font-body-lg text-on-surface-variant max-w-2xl leading-relaxed"
                    >Pilih genre dan game favoritmu, sistem kami menyarankan game serupa secara otomatis menggunakan algoritma cerdas berbasis kalkulasi vektor Steam.</p>
                    <!-- CTAs (High-Energy Gamer Neon Buttons) -->
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        @auth
                            <a
                                href="#rekomendasi"
                                class="px-8 py-3.5 rounded btn-cyber-primary text-[#002022] font-headline-sm text-sm font-extrabold uppercase tracking-wider transition-all duration-200 active:scale-95 flex items-center gap-2 group"
                            >
                                <span>Lihat Rekomendasi</span>
                                <span
                                    class="material-symbols-outlined text-xl group-hover:rotate-12 transition-transform"
                                    >recommend</span
                                >
                            </a>
                            <a
                                href="#rekomendasi"
                                class="px-6 py-3.5 rounded border border-primary/40 bg-[#0e1626]/80 text-primary hover:bg-primary/10 hover:border-primary transition-all duration-200 text-xs font-label-md uppercase tracking-wider flex items-center gap-2 shadow-[0_0_15px_rgba(0,240,255,0.1)]"
                            >
                                <span class="material-symbols-outlined text-base">history</span>
                                <span>History Game</span>
                            </a>
                        @else
                            <button
                                class="px-8 py-3.5 rounded btn-cyber-primary text-[#002022] font-headline-sm text-sm font-extrabold uppercase tracking-wider transition-all duration-200 active:scale-95 flex items-center gap-2 group"
                                onclick="toggleModal('modal-register')"
                            >
                                <span>Daftar Gratis</span>
                                <span
                                    class="material-symbols-outlined text-xl group-hover:rotate-12 transition-transform"
                                    >bolt</span
                                >
                            </button>
                            <a
                                class="px-6 py-3.5 rounded border border-primary/40 bg-[#0e1626]/80 text-primary hover:bg-primary/10 hover:border-primary transition-all duration-200 text-xs font-label-md uppercase tracking-wider flex items-center gap-2 shadow-[0_0_15px_rgba(0,240,255,0.1)]"
                                href="#cara-kerja"
                            >
                                <span>Pelajari Cara Kerja</span>
                                <span class="material-symbols-outlined text-base">expand_more</span>
                            </a>
                        @endauth
                    </div>
                    <!-- Telemetry Micro-Stat HUD Grid -->
                    <div class="pt-6 grid grid-cols-3 gap-4 border-t border-[#1e293b] max-w-lg">
                        <div class="p-2.5 rounded bg-surface-container/50 border border-[#1e293b]">
                            <p class="text-2xl font-headline-md font-extrabold text-white">50.000+</p>
                            <p
                                class="text-xs font-code-metric text-on-surface-variant uppercase tracking-wider mt-0.5"
                            >Katalog Steam</p>
                        </div>
                        <div class="p-2.5 rounded bg-surface-container/50 border border-[#1e293b]">
                            <p
                                class="text-2xl font-headline-md font-extrabold text-primary drop-shadow-[0_0_8px_rgba(0,240,255,0.5)]"
                            >&lt; 0.08s</p>
                            <p
                                class="text-xs font-code-metric text-on-surface-variant uppercase tracking-wider mt-0.5"
                            >Waktu Kalkulasi</p>
                        </div>
                        <div class="p-2.5 rounded bg-surface-container/50 border border-[#1e293b]">
                            <p
                                class="text-2xl font-headline-md font-extrabold text-tertiary drop-shadow-[0_0_8px_rgba(16,185,129,0.5)]"
                            >98.2%</p>
                            <p
                                class="text-xs font-code-metric text-on-surface-variant uppercase tracking-wider mt-0.5"
                            >Akurasi Kemiripan</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 2. CARA KERJA SECTION -->
        <section class="py-20 bg-[#080b11] border-b border-[#1e293b] relative overflow-hidden" id="cara-kerja">
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded bg-secondary/10 border border-secondary/40 text-secondary text-xs font-code-metric uppercase tracking-wider mb-3"
                    >
                        <span class="material-symbols-outlined text-sm" data-icon="terminal">terminal</span>
                        METODOLOGI ALGORITMA
                    </div>
                    <h2 class="text-3xl md:text-4xl font-headline-lg font-bold text-white uppercase tracking-tight">
                        Cara Kerja Sistem
                    </h2>
                    <p class="text-body-lg font-body-lg text-on-surface-variant mt-3">Tiga tahapan matematis presisi dalam mengidentifikasi game yang sesuai dengan selera unik Anda tanpa data pelacakan invasif.</p>
                </div>
                <!-- 3 Sequential Step Cards (Angled Tech Frames + Glowing Numbers) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div
                        class="bg-[#0f1422] rounded-xl p-6 border border-primary/30 hover:border-primary transition-all duration-300 tech-corner-accent shadow-[0_4px_20px_rgba(0,0,0,0.5)] flex flex-col justify-between group hover:shadow-[0_0_25px_rgba(0,240,255,0.25)]"
                    >
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 rounded-lg bg-surface-container-high border border-primary/40 flex items-center justify-center text-primary group-hover:scale-110 transition-transform shadow-[0_0_12px_rgba(0,240,255,0.3)]"
                                >
                                    <span class="material-symbols-outlined text-2xl" data-icon="category"
                                        >category</span
                                    >
                                </div>
                                <span
                                    class="text-4xl font-headline-xl font-extrabold text-primary/40 group-hover:text-primary transition-colors font-mono"
                                    >01</span
                                >
                            </div>
                            <h3 class="text-xl font-headline-sm font-bold text-white mb-3 uppercase tracking-wide">
                                1. Pilih Genre &amp; Preferensi
                            </h3>
                            <p
                                class="text-body-md font-body-md text-on-surface-variant leading-relaxed"
                            >Tentukan tag, kategori Steam, serta karakteristik mekanisme game (seperti Turn-based, Soulslike, atau Story Rich) yang paling Anda minati.</p>
                        </div>
                        <div
                            class="mt-6 pt-4 border-t border-[#1e293b] flex items-center gap-2 text-primary text-xs font-code-metric"
                        >
                            <span class="material-symbols-outlined text-sm" data-icon="check_circle">check_circle</span>
                            <span class="uppercase tracking-wider">Ekstraksi Metadata Steam</span>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div
                        class="bg-[#0f1422] rounded-xl p-6 border border-secondary/30 hover:border-secondary transition-all duration-300 tech-corner-accent shadow-[0_4px_20px_rgba(0,0,0,0.5)] flex flex-col justify-between group hover:shadow-[0_0_25px_rgba(192,132,252,0.25)]"
                    >
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 rounded-lg bg-surface-container-high border border-secondary/40 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform shadow-[0_0_12px_rgba(192,132,252,0.3)]"
                                >
                                    <span class="material-symbols-outlined text-2xl" data-icon="memory">memory</span>
                                </div>
                                <span
                                    class="text-4xl font-headline-xl font-extrabold text-secondary/40 group-hover:text-secondary transition-colors font-mono"
                                    >02</span
                                >
                            </div>
                            <h3 class="text-xl font-headline-sm font-bold text-white mb-3 uppercase tracking-wide">
                                2. Pilih Game Favoritmu
                            </h3>
                            <p
                                class="text-body-md font-body-md text-on-surface-variant leading-relaxed"
                            >Sistem mengambil representasi vektor fitur multi-dimensi dari game referensi yang Anda pilih untuk dipetakan ke dalam ruang semantik.</p>
                        </div>
                        <div
                            class="mt-6 pt-4 border-t border-[#1e293b] flex items-center gap-2 text-secondary text-xs font-code-metric"
                        >
                            <span class="material-symbols-outlined text-sm" data-icon="tune">tune</span>
                            <span class="uppercase tracking-wider">Penyusunan TF-IDF Vektor</span>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div
                        class="bg-[#0f1422] rounded-xl p-6 border border-tertiary/30 hover:border-tertiary transition-all duration-300 tech-corner-accent shadow-[0_4px_20px_rgba(0,0,0,0.5)] flex flex-col justify-between group hover:shadow-[0_0_25px_rgba(16,185,129,0.25)]"
                    >
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div
                                    class="w-12 h-12 rounded-lg bg-surface-container-high border border-tertiary/40 flex items-center justify-center text-tertiary group-hover:scale-110 transition-transform shadow-[0_0_12px_rgba(16,185,129,0.3)]"
                                >
                                    <span class="material-symbols-outlined text-2xl" data-icon="query_stats"
                                        >query_stats</span
                                    >
                                </div>
                                <span
                                    class="text-4xl font-headline-xl font-extrabold text-tertiary/40 group-hover:text-tertiary transition-colors font-mono"
                                    >03</span
                                >
                            </div>
                            <h3 class="text-xl font-headline-sm font-bold text-white mb-3 uppercase tracking-wide">
                                3. Dapatkan Rekomendasi Akurat
                            </h3>
                            <p
                                class="text-body-md font-body-md text-on-surface-variant leading-relaxed"
                            >Perhitungan Cosine Similarity menghasilkan skor sudut kemiripan tertinggi, menyajikan urutan katalog yang paling relevan secara instan.</p>
                        </div>
                        <div
                            class="mt-6 pt-4 border-t border-[#1e293b] flex items-center gap-2 text-tertiary text-xs font-code-metric"
                        >
                            <span class="material-symbols-outlined text-sm" data-icon="verified">verified</span>
                            <span class="uppercase tracking-wider">Skor Persentase Kecocokan</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 3. REKOMENDASI PREVIEW SECTION -->
        <section class="py-20 bg-[#06080d] border-b border-[#1e293b] relative" id="rekomendasi">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded bg-primary/10 border border-primary/30 text-primary text-xs font-code-metric uppercase tracking-wider mb-2"
                        >
                            <span class="material-symbols-outlined text-sm">local_fire_department</span>
                            KATALOG UNGGULAN
                        </div>
                        <h2 class="text-3xl md:text-4xl font-headline-lg font-bold text-white uppercase tracking-tight">
                            @auth
                                Rekomendasi untuk
                                <span
                                    class="font-headline-md tracking-normal text-primary"
                                    >{{ auth()->user()->name }}</span
                                >
                            @else
                                Pratinjau Rekomendasi Game
                            @endauth
                        </h2>
                        <p class="text-body-md font-body-md text-on-surface-variant mt-2">
                            @auth
                                Rekomendasi personal berbasis preferensi genre dan riwayat game Anda.
                            @else
                                Berdasarkan kluster popularitas dan kesesuaian profil gamer PC terkini.
                            @endauth
                        </p>
                    </div>
                    <div class="mt-4 md:mt-0 flex items-center gap-3">
                        @auth
                            <button
                                type="button"
                                onclick="toggleModal('modal-history')"
                                class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded border border-tertiary/40 hover:border-tertiary text-tertiary hover:bg-tertiary/10 text-xs font-code-metric uppercase tracking-wider transition-all shadow-[0_0_10px_rgba(0,255,163,0.15)]"
                            >
                                <span class="material-symbols-outlined text-sm">history</span>
                                Cek History
                            </button>
                            @if (auth()->user()->isAdmin())
                                <a
                                    href="{{ route('dashboard.admin') }}"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded border border-secondary/40 hover:border-secondary text-secondary hover:bg-secondary/10 text-xs font-code-metric uppercase tracking-wider transition-all"
                                >
                                    <span class="material-symbols-outlined text-sm">admin_panel_settings</span>
                                    Admin ML
                                </a>
                            @endif
                        @endauth
                        <span
                            class="text-xs font-code-metric text-on-surface-variant px-3 py-1 bg-surface-container border border-[#1e293b] rounded"
                        >
                            Dataset: Steam Kaggle 2024
                        </span>
                    </div>
                </div>

                {{-- ── 1. COLD-START PREFERENSI & GAME FAVORIT REFERENSI ── --}}
                <div
                    class="mb-12 p-6 sm:p-8 bg-[#0f1422] border-2 border-primary/30 rounded-2xl shadow-[0_0_35px_rgba(0,240,255,0.15)] relative tech-corner-accent space-y-7"
                    id="preferensi-section"
                >
                    <!-- Header Setup Preferensi -->
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#1e293b]"
                    >
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                <span class="text-xs font-code-metric text-primary uppercase font-bold tracking-widest">
                                    COLD-START RECSYS CONFIG
                                </span>
                                <span
                                    class="text-[10px] font-code-metric text-on-surface-variant/70 border border-[#1e293b] px-2 py-0.5 rounded bg-surface-container"
                                >
                                    Content-Based TF-IDF // Cosine Sim
                                </span>
                            </div>
                            <h3
                                class="text-xl sm:text-2xl font-headline-md font-extrabold text-white uppercase tracking-wide flex items-center gap-2.5"
                            >
                                <span
                                    class="w-8 h-8 rounded-lg bg-primary/20 border border-primary/50 flex items-center justify-center text-primary shadow-[0_0_10px_rgba(0,240,255,0.3)]"
                                >
                                    <span class="material-symbols-outlined text-lg">tune</span>
                                </span>
                                Atur Preferensi Genre &amp; Game Favorit
                            </h3>
                            <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Pilih genre yang disukai dan pilih game referensi untuk membentuk vektor cold-start rekomendasi akun Anda.</p>
                        </div>

                        <!-- Quick Status Pill -->
                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                onclick="toggleModal('modal-history')"
                                class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded border border-tertiary/40 hover:border-tertiary text-tertiary hover:bg-tertiary/10 text-xs font-code-metric uppercase tracking-wider transition-all shadow-[0_0_10px_rgba(0,255,163,0.15)]"
                            >
                                <span class="material-symbols-outlined text-sm">history</span>
                                <span>Riwayat Rekomendasi</span>
                            </button>
                        </div>
                    </div>

                    <!-- LANGKAH 1: Pilih Genre Favorit -->
                    <div class="space-y-3">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <label
                                class="text-xs font-code-metric uppercase tracking-wider text-primary font-bold flex items-center gap-1.5"
                            >
                                <span
                                    class="w-5 h-5 rounded bg-primary/20 border border-primary/40 flex items-center justify-center text-[11px] text-primary font-bold"
                                    >1</span
                                >
                                <span>Pilih Genre Favorit Anda (Bisa Memilih Lebih Dari Satu):</span>
                            </label>
                            <div class="flex items-center gap-2">
                                <button
                                    type="button"
                                    onclick="selectAllGenres()"
                                    class="text-[11px] font-code-metric text-primary/80 hover:text-primary underline"
                                >
                                    Pilih Semua
                                </button>
                                <span class="text-on-surface-variant/40">•</span>
                                <button
                                    type="button"
                                    onclick="resetGenreFilter()"
                                    class="text-[11px] font-code-metric text-on-surface-variant hover:text-white underline"
                                >
                                    Reset Genre
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2.5" id="genre-filter-chips">
                            @php
                                $genres = [
                                    'Action',
                                    'RPG',
                                    'Open World',
                                    'Souls-like',
                                    'Strategy',
                                    'Story Rich',
                                    'Roguelike',
                                    'Indie',
                                    'Simulation',
                                    'Shooter',
                                    'Horror',
                                    'Puzzle',
                                ];
                                $defaultActiveGenres = ['Action', 'RPG', 'Open World', 'Souls-like'];
                            @endphp
                            @foreach ($genres as $genre)
                                @php
                                    $isDefaultActive = in_array($genre, $defaultActiveGenres);
                                @endphp
                                <button
                                    type="button"
                                    onclick="toggleGenreChip(this)"
                                    data-genre="{{ $genre }}"
                                    class="genre-chip px-3.5 py-1.5 rounded-full border text-xs font-code-metric tracking-wide transition-all duration-150 flex items-center gap-1.5 {{ $isDefaultActive ? 'bg-primary text-[#002022] font-bold border-primary shadow-[0_0_12px_rgba(0,240,255,0.4)]' : 'border-[#1e293b] text-on-surface-variant hover:border-primary/60 hover:text-primary bg-surface-container/60' }}"
                                >
                                    <span
                                        class="material-symbols-outlined text-xs {{ $isDefaultActive ? 'inline' : 'hidden' }} chip-check"
                                        >check</span
                                    >
                                    <span>{{ $genre }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- LANGKAH 2: Pilih Game Favorit (Basis Kalkulasi Vektor) -->
                    <div class="space-y-3 pt-4 border-t border-[#1e293b]">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <label
                                class="text-xs font-code-metric uppercase tracking-wider text-primary font-bold flex items-center gap-1.5"
                            >
                                <span
                                    class="w-5 h-5 rounded bg-primary/20 border border-primary/40 flex items-center justify-center text-[11px] text-primary font-bold"
                                    >2</span
                                >
                                <span>Pilih Game Favorit Sebagai Basis Referensi Vektor:</span>
                            </label>
                            <span
                                id="fav-games-count-badge"
                                class="px-2.5 py-0.5 rounded text-[11px] font-code-metric font-bold bg-secondary/20 text-secondary border border-secondary/40"
                            >
                                3 Game Terpilih
                            </span>
                        </div>

                        <!-- Search Bar Referensi Game -->
                        <div class="relative group">
                            <span
                                class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-primary text-lg pointer-events-none"
                                >search</span
                            >
                            <input
                                id="search-ref-game"
                                oninput="filterReferenceGames(this.value)"
                                class="w-full pl-10 pr-24 py-2.5 rounded-lg bg-[#080b11] border-2 border-primary/30 text-white placeholder-on-surface-variant/50 font-body-md text-xs focus:border-primary focus:glow-cyan focus:outline-none transition-all duration-200"
                                placeholder="Ketik untuk mencari game favorit referensi (misal: Cyberpunk, Elden Ring, Hades)..."
                                type="text"
                            />
                            <span
                                class="absolute right-3.5 top-1/2 -translate-y-1/2 text-[10px] font-mono text-primary/60 border border-primary/30 px-1.5 py-0.5 rounded hidden sm:block"
                            >
                                FILTER LIVE
                            </span>
                        </div>

                        <!-- Grid Game Referensi Favorit yang Dapat Dipilih -->
                        <div
                            class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 gap-3.5 pt-1"
                            id="reference-games-grid"
                        >
                            @php
                                $refGames = [
                                    [
                                        'id' => 'ref-cyberpunk',
                                        'title' => 'Cyberpunk 2077',
                                        'studio' => 'CD PROJEKT RED',
                                        'genres' => 'RPG, Open World, Shooter, Action',
                                        'img' =>
                                            'https://lh3.googleusercontent.com/aida-public/AB6AXuAQjPavzwmRZx2cqfOCfH8v3nlw6Bx-Ea4jkzGG22O1Pa9BkPcK6IFN4cHuORgWSrpcUR7gGEgrb-RKSa0QLSy8MrRxl9-FWp2vBpyt4Ee3PwPyl-oa7ypP5Gfl5m7lz42Lrwk5bDRTzNlbZ3jRmeAmGQPAhw_KwHx38hpvW27WMR7CsajiOPFQbI-iVrZqXr_lhpbBBZ1sAKS3wnb-Ozz3A0kqwrzBuDsQLKm9VBfOrUt3bTy1-orh',
                                        'selected' => true,
                                    ],
                                    [
                                        'id' => 'ref-eldenring',
                                        'title' => 'Elden Ring',
                                        'studio' => 'FromSoftware',
                                        'genres' => 'Souls-like, Dark Fantasy, RPG, Action',
                                        'img' =>
                                            'https://lh3.googleusercontent.com/aida-public/AB6AXuDOnLaBUJanpII9wbcWasXlESOwboVv6hWa-BE-FPKqdbzLLLktqifw3ZFMx_lcG5PEZhzeILH2bdhFe__6MEwbfjy20co7xVJ2Bgevyy2N8IFBlpEtzCZSS0EZtQEcZBTaMxxNh-k1tbiuNx94c_cKjlXqERR0cYsfXnGOlS1Txiwt-BwIh8V7xeL_YhNKC_q64WAUzEvWYSmtQgvuCiKYRwUkaSpnD52k5Wm6ev3_VDZFfmHidt7P',
                                        'selected' => true,
                                    ],
                                    [
                                        'id' => 'ref-baldursgate',
                                        'title' => "Baldur's Gate 3",
                                        'studio' => 'Larian Studios',
                                        'genres' => 'RPG, Story Rich, Strategy',
                                        'img' =>
                                            'https://lh3.googleusercontent.com/aida-public/AB6AXuAIfr9TS6q6K97q9lpWA1BXY0X5kE6LigC4X1vZDVZRKAS0Q6jlcWywTlVh7f4FKu1EAahzE36VFdjreYIg7b5yyOxgiJ5QJm-XLZFWfatLIacgfJKJTHjhkEG_oWunQZPjHr8GIOvAcMIWD_OCi0azois8IUdEfcFcdDYSYqRj_6crdPw7zOXbaWudI5hcQHcijku4Cn61P67g9Fvy-iuZpThPrU6kxaByHw0Mk055VAM6-HG69va-',
                                        'selected' => true,
                                    ],
                                    [
                                        'id' => 'ref-witcher3',
                                        'title' => 'The Witcher 3',
                                        'studio' => 'CD PROJEKT RED',
                                        'genres' => 'RPG, Open World, Action',
                                        'img' =>
                                            'https://lh3.googleusercontent.com/aida-public/AB6AXuCwemg0Lreg0jbncfqAkBpEFV8lnBULopgIWVbQNRcb2a_7QyuknvpijBRM02q9tyDWUgBJo0FtFnhEXntq0NOVNefbRQHq5v7qbbMHpe-aKTOfwXJR5kNajVYaEuqvciAbdW1SP6wAwkkEf9uRadpV8HGboJ8QUCzsC_-3CfNol_q27BT7IWtbzEZlr9EFC3q2PR4DzW69H_QEqAHdQ91OOJ0ADxK5bY-lTDK8B3wfNbEKGqjVoQW3',
                                        'selected' => false,
                                    ],
                                    [
                                        'id' => 'ref-hades',
                                        'title' => 'Hades',
                                        'studio' => 'Supergiant Games',
                                        'genres' => 'Roguelike, Action, Indie',
                                        'img' =>
                                            'https://lh3.googleusercontent.com/aida-public/AB6AXuAA_oR1WnFa9dMp_IJs43GUkSOiC9MJzzs6WK21UW4AbSf-Ic2OTAqdalaqpNj90kB04OLe-N2pWwxfPejlloiDd9DWzmXUH865xUWYGKgeE3ZWApJ4kVGln5bhTtgmsow962czgzc-pSCsaHA78T8r55dCrRji_k27rlxiYgcx8O1ZDquvRACF9OhBAMQU6QVKjOUW-RZaku-9s3GSHG065bCbBF7mgMch-vG9b9G8zoQKxfgMgwfb',
                                        'selected' => false,
                                    ],
                                    [
                                        'id' => 'ref-rdr2',
                                        'title' => 'Red Dead Redemption 2',
                                        'studio' => 'Rockstar Games',
                                        'genres' => 'Open World, Story Rich, Action',
                                        'img' =>
                                            'https://lh3.googleusercontent.com/aida-public/AB6AXuBt3kRWe3gqcgNUP7sHXAT6by2CXp7l8gsSWnHhCmjBFYrMKM9JCW570BZT7NoPCWp48iUX5nxmxFkLmstMLFn2WpRCEVLG7CwXSFlaHlyJu8B4amE4kJQgDeSRBkKRrlMKC9Y2-QgIo-LpvNKEcNFTps_qgustrhfblJU9yeLJNPkxsOhjx-4j9l-VHN5dBbTebg_LkKl0jcmZur1KmYpZD-hN8mKgVq92Dj-LELMoHrP23r6n0NNk',
                                        'selected' => false,
                                    ],
                                    [
                                        'id' => 'ref-godofwar',
                                        'title' => 'God of War',
                                        'studio' => 'Santa Monica Studio',
                                        'genres' => 'Action, Mythology, Story Rich',
                                        'img' =>
                                            'https://lh3.googleusercontent.com/aida-public/AB6AXuDtYx5wxB1xfQm6WhsyK72oYqA815YA3ekhXkSieWr4nzC7nuRcGsL8xCZUwDUkM5j5pLl4uOOVenR1FfekslRzGyb_eosSBz8lZHddEXlPTyBfVW0jj5swVuDSRrRTikElYp8m0-A8sPpQVbrBw3X50YWmPHyapYh5g9FQmIFn2m3oFh8HNBmDkZO3QXC7mFNMpAL1u6dapuZ3ZTCTiiOCfesyNo_d8B4J1nfIjKdlMUv1Z0LWp4M-',
                                        'selected' => false,
                                    ],
                                    [
                                        'id' => 'ref-mhw',
                                        'title' => 'Monster Hunter: World',
                                        'studio' => 'Capcom',
                                        'genres' => 'Action, RPG, Co-op',
                                        'img' =>
                                            'https://lh3.googleusercontent.com/aida-public/AB6AXuDNswDdYr0ZNIizGj1u97PwBl2PV6Ob7YCS_VLwigiL4yGKMinkOdgJ5NBgw65FlsZhkLZkjQpmQPPxhoXncKv71t-czNfazGde-f17rJRzdEwZGK8xOUtPO-0ColF9uD73CEPAk2SPQHh9qll2GHbhmB5xkmYcK-AsvgToYdIv9UEsFonL_g1o_EzjFBjv2KqJaHz6GqfYwvIG96IFkUGRy3k3M2BtLN5tsetLJv0Xo7nD8vDsgADk',
                                        'selected' => false,
                                    ],
                                ];
                            @endphp

                            @foreach ($refGames as $game)
                                <div
                                    onclick="toggleReferenceGame(this, '{{ $game['title'] }}')"
                                    data-ref-title="{{ strtolower($game['title']) }}"
                                    data-ref-genres="{{ strtolower($game['genres']) }}"
                                    class="ref-game-card relative rounded-xl border p-2.5 bg-[#080b11] hover:border-primary/80 transition-all duration-200 cursor-pointer group flex flex-col justify-between select-none {{ $game['selected'] ? 'border-primary ring-1 ring-primary/80 bg-primary/5 shadow-[0_0_15px_rgba(0,240,255,0.25)]' : 'border-[#1e293b]' }}"
                                >
                                    <div class="relative aspect-[16/10] rounded-lg overflow-hidden mb-2">
                                        <img
                                            src="{{ $game['img'] }}"
                                            alt="{{ $game['title'] }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        />
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"
                                        ></div>
                                        <span
                                            class="absolute top-1.5 right-1.5 w-6 h-6 rounded-full flex items-center justify-center transition-all check-indicator {{ $game['selected'] ? 'bg-primary text-[#002022] shadow-[0_0_8px_rgba(0,240,255,0.8)]' : 'bg-black/60 text-white/40 border border-white/20' }}"
                                        >
                                            <span class="material-symbols-outlined text-sm font-bold">check</span>
                                        </span>
                                    </div>
                                    <div>
                                        <h4
                                            class="text-xs font-bold text-white truncate group-hover:text-primary transition-colors"
                                        >
                                            {{ $game['title'] }}
                                        </h4>
                                        <p class="text-[10px] font-code-metric text-on-surface-variant truncate">{{ $game['studio'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- LANGKAH 3: Tombol Simpan & Hitung Rekomendasi Game (HUD Action Bar) -->
                    <div
                        class="pt-4 border-t border-[#1e293b] flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 bg-surface-container/60 p-4 rounded-xl border border-primary/20"
                    >
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/20 border border-primary/50 flex items-center justify-center text-primary shadow-[0_0_12px_rgba(0,240,255,0.3)] shrink-0"
                            >
                                <span class="material-symbols-outlined text-xl">calculate</span>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-headline-sm font-bold text-white uppercase tracking-wider"
                                        >Status Konfigurasi Vektor</span
                                    >
                                    <span
                                        id="cfg-summary-badge"
                                        class="px-2 py-0.2 rounded text-[10px] font-code-metric font-bold bg-primary/20 text-primary border border-primary/40"
                                    >
                                        Siap Dihitung
                                    </span>
                                </div>
                                <p class="text-[11px] font-code-metric text-on-surface-variant" id="cfg-detail-summary">4 Genre Aktif &bull; 3 Game Favorit Terpilih</p>
                            </div>
                        </div>

                        <!-- Button Simpan & Hitung -->
                        @auth
                            <button
                                type="button"
                                id="btn-hitung-rekomendasi"
                                onclick="simpanDanHitungRekomendasi()"
                                class="px-6 py-3 rounded-lg btn-cyber-primary text-[#002022] font-headline-sm text-xs font-black uppercase tracking-wider transition-all duration-200 active:scale-95 shadow-[0_0_25px_rgba(0,240,255,0.4)] hover:glow-cyan flex items-center justify-center gap-2"
                            >
                                <span
                                    class="material-symbols-outlined text-base font-bold animate-spin-hover"
                                    id="btn-calc-icon"
                                    >calculate</span
                                >
                                <span id="btn-calc-text">Simpan &amp; Hitung Rekomendasi</span>
                            </button>
                        @else
                            <button
                                type="button"
                                onclick="toggleModal('modal-login')"
                                class="px-6 py-3 rounded-lg btn-cyber-primary text-[#002022] font-headline-sm text-xs font-black uppercase tracking-wider transition-all duration-200 active:scale-95 shadow-[0_0_25px_rgba(0,240,255,0.4)] hover:glow-cyan flex items-center justify-center gap-2"
                            >
                                <span class="material-symbols-outlined text-base font-bold">lock</span>
                                <span>Masuk untuk Simpan &amp; Hitung Rekomendasi</span>
                            </button>
                        @endauth
                    </div>

                    <!-- Calculating Progress HUD Bar (Hidden by default, shown during calc) -->
                    <div
                        id="calc-progress-hud"
                        class="hidden p-4 rounded-xl bg-black/90 border border-primary text-center space-y-2 animate-in fade-in duration-150"
                    >
                        <div class="flex items-center justify-between text-xs font-code-metric text-primary">
                            <span class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm animate-spin">sync</span>
                                <span>MENGKALKULASI VEKTOR COSINE SIMILARITY DENGAN DATASET STEAM...</span>
                            </span>
                            <span id="calc-pct-text">98.4%</span>
                        </div>
                        <div class="w-full bg-[#1e293b] h-1.5 rounded-full overflow-hidden">
                            <div
                                class="bg-gradient-to-r from-primary via-secondary to-tertiary h-full w-full animate-pulse"
                            ></div>
                        </div>
                    </div>
                </div>

                {{-- ── 2. HASIL REKOMENDASI GAME (MUNCUL DI BAWAHNYA) ── --}}
                <div id="hasil-rekomendasi" class="space-y-6 scroll-mt-24">
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-primary/20"
                    >
                        <div>
                            <h3
                                class="text-xl sm:text-2xl font-headline-md font-extrabold text-white flex items-center gap-2.5"
                            >
                                <span
                                    class="w-8 h-8 rounded-lg bg-secondary/20 border border-secondary/60 flex items-center justify-center text-secondary shadow-[0_0_10px_rgba(181,55,242,0.4)]"
                                >
                                    <span class="material-symbols-outlined text-xl">auto_awesome</span>
                                </span>
                                <span>Rekomendasi Game Untukmu</span>
                            </h3>
                            <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Hasil Content-Based Filtering &amp; Cosine Similarity terkalibrasi dari preferensi genre &amp; game favorit Anda.</p>
                        </div>

                        <div class="flex items-center gap-2 text-xs font-code-metric">
                            <span class="text-on-surface-variant">DIURUTKAN:</span>
                            <span
                                class="text-primary font-bold flex items-center gap-1 bg-primary/10 border border-primary/30 px-2.5 py-1 rounded"
                            >
                                <span class="material-symbols-outlined text-xs">tune</span>
                                <span id="rec-status-badge">Kemiripan Tertinggi [S-TIER]</span>
                            </span>
                        </div>
                    </div>

                    <!-- Relative Container dengan Grid Kartu Game & Tactical Lock Overlay untuk Guest -->
                    <div class="relative">
                        <!-- Grid 8 Game Rekomendasi Terkalibrasi -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="recommended-games-grid">
                            <!-- Card 1: Elden Ring -->
                            <div
                                data-rec-card
                                data-genres="Soulslike, Souls-like, Dark Fantasy, RPG, Action"
                                class="bg-[#0f1422] rounded-xl border border-primary/40 hover:border-primary overflow-hidden flex flex-col group transition-all duration-300 shadow-lg hover:glow-cyan hover:-translate-y-1"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOnLaBUJanpII9wbcWasXlESOwboVv6hWa-BE-FPKqdbzLLLktqifw3ZFMx_lcG5PEZhzeILH2bdhFe__6MEwbfjy20co7xVJ2Bgevyy2N8IFBlpEtzCZSS0EZtQEcZBTaMxxNh-k1tbiuNx94c_cKjlXqERR0cYsfXnGOlS1Txiwt-BwIh8V7xeL_YhNKC_q64WAUzEvWYSmtQgvuCiKYRwUkaSpnD52k5Wm6ev3_VDZFfmHidt7P"
                                        alt="Elden Ring"
                                    />
                                    <span
                                        class="absolute top-3 right-3 px-2.5 py-1 rounded bg-[#080b11]/90 border border-primary/50 text-primary text-xs font-code-metric font-bold shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                                    >
                                        98% Cocok [S-TIER]
                                    </span>
                                    <span
                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-surface-container-high/90 text-[10px] text-on-surface border border-[#1e293b] font-code-metric"
                                    >
                                        PC Steam
                                    </span>
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <h4
                                                class="text-base font-headline-sm font-bold text-white group-hover:text-primary transition-colors"
                                            >
                                                Elden Ring
                                            </h4>
                                            <div
                                                class="flex items-center text-primary text-xs font-code-metric font-bold"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-sm text-primary"
                                                    style="font-variation-settings: 'FILL' 1"
                                                    >star</span
                                                >
                                                <span class="ml-1">4.9</span>
                                            </div>
                                        </div>
                                        <p class="text-xs font-code-metric text-on-surface-variant mb-3">FromSoftware Inc.</p>
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Souls-like</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Dark Fantasy</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >RPG</span
                                            >
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t border-[#1e293b] flex items-center justify-between">
                                        <span class="text-[11px] font-code-metric text-primary/80"
                                            >Vector Sim: 0.984</span
                                        >
                                        <button
                                            type="button"
                                            onclick="
                                                document.getElementById('modal-detail-game').classList.remove('hidden')
                                            "
                                            class="text-xs font-code-metric text-primary hover:underline flex items-center gap-1"
                                        >
                                            <span>Detail</span>
                                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2: The Witcher 3 -->
                            <div
                                data-rec-card
                                data-genres="RPG, Open World, Action"
                                class="bg-[#0f1422] rounded-xl border border-[#1e293b] hover:border-primary overflow-hidden flex flex-col group transition-all duration-300 shadow-lg hover:glow-cyan hover:-translate-y-1"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwemg0Lreg0jbncfqAkBpEFV8lnBULopgIWVbQNRcb2a_7QyuknvpijBRM02q9tyDWUgBJo0FtFnhEXntq0NOVNefbRQHq5v7qbbMHpe-aKTOfwXJR5kNajVYaEuqvciAbdW1SP6wAwkkEf9uRadpV8HGboJ8QUCzsC_-3CfNol_q27BT7IWtbzEZlr9EFC3q2PR4DzW69H_QEqAHdQ91OOJ0ADxK5bY-lTDK8B3wfNbEKGqjVoQW3"
                                        alt="The Witcher 3"
                                    />
                                    <span
                                        class="absolute top-3 right-3 px-2.5 py-1 rounded bg-[#080b11]/90 border border-primary/50 text-primary text-xs font-code-metric font-bold shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                                    >
                                        96% Cocok [S-TIER]
                                    </span>
                                    <span
                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-surface-container-high/90 text-[10px] text-on-surface border border-[#1e293b] font-code-metric"
                                    >
                                        PC Steam
                                    </span>
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <h4
                                                class="text-base font-headline-sm font-bold text-white group-hover:text-primary transition-colors"
                                            >
                                                The Witcher 3
                                            </h4>
                                            <div
                                                class="flex items-center text-primary text-xs font-code-metric font-bold"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-sm text-primary"
                                                    style="font-variation-settings: 'FILL' 1"
                                                    >star</span
                                                >
                                                <span class="ml-1">4.9</span>
                                            </div>
                                        </div>
                                        <p class="text-xs font-code-metric text-on-surface-variant mb-3">CD PROJEKT RED</p>
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >RPG</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Open World</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Action</span
                                            >
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t border-[#1e293b] flex items-center justify-between">
                                        <span class="text-[11px] font-code-metric text-primary/80"
                                            >Vector Sim: 0.962</span
                                        >
                                        <button
                                            type="button"
                                            onclick="
                                                document.getElementById('modal-detail-game').classList.remove('hidden')
                                            "
                                            class="text-xs font-code-metric text-primary hover:underline flex items-center gap-1"
                                        >
                                            <span>Detail</span>
                                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3: Baldur's Gate 3 -->
                            <div
                                data-rec-card
                                data-genres="RPG, CRPG, Choices Matter, Story Rich, Strategy, Turn-Based"
                                class="bg-[#0f1422] rounded-xl border border-[#1e293b] hover:border-primary overflow-hidden flex flex-col group transition-all duration-300 shadow-lg hover:glow-cyan hover:-translate-y-1"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3vtl9hMwKCSMOUnF7nt0qUAUDsT3nysmgjswQOycScVqH0ea6F0dknMzb5rT14WlvQBOTZuWaSDXBGDnvD_Kncs0iT4Hes4GkdGyi-DD4q5BVqB5-2nD7c0eKzMgU_ta4v9fTNiT9STZwhxxcVnIMkwVn3O9QCPYcB3AYWTYDfdEBaw7QCZF1nR-Y4mOXbhC6539gZwzWtaqJDXHL_gez_EIUhfE2Gg9o9DzB-JL0f-QYWTmL_K3y"
                                        alt="Baldurs Gate 3"
                                    />
                                    <span
                                        class="absolute top-3 right-3 px-2.5 py-1 rounded bg-[#080b11]/90 border border-secondary/50 text-secondary text-xs font-code-metric font-bold shadow-[0_0_8px_rgba(192,132,252,0.4)]"
                                    >
                                        94% Cocok
                                    </span>
                                    <span
                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-surface-container-high/90 text-[10px] text-on-surface border border-[#1e293b] font-code-metric"
                                    >
                                        PC Steam
                                    </span>
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <h4
                                                class="text-base font-headline-sm font-bold text-white group-hover:text-primary transition-colors"
                                            >
                                                Baldur's Gate 3
                                            </h4>
                                            <div
                                                class="flex items-center text-primary text-xs font-code-metric font-bold"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-sm text-primary"
                                                    style="font-variation-settings: 'FILL' 1"
                                                    >star</span
                                                >
                                                <span class="ml-1">4.9</span>
                                            </div>
                                        </div>
                                        <p class="text-xs font-code-metric text-on-surface-variant mb-3">Larian Studios</p>
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >CRPG</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Story Rich</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Strategy</span
                                            >
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t border-[#1e293b] flex items-center justify-between">
                                        <span class="text-[11px] font-code-metric text-secondary/80"
                                            >Vector Sim: 0.941</span
                                        >
                                        <button
                                            type="button"
                                            onclick="
                                                document.getElementById('modal-detail-game').classList.remove('hidden')
                                            "
                                            class="text-xs font-code-metric text-primary hover:underline flex items-center gap-1"
                                        >
                                            <span>Detail</span>
                                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4: Hades -->
                            <div
                                data-rec-card
                                data-genres="Action, Roguelike, Indie, Mythic"
                                class="bg-[#0f1422] rounded-xl border border-[#1e293b] hover:border-primary overflow-hidden flex flex-col group transition-all duration-300 shadow-lg hover:glow-cyan hover:-translate-y-1"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYuW_xXnMEVfxrhqvi2OOoXgs9NchK--CYmarRzlUAEFVY2euOq4K94-KrhMJOUouur_6rCe6oH2j82vVTgEpwVHHPzkfAVMflWXz6Ox4_mHpmO4c1u2W7lJ9P9P9NKsOea3-1WQSDxA9TiyssU_pWgtz0SGZPkxpvsEGF-8T4mzMRyXsOIKdDy-SXpPNGXhPFbwn7UVI-QudR_qvVBAsHhQQPksTg_JBhfTxEMejwF66vhbcrRnqN"
                                        alt="Hades"
                                    />
                                    <span
                                        class="absolute top-3 right-3 px-2.5 py-1 rounded bg-[#080b11]/90 border border-primary/50 text-primary text-xs font-code-metric font-bold shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                                    >
                                        92% Cocok
                                    </span>
                                    <span
                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-surface-container-high/90 text-[10px] text-on-surface border border-[#1e293b] font-code-metric"
                                    >
                                        PC Steam
                                    </span>
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <h4
                                                class="text-base font-headline-sm font-bold text-white group-hover:text-primary transition-colors"
                                            >
                                                Hades
                                            </h4>
                                            <div
                                                class="flex items-center text-primary text-xs font-code-metric font-bold"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-sm text-primary"
                                                    style="font-variation-settings: 'FILL' 1"
                                                    >star</span
                                                >
                                                <span class="ml-1">4.8</span>
                                            </div>
                                        </div>
                                        <p class="text-xs font-code-metric text-on-surface-variant mb-3">Supergiant Games</p>
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Roguelike</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Action</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Indie</span
                                            >
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t border-[#1e293b] flex items-center justify-between">
                                        <span class="text-[11px] font-code-metric text-primary/80"
                                            >Vector Sim: 0.923</span
                                        >
                                        <button
                                            type="button"
                                            onclick="
                                                document.getElementById('modal-detail-game').classList.remove('hidden')
                                            "
                                            class="text-xs font-code-metric text-primary hover:underline flex items-center gap-1"
                                        >
                                            <span>Detail</span>
                                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 5: Cyberpunk 2077 -->
                            <div
                                data-rec-card
                                data-genres="RPG, Open World, Shooter, Action, Sci-Fi"
                                class="bg-[#0f1422] rounded-xl border border-[#1e293b] hover:border-primary overflow-hidden flex flex-col group transition-all duration-300 shadow-lg hover:glow-cyan hover:-translate-y-1"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQjPavzwmRZx2cqfOCfH8v3nlw6Bx-Ea4jkzGG22O1Pa9BkPcK6IFN4cHuORgWSrpcUR7gGEgrb-RKSa0QLSy8MrRxl9-FWp2vBpyt4Ee3PwPyl-oa7ypP5Gfl5m7lz42Lrwk5bDRTzNlbZ3jRmeAmGQPAhw_KwHx38hpvW27WMR7CsajiOPFQbI-iVrZqXr_lhpbBBZ1sAKS3wnb-Ozz3A0kqwrzBuDsQLKm9VBfOrUt3bTy1-orh"
                                        alt="Cyberpunk 2077"
                                    />
                                    <span
                                        class="absolute top-3 right-3 px-2.5 py-1 rounded bg-[#080b11]/90 border border-primary/50 text-primary text-xs font-code-metric font-bold shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                                    >
                                        91% Cocok
                                    </span>
                                    <span
                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-surface-container-high/90 text-[10px] text-on-surface border border-[#1e293b] font-code-metric"
                                    >
                                        PC Steam
                                    </span>
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <h4
                                                class="text-base font-headline-sm font-bold text-white group-hover:text-primary transition-colors"
                                            >
                                                Cyberpunk 2077
                                            </h4>
                                            <div
                                                class="flex items-center text-primary text-xs font-code-metric font-bold"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-sm text-primary"
                                                    style="font-variation-settings: 'FILL' 1"
                                                    >star</span
                                                >
                                                <span class="ml-1">4.8</span>
                                            </div>
                                        </div>
                                        <p class="text-xs font-code-metric text-on-surface-variant mb-3">CD PROJEKT RED</p>
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Open World</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >RPG</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Sci-Fi</span
                                            >
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t border-[#1e293b] flex items-center justify-between">
                                        <span class="text-[11px] font-code-metric text-primary/80"
                                            >Vector Sim: 0.915</span
                                        >
                                        <button
                                            type="button"
                                            onclick="
                                                document.getElementById('modal-detail-game').classList.remove('hidden')
                                            "
                                            class="text-xs font-code-metric text-primary hover:underline flex items-center gap-1"
                                        >
                                            <span>Detail</span>
                                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 6: Red Dead Redemption 2 -->
                            <div
                                data-rec-card
                                data-genres="Open World, Story Rich, Action, Adventure"
                                class="bg-[#0f1422] rounded-xl border border-[#1e293b] hover:border-primary overflow-hidden flex flex-col group transition-all duration-300 shadow-lg hover:glow-cyan hover:-translate-y-1"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBt3kRWe3gqcgNUP7sHXAT6by2CXp7l8gsSWnHhCmjBFYrMKM9JCW570BZT7NoPCWp48iUX5nxmxFkLmstMLFn2WpRCEVLG7CwXSFlaHlyJu8B4amE4kJQgDeSRBkKRrlMKC9Y2-QgIo-LpvNKEcNFTps_qgustrhfblJU9yeLJNPkxsOhjx-4j9l-VHN5dBbTebg_LkKl0jcmZur1KmYpZD-hN8mKgVq92Dj-LELMoHrP23r6n0NNk"
                                        alt="Red Dead Redemption 2"
                                    />
                                    <span
                                        class="absolute top-3 right-3 px-2.5 py-1 rounded bg-[#080b11]/90 border border-primary/50 text-primary text-xs font-code-metric font-bold shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                                    >
                                        89% Cocok
                                    </span>
                                    <span
                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-surface-container-high/90 text-[10px] text-on-surface border border-[#1e293b] font-code-metric"
                                    >
                                        PC Steam
                                    </span>
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <h4
                                                class="text-base font-headline-sm font-bold text-white group-hover:text-primary transition-colors"
                                            >
                                                Red Dead Redemption 2
                                            </h4>
                                            <div
                                                class="flex items-center text-primary text-xs font-code-metric font-bold"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-sm text-primary"
                                                    style="font-variation-settings: 'FILL' 1"
                                                    >star</span
                                                >
                                                <span class="ml-1">4.9</span>
                                            </div>
                                        </div>
                                        <p class="text-xs font-code-metric text-on-surface-variant mb-3">Rockstar Games</p>
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Open World</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Story Rich</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Action</span
                                            >
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t border-[#1e293b] flex items-center justify-between">
                                        <span class="text-[11px] font-code-metric text-primary/80"
                                            >Vector Sim: 0.895</span
                                        >
                                        <button
                                            type="button"
                                            onclick="
                                                document.getElementById('modal-detail-game').classList.remove('hidden')
                                            "
                                            class="text-xs font-code-metric text-primary hover:underline flex items-center gap-1"
                                        >
                                            <span>Detail</span>
                                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 7: Monster Hunter: World -->
                            <div
                                data-rec-card
                                data-genres="Action, RPG, Co-op, Multiplayer"
                                class="bg-[#0f1422] rounded-xl border border-[#1e293b] hover:border-primary overflow-hidden flex flex-col group transition-all duration-300 shadow-lg hover:glow-cyan hover:-translate-y-1"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNswDdYr0ZNIizGj1u97PwBl2PV6Ob7YCS_VLwigiL4yGKMinkOdgJ5NBgw65FlsZhkLZkjQpmQPPxhoXncKv71t-czNfazGde-f17rJRzdEwZGK8xOUtPO-0ColF9uD73CEPAk2SPQHh9qll2GHbhmB5xkmYcK-AsvgToYdIv9UEsFonL_g1o_EzjFBjv2KqJaHz6GqfYwvIG96IFkUGRy3k3M2BtLN5tsetLJv0Xo7nD8vDsgADk"
                                        alt="Monster Hunter World"
                                    />
                                    <span
                                        class="absolute top-3 right-3 px-2.5 py-1 rounded bg-[#080b11]/90 border border-primary/50 text-primary text-xs font-code-metric font-bold shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                                    >
                                        88% Cocok
                                    </span>
                                    <span
                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-surface-container-high/90 text-[10px] text-on-surface border border-[#1e293b] font-code-metric"
                                    >
                                        PC Steam
                                    </span>
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <h4
                                                class="text-base font-headline-sm font-bold text-white group-hover:text-primary transition-colors"
                                            >
                                                Monster Hunter: World
                                            </h4>
                                            <div
                                                class="flex items-center text-primary text-xs font-code-metric font-bold"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-sm text-primary"
                                                    style="font-variation-settings: 'FILL' 1"
                                                    >star</span
                                                >
                                                <span class="ml-1">4.8</span>
                                            </div>
                                        </div>
                                        <p class="text-xs font-code-metric text-on-surface-variant mb-3">Capcom</p>
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Action</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >RPG</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Co-op</span
                                            >
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t border-[#1e293b] flex items-center justify-between">
                                        <span class="text-[11px] font-code-metric text-primary/80"
                                            >Vector Sim: 0.882</span
                                        >
                                        <button
                                            type="button"
                                            onclick="
                                                document.getElementById('modal-detail-game').classList.remove('hidden')
                                            "
                                            class="text-xs font-code-metric text-primary hover:underline flex items-center gap-1"
                                        >
                                            <span>Detail</span>
                                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 8: God of War -->
                            <div
                                data-rec-card
                                data-genres="Action, Mythology, Story Rich, Adventure"
                                class="bg-[#0f1422] rounded-xl border border-[#1e293b] hover:border-primary overflow-hidden flex flex-col group transition-all duration-300 shadow-lg hover:glow-cyan hover:-translate-y-1"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtYx5wxB1xfQm6WhsyK72oYqA815YA3ekhXkSieWr4nzC7nuRcGsL8xCZUwDUkM5j5pLl4uOOVenR1FfekslRzGyb_eosSBz8lZHddEXlPTyBfVW0jj5swVuDSRrRTikElYp8m0-A8sPpQVbrBw3X50YWmPHyapYh5g9FQmIFn2m3oFh8HNBmDkZO3QXC7mFNMpAL1u6dapuZ3ZTCTiiOCfesyNo_d8B4J1nfIjKdlMUv1Z0LWp4M-"
                                        alt="God of War"
                                    />
                                    <span
                                        class="absolute top-3 right-3 px-2.5 py-1 rounded bg-[#080b11]/90 border border-primary/50 text-primary text-xs font-code-metric font-bold shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                                    >
                                        87% Cocok
                                    </span>
                                    <span
                                        class="absolute top-3 left-3 px-2 py-0.5 rounded bg-surface-container-high/90 text-[10px] text-on-surface border border-[#1e293b] font-code-metric"
                                    >
                                        PC Steam
                                    </span>
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <div class="flex items-center justify-between mb-1">
                                            <h4
                                                class="text-base font-headline-sm font-bold text-white group-hover:text-primary transition-colors"
                                            >
                                                God of War
                                            </h4>
                                            <div
                                                class="flex items-center text-primary text-xs font-code-metric font-bold"
                                            >
                                                <span
                                                    class="material-symbols-outlined text-sm text-primary"
                                                    style="font-variation-settings: 'FILL' 1"
                                                    >star</span
                                                >
                                                <span class="ml-1">4.9</span>
                                            </div>
                                        </div>
                                        <p class="text-xs font-code-metric text-on-surface-variant mb-3">Santa Monica Studio</p>
                                        <div class="flex flex-wrap gap-1.5 mb-4">
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Action</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Mythology</span
                                            >
                                            <span
                                                class="px-2 py-0.5 rounded bg-[#151c2d] border border-[#1e293b] text-[11px] font-code-metric text-on-surface"
                                                >Story Rich</span
                                            >
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t border-[#1e293b] flex items-center justify-between">
                                        <span class="text-[11px] font-code-metric text-primary/80"
                                            >Vector Sim: 0.874</span
                                        >
                                        <button
                                            type="button"
                                            onclick="
                                                document.getElementById('modal-detail-game').classList.remove('hidden')
                                            "
                                            class="text-xs font-code-metric text-primary hover:underline flex items-center gap-1"
                                        >
                                            <span>Detail</span>
                                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @guest
                            <!-- Semi-Transparent Overlay Card Di Tengah (Tactical Lock Screen untuk Tamu) -->
                            <div
                                class="absolute inset-0 bg-[#080b11]/85 backdrop-blur-[8px] rounded-2xl flex items-center justify-center p-6 z-10 border border-primary/30"
                            >
                                <div
                                    class="max-w-md w-full bg-[#0f1422] border-2 border-primary/50 rounded-2xl p-8 text-center shadow-[0_0_50px_rgba(0,240,255,0.25)] tech-corner-accent"
                                >
                                    <div
                                        class="w-14 h-14 rounded-xl bg-primary/20 text-primary border border-primary/50 flex items-center justify-center mx-auto mb-4 shadow-[0_0_20px_rgba(0,240,255,0.4)]"
                                    >
                                        <span class="material-symbols-outlined text-3xl">lock_open</span>
                                    </div>
                                    <h3
                                        class="text-2xl font-headline-sm font-extrabold text-white uppercase tracking-wide mb-2"
                                    >
                                        Rekomendasi Personal Penuh
                                    </h3>
                                    <p class="text-body-md font-body-md text-on-surface-variant mb-6">Masuk untuk menyimpan preferensi genre, game favorit, dan mengkalkulasi rekomendasi AI personal tanpa batas.</p>
                                    <div class="flex items-center justify-center gap-4">
                                        <button
                                            class="px-6 py-2.5 rounded border border-primary/50 text-primary hover:bg-primary/10 transition-all text-xs font-label-md uppercase tracking-wider font-bold"
                                            onclick="toggleModal('modal-login')"
                                        >
                                            Masuk
                                        </button>
                                        <button
                                            class="px-7 py-2.5 rounded btn-cyber-primary text-[#002022] hover:bg-primary transition-all text-xs font-label-md uppercase tracking-wider font-extrabold"
                                            onclick="toggleModal('modal-register')"
                                        >
                                            Daftar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endguest

                        @auth
                            <!-- Logged-in: History & Stat Bar -->
                            <div
                                class="mt-6 p-4 bg-[#0f1422] border border-[#1e293b] rounded-xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4"
                            >
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-tertiary/20 border border-tertiary/40 flex items-center justify-center text-tertiary"
                                    >
                                        <span class="material-symbols-outlined text-xl">history</span>
                                    </div>
                                    <div>
                                        <p class="text-white text-sm font-bold">Riwayat Rekomendasi Terkalibrasi</p>
                                        <p class="text-on-surface-variant text-xs font-code-metric">Tersimpan otomatis sesuai kalkulasi genre &amp; game favorit Anda</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button
                                        type="button"
                                        onclick="toggleModal('modal-history')"
                                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded border border-tertiary/40 hover:border-tertiary text-tertiary hover:bg-tertiary/10 text-xs font-label-md uppercase tracking-wider font-bold transition-all shadow-[0_0_12px_rgba(0,255,163,0.15)]"
                                    >
                                        <span class="material-symbols-outlined text-sm">history</span>
                                        Lihat Semua History
                                    </button>
                                    @if (auth()->user()->isAdmin())
                                        <a
                                            href="{{ route('dashboard.admin') }}"
                                            class="inline-flex items-center gap-1.5 px-4 py-2 rounded border border-secondary/40 hover:border-secondary text-secondary hover:bg-secondary/10 text-xs font-label-md uppercase tracking-wider font-bold transition-all"
                                        >
                                            <span class="material-symbols-outlined text-sm">admin_panel_settings</span>
                                            Kelola di Admin ML
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
        <!-- 4. TENTANG SECTION -->
        <section class="py-20 bg-[#080b11] border-b border-[#1e293b]" id="tentang">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <!-- Left Text Content -->
                    <div class="lg:col-span-6 flex flex-col gap-6">
                        <div>
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1 rounded bg-secondary/10 border border-secondary/40 text-secondary text-xs font-code-metric uppercase tracking-wider mb-2"
                            >
                                <span class="material-symbols-outlined text-sm" data-icon="memory">memory</span>
                                ARSITEKTUR AI &amp; DATA
                            </div>
                            <h2
                                class="text-3xl md:text-4xl font-headline-lg font-bold text-white uppercase tracking-tight mt-1"
                            >
                                Tentang Algoritma &amp; Dataset
                            </h2>
                        </div>
                        <p
                            class="text-body-md font-body-md text-on-surface-variant leading-relaxed"
                        >Sistem rekomendasi GameMatch mengimplementasikan pendekatan <strong>Content-Based Filtering</strong> murni. Alih-alih mengandalkan rating pengguna lain yang rentan bias (seperti collaborative filtering), mesin kami mengkaji profil intrinsik setiap game: kombinasi genre, tag deskripsi Steam, developer, publisher, dan fitur gameplay.</p>
                        <p
                            class="text-body-md font-body-md text-on-surface-variant leading-relaxed"
                        >Setiap metadata ditransformasikan ke dalam representasi vektor multi-dimensi menggunakan pembobotan frekuensi istilah (TF-IDF). Dari matriks tersebut, kedekatan antar game diukur melalui sudut cosinus dari dua vektor fitur non-nol.</p>
                        <div
                            class="p-4 rounded-xl bg-[#0f1422] border border-primary/30 flex items-start gap-3 tech-corner-accent shadow-[0_4px_15px_rgba(0,0,0,0.4)]"
                        >
                            <span
                                class="material-symbols-outlined text-primary text-2xl mt-0.5 shadow-[0_0_10px_rgba(0,240,255,0.4)]"
                                data-icon="dataset"
                                >dataset</span
                            >
                            <div>
                                <h4
                                    class="text-base font-headline-sm font-bold text-white mb-1 uppercase tracking-wide"
                                >
                                    Dataset Kaggle (Steam PC Games)
                                </h4>
                                <p class="text-body-sm font-body-sm text-on-surface-variant">Data game bersumber dari dataset Kaggle (Steam PC Games) terverifikasi dengan pembersihan data kontinu mencakup 50.000+ entri katalog aktif, tag komunitas, dan rating ulasan positif.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Right: Visual Formula & Stats Bento (Sci-Fi Holographic Formula Terminal) -->
                    <div class="lg:col-span-6 flex flex-col gap-6">
                        <!-- Mathematical Formula Card -->
                        <div
                            class="bg-[#0f1422] rounded-2xl border-2 border-primary/50 p-6 shadow-[0_0_35px_rgba(0,240,255,0.2)] relative overflow-hidden tech-corner-accent"
                        >
                            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 rounded-full blur-3xl"></div>
                            <div class="flex items-center justify-between pb-3 mb-4 border-b border-[#1e293b]">
                                <span
                                    class="text-xs font-code-metric text-primary font-bold flex items-center gap-1.5 uppercase tracking-wider"
                                >
                                    <span class="material-symbols-outlined text-sm" data-icon="calculate"
                                        >calculate</span
                                    >
                                    FORMULA COSINE SIMILARITY
                                </span>
                                <span class="text-xs font-code-metric text-on-surface-variant uppercase"
                                    >Metrik Vektor Geometris</span
                                >
                            </div>
                            <!-- Holographic Formula Block -->
                            <div
                                class="py-7 px-4 bg-[#080b11] rounded-xl border border-primary/30 text-center my-2 shadow-[inset_0_0_20px_rgba(0,240,255,0.1)] relative"
                            >
                                <p
                                    class="text-primary font-code-metric text-lg sm:text-2xl font-extrabold tracking-wider drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]"
                                >
                                    Similarity(A, B) =
                                    <span class="text-secondary">(A · B)</span> /
                                    <span class="text-white">(||A|| * ||B||)</span>
                                </p>
                                <p
                                    class="text-xs font-code-metric text-on-surface-variant mt-3 uppercase tracking-wider"
                                >di mana A dan B adalah vektor bobot fitur game pada ruang dimensi N</p>
                            </div>
                            <div class="grid grid-cols-2 gap-3 mt-4 text-xs font-code-metric">
                                <div class="p-3 bg-[#131a2b] rounded-lg border border-[#1e293b]">
                                    <span class="text-on-surface-variant block uppercase text-[10px]"
                                        >Nilai Rentang:</span
                                    >
                                    <span class="text-white font-bold text-xs mt-0.5 block"
                                        >0.0 (Beda) s/d 1.0 (Identik)</span
                                    >
                                </div>
                                <div class="p-3 bg-[#131a2b] rounded-lg border border-[#1e293b]">
                                    <span class="text-on-surface-variant block uppercase text-[10px]"
                                        >Kompleksitas Komputasi:</span
                                    >
                                    <span class="text-primary font-bold text-xs mt-0.5 block">O(N) Dot Product</span>
                                </div>
                            </div>
                        </div>
                        <!-- Structured Dataset Telemetry Box -->
                        <div class="grid grid-cols-3 gap-4">
                            <div
                                class="bg-[#0f1422] rounded-xl p-4 border border-[#1e293b] text-center hover:border-primary/40 transition-colors"
                            >
                                <span class="text-[11px] font-code-metric text-on-surface-variant block uppercase"
                                    >Total Judul</span
                                >
                                <span class="text-2xl font-headline-md font-extrabold text-white mt-1 block"
                                    >52.840</span
                                >
                                <span class="text-[10px] font-code-metric text-tertiary">Terindeks Penuh</span>
                            </div>
                            <div
                                class="bg-[#0f1422] rounded-xl p-4 border border-[#1e293b] text-center hover:border-secondary/40 transition-colors"
                            >
                                <span class="text-[11px] font-code-metric text-on-surface-variant block uppercase"
                                    >Vektor Dimensi</span
                                >
                                <span
                                    class="text-2xl font-headline-md font-extrabold text-secondary mt-1 block drop-shadow-[0_0_8px_rgba(192,132,252,0.4)]"
                                    >348</span
                                >
                                <span class="text-[10px] font-code-metric text-on-surface-variant"
                                    >Fitur Tag TF-IDF</span
                                >
                            </div>
                            <div
                                class="bg-[#0f1422] rounded-xl p-4 border border-[#1e293b] text-center hover:border-primary/40 transition-colors"
                            >
                                <span class="text-[11px] font-code-metric text-on-surface-variant block uppercase"
                                    >Update Berkala</span
                                >
                                <span
                                    class="text-2xl font-headline-md font-extrabold text-primary mt-1 block drop-shadow-[0_0_8px_rgba(0,240,255,0.4)]"
                                    >24 Jam</span
                                >
                                <span class="text-[10px] font-code-metric text-primary/80">Steam Sync API</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include ('partials.footer')
    @include ('partials.modal-login')
    @include ('partials.modal-register')
    @include ('partials.modal-history')
    @include ('partials.modal-game-detail')
@endsection

@section ('scripts')
    <script>
        // State Preferensi Cold-Start
        let selectedGenres = ['Action', 'RPG', 'Open World', 'Souls-like'];
        let selectedRefGames = ['Cyberpunk 2077', 'Elden Ring', "Baldur's Gate 3"];

        // Toggle Genre Chip
        function toggleGenreChip(button) {
            const genre = button.getAttribute('data-genre');
            const checkIcon = button.querySelector('.chip-check');

            if (selectedGenres.includes(genre)) {
                selectedGenres = selectedGenres.filter((g) => g !== genre);
                button.classList.remove(
                    'bg-primary',
                    'text-[#002022]',
                    'font-bold',
                    'border-primary',
                    'shadow-[0_0_12px_rgba(0,240,255,0.4)]',
                );
                button.classList.add('border-[#1e293b]', 'text-on-surface-variant', 'bg-surface-container/60');
                if (checkIcon) checkIcon.classList.add('hidden');
            } else {
                selectedGenres.push(genre);
                button.classList.add(
                    'bg-primary',
                    'text-[#002022]',
                    'font-bold',
                    'border-primary',
                    'shadow-[0_0_12px_rgba(0,240,255,0.4)]',
                );
                button.classList.remove('border-[#1e293b]', 'text-on-surface-variant', 'bg-surface-container/60');
                if (checkIcon) checkIcon.classList.remove('hidden');
            }

            updateTelemetry();
        }

        // Pilih Semua Genre
        function selectAllGenres() {
            document.querySelectorAll('.genre-chip[data-genre]').forEach((button) => {
                const genre = button.getAttribute('data-genre');
                if (!selectedGenres.includes(genre)) {
                    selectedGenres.push(genre);
                }
                button.classList.add(
                    'bg-primary',
                    'text-[#002022]',
                    'font-bold',
                    'border-primary',
                    'shadow-[0_0_12px_rgba(0,240,255,0.4)]',
                );
                button.classList.remove('border-[#1e293b]', 'text-on-surface-variant', 'bg-surface-container/60');
                const checkIcon = button.querySelector('.chip-check');
                if (checkIcon) checkIcon.classList.remove('hidden');
            });
            updateTelemetry();
        }

        // Reset Genre Filter
        function resetGenreFilter() {
            selectedGenres = [];
            document.querySelectorAll('.genre-chip[data-genre]').forEach((button) => {
                button.classList.remove(
                    'bg-primary',
                    'text-[#002022]',
                    'font-bold',
                    'border-primary',
                    'shadow-[0_0_12px_rgba(0,240,255,0.4)]',
                );
                button.classList.add('border-[#1e293b]', 'text-on-surface-variant', 'bg-surface-container/60');
                const checkIcon = button.querySelector('.chip-check');
                if (checkIcon) checkIcon.classList.add('hidden');
            });
            updateTelemetry();
        }

        // Toggle Reference Game Selection
        function toggleReferenceGame(card, title) {
            const checkIndicator = card.querySelector('.check-indicator');

            if (selectedRefGames.includes(title)) {
                selectedRefGames = selectedRefGames.filter((t) => t !== title);
                card.classList.remove(
                    'border-primary',
                    'ring-1',
                    'ring-primary/80',
                    'bg-primary/5',
                    'shadow-[0_0_15px_rgba(0,240,255,0.25)]',
                );
                card.classList.add('border-[#1e293b]');
                if (checkIndicator) {
                    checkIndicator.classList.remove(
                        'bg-primary',
                        'text-[#002022]',
                        'shadow-[0_0_8px_rgba(0,240,255,0.8)]',
                    );
                    checkIndicator.classList.add('bg-black/60', 'text-white/40', 'border', 'border-white/20');
                }
            } else {
                selectedRefGames.push(title);
                card.classList.add(
                    'border-primary',
                    'ring-1',
                    'ring-primary/80',
                    'bg-primary/5',
                    'shadow-[0_0_15px_rgba(0,240,255,0.25)]',
                );
                card.classList.remove('border-[#1e293b]');
                if (checkIndicator) {
                    checkIndicator.classList.add(
                        'bg-primary',
                        'text-[#002022]',
                        'shadow-[0_0_8px_rgba(0,240,255,0.8)]',
                    );
                    checkIndicator.classList.remove('bg-black/60', 'text-white/40', 'border', 'border-white/20');
                }
            }

            updateTelemetry();
        }

        // Filter Search Reference Games Live
        function filterReferenceGames(query) {
            const q = (query || '').toLowerCase().trim();
            const cards = document.querySelectorAll('.ref-game-card');

            cards.forEach((card) => {
                const title = card.getAttribute('data-ref-title') || '';
                const genres = card.getAttribute('data-ref-genres') || '';
                if (!q || title.includes(q) || genres.includes(q)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Update Telemetry Indicators
        function updateTelemetry() {
            const detailSummary = document.getElementById('cfg-detail-summary');
            const favCountBadge = document.getElementById('fav-games-count-badge');

            if (detailSummary) {
                detailSummary.textContent = `${selectedGenres.length} Genre Aktif • ${selectedRefGames.length} Game Favorit Terpilih`;
            }
            if (favCountBadge) {
                favCountBadge.textContent = `${selectedRefGames.length} Game Terpilih`;
            }
        }

        // Simpan & Hitung Rekomendasi Game (Cosine Similarity Algorithm Flow)
        function simpanDanHitungRekomendasi() {
            const btn = document.getElementById('btn-hitung-rekomendasi');
            const btnText = document.getElementById('btn-calc-text');
            const btnIcon = document.getElementById('btn-calc-icon');
            const hud = document.getElementById('calc-progress-hud');

            if (btn) btn.disabled = true;
            if (btnText) btnText.textContent = 'Mengkalkulasi Vektor...';
            if (btnIcon) btnIcon.classList.add('animate-spin');
            if (hud) hud.classList.remove('hidden');

            setTimeout(() => {
                // Selesai kalkulasi: sembunyikan HUD progress
                if (hud) hud.classList.add('hidden');
                if (btn) btn.disabled = false;
                if (btnText) btnText.textContent = 'Simpan & Hitung Rekomendasi';
                if (btnIcon) btnIcon.classList.remove('animate-spin');

                // Filter & Re-rank rekomendasi kartu di bawahnya
                applyRecommendations();

                // Smooth scroll ke bagian hasil rekomendasi
                const hasilSection = document.getElementById('hasil-rekomendasi');
                if (hasilSection) {
                    hasilSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }

                // Tampilkan toast
                if (window.GameMatchFlow && window.GameMatchFlow.showToast) {
                    window.GameMatchFlow.showToast(
                        'REKOMENDASI TERKALIBRASI',
                        'Preferensi disimpan! Menampilkan game dengan skor kemiripan tertinggi.',
                        'cyan',
                        3000,
                    );
                }
            }, 450);
        }

        // Terapkan hasil rekomendasi pada kartu di bawah
        function applyRecommendations() {
            const recCards = document.querySelectorAll('[data-rec-card]');
            const statusBadge = document.getElementById('rec-status-badge');

            let visibleCount = 0;
            recCards.forEach((card, idx) => {
                const cardGenres = (card.getAttribute('data-genres') || '')
                    .split(',')
                    .map((s) => s.trim().toLowerCase());

                if (selectedGenres.length === 0) {
                    card.style.display = '';
                    card.style.opacity = '1';
                    visibleCount++;
                } else {
                    const matches = selectedGenres.some((g) => cardGenres.includes(g.toLowerCase()));
                    if (matches) {
                        card.style.display = '';
                        card.style.opacity = '1';
                        visibleCount++;
                    } else {
                        // Tetap tampilkan tapi dengan opacity lebih rendah jika di luar fokus utama
                        if (visibleCount < 4) {
                            card.style.display = '';
                            card.style.opacity = '0.4';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                }
            });

            if (statusBadge) {
                statusBadge.textContent = `Terkalibrasi (${selectedGenres.length} Genre, ${selectedRefGames.length} Game Ref)`;
            }
        }

        // Inisialisasi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', () => {
            updateTelemetry();
        });
    </script>
@endsection
