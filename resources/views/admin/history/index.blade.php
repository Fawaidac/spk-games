@extends('layouts.admin')

@section('title', 'GameMatch Console - Riwayat Rekomendasi Semua Pengguna')
@section('header-title', 'Riwayat Rekomendasi Pengguna')
@section('header-subtitle', 'Monitoring log kalkulasi Cosine Similarity, preferensi genre, dan hasil rekomendasi seluruh user')

@section('admin-content')
<div class="space-y-8">
  <!-- ========================================== -->
  <!-- 1. 4 TACTICAL KPI METRIC TILES             -->
  <!-- ========================================== -->
  <section aria-labelledby="history-kpi-heading">
    <h2 class="sr-only" id="history-kpi-heading">Ringkasan Metrik Riwayat Rekomendasi</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
      <!-- KPI 1: Total Sesi Rekomendasi -->
      <div class="relative overflow-hidden bg-surface-container/90 rounded-xl border border-outline-variant hover:border-primary/80 p-5 shadow-xl transition-all duration-200 group hover:shadow-cyan-500/10 hover:shadow-lg">
        <div class="absolute -right-8 -top-8 w-24 h-24 bg-primary/10 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"></div>
        <div class="flex items-center justify-between">
          <span class="font-mono text-[11px] font-bold text-on-surface-variant uppercase tracking-widest flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
            Total Kalkulasi
          </span>
          <div class="w-8 h-8 rounded-lg bg-surface-container border border-outline-variant flex items-center justify-center text-primary group-hover:border-primary/60 transition-colors">
            <span class="material-symbols-outlined text-[18px]">history</span>
          </div>
        </div>
        <div class="mt-3 flex items-baseline gap-2">
          <span class="font-headline font-bold text-3xl text-white tracking-tight">{{ number_format($totalHistories) }}</span>
          <span class="font-mono text-xs text-primary font-semibold">Sesi Tercatat</span>
        </div>
        <div class="mt-2 text-[11px] font-mono text-on-surface-variant flex items-center gap-1">
          <span class="text-tertiary font-bold">100%</span>
          <span>Log tersimpan di database</span>
        </div>
      </div>

      <!-- KPI 2: Rata-rata Skor Cosine -->
      <div class="relative overflow-hidden bg-surface-container/90 rounded-xl border border-outline-variant hover:border-tertiary/80 p-5 shadow-xl transition-all duration-200 group hover:shadow-emerald-500/10 hover:shadow-lg">
        <div class="absolute -right-8 -top-8 w-24 h-24 bg-tertiary/10 rounded-full blur-2xl group-hover:bg-tertiary/20 transition-all"></div>
        <div class="flex items-center justify-between">
          <span class="font-mono text-[11px] font-bold text-on-surface-variant uppercase tracking-widest flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
            Avg Cosine Score
          </span>
          <div class="w-8 h-8 rounded-lg bg-surface-container border border-outline-variant flex items-center justify-center text-tertiary group-hover:border-tertiary/60 transition-colors">
            <span class="material-symbols-outlined text-[18px]">auto_graph</span>
          </div>
        </div>
        <div class="mt-3 flex items-baseline gap-2">
          <span class="font-headline font-bold text-3xl text-white tracking-tight">{{ number_format($avgSimilarity, 3) }}</span>
          <span class="font-mono text-xs text-tertiary font-semibold">({{ round($avgSimilarity * 100, 1) }}% Match)</span>
        </div>
        <div class="mt-2 text-[11px] font-mono text-on-surface-variant flex items-center gap-1">
          <span class="text-tertiary font-bold">Tinggi</span>
          <span>Akurasi Content-Based Filtering</span>
        </div>
      </div>

      <!-- KPI 3: User Aktif Bereksplorasi -->
      <div class="relative overflow-hidden bg-surface-container/90 rounded-xl border border-outline-variant hover:border-secondary/80 p-5 shadow-xl transition-all duration-200 group hover:shadow-purple-500/10 hover:shadow-lg">
        <div class="absolute -right-8 -top-8 w-24 h-24 bg-secondary/10 rounded-full blur-2xl group-hover:bg-secondary/20 transition-all"></div>
        <div class="flex items-center justify-between">
          <span class="font-mono text-[11px] font-bold text-on-surface-variant uppercase tracking-widest flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
            User Bereksplorasi
          </span>
          <div class="w-8 h-8 rounded-lg bg-surface-container border border-outline-variant flex items-center justify-center text-secondary group-hover:border-secondary/60 transition-colors">
            <span class="material-symbols-outlined text-[18px]">group</span>
          </div>
        </div>
        <div class="mt-3 flex items-baseline gap-2">
          <span class="font-headline font-bold text-3xl text-white tracking-tight">{{ $totalUsersWithHistory }}</span>
          <span class="font-mono text-xs text-secondary font-semibold">Akun Aktif</span>
        </div>
        <div class="mt-2 text-[11px] font-mono text-on-surface-variant flex items-center gap-1">
          <span class="text-secondary font-bold">Multi-user</span>
          <span>Tracking preferensi personal</span>
        </div>
      </div>

      <!-- KPI 4: Status Engine -->
      <div class="relative overflow-hidden bg-surface-container/90 rounded-xl border border-outline-variant hover:border-primary/80 p-5 shadow-xl transition-all duration-200 group hover:shadow-cyan-500/10 hover:shadow-lg">
        <div class="absolute -right-8 -top-8 w-24 h-24 bg-primary/10 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"></div>
        <div class="flex items-center justify-between">
          <span class="font-mono text-[11px] font-bold text-on-surface-variant uppercase tracking-widest flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
            Engine Telemetri
          </span>
          <div class="w-8 h-8 rounded-lg bg-surface-container border border-outline-variant flex items-center justify-center text-primary group-hover:border-primary/60 transition-colors">
            <span class="material-symbols-outlined text-[18px]">tune</span>
          </div>
        </div>
        <div class="mt-3 flex items-baseline gap-2">
          <span class="font-headline font-bold text-2xl text-white tracking-tight">ACTIVE LOG</span>
          <span class="font-mono text-xs text-primary font-semibold">v2.4</span>
        </div>
        <div class="mt-2 text-[11px] font-mono text-on-surface-variant flex items-center gap-1">
          <span class="text-primary font-bold">TF-IDF Vector</span>
          <span>Matrix Similarity Live</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 2. DATA TABLE & FILTER SECTION             -->
  <!-- ========================================== -->
  <section class="bg-surface-container/90 rounded-xl border border-outline-variant shadow-2xl overflow-hidden relative">
    <div class="h-0.5 w-full bg-gradient-to-r from-primary via-secondary to-tertiary"></div>

    <!-- Header & Filter Bar -->
    <div class="p-6 border-b border-outline-variant space-y-4">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-[24px]">manage_search</span>
            <h3 class="font-headline font-bold text-lg text-white uppercase tracking-wider">
              Log Riwayat Rekomendasi Pengguna
            </h3>
            <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-primary/20 text-primary border border-primary/40">
              SEMUA USER
            </span>
          </div>
          <p class="font-mono text-xs text-on-surface-variant mt-1">
            Data real-time hasil rekomendasi Content-Based Filtering per sesi akun gamer &amp; guest
          </p>
        </div>

        <div class="flex items-center gap-2">
          <span class="text-xs font-mono text-on-surface-variant">Total: {{ $histories->total() }} Sesi</span>
        </div>
      </div>

      <!-- Filter Controls Form -->
      <form method="GET" action="{{ route('admin.history') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 pt-2">
        <!-- Search Input -->
        <div class="sm:col-span-6 relative">
          <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">search</span>
          <input
            type="text"
            name="search"
            value="{{ $search }}"
            placeholder="Cari kode sesi, nama user, email, atau genre..."
            class="w-full pl-9 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs placeholder-on-surface-variant/60 focus:border-primary focus:outline-none transition-colors"
          />
        </div>

        <!-- Filter User Dropdown -->
        <div class="sm:col-span-4">
          <select
            name="user_id"
            onchange="this.form.submit()"
            class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs focus:border-primary focus:outline-none transition-colors cursor-pointer"
          >
            <option value="all" {{ empty($userId) || $userId === 'all' ? 'selected' : '' }}>Semua Pengguna (All Users)</option>
            @foreach($users as $u)
              <option value="{{ $u->id }}" {{ $userId == $u->id ? 'selected' : '' }}>
                {{ $u->name }} ({{ $u->email }}) [{{ strtoupper($u->role) }}]
              </option>
            @endforeach
          </select>
        </div>

        <!-- Submit & Reset Buttons -->
        <div class="sm:col-span-2 flex items-center gap-2">
          <button
            type="submit"
            class="w-full py-2 px-3 rounded-lg bg-primary hover:bg-primary/90 text-black font-headline font-bold text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-1 shadow-sm glow-cyan-sm"
          >
            <span class="material-symbols-outlined text-[16px]">filter_alt</span>
            <span>Filter</span>
          </button>
          @if($search || ($userId && $userId !== 'all'))
            <a
              href="{{ route('admin.history') }}"
              class="py-2 px-3 rounded-lg border border-outline-variant hover:border-white/40 text-on-surface-variant hover:text-white font-mono text-xs transition-colors flex items-center justify-center"
              title="Reset Filter"
            >
              <span class="material-symbols-outlined text-[16px]">close</span>
            </a>
          @endif
        </div>
      </form>
    </div>

    <!-- Table Content -->
    <div class="overflow-x-auto">
      <table class="w-full text-left font-mono text-xs">
        <thead class="bg-surface-container-lowest/80 text-[11px] font-bold text-on-surface-variant uppercase tracking-wider border-b border-outline-variant">
          <tr>
            <th class="py-3.5 px-4">Kode Sesi</th>
            <th class="py-3.5 px-4">Pengguna</th>
            <th class="py-3.5 px-4">Waktu Kalkulasi</th>
            <th class="py-3.5 px-4">Filter Preferensi</th>
            <th class="py-3.5 px-4">Hasil Rekomendasi Game (Match)</th>
            <th class="py-3.5 px-4 text-center">Avg Match</th>
            <th class="py-3.5 px-4 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-outline-variant/60">
          @forelse($histories as $history)
            <tr class="hover:bg-surface-container/60 transition-colors">
              <!-- Kode Sesi -->
              <td class="py-3.5 px-4 whitespace-nowrap">
                <span class="px-2 py-1 rounded bg-primary/10 border border-primary/30 text-primary font-bold text-[11px] tracking-wider">
                  {{ $history->session_code }}
                </span>
                <div class="text-[10px] text-on-surface-variant mt-1 font-mono">
                  IP: {{ $history->ip_address ?? '127.0.0.1' }}
                </div>
              </td>

              <!-- Pengguna -->
              <td class="py-3.5 px-4">
                <div class="flex items-center gap-2.5">
                  <div class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant flex items-center justify-center font-headline font-bold text-xs text-white">
                    {{ strtoupper(substr($history->user?->name ?? $history->user_name ?? 'G', 0, 1)) }}
                  </div>
                  <div>
                    <div class="font-headline font-bold text-white text-xs">
                      {{ $history->user?->name ?? $history->user_name }}
                    </div>
                    <div class="text-[10px] text-on-surface-variant">
                      {{ $history->user?->email ?? $history->user_email }}
                    </div>
                    <span class="inline-block mt-0.5 px-1.5 py-0.2 rounded text-[9px] font-bold
                      {{ ($history->user?->isAdmin()) ? 'bg-secondary/20 text-secondary border border-secondary/30' : 'bg-primary/20 text-primary border border-primary/30' }}">
                      {{ strtoupper($history->user?->role ?? 'GUEST') }}
                    </span>
                  </div>
                </div>
              </td>

              <!-- Waktu Kalkulasi -->
              <td class="py-3.5 px-4 whitespace-nowrap">
                <div class="text-white">{{ $history->created_at->format('d M Y') }}</div>
                <div class="text-on-surface-variant text-[10px]">{{ $history->created_at->format('H:i') }} WIB ({{ $history->created_at->diffForHumans() }})</div>
              </td>

              <!-- Filter Preferensi -->
              <td class="py-3.5 px-4 max-w-[220px]">
                <div class="flex flex-wrap gap-1 mb-1">
                  @if(!empty($history->selected_genres))
                    @foreach((array)$history->selected_genres as $genre)
                      <span class="px-1.5 py-0.5 rounded bg-surface-container border border-outline-variant text-white text-[10px]">
                        {{ $genre }}
                      </span>
                    @endforeach
                  @else
                    <span class="text-on-surface-variant text-[10px] italic">Semua genre</span>
                  @endif
                </div>
                @if(!empty($history->reference_games))
                  <div class="text-[10px] text-on-surface-variant mt-1 truncate" title="{{ implode(', ', (array)$history->reference_games) }}">
                    <span class="text-primary font-bold">Ref:</span> {{ implode(', ', (array)$history->reference_games) }}
                  </div>
                @endif
              </td>

              <!-- Hasil Rekomendasi Game (Cards / Pills) -->
              <td class="py-3.5 px-4">
                <div class="space-y-1.5 max-w-[260px]">
                  @php
                    $recGames = (array)($history->recommended_games ?? []);
                    $top3 = array_slice($recGames, 0, 3);
                  @endphp
                  @foreach($top3 as $game)
                    <div class="flex items-center justify-between gap-2 p-1.5 rounded bg-surface-container-low border border-outline-variant/60 text-[11px]">
                      <span class="text-white font-medium truncate" title="{{ $game['title'] ?? '-' }}">
                        {{ $game['title'] ?? '-' }}
                      </span>
                      <span class="px-1.5 py-0.2 rounded bg-tertiary/15 text-tertiary font-bold text-[10px] shrink-0">
                        {{ isset($game['similarity']) ? round($game['similarity'] * 100, 1) . '%' : '-' }}
                      </span>
                    </div>
                  @endforeach
                  @if(count($recGames) > 3)
                    <div class="text-[10px] text-on-surface-variant text-right">
                      +{{ count($recGames) - 3 }} game lainnya
                    </div>
                  @endif
                </div>
              </td>

              <!-- Avg Similarity -->
              <td class="py-3.5 px-4 text-center whitespace-nowrap">
                <div class="inline-flex flex-col items-center">
                  <span class="text-base font-headline font-bold text-tertiary">
                    {{ round($history->avg_similarity * 100, 1) }}%
                  </span>
                  <span class="text-[10px] text-on-surface-variant">
                    score {{ number_format($history->avg_similarity, 3) }}
                  </span>
                </div>
              </td>

              <!-- Aksi -->
              <td class="py-3.5 px-4 text-center whitespace-nowrap">
                <button
                  type="button"
                  onclick="openModalHistoryDetail({{ json_encode($history) }})"
                  class="px-2.5 py-1.5 rounded-lg bg-surface-container border border-outline-variant hover:border-primary text-primary hover:bg-primary/10 transition-all font-mono text-[11px] font-bold flex items-center gap-1 mx-auto"
                >
                  <span class="material-symbols-outlined text-[16px]">visibility</span>
                  <span>Detail</span>
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="py-12 text-center text-on-surface-variant">
                <div class="flex flex-col items-center justify-center gap-2">
                  <span class="material-symbols-outlined text-4xl text-on-surface-variant/40">search_off</span>
                  <p class="text-sm font-headline text-white">Tidak ada data riwayat rekomendasi ditemukan.</p>
                  <p class="text-xs">Cobalah mengubah kata kunci pencarian atau filter pengguna.</p>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination Footer -->
    @if($histories->hasPages())
      <div class="p-4 border-t border-outline-variant bg-surface-container-lowest/50 flex flex-col sm:flex-row items-center justify-between gap-3 font-mono text-xs">
        <span class="text-on-surface-variant">
          Halaman <span class="text-primary font-bold">{{ $histories->currentPage() }}</span> dari
          <span class="text-white font-bold">{{ $histories->lastPage() }}</span>
          (Menampilkan <span class="text-white font-bold">{{ $histories->count() }}</span> dari
          <span class="text-primary font-bold">{{ number_format($histories->total()) }}</span> riwayat)
        </span>
        {{ $histories->links('partials.pagination-cyber') }}
      </div>
    @endif
  </section>
