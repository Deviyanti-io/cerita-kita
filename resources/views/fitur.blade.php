<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitur - Cerita Kita</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #fff5f7 0%, #fef0f4 50%, #f3e8ff 100%);
            min-height: 100vh;
            color: #1f2937;
        }
        .container { max-width: 1200px; margin: 0 auto; padding: 24px; }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0 20px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            flex-wrap: wrap;
            gap: 12px;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .logo img { height: 44px; width: auto; }
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(to right, #e11d48, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }
        .nav-menu a {
            text-decoration: none;
            color: #4b5563;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s;
            padding-bottom: 4px;
            position: relative;
        }
        .nav-menu a:hover { color: #db2777; }
        .nav-menu a.active {
            color: #db2777;
            font-weight: 600;
        }
        .nav-menu a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #db2777;
            border-radius: 2px;
        }
        .nav-auth {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .btn-login {
            padding: 8px 24px;
            border-radius: 50px;
            border: 1px solid #ffb3c6;
            color: #db2777;
            text-decoration: none;
            font-weight: 600;
            background: #fff;
            transition: 0.2s;
        }
        .btn-login:hover { background: #fff0f3; border-color: #db2777; }
        .btn-register {
            padding: 8px 24px;
            border-radius: 50px;
            background: linear-gradient(135deg, #ec4899, #a855f7);
            color: white;
            text-decoration: none;
            font-weight: 600;
        }
        .btn-register:hover { opacity: 0.9; }

        .content {
            max-width: 900px;
            margin: 40px auto;
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
            border-radius: 32px;
            padding: 48px 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.02);
        }
        .content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }
        .content .subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 32px;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        .feature-item {
            background: white;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            transition: transform 0.2s;
        }
        .feature-item:hover { transform: translateY(-4px); }
        .feature-item .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #fce7f3;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            color: #db2777;
        }
        .feature-item .icon-box svg {
            width: 24px;
            height: 24px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .feature-item h3 { font-weight: 700; color: #1f2937; margin-bottom: 4px; }
        .feature-item p { color: #6b7280; font-size: 0.9rem; line-height: 1.6; }

        .footer {
            text-align: center;
            padding: 32px 0;
            color: #9ca3af;
            border-top: 1px solid rgba(255,255,255,0.3);
            font-size: 0.9rem;
            margin-top: 40px;
        }
        @media (max-width: 768px) {
            .navbar { flex-direction: column; align-items: stretch; }
            .nav-menu { justify-content: center; }
            .nav-auth { justify-content: center; }
            .content { padding: 32px 24px; }
            .content h1 { font-size: 2rem; }
            .feature-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Navbar -->
    <nav class="navbar">
        <a href="/" class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Cerita Kita">
            <span class="logo-text">Cerita Kita</span>
        </a>
        <div class="nav-menu">
            <a href="/">Beranda</a>
            <a href="/tentang">Tentang</a>
            <a href="/fitur" class="active">Fitur</a>
            <a href="/komunitas">Komunitas</a>
        </div>
        <div class="nav-auth">
            <a href="{{ route('login') }}" class="btn-login">Masuk</a>
            <a href="{{ route('register') }}" class="btn-register">Daftar</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <h1>Fitur Unggulan</h1>
        <p class="subtitle">Temukan apa yang kamu butuhkan untuk mengekspresikan diri</p>

        <div class="feature-grid">
            <!-- Curahan Hati -->
            <div class="feature-item">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                </div>
                <h3>Curahan Hati</h3>
                <p>Tuliskan apa yang kamu rasakan, tanpa takut dihakimi. Bebas, anonim, dan aman.</p>
            </div>

            <!-- Mood Tracker -->
            <div class="feature-item">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3>Mood Tracker</h3>
                <p>Lacak perasaanmu setiap hari dan lihat polanya. Kenali dirimu lebih dalam.</p>
            </div>

            <!-- Daily Insight -->
            <div class="feature-item">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/></svg>
                </div>
                <h3>Daily Insight</h3>
                <p>Dapatkan renungan harian untuk menenangkan jiwa dan memberi perspektif baru.</p>
            </div>

            <!-- Playlist -->
            <div class="feature-item">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                </div>
                <h3>Playlist</h3>
                <p>Musik untuk menemani setiap momenmu. Dengarkan playlist pilihan dari Spotify.</p>
            </div>
            <!-- Komunitas -->
            <div class="feature-item">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <h3>Komunitas</h3>
                <p>Bergabung dengan komunitas yang saling mendukung. Kamu tidak sendiri.</p>
            </div>
        </div>
    </div>

    <footer class="footer">
        © {{ date('Y') }} Cerita Kita. Dibuat dengan ❤️
    </footer>
</div>

</body>
</html>