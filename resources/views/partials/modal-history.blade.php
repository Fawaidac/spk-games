<!-- MODAL RIWAYAT REKOMENDASI (HISTORY) -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[#080b11]/85 backdrop-blur-md hidden transition-opacity duration-200" id="modal-history">
  <div class="bg-[#0f1422] w-full max-w-2xl rounded-2xl border-2 border-tertiary/50 p-6 md:p-8 shadow-[0_0_50px_rgba(0,255,163,0.25)] relative tech-corner-accent max-h-[90vh] flex flex-col animate-in fade-in zoom-in-95 duration-150">
    <!-- Close Button -->
    <button class="absolute top-4 right-4 text-on-surface-variant hover:text-white p-1 rounded-lg transition-colors" onclick="toggleModal('modal-history')">
      <span class="material-symbols-outlined text-xl" data-icon="close">close</span>
    </button>

    <!-- Modal Header -->
    <div class="flex items-start gap-4 mb-6 pb-4 border-b border-[#1e293b]">
      <div class="w-12 h-12 rounded-xl bg-tertiary/10 border border-tertiary/40 flex items-center justify-center text-tertiary shadow-[0_0_15px_rgba(0,255,163,0.3)] shrink-0">
        <span class="material-symbols-outlined text-2xl">history</span>
      </div>
      <div class="flex-1">
        <div class="flex items-center gap-2">
          <h3 class="text-xl font-headline-md font-bold text-white uppercase tracking-wide">
            Riwayat Rekomendasi
          </h3>
          <span class="px-2 py-0.5 rounded text-[10px] font-code-metric font-bold bg-tertiary/20 text-tertiary border border-tertiary/40 uppercase">
            LOG AKTIF
          </span>
        </div>
        <p class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
          Daftar sesi pencocokan preferensi game &amp; skor kemiripan Cosine Similarity Anda.
        </p>
      </div>
    </div>

    <!-- History List Scrollable -->
    <div class="overflow-y-auto space-y-4 pr-1 custom-scrollbar flex-1">
      <!-- Session Card 1 -->
      <div class="p-4 bg-[#080b11] rounded-xl border border-[#1e293b] hover:border-tertiary/50 transition-all duration-200">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
          <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
            <span class="text-xs font-code-metric font-bold text-white uppercase tracking-wider">Sesi #04 // Match Terakhir</span>
            <span class="text-[10px] font-code-metric text-on-surface-variant">Hari ini, 11:20 WIB</span>
          </div>
          <div class="flex items-center gap-1.5">
            <span class="px-2 py-0.5 rounded bg-surface-container border border-[#1e293b] text-[10px] font-code-metric text-tertiary font-bold">
              3 Game Terpilih
            </span>
          </div>
        </div>

        <div class="text-xs text-on-surface-variant mb-2">
          <span class="font-code-metric text-[11px] text-primary">Filter Genre:</span>
          <span class="text-white font-code-metric">RPG, Open World, Action</span>
        </div>

        <!-- Matched Games Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 pt-2 border-t border-[#1e293b]">
          <div class="p-2.5 rounded-lg bg-surface-container/60 border border-[#1e293b] flex items-center justify-between">
            <div>
              <p class="text-xs font-bold text-white">Elden Ring</p>
              <p class="text-[10px] font-code-metric text-on-surface-variant">Similarity: 0.961</p>
            </div>
            <span class="text-xs font-code-metric font-bold text-tertiary">96%</span>
          </div>
          <div class="p-2.5 rounded-lg bg-surface-container/60 border border-[#1e293b] flex items-center justify-between">
            <div>
              <p class="text-xs font-bold text-white">The Witcher 3</p>
              <p class="text-[10px] font-code-metric text-on-surface-variant">Similarity: 0.942</p>
            </div>
            <span class="text-xs font-code-metric font-bold text-primary">94%</span>
          </div>
          <div class="p-2.5 rounded-lg bg-surface-container/60 border border-[#1e293b] flex items-center justify-between">
            <div>
              <p class="text-xs font-bold text-white">Baldur's Gate 3</p>
              <p class="text-[10px] font-code-metric text-on-surface-variant">Similarity: 0.925</p>
            </div>
            <span class="text-xs font-code-metric font-bold text-secondary">92%</span>
          </div>
        </div>
      </div>

      <!-- Session Card 2 -->
      <div class="p-4 bg-[#080b11] rounded-xl border border-[#1e293b] hover:border-primary/50 transition-all duration-200">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
          <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-primary/70"></span>
            <span class="text-xs font-code-metric font-bold text-white uppercase tracking-wider">Sesi #03 // Eksplorasi Genre</span>
            <span class="text-[10px] font-code-metric text-on-surface-variant">13 Okt 2026, 19:40 WIB</span>
          </div>
          <span class="px-2 py-0.5 rounded bg-surface-container border border-[#1e293b] text-[10px] font-code-metric text-primary font-bold">
            2 Game Terpilih
          </span>
        </div>

        <div class="text-xs text-on-surface-variant mb-2">
          <span class="font-code-metric text-[11px] text-primary">Filter Genre:</span>
          <span class="text-white font-code-metric">Story Rich, Strategy, Turn-Based</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2 border-t border-[#1e293b]">
          <div class="p-2.5 rounded-lg bg-surface-container/60 border border-[#1e293b] flex items-center justify-between">
            <div>
              <p class="text-xs font-bold text-white">Baldur's Gate 3</p>
              <p class="text-[10px] font-code-metric text-on-surface-variant">Similarity: 0.948</p>
            </div>
            <span class="text-xs font-code-metric font-bold text-primary">95%</span>
          </div>
          <div class="p-2.5 rounded-lg bg-surface-container/60 border border-[#1e293b] flex items-center justify-between">
            <div>
              <p class="text-xs font-bold text-white">Divinity: Original Sin 2</p>
              <p class="text-[10px] font-code-metric text-on-surface-variant">Similarity: 0.918</p>
            </div>
            <span class="text-xs font-code-metric font-bold text-secondary">92%</span>
          </div>
        </div>
      </div>

      <!-- Session Card 3 -->
      <div class="p-4 bg-[#080b11] rounded-xl border border-[#1e293b] hover:border-secondary/50 transition-all duration-200">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
          <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-secondary/70"></span>
            <span class="text-xs font-code-metric font-bold text-white uppercase tracking-wider">Sesi #02 // Roguelike Run</span>
            <span class="text-[10px] font-code-metric text-on-surface-variant">12 Okt 2026, 14:15 WIB</span>
          </div>
          <span class="px-2 py-0.5 rounded bg-surface-container border border-[#1e293b] text-[10px] font-code-metric text-secondary font-bold">
            2 Game Terpilih
          </span>
        </div>

        <div class="text-xs text-on-surface-variant mb-2">
          <span class="font-code-metric text-[11px] text-primary">Filter Genre:</span>
          <span class="text-white font-code-metric">Roguelike, Indie, Action</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2 border-t border-[#1e293b]">
          <div class="p-2.5 rounded-lg bg-surface-container/60 border border-[#1e293b] flex items-center justify-between">
            <div>
              <p class="text-xs font-bold text-white">Hades</p>
              <p class="text-[10px] font-code-metric text-on-surface-variant">Similarity: 0.910</p>
            </div>
            <span class="text-xs font-code-metric font-bold text-secondary">91%</span>
          </div>
          <div class="p-2.5 rounded-lg bg-surface-container/60 border border-[#1e293b] flex items-center justify-between">
            <div>
              <p class="text-xs font-bold text-white">Dead Cells</p>
              <p class="text-[10px] font-code-metric text-on-surface-variant">Similarity: 0.887</p>
            </div>
            <span class="text-xs font-code-metric font-bold text-white/80">89%</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Footer Actions -->
    <div class="mt-6 pt-4 border-t border-[#1e293b] flex flex-wrap items-center justify-between gap-3">
      <div class="text-xs font-code-metric text-on-surface-variant">
        Tersimpan otomatis per akun gamer
      </div>
      <div class="flex items-center gap-2">
        @auth
          @if(auth()->user()->isAdmin())
            <a href="{{ route('dashboard.admin') }}"
               class="px-4 py-2 rounded border border-secondary/40 hover:border-secondary text-secondary hover:bg-secondary/10 text-xs font-label-md uppercase tracking-wider font-bold transition-all flex items-center gap-1.5">
              <span class="material-symbols-outlined text-sm">admin_panel_settings</span>
              Analisis di Admin ML
            </a>
          @endif
        @endauth
        <button type="button"
                onclick="toggleModal('modal-history')"
                class="px-5 py-2 rounded bg-surface-container-high border border-[#1e293b] text-white hover:border-tertiary/60 text-xs font-label-md uppercase tracking-wider font-bold transition-all">
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>
