<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PKU Bantul - Beranda</title>
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
        body { background: #f4f8fc; color: #0f1f2e; }

        /* ── NAV ── */
        nav.main-nav {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(14px);
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
        .nav-link.active { color: var(--primary); }
        .nav-link.active::after { width: 100%; background: var(--primary); }

        .btn-daftar {
            display: inline-flex; align-items: center; gap: 6px;
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            color: #fff; font-weight: 700; padding: 0.45rem 1.35rem;
            border-radius: 50px; transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(0,101,164,0.30); text-decoration: none;
            font-size: 0.95rem;
        }
        .btn-daftar:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,101,164,0.40); }

        #mobileMenu { border-top: 1px solid rgba(0,101,164,0.1); }

        /* ── HERO CAROUSEL ── */
        .hero-section {
            background: linear-gradient(160deg, #0f172a 0%, #0a2540 60%, #0065A4 100%);
            padding: 2.5rem 0 2.5rem;
            position: relative; overflow: hidden;
        }
        .hero-section::before {
            content: ''; position: absolute; inset: 0;
            background: radial-gradient(ellipse at 70% 50%, rgba(0,129,204,0.18) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-section::after {
            content: ''; position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 28px 28px; pointer-events: none;
        }

        .carousel-wrapper {
            border-radius: 16px; overflow: hidden;
            box-shadow: 0 24px 64px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.08);
        }

        #carousel-inner img { transition: transform 0.4s ease; }
        #carousel-inner img:hover { transform: scale(1.02) translateY(0) !important; }

        .carousel-btn {
            position: absolute; top: 50%; z-index: 10;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.12); backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.2); color: #fff;
            border-radius: 50%; width: 40px; height: 40px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; transition: background 0.2s, transform 0.2s; cursor: pointer;
        }
        .carousel-btn:hover { background: rgba(255,255,255,0.25); transform: translateY(-50%) scale(1.1); }
        #prevBtn { left: 12px; }
        #nextBtn { right: 12px; }

        .slide-dots { display: flex; gap: 6px; justify-content: center; margin-top: 16px; position: relative; z-index: 2; }
        .slide-dot {
            width: 8px; height: 8px; border-radius: 50%;
            background: rgba(255,255,255,0.3); transition: all 0.3s; cursor: pointer;
        }
        .slide-dot.active { background: #fff; width: 22px; border-radius: 4px; }

        /* ── CONTENT SECTIONS ── */
        .content-section { padding: 88px 24px; }
        .content-section.alt { background: #fff; }
        .content-section.plain { background: #f4f8fc; }

        .section-inner {
            max-width: 1100px; margin: 0 auto;
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 72px; align-items: center;
        }
        .section-inner.reverse { direction: rtl; }
        .section-inner.reverse > * { direction: ltr; }

        .section-tag {
            display: inline-block; font-size: 11px; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            color: var(--primary); background: var(--primary-light);
            padding: 4px 14px; border-radius: 20px; margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.7rem, 3vw, 2.3rem);
            font-weight: 700; color: #0f1f2e;
            line-height: 1.25; margin-bottom: 16px;
        }

        .section-body {
            font-size: 15.5px; color: #4a6582;
            line-height: 1.8; font-weight: 300; margin-bottom: 32px;
        }
        .section-body em { font-style: italic; color: #1e3a5f; }

        .btn-cta {
            display: inline-flex; align-items: center; gap: 8px;
            background: linear-gradient(135deg, var(--accent) 0%, #c53030 100%);
            color: #fff; font-weight: 700; padding: 11px 26px;
            border-radius: 50px; text-decoration: none;
            box-shadow: 0 6px 20px rgba(229,62,62,0.30);
            transition: transform 0.2s, box-shadow 0.2s; font-size: 14px;
        }
        .btn-cta:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(229,62,62,0.40); }
        .btn-cta svg { transition: transform 0.2s; }
        .btn-cta:hover svg { transform: translateX(4px); }

        /* Image card */
        .img-card {
            border-radius: 20px; overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.10);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .img-card:hover { transform: translateY(-8px); box-shadow: 0 28px 70px rgba(0,0,0,0.15); }
        .img-card img { width: 100%; display: block; transition: transform 0.5s ease; }
        .img-card:hover img { transform: scale(1.04) translateY(0) !important; }

        /* Stat chips for TBC section */
        .stat-chips { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 28px; }
        .stat-chip {
            display: flex; align-items: center; gap: 8px;
            background: #fff; border: 1px solid rgba(0,101,164,0.12);
            border-radius: 12px; padding: 10px 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .chip-icon { width: 32px; height: 32px; border-radius: 8px; background: var(--primary-light); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .chip-label { font-size: 12px; color: #64748b; }
        .chip-val { font-size: 14px; font-weight: 700; color: #0f1f2e; }

        /* ── FOOTER ── */
        footer .footer-main { background: linear-gradient(135deg, #005a94 0%, var(--primary) 50%, #0074bb 100%); }
        footer .footer-bottom { background: var(--primary-dark); }
        .footer-heading { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.75rem; }
        .social-icon { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.2s; }
        .social-icon:hover { background: rgba(255,255,255,0.25); transform: translateY(-3px); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fadeup { animation: fadeUp 0.7s ease forwards; }
        .delay-100 { animation-delay: 0.1s; opacity: 0; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; }

        @media (max-width: 900px) {
            .section-inner { grid-template-columns: 1fr; gap: 36px; }
            .section-inner.reverse { direction: ltr; }
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
                <li><a href="{{ url('/') }}" class="nav-link active">Beranda</a></li>
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

    <!-- ── HERO CAROUSEL ── -->
    <section class="hero-section">
        <div style="position:relative; max-width:860px; margin:0 auto; padding:0 16px;">
            <div class="carousel-wrapper">
                <div id="carousel-inner" class="flex transition-transform duration-700">
                    <img src="{{ asset('images/slide1.png') }}"       alt="Slide 1" class="w-[500px] flex-shrink-0 object-contain" />
                    <img src="{{ asset('images/hp1.jpg') }}"          alt="Slide 2" class="w-[500px] flex-shrink-0 object-contain" />
                    <img src="{{ asset('images/pameran-pku.jpg') }}"  alt="Slide 3" class="w-[500px] flex-shrink-0 object-contain" />
                    <img src="{{ asset('images/slide4.png') }}"       alt="Slide 4" class="w-[500px] flex-shrink-0 object-contain" />
                    <img src="{{ asset('images/slide1.png') }}"       alt="Clone"   class="w-[500px] flex-shrink-0 object-contain" />
                </div>
            </div>
            <button id="prevBtn" class="carousel-btn">‹</button>
            <button id="nextBtn" class="carousel-btn">›</button>
        </div>

        <div class="slide-dots" id="slideDots">
            <span class="slide-dot active" data-index="0"></span>
            <span class="slide-dot" data-index="1"></span>
            <span class="slide-dot" data-index="2"></span>
            <span class="slide-dot" data-index="3"></span>
        </div>
    </section>

    <!-- ── TBC INFO SECTION ── -->
    <section class="content-section plain">
        <div class="section-inner animate-fadeup delay-100">
            <!-- Text -->
            <div>
                <span class="section-tag">Info Kesehatan</span>
                <h2 class="section-title">Apa itu<br>Tuberkulosis (TBC)?</h2>

                <div class="stat-chips">
                    <div class="stat-chip">
                        <div class="chip-icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 1v14M1 8h14" stroke="#0065A4" stroke-width="1.8" stroke-linecap="round"/></svg>
                        </div>
                        <div>
                            <div class="chip-label">Penularan</div>
                            <div class="chip-val">Melalui Udara</div>
                        </div>
                    </div>
                    <div class="stat-chip">
                        <div class="chip-icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="#0065A4" stroke-width="1.4"/><path d="M5 8l2 2 4-4" stroke="#0065A4" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <div class="chip-label">Status</div>
                            <div class="chip-val">Dapat Disembuhkan</div>
                        </div>
                    </div>
                </div>

                <p class="section-body">
                    Tuberkulosis (TBC) adalah penyakit menular yang disebabkan oleh bakteri <em>Mycobacterium tuberculosis</em>
                    dan menyerang paru-paru. Penyakit ini menyebar melalui udara saat penderita TBC batuk atau bersin.
                    TBC tergolong penyakit yang dapat dicegah dan disembuhkan jika didiagnosis dan diobati dengan benar dan tepat waktu.
                    Penanganan TBC memerlukan kerjasama dari berbagai pihak dan edukasi kepada masyarakat luas.
                </p>
                <a href="{{ url('/pusatinfotbc') }}" class="btn-cta">
                    Lihat Selengkapnya
                    <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>

            <!-- Image -->
            <div class="img-card animate-fadeup delay-300">
                <img src="{{ asset('images/paru-paru.jpg') }}" alt="Paru-paru" />
            </div>
        </div>
    </section>

    <!-- ── TENTANG KAMI SECTION ── -->
    <section class="content-section alt">
        <div class="section-inner reverse animate-fadeup delay-100">
            <!-- Text -->
            <div>
                <span class="section-tag">Tentang Kami</span>
                <h2 class="section-title">Bersama Menuju<br>Indonesia Bebas TBC</h2>
                <p class="section-body">
                    Kami bekerja sama dan mengembangkan kemitraan dengan Pemerintah, organisasi internasional dan organisasi lokal
                    dalam meningkatkan peran serta masyarakat dalam upaya penanggulangan tuberkulosis secara efektif dan berkelanjutan.
                </p>
                <a href="{{ url('/tentang') }}" class="btn-cta">
                    Selengkapnya
                    <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>

            <!-- Image -->
            <div class="img-card animate-fadeup delay-300">
                <img src="{{ asset('images/dinkes.jpg') }}" alt="Dinas Kesehatan" />
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

        /* ── Carousel ── */
        const carouselInner = document.getElementById("carousel-inner");
        const dots = document.querySelectorAll(".slide-dot");
        const totalReal = carouselInner.querySelectorAll("img").length - 1;
        const slideWidth = 500;
        let current = 0;
        let autoTimer;

        function goTo(index, animate = true) {
            carouselInner.style.transition = animate ? 'transform 0.7s cubic-bezier(0.4,0,0.2,1)' : 'none';
            current = index;
            carouselInner.style.transform = `translateX(${-current * slideWidth}px)`;
            dots.forEach((d, i) => d.classList.toggle("active", i === (current % totalReal)));
        }

        function next() {
            if (current >= totalReal) { goTo(0, false); setTimeout(() => goTo(1), 20); }
            else goTo(current + 1);
        }

        function startAuto() { autoTimer = setInterval(next, 3500); }
        function resetAuto() { clearInterval(autoTimer); startAuto(); }

        document.getElementById("nextBtn").addEventListener("click", () => { next(); resetAuto(); });
        document.getElementById("prevBtn").addEventListener("click", () => { goTo(current <= 0 ? totalReal - 1 : current - 1); resetAuto(); });
        dots.forEach(d => d.addEventListener("click", () => { goTo(+d.dataset.index); resetAuto(); }));
        carouselInner.addEventListener("transitionend", () => { if (current >= totalReal) goTo(0, false); });

        startAuto();
    </script>

</body>
</html>