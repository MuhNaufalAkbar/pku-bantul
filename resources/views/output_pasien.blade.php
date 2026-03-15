<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Informasi Pasien - PKU Bantul</title>
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
        .profile-avatar {
            width: 64px; height: 64px; border-radius: 50%;
            border: 3px solid rgba(255,255,255,0.3);
            overflow: hidden; background: rgba(255,255,255,0.15);
            margin: 0 auto 12px; position: relative;
        }
        .profile-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .profile-status {
            position: absolute; bottom: 2px; right: 2px;
            width: 13px; height: 13px; border-radius: 50%;
            background: #22c55e; border: 2px solid #0065A4;
        }
        .profile-name { font-size: 15px; font-weight: 700; color: #fff; margin-bottom: 4px; }
        .profile-role {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.85); font-size: 11px; font-weight: 600;
            padding: 3px 12px; border-radius: 20px;
        }

        .sidebar-nav {
            background: #fff; border-radius: 16px;
            border: 1px solid rgba(0,101,164,0.08);
            overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .sidebar-nav-header {
            padding: 14px 20px; font-size: 10px; font-weight: 800;
            letter-spacing: 2px; text-transform: uppercase; color: #94a3b8;
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
        .side-link + .side-link { border-top: 1px solid #f8fafc; }

        /* ── MAIN ── */
        .main-content { flex: 1; min-width: 0; }

        .page-header { margin-bottom: 28px; }
        .breadcrumb {
            display: flex; align-items: center; gap: 6px;
            font-size: 12.5px; color: #94a3b8; margin-bottom: 6px;
        }
        .breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 600; }
        .breadcrumb span { color: #cbd5e1; }
        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem; font-weight: 700; color: #0f1f2e;
        }
        .page-header p { font-size: 13.5px; color: #64748b; margin-top: 4px; }

        /* ── CARDS ── */
        .info-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 20px; margin-bottom: 24px;
        }

        .info-card {
            background: #fff; border-radius: 18px;
            border: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            animation: fadeUp 0.5s ease forwards; opacity: 0;
        }
        .info-card:nth-child(1) { animation-delay: 0.05s; }
        .info-card:nth-child(2) { animation-delay: 0.12s; }

        .card-header {
            padding: 18px 24px; border-bottom: 1px solid #f0f4f8;
            display: flex; align-items: center; gap: 12px;
        }
        .card-header-icon {
            width: 38px; height: 38px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .card-header-icon.blue { background: var(--primary-light); }
        .card-header-icon.green { background: #f0fdf4; }
        .card-header-icon.amber { background: #fffbeb; }
        .card-title { font-size: 15px; font-weight: 700; color: #0f1f2e; }

        .card-body { padding: 20px 24px; }

        .data-row {
            display: flex; align-items: center; justify-content: space-between;
            padding: 11px 0; border-bottom: 1px solid #f8fafc;
        }
        .data-row:last-child { border-bottom: none; }
        .data-label { font-size: 13px; font-weight: 600; color: #64748b; }
        .data-value { font-size: 13.5px; font-weight: 600; color: #0f1f2e; text-align: right; }

        /* Status badge */
        .status-badge {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; font-weight: 700; padding: 3px 12px; border-radius: 20px;
        }
        .status-badge.active { background: #f0fdf4; color: #16a34a; }
        .status-badge.pending { background: #fffbeb; color: #d97706; }
        .status-badge .dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

        /* Compliance bar */
        .compliance-wrap { margin-top: 4px; }
        .compliance-bar-bg {
            background: #e2e8f0; border-radius: 10px; height: 6px; overflow: hidden; margin: 6px 0 4px;
        }
        .compliance-bar-fill {
            height: 100%; border-radius: 10px;
            background: linear-gradient(90deg, #0065A4, #22c55e);
            transition: width 1s ease;
        }
        .compliance-pct { font-size: 11px; color: #94a3b8; }

        /* ── STATS ROW ── */
        .stats-row {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 16px; margin-bottom: 24px;
            animation: fadeUp 0.5s 0.18s ease forwards; opacity: 0;
        }
        .stat-card {
            background: #fff; border-radius: 16px;
            border: 1px solid rgba(0,101,164,0.08);
            padding: 18px 20px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
            display: flex; align-items: center; gap: 14px;
        }
        .stat-icon { width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; }
        .stat-icon.blue { background: var(--primary-light); }
        .stat-icon.green { background: #f0fdf4; }
        .stat-icon.amber { background: #fffbeb; }
        .stat-label { font-size: 11.5px; color: #94a3b8; font-weight: 500; margin-bottom: 2px; }
        .stat-val { font-size: 1.3rem; font-weight: 800; color: #0f1f2e; line-height: 1; }

        /* ── TABLE ── */
        .table-card {
            background: #fff; border-radius: 18px;
            border: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden; margin-bottom: 24px;
            animation: fadeUp 0.5s 0.25s ease forwards; opacity: 0;
        }

        .table-header {
            padding: 18px 24px; border-bottom: 1px solid #f0f4f8;
            display: flex; align-items: center; justify-content: space-between;
        }
        .table-title { font-size: 15px; font-weight: 700; color: #0f1f2e; display: flex; align-items: center; gap: 10px; }

        .table-wrap { overflow-x: auto; }

        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #f8fafc; }
        th {
            padding: 12px 16px; font-size: 11.5px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.8px;
            color: #94a3b8; text-align: left; white-space: nowrap;
            border-bottom: 1px solid #f0f4f8;
        }
        td {
            padding: 13px 16px; font-size: 13.5px; color: #374151;
            border-bottom: 1px solid #f8fafc; white-space: nowrap;
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #f8fafc; }

        .td-badge {
            display: inline-flex; align-items: center;
            font-size: 11.5px; font-weight: 700; padding: 3px 10px; border-radius: 20px;
        }
        .td-badge.yes { background: #f0fdf4; color: #16a34a; }
        .td-badge.no { background: #fef2f2; color: #dc2626; }
        .td-badge.partial { background: #fffbeb; color: #d97706; }

        .empty-row td {
            padding: 40px; text-align: center; color: #94a3b8; font-size: 14px;
        }

        /* ── DOWNLOAD BTN ── */
        .download-wrap {
            display: flex; justify-content: flex-end;
            margin-bottom: 24px;
            animation: fadeUp 0.5s 0.32s ease forwards; opacity: 0;
        }
        .btn-download {
            display: inline-flex; align-items: center; gap: 8px;
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            color: #fff; font-size: 14px; font-weight: 700;
            padding: 11px 26px; border-radius: 50px; border: none; cursor: pointer;
            box-shadow: 0 6px 20px rgba(0,101,164,0.30); transition: transform 0.2s, box-shadow 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .btn-download:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(0,101,164,0.40); }
        .btn-download svg { transition: transform 0.2s; }
        .btn-download:hover svg { transform: translateY(2px); }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 900px) {
            .dash-wrapper { flex-direction: column; padding: 20px 16px 48px; }
            .sidebar { width: 100%; }
            .info-grid { grid-template-columns: 1fr; }
            .stats-row { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 540px) {
            .stats-row { grid-template-columns: 1fr; }
        }

        /* Print styles */
        @media print {
            nav, .sidebar, footer, .download-wrap { display: none !important; }
            .dash-wrapper { padding: 0; }
            .main-content { padding: 20px; }
            .info-card, .table-card, .stats-row { animation: none; opacity: 1; }
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
                    <li><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
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
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button type="submit" class="block text-red-600 font-semibold">Logout</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- ── LAYOUT ── -->
    <div class="dash-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-profile">
                <div class="profile-avatar" style="position:relative;display:inline-block;">
                    <img src="{{ asset('images/ikon_profil.png') }}" alt="Avatar" style="width:100%;height:100%;object-fit:cover;border-radius:50%;" />
                    <div class="profile-status"></div>
                </div>
                @auth
                <div class="profile-name">{{ $user->first_name }} {{ $user->last_name }}</div>
                <div class="profile-role">
                    <svg width="10" height="10" fill="currentColor" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4"/></svg>
                    Pasien
                </div>
                @endauth
            </div>

            <div class="sidebar-nav">
                <div class="sidebar-nav-header">Menu</div>
                <a href="{{ url('/dashboard') }}" class="side-link">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="1" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/></svg>
                    Dashboard
                </a>
                <a href="{{ url('/output_pasien') }}" class="side-link active">
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

        <!-- MAIN -->
        <main class="main-content">

            <!-- Page header -->
            <div class="page-header">
                <div class="breadcrumb">
                    <a href="/welcomeafterlogin">Beranda</a>
                    <span>›</span>
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    <span>›</span>
                    <span>Informasi Pasien</span>
                </div>
                <h1>Informasi Pasien</h1>
                <p>Data rekam medis dan riwayat pengobatan TBC Anda</p>
            </div>

            <!-- Stat summary -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" stroke="#0065A4" stroke-width="1.8"/><path d="M3 10h18M8 2v4M16 2v4" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Durasi Pengobatan</div>
                        <div class="stat-val">{{ $totalTreatmentDuration }} <span style="font-size:0.8rem;font-weight:500;color:#64748b;">hari</span></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M9 11l3 3L22 4" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Hari Patuh Obat</div>
                        <div class="stat-val">{{ $compliantDays }} <span style="font-size:0.8rem;font-weight:500;color:#64748b;">/ {{ $totalUniqueDays }}</span></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon amber">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#d97706" stroke-width="1.8"/><polyline points="12 6 12 12 16 14" stroke="#d97706" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Kepatuhan Obat</div>
                        <div class="stat-val">{{ number_format($compliancePercentage, 0) }}<span style="font-size:0.8rem;font-weight:500;color:#64748b;">%</span></div>
                    </div>
                </div>
            </div>

            <!-- Identitas + Status -->
            <div class="info-grid">

                <!-- Identitas Pasien -->
                <div class="info-card">
                    <div class="card-header">
                        <div class="card-header-icon blue">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="7" r="4" stroke="#0065A4" stroke-width="1.8"/></svg>
                        </div>
                        <div class="card-title">Identitas Pasien</div>
                    </div>
                    <div class="card-body">
                        <div class="data-row">
                            <div class="data-label">Nama Lengkap</div>
                            <div class="data-value">{{ $user->first_name }} {{ $user->last_name }}</div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">No. Rekam Medis</div>
                            <div class="data-value" style="color:var(--primary);font-family:monospace;font-size:13px;">{{ $rekamMedis }}</div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">Umur</div>
                            <div class="data-value">{{ $age }} Tahun</div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">Jenis Kelamin</div>
                            <div class="data-value">{{ $user->gender }}</div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">Jenis TBC</div>
                            <div class="data-value">
                                <span style="background:#fef2f2;color:#dc2626;font-size:12px;font-weight:700;padding:3px 12px;border-radius:20px;">TBC Paru</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Pengobatan -->
                <div class="info-card">
                    <div class="card-header">
                        <div class="card-header-icon green">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M9 11l3 3L22 4" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </div>
                        <div class="card-title">Status Pengobatan</div>
                    </div>
                    <div class="card-body">
                        <div class="data-row">
                            <div class="data-label">Status</div>
                            <div class="data-value">
                                @if($checkHarian->count() > 0)
                                    <span class="status-badge active"><span class="dot"></span>Aktif</span>
                                @else
                                    <span class="status-badge pending"><span class="dot"></span>Belum Memulai</span>
                                @endif
                            </div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">Fase</div>
                            <div class="data-value">{{ $checkHarian->count() > 0 ? 'Intensif' : 'Belum Memulai' }}</div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">Jadwal Kontrol</div>
                            <div class="data-value">{{ $jadwalKontrol }}</div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">Hari Gejala Aktif</div>
                            <div class="data-value">{{ $totalUniqueDays }} hari</div>
                        </div>
                        <div class="data-row" style="flex-direction:column;align-items:flex-start;gap:6px;">
                            <div class="data-label">Kepatuhan Obat</div>
                            <div style="width:100%;">
                                <div class="compliance-bar-bg">
                                    <div class="compliance-bar-fill" style="width:{{ number_format($compliancePercentage, 0) }}%"></div>
                                </div>
                                <div class="compliance-pct">{{ number_format($compliancePercentage, 0) }}% — {{ $compliantDays }} dari {{ $totalUniqueDays }} hari</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Download button -->
            <div class="download-wrap">
                <button id="printBtn" class="btn-download">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M2 11v2a1 1 0 001 1h10a1 1 0 001-1v-2M8 2v8M5 7l3 3 3-3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Download Informasi
                </button>
            </div>

            <!-- Tabel check harian -->
            <div class="table-card">
                <div class="table-header">
                    <div class="table-title">
                        <div style="width:32px;height:32px;border-radius:9px;background:var(--primary-light);display:flex;align-items:center;justify-content:center;">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="11" rx="1.5" stroke="#0065A4" stroke-width="1.4"/><path d="M5 1v4M11 1v4M2 7h12" stroke="#0065A4" stroke-width="1.4" stroke-linecap="round"/></svg>
                        </div>
                        Hasil Check Harian
                    </div>
                    <div style="font-size:12px;color:#94a3b8;">{{ $checkHarian->count() }} entri</div>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Suhu (°C)</th>
                                <th>Berat (kg)</th>
                                <th>Nafsu Makan</th>
                                <th>Minum Obat</th>
                                <th>Catatan Pasien</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($checkHarian as $check)
                            <tr>
                                <td style="font-weight:600;color:#0f1f2e;">{{ \Carbon\Carbon::parse($check->tanggal)->format('d M Y') }}</td>
                                <td>
                                    <span style="font-weight:600;color:{{ $check->suhu > 37.5 ? '#dc2626' : '#16a34a' }}">
                                        {{ $check->suhu }}°
                                    </span>
                                </td>
                                <td>{{ $check->berat }} kg</td>
                                <td>
                                    @php
                                        $nm = strtolower($check->nafsu_makan ?? '');
                                        $nmClass = str_contains($nm,'baik') ? 'yes' : (str_contains($nm,'kurang') ? 'no' : 'partial');
                                    @endphp
                                    <span class="td-badge {{ $nmClass }}">{{ $check->nafsu_makan }}</span>
                                </td>
                                <td>
                                    @php $mo = strtolower($check->minum_obat ?? ''); @endphp
                                    <span class="td-badge {{ $mo === 'ya' || $mo === 'yes' ? 'yes' : 'no' }}">
                                        {{ $check->minum_obat }}
                                    </span>
                                </td>
                                <td style="color:#64748b;max-width:200px;white-space:normal;">{{ $check->catatan_pete ?? '—' }}</td>
                            </tr>
                            @empty
                            <tr class="empty-row">
                                <td colspan="6">
                                    <div style="display:flex;flex-direction:column;align-items:center;gap:10px;">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="18" stroke="#e2e8f0" stroke-width="2"/><path d="M14 20h12M20 14v12" stroke="#e2e8f0" stroke-width="2" stroke-linecap="round"/></svg>
                                        Belum ada data check harian
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
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

        document.getElementById('printBtn').addEventListener('click', function () {
            window.print();
        });
    </script>

</body>
</html>