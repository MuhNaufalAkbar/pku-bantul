<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - PKU Bantul</title>
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
        .nav-link.active::after { width: 100%; background: var(--primary); }

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

        /* ── DASHBOARD LAYOUT ── */
        .dash-wrapper {
            flex: 1; display: flex;
            max-width: 1300px; width: 100%; margin: 0 auto;
            padding: 32px 24px 64px; gap: 28px;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: var(--sidebar-w); flex-shrink: 0;
        }

        .sidebar-profile {
            background: linear-gradient(145deg, #0065A4, #004b6b);
            border-radius: 20px; padding: 32px 24px;
            text-align: center; position: relative; overflow: hidden; margin-bottom: 16px;
        }
        .sidebar-profile::before {
            content: ''; position: absolute; top: -40px; right: -40px;
            width: 130px; height: 130px; border-radius: 50%;
            background: rgba(255,255,255,0.07); pointer-events: none;
        }

        .profile-avatar-wrap {
            position: relative; display: inline-block; margin-bottom: 14px;
        }
        .profile-avatar {
            width: 72px; height: 72px; border-radius: 50%;
            border: 3px solid rgba(255,255,255,0.35);
            overflow: hidden; background: rgba(255,255,255,0.15);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto;
        }
        .profile-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .profile-status {
            position: absolute; bottom: 2px; right: 2px;
            width: 14px; height: 14px; border-radius: 50%;
            background: #22c55e; border: 2px solid #0065A4;
        }

        .profile-name { font-size: 16px; font-weight: 700; color: #fff; margin-bottom: 4px; }
        .profile-role {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.85); font-size: 11px; font-weight: 600;
            padding: 3px 12px; border-radius: 20px; letter-spacing: 0.5px;
        }

        /* Sidebar nav */
        .sidebar-nav {
            background: #fff; border-radius: 16px;
            border: 1px solid rgba(0,101,164,0.08);
            overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .sidebar-nav-header {
            padding: 14px 20px;
            font-size: 10px; font-weight: 800; letter-spacing: 2px;
            text-transform: uppercase; color: #94a3b8;
            border-bottom: 1px solid #f0f4f8;
        }

        .side-link {
            display: flex; align-items: center; gap: 12px;
            padding: 13px 20px; font-size: 14px; font-weight: 600;
            color: #4a6582; text-decoration: none;
            transition: all 0.2s; border-left: 3px solid transparent;
        }
        .side-link:hover { background: var(--primary-light); color: var(--primary); border-left-color: rgba(0,101,164,0.3); }
        .side-link.active { background: var(--primary-light); color: var(--primary); border-left-color: var(--primary); }
        .side-link svg { flex-shrink: 0; }
        .side-link + .side-link { border-top: 1px solid #f8fafc; }

        /* ── MAIN CONTENT ── */
        .main-content { flex: 1; min-width: 0; }

        /* Page header */
        .page-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 28px;
        }
        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem; font-weight: 700; color: #0f1f2e;
        }
        .page-header p { font-size: 13.5px; color: #64748b; margin-top: 4px; }

        .breadcrumb {
            display: flex; align-items: center; gap: 6px;
            font-size: 12.5px; color: #94a3b8;
        }
        .breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 600; }
        .breadcrumb span { color: #cbd5e1; }

        /* Stat cards row */
        .stats-row {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 16px; margin-bottom: 24px;
        }
        .stat-card {
            background: #fff; border-radius: 16px;
            border: 1px solid rgba(0,101,164,0.08);
            padding: 20px 22px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
            display: flex; align-items: center; gap: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(0,0,0,0.08); }
        .stat-icon {
            width: 48px; height: 48px; border-radius: 14px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
        }
        .stat-icon.blue { background: var(--primary-light); }
        .stat-icon.green { background: #f0fdf4; }
        .stat-icon.amber { background: #fffbeb; }
        .stat-label { font-size: 12px; color: #94a3b8; font-weight: 500; margin-bottom: 2px; }
        .stat-val { font-size: 1.4rem; font-weight: 800; color: #0f1f2e; }

        /* Profile card */
        .profile-card {
            background: #fff; border-radius: 20px;
            border: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden; margin-bottom: 24px;
        }

        .card-header {
            padding: 20px 28px;
            border-bottom: 1px solid #f0f4f8;
            display: flex; align-items: center; justify-content: space-between;
        }
        .card-title { font-size: 16px; font-weight: 700; color: #0f1f2e; }
        .card-badge {
            font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase;
            color: var(--primary); background: var(--primary-light);
            padding: 3px 12px; border-radius: 20px;
        }
        .card-badge.green { color: #16a34a; background: #f0fdf4; }

        .card-body { padding: 24px 28px; }

        /* Data rows */
        .data-row {
            display: flex; align-items: flex-start; justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid #f8fafc;
        }
        .data-row:last-child { border-bottom: none; }

        .data-label {
            display: flex; align-items: center; gap: 10px;
            font-size: 13.5px; font-weight: 600; color: #64748b;
            min-width: 180px;
        }
        .data-label-icon {
            width: 30px; height: 30px; border-radius: 8px;
            background: #f8fafc; border: 1px solid #e2e8f0;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .data-value {
            font-size: 14px; font-weight: 500; color: #0f1f2e;
            text-align: right; flex: 1;
        }

        /* Quick action buttons */
        .quick-actions {
            display: grid; grid-template-columns: repeat(4, 1fr);
            gap: 16px; margin-bottom: 24px;
        }
        .action-card {
            background: #fff; border-radius: 16px;
            border: 1px solid rgba(0,101,164,0.08);
            padding: 20px 16px; text-align: center;
            text-decoration: none; transition: all 0.25s;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
        }
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.10);
            border-color: rgba(0,101,164,0.2);
        }
        .action-icon {
            width: 52px; height: 52px; border-radius: 14px; margin: 0 auto 12px;
            display: flex; align-items: center; justify-content: center;
        }
        .action-icon.blue { background: var(--primary-light); }
        .action-icon.green { background: #f0fdf4; }
        .action-icon.amber { background: #fffbeb; }
        .action-icon.red { background: #fef2f2; }
        .action-label { font-size: 13px; font-weight: 700; color: #0f1f2e; margin-bottom: 4px; }
        .action-desc { font-size: 11px; color: #94a3b8; }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .fade-up { animation: fadeUp 0.5s ease forwards; }
        .d1 { animation-delay: 0.05s; opacity: 0; }
        .d2 { animation-delay: 0.12s; opacity: 0; }
        .d3 { animation-delay: 0.19s; opacity: 0; }
        .d4 { animation-delay: 0.26s; opacity: 0; }

        @media (max-width: 900px) {
            .dash-wrapper { flex-direction: column; padding: 20px 16px 48px; }
            .sidebar { width: 100%; }
            .sidebar-nav { display: grid; grid-template-columns: repeat(2, 1fr); }
            .sidebar-nav-header { display: none; }
            .stats-row { grid-template-columns: 1fr 1fr; }
            .quick-actions { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 540px) {
            .stats-row { grid-template-columns: 1fr; }
            .quick-actions { grid-template-columns: 1fr 1fr; }
            .data-label { min-width: 130px; }
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

            <ul class="hidden md:flex items-center space-x-6">
                <li><a href="/welcomeafterlogin" class="nav-link">Beranda</a></li>
                <li><a href="{{ url('/tentangafterlogin') }}" class="nav-link">Tentang</a></li>
                <li><a href="{{ url('/kegiatanafterlogin') }}" class="nav-link">Kegiatan</a></li>
                @if (Auth::check())
                    <li><a href="{{ url('/dashboard') }}" class="nav-link active">Dashboard</a></li>
                    <li>
                        <div class="user-pill">
                            <div class="user-avatar">
                                <img src="{{ asset('images/ikon_profil.png') }}" alt="Profil" />
                            </div>
                            <span class="user-name">{{ Auth::user()->username }}</span>
                        </div>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
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
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block text-red-600 hover:text-red-700 font-semibold">Logout</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- ── DASHBOARD LAYOUT ── -->
    <div class="dash-wrapper">

        <!-- ── SIDEBAR ── -->
        <aside class="sidebar">

            <!-- Profile card -->
            <div class="sidebar-profile fade-up d1">
                <div class="profile-avatar-wrap">
                    <div class="profile-avatar">
                        <img src="{{ asset('images/ikon_profil.png') }}" alt="Avatar" />
                    </div>
                    <div class="profile-status"></div>
                </div>
                @auth
                <div class="profile-name">{{ Auth::user()->username }}</div>
                <div class="profile-role">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="4"/></svg>
                    {{ Auth::user()->role == 'perawat' ? 'Perawat' : 'Pasien' }}
                </div>
                @endauth
            </div>

            <!-- Nav links -->
            <div class="sidebar-nav fade-up d2">
                <div class="sidebar-nav-header">Menu</div>
                <a href="{{ url('/dashboard') }}" class="side-link active">
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
                <a href="{{ url('/bantuan') }}" class="side-link">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M6 6a2 2 0 114 0c0 1.333-2 2-2 3M8 12v.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    Bantuan
                </a>
            </div>

        </aside>

        <!-- ── MAIN ── -->
        <main class="main-content">

            <!-- Page header -->
            <div class="page-header fade-up d1">
                <div>
                    <div class="breadcrumb" style="margin-bottom:6px;">
                        <a href="/welcomeafterlogin">Beranda</a>
                        <span>›</span>
                        <span>Dashboard</span>
                    </div>
                    <h1>Dashboard</h1>
                    @auth
                    <p>Selamat datang kembali, <strong>{{ Auth::user()->username }}</strong>!</p>
                    @endauth
                </div>
                <div style="font-size:12px;color:#94a3b8;text-align:right;">
                    <div style="font-size:11px;text-transform:uppercase;letter-spacing:1px;font-weight:600;">Terakhir masuk</div>
                    <div style="font-size:13px;color:#0f1f2e;font-weight:600;margin-top:2px;">{{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}</div>
                </div>
            </div>

            <!-- Quick action cards -->
            <div class="quick-actions fade-up d2">
                <a href="{{ url('/output_pasien') }}" class="action-card">
                    <div class="action-icon blue">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="7" r="4" stroke="#0065A4" stroke-width="1.8"/></svg>
                    </div>
                    <div class="action-label">Informasi</div>
                    <div class="action-desc">Data pasien</div>
                </a>
                <a href="{{ url('/checkharian') }}" class="action-card">
                    <div class="action-icon green">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" stroke="#16a34a" stroke-width="1.8"/><path d="M3 10h18M8 2v4M16 2v4M9 15l2 2 4-4" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div class="action-label">Check Harian</div>
                    <div class="action-desc">Pemeriksaan rutin</div>
                </a>
                <a href="{{ url('/pusatinfotbc') }}" class="action-card">
                    <div class="action-icon amber">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#d97706" stroke-width="1.8"/><path d="M12 8v5M12 15v.5" stroke="#d97706" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div class="action-label">Info TBC</div>
                    <div class="action-desc">Pusat informasi</div>
                </a>
                <a href="{{ url('/bantuan') }}" class="action-card">
                    <div class="action-icon red">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#dc2626" stroke-width="1.8"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div class="action-label">Bantuan</div>
                    <div class="action-desc">Butuh bantuan?</div>
                </a>
            </div>

            <!-- Stat cards -->
            @auth
            @if(Auth::user()->role == 'perawat')
            <div class="stats-row fade-up d3">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/><circle cx="9" cy="7" r="4" stroke="#0065A4" stroke-width="1.8"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Total Pasien</div>
                        <div class="stat-val">—</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M9 11l3 3L22 4" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Sudah Periksa</div>
                        <div class="stat-val">—</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon amber">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#d97706" stroke-width="1.8"/><polyline points="12 6 12 12 16 14" stroke="#d97706" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Jadwal Hari Ini</div>
                        <div class="stat-val">—</div>
                    </div>
                </div>
            </div>
            @endif
            @endauth

            <!-- Data pribadi -->
            <div class="profile-card fade-up d4">
                <div class="card-header">
                    <div class="card-title">Data Pribadi</div>
                    @auth
                    <span class="card-badge {{ Auth::user()->role == 'perawat' ? '' : 'green' }}">
                        {{ Auth::user()->role == 'perawat' ? 'Perawat' : 'Pasien' }}
                    </span>
                    @endauth
                </div>
                <div class="card-body">
                    @auth
                    @if(Auth::user()->role == 'perawat')
                    <!-- Perawat -->
                    <div class="data-row">
                        <div class="data-label">
                            <div class="data-label-icon">
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5.5" r="3" stroke="#64748b" stroke-width="1.4"/><path d="M2 13c0-3.314 2.686-4.5 6-4.5s6 1.186 6 4.5" stroke="#64748b" stroke-width="1.4" stroke-linecap="round"/></svg>
                            </div>
                            Nama Lengkap
                        </div>
                        <div class="data-value">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">
                            <div class="data-label-icon">
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="10" rx="1.5" stroke="#64748b" stroke-width="1.4"/><path d="M2 6h12" stroke="#64748b" stroke-width="1.4"/></svg>
                            </div>
                            Tugas
                        </div>
                        <div class="data-value" style="color:#64748b;">Pengawasan pasien, pemeriksaan rutin</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">
                            <div class="data-label-icon">
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5.5" r="3" stroke="#64748b" stroke-width="1.4"/><path d="M2 13c0-3.314 2.686-4.5 6-4.5s6 1.186 6 4.5" stroke="#64748b" stroke-width="1.4" stroke-linecap="round"/></svg>
                            </div>
                            Username
                        </div>
                        <div class="data-value">{{ Auth::user()->username }}</div>
                    </div>

                    @else
                    <!-- Pasien -->
                    <div class="data-row">
                        <div class="data-label">
                            <div class="data-label-icon">
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5.5" r="3" stroke="#64748b" stroke-width="1.4"/><path d="M2 13c0-3.314 2.686-4.5 6-4.5s6 1.186 6 4.5" stroke="#64748b" stroke-width="1.4" stroke-linecap="round"/></svg>
                            </div>
                            Nama Lengkap
                        </div>
                        <div class="data-value">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">
                            <div class="data-label-icon">
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M8 1.5C5.515 1.5 3.5 3.515 3.5 6c0 3.75 4.5 8.5 4.5 8.5s4.5-4.75 4.5-8.5C12.5 3.515 10.485 1.5 8 1.5z" stroke="#64748b" stroke-width="1.4"/><circle cx="8" cy="6" r="1.5" stroke="#64748b" stroke-width="1.4"/></svg>
                            </div>
                            Alamat
                        </div>
                        <div class="data-value">{{ Auth::user()->address ?? '—' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">
                            <div class="data-label-icon">
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 2.5A1.5 1.5 0 014.5 1h7A1.5 1.5 0 0113 2.5v11a1.5 1.5 0 01-1.5 1.5h-7A1.5 1.5 0 013 13.5v-11z" stroke="#64748b" stroke-width="1.4"/><circle cx="8" cy="12" r="0.8" fill="#64748b"/></svg>
                            </div>
                            Nomor HP
                        </div>
                        <div class="data-value">{{ Auth::user()->phone ?? '—' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">
                            <div class="data-label-icon">
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5.5" r="3" stroke="#64748b" stroke-width="1.4"/><path d="M2 13c0-3.314 2.686-4.5 6-4.5s6 1.186 6 4.5" stroke="#64748b" stroke-width="1.4" stroke-linecap="round"/></svg>
                            </div>
                            Username
                        </div>
                        <div class="data-value">{{ Auth::user()->username }}</div>
                    </div>
                    @endif
                    @else
                    <p style="font-size:14px;color:#64748b;">Silakan <a href="{{ route('login') }}" style="color:var(--primary);font-weight:700;">masuk</a> untuk melihat dashboard Anda.</p>
                    @endauth
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
        document.getElementById("menuBtn").addEventListener("click", () => {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        });
    </script>

</body>
</html>