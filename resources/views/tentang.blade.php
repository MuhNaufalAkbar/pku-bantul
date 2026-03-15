<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PKU Bantul - Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0065A4;
            --primary-dark: #004b6b;
            --primary-light: #e8f4fd;
            --accent: #E8A020;
            --text-dark: #0f1f2e;
            --text-mid: #3a5068;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background: #f7f9fc;
            margin: 0;
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
            background: #e53e3e;
            border-radius: 2px;
            transition: width 0.25s ease;
        }
        .nav-link:hover { color: #e53e3e; }
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

        /* ── HERO ── */
        .hero {
            background: linear-gradient(135deg, #0f2535 0%, #0a3d5c 50%, #0065A4 100%);
            position: relative;
            overflow: hidden;
            min-height: 88vh;
            display: flex;
            align-items: center;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: rgba(232,160,32,0.08);
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -80px;
            width: 350px; height: 350px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
            pointer-events: none;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 24px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.4rem, 5vw, 3.8rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.15;
            margin: 0 0 20px;
        }

        .hero-text h1 span { color: var(--accent); }

        .hero-text p {
            font-size: 17px;
            color: rgba(255,255,255,0.75);
            line-height: 1.75;
            margin: 0 0 36px;
            font-weight: 300;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(232,160,32,0.15);
            border: 1px solid rgba(232,160,32,0.4);
            color: var(--accent);
            font-size: 13px;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 20px;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }

        .hero-stats {
            display: flex;
            gap: 32px;
            margin-top: 32px;
        }

        .stat-item {
            text-align: left;
        }

        .stat-item .num {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
        }

        .stat-item .label {
            font-size: 12px;
            color: rgba(255,255,255,0.55);
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .hero-image-wrap {
            position: relative;
        }

        .hero-image-wrap::before {
            content: '';
            position: absolute;
            inset: -12px -12px 12px 12px;
            border: 2px solid rgba(232,160,32,0.35);
            border-radius: 20px;
            z-index: 0;
        }

        .hero-image-wrap img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: 16px;
            position: relative;
            z-index: 1;
            display: block;
            transition: transform 0.4s ease;
        }

        .hero-image-wrap img:hover { transform: translateY(-6px) !important; }

        /* ── SECTION BASE ── */
        .section-tag {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--primary);
            background: var(--primary-light);
            padding: 4px 14px;
            border-radius: 20px;
            margin-bottom: 12px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 3vw, 2.6rem);
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.25;
            margin: 0 0 12px;
        }

        .section-sub {
            font-size: 16px;
            color: var(--text-mid);
            line-height: 1.7;
            font-weight: 300;
        }

        /* ── SEJARAH ── */
        .sejarah-section {
            background: #fff;
            padding: 100px 24px;
        }

        .sejarah-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: start;
        }

        .sejarah-img {
            position: sticky;
            top: 100px;
        }

        .sejarah-img img {
            width: 100%;
            border-radius: 16px;
            display: block;
        }

        .img-caption {
            background: var(--primary);
            color: #fff;
            text-align: center;
            padding: 16px 24px;
            border-radius: 0 0 16px 16px;
            font-size: 14px;
            font-weight: 500;
        }

        /* Timeline */
        .timeline { margin-top: 40px; position: relative; }

        .timeline::before {
            content: '';
            position: absolute;
            left: 22px; top: 0; bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary), rgba(0,101,164,0.1));
        }

        .tl-item {
            display: flex;
            gap: 20px;
            margin-bottom: 36px;
            position: relative;
        }

        .tl-dot {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            z-index: 1;
            box-shadow: 0 0 0 6px rgba(0,101,164,0.12);
        }

        .tl-dot svg { width: 20px; height: 20px; fill: #fff; }

        .tl-body {
            background: #f7f9fc;
            border: 1px solid rgba(0,101,164,0.1);
            border-radius: 12px;
            padding: 18px 22px;
            flex: 1;
            transition: all 0.25s;
        }

        .tl-body:hover {
            background: var(--primary-light);
            border-color: rgba(0,101,164,0.25);
            transform: translateX(4px);
        }

        .tl-year {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--primary);
            margin-bottom: 4px;
        }

        .tl-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .tl-desc {
            font-size: 13.5px;
            color: var(--text-mid);
            line-height: 1.65;
        }

        /* ── FOTO GALLERY ── */
        .gallery-section {
            background: var(--primary);
            padding: 80px 24px;
            position: relative;
            overflow: hidden;
        }

        .gallery-section::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }

        .gallery-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .gallery-header .section-tag {
            background: rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.9);
        }

        .gallery-header .section-title { color: #fff; }

        .gallery-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap: 16px;
        }

        .gallery-item {
            border-radius: 14px;
            overflow: hidden;
            position: relative;
        }

        .gallery-item img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .gallery-item:hover img { transform: scale(1.05) translateY(0px) !important; }

        .gallery-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,75,107,0.5), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .gallery-item:hover::after { opacity: 1; }

        /* ── VISI MISI ── */
        .vismis-section {
            background: #f7f9fc;
            padding: 100px 24px;
        }

        .vismis-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .vismis-header {
            text-align: center;
            margin-bottom: 64px;
        }

        .vismis-grid {
            display: grid;
            grid-template-columns: 1fr 1.6fr;
            gap: 32px;
            align-items: start;
        }

        /* Visi Card */
        .visi-card {
            background: linear-gradient(145deg, #0065A4, #004b6b);
            border-radius: 20px;
            padding: 40px 36px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .visi-card::before {
            content: '"';
            position: absolute;
            top: -20px; left: 20px;
            font-family: 'Playfair Display', serif;
            font-size: 180px;
            color: rgba(255,255,255,0.06);
            line-height: 1;
            pointer-events: none;
        }

        .visi-card .label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--accent);
            margin-bottom: 16px;
        }

        .visi-card p {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 400;
            line-height: 1.6;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        /* Misi Card */
        .misi-card {
            background: #fff;
            border: 1px solid rgba(0,101,164,0.1);
            border-radius: 20px;
            padding: 40px 36px;
        }

        .misi-card .label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--primary);
            margin-bottom: 24px;
        }

        .misi-list { list-style: none; padding: 0; margin: 0; }

        .misi-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 14px 0;
            border-bottom: 1px solid #f0f3f7;
            font-size: 15px;
            color: var(--text-mid);
            line-height: 1.55;
        }

        .misi-list li:last-child { border-bottom: none; }

        .misi-num {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
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

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .fade-up { animation: fadeUp 0.8s ease-out forwards; }
        .fade-up-1 { animation-delay: 0.1s; opacity: 0; }
        .fade-up-2 { animation-delay: 0.25s; opacity: 0; }
        .fade-up-3 { animation-delay: 0.4s; opacity: 0; }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .hero-content, .sejarah-inner, .vismis-grid, .gallery-grid { grid-template-columns: 1fr; }
            .hero-stats { gap: 20px; }
            .gallery-item img { height: 200px; }
            .footer-top { grid-template-columns: 1fr; }
            .sejarah-img { position: static; }
            .timeline::before { left: 18px; }
        }

        @media (max-width: 600px) {
            .nav-links { display: none; }
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
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <div class="hero-badge fade-up fade-up-1">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.5"/><path d="M6 3v3l2 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    Sejak 1966 · Bantul, Yogyakarta
                </div>
                <h1 class="fade-up fade-up-2">Tentang <span>PKU Bantul</span></h1>
                <p class="fade-up fade-up-2">Rumah Sakit Islam terdepan yang melayani masyarakat Bantul dengan penuh ketulusan dan profesionalisme, berawal dari sebuah klinik kecil hingga menjadi kebanggaan umat.</p>
                <div class="hero-stats fade-up fade-up-3">
                    <div class="stat-item">
                        <div class="num">58+</div>
                        <div class="label">Tahun Melayani</div>
                    </div>
                    <div class="stat-item" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;">
                        <div class="num">4</div>
                        <div class="label">Fase Perkembangan</div>
                    </div>
                    <div class="stat-item" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;">
                        <div class="num">24/7</div>
                        <div class="label">Siap Melayani</div>
                    </div>
                </div>
            </div>
            <div class="hero-image-wrap fade-up fade-up-3">
                <img src="images/fotopku.jpg" alt="RS PKU Muhammadiyah Bantul" />
            </div>
        </div>
    </section>

    <!-- ── SEJARAH ── -->
    <section class="sejarah-section">
        <div class="sejarah-inner">
            <!-- Kiri: Gambar -->
            <div class="sejarah-img">
                <div style="border-radius:16px;overflow:hidden;box-shadow:0 24px 60px rgba(0,0,0,0.12);">
                    <img src="images/tentangpku.png" alt="Sejarah PKU Bantul" />
                    <div class="img-caption">Berawal dari Klinik Ibu dan Anak</div>
                </div>
                <!-- Floating card -->
                <div style="margin-top:24px;background:var(--primary-light);border:1px solid rgba(0,101,164,0.18);border-radius:14px;padding:20px 24px;display:flex;gap:16px;align-items:center;">
                    <div style="width:50px;height:50px;background:var(--primary);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M19 21H5a2 2 0 01-2-2V7l7-4 7 4v12a2 2 0 01-2 2z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 21V12h6v9" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/></svg>
                    </div>
                    <div>
                        <div style="font-size:13px;font-weight:600;color:var(--text-dark);">RS Umum PKU Muhammadiyah Bantul</div>
                        <div style="font-size:12px;color:var(--text-mid);">Beroperasi sejak 2001 hingga sekarang</div>
                    </div>
                </div>
            </div>

            <!-- Kanan: Timeline -->
            <div>
                <span class="section-tag">Sejarah Kami</span>
                <h2 class="section-title">Perjalanan Panjang<br>Penuh Dedikasi</h2>
                <p class="section-sub">Dari klinik sederhana di tahun 1966, PKU Bantul terus bertumbuh menjadi rumah sakit umum yang melayani ribuan pasien setiap tahunnya.</p>

                <div class="timeline">

                    <div class="tl-item">
                        <div class="tl-dot">
                            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14l-4-4 1.41-1.41L11 13.17l6.59-6.59L19 8l-8 8z"/></svg>
                        </div>
                        <div class="tl-body">
                            <div class="tl-year">1966</div>
                            <div class="tl-title">Klinik dan Rumah Bersalin</div>
                            <div class="tl-desc">Pada 1 Maret 1966 (09 Dzulqo'dah 1385) berdirilah Klinik dan Rumah Bersalin PKU Muhammadiyah Bantul, titik awal pelayanan kesehatan bagi masyarakat Bantul.</div>
                        </div>
                    </div>

                    <div class="tl-item">
                        <div class="tl-dot">
                            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14l-4-4 1.41-1.41L11 13.17l6.59-6.59L19 8l-8 8z"/></svg>
                        </div>
                        <div class="tl-body">
                            <div class="tl-year">1984</div>
                            <div class="tl-title">Layanan Tumbuh Kembang Anak</div>
                            <div class="tl-desc">Perkembangan pesat ditandai dengan hadirnya pelayanan kesehatan anak, baik untuk penyembuhan maupun pemantauan tumbuh kembang.</div>
                        </div>
                    </div>

                    <div class="tl-item">
                        <div class="tl-dot">
                            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14l-4-4 1.41-1.41L11 13.17l6.59-6.59L19 8l-8 8z"/></svg>
                        </div>
                        <div class="tl-body">
                            <div class="tl-year">1995</div>
                            <div class="tl-title">Rumah Sakit Khusus Ibu dan Anak</div>
                            <div class="tl-desc">Berdasarkan SK Kanwil Depkes DIY No. 503/1009/PK/IV/1995, resmi bertransformasi menjadi Rumah Sakit Khusus Ibu dan Anak PKU Muhammadiyah Bantul.</div>
                        </div>
                    </div>

                    <div class="tl-item">
                        <div class="tl-dot" style="background:var(--accent);">
                            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14l-4-4 1.41-1.41L11 13.17l6.59-6.59L19 8l-8 8z"/></svg>
                        </div>
                        <div class="tl-body" style="border-color:rgba(232,160,32,0.3);">
                            <div class="tl-year" style="color:var(--accent);">2001 · Saat Ini</div>
                            <div class="tl-title">Rumah Sakit Umum</div>
                            <div class="tl-desc">Menjadi RS Umum PKU Muhammadiyah Bantul sesuai izin operasional Dinas Kesehatan No. 445/4318/2001 — melayani seluruh kebutuhan kesehatan masyarakat.</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ── GALERI ── -->
    <section class="gallery-section">
        <div class="gallery-inner">
            <div class="gallery-header">
                <span class="section-tag">Galeri</span>
                <h2 class="section-title">Fasilitas & Kegiatan</h2>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item" style="grid-row: span 1;">
                    <img src="images/imagetentang1.png" alt="Fasilitas PKU 1" style="height:300px;" />
                </div>
                <div class="gallery-item">
                    <img src="images/imagetentang2.png" alt="Fasilitas PKU 2" />
                </div>
                <div class="gallery-item">
                    <img src="images/imagetentang3.png" alt="Fasilitas PKU 3" />
                </div>
            </div>
        </div>
    </section>

    <!-- ── VISI MISI ── -->
    <section class="vismis-section">
        <div class="vismis-inner">
            <div class="vismis-header">
                <span class="section-tag">Arah & Tujuan</span>
                <h2 class="section-title">Visi & Misi</h2>
                <p class="section-sub" style="max-width:520px;margin:0 auto;">Panduan kami dalam memberikan pelayanan kesehatan yang berkualitas dan berlandaskan nilai-nilai Islam.</p>
            </div>
            <div class="vismis-grid">

                <!-- Visi -->
                <div class="visi-card">
                    <div class="label">Visi Kami</div>
                    <p>Menjadi Rumah Sakit Islam yang mempunyai keunggulan kompetitif global dan menjadi kebanggaan umat.</p>
                    <div style="margin-top:32px;display:flex;align-items:center;gap:10px;">
                        <div style="width:36px;height:2px;background:var(--accent);border-radius:2px;"></div>
                        <span style="font-size:12px;color:rgba(255,255,255,0.5);letter-spacing:1px;text-transform:uppercase;">PKU Bantul</span>
                    </div>
                </div>

                <!-- Misi -->
                <div class="misi-card">
                    <div class="label">Misi Kami</div>
                    <ul class="misi-list">
                        <li>
                            <span class="misi-num">1</span>
                            Berdakwah melalui pelayanan kesehatan yang tulus dan profesional
                        </li>
                        <li>
                            <span class="misi-num">2</span>
                            Menyelenggarakan pelayanan kesehatan yang berkualitas tinggi
                        </li>
                        <li>
                            <span class="misi-num">3</span>
                            Memberikan pelayanan yang peduli pada kaum dhuafa
                        </li>
                        <li>
                            <span class="misi-num">4</span>
                            Menjalin kerja sama organisasi dan klinik yang baik
                        </li>
                        <li>
                            <span class="misi-num">5</span>
                            Menyelenggarakan pendidikan dan pelatihan secara profesional
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

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
                        <a href="#" class="social-icon"><img src="images/logo_facebook.png"  alt="Facebook"  class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="images/logo_instagram.png" alt="Instagram" class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="images/logo_whatsapp.png"  alt="WhatsApp"  class="w-5 h-5 object-contain"></a>
                        <a href="#" class="social-icon"><img src="images/logo_youtube.png"   alt="YouTube"   class="w-5 h-5 object-contain"></a>
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