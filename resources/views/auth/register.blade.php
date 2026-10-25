@extends('layouts.app')

@section('title', 'Daftar - GameMatch AI RecSys')

@section('body-class', 'bg-[#080b11] text-on-surface antialiased font-body-md min-h-screen flex items-center justify-center p-4 cyber-grid relative')

@section('content')
  <!-- Background Glows -->
  <div class="absolute -top-32 -left-32 w-[32rem] h-[32rem] bg-secondary/10 rounded-full blur-[140px] pointer-events-none"></div>
  <div class="absolute -bottom-32 -right-32 w-[34rem] h-[34rem] bg-primary/10 rounded-full blur-[150px] pointer-events-none"></div>

  <div class="w-full max-w-md relative z-10 animate-in fade-in zoom-in-95 duration-200">
    <!-- Back to Home -->
    <div class="mb-4 text-left">
      <a href="{{ route('landing') }}" class="inline-flex items-center gap-1.5 text-xs font-code-metric text-on-surface-variant hover:text-secondary transition-colors uppercase tracking-wider">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        <span>Kembali ke Beranda</span>
      </a>
    </div>

    
    <!-- Register Card -->
    <div class="bg-[#0f1422] w-full rounded-2xl border-2 border-secondary/50 p-8 shadow-[0_0_40px_rgba(192,132,252,0.3)] relative tech-corner-accent">
      <!-- Header -->
      <div class="text-center mb-6">
        <div class="w-14 h-14 rounded-xl bg-surface-container-high border border-secondary/40 flex items-center justify-center text-secondary mx-auto mb-3 shadow-[0_0_15px_rgba(192,132,252,0.4)]">
          <span class="material-symbols-outlined text-3xl" data-icon="person_add">person_add</span>
        </div>
        <div class="flex items-center justify-center gap-2 mb-1">
          <span class="text-2xl font-headline-md font-extrabold text-white uppercase tracking-wider">Game<span class="text-secondary">Match</span></span>
          <span class="px-1.5 py-0.2 text-[9px] font-label-sm font-bold bg-secondary/20 text-secondary border border-secondary/40 rounded tracking-widest">v2.4</span>
        </div>
        <h3 class="text-lg font-headline-sm font-bold text-white uppercase tracking-wide">
          Buat Akun Baru
        </h3>
        <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">
          Mulai kurasi game PC personal berbasis Cosine Similarity.
        </p>
      </div>

      <!-- Form -->
      <form class="space-y-4" action="{{ route('register.post') }}" method="POST">
        @csrf
        <div>
          <label class="block text-xs font-code-metric uppercase tracking-wider text-on-surface mb-1.5">Nama Gamer / Nickname</label>
          <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant text-lg" data-icon="badge">badge</span>
            <input name="name" value="{{ old('name') }}" class="w-full bg-[#080b11] border border-[#1e293b] rounded-lg pl-10 pr-4 py-2.5 text-white placeholder:text-on-surface-variant/50 text-body-md focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="GamerPro2026" type="text" required />
          </div>
        </div>

        <div>
          <label class="block text-xs font-code-metric uppercase tracking-wider text-on-surface mb-1.5">Alamat Email</label>
          <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant text-lg" data-icon="mail">mail</span>
            <input name="email" value="{{ old('email') }}" class="w-full bg-[#080b11] border border-[#1e293b] rounded-lg pl-10 pr-4 py-2.5 text-white placeholder:text-on-surface-variant/50 text-body-md focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="gamer@domain.com" type="email" required />
          </div>
        </div>

        <div>
          <label class="block text-xs font-code-metric uppercase tracking-wider text-on-surface mb-1.5">Kata Sandi</label>
          <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant text-lg" data-icon="lock">lock</span>
            <input name="password" class="w-full bg-[#080b11] border border-[#1e293b] rounded-lg pl-10 pr-4 py-2.5 text-white placeholder:text-on-surface-variant/50 text-body-md focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="Minimal 8 karakter" type="password" required />
          </div>
        </div>

        <div>
          <label class="block text-xs font-code-metric uppercase tracking-wider text-on-surface mb-1.5">Konfirmasi Kata Sandi</label>
          <div class="relative">
            <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant text-lg" data-icon="lock_reset">lock_reset</span>
            <input name="password_confirmation" class="w-full bg-[#080b11] border border-[#1e293b] rounded-lg pl-10 pr-4 py-2.5 text-white placeholder:text-on-surface-variant/50 text-body-md focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="Ulangi kata sandi" type="password" required />
          </div>
        </div>

        <div class="flex items-start">
          <input class="mt-1 rounded bg-[#080b11] border-[#1e293b] text-secondary focus:ring-secondary h-4 w-4" id="terms_page" type="checkbox" required />
          <label class="ml-2 block text-body-sm text-on-surface-variant" for="terms_page">
            Saya menyetujui Ketentuan Layanan &amp; Kebijakan Privasi data rekomendasi.
          </label>
        </div>

        <button class="w-full py-3 rounded btn-cyber-primary text-[#002022] font-headline-sm text-xs font-extrabold uppercase tracking-wider transition-all" type="submit">
          Daftar Sekarang
        </button>
      </form>

      <!-- Switcher to Login -->
      <div class="mt-6 pt-4 border-t border-[#1e293b] text-center text-body-sm text-on-surface-variant">
        Sudah memiliki akun?
        <a class="text-secondary font-bold hover:underline ml-1 font-code-metric uppercase text-xs" href="{{ route('login') }}">
          Masuk di sini
        </a>
      </div>
    </div>
  </div>
@endsection
