@extends('layouts.app')

@section('body-class', 'cyber-grid-bg text-on-surface antialiased min-h-screen flex flex-col font-body-md selection:bg-primary selection:text-black')

@section('content')
  <!-- ESPORTS HUD TOP TICKER & TELEMETRY BAR -->
  @include('partials.hud-bar')

  <!-- TOP NAVIGATION BAR (Esports HUD Style) -->
  @include('partials.user-navbar')

  <!-- MAIN VIEWPORT CANVAS -->
  <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 py-6 pb-28 space-y-8">
    @yield('user-content')
  </main>

  <!-- MODAL POP-UP KOMPONEN DETAIL GAME -->
  @include('partials.modal-game-detail')

  <!-- FOOTER -->
  @include('partials.footer')
@endsection
