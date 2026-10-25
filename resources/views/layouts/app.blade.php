<!doctype html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'GameMatch - Rekomendasi Game PC AI & Cosine Similarity')</title>

    <!-- Google Fonts: Strictly 2 Harmonious Fonts (Orbitron for Headings & Chivo for Body/UI) -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css2?family=Chivo:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- Material Symbols Outlined -->
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
      rel="stylesheet"
    />

    <!-- Tailwind CSS with Forms & Container-Queries CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- External Tailwind Configuration (2-Font System & Palette) -->
    <script src="{{ asset('js/tailwind-config.js') }}"></script>

    <!-- Global Cyberpunk Theme Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/gamematch.css') }}" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    @yield('styles')
  </head>
  <body class="@yield('body-class', 'bg-[#080b11] text-on-surface antialiased font-body-md min-h-screen flex flex-col justify-between cyber-grid relative')">
    
    {{-- HUD Notification Toast (Laravel Flash Messages) --}}
    @if(session('success'))
      <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
           class="fixed top-20 right-6 z-50 flex items-center gap-3 px-4 py-3 bg-[#0f1422]/95 border-2 border-primary rounded-xl shadow-[0_0_25px_rgba(0,240,255,0.4)] backdrop-blur-md animate-in fade-in slide-in-from-top-4 duration-200">
        <span class="material-symbols-outlined text-primary text-xl">check_circle</span>
        <div>
          <p class="text-xs font-code-metric text-primary uppercase font-bold tracking-wider">SISTEM GAME MATCH</p>
          <p class="text-xs text-white">{{ session('success') }}</p>
        </div>
        <button @click="show = false" class="text-on-surface-variant hover:text-white ml-2 text-sm">✕</button>
      </div>
    @endif

    @if(session('error') || (isset($errors) && $errors->any()))
      <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
           class="fixed top-20 right-6 z-50 flex items-center gap-3 px-4 py-3 bg-[#0f1422]/95 border-2 border-error rounded-xl shadow-[0_0_25px_rgba(255,75,85,0.4)] backdrop-blur-md animate-in fade-in slide-in-from-top-4 duration-200">
        <span class="material-symbols-outlined text-error text-xl">error</span>
        <div>
          <p class="text-xs font-code-metric text-error uppercase font-bold tracking-wider">PERINGATAN</p>
          <p class="text-xs text-white">{{ session('error') ?? ($errors->first() ?? '') }}</p>
        </div>
        <button @click="show = false" class="text-on-surface-variant hover:text-white ml-2 text-sm">✕</button>
      </div>
    @endif

    @yield('content')

    <!-- GameMatch Core Controllers (Modals & Tab Switcher) -->
    <script src="{{ asset('js/app-core.js') }}"></script>

    @yield('scripts')

    <!-- GameMatch Unified Flow Controller -->
    <script src="{{ asset('js/flow.js') }}"></script>
  </body>
</html>
