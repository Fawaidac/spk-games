@extends('layouts.admin')

@section('title', 'GameMatch Console - Konfigurasi Mesin Rekomendasi & Algoritma')
@section('header-title', 'Konfigurasi Mesin Rekomendasi & Algoritma')
@section('header-subtitle', 'Parameter Cosine Similarity, batasan TF-IDF, dan optimasi performa')

@section('admin-content')
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

@endsection
