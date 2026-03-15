<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PKU Bantul - Penanggulangan TBC</title>
    <script src="https://cdn.tailwindcss.com"></script>
        <style>
        /* Gambar hero section dengan animasi slide-in */
        .hero-image {
            animation: slideIn 1.2s ease-out forwards; /* Menambahkan animasi */
        }

        /* Efek Hover - Semua gambar naik saat cursor berada di atasnya */
        img {
            transition: transform 0.3s ease-in-out; /* Transisi halus untuk efek pergeseran */
        }

        img:hover {
            transform: translateY(-10px); /* Menggeser gambar ke atas saat dihover */
        }
    </style>
</head>

<body class="font-sans text-gray-800,"style="background-color: #87CEFA;">

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


    <!-- Section: Kegiatan Kami -->
<section class="bg-darkgray-100 py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kartu 1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="images/imgkegiatan1.png" alt="TBC Sedunia" class="w-full h-49 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-sm text-gray-800 mb-2">
                        Semarakkan Hari TBC Sedunia 2025 melalui Gerakan Indonesia Akhiri Tuberkulosis dengan Komitmen dan Aksi Nyata (GIATKAN)
                    </h3>
                    <p class="text-xs text-gray-500 mb-2">24 Maret 2025</p>
                    <p class="text-sm text-gray-600 mb-4">
                        Yogyakarta, 24 Maret 2025 – Pada tanggal 24 Maret 1882, Dr. Robert Koch, seorang dokter dan ilmuwan...
                    </p>
                    <a href="#" class="text-red-600 text-sm font-semibold">[.....]</a>
                </div>
            </div>

            <!-- Kartu 2 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="images/imgkegiatan2.png" alt="BERNAPAS" class="w-full h-49 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-sm text-gray-800 mb-2">
                        BERNAPAS di 3 Kota: Surabaya, Malang dan Semarang
                    </h3>
                    <p class="text-xs text-gray-500 mb-2">11 Juni 2025</p>
                    <p class="text-sm text-gray-600 mb-4">
                        Semarang, 11 Juni 2025 – Indonesia memiliki cita-cita besar menuju eliminasi TBC pada 2030...
                    </p>
                    <a href="#" class="text-red-600 text-sm font-semibold">[.....]</a>
                </div>
            </div>

            <!-- Kartu 3 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="images/imgkegiatan3.png" alt="Flashmob Jingle" class="w-full h-49 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-sm text-gray-800 mb-2">
                        Ayo Ikuti Lomba Flashmob Jingle #SembuhLebihCepat dan Bantu Eliminasi TBC!
                    </h3>
                    <p class="text-xs text-gray-500 mb-2">9 Februari 2025</p>
                    <p class="text-sm text-gray-600 mb-4">
                        Jakarta, 9 Februari 2025 – Untuk menyambut Hari Tuberkulosis Sedunia, KNCV Indonesia dan Stop TB Partnership...
                    </p>
                    <a href="#" class="text-red-600 text-sm font-semibold">[.....]</a>
                </div>
            </div>

            <!-- Kartu 4 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="images/imgkegiatan4.png" alt="Workshop MESO" class="w-full h-49 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-sm text-gray-800 mb-2">
                        Workshop MESO Aktif bagi Tenaga Kesehatan di Fasilitas Pelayanan Kesehatan
                    </h3>
                    <p class="text-xs text-gray-500 mb-2">27 Januari 2025</p>
                    <p class="text-sm text-gray-600 mb-4">
                        Jakarta, 27 Januari 2025 – Kementerian Kesehatan RI bersama KNCV Indonesia menyelenggarakan workshop...
                    </p>
                    <a href="#" class="text-red-600 text-sm font-semibold">[.....]</a>
                </div>
            </div>

            <!-- Kartu 5 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="images/imgkegiatan5.png" alt="ASCENT DR-TB" class="w-full h-49 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-sm text-gray-800 mb-2">
                        ASCENT DR-TB mendukung peningkatan kualitas program TBC RO di Indonesia
                    </h3>
                    <p class="text-xs text-gray-500 mb-2">19 April 2025</p>
                    <p class="text-sm text-gray-600 mb-4">
                        Kegiatan ASCENT DR-TB merupakan bagian dari kerja sama internasional untuk meningkatkan pengelolaan...
                    </p>
                    <a href="#" class="text-red-600 text-sm font-semibold">[.....]</a>
                </div>
            </div>

            <!-- Kartu 6 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="images/imgkegiatan6.png" alt="TPT" class="w-full h-49 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-sm text-gray-800 mb-2">
                        TPT (Terapi Pencegahan Tuberkulosis)
                    </h3>
                    <p class="text-xs text-gray-500 mb-2">31 Agustus 2025</p>
                    <p class="text-sm text-gray-600 mb-4">
                        TPT adalah upaya mencegah orang yang memiliki infeksi TB laten agar tidak menjadi TB aktif...
                    </p>
                    <a href="#" class="text-red-600 text-sm font-semibold">[.....]</a>
                </div>
            </div>
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
