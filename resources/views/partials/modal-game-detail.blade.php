<!-- MODAL POP-UP KOMPONEN DETAIL GAME ('Modal Game Detail & Game Serupa' - High-Tech Gamer HUD) -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/85 backdrop-blur-md hidden transition-opacity duration-300" id="modal-detail-game">
  <div class="relative w-full max-w-2xl bg-surface-dim rounded-2xl border-2 border-primary/60 shadow-[0_0_40px_rgba(0,240,255,0.3)] overflow-hidden flex flex-col max-h-[921px] hud-box">
    <!-- Modal Close Button -->
    <button class="absolute top-4 right-4 z-20 w-8 h-8 rounded-lg bg-black/80 backdrop-blur-sm border border-primary/40 text-primary hover:text-white hover:border-primary flex items-center justify-center transition-colors" onclick="document.getElementById('modal-detail-game').classList.add('hidden')">
      <span class="material-symbols-outlined text-xl">close</span>
    </button>
    <!-- Banner Besar Game: Elden Ring -->
    <div class="relative h-64 w-full overflow-hidden flex-shrink-0 scanlines">
      <img alt="Banner Elden Ring" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRwZ2LURygePeOhudEzjxxjYqdNl6ws8IRouzgRLBmHjw7dAEKGR-ZuEtOibJbR8UO-OY_TAuGaF5CF3i2J75UxkjdIVa_2M3SUTFJW0MfH0qd7AzzxGq7soEQSUmaDR7z_TNxmmoMMkd9SdvviOlRGMXSB_uKjXjDmUI7xlhQG90oN5a2cwMcJLc2dovLM8qGgRLLyRk9E0DarCawKS1nnkKQ4Pev1HY8fWdjRuSF1eBZuMHaYSLX" />
      <div class="absolute inset-0 bg-gradient-to-t from-surface-dim via-surface-dim/40 to-transparent"></div>
      <div class="absolute bottom-4 left-6 right-6 flex items-end justify-between">
        <div>
          <div class="flex items-center gap-2 mb-1.5">
            <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-primary/20 border border-primary text-primary">FromSoftware</span>
            <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-surface-container-high text-on-surface-variant border border-outline-variant">Rilis 2022</span>
          </div>
          <h2 class="text-2xl font-orbitron font-extrabold text-on-surface uppercase tracking-wide">
            Elden Ring
          </h2>
        </div>
        <div class="text-right">
          <span class="text-[10px] font-label-sm text-secondary uppercase tracking-widest block font-bold">Skor Kemiripan</span>
          <span class="text-2xl font-orbitron font-black text-secondary drop-shadow-[0_0_10px_rgba(181,55,242,0.8)]">96% Cocok</span>
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
        <p class="text-body-md text-on-surface-variant leading-relaxed">
          Bangkitlah, wahai Tarnished, dan dibimbinglah oleh anugerah untuk memegang kekuatan Elden Ring dan menjadi Elden Lord di Lands Between. Petualangan RPG aksi dunia terbuka epik yang dirancang oleh Hidetaka Miyazaki dan George R.R. Martin.
        </p>
      </div>
      <!-- Telemetri Vektor Ekstraksi -->
      <div class="grid grid-cols-3 gap-3 p-4 rounded-xl bg-surface-container-low border border-primary/30 text-center shadow-inner">
        <div>
          <span class="text-[10px] font-mono text-outline block uppercase tracking-wider">Bobot Genre</span>
          <span class="text-lg font-orbitron font-bold text-primary">0.982</span>
        </div>
        <div>
          <span class="text-[10px] font-mono text-outline block uppercase tracking-wider">Cosine Score</span>
          <span class="text-lg font-orbitron font-bold text-secondary">0.964</span>
        </div>
        <div>
          <span class="text-[10px] font-mono text-outline block uppercase tracking-wider">Estimasi Waktu</span>
          <span class="text-lg font-orbitron font-bold text-tertiary">~100 Jam</span>
        </div>
      </div>
      <!-- Game Serupa Berdasarkan Content-Based Filtering -->
      <div class="space-y-3 pt-2 border-t border-outline-variant">
        <h4 class="text-xs font-orbitron font-bold uppercase tracking-wider text-primary flex items-center gap-1.5">
          <span class="material-symbols-outlined text-sm text-secondary">alt_route</span>
          Game Serupa Berdasarkan Content-Based Filtering
        </h4>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
          <!-- Mini-card 1: Dark Souls III -->
          <div class="rounded-lg bg-surface-container border border-primary/30 p-2.5 flex flex-col justify-between hover:border-primary transition-all hover:glow-cyan">
            <div class="flex items-center gap-2 mb-2">
              <img alt="Dark Souls III" class="w-10 h-10 rounded object-cover flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCrGrymPfA2kUIibalWxbtFEVQvSANBE_a0wNNXJLn_jy7QQCsV7Dsr2yHDHAGDxTV9TYIQMHjdJ--RJwwMAl1-7xiJKn96ZscnnwYfrgeXuXeie4fesp64ACjbWDXHIZ6KSJIPYFbgdu8gloKrHhLOXbFps2nEL8Cqll9_tVSbKsRLqI_6FvvLb_6ymtLNyggmDD80_EX-tcyAbL3-L45c0IqfsTOOp7tzoTALEcVLQ6BV8nX7rOt0" />
              <div class="min-w-0">
                <h5 class="font-orbitron font-bold text-xs text-on-surface truncate">Dark Souls III</h5>
                <span class="text-primary text-[10px] font-mono font-bold">94% Kemiripan</span>
              </div>
            </div>
            <span class="text-[10px] font-mono text-outline">FromSoftware &bull; 2016</span>
          </div>
          <!-- Mini-card 2: Sekiro: Shadows Die Twice -->
          <div class="rounded-lg bg-surface-container border border-primary/30 p-2.5 flex flex-col justify-between hover:border-primary transition-all hover:glow-cyan">
            <div class="flex items-center gap-2 mb-2">
              <img alt="Sekiro" class="w-10 h-10 rounded object-cover flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUjtdR_epZk1tySrP5oWS9aoE7K7JNs9OrGkUm3e5Q1Vdud7Iys8v56IgDfOef7Vz9JB7-SUnNx4hgI_Hr7cNgUNe1XbayiU5n3KH7wwc-lJGXFXVfcDgGQZeJoV8vjK8RBe0RWU9u5xo5KIoNCK_ed3MLCZ5KBAJZT6L_ecZpeR5ak10onK-eUSJ1Bh5XUil9lptZT-jRe7WEnnfbCrRDqda2waWxvqVA_jbCHcQGqA6pJbVGPzvI" />
              <div class="min-w-0">
                <h5 class="font-orbitron font-bold text-xs text-on-surface truncate">Sekiro</h5>
                <span class="text-primary text-[10px] font-mono font-bold">91% Kemiripan</span>
              </div>
            </div>
            <span class="text-[10px] font-mono text-outline">FromSoftware &bull; 2019</span>
          </div>
          <!-- Mini-card 3: Lies of P -->
          <div class="rounded-lg bg-surface-container border border-primary/30 p-2.5 flex flex-col justify-between hover:border-primary transition-all hover:glow-cyan">
            <div class="flex items-center gap-2 mb-2">
              <img alt="Lies of P" class="w-10 h-10 rounded object-cover flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlDrkvWFAqDVrCh6V91q7upeVN7IrfPcsk0FHbzOOVOmp69qUbavIucqONefDF6KQ-o97y5ycjITtyEDf_zNPpjvE-8ppza5v6F9zP9JSUXxw57mLLYFAmsYPXUZqAv62lX7wXdfvyWPQF0JKMduaiOld8U1YoBlhHmZP-1OFMQzE5-bxXaxOh--qZMsAHlrXOcq_tgJaP4HsP6v_f24WIeDYgiyKlH4I3Tv4ktEgvQqLOwdZVSgIf" />
              <div class="min-w-0">
                <h5 class="font-orbitron font-bold text-xs text-on-surface truncate">Lies of P</h5>
                <span class="text-primary text-[10px] font-mono font-bold">88% Kemiripan</span>
              </div>
            </div>
            <span class="text-[10px] font-mono text-outline">Neowiz &bull; 2023</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Footer -->
    <div class="p-4 bg-surface-container-low border-t border-primary/30 flex items-center justify-between">
      <button class="px-5 py-2.5 rounded text-on-surface-variant hover:text-white font-orbitron text-xs font-semibold tracking-wider transition-colors uppercase" onclick="document.getElementById('modal-detail-game').classList.add('hidden')">
        Tutup
      </button>
      <a href="https://store.steampowered.com" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded bg-primary hover:bg-cyan-300 text-black font-orbitron text-xs font-black tracking-wider transition-all flex items-center gap-2 active:scale-95 shadow-[0_0_15px_rgba(0,240,255,0.6)] uppercase">
        <span class="material-symbols-outlined text-base">open_in_new</span>
        <span>Buka di Halaman Steam</span>
      </a>
    </div>
  </div>
</div>
