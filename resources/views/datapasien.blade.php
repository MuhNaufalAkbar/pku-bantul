<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Pasien - PKU Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        [x-cloak] { display: none !important; }
        * { box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; padding: 0; }
        body { background: #f0f4f8; color: #0f1f2e; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── NAV ── */
        nav.main-nav { background: rgba(255,255,255,0.85); backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px); border-bottom: 1px solid rgba(0,101,164,0.10); position: sticky; top: 0; z-index: 50; box-shadow: 0 2px 24px rgba(0,101,164,0.07); }
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

        /* ── STAT CARDS ── */
        .stats-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; animation: fadeUp 0.5s 0.05s ease forwards; opacity: 0; }
        .stat-card { background: #fff; border-radius: 16px; border: 1px solid rgba(0,101,164,0.08); padding: 20px 22px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); display: flex; align-items: center; gap: 16px; transition: transform 0.2s, box-shadow 0.2s; }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(0,0,0,0.08); }
        .stat-icon { width: 48px; height: 48px; border-radius: 14px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; }
        .stat-icon.blue { background: var(--primary-light); }
        .stat-icon.green { background: #f0fdf4; }
        .stat-icon.red { background: #fef2f2; }
        .stat-label { font-size: 12px; color: #94a3b8; font-weight: 500; margin-bottom: 2px; }
        .stat-val { font-size: 1.6rem; font-weight: 800; color: #0f1f2e; line-height: 1; }

        /* ── CHARTS ── */
        .charts-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px; animation: fadeUp 0.5s 0.12s ease forwards; opacity: 0; }
        .chart-card { background: #fff; border-radius: 18px; border: 1px solid rgba(0,101,164,0.08); box-shadow: 0 4px 20px rgba(0,0,0,0.05); overflow: hidden; }
        .chart-card-hdr { padding: 18px 22px; border-bottom: 1px solid #f0f4f8; display: flex; align-items: center; gap: 10px; }
        .chart-card-icon { width: 32px; height: 32px; border-radius: 9px; display: flex; align-items: center; justify-content: center; }
        .chart-card-icon.blue { background: var(--primary-light); }
        .chart-card-icon.purple { background: #f5f3ff; }
        .chart-card-title { font-size: 14px; font-weight: 700; color: #0f1f2e; }
        .chart-card-body { padding: 20px 22px; }

        /* ── PATIENT CARDS ── */
        .patients-section { animation: fadeUp 0.5s 0.19s ease forwards; opacity: 0; }
        .section-hdr { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
        .section-hdr h2 { font-size: 16px; font-weight: 700; color: #0f1f2e; }
        .patients-count { font-size: 12px; color: #94a3b8; background: #f8fafc; border: 1px solid #e2e8f0; padding: 3px 12px; border-radius: 20px; font-weight: 600; }

        .patient-card { background: #fff; border-radius: 16px; border: 1px solid rgba(0,101,164,0.08); box-shadow: 0 4px 16px rgba(0,0,0,0.04); overflow: hidden; margin-bottom: 14px; transition: box-shadow 0.2s; }
        .patient-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.09); }

        .patient-card-hdr { padding: 16px 22px; display: flex; align-items: center; justify-content: space-between; cursor: pointer; transition: background 0.2s; }
        .patient-card-hdr:hover { background: #f8fafc; }

        .patient-info { display: flex; align-items: center; gap: 14px; }
        .patient-avatar { width: 42px; height: 42px; border-radius: 50%; background: var(--primary-light); display: flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 800; color: var(--primary); flex-shrink: 0; }
        .patient-name { font-size: 15px; font-weight: 700; color: #0f1f2e; }
        .patient-meta { font-size: 12.5px; color: #94a3b8; margin-top: 2px; }

        .patient-toggle { display: flex; align-items: center; gap: 8px; }
        .record-badge { font-size: 11.5px; font-weight: 700; color: var(--primary); background: var(--primary-light); padding: 3px 12px; border-radius: 20px; }
        .toggle-btn { display: inline-flex; align-items: center; gap: 6px; font-size: 13px; font-weight: 700; color: var(--primary); padding: 7px 16px; border-radius: 20px; border: 1.5px solid rgba(0,101,164,0.2); background: transparent; cursor: pointer; transition: all 0.2s; font-family: 'Plus Jakarta Sans', sans-serif; white-space: nowrap; }
        .toggle-btn:hover { background: var(--primary-light); }
        .toggle-btn svg { transition: transform 0.3s; }

        /* Detail panel */
        .patient-detail { border-top: 1px solid #f0f4f8; padding: 20px 22px; }
        .detail-title { font-size: 14px; font-weight: 700; color: #0f1f2e; margin-bottom: 16px; display: flex; align-items: center; gap: 8px; }

        .check-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 12px; }
        .check-item { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 14px 16px; transition: all 0.2s; }
        .check-item:hover { background: var(--primary-light); border-color: rgba(0,101,164,0.2); }
        .check-date { font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }

        .check-row { display: flex; justify-content: space-between; align-items: center; padding: 4px 0; font-size: 13px; border-bottom: 1px solid rgba(0,0,0,0.04); }
        .check-row:last-child { border-bottom: none; }
        .check-row .lbl { color: #64748b; font-weight: 500; }
        .check-row .val { font-weight: 600; color: #0f1f2e; }
        .check-row .val.hot { color: #dc2626; }
        .check-row .val.ok { color: #16a34a; }

        .obat-badge { display: inline-flex; align-items: center; font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 20px; }
        .obat-badge.ya { background: #f0fdf4; color: #16a34a; }
        .obat-badge.tidak { background: #fef2f2; color: #dc2626; }

        .detail-actions { display: flex; justify-content: flex-end; margin-top: 16px; }
        .btn-print { display: inline-flex; align-items: center; gap: 7px; background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%); color: #fff; font-size: 13px; font-weight: 700; padding: 9px 20px; border-radius: 50px; border: none; cursor: pointer; box-shadow: 0 4px 14px rgba(0,101,164,0.25); transition: transform 0.2s, box-shadow 0.2s; font-family: 'Plus Jakarta Sans', sans-serif; }
        .btn-print:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(0,101,164,0.35); }

        /* Empty state */
        .empty-state { text-align: center; padding: 60px 20px; color: #94a3b8; }
        .empty-state svg { margin: 0 auto 16px; }
        .empty-state p { font-size: 14px; }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 900px) { .dash-wrapper { flex-direction: column; padding: 20px 16px 48px; } .sidebar { width: 100%; } .stats-row, .charts-row { grid-template-columns: 1fr; } }
        @media (max-width: 540px) { .patient-toggle { flex-direction: column; align-items: flex-end; gap: 6px; } .check-grid { grid-template-columns: 1fr; } }

        @media print {
            nav, .sidebar, footer, .btn-print, .page-header, .stats-row, .charts-row { display: none !important; }
            .dash-wrapper { padding: 0; }
            .patient-detail { display: block !important; }
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
                    <li><a href="{{ url('/dashboard_perawat') }}" class="nav-link">Dashboard</a></li>
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
                    <div style="font-size:11px;color:#64748b;">Perawat Aktif</div>
                </div>
            </div>
            @endif
            <ul class="space-y-4 font-semibold text-[#0065A4]">
                <li><a href="/welcomeafterlogin" class="block hover:text-red-600 transition">Beranda</a></li>
                <li><a href="{{ url('/tentangafterlogin') }}" class="block hover:text-red-600 transition">Tentang</a></li>
                <li><a href="{{ url('/dashboard_perawat') }}" class="block hover:text-red-600 transition">Dashboard</a></li>
                @if (Auth::check())
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
                <div class="s-role"><svg width="10" height="10" fill="currentColor" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4"/></svg> Perawat</div>
                @endauth
            </div>
            <div class="sidebar-nav">
                <div class="sidebar-nav-hdr">Menu</div>
                <a href="{{ url('/dashboard_perawat') }}" class="side-link">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="1" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/></svg>
                    Dashboard
                </a>
                <a href="{{ url('/datapasien') }}" class="side-link active">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M11 14H3a1 1 0 01-1-1V3a1 1 0 011-1h5l4 4v7a1 1 0 01-1 1z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M8 2v4h4M5 8h6M5 11h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    Data Pasien
                </a>
                <a href="{{ url('/bantuan_perawat') }}" class="side-link">
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
                    <a href="{{ url('/dashboard_perawat') }}">Dashboard</a><span>›</span>
                    <span>Data Pasien</span>
                </div>
                <h1>Data Pasien TBC</h1>
                <p>Pantau kondisi dan rekam medis seluruh pasien yang terdaftar</p>
            </div>

            <!-- STAT CARDS -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/><circle cx="9" cy="7" r="4" stroke="#0065A4" stroke-width="1.8"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Pasien Aktif</div>
                        <div class="stat-val" id="aktifCount">—</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M9 11l3 3L22 4" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Pasien Sembuh</div>
                        <div class="stat-val" id="sembuhCount">—</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon red">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#dc2626" stroke-width="1.8"/><path d="M12 8v5M12 15v.5" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="stat-label">Putus Obat</div>
                        <div class="stat-val" id="putusCount">—</div>
                    </div>
                </div>
            </div>

            <!-- CHARTS -->
            <div class="charts-row">
                <div class="chart-card">
                    <div class="chart-card-hdr">
                        <div class="chart-card-icon blue"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="#0065A4" stroke-width="1.4"/><path d="M8 4v4l3 2" stroke="#0065A4" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                        <div class="chart-card-title">Kepatuhan Minum Obat</div>
                    </div>
                    <div class="chart-card-body" style="max-height:240px;display:flex;align-items:center;justify-content:center;">
                        <canvas id="pieObatChart"></canvas>
                    </div>
                </div>
                <div class="chart-card">
                    <div class="chart-card-hdr">
                        <div class="chart-card-icon purple"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="10" width="4" height="5" rx="1" stroke="#7c3aed" stroke-width="1.4"/><rect x="6" y="6" width="4" height="9" rx="1" stroke="#7c3aed" stroke-width="1.4"/><rect x="11" y="2" width="4" height="13" rx="1" stroke="#7c3aed" stroke-width="1.4"/></svg></div>
                        <div class="chart-card-title">Sebaran Jenis Kelamin</div>
                    </div>
                    <div class="chart-card-body" style="max-height:240px;">
                        <canvas id="barGenderChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- PATIENT LIST -->
            <div class="patients-section">
                <div class="section-hdr">
                    <h2>Daftar Pasien</h2>
                    <span class="patients-count" id="totalCount">Memuat...</span>
                </div>

                @if(isset($message))
                    <div class="empty-state">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" stroke="#e2e8f0" stroke-width="2"/><path d="M16 24h16M24 16v16" stroke="#e2e8f0" stroke-width="2" stroke-linecap="round"/></svg>
                        <p>{{ $message }}</p>
                    </div>
                @else
                    @forelse($users as $user)
                    <div class="patient-card" x-data="{ open: false }">
                        <div class="patient-card-hdr" @click="open = !open">
                            <div class="patient-info">
                                <div class="patient-avatar">{{ strtoupper(substr($user->username, 0, 2)) }}</div>
                                <div>
                                    <div class="patient-name">{{ $user->username }}</div>
                                    <div class="patient-meta">{{ $user->checkHarians->count() }} record check harian</div>
                                </div>
                            </div>
                            <div class="patient-toggle">
                                <span class="record-badge">{{ $user->checkHarians->count() }} Record</span>
                                <button class="toggle-btn">
                                    <span x-show="!open">Lihat Detail</span>
                                    <span x-show="open" x-cloak>Sembunyikan</span>
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" :style="open ? 'transform:rotate(180deg)' : ''"><path d="M2.5 5l4.5 4.5L11.5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </button>
                            </div>
                        </div>

                        <div x-show="open" x-cloak class="patient-detail" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0">

                            <div class="detail-title">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="11" rx="1.5" stroke="#0065A4" stroke-width="1.4"/><path d="M5 1v4M11 1v4M2 7h12" stroke="#0065A4" stroke-width="1.4" stroke-linecap="round"/></svg>
                                Rekam Check Harian — {{ $user->username }}
                            </div>

                            @if($user->checkHarians->count() > 0)
                            <div class="check-grid" id="print-area-{{ $user->id }}">
                                @foreach($user->checkHarians as $ch)
                                <div class="check-item">
                                    <div class="check-date">{{ \Carbon\Carbon::parse($ch->tanggal)->format('d M Y') }}</div>
                                    <div class="check-row">
                                        <span class="lbl">Suhu</span>
                                        <span class="val {{ $ch->suhu > 37.5 ? 'hot' : 'ok' }}">{{ $ch->suhu }}°C</span>
                                    </div>
                                    <div class="check-row">
                                        <span class="lbl">Berat</span>
                                        <span class="val">{{ $ch->berat }} kg</span>
                                    </div>
                                    <div class="check-row">
                                        <span class="lbl">Nafsu Makan</span>
                                        <span class="val">{{ $ch->nafsu_makan }}</span>
                                    </div>
                                    <div class="check-row">
                                        <span class="lbl">Minum Obat</span>
                                        <span class="obat-badge {{ strtolower($ch->minum_obat) === 'ya' ? 'ya' : 'tidak' }}">{{ $ch->minum_obat }}</span>
                                    </div>
                                    @if($ch->catatan_pete)
                                    <div class="check-row" style="flex-direction:column;align-items:flex-start;gap:3px;">
                                        <span class="lbl">Catatan</span>
                                        <span style="font-size:12px;color:#64748b;font-weight:400;">{{ $ch->catatan_pete }}</span>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div style="text-align:center;padding:32px;color:#94a3b8;font-size:14px;">Belum ada data check harian untuk pasien ini.</div>
                            @endif

                            <div class="detail-actions">
                                <button class="btn-print" onclick="printPatient('{{ $user->id }}', '{{ $user->username }}')">
                                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M4 6V2h8v4M4 12H2V8h12v4h-2M4 12v3h8v-3" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
                                    Print Data Pasien
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" stroke="#e2e8f0" stroke-width="2"/><path d="M16 24h16M24 16v16" stroke="#e2e8f0" stroke-width="2" stroke-linecap="round"/></svg>
                        <p>Belum ada data pasien yang tersedia.</p>
                    </div>
                    @endforelse
                @endif
            </div>

        </main>
    </div>

    <!-- ── FOOTER ── -->
    <footer>
        <div class="footer-main py-10 px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <p class="footer-heading">Tentang TBC</p>
                    <p class="text-[13px] text-white/75 leading-relaxed"><strong class="text-white">Tuberkulosis (TBC)</strong> adalah penyakit infeksi menular yang disebabkan oleh bakteri <em>Mycobacterium tuberculosis</em>. Termasuk penyakit paling mematikan di dunia, terutama di negara berkembang.</p>
                </div>
                <div class="md:pl-8">
                    <p class="footer-heading">Kontak Kami</p>
                    <address class="not-italic text-sm text-white/80 leading-relaxed">Jl. Jend. Sudirman No.124,<br>Nyangkringan, Bantul, Kec. Bantul,<br>Kabupaten Bantul, DIY 55711</address>
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
        <div class="footer-bottom py-4 text-center text-xs text-white/60"><p>Copyright &copy; 2024 tbindonesia.or.id | All rights reserved.</p></div>
    </footer>

    <script>
        document.getElementById("menuBtn").addEventListener("click", () => {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        });

        /* ── Stats & Charts ── */
        const users = @json($users);
        let aktif = 0, sembuh = 0, putus = 0;
        let minumObatYa = 0, minumObatTidak = 0;
        let genderLaki = 0, genderPerempuan = 0, genderLainnya = 0;

        function isPutusObat(checkHarians) {
            if (!checkHarians || checkHarians.length < 1) return false;
            let dates = checkHarians.map(ch => ch.tanggal).sort();
            for (let i = 1; i < dates.length; i++) {
                let diff = (new Date(dates[i]) - new Date(dates[i - 1])) / 86400000;
                if (diff >= 3) return true;
            }
            return false;
        }

        users.forEach(user => {
            const checks = user.check_harians || [];
            const isAktif = checks.length > 0;
            const isSembuh = checks.length >= 33;
            const isPutus = isPutusObat(checks);

            if (isAktif || isSembuh || isPutus) {
                if (user.gender === 'Laki-laki') genderLaki++;
                else if (user.gender === 'Perempuan') genderPerempuan++;
                else genderLainnya++;
            }

            if (isAktif) aktif++;
            if (isSembuh) sembuh++;
            if (isPutus) putus++;

            checks.forEach(ch => {
                if (ch.minum_obat === 'Ya') minumObatYa++;
                else minumObatTidak++;
            });
        });

        document.getElementById('aktifCount').textContent = aktif;
        document.getElementById('sembuhCount').textContent = sembuh;
        document.getElementById('putusCount').textContent = putus;
        document.getElementById('totalCount').textContent = `${users.length} pasien terdaftar`;

        /* Pie Chart */
        new Chart(document.getElementById('pieObatChart'), {
            type: 'doughnut',
            data: {
                labels: ['Minum Obat', 'Tidak Minum'],
                datasets: [{ data: [minumObatYa, minumObatTidak], backgroundColor: ['#0065A4', '#fca5a5'], borderWidth: 0 }]
            },
            options: { responsive: true, cutout: '65%', plugins: { legend: { position: 'bottom', labels: { font: { family: 'Plus Jakarta Sans', size: 12 }, padding: 16 } } } }
        });

        /* Bar Chart */
        new Chart(document.getElementById('barGenderChart'), {
            type: 'bar',
            data: {
                labels: ['Laki-laki', 'Perempuan', 'Lainnya'],
                datasets: [{ label: 'Jumlah Pasien', data: [genderLaki, genderPerempuan, genderLainnya], backgroundColor: ['#0065A4', '#f472b6', '#94a3b8'], borderRadius: 8, borderSkipped: false }]
            },
            options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { stepSize: 1, font: { family: 'Plus Jakarta Sans' } }, grid: { color: '#f0f4f8' } }, x: { ticks: { font: { family: 'Plus Jakarta Sans' } }, grid: { display: false } } } }
        });

        /* Print */
        function printPatient(userId, username) {
            const content = document.getElementById('print-area-' + userId);
            if (!content) return;
            const win = window.open('', '', 'height=900,width=900');
            win.document.write(`<html><head><title>Data Pasien — ${username}</title>`);
            document.querySelectorAll('script[src*="cdn.tailwindcss.com"]').forEach(el => win.document.write(el.outerHTML));
            win.document.write(`</head><body style="font-family:sans-serif;padding:24px;">`);
            win.document.write(`<h2 style="margin-bottom:16px;">Data Pasien: ${username}</h2>`);
            win.document.write(content.innerHTML);
            win.document.write('</body></html>');
            win.document.close();
            setTimeout(() => win.print(), 500);
        }
    </script>

</body>
</html>