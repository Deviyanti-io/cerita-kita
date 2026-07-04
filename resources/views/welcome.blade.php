<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cerita Kita - Tempat Aman untuk Berbagi</title>

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
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 0;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .logo img {
            height: 44px;
            width: auto;
            display: block;
        }
        .logo-text-wrapper {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        .logo-text-top {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(to right, #e11d48, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .logo-text-sub {
            font-size: 0.65rem;
            color: #e11d48;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 32px;
        }
        .nav-menu a {
            text-decoration: none;
            color: #4b5563;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav-menu a:hover, .nav-menu a.active {
            color: #db2777;
            border-bottom: 2px solid #db2777;
            padding-bottom: 2px;
        }
        .nav-auth {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .btn-login {
            padding: 10px 28px;
            border-radius: 50px;
            border: 1px solid #ffb3c6;
            color: #db2777;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            background: #fff;
            transition: all 0.2s;
        }
        .btn-login:hover {
            background: #fff0f3;
            border-color: #db2777;
        }
        .btn-register {
            padding: 10px 28px;
            border-radius: 50px;
            background: linear-gradient(135deg, #ec4899, #a855f7);
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            transition: opacity 0.2s;
        }
        .btn-register:hover {
            opacity: 0.9;
        }

        /* ===== HERO ===== */
        .hero {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            align-items: center;
            padding: 60px 0 80px;
        }
        .hero-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            background: #ffe4e6;
            color: #db2777;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            width: fit-content;
        }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            line-height: 1.15;
            color: #1e1b4b;
        }
        .hero-title span {
            color: #c084fc;
            background: linear-gradient(135deg, #ec4899, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-desc {
            font-size: 1.05rem;
            color: #6b7280;
            line-height: 1.6;
            max-width: 520px;
        }
        .hero-quote {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 1.35rem;
            color: #5b21b6;
            line-height: 1.5;
            max-width: 480px;
            margin-top: 8px;
        }
        .hero-actions {
            display: flex;
            gap: 16px;
            margin-top: 12px;
        }
        .btn-purple {
            padding: 14px 32px;
            border-radius: 50px;
            background: linear-gradient(135deg, #d946ef, #8b5cf6);
            color: white;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(139, 92, 246, 0.3);
            transition: transform 0.2s;
        }
        .btn-purple:hover {
            transform: translateY(-2px);
        }
        .btn-outline-pink {
            padding: 14px 32px;
            border-radius: 50px;
            border: 1px solid #f472b6;
            color: #db2777;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }
        .btn-outline-pink:hover {
            background: rgba(251, 113, 133, 0.05);
        }

        /* ===== HERO IMAGE ===== */
        .hero-image-side {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .hero-frame {
            width: 100%;
            max-width: 480px;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(219, 39, 119, 0.08);
            border: 6px solid rgba(255,255,255,0.6);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            background: white;
        }
        .hero-frame:hover {
            transform: scale(1.02);
            box-shadow: 0 30px 60px rgba(219, 39, 119, 0.15);
        }
        .hero-frame img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }
        .hero-frame:hover img {
            transform: scale(1.04);
        }

        /* ===== FEATURES CARDS ===== */
        .features-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
            padding: 0 16px 60px;
        }
        .feature-card {
            flex: 1 1 200px;
            max-width: 280px;
            background: white;
            border-radius: 20px;
            padding: 24px 20px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            border: 1px solid #f3f4f6;
            transition: all 0.2s;
        }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
        }
        .feature-card .icon-box {
            width: 56px;
            height: 56px;
            margin: 0 auto 12px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .feature-card .icon-box svg {
            width: 28px;
            height: 28px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .feature-card h3 {
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 4px;
        }
        .feature-card p {
            font-size: 0.9rem;
            color: #6b7280;
            margin: 0;
        }
        .icon-pink { background: #fce7f3; color: #db2777; }
        .icon-yellow { background: #fef3c7; color: #d97706; }
        .icon-blue { background: #dbeafe; color: #2563eb; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .hero {
                grid-template-columns: 1fr;
                gap: 48px;
                text-align: center;
            }
            .hero-content { align-items: center; }
            .hero-desc, .hero-quote { max-width: 100%; }
            .hero-actions { justify-content: center; flex-wrap: wrap; }
            .hero-image-side { justify-content: center; }
        }
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }
            .nav-menu { justify-content: center; flex-wrap: wrap; gap: 16px; }
            .nav-auth { justify-content: center; flex-wrap: wrap; }
            .hero-title { font-size: 2.8rem; }
            .hero-frame { max-width: 100%; }
            .features-cards { padding: 0 0 40px; }
            .feature-card { flex: 1 1 100%; max-width: 100%; }
        }
        @media (max-width: 480px) {
            .hero-title { font-size: 2.2rem; }
            .btn-purple, .btn-outline-pink { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar">
        <a href="/" class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Cerita Kita Logo">
            <div class="logo-text-wrapper">
                <span class="logo-text-top">Cerita Kita</span>
                <span class="logo-text-sub">Curahan Kita</span>
            </div>
        </a>

        <div class="nav-menu">
            <a href="/" class="active">Beranda</a>
            <a href="/tentang">Tentang</a>
            <a href="/fitur">Fitur</a>
            <a href="/komunitas">Komunitas</a>
        </div>

        <div class="nav-auth">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-register">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-login">Masuk</a>
                    <a href="{{ route('register') }}" class="btn-register">Daftar</a>
                @endauth
            @endif
        </div>
    </nav>

    <!-- ===== HERO ===== -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">✦ Ruang untuk Berbagi</div>
            <h1 class="hero-title">
                Tempat Aman<br>untuk <span>Berbagi</span>
            </h1>
            <p class="hero-desc">
                Cerita Kita adalah ruang aman untuk menuliskan perasaan, pikiran, dan pengalamanmu. Di sini, kamu tidak sendiri. Kamu didengar, kamu berarti.
            </p>
            <div class="hero-quote">
                “Terkadang, berbagi adalah cara terbaik untuk sembuh.”
            </div>
            <div class="hero-actions">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-purple">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        Mulai Berbagi
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-purple">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        Mulai Berbagi
                    </a>
                    <a href="{{ route('login') }}" class="btn-outline-pink">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Gabung Komunitas
                    </a>
                @endauth
            </div>
        </div>

        <div class="hero-image-side">
            <div class="hero-frame">
                <img src="{{ asset('images/home.jpg') }}" alt="Berbagi cerita">
            </div>
        </div>
    </section>

    <!-- ===== FEATURES CARDS ===== -->
    <div class="features-cards">
        <!-- Aman & Privasi -->
        <div class="feature-card">
            <div class="icon-box icon-pink">
                <svg viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <h3>Aman & Privasi</h3>
            <p>Data kamu aman dan terlindungi</p>
        </div>

        <!-- Tanpa Penilaian -->
        <div class="feature-card">
            <div class="icon-box icon-yellow">
                <svg viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </div>
            <h3>Tanpa Penilaian</h3>
            <p>Semua cerita itu berharga</p>
        </div>

        <!-- Komunitas Supportif -->
        <div class="feature-card">
            <div class="icon-box icon-blue">
                <svg viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <h3>Komunitas Supportif</h3>
            <p>Kamu tidak sendiri di sini</p>
        </div>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer style="text-align:center; padding: 32px 0; color: #9ca3af; border-top: 1px solid rgba(255,255,255,0.3); font-size: 0.9rem; margin-top: 20px;">
        © {{ date('Y') }} Cerita Kita. Dibuat dengan <span style="color:#ec4899;">❤️</span>
    </footer>
</div>

</body>
</html>