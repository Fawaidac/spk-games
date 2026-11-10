@extends('layouts.admin')

@section('title', 'GameMatch Console - Katalog & Manajemen Data Game PC')
@section('header-title', 'Katalog & Manajemen Data Game PC')
@section('header-subtitle', 'Eksplorasi, kurasi, dan manajemen metadata ' . number_format($totalGames) . ' game Steam')

@section('admin-content')
<!-- ========================================== -->
<!-- SECTION DATA GAME PC (HUD MISSION TABLE)  -->
<!-- ========================================== -->
<section
  class="bg-surface-container/90 rounded-xl border border-outline-variant shadow-2xl overflow-hidden relative"
  id="datagame"
>
  <!-- HUD Accent Line Top -->
  <div class="h-0.5 w-full bg-gradient-to-r from-primary via-secondary to-tertiary"></div>

  <!-- Header & Filter Bar -->
  <div class="p-6 border-b border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-primary text-[22px]" data-icon="storage">storage</span>
        <h3 class="font-headline font-bold text-lg text-white uppercase tracking-wider">
          Data Game PC
        </h3>
        <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-primary/20 text-primary border border-primary/40">
          {{ number_format($totalGames) }} TOTAL GAME
        </span>
      </div>
      <p class="font-mono text-xs text-on-surface-variant mt-0.5">
        Katalog aktif dari dataset Steam yang telah terindeks ke dalam basis data dan pipeline matriks Cosine Similarity
      </p>
    </div>

    <!-- Controls: Search & Genre Filter Form -->
    <form method="GET" action="{{ route('admin.games') }}" class="flex flex-wrap items-center gap-3">
      <!-- Search Input -->
      <div class="relative min-w-[240px]">
        <span class="material-symbols-outlined absolute left-3 top-2.5 text-primary/70 text-[18px]">search</span>
        <input
          name="search"
          value="{{ $search }}"
          class="w-full pl-9 pr-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs placeholder:text-on-surface-variant focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all"
          placeholder="Cari judul, developer, app id..."
          type="text"
        />
      </div>

      <!-- Genre Dropdown Filter -->
      <select
        name="genre"
        onchange="this.form.submit()"
        class="px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs focus:outline-none focus:border-secondary focus:ring-1 focus:ring-secondary cursor-pointer"
      >
        <option value="all" {{ empty($genreId) || $genreId === 'all' ? 'selected' : '' }}>
          Semua Genre ({{ $genres->count() }})
        </option>
        @foreach($genres as $g)
          <option value="{{ $g->id }}" {{ $genreId == $g->id ? 'selected' : '' }}>
            {{ $g->name }} ({{ number_format($g->games_count) }})
          </option>
        @endforeach
      </select>

      <!-- Submit & Reset Buttons -->
      <button
        type="submit"
        class="px-3.5 py-2 bg-primary hover:bg-primary/90 text-black font-headline font-bold text-xs uppercase tracking-wider rounded-lg transition-all shadow-sm glow-cyan-sm flex items-center gap-1"
      >
        <span class="material-symbols-outlined text-[16px]">filter_alt</span>
        <span>Filter</span>
      </button>

      @if($search || ($genreId && $genreId !== 'all'))
        <a
          href="{{ route('admin.games') }}"
          class="px-3 py-2 border border-outline-variant hover:border-white/40 text-on-surface-variant hover:text-white rounded-lg font-mono text-xs transition-colors"
          title="Reset Pencarian & Filter"
        >
          Reset
        </a>
      @endif
    </form>
  </div>

  <!-- Tactical HUD Table -->
  <div class="overflow-x-auto custom-scrollbar">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-surface-container-low border-b border-outline-variant text-primary font-mono text-[11px] uppercase tracking-wider">
          <th class="py-3.5 px-6">Cover</th>
          <th class="py-3.5 px-6">Judul Game &amp; Developer</th>
          <th class="py-3.5 px-6">Steam App ID</th>
          <th class="py-3.5 px-6">Genre Tags</th>
          <th class="py-3.5 px-6">Rating Steam</th>
          <th class="py-3.5 px-6 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-outline-variant/60 font-body text-xs">
        @forelse($games as $game)
          <tr class="hover:bg-primary/5 hover:border-l-4 hover:border-primary transition-all duration-150 group">
            <!-- Cover Image -->
            <td class="py-3.5 px-6 whitespace-nowrap">
              <div class="w-20 h-12 rounded-lg overflow-hidden border border-outline-variant bg-surface-container-high relative group-hover:border-primary transition-colors shadow-sm">
                @if(!empty($game->image_url))
                  <img
                    src="{{ $game->image_url }}"
                    alt="{{ $game->title }}"
                    class="w-full h-full object-cover"
                    loading="lazy"
                    onerror="this.onerror=null; this.src='https://placehold.co/160x90/0f1422/00f0ff?text=Steam';"
                  />
                @else
                  <div class="w-full h-full flex items-center justify-center text-on-surface-variant font-mono text-[10px]">
                    NO COVER
                  </div>
                @endif
              </div>
            </td>

            <!-- Judul Game & Developer / Publisher -->
            <td class="py-3.5 px-6 max-w-[280px]">
              <div class="font-headline font-bold text-white text-sm group-hover:text-primary transition-colors truncate" title="{{ $game->title }}">
                {{ $game->title }}
              </div>
              <div class="text-[11px] font-mono text-on-surface-variant flex items-center gap-1.5 mt-0.5 truncate">
                <span>{{ $game->developers ?? $game->publishers ?? 'Steam Publisher' }}</span>
                @if($game->release_date)
                  <span>•</span>
                  <span>{{ $game->release_date->format('Y') }}</span>
                @endif
              </div>
            </td>

            <!-- Steam App ID & Platform -->
            <td class="py-3.5 px-6 whitespace-nowrap font-mono text-xs">
              <div class="text-white font-bold">
                <span class="text-on-surface-variant text-[10px]">AppID:</span>
                <span class="text-primary">{{ $game->steam_app_id ?? '-' }}</span>
              </div>
              <span class="inline-block mt-0.5 px-2 py-0.2 rounded text-[10px] font-bold bg-surface-container border border-outline-variant text-on-surface-variant uppercase">
                {{ $game->platform ?? 'PC' }}
              </span>
            </td>

            <!-- Genre Tags (Many-to-Many Relasi) -->
            <td class="py-3.5 px-6 max-w-[260px]">
              <div class="flex flex-wrap gap-1">
                @forelse($game->genres as $genre)
                  <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-secondary/15 text-secondary border border-secondary/30">
                    {{ $genre->name }}
                  </span>
                @empty
                  <span class="text-on-surface-variant text-[11px] font-mono italic">Belum ada genre</span>
                @endforelse
              </div>
            </td>

            <!-- Rating Steam & Reviews -->
            <td class="py-3.5 px-6 whitespace-nowrap font-mono text-xs">
              <div class="flex items-center gap-1">
                <span class="material-symbols-outlined text-amber-400 text-[16px]">star</span>
                <span class="text-white font-bold">{{ number_format($game->rating, 1) }}</span>
                <span class="text-[10px] text-on-surface-variant">/ 5.0</span>
              </div>
              <div class="text-[10px] text-on-surface-variant mt-0.5">
                {{ number_format($game->total_reviews) }} Ulasan
              </div>
            </td>

            <!-- Aksi Detail -->
            <td class="py-3.5 px-6 text-center whitespace-nowrap font-mono text-xs">
              <button
                type="button"
                onclick="openModalGameDetail({{ json_encode($game) }})"
                class="px-3 py-1.5 rounded-lg bg-surface-container border border-outline-variant hover:border-primary text-primary hover:bg-primary/10 transition-all font-bold inline-flex items-center gap-1"
              >
                <span class="material-symbols-outlined text-[16px]">visibility</span>
                <span>Detail</span>
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="py-12 text-center text-on-surface-variant font-mono">
              <div class="flex flex-col items-center justify-center gap-2">
                <span class="material-symbols-outlined text-4xl text-on-surface-variant/40">search_off</span>
                <p class="text-sm font-headline text-white">Tidak ada data game ditemukan.</p>
                <p class="text-xs">Cobalah mengubah kata kunci pencarian atau ganti filter genre.</p>
              </div>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Tactical Pagination Bar (10 Item per Halaman) -->
  <div class="p-4 bg-surface-container-low border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-3 font-mono text-xs">
    <span class="text-on-surface-variant">
      Halaman <span class="text-primary font-bold">{{ $games->currentPage() }}</span> dari
      <span class="text-white font-bold">{{ $games->lastPage() }}</span>
      (Menampilkan <span class="text-white font-bold">{{ $games->count() }}</span> dari
      <span class="text-primary font-bold">{{ number_format($games->total()) }}</span> game)
    </span>
    <div class="pagination-container">
      {{ $games->links('partials.pagination-cyber') }}
    </div>
  </div>
