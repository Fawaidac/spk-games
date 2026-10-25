/**
 * GameMatch RecSys Platform - Tailwind CSS Configuration
 * Strictly Harmonized Typography:
 * - Orbitron: Judul / Teks Besar / Heading / Display
 * - Chivo: Teks Kecil / Body / Deskripsi / Tabel / Metrik
 */
tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        'surface-container-lowest': '#06080d',
        'surface-container-low': '#0b0f17',
        'surface-container': '#111622',
        'surface-container-high': '#181f2f',
        'surface-container-highest': '#222a3d',
        'surface-dim': '#080b11',
        'surface-bright': '#2b374e',
        background: '#080b11',
        surface: '#090d14',
        primary: '#00f0ff',
        'primary-container': '#005a63',
        'primary-fixed': '#7df4ff',
        'primary-fixed-dim': '#00dbe9',
        'on-primary': '#002022',
        'on-primary-container': '#002b30',
        secondary: '#c084fc',
        'secondary-container': '#7e22ce',
        'on-secondary': '#ffffff',
        tertiary: '#00ffa3',
        'tertiary-container': '#004d30',
        'on-tertiary': '#002414',
        'neon-pink': '#ff007f',
        outline: '#334155',
        'outline-variant': '#1e293b',
        'on-surface': '#e2e8f0',
        'on-surface-variant': '#94a3b8',
        error: '#ff4b55',
        'error-container': '#550013',
        'on-error': '#ffffff',
      },
      fontFamily: {
        // 1. Teks Besar & Judul (Headings, Display, Titles) -> Orbitron
        orbitron: ['Orbitron', 'sans-serif'],
        headline: ['Orbitron', 'sans-serif'],
        'headline-xl': ['Orbitron', 'sans-serif'],
        'headline-lg': ['Orbitron', 'sans-serif'],
        'headline-md': ['Orbitron', 'sans-serif'],
        'headline-sm': ['Orbitron', 'sans-serif'],
        'title-lg': ['Orbitron', 'sans-serif'],
        'title-md': ['Orbitron', 'sans-serif'],

        // 2. Teks Kecil & Body (Paragraphs, Tables, Metrics, Labels) -> Chivo
        chivo: ['Chivo', 'sans-serif'],
        body: ['Chivo', 'sans-serif'],
        'body-lg': ['Chivo', 'sans-serif'],
        'body-md': ['Chivo', 'sans-serif'],
        'body-sm': ['Chivo', 'sans-serif'],
        mono: ['Chivo', 'sans-serif'],
        'label-lg': ['Chivo', 'sans-serif'],
        'label-md': ['Chivo', 'sans-serif'],
        'label-sm': ['Chivo', 'sans-serif'],
        'code-metric': ['Chivo', 'sans-serif'],
      },
    },
  },
};
