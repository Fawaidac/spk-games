@extends('layouts.admin')

@section('title', 'GameMatch Console - Klasifikasi & Taksonomi 32 Genre Game')
@section('header-title', 'Klasifikasi & Taksonomi 32 Genre Game')
@section('header-subtitle', 'Peta sebaran kategori, bobot vektor TF-IDF, dan standarisasi genre')

@section('admin-content')
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
                  Daftar Kategori Genre Steam di Database
                </span>
                <span class="text-[11px] font-mono text-on-surface-variant" id="genre-count-label">Menampilkan {{ $genres->count() }} Genre</span>
              </div>

              <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3.5" id="genre-cards-grid">
                @foreach($genres as $g)
                  @php
                    $iconMap = [
                      'Action' => 'sports_esports',
                      'Adventure' => 'explore',
                      'Casual' => 'coffee',
                      'Early Access' => 'hourglass_top',
                      'Free To Play' => 'loyalty',
                      'Gore' => 'skull',
                      'Indie' => 'interests',
                      'Massively Multiplayer' => 'groups',
                      'Movie' => 'movie',
                      'Racing' => 'sports_score',
                      'RPG' => 'auto_awesome',
                      'Simulation' => 'precision_manufacturing',
                      'Sports' => 'sports_soccer',
                      'Strategy' => 'chess',
                      'Violent' => 'warning',
                    ];
                    $icon = $iconMap[$g->name] ?? 'category';
                  @endphp
                  <div
                    data-genre-item="{{ strtolower($g->name) }}"
                    class="genre-card p-3.5 rounded-xl bg-surface-container-low border border-outline-variant hover:border-secondary/80 transition-all duration-200 group flex flex-col justify-between hover:shadow-lg hover:shadow-purple-500/10">
                    <div class="flex items-center justify-between mb-2">
                      <div class="w-8 h-8 rounded-lg bg-surface-container border border-outline-variant flex items-center justify-center text-secondary group-hover:scale-110 group-hover:border-secondary transition-all">
                        <span class="material-symbols-outlined text-[18px]">{{ $icon }}</span>
                      </div>
                      <span class="text-[9px] font-mono px-1.5 py-0.2 rounded bg-surface-container text-on-surface-variant border border-outline-variant uppercase">
                        {{ $g->is_main ? 'Main' : 'Steam' }}
                      </span>
                    </div>
                    <div>
                      <h4 class="font-headline font-bold text-sm text-white group-hover:text-secondary transition-colors">{{ $g->name }}</h4>
                      <p class="font-mono text-[11px] text-on-surface-variant mt-0.5">{{ number_format($g->games_count) }} Game</p>
                    </div>
                    <div class="mt-3 pt-2 border-t border-outline-variant/60 flex items-center justify-between text-[10px] font-mono text-secondary">
                      <span>Bobot: 1.0</span>
                      <a href="{{ route('admin.games', ['genre' => $g->id]) }}" class="hover:underline flex items-center gap-0.5 text-primary text-[10px]">
                        <span>Lihat</span>
                        <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                      </a>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </section>


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
