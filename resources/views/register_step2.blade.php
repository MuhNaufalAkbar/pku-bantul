<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Tahap 2 - PKU Bantul</title>
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
        body { background: #f4f8fc; color: #0f1f2e; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── NAV ── */
        nav.main-nav {
            background: rgba(255,255,255,0.85); backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px); border-bottom: 1px solid rgba(0,101,164,0.10);
            position: sticky; top: 0; z-index: 50; box-shadow: 0 2px 24px rgba(0,101,164,0.07);
        }
        .nav-link {
            position: relative; color: var(--primary); font-weight: 600;
            font-size: 0.95rem; text-decoration: none; transition: color 0.2s;
        }
        .nav-link:hover { color: var(--accent); }

        /* ── CARD & LAYOUT ── */
        .register-main { flex: 1; display: flex; align-items: center; justify-content: center; padding: 48px 24px; position: relative; overflow: hidden; }
        .register-card {
            background: #fff; border-radius: 24px;
            box-shadow: 0 20px 70px rgba(0,0,0,0.10);
            border: 1px solid rgba(0,101,164,0.08);
            display: grid; grid-template-columns: 1fr 1.15fr;
            overflow: hidden; width: 100%; max-width: 960px;
            z-index: 1; animation: fadeUp 0.7s ease forwards;
        }

        .reg-left {
            background: linear-gradient(160deg, #0f172a 0%, #0a2a45 50%, #0065A4 100%);
            padding: 52px 44px; display: flex; flex-direction: column; justify-content: space-between; color: white;
        }

        .reg-right { padding: 52px 48px; display: flex; flex-direction: column; justify-content: center; }

        /* ── FORM ELEMENTS ── */
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 7px; }
        .input-wrap { position: relative; }
        .input-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8; pointer-events: none; }
        
        .form-group input {
            width: 100%; padding: 11px 14px 11px 40px;
            border: 1.5px solid #e2e8f0; border-radius: 10px;
            font-size: 14px; outline: none; transition: all 0.2s;
        }
        .form-group input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(0,101,164,0.10); }

        .btn-submit {
            width: 100%; padding: 13px;
            background: linear-gradient(135deg, var(--primary) 0%, #0081cc 100%);
            color: #fff; font-size: 15px; font-weight: 700; border-radius: 12px;
            cursor: pointer; transition: all 0.2s; box-shadow: 0 6px 20px rgba(0,101,164,0.30);
            display: flex; align-items: center; justify-content: center; gap: 8px; border: none;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(0,101,164,0.40); }

        .alert-danger { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px; border-radius: 10px; margin-bottom: 20px; font-size: 13px; }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 768px) { .register-card { grid-template-columns: 1fr; } .reg-left { display: none; } }
    </style>
</head>

<body>
    <nav class="main-nav">
        <div class="container mx-auto flex items-center justify-between px-5 py-3">
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ asset('images/logopku.png') }}" alt="Logo PKU" class="h-10" />
            </a>
            <ul class="hidden md:flex items-center space-x-7">
                <li><a href="{{ url('/') }}" class="nav-link">Beranda</a></li>
                <li><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
            </ul>
        </div>
    </nav>

    <main class="register-main">
        <div class="register-card">
            <div class="reg-left">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Hampir Selesai!</h2>
                    <p class="text-sm opacity-70">Langkah terakhir untuk mengamankan akun konseling TBC Anda.</p>
                </div>
                <div class="mt-10">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white text-xs">✓</div>
                        <span>Data Pribadi</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-8 h-8 rounded-full bg-white text-blue-900 flex items-center justify-center text-xs font-bold">2</div>
                        <span class="font-bold">Akun & Keamanan</span>
                    </div>
                </div>
            </div>

            <div class="reg-right">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Buat Akun</h1>
                    <p class="text-sm text-gray-500">Silakan isi detail login Anda.</p>
                </div>

                @if ($errors->any())
                <div class="alert-danger">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('register.submit') }}" method="POST" id="registerForm">
                    @csrf <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-wrap">
                            <span class="input-icon">✉</span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@pku.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-wrap">
                            <span class="input-icon">👤</span>
                            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="username_pku" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <span class="input-icon">🔒</span>
                            <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="input-wrap">
                            <span class="input-icon">🛡️</span>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit mt-4">
                        Daftar Sekarang
                    </button>
                </form>

                <p class="text-center text-sm text-gray-500 mt-6">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-bold">Masuk</a>
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-blue-900 text-white py-6 text-center text-xs">
        <p>Copyright &copy; 2026 PKU Bantul - Sistem Konseling TBC</p>
    </footer>

</body>
</html>