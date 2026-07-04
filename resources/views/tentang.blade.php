<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang - Cerita Kita</title>

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
            margin-bottom: 16px;
        }
        .content p {
            color: #4b5563;
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 16px;
        }
        .content .highlight {
            background: #fce7f3;
            padding: 2px 10px;
            border-radius: 8px;
            color: #db2777;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .content .highlight svg {
            width: 18px;
            height: 18px;
            stroke: #db2777;
            fill: none;
            stroke-width: 2;
        }
        .content .highlight a {
            color: #db2777;
            text-decoration: none;
        }
        .footer {
            text-align: center;
            padding: 32px 0;
            color: #9ca3af;
            border-top: 1px solid rgba(255,255,255,0.3);
            font-size: 0.9rem;
            margin-top: 40px;
        }
        .tagline {
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: #6b21a5;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,0.3);
        }
        @media (max-width: 768px) {
            .navbar { flex-direction: column; align-items: stretch; }
            .nav-menu { justify-content: center; }
            .nav-auth { justify-content: center; }
            .content { padding: 32px 24px; }
            .content h1 { font-size: 2rem; }
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
            <a href="/tentang" class="active">Tentang</a>
            <a href="/fitur">Fitur</a>
            <a href="/komunitas">Komunitas</a>
        </div>
        <div class="nav-auth">
            <a href="{{ route('login') }}" class="btn-login">Masuk</a>
            <a href="{{ route('register') }}" class="btn-register">Daftar</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <h1>Tentang Cerita Kita</h1>
        <p>
            <strong>Cerita Kita</strong> adalah ruang aman bagi siapa pun yang ingin berbagi cerita, perasaan, dan pengalaman hidup. 
            Kami percaya bahwa setiap orang memiliki cerita yang berharga dan layak didengar.
        </p>
        <p>
            Di sini, kamu bisa menuliskan 
            <span class="highlight">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                curahan hati
            </span>, 
            melacak 
            <span class="highlight">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                mood
            </span> 
            harian, menemukan inspirasi dari kata-kata mutiara, dan mendengarkan 
            <span class="highlight">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                playlist
            </span> 
            yang menemani setiap momenmu.
        </p>
        <p>
            Kami berkomitmen untuk menjaga privasi dan keamanan setiap pengguna. Kamu bisa memilih untuk 
            <span class="highlight">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                anonim
            </span> 
            atau menggunakan nama aslimu. Semua cerita di sini dihargai dan tidak ada penilaian.
        </p>

        <div class="tagline">
            ✦ Kamu tidak sendiri. Di sini, kamu didengar. ✦
        </div>
    </div>

    <footer class="footer">
        © {{ date('Y') }} Cerita Kita. Dibuat dengan ❤️
    </footer>
</div>

</body>
</html>