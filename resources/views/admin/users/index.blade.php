@extends('layouts.admin')

@section('title', 'GameMatch Console - Kontrol Akses & Manajemen Akun Pengguna')
@section('header-title', 'Kontrol Akses & Manajemen Akun Pengguna')
@section('header-subtitle', 'Daftar pengguna terdaftar, verifikasi akun, dan pengaturan role SuperAdmin')

@section('admin-content')
          <section class="bg-surface-container/90 rounded-xl border border-outline-variant shadow-2xl overflow-hidden relative">
            <div class="h-0.5 w-full bg-gradient-to-r from-primary via-tertiary to-secondary"></div>
            <!-- Header Pengguna -->
            <div class="p-6 border-b border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-4">
              <div>
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-primary text-[24px]">group</span>
                  <h3 class="font-headline font-bold text-lg text-white uppercase tracking-wider">
                    Manajemen Akun Pengguna &amp; Akses
                  </h3>
                  <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-primary/20 text-primary border border-primary/40">
                    {{ $totalUsers ?? 4 }} AKUN TERDAFTAR
                  </span>
                </div>
                <p class="font-mono text-xs text-on-surface-variant mt-1">
                  Kontrol otorisasi akun pengguna, role SuperAdmin, dan hak akses dashboard gamer
                </p>
              </div>

              <!-- Controls: Search & Filter User -->
              <div class="flex flex-wrap items-center gap-3">
                <div class="relative min-w-[240px]">
                  <span class="material-symbols-outlined absolute left-3 top-2.5 text-primary/70 text-[18px]">search</span>
                  <input
                    id="search-user-input"
                    oninput="filterUserAdmin(this.value)"
                    class="w-full pl-9 pr-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs placeholder:text-on-surface-variant focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all"
                    placeholder="Cari nama atau email..."
                    type="text"
                  />
                </div>
                <select
                  id="filter-user-role"
                  onchange="filterUserRoleAdmin(this.value)"
                  class="px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white font-mono text-xs focus:outline-none focus:border-primary cursor-pointer">
                  <option value="all">Semua Role</option>
                  <option value="admin">Admin ML</option>
                  <option value="user">Gamer (User)</option>
                </select>
                <button
                  type="button"
                  onclick="openModalUser()"
                  class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-primary to-cyan-400 text-black rounded-lg font-headline font-bold text-xs uppercase tracking-wider hover:brightness-110 active:scale-95 shadow-md shadow-primary/20 glow-cyan-sm transition-all">
                  <span class="material-symbols-outlined text-[18px] font-bold">person_add</span>
                  <span>+ Tambah Akun</span>
                </button>
              </div>
            </div>

            <!-- KPI Metric Summary Row for Users -->
            <div class="p-6 grid grid-cols-1 sm:grid-cols-3 gap-4 border-b border-outline-variant bg-surface-container-low/50">
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">Total Akun</p>
                  <p class="text-2xl font-headline font-extrabold text-white mt-1">{{ $totalUsers ?? 4 }} User</p>
                  <p class="text-[10px] font-mono text-primary mt-0.5">Basis Database MySQL</p>
                </div>
                <div class="p-3 rounded-lg bg-primary/15 text-primary border border-primary/30">
                  <span class="material-symbols-outlined text-2xl">manage_accounts</span>
                </div>
              </div>
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">SuperAdmin</p>
                  <p class="text-2xl font-headline font-extrabold text-cyan-400 mt-1">{{ $totalAdmin ?? 1 }} Akun</p>
                  <p class="text-[10px] font-mono text-cyan-400/80 mt-0.5">Akses Penuh Pipeline ML</p>
                </div>
                <div class="p-3 rounded-lg bg-cyan-500/15 text-cyan-400 border border-cyan-500/30">
                  <span class="material-symbols-outlined text-2xl">shield_person</span>
                </div>
              </div>
              <div class="p-4 rounded-xl bg-surface-container border border-outline-variant flex items-center justify-between">
                <div>
                  <p class="text-[11px] font-mono text-on-surface-variant uppercase tracking-wider">Gamer Terdaftar</p>
                  <p class="text-2xl font-headline font-extrabold text-secondary mt-1">{{ $totalGamer ?? 3 }} User</p>
                  <p class="text-[10px] font-mono text-secondary mt-0.5">Portal Rekomendasi Personal</p>
                </div>
                <div class="p-3 rounded-lg bg-secondary/15 text-secondary border border-secondary/30">
                  <span class="material-symbols-outlined text-2xl">sports_esports</span>
                </div>
              </div>
            </div>

            <!-- Tabel Data Pengguna -->
            <div class="overflow-x-auto custom-scrollbar">
              <table class="w-full text-left border-collapse" id="admin-users-table">
                <thead>
                  <tr class="border-b border-outline-variant bg-surface-container-high/40 font-mono text-[11px] text-on-surface-variant uppercase tracking-wider">
                    <th class="py-3 px-6">Pengguna</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Role Akses</th>
                    <th class="py-3 px-4">Status Akun</th>
                    <th class="py-3 px-4">Terdaftar Sejak</th>
                    <th class="py-3 px-6 text-right">Aksi</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/60 font-mono text-xs">
                  @forelse($users ?? [] as $user)
                    <tr class="hover:bg-primary/5 transition-colors user-table-row" data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}" data-role="{{ $user->role }}">
                      <td class="py-3.5 px-6">
                        <div class="flex items-center gap-3">
                          <div class="w-9 h-9 rounded-lg {{ $user->isAdmin() ? 'bg-gradient-to-tr from-cyan-600 to-primary text-black' : 'bg-gradient-to-tr from-purple-800 to-secondary text-white' }} flex items-center justify-center font-headline font-bold text-xs shadow-md">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                          </div>
                          <div>
                            <div class="font-headline font-bold text-white text-sm flex items-center gap-1.5">
                              <span>{{ $user->name }}</span>
                              @if(auth()->check() && auth()->id() === $user->id)
                                <span class="text-[9px] px-1.5 py-0.2 rounded bg-tertiary/20 text-tertiary border border-tertiary/30">ANDA</span>
                              @endif
                            </div>
                            <span class="text-[10px] text-on-surface-variant">ID: #USR-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</span>
                          </div>
                        </div>
                      </td>
                      <td class="py-3.5 px-4 text-on-surface">
                        <span class="text-white font-medium">{{ $user->email }}</span>
                      </td>
                      <td class="py-3.5 px-4">
                        @if($user->isAdmin())
                          <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-primary/15 border border-primary/40 text-primary text-[11px] font-bold shadow-sm glow-cyan-sm">
                            <span class="material-symbols-outlined text-[14px]">shield</span>
                            <span>ADMIN ML</span>
                          </span>
                        @else
                          <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-secondary/15 border border-secondary/40 text-secondary text-[11px] font-bold">
                            <span class="material-symbols-outlined text-[14px]">person</span>
                            <span>GAMER</span>
                          </span>
                        @endif
                      </td>
                      <td class="py-3.5 px-4">
                        <span class="inline-flex items-center gap-1.5 text-tertiary text-xs font-semibold">
                          <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
                          <span>Aktif / Terverifikasi</span>
                        </span>
                      </td>
                      <td class="py-3.5 px-4 text-on-surface-variant text-[11px]">
                        {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '14 Okt 2026' }}
                      </td>
                      <td class="py-3.5 px-6 text-right">
                        <div class="inline-flex items-center gap-1.5">
                          <button
                            type="button"
                            onclick="alert('Fitur edit role pengguna {{ $user->name }} dibuka.')"
                            class="p-1.5 rounded hover:bg-surface-container text-on-surface-variant hover:text-primary transition-colors"
                            title="Edit Akses">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                          </button>
                          <button
                            type="button"
                            onclick="alert('Kirim reset tautan password ke {{ $user->email }}')"
                            class="p-1.5 rounded hover:bg-surface-container text-on-surface-variant hover:text-secondary transition-colors"
                            title="Reset Password">
                            <span class="material-symbols-outlined text-[18px]">lock_reset</span>
                          </button>
                          @if(auth()->id() !== $user->id)
                            <button
                              type="button"
                              onclick="if(confirm('Hapus pengguna {{ $user->name }}?')) alert('Pengguna berhasil dinonaktifkan.');"
                              class="p-1.5 rounded hover:bg-error-container/30 text-on-surface-variant hover:text-error transition-colors"
                              title="Hapus Pengguna">
                              <span class="material-symbols-outlined text-[18px]">delete</span>
                            </button>
                          @endif
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="py-8 text-center text-on-surface-variant">
                        Belum ada data pengguna yang terdaftar.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <!-- Tactical Pagination Bar -->
            <div class="p-4 bg-surface-container-low border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-3 font-mono text-xs">
              <span class="text-on-surface-variant">
                Halaman <span class="text-primary font-bold">{{ $users->currentPage() }}</span> dari
                <span class="text-white font-bold">{{ $users->lastPage() }}</span>
                (Menampilkan <span class="text-white font-bold">{{ $users->count() }}</span> dari
                <span class="text-primary font-bold">{{ number_format($users->total()) }}</span> akun)
              </span>
              <div class="pagination-container">
                {{ $users->links('partials.pagination-cyber') }}
              </div>
            </div>
          </section>


        <div id="modal-admin-user" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden flex items-center justify-center p-4">
          <div class="w-full max-w-md bg-surface-container border border-outline-variant rounded-xl p-6 shadow-2xl relative space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-outline-variant">
              <h4 class="font-headline font-bold text-white text-base flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">person_add</span>
                <span>Tambah Akun Pengguna Baru</span>
              </h4>
              <button type="button" onclick="closeModalUser()" class="text-on-surface-variant hover:text-white">
                <span class="material-symbols-outlined">close</span>
              </button>
            </div>
            <form onsubmit="event.preventDefault(); alert('Akun pengguna baru berhasil ditambahkan!'); closeModalUser();" class="space-y-4 font-mono text-xs">
              <div>
                <label class="block text-on-surface-variant mb-1">Nama Lengkap:</label>
                <input required type="text" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-primary focus:outline-none" placeholder="Misal: Ahmad Dani" />
              </div>
              <div>
                <label class="block text-on-surface-variant mb-1">Email:</label>
                <input required type="email" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-primary focus:outline-none" placeholder="nama@example.com" />
              </div>
              <div>
                <label class="block text-on-surface-variant mb-1">Password:</label>
                <input required type="password" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-primary focus:outline-none" placeholder="Minimal 8 karakter" />
              </div>
              <div>
                <label class="block text-on-surface-variant mb-1">Role Akses:</label>
                <select class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-lg text-white focus:border-primary focus:outline-none">
                  <option value="user">Gamer (User Standar)</option>
                  <option value="admin">Admin ML (SuperAdmin)</option>
                </select>
              </div>
              <div class="pt-3 border-t border-outline-variant flex items-center justify-end gap-2">
                <button type="button" onclick="closeModalUser()" class="px-4 py-2 rounded-lg border border-outline-variant text-on-surface-variant hover:text-white">Batal</button>
                <button type="submit" class="px-5 py-2 rounded-lg bg-primary text-black font-bold uppercase tracking-wider hover:brightness-110">Simpan Akun</button>
              </div>
            </form>
          </div>
        </div>

@endsection