</section>

<!-- ========================================== -->
<!-- MODAL DETAIL INSPEKSI GAME                 -->
<!-- ========================================== -->
<div id="modal-admin-game-detail" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden flex items-center justify-center p-4">
  <div class="w-full max-w-2xl bg-surface-container border border-outline-variant rounded-2xl overflow-hidden shadow-2xl relative max-h-[90vh] flex flex-col font-mono text-xs">
    <!-- Modal Close Button -->
    <button
      type="button"
      onclick="closeModalGameDetail()"
      class="absolute top-4 right-4 z-20 w-8 h-8 rounded-lg bg-black/80 backdrop-blur-sm border border-outline-variant text-on-surface-variant hover:text-white flex items-center justify-center transition-colors"
    >
      <span class="material-symbols-outlined text-xl">close</span>
    </button>

    <!-- Header Banner Gambar Game -->
    <div class="relative h-52 w-full bg-surface-container-high overflow-hidden shrink-0">
      <img
        id="modal-game-img"
        src=""
        alt="Cover Game"
        class="w-full h-full object-cover"
        onerror="this.onerror=null; this.src='https://placehold.co/600x300/0f1422/00f0ff?text=GameMatch';"
      />
      <div class="absolute inset-0 bg-gradient-to-t from-surface-container via-surface-container/50 to-transparent"></div>
      <div class="absolute bottom-4 left-6 right-6">
        <div class="flex items-center gap-2 mb-1">
          <span id="modal-game-appid" class="px-2 py-0.5 rounded text-[10px] font-bold bg-primary/20 text-primary border border-primary/40">
            AppID: -
          </span>
          <span id="modal-game-platform" class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high text-on-surface-variant border border-outline-variant">
            PC
          </span>
        </div>
        <h3 id="modal-game-title" class="text-2xl font-headline font-bold text-white uppercase tracking-wide">
          Judul Game
        </h3>
      </div>
    </div>

    <!-- Content Body Scrollable -->
    <div class="p-6 overflow-y-auto space-y-5 flex-1">
      <!-- Info Metrik Rating & Review -->
      <div class="grid grid-cols-3 gap-3 p-3.5 rounded-xl bg-surface-container-low border border-outline-variant text-center">
        <div>
          <span class="text-[10px] text-on-surface-variant block uppercase">Rating Steam</span>
          <span id="modal-game-rating" class="text-base font-bold text-amber-400">4.5 ★</span>
        </div>
        <div>
          <span class="text-[10px] text-on-surface-variant block uppercase">Total Ulasan</span>
          <span id="modal-game-reviews" class="text-base font-bold text-white">0</span>
        </div>
        <div>
          <span class="text-[10px] text-on-surface-variant block uppercase">Harga</span>
          <span id="modal-game-price" class="text-base font-bold text-tertiary">Free To Play</span>
        </div>
      </div>

      <!-- Developer & Publisher -->
      <div class="grid grid-cols-2 gap-3 text-[11px]">
        <div class="p-3 rounded-lg bg-surface-container-low border border-outline-variant">
          <span class="text-[10px] text-on-surface-variant block uppercase">Developer</span>
          <span id="modal-game-dev" class="text-white font-bold">-</span>
        </div>
        <div class="p-3 rounded-lg bg-surface-container-low border border-outline-variant">
          <span class="text-[10px] text-on-surface-variant block uppercase">Publisher</span>
          <span id="modal-game-pub" class="text-white font-bold">-</span>
        </div>
      </div>

      <!-- Genres -->
      <div>
        <span class="text-[10px] text-primary font-bold uppercase tracking-wider block mb-2">Klasifikasi Genre:</span>
        <div id="modal-game-genres" class="flex flex-wrap gap-1.5">
          <!-- Dynamic genre chips -->
        </div>
      </div>

      <!-- Deskripsi -->
      <div>
        <span class="text-[10px] text-secondary font-bold uppercase tracking-wider block mb-1">Sinopsis &amp; Deskripsi:</span>
        <p id="modal-game-desc" class="text-on-surface-variant text-xs font-body leading-relaxed max-h-36 overflow-y-auto">
          -
        </p>
      </div>
    </div>

    <!-- Footer -->
    <div class="p-4 border-t border-outline-variant flex items-center justify-end shrink-0">
      <button
        type="button"
        onclick="closeModalGameDetail()"
        class="px-5 py-2 rounded-lg bg-surface-container-high border border-outline-variant hover:border-white text-white text-xs font-bold font-headline uppercase tracking-wider transition-all"
      >
        Tutup
      </button>
    </div>
  </div>
