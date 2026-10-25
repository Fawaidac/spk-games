<!-- FOOTER -->
<footer class="bg-[#06080d] border-t border-[#1e293b]">
  <div class="w-full py-12 px-6 max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
    <!-- Brand & Description -->
    <div class="flex flex-col items-center md:items-start gap-2">
      <a class="flex items-center gap-2 group" href="{{ route('landing') }}">
        <span class="material-symbols-outlined text-primary text-2xl" data-icon="sports_esports" style="font-variation-settings: 'FILL' 1">sports_esports</span>
        <span class="text-xl font-headline-sm font-extrabold text-white tracking-wider uppercase">Game<span class="text-primary">Match</span></span>
      </a>
      <p class="text-xs font-code-metric text-on-surface-variant text-center md:text-left">
        Hak Cipta &copy; {{ date('Y') }} GameMatch. Ditenagai oleh Dataset Kaggle &amp; Cosine Similarity Algoritma.
      </p>
    </div>
    <!-- Footer Quick Links -->
    <div class="flex flex-wrap justify-center items-center gap-6 text-xs font-label-md uppercase tracking-wider text-on-surface-variant">
      <a class="hover:text-primary transition-colors duration-150" href="{{ route('landing') }}#hero">Beranda</a>
      <a class="hover:text-primary transition-colors duration-150" href="{{ route('landing') }}#cara-kerja">Cara Kerja</a>
      <a class="hover:text-primary transition-colors duration-150" href="{{ route('landing') }}#rekomendasi">Rekomendasi</a>
      <a class="hover:text-primary transition-colors duration-150" href="{{ route('landing') }}#tentang">Tentang</a>
      <button class="hover:text-primary transition-colors duration-150 uppercase" onclick="toggleModal('modal-login')">
        Masuk
      </button>
      <button class="hover:text-primary transition-colors duration-150 uppercase" onclick="toggleModal('modal-register')">
        Daftar
      </button>
    </div>
  </div>
</footer>
