<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bantuan - PKU Bantul</title>
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
            --sidebar-w: 260px;
        }

        * { box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; padding: 0; }
        body { background: #f0f4f8; color: #0f1f2e; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── NAV ── */
        nav.main-nav {
            background: rgba(255,255,255,0.85); backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(0,101,164,0.10);
            position: sticky; top: 0; z-index: 50;
            box-shadow: 0 2px 24px rgba(0,101,164,0.07);
        }
        .nav-link { position: relative; color: var(--primary); font-weight: 600; font-size: 0.95rem; text-decoration: none; transition: color 0.2s; }
        .nav-link::after { content: ''; position: absolute; left: 0; bottom: -3px; width: 0; height: 2px; background: var(--accent); border-radius: 2px; transition: width 0.25s ease; }
        .nav-link:hover { color: var(--accent); }
        .nav-link:hover::after { width: 100%; }
        .user-pill { display: flex; align-items: center; gap: 8px; background: var(--primary-light); border: 1px solid rgba(0,101,164,0.18); padding: 5px 14px 5px 6px; border-radius: 50px; }
        .user-avatar { width: 28px; height: 28px; border-radius: 50%; background: var(--primary); display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .user-name { font-size: 13px; font-weight: 600; color: var(--primary); }
        .btn-logout { display: inline-flex; align-items: center; gap: 6px; background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%); color: #fff; font-weight: 700; padding: 0.45rem 1.2rem; border-radius: 50px; transition: transform 0.2s, box-shadow 0.2s; box-shadow: 0 4px 14px rgba(229,62,62,0.25); font-size: 0.9rem; border: none; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif; }
        .btn-logout:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(229,62,62,0.35); }
        #mobileMenu { border-top: 1px solid rgba(0,101,164,0.1); }

        /* ── LAYOUT ── */
        .dash-wrapper { flex: 1; display: flex; max-width: 1300px; width: 100%; margin: 0 auto; padding: 32px 24px 64px; gap: 28px; }

        /* ── SIDEBAR ── */
        .sidebar { width: var(--sidebar-w); flex-shrink: 0; }
        .sidebar-profile { background: linear-gradient(145deg, #0065A4, #004b6b); border-radius: 20px; padding: 28px 20px; text-align: center; position: relative; overflow: hidden; margin-bottom: 16px; }
        .sidebar-profile::before { content: ''; position: absolute; top: -40px; right: -40px; width: 130px; height: 130px; border-radius: 50%; background: rgba(255,255,255,0.07); pointer-events: none; }
        .s-avatar { width: 64px; height: 64px; border-radius: 50%; border: 3px solid rgba(255,255,255,0.3); overflow: hidden; margin: 0 auto 12px; position: relative; display: inline-block; }
        .s-avatar img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }
        .s-dot { position: absolute; bottom: 2px; right: 2px; width: 13px; height: 13px; border-radius: 50%; background: #22c55e; border: 2px solid #0065A4; }
        .s-name { font-size: 15px; font-weight: 700; color: #fff; margin-bottom: 4px; }
        .s-role { display: inline-flex; align-items: center; gap: 5px; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.2); color: rgba(255,255,255,0.85); font-size: 11px; font-weight: 600; padding: 3px 12px; border-radius: 20px; }
        .sidebar-nav { background: #fff; border-radius: 16px; border: 1px solid rgba(0,101,164,0.08); overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .sidebar-nav-hdr { padding: 14px 20px; font-size: 10px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: #94a3b8; border-bottom: 1px solid #f0f4f8; }
        .side-link { display: flex; align-items: center; gap: 12px; padding: 13px 20px; font-size: 14px; font-weight: 600; color: #4a6582; text-decoration: none; transition: all 0.2s; border-left: 3px solid transparent; }
        .side-link:hover { background: var(--primary-light); color: var(--primary); border-left-color: rgba(0,101,164,0.3); }
        .side-link.active { background: var(--primary-light); color: var(--primary); border-left-color: var(--primary); }
        .side-link + .side-link { border-top: 1px solid #f8fafc; }

        /* ── MAIN ── */
        .main-content { flex: 1; min-width: 0; }
        .page-header { margin-bottom: 28px; }
        .breadcrumb { display: flex; align-items: center; gap: 6px; font-size: 12.5px; color: #94a3b8; margin-bottom: 6px; }
        .breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 600; }
        .breadcrumb span { color: #cbd5e1; }
        .page-header h1 { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: #0f1f2e; }
        .page-header p { font-size: 13.5px; color: #64748b; margin-top: 4px; }

        /* ── HERO BANNER ── */
        .help-hero {
            background: linear-gradient(160deg, #0f172a 0%, #0a2a45 55%, #0065A4 100%);
            border-radius: 20px; padding: 48px 40px;
            position: relative; overflow: hidden; margin-bottom: 28px;
            animation: fadeUp 0.5s 0.05s ease forwards; opacity: 0;
        }
        .help-hero::before {
            content: ''; position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.055) 1px, transparent 1px);
            background-size: 24px 24px; pointer-events: none;
        }
        .help-hero::after {
            content: ''; position: absolute; top: -60px; right: -60px;
            width: 260px; height: 260px; border-radius: 50%;
            background: rgba(255,255,255,0.05); pointer-events: none;
        }
        .help-hero-inner { position: relative; z-index: 1; display: flex; align-items: center; gap: 32px; }
        .help-hero-icon {
            width: 72px; height: 72px; border-radius: 20px; flex-shrink: 0;
            background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
        }
        .help-hero-text h2 { font-family: 'Playfair Display', serif; font-size: 1.9rem; font-weight: 700; color: #fff; margin-bottom: 8px; }
        .help-hero-text p { font-size: 15px; color: rgba(255,255,255,0.65); font-weight: 300; line-height: 1.6; max-width: 480px; }
        .help-hero-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(34,197,94,0.15); border: 1px solid rgba(34,197,94,0.35);
            color: #86efac; font-size: 11px; font-weight: 700;
            letter-spacing: 1px; text-transform: uppercase;
            padding: 4px 14px; border-radius: 50px; margin-bottom: 14px;
        }
        .help-hero-badge .dot { width: 6px; height: 6px; border-radius: 50%; background: #22c55e; }

        /* ── HELP CARDS GRID ── */
        .help-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 18px; margin-bottom: 28px;
        }

        .help-card {
            background: #fff; border-radius: 18px;
            border: 1px solid rgba(0,101,164,0.08);
            padding: 28px 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            text-decoration: none; color: inherit;
            transition: transform 0.25s, box-shadow 0.25s, border-color 0.25s;
            display: flex; flex-direction: column; gap: 14px;
            animation: fadeUp 0.5s ease forwards; opacity: 0;
        }
        .help-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,0.10); border-color: rgba(0,101,164,0.2); }

        .help-card-icon {
            width: 56px; height: 56px; border-radius: 16px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
        }
        .help-card-icon img { width: 32px; height: 32px; object-fit: contain; transition: transform 0.3s ease; }
        .help-card:hover .help-card-icon img { transform: translateY(-4px) scale(1.08); }

        .help-card-icon.c1 { background: var(--primary-light); }
        .help-card-icon.c2 { background: #f0fdf4; }
        .help-card-icon.c3 { background: #fffbeb; }
        .help-card-icon.c4 { background: #fef2f2; }
        .help-card-icon.c5 { background: #f5f3ff; }
        .help-card-icon.c6 { background: #fff7ed; }

        .help-card-title { font-size: 15px; font-weight: 700; color: #0f1f2e; margin-bottom: 4px; }
        .help-card-desc { font-size: 13px; color: #64748b; line-height: 1.6; }
        .help-card-arrow {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12.5px; font-weight: 700; color: var(--primary);
            margin-top: auto; padding-top: 12px;
            border-top: 1px solid #f0f4f8;
            transition: gap 0.2s;
        }
        .help-card:hover .help-card-arrow { gap: 10px; }

        /* ── FAQ SECTION ── */
        .faq-card {
            background: #fff; border-radius: 20px;
            border: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            animation: fadeUp 0.5s 0.35s ease forwards; opacity: 0;
        }
        .faq-header {
            padding: 20px 26px; border-bottom: 1px solid #f0f4f8;
            display: flex; align-items: center; gap: 12px;
        }
        .faq-header-icon { width: 38px; height: 38px; border-radius: 10px; background: var(--primary-light); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .faq-title { font-size: 15px; font-weight: 700; color: #0f1f2e; }

        .faq-item { border-bottom: 1px solid #f0f4f8; }
        .faq-item:last-child { border-bottom: none; }
        .faq-question {
            width: 100%; padding: 18px 26px; text-align: left; border: none;
            background: transparent; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif;
            display: flex; align-items: center; justify-content: space-between; gap: 16px;
            font-size: 14px; font-weight: 600; color: #0f1f2e;
            transition: background 0.2s;
        }
        .faq-question:hover { background: #f8fafc; }
        .faq-question.open { color: var(--primary); background: var(--primary-light); }
        .faq-chevron { width: 20px; height: 20px; border-radius: 50%; background: #f0f4f8; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: transform 0.3s, background 0.2s; }
        .faq-question.open .faq-chevron { transform: rotate(180deg); background: var(--primary); }
        .faq-question.open .faq-chevron svg { color: #fff; }
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.35s ease, padding 0.2s; padding: 0 26px; font-size: 13.5px; color: #4a6582; line-height: 1.75; font-weight: 300; }
        .faq-answer.open { max-height: 300px; padding: 4px 26px 18px; }

        /* ── CONTACT STRIP ── */
        .contact-strip {
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            border-radius: 18px; padding: 28px 32px;
            display: flex; align-items: center; justify-content: space-between; gap: 24px;
            margin-top: 24px;
            animation: fadeUp 0.5s 0.42s ease forwards; opacity: 0;
        }
        .contact-strip-text h3 { font-size: 16px; font-weight: 700; color: #fff; margin-bottom: 4px; }
        .contact-strip-text p { font-size: 13px; color: rgba(255,255,255,0.7); font-weight: 300; }
        .contact-strip-btns { display: flex; gap: 12px; flex-shrink: 0; }
        .contact-btn {
            display: inline-flex; align-items: center; gap: 7px;
            background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25);
            color: #fff; font-size: 13px; font-weight: 700; padding: 9px 18px;
            border-radius: 50px; text-decoration: none; transition: all 0.2s;
        }
        .contact-btn:hover { background: rgba(255,255,255,0.28); transform: translateY(-2px); }
        .contact-btn.solid { background: #fff; color: var(--primary); border-color: #fff; }
        .contact-btn.solid:hover { background: #f0f4f8; }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* Staggered card delays */
        .help-card:nth-child(1) { animation-delay: 0.10s; }
        .help-card:nth-child(2) { animation-delay: 0.16s; }
        .help-card:nth-child(3) { animation-delay: 0.22s; }
        .help-card:nth-child(4) { animation-delay: 0.28s; }
        .help-card:nth-child(5) { animation-delay: 0.34s; }
        .help-card:nth-child(6) { animation-delay: 0.40s; }

        @media (max-width: 1000px) { .help-grid { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 900px) { .dash-wrapper { flex-direction: column; padding: 20px 16px 48px; } .sidebar { width: 100%; } }
        @media (max-width: 600px) { .help-grid { grid-template-columns: 1fr; } .contact-strip { flex-direction: column; align-items: flex-start; } .help-hero-inner { flex-direction: column; gap: 20px; } }
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
            <ul class="hidden md:flex items-center space-x-6">
                <li><a href="/welcomeafterlogin" class="nav-link">Beranda</a></li>
                <li><a href="{{ url('/tentangafterlogin') }}" class="nav-link">Tentang</a></li>
                <li><a href="{{ url('/kegiatanafterlogin') }}" class="nav-link">Kegiatan</a></li>
                @if (Auth::check())
                    <li><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
                    <li>
                        <div class="user-pill">
                            <div class="user-avatar"><img src="{{ asset('images/ikon_profil.png') }}" alt="Profil" /></div>
                            <span class="user-name">{{ Auth::user()->username }}</span>
                        </div>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button type="submit" class="btn-logout">
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M10 3h3a1 1 0 011 1v8a1 1 0 01-1 1h-3M7 11l4-4-4-4M11 8H3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                @endif
            </ul>
            <button id="menuBtn" class="md:hidden focus:outline-none p-2 rounded-lg hover:bg-blue-50 transition">
                <svg class="w-6 h-6 text-[#0065A4]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
        <div id="mobileMenu" class="hidden md:hidden bg-white/95 backdrop-blur px-5 pt-4 pb-6">
            @if (Auth::check())
            <div style="display:flex;align-items:center;gap:10px;padding:10px 0 16px;border-bottom:1px solid #e2e8f0;margin-bottom:12px;">
                <div class="user-avatar"><img src="{{ asset('images/ikon_profil.png') }}" alt="Profil"/></div>
                <div>
                    <div style="font-size:13px;font-weight:700;color:#0f1f2e;">{{ Auth::user()->username }}</div>
                    <div style="font-size:11px;color:#64748b;">Pengguna Aktif</div>
                </div>
            </div>
            @endif
            <ul class="space-y-4 font-semibold text-[#0065A4]">
                <li><a href="/welcomeafterlogin" class="block hover:text-red-600 transition">Beranda</a></li>
                <li><a href="{{ url('/tentangafterlogin') }}" class="block hover:text-red-600 transition">Tentang</a></li>
                <li><a href="{{ url('/kegiatanafterlogin') }}" class="block hover:text-red-600 transition">Kegiatan</a></li>
                @if (Auth::check())
                    <li><a href="{{ url('/dashboard') }}" class="block hover:text-red-600 transition">Dashboard</a></li>
                    <li><form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="block text-red-600 font-semibold">Logout</button></form></li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- ── LAYOUT ── -->
    <div class="dash-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-profile">
                <div class="s-avatar">
                    <img src="{{ asset('images/ikon_profil.png') }}" alt="Avatar" />
                    <div class="s-dot"></div>
                </div>
                @auth
                <div class="s-name">{{ Auth::user()->username }}</div>
                <div class="s-role"><svg width="10" height="10" fill="currentColor" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4"/></svg> {{ Auth::user()->role == 'perawat' ? 'Perawat' : 'Pasien' }}</div>
                @endauth
            </div>
            <div class="sidebar-nav">
                <div class="sidebar-nav-hdr">Menu</div>
                <a href="{{ url('/dashboard') }}" class="side-link">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="1" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/></svg>
                    Dashboard
                </a>
                <a href="{{ url('/output_pasien') }}" class="side-link">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 2a4 4 0 100 8A4 4 0 008 2zM2 14s-1 0-1-1 1-4 7-4 7 3 7 4-1 1-1 1H2z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
                    Informasi Pasien
                </a>
                <a href="{{ url('/checkharian') }}" class="side-link">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="11" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M5 1v4M11 1v4M2 7h12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M5 10l1.5 1.5L11 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Check Harian
                </a>
                <a href="{{ url('/bantuan') }}" class="side-link active">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M6 6a2 2 0 114 0c0 1.333-2 2-2 3M8 12v.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    Bantuan
                </a>
            </div>
        </aside>

        <!-- MAIN -->
        <main class="main-content">

            <div class="page-header">
                <div class="breadcrumb">
                    <a href="/welcomeafterlogin">Beranda</a><span>›</span>
                    <a href="{{ url('/dashboard') }}">Dashboard</a><span>›</span>
                    <span>Bantuan</span>
                </div>
                <h1>Pusat Bantuan</h1>
                <p>Temukan jawaban dan panduan penggunaan layanan PKU Bantul</p>
            </div>

            <!-- Hero Banner -->
            <div class="help-hero">
                <div class="help-hero-inner">
                    <div class="help-hero-icon">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="14" stroke="#fff" stroke-width="1.8"/><path d="M12 12a4 4 0 018 0c0 2.667-4 4-4 6M16 22v1" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div class="help-hero-text">
                        <div class="help-hero-badge">
                            <div class="dot"></div>
                            Tim Dukungan Aktif 24/7
                        </div>
                        <h2>Kami Siap Membantu Anda!</h2>
                        <p>Jelajahi panduan di bawah atau hubungi tim kami untuk mendapatkan bantuan langsung. Kami berkomitmen memberikan dukungan terbaik.</p>
                    </div>
                </div>
            </div>

            <!-- Help Cards Grid -->
            <div class="help-grid">

                <a href="#" class="help-card">
                    <div class="help-card-icon c1">
                        <img src="{{ asset('images/memulai.png') }}" alt="Mulai" />
                    </div>
                    <div>
                        <div class="help-card-title">Mulai</div>
                        <div class="help-card-desc">Panduan langkah awal untuk mengakses dan menggunakan layanan PKU Bantul.</div>
                    </div>
                    <div class="help-card-arrow">
                        Lihat panduan
                        <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </a>

                <a href="#" class="help-card">
                    <div class="help-card-icon c2">
                        <img src="{{ asset('images/personalisasi.png') }}" alt="Personalisasi" />
                    </div>
                    <div>
                        <div class="help-card-title">Personalisasi</div>
                        <div class="help-card-desc">Sesuaikan tampilan dan layanan sesuai kebutuhan dan preferensi Anda.</div>
                    </div>
                    <div class="help-card-arrow">
                        Lihat panduan
                        <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </a>

                <a href="#" class="help-card">
                    <div class="help-card-icon c3">
                        <img src="{{ asset('images/fitur.png') }}" alt="Fitur" />
                    </div>
                    <div>
                        <div class="help-card-title">Fitur & Layanan</div>
                        <div class="help-card-desc">Jelajahi semua fitur yang tersedia, termasuk check harian dan informasi medis.</div>
                    </div>
                    <div class="help-card-arrow">
                        Lihat panduan
                        <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </a>

                <a href="#" class="help-card">
                    <div class="help-card-icon c4">
                        <img src="{{ asset('images/privasi.png') }}" alt="Privasi" />
                    </div>
                    <div>
                        <div class="help-card-title">Privasi & Keamanan</div>
                        <div class="help-card-desc">Informasi tentang perlindungan data dan keamanan akun Anda di sistem kami.</div>
                    </div>
                    <div class="help-card-arrow">
                        Lihat panduan
                        <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </a>

                <a href="#" class="help-card">
                    <div class="help-card-icon c5">
                        <img src="{{ asset('images/integrasi.png') }}" alt="Integrasi" />
                    </div>
                    <div>
                        <div class="help-card-title">Integrasi</div>
                        <div class="help-card-desc">Cara menghubungkan layanan PKU Bantul dengan sistem atau aplikasi lainnya.</div>
                    </div>
                    <div class="help-card-arrow">
                        Lihat panduan
                        <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </a>

                <a href="#" class="help-card">
                    <div class="help-card-icon c6">
                        <img src="{{ asset('images/situs_web.png') }}" alt="Situs Web" />
                    </div>
                    <div>
                        <div class="help-card-title">Situs Web</div>
                        <div class="help-card-desc">Panduan navigasi dan pengelolaan informasi melalui portal web PKU Bantul.</div>
                    </div>
                    <div class="help-card-arrow">
                        Lihat panduan
                        <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </a>

            </div>

            <!-- FAQ -->
            <div class="faq-card">
                <div class="faq-header">
                    <div class="faq-header-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#0065A4" stroke-width="1.8"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div class="faq-title">Pertanyaan yang Sering Diajukan</div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Bagaimana cara mengisi Check Harian?
                        <div class="faq-chevron"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </button>
                    <div class="faq-answer">Buka menu Check Harian di sidebar, kemudian isi semua kolom yang tersedia: tanggal, suhu tubuh, berat badan, nafsu makan, status minum obat, dan catatan harian. Klik "Kirim Jawaban" untuk menyimpan data.</div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Bagaimana cara melihat informasi rekam medis saya?
                        <div class="faq-chevron"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </button>
                    <div class="faq-answer">Klik menu "Informasi Pasien" di sidebar untuk melihat identitas pasien, status pengobatan, dan riwayat check harian. Anda juga bisa mengunduh data tersebut dengan tombol "Download Informasi".</div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Apa yang harus dilakukan jika lupa password?
                        <div class="faq-chevron"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </button>
                    <div class="faq-answer">Di halaman Login, klik tautan "Lupa Password?". Masukkan username dan email yang terdaftar, kemudian buat password baru. Pastikan email yang dimasukkan sesuai dengan yang didaftarkan saat registrasi.</div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Apakah data kesehatan saya aman?
                        <div class="faq-chevron"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </button>
                    <div class="faq-answer">Ya, semua data kesehatan Anda dilindungi dan hanya dapat diakses oleh Anda dan tenaga medis yang berwenang di PKU Bantul. Sistem kami menggunakan enkripsi untuk menjaga kerahasiaan data.</div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Berapa lama program pengobatan TBC berlangsung?
                        <div class="faq-chevron"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </button>
                    <div class="faq-answer">Program pengobatan TBC standar berlangsung minimal 6 bulan, terdiri dari fase intensif (2 bulan) dan fase lanjutan (4 bulan). Kepatuhan minum obat setiap hari sangat penting untuk keberhasilan pengobatan.</div>
                </div>
            </div>

            <!-- Contact Strip -->
            <div class="contact-strip">
                <div class="contact-strip-text">
                    <h3>Masih butuh bantuan lebih lanjut?</h3>
                    <p>Hubungi tim medis PKU Bantul langsung melalui telepon atau WhatsApp</p>
                </div>
                <div class="contact-strip-btns">
                    <a href="tel:+62274367437" class="contact-btn">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 2.5A1.5 1.5 0 014.5 1h2.38c.414 0 .75.336.75.75v2.754a.75.75 0 01-.75.75H5.5a8.25 8.25 0 004.25 4.25v-1.38a.75.75 0 01.75-.75h2.754a.75.75 0 01.75.75V13.5A1.5 1.5 0 0112.5 15 10.5 10.5 0 012 4.5 1.5 1.5 0 013 2.5z" stroke="currentColor" stroke-width="1.3"/></svg>
                        Telepon
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="contact-btn solid">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M8 1.5A6.5 6.5 0 1014.5 8 6.507 6.507 0 008 1.5zM5.5 9.5c1 1.5 2.5 2.5 4 2.5l.5-1.5-1-.5-.5.5c-.5 0-1.5-.5-2.5-1.5L5 9l.5-.5L5 7.5 3.5 8c0 1.5 1 3 2 1.5z" stroke="currentColor" stroke-width="1.3"/></svg>
                        WhatsApp
                    </a>
                </div>
            </div>

        </main>
    </div>

    <!-- ── FOOTER ── -->
    <footer>
        <div class="footer-main py-10 px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <p class="footer-heading">Tentang TBC</p>
                    <p class="text-[13px] text-white/75 leading-relaxed">
                        <strong class="text-white">Tuberkulosis (TBC)</strong> adalah penyakit infeksi menular yang disebabkan oleh bakteri
                        <em>Mycobacterium tuberculosis</em>. Penyakit ini umumnya menyerang paru-paru, namun bisa juga menyerang bagian tubuh lain.
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
        document.getElementById("menuBtn").addEventListener("click", () => {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        });

        function toggleFaq(btn) {
            const answer = btn.nextElementSibling;
            const isOpen = btn.classList.contains('open');
            // Close all
            document.querySelectorAll('.faq-question').forEach(q => { q.classList.remove('open'); q.nextElementSibling.classList.remove('open'); });
            // Open clicked (if wasn't open)
            if (!isOpen) { btn.classList.add('open'); answer.classList.add('open'); }
        }
    </script>

</body>
</html>