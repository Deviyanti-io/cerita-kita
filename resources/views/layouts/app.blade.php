<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cerita Kita - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ===== GLOBAL ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #fff5f7 0%, #fef0f4 50%, #f3e8ff 100%);
            min-height: 100vh;
            color: #1f2937;
        }
        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 12px;
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
            filter: drop-shadow(0 2px 8px rgba(236, 72, 153, 0.15));
        }
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
            display: flex;
            align-items: center;
            gap: 6px;
            padding-bottom: 4px;
            position: relative;
        }
        .nav-menu a:hover {
            color: #db2777;
        }
        .nav-menu a.active {
            color: #db2777;
            font-weight: 600;
        }
        .nav-menu a.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #ec4899, #a855f7);
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
            padding: 8px 18px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: opacity 0.2s;
        }
        .btn-write-nav:hover {
            opacity: 0.9;
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
            gap: 10px;
            cursor: default;
        }
        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ec4899, #a855f7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
        }
        .user-name {
            font-weight: 600;
            color: #1f2937;
            font-size: 0.9rem;
        }
        .btn-logout {
            padding: 6px 16px;
            border-radius: 50px;
            border: 1px solid #fca5a5;
            background: transparent;
            color: #ef4444;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-logout:hover {
            background: #fef2f2;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .navbar {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }
            .nav-menu {
                justify-content: center;
                gap: 16px;
            }
            .user-section {
                justify-content: center;
            }
        }
        @media (max-width: 768px) {
            .nav-menu a {
                font-size: 0.8rem;
            }
            .nav-menu a span {
                display: none;
            }
            .logo-text {
                font-size: 1.3rem;
            }
            .logo img {
                height: 36px;
            }
        }
        @media (max-width: 480px) {
            .container {
                padding: 0 16px;
            }
            .user-name {
                display: none;
            }
            .btn-write-nav span {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- ===== NAVBAR ===== -->
        <nav class="navbar">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="Cerita Kita Logo">
                <span class="logo-text">Cerita Kita</span>
            </a>

            <div class="nav-menu">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('curahan.index') }}" class="{{ request()->routeIs('curahan.*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    <span>Curahan</span>
                </a>
                <a href="{{ route('mood.index') }}" class="{{ request()->routeIs('mood.*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Mood</span>
                </a>
                <a href="{{ route('insight') }}" class="{{ request()->routeIs('insight') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/></svg>
                    <span>Insight</span>
                </a>
                <a href="{{ route('playlist') }}" class="{{ request()->routeIs('playlist') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                    <span>Playlist</span>
                </a>
            </div>

            <div class="user-section">
                <a href="{{ route('curahan.create') }}" class="btn-write-nav">
                    <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    <span>Tulis</span>
                </a>

                <div class="user-info">
                    <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</div>
                    <span class="user-name">{{ Auth::user()->name ?? 'User' }}</span>
                </div>

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Keluar</button>
                </form>
            </div>
        </nav>

        <!-- ===== FLASH MESSAGES ===== -->
        @if(session('success'))
            <div class="mb-6 px-4 py-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg flex items-center gap-3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 px-4 py-3 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg flex items-center gap-3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 px-4 py-3 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ===== CONTENT ===== -->
        <main>
            @yield('content')
        </main>
    </div>

</body>
</html>