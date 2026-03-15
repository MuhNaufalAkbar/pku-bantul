<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Tahap 2 - PKU Bantul</title>
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

        body { background: #f4f8fc; color: #0f1f2e; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── NAV ── */
        nav.main-nav {
            background: rgba(255,255,255,0.85); backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px); border-bottom: 1px solid rgba(0,101,164,0.10);
            position: sticky; top: 0; z-index: 50; box-shadow: 0 2px 24px rgba(0,101,164,0.07);
        }
        .nav-link {
            position: relative; color: var(--primary); font-weight: 600;
            font-size: 0.95rem; text-decoration: none; transition: color 0.2s;
        }
        .nav-link::after {
            content: ''; position: absolute; left: 0; bottom: -3px;
            width: 0; height: 2px; background: var(--accent);
            border-radius: 2px; transition: width 0.25s ease;
        }
        .nav-link:hover { color: var(--accent); }
        .nav-link:hover::after { width: 100%; }
        #mobileMenu { border-top: 1px solid rgba(0,101,164,0.1); }

        /* ── MAIN ── */
        .register-main {
            flex: 1; display: flex; align-items: center;
            justify-content: center; padding: 48px 24px; position: relative; overflow: hidden;
        }
        .register-main::before {
            content: ''; position: absolute; top: -120px; right: -120px;
            width: 500px; height: 500px; border-radius: 50%;
            background: radial-gradient(circle, rgba(0,101,164,0.07), transparent 70%); pointer-events: none;
        }
        .register-main::after {
            content: ''; position: absolute; bottom: -80px; left: -80px;
            width: 360px; height: 360px; border-radius: 50%;
            background: radial-gradient(circle, rgba(0,101,164,0.05), transparent 70%); pointer-events: none;
        }

        /* ── CARD ── */
        .register-card {
            background: #fff; border-radius: 24px;
            box-shadow: 0 20px 70px rgba(0,0,0,0.10);
            border: 1px solid rgba(0,101,164,0.08);
            display: grid; grid-template-columns: 1fr 1.15fr;
            overflow: hidden; width: 100%; max-width: 960px;
            position: relative; z-index: 1;
            animation: fadeUp 0.7s ease forwards;
        }

        /* Left panel */
        .reg-left {
            background: linear-gradient(160deg, #0f172a 0%, #0a2a45 50%, #0065A4 100%);
            padding: 52px 44px; display: flex; flex-direction: column;
            justify-content: space-between; position: relative; overflow: hidden;
        }
        .reg-left::before {
            content: ''; position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.055) 1px, transparent 1px);
            background-size: 24px 24px; pointer-events: none;
        }
        .reg-left::after {
            content: ''; position: absolute; bottom: -60px; right: -60px;
            width: 260px; height: 260px; border-radius: 50%;
            background: rgba(255,255,255,0.05); pointer-events: none;
        }

        .left-brand { position: relative; z-index: 1; }
        .left-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.85); font-size: 11px; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase;
            padding: 5px 14px; border-radius: 50px; margin-bottom: 20px;
        }
        .left-brand h2 {
            font-family: 'Playfair Display', serif; font-size: 1.9rem;
            font-weight: 700; color: #fff; line-height: 1.3; margin-bottom: 12px;
        }
        .left-brand p { font-size: 13.5px; color: rgba(255,255,255,0.6); line-height: 1.7; font-weight: 300; }

        /* Step indicators */
        .steps-visual { position: relative; z-index: 1; margin: 32px 0; }
        .step-row { display: flex; align-items: center; gap: 14px; padding: 12px 0; }
        .step-row + .step-row { border-top: 1px solid rgba(255,255,255,0.08); }
        .step-circle {
            width: 34px; height: 34px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; flex-shrink: 0;
        }
        .step-circle.done { background: #22c55e; color: #fff; }
        .step-circle.active { background: #fff; color: var(--primary); }
        .step-circle.pending { background: rgba(255,255,255,0.12); color: rgba(255,255,255,0.4); border: 1px solid rgba(255,255,255,0.2); }
        .step-info .step-label { font-size: 12px; font-weight: 700; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 1px; }
        .step-info .step-name { font-size: 14px; font-weight: 600; color: #fff; margin-top: 2px; }
        .step-info .step-name.muted { color: rgba(255,255,255,0.4); }

        .left-illustration { position: relative; z-index: 1; text-align: center; }
        .left-illustration img {
            width: 100%; max-width: 200px; object-fit: contain;
            display: block; margin: 0 auto;
            filter: drop-shadow(0 16px 40px rgba(0,0,0,0.3));
            transition: transform 0.4s ease;
        }
        .left-illustration img:hover { transform: translateY(-8px) !important; }

        /* Right panel */
        .reg-right { padding: 52px 48px; display: flex; flex-direction: column; justify-content: center; overflow-y: auto; }

        .form-header { margin-bottom: 28px; }
        .form-header .step-tag { font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--primary); margin-bottom: 8px; }
        .form-header h1 { font-family: 'Playfair Display', serif; font-size: 1.9rem; font-weight: 700; color: #0f1f2e; line-height: 1.2; margin-bottom: 6px; }
        .form-header p { font-size: 13.5px; color: #64748b; }

        /* Progress bar — step 2 = 100% */
        .progress-bar { background: #e2e8f0; border-radius: 10px; height: 5px; margin-bottom: 28px; overflow: hidden; }
        .progress-fill { height: 100%; border-radius: 10px; background: linear-gradient(90deg, var(--primary), #22c55e); width: 100%; transition: width 0.5s; }

        /* Alert */
        .alert { padding: 12px 16px; border-radius: 10px; font-size: 13.5px; margin-bottom: 20px; display: flex; align-items: flex-start; gap: 10px; }
        .alert-danger { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .alert ul { margin: 0; padding-left: 16px; }

        /* Form */
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 7px; }
        .input-wrap { position: relative; }
        .input-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8; pointer-events: none; }
        .form-group input, .form-group select {
            width: 100%; padding: 11px 14px 11px 40px;
            border: 1.5px solid #e2e8f0; border-radius: 10px;
            font-size: 14px; color: #0f1f2e; background: #f8fafc; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .form-group input:focus, .form-group select:focus {
            border-color: var(--primary); background: #fff;
            box-shadow: 0 0 0 3px rgba(0,101,164,0.10);
        }
        .form-group input::placeholder { color: #b0bec5; }

        /* Password strength */
        .pw-strength { margin-top: 6px; }
        .pw-bars { display: flex; gap: 4px; margin-bottom: 4px; }
        .pw-bar { flex: 1; height: 3px; border-radius: 2px; background: #e2e8f0; transition: background 0.3s; }
        .pw-label { font-size: 11px; color: #94a3b8; font-weight: 500; }

        /* Toggle pw */
        .toggle-pw { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8; transition: color 0.2s; }
        .toggle-pw:hover { color: var(--primary); }

        /* Match indicator */
        .match-hint { font-size: 11.5px; margin-top: 5px; font-weight: 500; }
        .match-hint.ok { color: #16a34a; }
        .match-hint.fail { color: var(--accent); }

        /* Submit */
        .btn-submit {
            width: 100%; padding: 13px;
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            color: #fff; font-size: 15px; font-weight: 700; border: none;
            border-radius: 12px; cursor: pointer; transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 6px 20px rgba(0,101,164,0.30); font-family: 'Plus Jakarta Sans', sans-serif;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(0,101,164,0.40); }

        .back-link { display: inline-flex; align-items: center; gap: 6px; font-size: 13px; font-weight: 600; color: #64748b; text-decoration: none; margin-bottom: 20px; transition: color 0.2s; }
        .back-link:hover { color: var(--primary); }

        .login-link { text-align: center; margin-top: 20px; font-size: 13.5px; color: #64748b; }
        .login-link a { color: var(--primary); font-weight: 700; text-decoration: none; }
        .login-link a:hover { opacity: 0.75; }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 768px) {
            .register-card { grid-template-columns: 1fr; max-width: 500px; }
            .reg-left { display: none; }
            .reg-right { padding: 40px 28px; }
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
    <main class="register-main">
        <div class="register-card">

            <!-- LEFT -->
            <div class="reg-left">
                <div class="left-brand">
                    <div class="left-badge">
                        <svg width="10" height="10" fill="currentColor" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4"/></svg>
                        Pendaftaran Akun
                    </div>
                    <h2>Hampir<br>Selesai!</h2>
                    <p>Buat informasi akun dan password untuk melindungi data Anda.</p>
                </div>

                <div class="steps-visual">
                    <div class="step-row">
                        <div class="step-circle done">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8l3.5 3.5L13 5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div class="step-info">
                            <div class="step-label">Selesai</div>
                            <div class="step-name">Data Pribadi</div>
                        </div>
                    </div>
                    <div class="step-row">
                        <div class="step-circle active">2</div>
                        <div class="step-info">
                            <div class="step-label">Langkah 2 dari 2</div>
                            <div class="step-name">Akun &amp; Keamanan</div>
                        </div>
                    </div>
                </div>

                <div class="left-illustration">
                    <img src="{{ asset('images/perawat.png') }}" alt="Ilustrasi Perawat" />
                </div>
            </div>

            <!-- RIGHT: Form Step 2 -->
            <div class="reg-right">

                <a href="{{ route('register.step1') }}" class="back-link">
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M10 4l-4 4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Kembali ke Tahap 1
                </a>

                <div class="form-header">
                    <div class="step-tag">Langkah 2 dari 2</div>
                    <h1>Akun &amp; Keamanan</h1>
                    <p>Buat kredensial untuk masuk ke sistem PKU Bantul</p>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill" style="width: 100%;"></div>
                </div>

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

                <form action="{{ route('register.submit') }}" method="POST" id="registerForm">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="4" width="14" height="10" rx="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M1 5l7 5 7-5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                            </span>
                            <input type="email" id="email" name="email" placeholder="contoh@email.com" required value="{{ old('email') }}" />
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 2.5A1.5 1.5 0 014.5 1h7A1.5 1.5 0 0113 2.5v11a1.5 1.5 0 01-1.5 1.5h-7A1.5 1.5 0 013 13.5v-11z" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="12" r="0.8" fill="currentColor"/></svg>
                            </span>
                            <input type="text" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" required value="{{ old('telepon') }}" />
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5.5" r="3" stroke="currentColor" stroke-width="1.4"/><path d="M2 13c0-3.314 2.686-4.5 6-4.5s6 1.186 6 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                            </span>
                            <input type="text" id="username" name="username" placeholder="Buat username unik" required value="{{ old('username') }}" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="3" y="7" width="10" height="7" rx="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M5 7V5a3 3 0 016 0v2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><circle cx="8" cy="10.5" r="1" fill="currentColor"/></svg>
                            </span>
                            <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required oninput="checkStrength(this.value)" />
                            <span class="toggle-pw" onclick="togglePw('password','eyePw')">
                                <svg id="eyePw" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="8" r="2" stroke="currentColor" stroke-width="1.4"/></svg>
                            </span>
                        </div>
                        <div class="pw-strength">
                            <div class="pw-bars">
                                <div class="pw-bar" id="bar1"></div>
                                <div class="pw-bar" id="bar2"></div>
                                <div class="pw-bar" id="bar3"></div>
                                <div class="pw-bar" id="bar4"></div>
                            </div>
                            <div class="pw-label" id="pwLabel">Masukkan password</div>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="3" y="7" width="10" height="7" rx="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M5 7V5a3 3 0 016 0v2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><path d="M6 10.5l1.5 1.5L11 9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required oninput="checkMatch()" />
                            <span class="toggle-pw" onclick="togglePw('password_confirmation','eyeConf')">
                                <svg id="eyeConf" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="8" r="2" stroke="currentColor" stroke-width="1.4"/></svg>
                            </span>
                        </div>
                        <div class="match-hint" id="matchHint"></div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M13 8l-7 0M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Daftar Sekarang
                    </button>
                </form>

                <div class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk sekarang</a>
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
                        <em>Mycobacterium tuberculosis</em>. Penyakit ini umumnya menyerang paru-paru dan termasuk salah satu penyakit paling mematikan di dunia.
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
                        <a href="#" class="social-icon"><img src="{{ asset('images/logo_facebook.png') }}" alt="Facebook" class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="{{ asset('images/logo_instagram.png') }}" alt="Instagram" class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="{{ asset('images/logo_whatsapp.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="{{ asset('images/logo_youtube.png') }}" alt="YouTube" class="w-5 h-5 object-contain"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-4 text-center text-xs text-white/60">
            <p>Copyright &copy; 2024 tbindonesia.or.id | All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.getElementById("menuBtn").addEventListener("click", () => {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        });

        /* Toggle password visibility */
        function togglePw(inputId, iconId) {
            const input = document.getElementById(inputId);
            const isHidden = input.type === "password";
            input.type = isHidden ? "text" : "password";
            document.getElementById(iconId).innerHTML = isHidden
                ? `<path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z" stroke="currentColor" stroke-width="1.4"/><path d="M3 3l10 10" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>`
                : `<path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="8" r="2" stroke="currentColor" stroke-width="1.4"/>`;
        }

        /* Password strength checker */
        function checkStrength(val) {
            const bars = [document.getElementById('bar1'), document.getElementById('bar2'), document.getElementById('bar3'), document.getElementById('bar4')];
            const label = document.getElementById('pwLabel');
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const colors = ['#ef4444', '#f97316', '#eab308', '#22c55e'];
            const labels = ['Sangat lemah', 'Lemah', 'Cukup kuat', 'Kuat'];
            bars.forEach((b, i) => { b.style.background = i < score ? colors[score - 1] : '#e2e8f0'; });
            label.textContent = val.length === 0 ? 'Masukkan password' : labels[score - 1] || 'Sangat lemah';
            label.style.color = val.length === 0 ? '#94a3b8' : colors[score - 1] || '#ef4444';
        }

        /* Password match checker */
        function checkMatch() {
            const pw = document.getElementById('password').value;
            const conf = document.getElementById('password_confirmation').value;
            const hint = document.getElementById('matchHint');
            if (conf.length === 0) { hint.textContent = ''; return; }
            if (pw === conf) { hint.textContent = '✓ Password cocok'; hint.className = 'match-hint ok'; }
            else { hint.textContent = '✗ Password tidak cocok'; hint.className = 'match-hint fail'; }
        }

        /* Prevent submit if passwords don't match */
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const pw = document.getElementById('password').value;
            const conf = document.getElementById('password_confirmation').value;
            if (pw !== conf) {
                e.preventDefault();
                document.getElementById('matchHint').textContent = '✗ Password tidak cocok';
                document.getElementById('matchHint').className = 'match-hint fail';
                document.getElementById('password_confirmation').focus();
            }
        });
    </script>

</body>
</html>