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

    <!-- History List Scrollable — diisi JS -->
    <div class="overflow-y-auto space-y-4 pr-1 custom-scrollbar flex-1" id="history-list-container">
      <!-- Loading State -->
      <div id="history-loading" class="flex flex-col items-center justify-center py-12 gap-3 text-on-surface-variant">
        <span class="material-symbols-outlined text-4xl animate-spin text-primary">autorenew</span>
        <p class="text-sm font-code-metric">Memuat riwayat…</p>
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
            <a href="{{ route('admin.dashboard') }}"
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
