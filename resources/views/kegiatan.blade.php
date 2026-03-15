<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PKU Bantul - Kegiatan</title>
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

        * { box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }

        body { background: #f4f8fc; color: #0f1f2e; margin: 0; }

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

        /* ── PAGE HERO ── */
        .page-hero {
            background: linear-gradient(160deg, #0f172a 0%, #0a2540 55%, #0065A4 100%);
            padding: 72px 24px 80px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.055) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }
        .page-hero::after {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,129,204,0.20), transparent 70%);
            pointer-events: none;
        }

        .page-hero-inner { position: relative; z-index: 2; max-width: 640px; margin: 0 auto; }

        .page-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(229,62,62,0.15);
            border: 1px solid rgba(229,62,62,0.35);
            color: #fc8181;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 16px;
            border-radius: 50px;
            margin-bottom: 18px;
        }

        .page-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            margin: 0 0 16px;
        }

        .page-hero p {
            font-size: 16px;
            color: rgba(255,255,255,0.65);
            line-height: 1.75;
            font-weight: 300;
            margin: 0;
        }

        /* ── FILTER BAR ── */
        .filter-bar {
            background: #fff;
            border-bottom: 1px solid rgba(0,101,164,0.08);
            padding: 0 24px;
            position: sticky;
            top: 65px;
            z-index: 40;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }

        .filter-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 12px 0;
            flex-wrap: wrap;
        }

        .filter-tabs {
            display: flex;
            gap: 4px;
        }

        .filter-tab {
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            padding: 6px 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            background: transparent;
        }
        .filter-tab:hover { color: var(--primary); background: var(--primary-light); }
        .filter-tab.active { background: var(--primary); color: #fff; }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f4f8fc;
            border: 1px solid rgba(0,101,164,0.15);
            border-radius: 24px;
            padding: 6px 16px;
        }

        .search-box input {
            border: none;
            background: transparent;
            font-size: 13px;
            color: #0f1f2e;
            outline: none;
            width: 200px;
        }

        .search-box input::placeholder { color: #94a3b8; }

        /* ── CARDS SECTION ── */
        .cards-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 56px 24px 80px;
        }

        .section-label {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 36px;
        }

        .section-label span {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--primary);
        }

        .section-label::before, .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(0,101,164,0.12);
        }
        .section-label::before { max-width: 0; flex: 0; }

        /* Featured card (first) */
        .featured-card {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 0;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 8px 40px rgba(0,0,0,0.07);
            margin-bottom: 40px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .featured-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 56px rgba(0,0,0,0.12);
        }

        .featured-img {
            position: relative;
            overflow: hidden;
            min-height: 340px;
        }
        .featured-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }
        .featured-card:hover .featured-img img { transform: scale(1.05) translateY(0px) !important; }

        .featured-img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, transparent 60%, rgba(255,255,255,0.05));
        }

        .featured-featured-badge {
            position: absolute;
            top: 20px; left: 20px;
            background: var(--accent);
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 20px;
        }

        .featured-body {
            padding: 44px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-date {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 14px;
        }

        .card-date svg { opacity: 0.7; }

        .featured-body h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.55rem;
            font-weight: 700;
            color: #0f1f2e;
            line-height: 1.35;
            margin: 0 0 16px;
        }

        .featured-body p {
            font-size: 14.5px;
            color: #4a6582;
            line-height: 1.75;
            font-weight: 300;
            margin: 0 0 28px;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 22px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.2s;
            align-self: flex-start;
        }
        .read-more:hover {
            background: var(--primary-dark);
            transform: translateX(3px);
        }
        .read-more svg { transition: transform 0.2s; }
        .read-more:hover svg { transform: translateX(4px); }

        /* Grid cards */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 28px;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(0,101,164,0.08);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.11);
        }

        .card-img {
            position: relative;
            overflow: hidden;
            height: 210px;
        }
        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }
        .card:hover .card-img img { transform: scale(1.06) translateY(0px) !important; }

        .card-category {
            position: absolute;
            bottom: 14px; left: 14px;
            background: rgba(0,75,107,0.85);
            backdrop-filter: blur(6px);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .card-body {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-body h3 {
            font-size: 15px;
            font-weight: 700;
            color: #0f1f2e;
            line-height: 1.45;
            margin: 0 0 10px;
            flex: 1;
        }

        .card-body p {
            font-size: 13.5px;
            color: #4a6582;
            line-height: 1.65;
            font-weight: 300;
            margin: 0 0 20px;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 16px;
            border-top: 1px solid #f0f4f8;
        }

        .card-footer .date-tag {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 500;
        }

        .card-footer a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-weight: 700;
            color: var(--accent);
            text-decoration: none;
            transition: gap 0.2s;
        }
        .card-footer a:hover { gap: 10px; }

        /* ── PAGINATION ── */
        .pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 56px;
        }

        .page-btn {
            width: 38px; height: 38px;
            border-radius: 50%;
            border: 1px solid rgba(0,101,164,0.2);
            background: #fff;
            color: var(--primary);
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .page-btn:hover, .page-btn.active {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
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
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.6s ease forwards; }
        .d1 { animation-delay: 0.05s; opacity: 0; }
        .d2 { animation-delay: 0.12s; opacity: 0; }
        .d3 { animation-delay: 0.19s; opacity: 0; }
        .d4 { animation-delay: 0.26s; opacity: 0; }
        .d5 { animation-delay: 0.33s; opacity: 0; }
        .d6 { animation-delay: 0.40s; opacity: 0; }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .featured-card { grid-template-columns: 1fr; }
            .featured-img { min-height: 240px; }
            .featured-body { padding: 28px 24px; }
            .featured-body h2 { font-size: 1.25rem; }
            .cards-grid { grid-template-columns: 1fr; }
            .filter-tabs { overflow-x: auto; padding-bottom: 4px; }
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

    <!-- ── PAGE HERO ── -->
    <section class="page-hero">
        <div class="page-hero-inner">
            <div class="page-badge">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="4"/></svg>
                Program &amp; Kegiatan
            </div>
            <h1>Kegiatan Penanggulangan<br>Tuberkulosis</h1>
            <p>Berbagai program dan inisiatif nyata dalam upaya bersama menuju eliminasi TBC di Indonesia pada 2030.</p>
        </div>
    </section>


    <!-- ── CARDS ── -->
    <div class="cards-section">

        <!-- Section label -->
        <div class="section-label">
            <span>Kegiatan Terbaru</span>
        </div>

        <!-- Featured card (Kartu 1) -->
        <div class="featured-card fade-up d1">
            <div class="featured-img">
                <img src="images/imgkegiatan1.png" alt="TBC Sedunia" />
                <div class="featured-img-overlay"></div>
                <span class="featured-featured-badge">Unggulan</span>
            </div>
            <div class="featured-body">
                <div class="card-date">
                    <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><rect x="1" y="3" width="14" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M1 7h14M5 1v4M11 1v4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    24 Maret 2025
                </div>
                <h2>Semarakkan Hari TBC Sedunia 2025 melalui Gerakan Indonesia Akhiri Tuberkulosis (GIATKAN)</h2>
                <p>Pada tanggal 24 Maret 1882, Dr. Robert Koch mengumumkan penemuan bakteri penyebab TBC. Kini, 143 tahun kemudian, Indonesia bergerak bersama untuk mengakhiri epidemi ini dengan komitmen dan aksi nyata dari seluruh lapisan masyarakat.</p>
                <a href="#" class="read-more">
                    Baca Selengkapnya
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </div>

        <!-- Grid: kartu 2–6 -->
        <div class="cards-grid">

            <!-- Kartu 2 -->
            <div class="card fade-up d1">
                <div class="card-img">
                    <img src="images/imgkegiatan2.png" alt="BERNAPAS" />
                    <span class="card-category">Kampanye</span>
                </div>
                <div class="card-body">
                    <h3>BERNAPAS di 3 Kota: Surabaya, Malang dan Semarang</h3>
                    <p>Indonesia memiliki cita-cita besar menuju eliminasi TBC pada 2030. Melalui kampanye BERNAPAS, kesadaran masyarakat di berbagai kota terus ditingkatkan.</p>
                    <div class="card-footer">
                        <span class="date-tag">11 Juni 2025</span>
                        <a href="#">
                            Selengkapnya
                            <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kartu 3 -->
            <div class="card fade-up d2">
                <div class="card-img">
                    <img src="images/imgkegiatan3.png" alt="Flashmob" />
                    <span class="card-category">Kampanye</span>
                </div>
                <div class="card-body">
                    <h3>Ayo Ikuti Lomba Flashmob Jingle #SembuhLebihCepat dan Bantu Eliminasi TBC!</h3>
                    <p>Untuk menyambut Hari Tuberkulosis Sedunia, KNCV Indonesia dan Stop TB Partnership menggelar lomba flashmob jingle berhadiah menarik.</p>
                    <div class="card-footer">
                        <span class="date-tag">9 Februari 2025</span>
                        <a href="#">
                            Selengkapnya
                            <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kartu 4 -->
            <div class="card fade-up d3">
                <div class="card-img">
                    <img src="images/imgkegiatan4.png" alt="Workshop MESO" />
                    <span class="card-category">Workshop</span>
                </div>
                <div class="card-body">
                    <h3>Workshop MESO Aktif bagi Tenaga Kesehatan di Fasilitas Pelayanan Kesehatan</h3>
                    <p>Kementerian Kesehatan RI bersama KNCV Indonesia menyelenggarakan workshop untuk meningkatkan kapasitas tenaga kesehatan dalam pengawasan efek samping obat TBC.</p>
                    <div class="card-footer">
                        <span class="date-tag">27 Januari 2025</span>
                        <a href="#">
                            Selengkapnya
                            <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kartu 5 -->
            <div class="card fade-up d4">
                <div class="card-img">
                    <img src="images/imgkegiatan5.png" alt="ASCENT DR-TB" />
                    <span class="card-category">Program</span>
                </div>
                <div class="card-body">
                    <h3>ASCENT DR-TB Mendukung Peningkatan Kualitas Program TBC RO di Indonesia</h3>
                    <p>Kegiatan ASCENT DR-TB merupakan bagian dari kerja sama internasional untuk meningkatkan pengelolaan TBC resistan obat secara komprehensif.</p>
                    <div class="card-footer">
                        <span class="date-tag">19 April 2025</span>
                        <a href="#">
                            Selengkapnya
                            <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kartu 6 -->
            <div class="card fade-up d5">
                <div class="card-img">
                    <img src="images/imgkegiatan6.png" alt="TPT" />
                    <span class="card-category">Pencegahan</span>
                </div>
                <div class="card-body">
                    <h3>TPT (Terapi Pencegahan Tuberkulosis)</h3>
                    <p>TPT adalah upaya mencegah orang yang memiliki infeksi TB laten agar tidak berkembang menjadi TB aktif. Program ini menjadi garis terdepan pencegahan penyebaran TBC.</p>
                    <div class="card-footer">
                        <span class="date-tag">31 Agustus 2025</span>
                        <a href="#">
                            Selengkapnya
                            <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

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
        /* Mobile menu */
        document.getElementById("menuBtn").addEventListener("click", () => {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        });

        /* Filter tabs */
        document.querySelectorAll(".filter-tab").forEach(btn => {
            btn.addEventListener("click", () => {
                document.querySelectorAll(".filter-tab").forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
            });
        });
    </script>

</body>
</html>