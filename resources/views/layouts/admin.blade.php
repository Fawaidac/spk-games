@extends('layouts.app')

@section('body-class', 'admin-dashboard bg-background text-on-surface font-body antialiased flex min-h-screen overflow-x-hidden selection:bg-primary selection:text-black cyber-grid')

@section('content')
  <!-- SIDEBAR: ESPORTS COCKPIT CONTROL PANEL -->
  @include('partials.admin-sidebar')

  <!-- MAIN VIEWPORT CONSOLE -->
  <main class="ml-64 flex-1 flex flex-col min-h-screen bg-background">
    <!-- TOP SEARCH BAR & TELEMETRY HUD -->
    @include('partials.admin-header')

    <!-- DASHBOARD VIEWPORT CONTENT -->
    <div class="p-8 space-y-8 flex-1">
      @yield('admin-content')
    </div>

    <!-- FOOTER CONSOLE -->
    @include('partials.admin-footer')
  </main>
@endsection
