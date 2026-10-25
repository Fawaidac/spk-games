/**
 * GameMatch - Unified Flow & Authentication Controller
 * Menghubungkan seluruh alur antara:
 * 1. Landing Page (index.html)
 * 2. Portal Gamer / User Dashboard (user-after-login.html)
 * 3. ML Admin Console / SuperAdmin Dashboard (dashboard-admin.html)
 */

const GameMatchFlow = {
  // Key storage
  STORAGE_KEY: "gamematch_session",

  // Default User Profiles
  DEMO_USERS: {
    gamer: {
      role: "gamer",
      name: "Raka Pratama",
      badge: "GAMER PRO",
      email: "raka.p@gamematch.id",
      avatar:
        "https://lh3.googleusercontent.com/aida-public/AB6AXuB8exb7uIagpRF82W7B7AEbAfRQUdBlnsaQsDNzJV-ikn9obewutkUriQfMBsTexEqYOlBHPVuPWBMx_CayZP7BaATMeQ3LfMZ2_L6q5dev84WpLi9xwY3o_E-6gUCCQvjZiFN30Bj2PBU4XXtS7rqJbeYkfWrHuWXsHU-LK-fwWvVaRPOJKuF-XOB5r5VNxKUOoWu-wpZEmo8V8Knu-vAj595GqW-RgMi5Hn2Uhbm2bGRkl2E6qSAz",
    },
    admin: {
      role: "admin",
      name: "SuperAdmin Rizky",
      badge: "HEAD OF ML PIPELINE",
      email: "admin@gamematch.id",
      avatar: "SR",
    },
  },

  // Inisialisasi state saat halaman dimuat
  init() {
    this.createToastContainer();
    this.syncSessionUI();
    this.bindGlobalEvents();
  },

  // Mendapatkan sesi saat ini
  getSession() {
    try {
      const data = localStorage.getItem(this.STORAGE_KEY);
      return data ? JSON.parse(data) : null;
    } catch (e) {
      return null;
    }
  },

  // Menyimpan sesi
  setSession(userData) {
    try {
      localStorage.setItem(this.STORAGE_KEY, JSON.stringify(userData));
    } catch (e) {
      console.error("Gagal menyimpan sesi:", e);
    }
  },

  // Hapus sesi
  clearSession() {
    try {
      localStorage.removeItem(this.STORAGE_KEY);
    } catch (e) {
      console.error("Gagal menghapus sesi:", e);
    }
  },

  // Helper URLs
  getUrl(page) {
    const isHtml = window.location.pathname.endsWith('.html');
    if (page === 'admin') return isHtml ? 'dashboard-admin.html' : '/admin';
    if (page === 'gamer') return isHtml ? 'user-after-login.html' : '/dashboard';
    return isHtml ? 'index.html' : '/';
  },

  // Deteksi halaman saat ini
  getCurrentPage() {
    const path = window.location.pathname.toLowerCase();
    if (path.includes("dashboard-admin") || path.includes("/admin")) return "admin";
    if (path.includes("user-after-login") || path.includes("/dashboard") || path.includes("/user")) return "gamer";
    return "landing";
  },

  // Toast Notification HUD
  createToastContainer() {
    if (document.getElementById("gm-toast-container")) return;
    const container = document.createElement("div");
    container.id = "gm-toast-container";
    container.style.cssText =
      "position:fixed;top:20px;right:20px;z-index:999999;display:flex;flex-direction:column;gap:10px;pointer-events:none;font-family:'Space Grotesk',sans-serif;";
    document.body.appendChild(container);
  },

  showToast(title, message, type = "cyan", duration = 2500) {
    this.createToastContainer();
    const container = document.getElementById("gm-toast-container");
    const toast = document.createElement("div");

    let borderColor = "#00f0ff";
    let bgGlow = "rgba(0,240,255,0.2)";
    let icon = "check_circle";

    if (type === "purple" || type === "admin") {
      borderColor = "#c084fc";
      bgGlow = "rgba(192,132,252,0.25)";
      icon = "shield";
    } else if (type === "warning" || type === "logout") {
      borderColor = "#ff4b55";
      bgGlow = "rgba(255,75,85,0.25)";
      icon = "logout";
    }

    toast.style.cssText = `
      min-width: 300px;
      max-width: 380px;
      background: #0b0f17;
      border: 1px solid ${borderColor};
      box-shadow: 0 0 25px ${bgGlow}, 0 10px 30px rgba(0,0,0,0.8);
      border-radius: 12px;
      padding: 14px 18px;
      color: #fff;
      display: flex;
      align-items: center;
      gap: 14px;
      opacity: 0;
      transform: translateY(-15px) scale(0.95);
      transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
      pointer-events: auto;
      backdrop-filter: blur(12px);
    `;

    toast.innerHTML = `
      <div style="width:36px;height:36px;border-radius:8px;background:${bgGlow};border:1px solid ${borderColor};display:flex;align-items:center;justify-content:center;color:${borderColor};flex-shrink:0;">
        <span class="material-symbols-outlined" style="font-size:20px;">${icon}</span>
      </div>
      <div style="flex-grow:1;">
        <div style="font-size:11px;font-family:'Space Mono',monospace;letter-spacing:1px;text-transform:uppercase;color:${borderColor};font-weight:700;">${title}</div>
        <div style="font-size:13px;color:#e2e8f0;margin-top:2px;font-weight:500;">${message}</div>
      </div>
    `;

    container.appendChild(toast);

    requestAnimationFrame(() => {
      toast.style.opacity = "1";
      toast.style.transform = "translateY(0) scale(1)";
    });

    setTimeout(() => {
      toast.style.opacity = "0";
      toast.style.transform = "translateY(-10px) scale(0.95)";
      setTimeout(() => toast.remove(), 300);
    }, duration);
  },



  // Helper saat switch via flow hub
  ensureUserSession(e) {
    if (!this.getSession() || this.getSession().role !== "gamer") {
      this.setSession(this.DEMO_USERS.gamer);
    }
  },

  ensureAdminSession(e) {
    if (!this.getSession() || this.getSession().role !== "admin") {
      this.setSession(this.DEMO_USERS.admin);
    }
  },

  // Aksi Login Gamer
  loginAsGamer(customName, customEmail) {
    const loginForm = document.querySelector("#modal-login form") || document.querySelector("form[action*='login']");
    if (loginForm && loginForm.getAttribute("action") && loginForm.getAttribute("method")?.toUpperCase() === "POST") {
      const emailInput = loginForm.querySelector("input[name='email']") || loginForm.querySelector("input[type='email']");
      const passInput = loginForm.querySelector("input[name='password']") || loginForm.querySelector("input[type='password']");
      if (emailInput && passInput) {
        emailInput.value = customEmail || "budi@example.com";
        passInput.value = "user12345";
        loginForm.submit();
        return;
      }
    }

    const gamer = {
      ...this.DEMO_USERS.gamer,
      name: customName || this.DEMO_USERS.gamer.name,
      email: customEmail || this.DEMO_USERS.gamer.email,
    };
    this.setSession(gamer);
    this.showToast(
      "AKSES GAMER DIIZINKAN",
      `Selamat datang, ${gamer.name}! Mengalihkan...`,
      "cyan"
    );
    setTimeout(() => {
      window.location.href = this.getUrl('gamer');
    }, 700);
  },

  // Aksi Login Admin
  loginAsAdmin(customEmail) {
    const loginForm = document.querySelector("#modal-login form") || document.querySelector("form[action*='login']");
    if (loginForm && loginForm.getAttribute("action") && loginForm.getAttribute("method")?.toUpperCase() === "POST") {
      const emailInput = loginForm.querySelector("input[name='email']") || loginForm.querySelector("input[type='email']");
      const passInput = loginForm.querySelector("input[name='password']") || loginForm.querySelector("input[type='password']");
      if (emailInput && passInput) {
        emailInput.value = customEmail || "admin@gameMatch.com";
        passInput.value = "admin12345";
        loginForm.submit();
        return;
      }
    }

    const admin = {
      ...this.DEMO_USERS.admin,
      email: customEmail || this.DEMO_USERS.admin.email,
    };
    this.setSession(admin);
    this.showToast(
      "AKSES ADMIN ML TERVERIFIKASI",
      "Membuka Konsol Administrasi & Algoritma...",
      "admin"
    );
    setTimeout(() => {
      window.location.href = this.getUrl('admin');
    }, 700);
  },

  // Aksi Logout
  logout(event) {
    if (event) event.preventDefault();
    this.clearSession();
    this.showToast(
      "SESI DIAKHIRI",
      "Anda telah keluar. Mengalihkan ke Beranda...",
      "logout"
    );
    setTimeout(() => {
      window.location.href = this.getUrl('landing');
    }, 700);
  },

  // Sinkronisasi data user pada tampilan (misal nama gamer di user-after-login.html)
  syncSessionUI() {
    const session = this.getSession();
    const currentPage = this.getCurrentPage();

    if (currentPage === "gamer" && session && session.name) {
      // Perbarui nama di header & profile dropdown jika ada elemennya
      const nameElements = document.querySelectorAll(
        ".font-orbitron.font-bold.text-on-surface"
      );
      nameElements.forEach((el) => {
        if (el.textContent.trim() === "Raka Pratama") {
          el.textContent = session.name;
        }
      });
      if (session.email) {
        const emailElements = document.querySelectorAll(
          ".text-primary\\/80.font-mono"
        );
        emailElements.forEach((el) => {
          if (el.textContent.includes("raka.p@gamematch.id")) {
            el.textContent = session.email;
          }
        });
      }
    }
  },

  // Event handlers untuk form login dan register di prototype static (jika tanpa backend action)
  bindGlobalEvents() {
    // Tangani form login jika tidak memiliki action Laravel POST
    const loginForm = document.querySelector("#modal-login form");
    if (loginForm && (!loginForm.getAttribute("action") || loginForm.getAttribute("action") === "#")) {
      loginForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const emailInput = loginForm.querySelector("input[type='email']");
        const email = emailInput ? emailInput.value.trim() : "";

        if (email.toLowerCase().includes("admin")) {
          this.loginAsAdmin(email);
        } else {
          this.loginAsGamer(null, email || null);
        }
      });
    }

    // Tangani form register jika tidak memiliki action Laravel POST
    const registerForm = document.querySelector("#modal-register form");
    if (registerForm && (!registerForm.getAttribute("action") || registerForm.getAttribute("action") === "#")) {
      registerForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const nameInput = registerForm.querySelector("input[type='text']");
        const emailInput = registerForm.querySelector("input[type='email']");

        const name = nameInput && nameInput.value.trim() ? nameInput.value.trim() : "Gamer Baru";
        const email = emailInput && emailInput.value.trim() ? emailInput.value.trim() : "gamer@domain.com";

        this.setSession({
          role: "gamer",
          name: name,
          badge: "GAMER PRO",
          email: email,
          avatar: this.DEMO_USERS.gamer.avatar,
        });

        this.showToast(
          "REGISTRASI BERHASIL",
          `Selamat datang, ${name}! Profil dibuat.`,
          "cyan"
        );

        setTimeout(() => {
          window.location.href = this.getUrl('gamer');
        }, 800);
      });
    }
  },
};

// Jalankan saat DOM siap
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", () => GameMatchFlow.init());
} else {
  GameMatchFlow.init();
}
