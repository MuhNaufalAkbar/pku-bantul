<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Perawat - PKU Bantul</title>
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
        .nav-link.active::after { width: 100%; background: var(--primary); }

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

        /* ── QUICK ACTIONS ── */
        .quick-actions { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; animation: fadeUp 0.5s 0.05s ease forwards; opacity: 0; }
        .action-card { background: #fff; border-radius: 16px; border: 1px solid rgba(0,101,164,0.08); padding: 20px 16px; text-align: center; text-decoration: none; transition: all 0.25s; box-shadow: 0 4px 16px rgba(0,0,0,0.04); }
        .action-card:hover { transform: translateY(-5px); box-shadow: 0 12px 32px rgba(0,0,0,0.10); border-color: rgba(0,101,164,0.2); }
        .action-icon { width: 52px; height: 52px; border-radius: 14px; margin: 0 auto 12px; display: flex; align-items: center; justify-content: center; }
        .action-icon.blue { background: var(--primary-light); }
        .action-icon.green { background: #f0fdf4; }
        .action-icon.amber { background: #fffbeb; }
        .action-label { font-size: 13px; font-weight: 700; color: #0f1f2e; margin-bottom: 4px; }
        .action-desc { font-size: 11px; color: #94a3b8; }

        /* ── FORM CARD ── */
        .form-card { background: #fff; border-radius: 20px; border: 1px solid rgba(0,101,164,0.08); box-shadow: 0 4px 20px rgba(0,0,0,0.05); overflow: hidden; animation: fadeUp 0.5s 0.12s ease forwards; opacity: 0; }

        .card-hdr { padding: 20px 28px; border-bottom: 1px solid #f0f4f8; display: flex; align-items: center; justify-content: space-between; }
        .card-hdr-left { display: flex; align-items: center; gap: 12px; }
        .card-hdr-icon { width: 38px; height: 38px; border-radius: 10px; background: var(--primary-light); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .card-title { font-size: 15px; font-weight: 700; color: #0f1f2e; }
        .card-badge { font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: var(--primary); background: var(--primary-light); padding: 3px 12px; border-radius: 20px; }
        .card-body { padding: 28px; }

        /* Form fields */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 13px; font-weight: 600; color: #374151; }
        .input-wrap { position: relative; }
        .input-icon { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #94a3b8; pointer-events: none; }
        .form-group input,
        .form-group select {
            width: 100%; padding: 11px 14px 11px 40px;
            border: 1.5px solid #e2e8f0; border-radius: 10px;
            font-size: 14px; color: #0f1f2e; background: #f8fafc; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .form-group input:focus,
        .form-group select:focus { border-color: var(--primary); background: #fff; box-shadow: 0 0 0 3px rgba(0,101,164,0.10); }

        /* Form actions */
        .form-actions { display: flex; justify-content: flex-end; gap: 12px; padding-top: 24px; border-top: 1px solid #f0f4f8; margin-top: 24px; }
        .btn-cancel { padding: 10px 24px; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #fff; color: #64748b; font-size: 14px; font-weight: 600; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif; transition: all 0.2s; }
        .btn-cancel:hover { border-color: var(--accent); color: var(--accent); }
        .btn-save { padding: 10px 28px; background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%); color: #fff; border: none; border-radius: 10px; font-size: 14px; font-weight: 700; cursor: pointer; font-family: 'Plus Jakarta Sans', sans-serif; box-shadow: 0 4px 14px rgba(0,101,164,0.25); transition: transform 0.2s, box-shadow 0.2s; display: flex; align-items: center; gap: 7px; }
        .btn-save:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(0,101,164,0.35); }

        /* Toast */
        .toast { position: fixed; top: 80px; right: 24px; z-index: 200; background: #fff; border: 1px solid #bbf7d0; border-radius: 14px; padding: 14px 20px; box-shadow: 0 8px 32px rgba(0,0,0,0.12); display: flex; align-items: center; gap: 12px; max-width: 340px; animation: slideInToast 0.4s ease forwards; }
        .toast-icon { width: 36px; height: 36px; border-radius: 10px; background: #f0fdf4; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .toast-title { font-size: 13.5px; font-weight: 700; color: #166534; }
        @keyframes slideInToast { from { opacity: 0; transform: translateX(40px); } to { opacity: 1; transform: translateX(0); } }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 900px) { .dash-wrapper { flex-direction: column; padding: 20px 16px 48px; } .sidebar { width: 100%; } .form-grid { grid-template-columns: 1fr; } .quick-actions { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 540px) { .quick-actions { grid-template-columns: 1fr; } }
    </style>
</head>

<body>

    <!-- Toast Success -->
    @if(session('success'))
    <div class="toast" id="successToast">
        <div class="toast-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="#16a34a" stroke-width="1.5"/><path d="M6 9l2 2 4-4" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div>
            <div class="toast-title">{{ session('success') }}</div>
        </div>
    </div>
    <script>setTimeout(() => { const t = document.getElementById('successToast'); if(t) { t.style.opacity='0'; t.style.transform='translateX(40px)'; t.style.transition='all 0.4s'; setTimeout(() => t.remove(), 400); } }, 4000);</script>
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
                    <li><a href="{{ url('/dashboard_perawat') }}" class="nav-link active">Dashboard</a></li>
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
                    <div style="font-size:11px;color:#64748b;">Perawat Aktif</div>
                </div>
            </div>
            @endif
            <ul class="space-y-4 font-semibold text-[#0065A4]">
                <li><a href="/welcomeafterlogin" class="block hover:text-red-600 transition">Beranda</a></li>
                <li><a href="{{ url('/tentangafterlogin') }}" class="block hover:text-red-600 transition">Tentang</a></li>
                <li><a href="{{ url('/kegiatanafterlogin') }}" class="block hover:text-red-600 transition">Kegiatan</a></li>
                @if (Auth::check())
                    <li><a href="{{ url('/dashboard_perawat') }}" class="block hover:text-red-600 transition">Dashboard</a></li>
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
                <div class="s-role">
                    <svg width="10" height="10" fill="currentColor" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4"/></svg>
                    Perawat
                </div>
                @endauth
            </div>
            <div class="sidebar-nav">
                <div class="sidebar-nav-hdr">Menu</div>
                <a href="{{ url('/dashboard_perawat') }}" class="side-link active">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="1" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="9" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/></svg>
                    Dashboard
                </a>
                <a href="{{ url('/datapasien') }}" class="side-link">
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
                    <span>Dashboard Perawat</span>
                </div>
                <h1>Dashboard Perawat</h1>
                @auth
                <p>Selamat datang kembali, <strong>{{ Auth::user()->username }}</strong> — Kelola data dan profil Anda</p>
                @endauth
            </div>

            <!-- Quick actions -->
            <div class="quick-actions">
                <a href="{{ url('/dashboard_perawat') }}" class="action-card">
                    <div class="action-icon blue">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="7" r="4" stroke="#0065A4" stroke-width="1.8"/></svg>
                    </div>
                    <div class="action-label">Profil Saya</div>
                    <div class="action-desc">Edit data diri</div>
                </a>
                <a href="{{ url('/datapasien') }}" class="action-card">
                    <div class="action-icon green">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M17 21H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" stroke="#16a34a" stroke-width="1.8" stroke-linejoin="round"/><path d="M12 3v6h6M8 13h8M8 17h5" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div class="action-label">Data Pasien</div>
                    <div class="action-desc">Lihat semua pasien</div>
                </a>
                <a href="{{ url('/bantuan_perawat') }}" class="action-card">
                    <div class="action-icon amber">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#d97706" stroke-width="1.8"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01" stroke="#d97706" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div class="action-label">Bantuan</div>
                    <div class="action-desc">Pusat bantuan</div>
                </a>
            </div>

            <!-- Edit Profile Form -->
            <div class="form-card">
                <div class="card-hdr">
                    <div class="card-hdr-left">
                        <div class="card-hdr-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="7" r="4" stroke="#0065A4" stroke-width="1.8"/></svg>
                        </div>
                        <div class="card-title">Data Pribadi</div>
                    </div>
                    <span class="card-badge">Perawat</span>
                </div>

                <div class="card-body">
                    @auth
                    <form action="{{ route('update.profile') }}" method="POST">
                        @csrf

                        <div class="form-grid">

                            <!-- Nama Depan -->
                            <div class="form-group">
                                <label for="first_name">Nama Depan</label>
                                <div class="input-wrap">
                                    <span class="input-icon">
                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5.5" r="3" stroke="currentColor" stroke-width="1.4"/><path d="M2 13c0-3.314 2.686-4.5 6-4.5s6 1.186 6 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                                    </span>
                                    <input type="text" name="first_name" id="first_name" value="{{ Auth::user()->first_name }}" required />
                                </div>
                            </div>

                            <!-- Nama Belakang -->
                            <div class="form-group">
                                <label for="last_name">Nama Belakang</label>
                                <div class="input-wrap">
                                    <span class="input-icon">
                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5.5" r="3" stroke="currentColor" stroke-width="1.4"/><path d="M2 13c0-3.314 2.686-4.5 6-4.5s6 1.186 6 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                                    </span>
                                    <input type="text" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" required />
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <div class="input-wrap">
                                    <span class="input-icon">
                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M8 1.5C5.515 1.5 3.5 3.515 3.5 6c0 3.75 4.5 8.5 4.5 8.5s4.5-4.75 4.5-8.5C12.5 3.515 10.485 1.5 8 1.5z" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="6" r="1.5" stroke="currentColor" stroke-width="1.4"/></svg>
                                    </span>
                                    <input type="text" name="address" id="address" value="{{ Auth::user()->address }}" required />
                                </div>
                            </div>

                            <!-- Nomor HP -->
                            <div class="form-group">
                                <label for="phone">Nomor Handphone</label>
                                <div class="input-wrap">
                                    <span class="input-icon">
                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M3 2.5A1.5 1.5 0 014.5 1h7A1.5 1.5 0 0113 2.5v11a1.5 1.5 0 01-1.5 1.5h-7A1.5 1.5 0 013 13.5v-11z" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="12" r="0.8" fill="currentColor"/></svg>
                                    </span>
                                    <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone }}" required />
                                </div>
                            </div>

                            <!-- Jenis Kelamin (full width) -->
                            <div class="form-group" style="grid-column: 1 / -1;">
                                <label for="gender">Jenis Kelamin</label>
                                <div class="input-wrap">
                                    <span class="input-icon">
                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="7" r="4" stroke="currentColor" stroke-width="1.4"/><path d="M8 11v4M6 13h4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                                    </span>
                                    <select name="gender" id="gender">
                                        <option value="Laki-laki" {{ Auth::user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ Auth::user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        <option value="Lainnya" {{ Auth::user()->gender == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-cancel" onclick="resetForm()">Batal</button>
                            <button type="submit" class="btn-save">
                                <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M13.5 4.5l-8 8-3-3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
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

        function resetForm() {
            document.querySelector('form').reset();
        }
    </script>

</body>
</html>