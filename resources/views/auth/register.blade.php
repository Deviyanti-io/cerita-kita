<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - Cerita Kita</title>

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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .auth-card {
            max-width: 440px;
            width: 100%;
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 40px;
            padding: 48px 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.04);
            transition: transform 0.2s;
        }
        .auth-card:hover {
            transform: translateY(-4px);
        }

        /* ===== HEADER - LOGO TENGAH ===== */
        .auth-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .auth-logo {
            display: block;
            margin: 0 auto 12px;
            width: 80px;  /* ← DIPERBESAR */
            height: auto;
            filter: drop-shadow(0 4px 12px rgba(236, 72, 153, 0.2));
        }
        .auth-brand {
            display: block;
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;  /* ← DIPERBESAR */
            font-weight: 700;
            background: linear-gradient(to right, #e11d48, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 4px;
        }
        .auth-sub {
            font-size: 0.85rem;
            color: #6b7280;
            margin-top: -4px;
        }
        .auth-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-top: 20px;
        }
        .auth-header p {
            color: #6b7280;
            font-size: 0.95rem;
            margin-top: 4px;
        }

        /* ===== FORM ===== */
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            color: #1f2937;
            font-size: 0.9rem;
            margin-bottom: 6px;
        }
        .form-group input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #e5e7eb;
            border-radius: 30px;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
            background: white;
        }
        .form-group input:focus {
            outline: none;
            border-color: #d946ef;
            box-shadow: 0 0 0 4px rgba(217, 70, 239, 0.08);
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 50px;
            background: linear-gradient(135deg, #ec4899, #d946ef);
            color: white;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.2s;
            box-shadow: 0 4px 14px rgba(217, 70, 239, 0.25);
        }
        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        .auth-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 0.95rem;
            color: #6b7280;
        }
        .auth-footer a {
            color: #d946ef;
            text-decoration: none;
            font-weight: 600;
        }
        .auth-footer a:hover {
            text-decoration: underline;
        }
        .back-home {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #9ca3af;
            font-size: 0.85rem;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-home:hover {
            color: #d946ef;
        }
        .error-message {
            color: #e11d48;
            font-size: 0.85rem;
            margin-top: 4px;
        }
        .terms {
            font-size: 0.85rem;
            color: #6b7280;
            text-align: center;
            margin-top: 12px;
        }
        .terms a {
            color: #d946ef;
            text-decoration: none;
        }
        .terms a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <div class="auth-header">
            <!-- Logo di tengah, besar -->
            <img src="{{ asset('images/logo.jpg') }}" alt="Cerita Kita Logo" class="auth-logo">
            <!-- Teks "Cerita Kita" di bawah logo -->
            <span class="auth-brand">Cerita Kita</span>
            <div class="auth-sub">Ruang untuk Berbagi</div>

            <h2>Mulai Ceritamu</h2>
            <p>Daftar gratis dan bergabung dengan komunitas</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama kamu">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="nama@email.com">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
            </div>

            <button type="submit" class="btn-submit">Daftar</button>
        </form>

        <div class="auth-footer">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </div>

        <div class="terms">
            Dengan mendaftar, kamu menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>.
        </div>

        <a href="/" class="back-home">← Kembali ke Beranda</a>
    </div>

</body>
</html>