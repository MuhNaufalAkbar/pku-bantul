<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Check Harian - PKU Bantul</title>
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

        .user-pill {
            display: flex; align-items: center; gap: 8px;
            background: var(--primary-light); border: 1px solid rgba(0,101,164,0.18);
            padding: 5px 14px 5px 6px; border-radius: 50px;
        }
        .user-avatar {
            width: 28px; height: 28px; border-radius: 50%;
            background: var(--primary); display: flex; align-items: center;
            justify-content: center; overflow: hidden; flex-shrink: 0;
        }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .user-name { font-size: 13px; font-weight: 600; color: var(--primary); }
        .btn-logout {
            display: inline-flex; align-items: center; gap: 6px;
            background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%);
            color: #fff; font-weight: 700; padding: 0.45rem 1.2rem;
            border-radius: 50px; transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(229,62,62,0.25);
            font-size: 0.9rem; border: none; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .btn-logout:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(229,62,62,0.35); }
        #mobileMenu { border-top: 1px solid rgba(0,101,164,0.1); }

        /* ── LAYOUT ── */
        .dash-wrapper {
            flex: 1; display: flex;
            max-width: 1300px; width: 100%;
            margin: 0 auto; padding: 32px 24px 64px; gap: 28px;
        }

        /* ── SIDEBAR ── */
        .sidebar { width: var(--sidebar-w); flex-shrink: 0; }
        .sidebar-profile {
            background: linear-gradient(145deg, #0065A4, #004b6b);
            border-radius: 20px; padding: 28px 20px;
            text-align: center; position: relative; overflow: hidden; margin-bottom: 16px;
        }
        .sidebar-profile::before {
            content: ''; position: absolute; top: -40px; right: -40px;
            width: 130px; height: 130px; border-radius: 50%;
            background: rgba(255,255,255,0.07); pointer-events: none;
        }
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

        /* ── MAIN GRID ── */
        .main-grid { display: grid; grid-template-columns: 1.1fr 1fr; gap: 24px; }

        /* ── FORM CARD ── */
        .form-card {
            background: #fff; border-radius: 20px;
            border: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            animation: fadeUp 0.5s 0.05s ease forwards; opacity: 0;
        }
        .card-hdr {
            padding: 20px 26px; border-bottom: 1px solid #f0f4f8;
            display: flex; align-items: center; gap: 12px;
        }
        .card-hdr-icon { width: 38px; height: 38px; border-radius: 10px; background: var(--primary-light); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .card-hdr-title { font-size: 15px; font-weight: 700; color: #0f1f2e; }
        .card-hdr-sub { font-size: 12px; color: #94a3b8; margin-top: 1px; }
        .card-body { padding: 24px 26px; }

        /* Alert success */
        .alert-success {
            display: flex; align-items: center; gap: 10px;
            background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534;
            font-size: 13.5px; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px;
        }

        /* Form fields */
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 7px; }
        .form-group label .req { color: var(--accent); margin-left: 2px; }

        .input-wrap { position: relative; }
        .input-icon { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #94a3b8; pointer-events: none; }
        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group input[type="text"] {
            width: 100%; padding: 11px 14px 11px 40px;
            border: 1.5px solid #e2e8f0; border-radius: 10px;
            font-size: 14px; color: #0f1f2e; background: #f8fafc; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .form-group input:focus {
            border-color: var(--primary); background: #fff;
            box-shadow: 0 0 0 3px rgba(0,101,164,0.10);
        }
        .form-group input::placeholder { color: #b0bec5; }

        /* Radio group */
        .radio-group { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 4px; }
        .radio-option {
            flex: 1; min-width: 80px;
            border: 1.5px solid #e2e8f0; border-radius: 10px;
            padding: 10px 14px; cursor: pointer;
            display: flex; align-items: center; gap: 8px;
            transition: all 0.2s; background: #f8fafc;
        }
        .radio-option:hover { border-color: var(--primary); background: var(--primary-light); }
        .radio-option input[type="radio"] { accent-color: var(--primary); }
        .radio-option label { font-size: 13.5px; font-weight: 600; color: #374151; cursor: pointer; }
        .radio-option:has(input:checked) { border-color: var(--primary); background: var(--primary-light); }
        .radio-option:has(input:checked) label { color: var(--primary); }

        /* Yes/No radio */
        .yn-group { display: flex; gap: 10px; margin-top: 4px; }
        .yn-option {
            flex: 1; border: 1.5px solid #e2e8f0; border-radius: 10px;
            padding: 10px 14px; cursor: pointer;
            display: flex; align-items: center; gap: 8px;
            transition: all 0.2s; background: #f8fafc;
        }
        .yn-option:hover { border-color: var(--primary); background: var(--primary-light); }
        .yn-option input[type="radio"] { accent-color: var(--primary); }
        .yn-option label { font-size: 13.5px; font-weight: 600; color: #374151; cursor: pointer; }
        .yn-option.yn-yes:has(input:checked) { border-color: #16a34a; background: #f0fdf4; }
        .yn-option.yn-yes:has(input:checked) label { color: #16a34a; }
        .yn-option.yn-no:has(input:checked) { border-color: var(--accent); background: #fef2f2; }
        .yn-option.yn-no:has(input:checked) label { color: var(--accent); }

        /* Submit button */
        .btn-submit {
            width: 100%; padding: 13px;
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            color: #fff; font-size: 15px; font-weight: 700; border: none;
            border-radius: 12px; cursor: pointer; margin-top: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 6px 20px rgba(0,101,164,0.30);
            font-family: 'Plus Jakarta Sans', sans-serif;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(0,101,164,0.40); }
        .btn-submit svg { transition: transform 0.2s; }
        .btn-submit:hover svg { transform: translateX(3px); }

        /* ── INFO CARD (right) ── */
        .info-card {
            background: #fff; border-radius: 20px;
            border: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            animation: fadeUp 0.5s 0.12s ease forwards; opacity: 0;
        }

        .info-img-wrap {
            background: linear-gradient(160deg, #0f172a 0%, #0a2a45 55%, #0065A4 100%);
            padding: 28px; text-align: center; position: relative; overflow: hidden;
        }
        .info-img-wrap::before {
            content: ''; position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 22px 22px; pointer-events: none;
        }
        .info-img-wrap img {
            max-width: 160px; height: auto; position: relative; z-index: 1;
            filter: drop-shadow(0 12px 28px rgba(0,0,0,0.3));
            transition: transform 0.4s ease;
        }
        .info-img-wrap img:hover { transform: translateY(-6px) !important; }
        .info-img-wrap .img-badge {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.9); font-size: 11px; font-weight: 700;
            letter-spacing: 1px; text-transform: uppercase;
            padding: 4px 14px; border-radius: 50px; margin-top: 16px; position: relative; z-index: 1;
        }

        .info-body { padding: 22px 24px; }
        .info-section { margin-bottom: 20px; }
        .info-section:last-child { margin-bottom: 0; }
        .info-section-title {
            display: flex; align-items: center; gap: 8px;
            font-size: 13.5px; font-weight: 800; color: #0f1f2e;
            text-transform: uppercase; letter-spacing: 0.5px;
            margin-bottom: 10px;
        }
        .info-section-title .dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }
        .info-section-title .dot.red { background: var(--accent); }
        .info-section-title .dot.amber { background: #d97706; }

        .symptom-list { list-style: none; padding: 0; margin: 0; }
        .symptom-list li {
            display: flex; align-items: flex-start; gap: 10px;
            font-size: 13px; color: #4a6582; padding: 7px 0;
            border-bottom: 1px solid #f8fafc; line-height: 1.5;
        }
        .symptom-list li:last-child { border-bottom: none; }
        .symptom-dot {
            width: 18px; height: 18px; border-radius: 50%; flex-shrink: 0;
            margin-top: 2px; display: flex; align-items: center; justify-content: center;
        }
        .symptom-dot.red { background: #fef2f2; }
        .symptom-dot.amber { background: #fffbeb; }
        .symptom-dot svg { flex-shrink: 0; }

        /* Divider */
        .info-divider { height: 1px; background: #f0f4f8; margin: 16px 0; }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* Toast notification (replaces JS alert) */
        .toast {
            position: fixed; top: 80px; right: 24px; z-index: 200;
            background: #fff; border: 1px solid #bbf7d0; border-radius: 14px;
            padding: 14px 20px; box-shadow: 0 8px 32px rgba(0,0,0,0.12);
            display: flex; align-items: center; gap: 12px; max-width: 340px;
            animation: slideInToast 0.4s ease forwards;
        }
        .toast-icon { width: 36px; height: 36px; border-radius: 10px; background: #f0fdf4; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .toast-title { font-size: 13.5px; font-weight: 700; color: #166534; }
        .toast-body { font-size: 12.5px; color: #4ade80; margin-top: 2px; }
        @keyframes slideInToast { from { opacity: 0; transform: translateX(40px); } to { opacity: 1; transform: translateX(0); } }

        @media (max-width: 1000px) {
            .main-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 900px) {
            .dash-wrapper { flex-direction: column; padding: 20px 16px 48px; }
            .sidebar { width: 100%; }
        }
    </style>
</head>

<body>

    <!-- Success toast (replaces alert) -->
    @if(session('success'))
    <div class="toast" id="successToast">
        <div class="toast-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="#16a34a" stroke-width="1.5"/><path d="M6 9l2 2 4-4" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div>
            <div class="toast-title">Berhasil!</div>
            <div class="toast-body">{{ session('success') }}</div>
        </div>
    </div>
    <script>setTimeout(() => { const t = document.getElementById('successToast'); if(t) t.style.opacity = '0', t.style.transform = 'translateX(40px)', t.style.transition = 'all 0.4s', setTimeout(() => t.remove(), 400); }, 4000);</script>
    @endif

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
                <div class="s-role"><svg width="10" height="10" fill="currentColor" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4"/></svg> Pasien</div>
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
                <a href="{{ url('/checkharian') }}" class="side-link active">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="11" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M5 1v4M11 1v4M2 7h12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M5 10l1.5 1.5L11 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Check Harian
                </a>
                <a href="{{ url('/bantuan') }}" class="side-link">
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
                    <span>Check Harian</span>
                </div>
                <h1>Check Harian</h1>
                <p>Catat kondisi kesehatan Anda setiap hari untuk pemantauan pengobatan TBC</p>
            </div>

            <div class="main-grid">

                <!-- ── FORM ── -->
                <div class="form-card">
                    <div class="card-hdr">
                        <div class="card-hdr-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" stroke="#0065A4" stroke-width="1.8"/><path d="M3 10h18M8 2v4M16 2v4M9 15l2 2 4-4" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <div class="card-hdr-title">Form Check Harian</div>
                            <div class="card-hdr-sub">Isi data kesehatan Anda hari ini</div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('checkharian.store') }}" method="POST">
                            @csrf

                            <!-- Tanggal -->
                            <div class="form-group">
                                <label>Tanggal <span class="req">*</span></label>
                                <div class="input-wrap">
                                    <span class="input-icon">
                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="1" y="3" width="14" height="12" rx="2" stroke="currentColor" stroke-width="1.4"/><path d="M1 7h14M5 1v4M11 1v4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                                    </span>
                                    <input type="date" name="tanggal" required />
                                </div>
                            </div>

                            <!-- Suhu + Berat -->
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                                <div class="form-group" style="margin-bottom:0;">
                                    <label>Suhu (°C) <span class="req">*</span></label>
                                    <div class="input-wrap">
                                        <span class="input-icon">
                                            <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M8 2v7.26A3 3 0 1010.74 12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><circle cx="6" cy="12" r="2.5" stroke="currentColor" stroke-width="1.4"/></svg>
                                        </span>
                                        <input type="number" name="suhu" placeholder="36.5" step="0.1" required />
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom:0;">
                                    <label>Berat (kg) <span class="req">*</span></label>
                                    <div class="input-wrap">
                                        <span class="input-icon">
                                            <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="2" y="6" width="12" height="9" rx="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M5 6V4.5a3 3 0 016 0V6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                                        </span>
                                        <input type="number" name="berat" placeholder="60" step="0.1" required />
                                    </div>
                                </div>
                            </div>

                            <div style="height:18px;"></div>

                            <!-- Nafsu Makan -->
                            <div class="form-group">
                                <label>Nafsu Makan <span class="req">*</span></label>
                                <div class="radio-group">
                                    <label class="radio-option">
                                        <input type="radio" name="nafsu_makan" value="Baik" required />
                                        <label>😊 Baik</label>
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="nafsu_makan" value="Normal" required />
                                        <label>😐 Normal</label>
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="nafsu_makan" value="Menurun" required />
                                        <label>😔 Menurun</label>
                                    </label>
                                </div>
                            </div>

                            <!-- Minum Obat -->
                            <div class="form-group">
                                <label>Minum Obat Hari Ini? <span class="req">*</span></label>
                                <div class="yn-group">
                                    <label class="yn-option yn-yes">
                                        <input type="radio" name="minum_obat" value="Ya" required />
                                        <label>
                                            <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="#16a34a" stroke-width="1.5"/><path d="M5 8l2 2 4-4" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            Ya, sudah minum
                                        </label>
                                    </label>
                                    <label class="yn-option yn-no">
                                        <input type="radio" name="minum_obat" value="Tidak" required />
                                        <label>
                                            <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="#dc2626" stroke-width="1.5"/><path d="M5.5 5.5l5 5M10.5 5.5l-5 5" stroke="#dc2626" stroke-width="1.5" stroke-linecap="round"/></svg>
                                            Tidak / Belum
                                        </label>
                                    </label>
                                </div>
                            </div>

                            <!-- Catatan -->
                            <div class="form-group">
                                <label>Catatan Pasien <span class="req">*</span></label>
                                <div class="input-wrap">
                                    <span class="input-icon">
                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M2 12.5V14h1.5l8-8-1.5-1.5-8 8zM13.5 4l-1.5-1.5 1-1 1.5 1.5-1 1z" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                    <input type="text" name="catatan_pete" placeholder="Keluhan, catatan kondisi hari ini..." required />
                                </div>
                            </div>

                            <button type="submit" class="btn-submit">
                                Kirim Jawaban
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- ── INFO PANEL ── -->
                <div class="info-card">
                    <div class="info-img-wrap">
                        <img src="{{ asset('images/image_tuberkulosis.png') }}" alt="Gejala TBC" />
                        <div class="img-badge">
                            <svg width="10" height="10" fill="currentColor" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4"/></svg>
                            Panduan Kesehatan
                        </div>
                    </div>
                    <div class="info-body">

                        <div class="info-section">
                            <div class="info-section-title">
                                <div class="dot red"></div>
                                Gejala TBC yang Perlu Diperhatikan
                            </div>
                            <ul class="symptom-list">
                                <li>
                                    <div class="symptom-dot red"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#dc2626" stroke-width="1.2"/></svg></div>
                                    Batuk terus-menerus lebih dari 2 minggu, kadang berdarah
                                </li>
                                <li>
                                    <div class="symptom-dot red"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#dc2626" stroke-width="1.2"/></svg></div>
                                    Demam dan berkeringat di malam hari
                                </li>
                                <li>
                                    <div class="symptom-dot red"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#dc2626" stroke-width="1.2"/></svg></div>
                                    Penurunan berat badan tanpa sebab jelas
                                </li>
                                <li>
                                    <div class="symptom-dot red"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#dc2626" stroke-width="1.2"/></svg></div>
                                    Lemas, mudah lelah, nafsu makan menurun
                                </li>
                                <li>
                                    <div class="symptom-dot red"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#dc2626" stroke-width="1.2"/></svg></div>
                                    Nyeri dada atau sesak napas
                                </li>
                            </ul>
                        </div>

                        <div class="info-divider"></div>

                        <div class="info-section">
                            <div class="info-section-title">
                                <div class="dot amber"></div>
                                Efek Samping Obat TBC
                            </div>
                            <ul class="symptom-list">
                                <li>
                                    <div class="symptom-dot amber"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#d97706" stroke-width="1.2"/></svg></div>
                                    Mual, muntah, atau kulit/mata menguning (hati-hati gangguan hati)
                                </li>
                                <li>
                                    <div class="symptom-dot amber"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#d97706" stroke-width="1.2"/></svg></div>
                                    Gangguan pencernaan: mual, sakit perut, diare
                                </li>
                                <li>
                                    <div class="symptom-dot amber"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#d97706" stroke-width="1.2"/></svg></div>
                                    Urin berwarna oranye-merah (efek rifampisin — normal)
                                </li>
                                <li>
                                    <div class="symptom-dot amber"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#d97706" stroke-width="1.2"/></svg></div>
                                    Penglihatan kabur (efek etambutol)
                                </li>
                                <li>
                                    <div class="symptom-dot amber"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="4" stroke="#d97706" stroke-width="1.2"/></svg></div>
                                    Mati rasa di tangan/kaki (isoniazid — cegah dengan vitamin B6)
                                </li>
                            </ul>
                        </div>

                        <div style="background:var(--primary-light);border:1px solid rgba(0,101,164,0.15);border-radius:12px;padding:12px 16px;margin-top:16px;display:flex;gap:10px;align-items:flex-start;">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0;margin-top:1px;"><circle cx="8" cy="8" r="7" stroke="#0065A4" stroke-width="1.4"/><path d="M8 7v5M8 5.5V6" stroke="#0065A4" stroke-width="1.4" stroke-linecap="round"/></svg>
                            <p style="font-size:12px;color:var(--primary);line-height:1.6;font-weight:500;">Segera hubungi perawat/dokter jika mengalami efek samping yang berat atau gejala memburuk.</p>
                        </div>

                    </div>
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
    </script>

</body>
</html>