</div>

<!-- ========================================== -->
<!-- 3. MODAL DETAIL SESI REKOMENDASI           -->
<!-- ========================================== -->
<div id="modal-admin-history-detail" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden flex items-center justify-center p-4">
  <div class="w-full max-w-2xl bg-surface-container border border-outline-variant rounded-2xl p-6 shadow-2xl relative space-y-5 max-h-[90vh] flex flex-col">
    <!-- Modal Header -->
    <div class="flex items-start justify-between pb-4 border-b border-outline-variant shrink-0">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-primary/10 border border-primary/40 flex items-center justify-center text-primary shadow-sm glow-cyan-sm">
          <span class="material-symbols-outlined text-2xl">insights</span>
        </div>
        <div>
          <div class="flex items-center gap-2">
            <h4 class="font-headline font-bold text-white text-base uppercase tracking-wider">
              Detail Inspeksi Sesi Rekomendasi
            </h4>
            <span id="detail-session-code" class="px-2 py-0.5 rounded bg-primary/20 text-primary border border-primary/40 text-[10px] font-mono font-bold">
              REC-0000
            </span>
          </div>
          <p id="detail-session-time" class="font-mono text-xs text-on-surface-variant mt-0.5">
            Waktu kalkulasi
          </p>
        </div>
      </div>
      <button type="button" onclick="closeModalHistoryDetail()" class="text-on-surface-variant hover:text-white p-1 rounded-lg transition-colors">
        <span class="material-symbols-outlined text-xl">close</span>
      </button>
    </div>

    <!-- Modal Content Scrollable -->
    <div class="space-y-4 overflow-y-auto pr-1 flex-1 font-mono text-xs">
      <!-- User Info Card -->
      <div class="p-3.5 rounded-xl bg-surface-container-low border border-outline-variant flex items-center justify-between">
        <div>
          <span class="text-[10px] text-on-surface-variant uppercase tracking-wider font-bold">Pengguna</span>
          <div id="detail-user-name" class="font-bold text-white text-sm mt-0.5">Nama User</div>
          <div id="detail-user-email" class="text-xs text-on-surface-variant">email@example.com</div>
        </div>
        <div class="text-right">
          <span class="text-[10px] text-on-surface-variant uppercase tracking-wider font-bold">Algoritma</span>
          <div id="detail-algorithm" class="text-xs text-tertiary font-bold mt-0.5">Cosine Similarity</div>
          <div class="text-[10px] text-on-surface-variant">TF-IDF Vector Space</div>
        </div>
      </div>

      <!-- Preference Inputs -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div class="p-3.5 rounded-xl bg-surface-container-low border border-outline-variant">
          <span class="text-[10px] text-primary font-bold uppercase tracking-wider block mb-2">Preferensi Genre Dipilih:</span>
          <div id="detail-genres-list" class="flex flex-wrap gap-1">
            <!-- Dynamic genres -->
          </div>
        </div>
        <div class="p-3.5 rounded-xl bg-surface-container-low border border-outline-variant">
          <span class="text-[10px] text-secondary font-bold uppercase tracking-wider block mb-2">Game Referensi Basis:</span>
          <div id="detail-ref-games-list" class="text-white space-y-1">
            <!-- Dynamic ref games -->
          </div>
        </div>
      </div>

      <!-- Recommended Games Breakdown -->
      <div>
        <div class="flex items-center justify-between mb-2">
          <span class="text-xs font-bold text-white uppercase tracking-wider flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[16px] text-tertiary">sports_esports</span>
            Hasil Game Terekomendasi &amp; Skor Kemiripan
          </span>
          <span id="detail-avg-badge" class="px-2 py-0.5 rounded bg-tertiary/20 text-tertiary border border-tertiary/40 text-[10px] font-bold">
            Avg: 95.2%
          </span>
        </div>
        <div id="detail-recommended-list" class="space-y-2">
          <!-- Dynamic recommended games -->
        </div>
      </div>
    </div>

    <!-- Modal Footer -->
    <div class="pt-4 border-t border-outline-variant flex items-center justify-end shrink-0">
      <button
        type="button"
        onclick="closeModalHistoryDetail()"
        class="px-5 py-2 rounded-lg bg-surface-container-high border border-outline-variant hover:border-white text-white text-xs font-bold font-headline uppercase tracking-wider transition-all"
      >
        Tutup
      </button>
    </div>
  </div>
