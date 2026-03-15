<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PKU Bantul - Penanggulangan TBC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-white text-gray-800">

    <!-- Header -->
    <nav class="bg-gray-100 shadow">
        <div class="container mx-auto flex items-center justify-between px-4 py-3">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('images/logouad.jpg') }}" alt="Logo UAD" class="h-10" />
                <img src="{{ asset('images/logopku.png') }}" alt="Logo PKU" class="h-10" />
            </a>
             <ul class="hidden md:flex space-x-8 text-gray-700">
                <li><a href="{{url('/')}}" class="hover:text-red-600">Beranda</a></li>
                <li><a href="{{ url('/tentang') }}" class="hover:text-red-600">Tentang</a></li>
                <li><a href="{{ url('/kegiatan') }}" class="hover:text-red-600">Kegiatan</a></li>
                <li><a href="{{ url('/dashboard') }}" class="hover:text-red-600">Dashboard</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero bg-[#0f172a] text-white text-center py-20 px-4">
       
    </section>

    <!-- TBC Information Section -->
    <section class="py-16 px-6 bg-white">

    </section>

    <!-- Tentang Kami -->
    <section class="bg-blue-100 py-16 px-6">
 
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                <p class="text-sm">Jl. Contoh No.123, Bantul, Yogyakarta</p>
                <p class="text-sm">Email: info@pkubantul.or.id</p>
                <p class="text-sm">Telp: +62 274 123 456</p>
            </div>
            <div class="flex md:justify-end items-start">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <!-- Icons same as before -->
                        <a href="#" class="hover:text-gray-300" aria-label="Facebook">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-2.9h2v-2.2c0-2 1.2-3.2 3-3.2.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2v1.9h2.6l-.4 2.9h-2.2v7A10 10 0 0 0 22 12z" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-gray-300" aria-label="Instagram">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm4.5-.9a1.1 1.1 0 1 0 0 2.2 1.1 1.1 0 0 0 0-2.2z" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-gray-300" aria-label="Twitter">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M22.5 5.9c-.8.4-1.7.6-2.6.8a4.4 4.4 0 0 0 1.9-2.5 9 9 0 0 1-2.8 1.1 4.5 4.5 0 0 0-7.7 4.1 12.9 12.9 0 0 1-9.3-4.7 4.5 4.5 0 0 0 1.4 6 4.4 4.4 0 0 1-2-.5v.1c0 2.2 1.6 4.1 3.7 4.5a4.5 4.5 0 0 1-2 .1 4.5 4.5 0 0 0 4.2 3.1A9 9 0 0 1 2 19.5a12.9 12.9 0 0 0 7 2c8.3 0 12.9-6.9 12.9-12.9v-.6c.9-.6 1.6-1.4 2.1-2.3z" />
                            </svg>
                        </a>
                        <!-- ... -->
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-4 text-center text-sm text-gray-400">
            &copy; 2025 PKU Bantul. All rights reserved.
        </div>
    </footer>

</body>

</html>
