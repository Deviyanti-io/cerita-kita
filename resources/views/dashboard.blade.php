<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Cerita Kita</title>

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

        /* ===== NAVBAR ===== */
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
            display: flex;
            align-items: center;
            gap: 6px;
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
        .nav-menu a svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .user-section {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        .btn-write-nav {
            background: linear-gradient(135deg, #ec4899, #a855f7);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-write-nav svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ec4899, #a855f7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
        }
        .user-name { font-weight: 600; color: #1f2937; font-size: 0.95rem; }
        .btn-logout {
            padding: 6px 16px;
            border-radius: 50px;
            border: 1px solid #fca5a5;
            background: transparent;
            color: #ef4444;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
        }

        /* ===== DASHBOARD HERO ===== */
        .dashboard-hero {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 24px;
            margin-bottom: 28px;
        }
        .hero-text-card {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
            border-radius: 24px;
            padding: 40px 32px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .hero-text-card h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 16px 0;
        }
        .hero-text-card h2 { font-size: 1.1rem; font-weight: 600; color: #374151; margin-bottom: 4px; }
        .hero-text-card p { color: #6b7280; font-size: 0.9rem; margin-bottom: 24px; }
        .header-actions { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-primary {
            padding: 10px 24px;
            border-radius: 50px;
            background: linear-gradient(135deg, #ec4899, #a855f7);
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover { transform: translateY(-2px); opacity: 0.9; }
        .btn-primary svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; }
        .btn-outline {
            padding: 10px 24px;
            border-radius: 50px;
            border: 1px solid #f472b6;
            color: #db2777;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            transition: background 0.2s;
        }
        .btn-outline:hover { background: rgba(251, 113, 133, 0.05); }
        .btn-outline svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; }
        .hero-image-card {
            border-radius: 24px;
            overflow: hidden;
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-image-card img { width: 100%; height: 100%; object-fit: cover; display: block; }

        /* ===== STATS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
            border-radius: 20px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .stat-icon svg { width: 24px; height: 24px; stroke: currentColor; fill: none; stroke-width: 2; }
        .stat-info .number { font-size: 1.2rem; font-weight: 700; color: #1f2937; }
        .stat-info .label { font-size: 0.9rem; font-weight: 600; color: #1f2937; }
        .stat-info .sub-label { font-size: 0.75rem; color: #9ca3af; }
        .icon-pink { background: #fce7f3; color: #db2777; }
        .icon-purple { background: #f3e8ff; color: #9333ea; }
        .icon-orange { background: #ffedd5; color: #ea580c; }
        .icon-yellow { background: #fef9c3; color: #ca8a04; }

        /* ===== MAIN GRID ===== */
        .main-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 24px;
            align-items: start;
        }

        /* ===== CURAHAN TERBARU ===== */
        .curahan-card {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
            border-radius: 24px;
            padding: 24px;
        }
        .curahan-card .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .curahan-card .card-header h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .curahan-card .card-header a {
            color: #db2777;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.85rem;
        }
        .curahan-card .card-header a:hover { text-decoration: underline; }
        .curahan-empty { text-align: center; padding: 32px 0; }
        .curahan-empty h4 { color: #1f2937; font-size: 1rem; font-weight: 600; margin-bottom: 8px; }
        .curahan-empty p { color: #6b7280; font-size: 0.9rem; margin-bottom: 24px; }

        /* ===== QUICK ACTIONS ===== */
        .quick-actions .title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }
        .quick-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .quick-item {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
            border-radius: 16px;
            padding: 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: transform 0.2s, background 0.2s;
        }
        .quick-item:hover {
            transform: translateY(-3px);
            background: rgba(255,255,255,0.9);
        }
        .quick-item .icon-box {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #fce7f3;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #db2777;
            flex-shrink: 0;
        }
        .quick-item .icon-box svg { width: 20px; height: 20px; stroke: currentColor; fill: none; stroke-width: 2; }
        .quick-item-text { flex: 1; }
        .quick-item-text h4 { font-size: 0.85rem; font-weight: 700; color: #1f2937; margin-bottom: 2px; }
        .quick-item-text p { font-size: 0.7rem; color: #6b7280; }
        .quick-item .chevron { color: #d1d5db; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .dashboard-hero { grid-template-columns: 1fr; }
            .main-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            .navbar { flex-direction: column; align-items: stretch; }
            .nav-menu { justify-content: center; }
            .user-section { width: 100%; justify-content: space-between; }
            .quick-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .hero-text-card { padding: 24px 20px; }
            .hero-text-card h1 { font-size: 1.6rem; }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar">
        <a href="/" class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Cerita Kita">
            <span class="logo-text">Cerita Kita</span>
        </a>

        <div class="nav-menu">
            <a href="{{ route('dashboard') }}" class="active">
                <svg viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1"/></svg>
                Dashboard
            </a>
            <a href="{{ route('curahan.index') }}">
                <svg viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                Curahan
            </a>
            <a href="{{ route('mood.index') }}">
                <svg viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Mood Tracker
            </a>
            <a href="{{ route('insight') }}">
                <svg viewBox="0 0 24 24"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/></svg>
                Insight
            <a href="{{ route('playlist') }}">
                <svg viewBox="0 0 24 24"><path d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                Playlist
            </a>
        </div>

        <div class="user-section">
            <a href="{{ route('curahan.create') }}" class="btn-write-nav">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                Tulis Curahan
            </a>
            <div class="user-info">
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'D', 0, 1)) }}</div>
                <span class="user-name">{{ Auth::user()->name ?? 'Deby' }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">Keluar</button>
            </form>
        </div>
    </nav>

    <!-- ===== DASHBOARD HERO ===== -->
    <div class="dashboard-hero">
        <div class="hero-text-card">
            <h1>Halo, {{ Auth::user()->name ?? 'Deby' }}! 👋</h1>
            <h2>Apa yang kamu rasakan hari ini?</h2>
            <p>Selamat datang kembali di Cerita Kita.</p>
            <div class="header-actions">
                <a href="{{ route('curahan.create') }}" class="btn-primary">
                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    Tulis Curahan
                </a>
                <a href="{{ route('mood.index') }}" class="btn-outline">
                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Lihat Mood
                </a>
            </div>
        </div>
        <div class="hero-image-card">
            <img src="{{ asset('images/card.jpg') }}" alt="Ilustrasi Cerita Kita">
        </div>
    </div>

    <!-- ===== STATS ===== -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon icon-pink">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div class="stat-info">
                <div class="number">{{ $totalCurahan ?? 0 }}</div>
                <div class="label">Curahan</div>
                <div class="sub-label">Total curahanmu</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-purple">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="stat-info">
                <div class="label">{{ $todayMoodLabel ?? 'Belum' }}</div>
                <div class="sub-label">Mood Hari Ini</div>
                <div class="sub-label">Perasaan dominan</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-orange">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/></svg>
            </div>
            <div class="stat-info">
                <div class="number">{{ $streak ?? 0 }}</div>
                <div class="label">Hari</div>
                <div class="sub-label">Streak berturut-turut</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-yellow">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
            <div class="stat-info">
                <div class="number">{{ $newInsights ?? 0 }}</div>
                <div class="label">Baru</div>
                <div class="sub-label">Insight baru</div>
            </div>
        </div>
    </div>

    <!-- ===== MAIN GRID ===== -->
    <div class="main-grid">
     <!-- ===== CURAHAN TERBARU ===== -->
<div class="curahan-card">
    <div class="card-header">
        <h3>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#db2777" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            Curahan Terbaru
        </h3>
        <a href="{{ route('curahan.index') }}">Lihat Semua →</a>
    </div>

    @if($latestCurahan)
        <div style="background: #fdf2f8; border-radius: 12px; padding: 16px; margin-bottom: 12px; border-left: 4px solid #ec4899;">
            <p style="font-size: 0.8rem; color: #9ca3af; margin-bottom: 4px;">
                {{ $latestCurahan->created_at->diffForHumans() }}
            </p>
            <p style="color: #1f2937; font-weight: 500; margin: 0;">
                {{ Str::limit($latestCurahan->content, 120) }}
            </p>
            <div style="margin-top: 8px; display: flex; gap: 16px; font-size: 0.8rem; color: #6b7280;">
                <span>❤️ {{ $latestCurahan->likesCount() }}</span>
                <span>💬 {{ $latestCurahan->commentsCount() }}</span>
            </div>
        </div>
        
        @if($allCurahan->count() > 1)
            <div style="margin-top: 8px;">
                @foreach($allCurahan->skip(1) as $c)
                    <div style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <p style="font-size: 0.85rem; color: #1f2937; margin: 0; font-weight: 500;">
                                {{ Str::limit($c->content, 60) }}
                            </p>
                            <p style="font-size: 0.7rem; color: #9ca3af; margin: 0;">{{ $c->created_at->diffForHumans() }}</p>
                        </div>
                        <span style="font-size: 0.7rem; color: #6b7280;">❤️ {{ $c->likesCount() }}</span>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <div class="curahan-empty">
            <h4>Belum ada curahan.</h4>
            <p>Tidak apa-apa, semua cerita dimulai dari tulisan pertama.</p>
            <a href="{{ route('curahan.create') }}" class="btn-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                Mulai Menulis
            </a>
        </div>
    @endif
</div>
        <!-- Quick Actions -->
        <div class="quick-actions">
            <h3 class="title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#db2777" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Quick Actions
            </h3>
            <div class="quick-grid">
                <a href="{{ route('curahan.create') }}" class="quick-item">
                    <div class="icon-box">
                        <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </div>
                    <div class="quick-item-text">
                        <h4>Tulis Ceritamu</h4>
                        <p>Tuangkan perasaanmu</p>
                    </div>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>

                <a href="{{ route('mood.index') }}" class="quick-item">
                    <div class="icon-box">
                        <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="quick-item-text">
                        <h4>Mood Tracker</h4>
                        <p>Lacak perasaanmu</p>
                    </div>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>

                <a href="{{ route('insight') }}" class="quick-item">
                    <div class="icon-box">
                        <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/></svg>
                    </div>
                    <div class="quick-item-text">
                        <h4>Daily Insight</h4>
                        <p>Dapatkan inspirasi harian</p>
                    </div>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>

                <a href="{{ route('playlist') }}" class="quick-item">
                    <div class="icon-box">
                        <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                    </div>
                    <div class="quick-item-text">
                        <h4>Playlist</h4>
                        <p>Musik untuk menemani</p>
                    </div>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>

                <a href="{{ route('profile.edit') ?? '#' }}" class="quick-item">
                    <div class="icon-box">
                        <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div class="quick-item-text">
                        <h4>Profil Saya</h4>
                        <p>Atur akun & preferensimu</p>
                    </div>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>