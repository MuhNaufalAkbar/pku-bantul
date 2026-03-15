<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PKU Bantul - Penanggulangan TBC</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tentang_kami.css') }}"> <!-- Pastikan jalur benar -->
</head>

<body class="font-sans text-gray-800">  

    <!-- Header -->
    <nav class="bg-gray-100 shadow">
        <div class="container mx-auto flex items-center justify-between px-4 py-3 flex-wrap">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('images/logouad.jpg') }}" alt="Logo UAD" class="h-10" />
                <img src="{{ asset('images/logopku.png') }}" alt="Logo PKU" class="h-10" />
            </a>
            <ul class="hidden md:flex space-x-8 text-gray-700">
                <li><a href="#" class="hover:text-red-600">Beranda</a></li>
                <li><a href="{{ url('/tentang') }}" class="hover:text-red-600">Tentang</a></li>
                <li><a href="{{ url('/kegiatan') }}" class="hover:text-red-600">Kegiatan</a></li>
                <li><a href="{{ url('/dashboard') }}" class="hover:text-red-600">Dashboard</a></li>
            </ul>
        </div>
    </nav>

    <!-- Berawal dari Klinik Section -->
    <section class="timeline-section py-12 bg-white">
        <div class="container mx-auto flex flex-col items-center px-4">
            <h2 class="text-3xl font-semibold mb-6">Berawal dari klinik ibu dan anak</h2>
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <!-- Image Section -->
                <div class="md:w-1/2 mb-4 md:mb-0">
                    <img src="{{ asset('images/klinik-ibu-anak.jpg') }}" alt="Klinik Ibu dan Anak" class="max-w-full h-auto object-contain rounded-xl">
                </div>
                <!-- Timeline Text Section -->
                <div class="md:w-1/2 text-lg">
                    <div class="timeline-item mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="h-4 w-4 bg-red-600 rounded-full"></div>
                            <h3 class="font-semibold">Klinik dan Rumah Bersalin (1995)</h3>
                        </div>
                        <p class="text-gray-700 mt-2">Sejak tahun 1995, PKU Bantul telah memberikan pelayanan kesehatan kepada ibu dan anak di kawasan Bantul, Yogyakarta.</p>
                    </div>
                    <div class="timeline-item mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="h-4 w-4 bg-red-600 rounded-full"></div>
                            <h3 class="font-semibold">Layanan TBC untuk Dewasa (2004)</h3>
                        </div>
                        <p class="text-gray-700 mt-2">Pada tahun 2004, layanan Tuberkulosis (TBC) ditambahkan sebagai bagian dari upaya penanggulangan penyakit menular.</p>
                    </div>
                    <div class="timeline-item mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="h-4 w-4 bg-red-600 rounded-full"></div>
                            <h3 class="font-semibold">Berawal Sakit Menular (2015)</h3>
                        </div>
                        <p class="text-gray-700 mt-2">Dengan berkembangnya pengetahuan, fokus kami beralih pada pelayanan untuk penyakit menular dan infeksi lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi dan Misi Section -->
    <section class="visi-misi-section py-12 bg-blue-100">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-8 px-4">
            <div class="md:w-1/2">
                <h3 class="text-2xl font-semibold mb-4">Visi Kami</h3>
                <p class="text-lg mb-4">
                    Menyediakan Rumah Sakit Islam yang mengutamakan kualitas layanan, mengedepankan kompetensi global dan menjaga keberlanjutan umat.
                </p>
                <a href="#" class="btn-primary bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700">Visi Kami</a>
            </div>
            <div class="md:w-1/2">
                <h3 class="text-2xl font-semibold mb-4">Misi Kami</h3>
                <ul class="list-disc pl-6">
                    <li class="mb-2">Menyediakan pelayanan kesehatan yang berkualitas</li>
                    <li class="mb-2">Membangun kualitas sumber daya manusia yang profesional</li>
                    <li class="mb-2">Menjaga komitmen pelayanan untuk kesehatan masyarakat secara berkelanjutan</li>
                </ul>
                <a href="#" class="btn-primary bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700">Misi Kami</a>
            </div>
        </div>
    </section>

       <!-- Footer -->
  <footer class="text-white">
  <!-- Bagian atas footer dengan warna biru langit -->
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

  <!-- Bagian bawah footer dengan warna biru tua -->
  <div class="py-4 text-center text-sm" style="background-color: #004b6b;">
    <p>Copyright © 2024 tbindonesia.or.id | All rights reserved.</p>
  </div>
</footer>

</body>

</html>