</div>

<script>
  function openModalHistoryDetail(history) {
    document.getElementById('detail-session-code').textContent = history.session_code || '-';
    document.getElementById('detail-session-time').textContent = 'Dikalkulasi pada: ' + (history.created_at || '-');
    document.getElementById('detail-user-name').textContent = (history.user ? history.user.name : history.user_name) || 'Guest Explorer';
    document.getElementById('detail-user-email').textContent = (history.user ? history.user.email : history.user_email) || 'guest@gamematch.internal';
    document.getElementById('detail-algorithm').textContent = history.algorithm || 'Content-Based Filtering';

    const avgScore = history.avg_similarity ? (Math.round(history.avg_similarity * 1000) / 10) + '%' : '-';
    document.getElementById('detail-avg-badge').textContent = 'Avg Kemiripan: ' + avgScore;

    // Genres
    const genresContainer = document.getElementById('detail-genres-list');
    genresContainer.innerHTML = '';
    const genres = Array.isArray(history.selected_genres) ? history.selected_genres : [];
    if (genres.length === 0) {
      genresContainer.innerHTML = '<span class="text-on-surface-variant text-[11px] italic">Semua genre diikutsertakan</span>';
    } else {
      genres.forEach(g => {
        const span = document.createElement('span');
        span.className = 'px-2 py-0.5 rounded bg-primary/15 text-primary border border-primary/30 text-[10px] font-bold';
        span.textContent = g;
        genresContainer.appendChild(span);
      });
    }

    // Ref games
    const refContainer = document.getElementById('detail-ref-games-list');
    refContainer.innerHTML = '';
    const refs = Array.isArray(history.reference_games) ? history.reference_games : [];
    if (refs.length === 0) {
      refContainer.innerHTML = '<span class="text-on-surface-variant text-[11px] italic">Tidak ada game referensi spesifik</span>';
    } else {
      refs.forEach(r => {
        const div = document.createElement('div');
        div.className = 'text-white text-xs flex items-center gap-1.5';
        div.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span><span>' + r + '</span>';
        refContainer.appendChild(div);
      });
    }

    // Recommended list
    const recContainer = document.getElementById('detail-recommended-list');
    recContainer.innerHTML = '';
    const recs = Array.isArray(history.recommended_games) ? history.recommended_games : [];
    recs.forEach((item, idx) => {
      const pct = item.similarity ? Math.round(item.similarity * 1000) / 10 : (item.percentage || 0);
      const row = document.createElement('div');
      row.className = 'p-3 rounded-xl bg-surface-container-low border border-outline-variant flex items-center justify-between gap-3';
      row.innerHTML = `
        <div class="flex items-center gap-3">
          <span class="w-6 h-6 rounded bg-surface-container border border-outline-variant flex items-center justify-center font-bold text-on-surface-variant text-xs">
            ${idx + 1}
          </span>
          <div>
            <h5 class="font-bold text-white text-sm">${item.title || 'Untitled Game'}</h5>
            <div class="text-[10px] text-on-surface-variant flex items-center gap-2 mt-0.5">
              <span>Platform: ${item.platform || 'PC'}</span>
              <span>•</span>
              <span>Rating: ${item.rating || 0} ★</span>
            </div>
          </div>
        </div>
        <div class="text-right shrink-0">
          <div class="text-sm font-headline font-bold text-tertiary">${pct}%</div>
          <div class="text-[9px] text-on-surface-variant font-mono">Similarity: ${item.similarity || 0}</div>
        </div>
      `;
      recContainer.appendChild(row);
    });

    const modal = document.getElementById('modal-admin-history-detail');
    if (modal) modal.classList.remove('hidden');
  }

  function closeModalHistoryDetail() {
    const modal = document.getElementById('modal-admin-history-detail');
    if (modal) modal.classList.add('hidden');
  }
</script>
@endsection
