@extends('layouts.admin')

@section('title', 'GameMatch Console - Pipeline Ingesti Dataset Steam Kaggle')
@section('header-title', 'Pipeline Ingesti Dataset Steam Kaggle')
@section('header-subtitle', 'Unggah batch CSV, pemetaan atribut kolom, dan sinkronisasi vektor')

@section('admin-content')
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
              class="hidden sm:flex items-center gap-1.5 px-3 py-1 rounded bg-amber-500/10 border border-amber-500/30 font-mono text-[11px] text-amber-400 font-bold"
            >
              <span
                class="w-2 h-2 rounded-full bg-amber-400"
              ></span>
              MODUL NONAKTIF (ARSIP)
            </div>
          </div>

          <!-- Banner Status Modul Dinonaktifkan -->
          <div class="p-4 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-300 font-mono text-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
              <span class="material-symbols-outlined text-amber-400 text-2xl shrink-0">pause_circle</span>
              <div>
                <span class="font-bold text-white uppercase tracking-wider block">Status: Modul Import Dataset Dinonaktifkan</span>
                <span class="text-on-surface-variant text-[11px]">Dataset 8.000 game telah aktif terindeks di database. Posisi menu utama saat ini digantikan oleh <strong>History Rekomendasi</strong>.</span>
              </div>
            </div>
            <a href="{{ route('admin.history') }}" class="px-3 py-1.5 rounded-lg bg-tertiary/20 text-tertiary border border-tertiary/40 hover:bg-tertiary/30 font-bold whitespace-nowrap transition-colors flex items-center gap-1.5 self-start sm:self-center">
              <span class="material-symbols-outlined text-[16px]">history</span>
              <span>Lihat History Rekomendasi</span>
            </a>
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

@endsection
