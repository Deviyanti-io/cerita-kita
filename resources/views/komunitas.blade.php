<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komunitas - Cerita Kita</title>

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
            max-width: 800px;
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
            margin-bottom: 24px;
        }
        .community-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            display: flex;
            gap: 16px;
            align-items: flex-start;
            transition: transform 0.2s;
        }
        .community-card:hover { transform: translateY(-3px); }
        .community-card .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #fce7f3;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #db2777;
        }
        .community-card .icon-box svg {
            width: 24px;
            height: 24px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .community-card .card-text { flex: 1; }
        .community-card h3 { font-weight: 700; color: #1f2937; margin-bottom: 4px; }
        .community-card p { color: #6b7280; font-size: 0.95rem; margin-bottom: 8px; }
        .community-card .tag {
            display: inline-block;
            background: #fce7f3;
            color: #db2777;
            padding: 2px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .cta-box {
            text-align: center;
            margin-top: 24px;
            padding: 24px;
            background: #fef0f4;
            border-radius: 16px;
        }
        .cta-box p {
            font-weight: 600;
            color: #db2777;
            font-size: 1.1rem;
        }

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
            .community-card { flex-direction: column; align-items: center; text-align: center; }
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
            <a href="/fitur">Fitur</a>
            <a href="/komunitas" class="active">Komunitas</a>
        </div>
        <div class="nav-auth">
            <a href="{{ route('login') }}" class="btn-login">Masuk</a>
            <a href="{{ route('register') }}" class="btn-register">Daftar</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <h1>Komunitas</h1>
        <p class="subtitle">Bergabunglah dengan komunitas yang saling mendukung dan memahami.</p>

        <!-- Card 1: Ruang Curhat -->
        <div class="community-card">
            <div class="icon-box">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <div class="card-text">
                <h3>Ruang Curhat</h3>
                <p>Bagikan cerita dan perasaanmu dengan orang-orang yang peduli. Di sini, kamu akan didengar tanpa dihakimi.</p>
                <span class="tag">Aman & Privasi</span>
            </div>
        </div>

        <!-- Card 2: Saling Mendukung -->
        <div class="community-card">
            <div class="icon-box">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </div>
            <div class="card-text">
                <h3>Saling Mendukung</h3>
                <p>Setiap hari, banyak pengguna lain yang juga berbagi pengalaman. Kamu bisa belajar, memberi dukungan, dan menerima dukungan.</p>
                <span class="tag">Komunitas Positif</span>
            </div>
        </div>

        <!-- Card 3: Cerita Inspiratif -->
        <div class="community-card">
            <div class="icon-box">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
            <div class="card-text">
                <h3>Cerita Inspiratif</h3>
                <p>Temukan cerita-cerita inspiratif dari pengguna lain yang bisa memberi semangat dan motivasi dalam hidupmu.</p>
                <span class="tag">Inspirasi</span>
            </div>
        </div>

        <!-- CTA -->
        <div class="cta-box">
            <p>✦ "Kamu tidak sendiri. Di sini, kita bersama." ✦</p>
            <a href="{{ route('register') }}" class="btn-register" style="display:inline-block; margin-top:12px;">Gabung Komunitas</a>
        </div>
    </div>

    <footer class="footer">
        © {{ date('Y') }} Cerita Kita. Dibuat dengan ❤️
    </footer>
</div>

</body>
</html>