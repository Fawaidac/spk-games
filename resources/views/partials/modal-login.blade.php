<!-- MODAL MASUK (LOGIN) -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[#080b11]/85 backdrop-blur-md hidden transition-opacity duration-200" id="modal-login">
  <div class="bg-[#0f1422] w-full max-w-md rounded-2xl border-2 border-primary/50 p-7 shadow-[0_0_40px_rgba(0,240,255,0.3)] relative tech-corner-accent animate-in fade-in zoom-in-95 duration-150">
    <!-- Close Button -->
    <button class="absolute top-4 right-4 text-on-surface-variant hover:text-white p-1 rounded-lg" onclick="toggleModal('modal-login')">
      <span class="material-symbols-outlined text-xl" data-icon="close">close</span>
    </button>
    <!-- Modal Header -->
    <div class="text-center mb-6">
      <div class="w-12 h-12 rounded-xl bg-surface-container-high border border-primary/40 flex items-center justify-center text-primary mx-auto mb-3 shadow-[0_0_15px_rgba(0,240,255,0.4)]">
        <span class="material-symbols-outlined text-2xl" data-icon="sports_esports">sports_esports</span>
      </div>
      <h3 class="text-2xl font-headline-md font-bold text-white uppercase tracking-wide">
        Masuk ke GameMatch
      </h3>
      <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">
        Akses profil preferensi game dan riwayat rekomendasi AI.
      </p>
    </div>
    <!-- Login Form -->
    <form class="space-y-4" action="{{ route('login.post') }}" method="POST">
      @csrf
      <div>
        <label class="block text-xs font-code-metric uppercase tracking-wider text-on-surface mb-1.5">Alamat Email</label>
        <div class="relative">
          <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant text-lg" data-icon="mail">mail</span>
          <input name="email" value="{{ old('email') }}" class="w-full bg-[#080b11] border border-[#1e293b] rounded-lg pl-10 pr-4 py-2.5 text-white placeholder:text-on-surface-variant/50 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all font-body-md" placeholder="gamer@domain.com" type="email" required />
        </div>
      </div>
      <div>
        <div class="flex justify-between items-center mb-1.5">
          <label class="block text-xs font-code-metric uppercase tracking-wider text-on-surface">Kata Sandi</label>
          <a class="text-xs font-code-metric text-primary hover:underline" href="#">Lupa sandi?</a>
        </div>
        <div class="relative">
          <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant text-lg" data-icon="lock">lock</span>
          <input name="password" class="w-full bg-[#080b11] border border-[#1e293b] rounded-lg pl-10 pr-4 py-2.5 text-white placeholder:text-on-surface-variant/50 text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all font-body-md" placeholder="••••••••" type="password" required />
        </div>
      </div>
      <div class="flex items-center">
        <input name="remember" class="rounded bg-[#080b11] border-[#1e293b] text-primary focus:ring-primary h-4 w-4" id="remember" type="checkbox" />
        <label class="ml-2 block text-body-sm text-on-surface-variant" for="remember">Ingat saya di perangkat ini</label>
      </div>
      <button class="w-full py-3 rounded btn-cyber-primary text-[#002022] font-headline-sm text-xs font-extrabold uppercase tracking-wider transition-all hover:glow-cyan" type="submit">
        Masuk Sekarang
      </button>
      <!-- Demo Quick Access Buttons -->
      <div class="pt-3 border-t border-[#1e293b]">
        <p class="text-[10px] font-code-metric text-[#94a3b8] uppercase tracking-widest text-center mb-2">
          // Akses Cepat Alur Demo //
        </p>
        <div class="grid grid-cols-2 gap-2">
          <button type="button" onclick="if(window.GameMatchFlow) GameMatchFlow.loginAsGamer()" class="flex items-center justify-center gap-1.5 py-2 px-2 rounded bg-surface-container border border-primary/40 hover:border-primary text-primary text-[11px] font-headline-sm font-bold uppercase tracking-wider hover:bg-primary/10 transition-all active:scale-95" title="Masuk cepat sebagai User (Budi)">
            <span class="material-symbols-outlined text-sm">sports_esports</span>
            <span>Demo Gamer</span>
          </button>
          <button type="button" onclick="if(window.GameMatchFlow) GameMatchFlow.loginAsAdmin()" class="flex items-center justify-center gap-1.5 py-2 px-2 rounded bg-surface-container border border-secondary/40 hover:border-secondary text-secondary text-[11px] font-headline-sm font-bold uppercase tracking-wider hover:bg-secondary/10 transition-all active:scale-95" title="Masuk cepat sebagai Super Admin">
            <span class="material-symbols-outlined text-sm">admin_panel_settings</span>
            <span>Demo ML Admin</span>
          </button>
        </div>
      </div>
    </form>
    <!-- Switcher to Register -->
    <div class="mt-6 pt-4 border-t border-[#1e293b] text-center text-body-sm text-on-surface-variant">
      Belum memiliki akun?
      <button class="text-primary font-bold hover:underline ml-1 font-code-metric uppercase text-xs" onclick="switchModal('modal-login', 'modal-register')">
        Daftar Gratis
      </button>
    </div>
  </div>
</div>
