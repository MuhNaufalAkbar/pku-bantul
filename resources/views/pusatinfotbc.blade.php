<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pusat Informasi TBC - PKU Bantul</title>
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
        html { scroll-behavior: smooth; }
        body { background: #f4f8fc; color: #0f1f2e; }

        /* ── NAV ── */
        nav.main-nav {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
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
        .btn-daftar {
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            color: #fff; font-weight: 700; padding: 0.45rem 1.35rem;
            border-radius: 50px; transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(0,101,164,0.30); text-decoration: none; font-size: 0.95rem;
        }
        .btn-daftar:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,101,164,0.40); }
        #mobileMenu { border-top: 1px solid rgba(0,101,164,0.1); }

        /* ── HERO ── */
        .page-hero {
            position: relative; overflow: hidden;
            min-height: 380px; display: flex; align-items: center; justify-content: center;
        }
        .hero-bg {
            position: absolute; inset: 0;
            background: url('/images/laber_pusattbc.png') center/cover no-repeat;
        }
        .hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(160deg, rgba(15,23,42,0.82) 0%, rgba(0,75,107,0.72) 100%);
        }
        .hero-dots {
            position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.055) 1px, transparent 1px);
            background-size: 28px 28px;
        }
        .hero-content {
            position: relative; z-index: 2;
            text-align: center; padding: 80px 24px; max-width: 700px;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(229,62,62,0.18); border: 1px solid rgba(229,62,62,0.4);
            color: #fc8181; font-size: 11px; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            padding: 5px 16px; border-radius: 50px; margin-bottom: 18px;
        }
        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 700;
            color: #fff; line-height: 1.2; margin-bottom: 16px;
        }
        .hero-content p {
            font-size: 16px; color: rgba(255,255,255,0.7);
            line-height: 1.75; font-weight: 300;
        }

        /* ── STICKY TAB NAV ── */
        .tab-nav {
            position: sticky; top: 65px; z-index: 40;
            background: #fff;
            border-bottom: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }
        .tab-nav-inner {
            max-width: 1100px; margin: 0 auto;
            display: flex; overflow-x: auto; gap: 0;
            padding: 0 24px;
            scrollbar-width: none;
        }
        .tab-nav-inner::-webkit-scrollbar { display: none; }
        .tab-link {
            display: flex; align-items: center; gap: 7px;
            padding: 14px 20px; font-size: 13.5px; font-weight: 600;
            color: #64748b; text-decoration: none; white-space: nowrap;
            border-bottom: 2px solid transparent;
            transition: color 0.2s, border-color 0.2s;
            flex-shrink: 0;
        }
        .tab-link:hover { color: var(--primary); border-color: rgba(0,101,164,0.3); }
        .tab-link.active { color: var(--primary); border-color: var(--primary); }
        .tab-link svg { flex-shrink: 0; }

        /* ── CONTENT WRAPPER ── */
        .content-wrap { max-width: 1100px; margin: 0 auto; padding: 0 24px 80px; }

        /* ── INFO SECTION ── */
        .info-section {
            padding: 72px 0;
            border-bottom: 1px solid rgba(0,101,164,0.07);
        }
        .info-section:last-child { border-bottom: none; }

        .info-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 64px; align-items: center;
        }
        .info-grid.reverse { direction: rtl; }
        .info-grid.reverse > * { direction: ltr; }

        .section-tag {
            display: inline-block; font-size: 11px; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            color: var(--primary); background: var(--primary-light);
            padding: 4px 14px; border-radius: 20px; margin-bottom: 14px;
        }

        .info-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.6rem, 3vw, 2.2rem); font-weight: 700;
            color: #0f1f2e; line-height: 1.25; margin-bottom: 20px;
        }

        .info-body {
            font-size: 15px; color: #4a6582;
            line-height: 1.85; font-weight: 300;
        }
        .info-body em { font-style: italic; color: #1e3a5f; font-weight: 400; }
        .info-body strong { color: #0f1f2e; font-weight: 700; }
        .info-body p + p { margin-top: 16px; }

        /* Bullet list */
        .info-list { list-style: none; padding: 0; margin: 0; }
        .info-list li {
            display: flex; align-items: flex-start; gap: 12px;
            padding: 10px 0; border-bottom: 1px solid #f0f4f8;
            font-size: 15px; color: #4a6582; line-height: 1.65; font-weight: 300;
        }
        .info-list li:last-child { border-bottom: none; }
        .list-bullet {
            width: 22px; height: 22px; border-radius: 50%; flex-shrink: 0;
            background: var(--primary-light); display: flex; align-items: center; justify-content: center;
            margin-top: 2px;
        }
        .list-bullet svg { color: var(--primary); }

        /* Category label inside list */
        .list-category {
            display: inline-block; font-size: 11px; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase; color: var(--primary);
            background: var(--primary-light); padding: 3px 10px; border-radius: 20px;
            margin-bottom: 8px;
        }

        /* Treatment steps */
        .treatment-steps { display: flex; flex-direction: column; gap: 16px; margin-top: 8px; }
        .treatment-card {
            background: #f8fafc; border: 1px solid rgba(0,101,164,0.10);
            border-radius: 14px; padding: 18px 20px;
            transition: background 0.2s, border-color 0.2s;
        }
        .treatment-card:hover { background: var(--primary-light); border-color: rgba(0,101,164,0.22); }
        .treatment-card .tc-header {
            display: flex; align-items: center; gap: 10px; margin-bottom: 8px;
        }
        .tc-icon {
            width: 34px; height: 34px; border-radius: 10px;
            background: var(--primary); display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .tc-icon svg { color: #fff; }
        .tc-title { font-size: 14px; font-weight: 700; color: #0f1f2e; }
        .tc-body { font-size: 13.5px; color: #64748b; line-height: 1.7; font-weight: 300; }
        .tc-drugs {
            display: flex; flex-wrap: wrap; gap: 6px; margin-top: 10px;
        }
        .drug-pill {
            background: #fff; border: 1px solid rgba(0,101,164,0.18);
            color: var(--primary); font-size: 11.5px; font-weight: 700;
            padding: 3px 10px; border-radius: 20px;
        }

        /* Image card */
        .img-card {
            border-radius: 18px; overflow: hidden;
            box-shadow: 0 20px 56px rgba(0,0,0,0.10);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .img-card:hover { transform: translateY(-8px); box-shadow: 0 28px 70px rgba(0,0,0,0.15); }
        .img-card img {
            width: 100%; display: block;
            transition: transform 0.5s ease;
        }
        .img-card:hover img { transform: scale(1.04) translateY(0) !important; }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 900px) {
            .info-grid { grid-template-columns: 1fr; gap: 36px; }
            .info-grid.reverse { direction: ltr; }
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
                <li>
                    @if (Auth::check())
                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Dashboard</a>
                    @endif
                </li>
                <li>
                    @if (Auth::check())
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-daftar">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-daftar">Daftar</a>
                    @endif
                </li>
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
                <li>
                    @if (Auth::check())
                        <a href="{{ url('/dashboard') }}" class="block hover:text-red-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block hover:text-red-600">Dashboard</a>
                    @endif
                </li>
                <li><a href="{{ route('login') }}" class="block hover:text-red-600 transition">Login</a></li>
                <li><a href="{{ route('register') }}" class="block hover:text-red-600 transition">Daftar</a></li>
            </ul>
        </div>
    </nav>

    <!-- ── HERO ── -->
    <section class="page-hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-dots"></div>
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="10" height="10" fill="currentColor" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4"/></svg>
                Edukasi Kesehatan
            </div>
            <h1>Pusat Informasi<br>Tuberkulosis (TBC)</h1>
            <p>Dapatkan informasi lengkap seputar TBC — gejala, penyebab, pengobatan, dan pencegahan — dari sumber terpercaya PKU Bantul.</p>
        </div>
    </section>

    <!-- ── STICKY TAB NAV ── -->
    <div class="tab-nav" id="tabNav">
        <div class="tab-nav-inner">
            <a href="#deskripsi" class="tab-link active" data-section="deskripsi">
                <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M8 7v5M8 5.5V6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                Deskripsi
            </a>
            <a href="#penyebab" class="tab-link" data-section="penyebab">
                <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="2.5" stroke="currentColor" stroke-width="1.5"/><path d="M8 1v2M8 13v2M1 8h2M13 8h2M3.05 3.05l1.42 1.42M11.54 11.54l1.41 1.41M3.05 12.95l1.42-1.42M11.54 4.46l1.41-1.41" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                Penyebab
            </a>
            <a href="#gejala" class="tab-link" data-section="gejala">
                <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M8 2C5.24 2 3 4.24 3 7c0 2 1.1 3.72 2.73 4.61L5 14h6l-.73-2.39A5 5 0 0013 7c0-2.76-2.24-5-5-5z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
                Gejala
            </a>
            <a href="#pengobatan" class="tab-link" data-section="pengobatan">
                <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="2" y="6" width="12" height="8" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M5 6V4a3 3 0 016 0v2M8 9v3M6.5 10.5h3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                Pengobatan
            </a>
            <a href="#pencegahan" class="tab-link" data-section="pencegahan">
                <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M8 2l5 2.5v4c0 3-2 5.5-5 6.5C6 14 4 11.5 4 8.5v-4L8 2z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M6 8l1.5 1.5L10 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Pencegahan
            </a>
        </div>
    </div>

    <!-- ── CONTENT ── -->
    <div class="content-wrap">

        <!-- DESKRIPSI -->
        <section class="info-section" id="deskripsi">
            <div class="info-grid">
                <div class="img-card">
                    <img src="{{ asset('images/tbc-info.jpg') }}" alt="Ilustrasi Paru-Paru" />
                </div>
                <div>
                    <span class="section-tag">Deskripsi</span>
                    <h2 class="info-title">Apa Itu TBC?</h2>
                    <div class="info-body">
                        <p>
                            Tuberkulosis (TBC) adalah penyakit menular yang disebabkan oleh bakteri <em>Mycobacterium tuberculosis</em>
                            dan terutama menyerang paru-paru. Penyakit ini menyebar melalui udara saat penderita TBC aktif batuk, bersin, atau berbicara.
                        </p>
                        <p>
                            Gejala TBC biasanya berupa batuk lebih dari dua minggu, disertai dahak atau darah, penurunan berat badan drastis, demam ringan pada malam hari, keringat malam, dan rasa lelah berkepanjangan.
                        </p>
                        <p>
                            Meski tergolong serius, TBC <strong>bisa disembuhkan sepenuhnya</strong> dengan pengobatan yang tepat dan teratur selama minimal enam bulan. Pemerintah Indonesia menyediakan obat TBC secara gratis melalui program DOTS.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- PENYEBAB -->
        <section class="info-section" id="penyebab">
            <div class="info-grid reverse">
                <div class="img-card">
                    <img src="{{ asset('images/bakteri-tbc.jpg') }}" alt="Ilustrasi Bakteri TBC" />
                </div>
                <div>
                    <span class="section-tag">Penyebab</span>
                    <h2 class="info-title">Penyebab TBC</h2>
                    <ul class="info-list">
                        <li>
                            <span class="list-bullet">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <div>
                                <div style="font-size:13px;font-weight:700;color:#0f1f2e;margin-bottom:4px;">Infeksi Primer</div>
                                Terjadi saat bakteri pertama kali masuk ke tubuh melalui tetesan udara. Tubuh biasanya masih bisa menahan bakteri. Gejala sering tidak muncul atau hanya demam ringan dan batuk singkat.
                            </div>
                        </li>
                        <li>
                            <span class="list-bullet">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <div>
                                <div style="font-size:13px;font-weight:700;color:#0f1f2e;margin-bottom:4px;">Infeksi Laten</div>
                                Bakteri berada dalam tubuh tetapi tidak aktif. Tidak menimbulkan gejala dan tidak menular. Berpotensi aktif kembali jika sistem imun melemah. Sekitar 5–10% orang dengan TB laten berisiko berkembang menjadi aktif.
                            </div>
                        </li>
                        <li>
                            <span class="list-bullet">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <div>
                                <div style="font-size:13px;font-weight:700;color:#0f1f2e;margin-bottom:4px;">Infeksi Aktif</div>
                                Bakteri berkembang biak dan menyebabkan kerusakan jaringan. Sangat menular melalui udara dan menimbulkan gejala klinis. Membutuhkan pengobatan segera.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- GEJALA -->
        <section class="info-section" id="gejala">
            <div class="info-grid">
                <div class="img-card">
                    <img src="{{ asset('images/gejala-tbc.png') }}" alt="Gejala TBC" />
                </div>
                <div>
                    <span class="section-tag">Gejala</span>
                    <h2 class="info-title">Gejala TBC</h2>

                    <div style="margin-bottom:20px;">
                        <div class="list-category">TBC Paru (paling umum)</div>
                        <ul class="info-list">
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Batuk terus-menerus lebih dari 2 minggu, bisa berdahak atau berdarah
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Nyeri dada, sesak napas, demam berkepanjangan (terutama malam hari)
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Keringat malam berlebihan, lemas, hilang nafsu makan, berat badan turun drastis
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="list-category">TBC Ekstra-Paru</div>
                        <ul class="info-list">
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <div><strong>TBC Tulang:</strong> Nyeri dan pembengkakan tulang</div>
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <div><strong>TBC Otak (Meningitis TB):</strong> Sakit kepala berat, kejang, kebingungan</div>
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <div><strong>TBC Ginjal:</strong> Darah dalam urin, nyeri pinggang</div>
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <div><strong>TBC Kelenjar:</strong> Pembengkakan kelenjar getah bening, biasanya di leher</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- PENGOBATAN -->
        <section class="info-section" id="pengobatan">
            <div class="info-grid reverse">
                <div class="img-card">
                    <img src="{{ asset('images/obat-tbc.png') }}" alt="Obat TBC" />
                </div>
                <div>
                    <span class="section-tag">Pengobatan</span>
                    <h2 class="info-title">Pengobatan TBC</h2>
                    <div class="treatment-steps">

                        <div class="treatment-card">
                            <div class="tc-header">
                                <div class="tc-icon">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="6" width="12" height="8" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M5 6V4a3 3 0 016 0v2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </div>
                                <div class="tc-title">TBC Paru — Terapi Standar (6 bulan)</div>
                            </div>
                            <div class="tc-body">Fase Intensif (2 bln): 4 obat setiap hari untuk membunuh bakteri. Fase Lanjutan (4 bln): 2 obat utama untuk memastikan tuntas dan cegah kambuh.</div>
                            <div class="tc-drugs">
                                <span class="drug-pill">Isoniazid</span>
                                <span class="drug-pill">Rifampisin</span>
                                <span class="drug-pill">Pirazinamid</span>
                                <span class="drug-pill">Etambutol</span>
                            </div>
                        </div>

                        <div class="treatment-card">
                            <div class="tc-header">
                                <div class="tc-icon" style="background:#e53e3e;">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 2v12M3 7l5-5 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="tc-title">TBC Resisten Obat (TBC RO)</div>
                            </div>
                            <div class="tc-body">Terjadi jika bakteri kebal terhadap obat standar. Pengobatan lebih lama (9–24 bulan) dengan obat yang lebih kuat.</div>
                            <div class="tc-drugs">
                                <span class="drug-pill">Bedaquiline</span>
                                <span class="drug-pill">Linezolid</span>
                                <span class="drug-pill">Levofloxacin</span>
                            </div>
                        </div>

                        <div class="treatment-card">
                            <div class="tc-header">
                                <div class="tc-icon" style="background:#22c55e;">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M5 8l2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="tc-title">TBC Laten</div>
                            </div>
                            <div class="tc-body">Bagi yang terinfeksi laten tanpa gejala, diberikan pengobatan pencegahan selama 3–9 bulan, terutama bagi penderita HIV atau imun lemah.</div>
                            <div class="tc-drugs">
                                <span class="drug-pill">Isoniazid</span>
                                <span class="drug-pill">Rifampisin</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- PENCEGAHAN -->
        <section class="info-section" id="pencegahan">
            <div class="info-grid">
                <div class="img-card">
                    <img src="{{ asset('images/pencegahan-tbc.jpg') }}" alt="Pencegahan TBC" />
                </div>
                <div>
                    <span class="section-tag">Pencegahan</span>
                    <h2 class="info-title">Pencegahan TBC</h2>

                    <div style="margin-bottom:20px;">
                        <div class="list-category">Vaksinasi BCG</div>
                        <ul class="info-list">
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Diberikan pada bayi untuk memberikan perlindungan terhadap TBC berat seperti meningitis tuberkulosis
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Tidak sepenuhnya melindungi dari TBC paru pada orang dewasa, tetapi tetap dianjurkan
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="list-category">Pencegahan Penularan</div>
                        <ul class="info-list">
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Menggunakan masker bagi penderita TBC aktif di lingkungan umum
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Menjaga ventilasi ruangan agar sirkulasi udara tetap baik
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Menutup mulut saat batuk atau bersin dengan tisu atau siku bagian dalam
                            </li>
                            <li>
                                <span class="list-bullet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M4 6l1.5 1.5L8 4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                Menjalani pengobatan hingga tuntas untuk mencegah penyebaran dan resistensi obat
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

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
        /* Mobile menu */
        document.getElementById("menuBtn").addEventListener("click", () => {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        });

        /* Active tab highlight on scroll */
        const sections = document.querySelectorAll('.info-section');
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabNavHeight = document.getElementById('tabNav').offsetHeight;
        const mainNavHeight = document.querySelector('nav.main-nav').offsetHeight;

        function updateActiveTab() {
            let current = '';
            sections.forEach(s => {
                const top = s.getBoundingClientRect().top;
                if (top <= mainNavHeight + tabNavHeight + 40) current = s.id;
            });
            tabLinks.forEach(link => {
                link.classList.toggle('active', link.dataset.section === current);
            });
        }

        window.addEventListener('scroll', updateActiveTab, { passive: true });
        updateActiveTab();

        /* Smooth scroll offset for sticky headers */
        tabLinks.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const target = document.getElementById(link.dataset.section);
                if (!target) return;
                const offset = mainNavHeight + tabNavHeight + 20;
                window.scrollTo({ top: target.offsetTop - offset, behavior: 'smooth' });
            });
        });
    </script>

</body>
</html>