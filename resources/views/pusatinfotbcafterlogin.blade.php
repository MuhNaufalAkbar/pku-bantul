<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PKU Bantul - Penanggulangan TBC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Efek Hover - Semua gambar naik saat cursor berada di atasnya */
        img {
            transition: transform 0.3s ease-in-out; /* Transisi halus untuk efek pergeseran */
        }

        img:hover {
            transform: translateY(-10px); /* Menggeser gambar ke atas saat dihover */
        }

        /* Efek Hover pada tombol "Lihat Selengkapnya" */
        .btn-hover {
            transition: transform 0.3s ease, background-color 0.3s ease; /* Transisi halus */
        }

        .btn-hover:hover {
            transform: translateY(-5px); /* Menggeser tombol ke atas saat dihover */
            background-color: #e53e3e; /* Mengubah warna latar belakang */
        }

        /* Styling untuk tab yang aktif */
        .active {
            font-weight: bold;
            color: #e53e3e; /* Warna untuk tab aktif */
        }

        /* Tambahan styling untuk smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-sans text-gray-800" style="background-color: #87CEFA;">

        <!-- Header -->
    <!-- Header -->
    <nav class="bg-gray-100 shadow">
        <div class="container mx-auto flex items-center justify-between px-4 py-3">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('images/logouad.jpg') }}" alt="Logo UAD" class="h-10" />
                <img src="{{ asset('images/logopku.png') }}" alt="Logo PKU" class="h-10" />
            </a>
<ul class="hidden md:flex space-x-8" style="color: #0065A4;">
    <li><a href="/welcomeafterlogin" class="hover:text-red-600">Beranda</a></li>
    <li><a href="{{ url('/tentangafterlogin') }}" class="hover:text-red-600">Tentang</a></li>
    <li><a href="{{ url('/kegiatanafterlogin') }}" class="hover:text-red-600">Kegiatan</a></li>

    <!-- Menampilkan link Dashboard berdasarkan Role -->
                @if (Auth::check())
                  <li><a href="{{ url('/dashboard') }}" class="hover:text-yellow-400 {{ Route::is('dashboard') ? 'text-yellow-300' : '' }}">Dashboard</a></li>
                @endif


    <li><a href="{{ route('logout') }}" class="px-4 py-2 text-white rounded-lg transition" style="background-color:rgb(251, 34, 5);">Logout</a></li>
</ul>

            
            <!-- Header Right (User Info) -->
            <div class="flex items-center space-x-4">
                @if (Auth::check())
                    <span class="text-gray-900">Halo, {{ Auth::user()->username }} Selamat Datang!</span>
                    <img src="{{ asset('images/ikon_profil.png') }}" alt="User Icon" class="w-8 h-8 rounded-full">
                @else
                    <a href="{{ route('login') }}" class="text-gray-900 hover:text-red-600">Login</a>
                @endif
            </div>
        </div>
        
        <div class="md:hidden">
            <button id="menuBtn" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <div id="mobileMenu" class="hidden md:hidden bg-white shadow-lg px-4 pt-4 pb-6">
            <ul class="space-y-4 text-gray-700 font-medium">
                <li><a href="/welcomeafterlogin" class="hover:text-red-600 transition">Beranda</a></li>
                <li><a href="{{ url('/tentangafterlogin') }}" class="hover:text-red-600 transition">Tentang</a></li>
                <li><a href="{{ url('/kegiatan') }}" class="hover:text-red-600 transition">Kegiatan</a></li>
                <li><a href="{{ route('dashboard') }}" class="hover:text-yellow-400 {{ Route::is('dashboard') ? 'text-yellow-300' : '' }}">Dashboard</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center text-white text-center py-20 px-16" style="background-image: url('/images/laber_pusattbc.png');">
        <div class="absolute inset-0 bg-[#0f172a]/35"></div> <!-- Overlay -->
        <div class="relative z-10 flex flex-col justify-center items-center h-full">
            <h1 class="text-4xl font-bold mb-6">Pusat Informasi TBC</h1>
            <p class="text-lg max-w-2xl mx-auto">
                Dapatkan informasi lengkap tentang Tuberkulosis (TBC), gejala, pencegahan, pengobatan, dan layanan yang
                tersedia di PKU Bantul.
            </p>
        </div>
    </section>

    <!-- TBC Information Tab Navigation -->
    <section class="max-w-6xl mx-auto bg-white rounded-lg shadow-md py-8 px-6">

        <!-- Navbar mini sticky -->
        <nav class="flex space-x-4 overflow-x-auto pb-4 border-b border-gray-300 sticky top-0 bg-white z-20">
            <a href="#deskripsi" class="tab-btn px-4 py-2 text-blue-700 whitespace-nowrap">Deskripsi</a>
            <a href="#penyebab" class="tab-btn px-4 py-2 text-blue-700 whitespace-nowrap">Penyebab</a>
            <a href="#gejala" class="tab-btn px-4 py-2 text-blue-700 whitespace-nowrap">Gejala</a>
            <a href="#pengobatan" class="tab-btn px-4 py-2 text-blue-700 whitespace-nowrap">Pengobatan</a>
            <a href="#pencegahan" class="tab-btn px-4 py-2 text-blue-700 whitespace-nowrap">Pencegahan</a>
        </nav>

        <!-- Sections -->
        <div id="deskripsi" class="py-8 grid md:grid-cols-2 gap-8 items-center">
            <img src="{{ asset('images/tbc-info.jpg') }}" alt="Ilustrasi Paru-Paru" class="rounded-xl shadow-lg order-2 md:order-1">
            <div class="order-1 md:order-2">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Apa Itu TBC?</h2>
                <p class="text-gray-700 leading-relaxed">
                    Tuberkulosis (TBC) adalah penyakit menular yang disebabkan oleh bakteri Mycobacterium
                    tuberculosis dan terutama menyerang paru-paru. Penyakit ini menyebar melalui udara saat
                    penderita TBC aktif batuk, bersin, atau berbicara, sehingga orang di sekitarnya bisa menghirup
                    percikan droplet yang mengandung bakteri. Gejala TBC biasanya berupa batuk yang berlangsung
                    lebih dari dua minggu, sering disertai dahak atau darah, penurunan berat badan drastis, demam
                    ringan terutama pada malam hari, keringat malam, dan rasa lelah berkepanjangan. Meski tergolong
                    penyakit serius, TBC bisa disembuhkan sepenuhnya dengan pengobatan yang tepat dan teratur selama
                    minimal enam bulan. Pemerintah Indonesia menyediakan obat TBC secara gratis melalui program DOTS
                    untuk memastikan penderita menjalani pengobatan sampai tuntas. Bila tidak diobati dengan benar,
                    TBC bisa berkembang menjadi TBC resistan obat (MDR-TB), yang lebih sulit dan mahal untuk
                    ditangani.
                </p>
            </div>
        </div>

        <div id="penyebab" class="py-8 grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Penyebab TBC</h2>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <li><strong>Infeksi Primer:</strong> Terjadi saat bakteri pertama kali masuk ke tubuh melalui
                        tetesan udara. Pada tahap ini, tubuh biasanya masih bisa menahan bakteri dengan sistem kekebalan tubuh. Gejala sering tidak muncul atau ringan seperti demam ringan, batuk singkat.</li>
                    <li><strong>Infeksi Laten:</strong> Bakteri berada dalam tubuh tetapi dalam kondisi "tidur"
                        (tidak aktif). Tidak menimbulkan gejala dan tidak menular. Berpotensi aktif kembali jika sistem kekebalan tubuh melemah. Sekitar 5-10% orang dengan TB laten berisiko mengalami infeksi aktif pada suatu waktu dalam hidupnya.</li>
                    <li><strong>Infeksi Aktif:</strong> Bakteri menjadi aktif, berkembang biak, dan menyebabkan kerusakan jaringan. Menyebabkan gejala klinis. Sangat menular melalui udara. Butuh pengobatan segera.</li>
                </ul>
            </div>
            <img src="{{ asset('images/bakteri-tbc.jpg') }}" alt="Ilustrasi Bakteri" class="rounded-xl shadow-lg">
        </div>

        <div id="gejala" class="py-8 grid md:grid-cols-2 gap-8 items-center">
            <img src="{{ asset('images/gejala-tbc.png') }}" alt="Orang Batuk" class="rounded-xl shadow-lg order-2 md:order-1">
            <div class="order-1 md:order-2">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Gejala TBC</h2>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <strong>Gejala TBC bisa berbeda tergantung organ yang terinfeksi:</strong>
                    <li>Gejala TBC Paru (TBC paling umum): Batuk terus-menerus lebih dari 2 minggu (bisa berdahak atau darah). Nyeri dada saat bernapas atau batuk. Sesak napas. Demam berkepanjangan, biasanya pada malam hari. Keringat malam yang berlebihan. Lemas, hilang nafsu makan, dan berat badan turun drastis.</li>
                    <li>Gejala TBC Ekstra-Paru (Organ Lain): TBC Tulang: Nyeri tulang, pembengkakan. TBC Otak (Meningitis TB): Sakit kepala berat, kejang, kebingungan. TBC Ginjal: Darah dalam urin, nyeri pinggang. TBC Kelenjar: Pembengkakan kelenjar getah bening (biasanya di leher).</li>
                </ul>
            </div>
        </div>

        <div id="pengobatan" class="py-8 grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Pengobatan TBC</h2>
                <p class="text-gray-700 leading-relaxed mb-2">
                    <strong>a. Pengobatan TBC Paru </strong>
                    Pengobatan standar dilakukan dengan terapi kombinasi antibiotik selama minimal 6 bulan. Obat
                    utama dalam pengobatan TBC adalah:
                    Isoniazid (INH)
                    Rifampisin (RIF)
                    Pirazinamid (PZA)
                    Etambutol (EMB)
                    Tahapan pengobatan:
                    Fase Intensif (2 bulan pertama):
                    Pasien mengonsumsi 4 jenis obat (INH, RIF, PZA, EMB) setiap hari.
                    Bertujuan untuk membunuh sebagian besar bakteri dan mengurangi gejala.
                    Fase Lanjutan (4 bulan berikutnya):
                    Pasien hanya mengonsumsi 2 obat utama (INH dan RIF).
                    Bertujuan untuk memastikan bakteri benar-benar hilang dan mencegah kekambuhan.
                    Catatan: Pengobatan harus dilakukan secara teratur dan tuntas, karena jika dihentikan sebelum
                    waktunya, bakteri bisa menjadi kebal terhadap obat (resisten), yang membuat pengobatan lebih
                    sulit dan memakan waktu lebih lama.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    <strong>b. Pengobatan TBC Resisten Obat (TBC RO) </strong>
                    TBC Resisten Obat terjadi ketika bakteri menjadi kebal terhadap obat standar, terutama
                    Rifampisin dan Isoniazid. Pengobatan TBC RO lebih lama (9–24 bulan) dan menggunakan obat yang
                    lebih kuat, seperti:
                    Bedaquiline
                    Linezolid
                    Levofloxacin
                </p>
                <p class="text-gray-700 leading-relaxed">
                    <strong>c. Pengobatan TBC Laten </strong>
                    Bagi orang yang terinfeksi laten (tanpa gejala), diberikan pengobatan pencegahan dengan
                    Isoniazid atau Rifampisin selama 3–9 bulan, terutama bagi mereka yang berisiko tinggi (misalnya
                    penderita HIV atau orang dengan sistem imun lemah).
                </p>
            </div>
            <img src="{{ asset('images/obat-tbc.png') }}" alt="Obat TBC" class="rounded-xl shadow-lg">
        </div>

        <div id="pencegahan" class="py-8 grid md:grid-cols-2 gap-8 items-center">
            <img src="{{ asset('images/pencegahan-tbc.jpg') }}" alt="Pencegahan TBC"
                class="rounded-xl shadow-lg order-2 md:order-1">
            <div class="order-1 md:order-2">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Pencegahan TBC</h2>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <strong>a. Vaksinasi BCG (Bacillus Calmette-Guérin)</strong>
                    <li>Diberikan pada bayi untuk memberikan perlindungan terhadap TBC berat, seperti meningitis
                        tuberkulosis.</li>
                    <li>Tidak sepenuhnya melindungi dari TBC paru pada orang dewasa, tetapi tetap dianjurkan.</li>
                    <strong>b. Pencegahan Penularan</strong>
                    <li>Menggunakan masker bagi penderita TBC aktif.</li>
                    <li>Menjaga ventilasi ruangan agar sirkulasi udara baik.</li>
                    <li>Menutup mulut saat batuk atau bersin dengan tisu atau siku bagian dalam.</li>
                    <li>Menjalani pengobatan hingga tuntas untuk mencegah penyebaran dan resistensi obat.</li>
                </ul>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer class="text-white">
        <div class="py-8 px-4" style="background-color: #0065A4;">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <p class="text-justify text-[12px] text-white">
                        <strong>Tuberkulosis (TBC)</strong> adalah penyakit infeksi menular yang disebabkan oleh bakteri Mycobacterium tuberculosis. Penyakit ini umumnya menyerang paru-paru, namun bisa juga menyerang bagian tubuh lain seperti tulang, kelenjar getah bening, ginjal, bahkan otak. TBC termasuk salah satu penyakit infeksi paling mematikan di dunia, terutama di negara berkembang yang memiliki akses terbatas terhadap pelayanan kesehatan.
                    </p>
                </div>
                <div class="pl-20">
                    <h3 class="text-white text-[14px] font-bold mb-2">Kontak Kami</h3>
                    <p class="text-sm">
                        Jl. Jend. Sudirman No.124,<br>
                        Nyangkringan, Bantul, Kec. Bantul,<br>
                        Kabupaten Bantul,<br>
                        Daerah Istimewa Yogyakarta<br>
                        55711
                    </p>
                </div>
                <div>
                    <h3 class="font-bold mb-2">Temukan Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#"><img src="images/logo_facebook.png" alt="Facebook" class="w-6 h-6 object-contain"></a>
                        <a href="#"><img src="images/logo_instagram.png" alt="Instagram" class="w-6 h-6 object-contain"></a>
                        <a href="#"><img src="images/logo_whatsapp.png" alt="WhatsApp" class="w-6 h-6 object-contain"></a>
                        <a href="#"><img src="images/logo_youtube.png" alt="YouTube" class="w-6 h-6 object-contain"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4 text-center text-sm" style="background-color: #004b6b;">
            <p>Copyright © 2024 tbindonesia.or.id | All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
