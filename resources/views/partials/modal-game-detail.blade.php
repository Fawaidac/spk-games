<!-- MODAL POP-UP KOMPONEN DETAIL GAME ('Modal Game Detail & Game Serupa' - High-Tech Gamer HUD) -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/85 backdrop-blur-md hidden transition-opacity duration-300" id="modal-detail-game">
  <div class="relative w-full max-w-2xl bg-surface-dim rounded-2xl border-2 border-primary/60 shadow-[0_0_40px_rgba(0,240,255,0.3)] overflow-hidden flex flex-col max-h-[921px] hud-box">
    <!-- Modal Close Button -->
    <button type="button" class="absolute top-4 right-4 z-20 w-8 h-8 rounded-lg bg-black/80 backdrop-blur-sm border border-primary/40 text-primary hover:text-white hover:border-primary flex items-center justify-center transition-colors" onclick="document.getElementById('modal-detail-game').classList.add('hidden')">
      <span class="material-symbols-outlined text-xl">close</span>
    </button>
    <!-- Banner Besar Game -->
    <div class="relative h-64 w-full overflow-hidden flex-shrink-0 scanlines bg-black/80">
      <img id="modal-game-banner" alt="Banner Game" class="w-full h-full object-cover" src="https://placehold.co/600x300/0f1422/00f0ff?text=GameMatch" onerror="this.onerror=null; this.src='https://placehold.co/600x300/0f1422/00f0ff?text=GameMatch';" />
      <div class="absolute inset-0 bg-gradient-to-t from-surface-dim via-surface-dim/40 to-transparent"></div>
      <div class="absolute bottom-4 left-6 right-6 flex items-end justify-between">
        <div class="max-w-[70%]">
          <div class="flex flex-wrap items-center gap-2 mb-1.5">
            <span id="modal-game-developer" class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-primary/20 border border-primary text-primary truncate max-w-[200px]">FromSoftware</span>
            <span id="modal-game-release" class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant">Rilis 2022</span>
            <span id="modal-game-genre-badge" class="px-2 py-0.5 rounded text-[10px] font-mono bg-secondary/20 text-secondary border border-secondary/40">Action</span>
          </div>
          <h2 id="modal-game-title" class="text-2xl font-orbitron font-extrabold text-on-surface uppercase tracking-wide truncate">
            Elden Ring
          </h2>
        </div>
        <div class="text-right shrink-0">
          <span class="text-[10px] font-label-sm text-secondary uppercase tracking-widest block font-bold">Skor Kemiripan</span>
          <span id="modal-game-score" class="text-2xl font-orbitron font-black text-secondary drop-shadow-[0_0_10px_rgba(181,55,242,0.8)]">96% Cocok</span>
        </div>
      </div>
    </div>
    <!-- Modal Body Content -->
    <div class="p-6 overflow-y-auto space-y-6">
      <!-- Sinopsis Deskripsi -->
      <div>
        <h4 class="text-xs font-orbitron font-bold uppercase tracking-wider text-primary mb-2 flex items-center gap-1.5">
          <span class="material-symbols-outlined text-sm">description</span>
          Sinopsis Game
        </h4>
        <p id="modal-game-description" class="text-body-md text-on-surface-variant leading-relaxed text-sm">
          Deskripsi game akan dimuat di sini.
        </p>
      </div>
      <!-- Telemetri Vektor Ekstraksi -->
      <div class="grid grid-cols-3 gap-3 p-4 rounded-xl bg-surface-container-low border border-primary/30 text-center shadow-inner">
        <div>
          <span class="text-[10px] font-mono text-outline block uppercase tracking-wider">Rating Steam</span>
          <span id="modal-game-rating" class="text-lg font-orbitron font-bold text-primary">4.9 / 5.0</span>
        </div>
        <div>
          <span class="text-[10px] font-mono text-outline block uppercase tracking-wider">Harga</span>
          <span id="modal-game-price" class="text-lg font-orbitron font-bold text-secondary">Gratis</span>
        </div>
        <div>
          <span class="text-[10px] font-mono text-outline block uppercase tracking-wider">Total Reviews</span>
          <span id="modal-game-reviews" class="text-lg font-orbitron font-bold text-tertiary">100,000+</span>
        </div>
      </div>
      <!-- Info Metadata Game -->
      <div class="space-y-3 pt-2 border-t border-outline-variant">
        <h4 class="text-xs font-orbitron font-bold uppercase tracking-wider text-primary flex items-center gap-1.5">
          <span class="material-symbols-outlined text-sm text-secondary">category</span>
          Genre &amp; Kategori Lengkap
        </h4>
        <div id="modal-game-all-genres" class="flex flex-wrap gap-2 text-xs font-code-metric">
          <!-- Filled dynamically -->
        </div>
      </div>
    </div>
    <!-- Modal Footer -->
    <div class="p-4 bg-surface-container-low border-t border-primary/30 flex items-center justify-between">
      <button type="button" class="px-5 py-2.5 rounded text-on-surface-variant hover:text-white font-orbitron text-xs font-semibold tracking-wider transition-colors uppercase" onclick="document.getElementById('modal-detail-game').classList.add('hidden')">
        Tutup
      </button>
      <a id="modal-game-steam-link" href="https://store.steampowered.com" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded bg-primary hover:bg-cyan-300 text-black font-orbitron text-xs font-black tracking-wider transition-all flex items-center gap-2 active:scale-95 shadow-[0_0_15px_rgba(0,240,255,0.6)] uppercase">
        <span class="material-symbols-outlined text-base">open_in_new</span>
        <span>Buka di Halaman Steam</span>
      </a>
    </div>
  </div>
</div>
