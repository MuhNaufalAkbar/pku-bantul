<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - PKU Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0065A4;
            --primary-dark: #004b6b;
            --primary-light: #e0f0fb;
            --accent: #e53e3e;
        }

        * { box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; padding: 0; }

        body {
            background: #f4f8fc;
            color: #0f1f2e;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── NAV ── */
        nav.main-nav {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(0,101,164,0.10);
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 24px rgba(0,101,164,0.07);
        }

        .nav-link {
            position: relative;
            color: var(--primary);
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: color 0.2s;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            left: 0; bottom: -3px;
            width: 0; height: 2px;
            background: var(--accent);
            border-radius: 2px;
            transition: width 0.25s ease;
        }
        .nav-link:hover { color: var(--accent); }
        .nav-link:hover::after { width: 100%; }

        .btn-daftar {
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            color: #fff;
            font-weight: 700;
            padding: 0.45rem 1.35rem;
            border-radius: 50px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(0,101,164,0.30);
            text-decoration: none;
            font-size: 0.95rem;
        }
        .btn-daftar:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,101,164,0.40);
        }

        #mobileMenu { border-top: 1px solid rgba(0,101,164,0.1); }

        /* ── MAIN CONTENT ── */
        .login-main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
            position: relative;
            overflow: hidden;
        }

        /* Background decoration */
        .login-main::before {
            content: '';
            position: absolute;
            top: -120px; right: -120px;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,101,164,0.07), transparent 70%);
            pointer-events: none;
        }
        .login-main::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -80px;
            width: 360px; height: 360px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,101,164,0.05), transparent 70%);
            pointer-events: none;
        }

        /* ── CARD ── */
        .login-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 70px rgba(0,0,0,0.10);
            border: 1px solid rgba(0,101,164,0.08);
            display: grid;
            grid-template-columns: 1fr 1.05fr;
            overflow: hidden;
            width: 100%;
            max-width: 920px;
            position: relative;
            z-index: 1;
        }

        /* Left panel: illustration */
        .login-left {
            background: linear-gradient(160deg, #0f172a 0%, #0a2a45 50%, #0065A4 100%);
            padding: 56px 44px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.055) 1px, transparent 1px);
            background-size: 24px 24px;
            pointer-events: none;
        }

        .login-left::after {
            content: '';
            position: absolute;
            bottom: -60px; right: -60px;
            width: 260px; height: 260px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            pointer-events: none;
        }

        .login-brand {
            position: relative;
            z-index: 1;
        }

        .login-brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.85);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 50px;
            margin-bottom: 20px;
        }

        .login-brand h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .login-brand p {
            font-size: 13.5px;
            color: rgba(255,255,255,0.6);
            line-height: 1.7;
            font-weight: 300;
        }

        .login-illustration {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .login-illustration img {
            width: 100%;
            max-width: 260px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            filter: drop-shadow(0 16px 40px rgba(0,0,0,0.3));
            transition: transform 0.4s ease;
        }

        .login-illustration img:hover {
            transform: translateY(-8px) !important;
        }

        .login-stats {
            display: flex;
            gap: 24px;
            position: relative;
            z-index: 1;
        }

        .login-stat {
            text-align: center;
        }

        .login-stat .num {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #fff;
            line-height: 1;
        }

        .login-stat .lbl {
            font-size: 11px;
            color: rgba(255,255,255,0.5);
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-top: 4px;
        }

        .stat-divider {
            width: 1px;
            background: rgba(255,255,255,0.15);
            align-self: stretch;
        }

        /* Right panel: form */
        .login-right {
            padding: 52px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header .welcome {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .form-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #0f1f2e;
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .form-header p {
            font-size: 14px;
            color: #64748b;
            font-weight: 400;
        }

        /* Alert */
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }
        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }
        .alert ul { margin: 0; padding-left: 16px; }

        /* Form fields */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 7px;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 11px 14px 11px 40px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            color: #0f1f2e;
            background: #f8fafc;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0,101,164,0.10);
        }

        .form-group input::placeholder { color: #b0bec5; }

        /* Toggle password */
        .toggle-pw {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.2s;
        }
        .toggle-pw:hover { color: var(--primary); }

        /* Forgot password */
        .forgot-row {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 24px;
        }
        .forgot-row a {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--accent);
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .forgot-row a:hover { opacity: 0.75; }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 6px 20px rgba(0,101,164,0.30);
            font-family: 'Plus Jakarta Sans', sans-serif;
            letter-spacing: 0.3px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(0,101,164,0.40);
        }
        .btn-submit:active { transform: translateY(0); }

        /* Register link */
        .register-link {
            text-align: center;
            margin-top: 24px;
            font-size: 13.5px;
            color: #64748b;
        }
        .register-link a {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .register-link a:hover { opacity: 0.75; }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }
        .divider span {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 500;
        }

        /* ── FOOTER ── */
        footer .footer-main {
            background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%);
        }
        footer .footer-bottom {
            background: var(--primary-dark);
        }

        .footer-heading {
            font-size: 0.85rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
            margin-bottom: 0.75rem;
        }

        .social-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.18);
            display: flex; align-items: center; justify-content: center;
            transition: background 0.2s, transform 0.2s;
        }
        .social-icon:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-3px);
        }

        /* ── ANIMATION ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .login-card { animation: fadeUp 0.7s ease forwards; }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .login-card { grid-template-columns: 1fr; max-width: 460px; }
            .login-left { display: none; }
            .login-right { padding: 40px 32px; }
        }

        @media (max-width: 480px) {
            .login-right { padding: 32px 24px; }
        }
    </style>
</head>

<body>

    <!-- ── NAV ── -->
    <nav class="main-nav">
        <div class="container mx-auto flex items-center justify-between px-5 py-3">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('images/logouad.jpg') }}" alt="Logo UAD" class="h-10" />
                <img src="{{ asset('images/logopku.png') }}" alt="Logo PKU" class="h-10" />
            </a>

            <ul class="hidden md:flex items-center space-x-7">
                <li><a href="{{ url('/') }}" class="nav-link">Beranda</a></li>
                <li><a href="{{ url('/tentang') }}" class="nav-link">Tentang</a></li>
                <li><a href="{{ url('/kegiatan') }}" class="nav-link">Kegiatan</a></li>
                <li><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
            </ul>

            <button id="menuBtn" class="md:hidden focus:outline-none p-2 rounded-lg hover:bg-blue-50 transition">
                <svg class="w-6 h-6 text-[#0065A4]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <div id="mobileMenu" class="hidden md:hidden bg-white/95 backdrop-blur px-5 pt-4 pb-6">
            <ul class="space-y-4 font-semibold text-[#0065A4]">
                <li><a href="{{ url('/') }}" class="block hover:text-red-600 transition">Beranda</a></li>
                <li><a href="{{ url('/tentang') }}" class="block hover:text-red-600 transition">Tentang</a></li>
                <li><a href="{{ url('/kegiatan') }}" class="block hover:text-red-600 transition">Kegiatan</a></li>
                <li><a href="{{ url('/dashboard') }}" class="block hover:text-red-600 transition">Dashboard</a></li>
                <li><a href="{{ route('login') }}" class="block hover:text-red-600 transition">Login</a></li>
                <li><a href="{{ route('register') }}" class="block hover:text-red-600 transition">Daftar</a></li>
            </ul>
        </div>
    </nav>

    <!-- ── MAIN ── -->
    <main class="login-main">
        <div class="login-card">

            <!-- LEFT: Ilustrasi & branding -->
            <div class="login-left">
                <div class="login-brand">
                    <div class="login-brand-badge">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="4"/></svg>
                        RS PKU Muhammadiyah
                    </div>
                    <h2>Selamat Datang<br>Kembali</h2>
                    <p>Masuk untuk mengakses layanan pemantauan dan penanggulangan TBC Bantul.</p>
                </div>

                <div class="login-illustration">
                    <img src="{{ asset('images/perawat.png') }}" alt="Ilustrasi Perawat" />
                </div>

                <div class="login-stats">
                    <div class="login-stat">
                        <div class="num">58+</div>
                        <div class="lbl">Tahun</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="login-stat">
                        <div class="num">24/7</div>
                        <div class="lbl">Layanan</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="login-stat">
                        <div class="num">100%</div>
                        <div class="lbl">Terpercaya</div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Form -->
            <div class="login-right">

                <div class="form-header">
                    <div class="welcome">Portal Pasien &amp; Perawat</div>
                    <h1>Masuk ke Akun</h1>
                    <p>Gunakan User ID dan password yang terdaftar</p>
                </div>

                <!-- Alert Success -->
                @if (session('success'))
                <div class="alert alert-success">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0;margin-top:1px"><circle cx="8" cy="8" r="7" stroke="#166534" stroke-width="1.5"/><path d="M5 8l2 2 4-4" stroke="#166534" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                <!-- Alert Error -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0;margin-top:1px"><circle cx="8" cy="8" r="7" stroke="#991b1b" stroke-width="1.5"/><path d="M8 5v4M8 10.5v.5" stroke="#991b1b" stroke-width="1.5" stroke-linecap="round"/></svg>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf

                    <!-- User ID -->
                    <div class="form-group">
                        <label for="userId">User ID</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5.5" r="3" stroke="currentColor" stroke-width="1.4"/><path d="M2 13c0-3.314 2.686-4.5 6-4.5s6 1.186 6 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                            </span>
                            <input type="text" id="userId" name="userId" placeholder="Masukkan User ID" required value="{{ old('userId') }}" />
                        </div>
                    </div>

                    <!-- Kode Referral -->
                    <div class="form-group">
                        <label for="referral">Kode Referral <span style="color:#94a3b8;font-weight:400;">(opsional)</span></label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="4" width="12" height="9" rx="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M5 4V3a3 3 0 016 0v1" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                            </span>
                            <input type="text" id="referral" name="referral" placeholder="Masukkan kode referral" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="3" y="7" width="10" height="7" rx="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M5 7V5a3 3 0 016 0v2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><circle cx="8" cy="10.5" r="1" fill="currentColor"/></svg>
                            </span>
                            <input type="password" id="password" name="password" placeholder="Masukkan password" required />
                            <span class="toggle-pw" onclick="togglePassword()" id="eyeIcon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="8" r="2" stroke="currentColor" stroke-width="1.4"/></svg>
                            </span>
                        </div>
                    </div>

                    <!-- Forgot password -->
                    <div class="forgot-row">
                        <a href="{{ route('lupapassword') }}">Lupa Password?</a>
                    </div>

                    <button type="submit" class="btn-submit">Masuk Sekarang</button>
                </form>

                <div class="divider"><span>atau</span></div>

                <div class="register-link">
                    Belum punya akun? <a href="{{ route('register.step1') }}">Daftar Sekarang</a>
                </div>

            </div>
        </div>
    </main>

    <!-- ── FOOTER ── -->
    <footer>
        <div class="footer-main py-10 px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">

                <div>
                    <p class="footer-heading">Tentang TBC</p>
                    <p class="text-[13px] text-white/75 leading-relaxed">
                        <strong class="text-white">Tuberkulosis (TBC)</strong> adalah penyakit infeksi menular yang disebabkan oleh bakteri
                        <em>Mycobacterium tuberculosis</em>. Penyakit ini umumnya menyerang paru-paru, namun bisa juga menyerang bagian tubuh lain.
                        TBC termasuk salah satu penyakit paling mematikan di dunia, terutama di negara berkembang.
                    </p>
                </div>

                <div class="md:pl-8">
                    <p class="footer-heading">Kontak Kami</p>
                    <address class="not-italic text-sm text-white/80 leading-relaxed">
                        Jl. Jend. Sudirman No.124,<br>
                        Nyangkringan, Bantul, Kec. Bantul,<br>
                        Kabupaten Bantul,<br>
                        Daerah Istimewa Yogyakarta 55711
                    </address>
                </div>

                <div>
                    <p class="footer-heading">Temukan Kami</p>
                    <div class="flex space-x-3">
                        <a href="#" class="social-icon"><img src="{{ asset('images/logo_facebook.png') }}"  alt="Facebook"  class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="{{ asset('images/logo_instagram.png') }}" alt="Instagram" class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="{{ asset('images/logo_whatsapp.png') }}"  alt="WhatsApp"  class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="{{ asset('images/logo_youtube.png') }}"   alt="YouTube"   class="w-5 h-5 object-contain"></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-bottom py-4 text-center text-xs text-white/60">
            <p>Copyright &copy; 2024 tbindonesia.or.id | All rights reserved.</p>
        </div>
    </footer>

    <script>
        /* Mobile menu */
        document.getElementById("menuBtn").addEventListener("click", () => {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        });

        /* Toggle password visibility */
        function togglePassword() {
            const input = document.getElementById("password");
            const isHidden = input.type === "password";
            input.type = isHidden ? "text" : "password";
            document.getElementById("eyeIcon").innerHTML = isHidden
                ? `<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z" stroke="currentColor" stroke-width="1.4"/><path d="M3 3l10 10" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>`
                : `<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="8" r="2" stroke="currentColor" stroke-width="1.4"/></svg>`;
        }
    </script>

</body>
</html>