</div>

<script>
  function openModalGameDetail(game) {
    document.getElementById('modal-game-title').textContent = game.title || '-';
    document.getElementById('modal-game-appid').textContent = 'AppID: ' + (game.steam_app_id || '-');
    document.getElementById('modal-game-platform').textContent = (game.platform || 'PC').toUpperCase();
    document.getElementById('modal-game-img').src = game.image_url || 'https://placehold.co/600x300/0f1422/00f0ff?text=Steam';
    document.getElementById('modal-game-rating').textContent = (game.rating ? Number(game.rating).toFixed(1) : '0.0') + ' ★';
    document.getElementById('modal-game-reviews').textContent = Number(game.total_reviews || 0).toLocaleString() + ' Ulasan';
    document.getElementById('modal-game-price').textContent = game.price > 0 ? '$' + Number(game.price).toFixed(2) : 'Free To Play';
    document.getElementById('modal-game-dev').textContent = game.developers || '-';
    document.getElementById('modal-game-pub').textContent = game.publishers || '-';
    document.getElementById('modal-game-desc').textContent = game.description || 'Tidak ada deskripsi rinci.';

    // Genres
    const genresContainer = document.getElementById('modal-game-genres');
    genresContainer.innerHTML = '';
    const genres = Array.isArray(game.genres) ? game.genres : [];
    if (genres.length === 0) {
      genresContainer.innerHTML = '<span class="text-on-surface-variant italic">Belum ada genre</span>';
    } else {
      genres.forEach(g => {
        const span = document.createElement('span');
        span.className = 'px-2.5 py-1 rounded bg-secondary/15 text-secondary border border-secondary/30 font-bold text-[10px]';
        span.textContent = g.name || g;
        genresContainer.appendChild(span);
      });
    }

    const modal = document.getElementById('modal-admin-game-detail');
    if (modal) modal.classList.remove('hidden');
  }

  function closeModalGameDetail() {
    const modal = document.getElementById('modal-admin-game-detail');
    if (modal) modal.classList.add('hidden');
  }
</script>
@endsection
