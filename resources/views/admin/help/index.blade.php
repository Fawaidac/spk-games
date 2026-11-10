@extends('layouts.admin')

@section('title', 'GameMatch Console - Terminal Bantuan & Dokumentasi Sistem ML')
@section('header-title', 'Terminal Bantuan & Dokumentasi Sistem ML')
@section('header-subtitle', 'Spesifikasi arsitektur Content-Based Filtering dan format dataset')

@section('admin-content')
          <section class="bg-surface-container/90 rounded-xl border border-outline-variant p-6 shadow-2xl space-y-6 relative overflow-hidden">
            <div class="h-0.5 w-full bg-gradient-to-r from-primary via-secondary to-tertiary"></div>
            <div>
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[24px]">terminal</span>
                <h3 class="font-headline font-bold text-lg text-white uppercase tracking-wider">
                  Terminal Bantuan &amp; Dokumentasi Algoritma
                </h3>
              </div>
              <p class="font-mono text-xs text-on-surface-variant mt-1">
                Panduan komprehensif arsitektur Content-Based Filtering, ekstraksi TF-IDF, dan struktur dataset Steam
              </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Panduan 1: Arsitektur Pipeline -->
              <div class="p-5 rounded-xl bg-surface-container-low border border-outline-variant space-y-3">
                <div class="flex items-center gap-2 text-primary font-headline font-bold text-sm uppercase">
                  <span class="material-symbols-outlined text-lg">schema</span>
                  <span>Alur Pipeline Rekomendasi Game</span>
                </div>
                <p class="font-body text-xs text-on-surface-variant leading-relaxed">
                  Sistem rekomendasi <strong>GameMatch</strong> bekerja murni berbasis <strong>Content-Based Filtering</strong>:
                </p>
                <ol class="list-decimal list-inside font-mono text-xs text-on-surface space-y-2 pl-1">
                  <li><strong>Ingesti Dataset:</strong> Parsing CSV Steam Kaggle (app_id, title, genres, description).</li>
                  <li><strong>Text Preprocessing:</strong> Tokenisasi, lowercasing, stop-word removal, dan lemmatization pada deskripsi &amp; tag game.</li>
                  <li><strong>Vektorisasi TF-IDF:</strong> Pembentukan matriks bobot istilah untuk menangkap karakteristik intrinsik game.</li>
                  <li><strong>Cosine Similarity:</strong> Perhitungan sudut kosinus antar vektor game untuk mengukur derajat kemiripan numerik (0.0 s/d 1.0).</li>
                  <li><strong>Top-K Sorting:</strong> Pengurutan kandidat game teratas untuk disajikan secara real-time ke gamer.</li>
                </ol>
              </div>

              <!-- Panduan 2: Format CSV Dataset Steam -->
              <div class="p-5 rounded-xl bg-surface-container-low border border-outline-variant space-y-3">
                <div class="flex items-center gap-2 text-secondary font-headline font-bold text-sm uppercase">
                  <span class="material-symbols-outlined text-lg">data_object</span>
                  <span>Spesifikasi Kolom CSV Steam</span>
                </div>
                <p class="font-body text-xs text-on-surface-variant leading-relaxed">
                  Pastikan batch file CSV yang diunggah memenuhi skema standar berikut:
                </p>
                <div class="space-y-2 font-mono text-xs">
                  <div class="p-2 rounded bg-surface-container border border-outline-variant">
                    <span class="text-primary font-bold">app_id:</span> <span class="text-on-surface-variant">ID unik Steam (integer)</span>
                  </div>
                  <div class="p-2 rounded bg-surface-container border border-outline-variant">
                    <span class="text-secondary font-bold">name:</span> <span class="text-on-surface-variant">Judul resmi game (string)</span>
                  </div>
                  <div class="p-2 rounded bg-surface-container border border-outline-variant">
                    <span class="text-tertiary font-bold">genres:</span> <span class="text-on-surface-variant">Kategori dipisahkan koma (Action, RPG, ...)</span>
                  </div>
                  <div class="p-2 rounded bg-surface-container border border-outline-variant">
                    <span class="text-pink-400 font-bold">description:</span> <span class="text-on-surface-variant">Sinopsis gameplay atau overview</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- FAQ Section -->
            <div class="p-5 rounded-xl bg-surface-container-low border border-outline-variant space-y-3">
              <h4 class="font-headline font-bold text-sm text-white uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-tertiary text-lg">help</span>
                <span>Pertanyaan Sering Diajukan (FAQ)</span>
              </h4>
              <div class="space-y-3 text-xs">
                <div class="p-3 rounded-lg bg-surface-container border border-outline-variant">
                  <p class="text-white font-bold mb-1">Bagaimana cara menangani Cold-Start pengguna baru?</p>
                  <p class="text-on-surface-variant leading-relaxed">
                    Pengguna baru yang belum memiliki riwayat game akan diminta memilih genre favorit dan minimal 1-3 game referensi di Landing Page. Vektor preferensi langsung dikalkulasi terhadap matriks Steam untuk menghasilkan rekomendasi instan.
                  </p>
                </div>
                <div class="p-3 rounded-lg bg-surface-container border border-outline-variant">
                  <p class="text-white font-bold mb-1">Apakah proses import CSV memerlukan server restart?</p>
                  <p class="text-on-surface-variant leading-relaxed">
                    Tidak. Sistem mendukung live vector recalculation secara background asynchronous tanpa memutus session pengguna aktif.
                  </p>
                </div>
              </div>
            </div>
          </section>

@endsection
