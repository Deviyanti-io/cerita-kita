@extends('layouts.app')

@section('title', 'Playlist Spotify')

@section('content')
<style>
    .playlist-card {
        transition: all 0.3s ease;
        border-radius: 20px;
        overflow: hidden;
        background: white;
        border: 1px solid #f3f4f6;
        box-shadow: 0 4px 20px rgba(0,0,0,0.02);
    }
    .playlist-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 48px rgba(0,0,0,0.06);
    }
    .playlist-header {
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        color: white;
    }
    .playlist-header .icon-box {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .playlist-header .icon-box svg {
        width: 24px;
        height: 24px;
        stroke: white;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .playlist-header h3 {
        font-weight: 700;
        font-size: 1.2rem;
        margin: 0;
        color: white;
    }
    .playlist-header p {
        font-size: 0.85rem;
        opacity: 0.8;
        margin: 0;
        color: white;
    }
    .playlist-body {
        padding: 16px 20px 20px;
    }
    .playlist-body iframe {
        border-radius: 12px;
        width: 100%;
        height: 352px;
        border: none;
    }
    .btn-spotify {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        background: #1DB954;
        color: white;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }
    .btn-spotify:hover {
        background: #1aa34a;
        transform: scale(1.02);
    }
    .btn-spotify svg {
        width: 18px;
        height: 18px;
        fill: white;
    }
</style>

<div style="max-width: 1200px; margin: 0 auto; padding: 0 16px 64px;">

    <!-- ===== HEADER ===== -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-size: 2.25rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; justify-content: center; gap: 12px;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#1DB954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
            </svg>
            Playlist Spotify
        </h1>
        <p style="color: #6b7280; margin-top: 8px;">Musik untuk menemani setiap momenmu</p>
    </div>

    <!-- ===== PLAYLIST GRID ===== -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 24px;">

        <!-- ========================================================== -->
        <!-- PLAYLIST 1: Healing -->
        <!-- ========================================================== -->
        <div class="playlist-card">
            <div class="playlist-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h3>Healing Playlist</h3>
                    <p>Musik untuk menenangkan hati</p>
                </div>
            </div>
            <div class="playlist-body">
                <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX3rxVfibe1L0?utm_source=generator&theme=0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                <div style="display: flex; justify-content: flex-end; margin-top: 12px;">
                    <a href="https://open.spotify.com/playlist/37i9dQZF1DX3rxVfibe1L0" target="_blank" class="btn-spotify">
                        <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.5 15.25c-.18.29-.55.38-.84.2-2.32-1.42-5.24-1.74-8.68-.96-.33.08-.66-.12-.74-.45-.08-.33.12-.66.45-.74 3.72-.84 7.02-.48 9.6 1.12.29.18.38.55.21.83zm.94-2.87c-.22.36-.68.48-1.04.26-2.66-1.64-6.7-2.12-9.85-1.16-.38.12-.78-.08-.9-.46-.12-.38.08-.78.46-.9 3.53-1.08 7.97-.56 10.98 1.34.36.22.48.68.26 1.04zm.08-3.03c-3.15-1.87-8.36-2.04-11.38-1.13-.44.13-.9-.12-1.03-.56-.13-.44.12-.9.56-1.03 3.52-1.06 9.28-.86 12.96 1.36.4.24.54.74.3 1.14-.24.4-.74.54-1.14.3z"/></svg>
                        Open on Spotify
                    </a>
                </div>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- PLAYLIST 2: Motivasi Pagi -->
        <!-- ========================================================== -->
        <div class="playlist-card">
            <div class="playlist-header" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/></svg>
                </div>
                <div>
                    <h3>Motivasi Pagi</h3>
                    <p>Energi untuk memulai hari</p>
                </div>
            </div>
            <div class="playlist-body">
                <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX0UrRvztWcAU?utm_source=generator&theme=0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                <div style="display: flex; justify-content: flex-end; margin-top: 12px;">
                    <a href="https://open.spotify.com/playlist/37i9dQZF1DX0UrRvztWcAU" target="_blank" class="btn-spotify">
                        <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.5 15.25c-.18.29-.55.38-.84.2-2.32-1.42-5.24-1.74-8.68-.96-.33.08-.66-.12-.74-.45-.08-.33.12-.66.45-.74 3.72-.84 7.02-.48 9.6 1.12.29.18.38.55.21.83zm.94-2.87c-.22.36-.68.48-1.04.26-2.66-1.64-6.7-2.12-9.85-1.16-.38.12-.78-.08-.9-.46-.12-.38.08-.78.46-.9 3.53-1.08 7.97-.56 10.98 1.34.36.22.48.68.26 1.04zm.08-3.03c-3.15-1.87-8.36-2.04-11.38-1.13-.44.13-.9-.12-1.03-.56-.13-.44.12-.9.56-1.03 3.52-1.06 9.28-.86 12.96 1.36.4.24.54.74.3 1.14-.24.4-.74.54-1.14.3z"/></svg>
                        Open on Spotify
                    </a>
                </div>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- PLAYLIST 3: Malam Refleksi -->
        <!-- ========================================================== -->
        <div class="playlist-card">
            <div class="playlist-header" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/></svg>
                </div>
                <div>
                    <h3>Malam Refleksi</h3>
                    <p>Untuk malam yang damai</p>
                </div>
            </div>
            <div class="playlist-body">
                <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DWZd79rJ6a7lp?utm_source=generator&theme=0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                <div style="display: flex; justify-content: flex-end; margin-top: 12px;">
                    <a href="https://open.spotify.com/playlist/37i9dQZF1DWZd79rJ6a7lp" target="_blank" class="btn-spotify">
                        <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.5 15.25c-.18.29-.55.38-.84.2-2.32-1.42-5.24-1.74-8.68-.96-.33.08-.66-.12-.74-.45-.08-.33.12-.66.45-.74 3.72-.84 7.02-.48 9.6 1.12.29.18.38.55.21.83zm.94-2.87c-.22.36-.68.48-1.04.26-2.66-1.64-6.7-2.12-9.85-1.16-.38.12-.78-.08-.9-.46-.12-.38.08-.78.46-.9 3.53-1.08 7.97-.56 10.98 1.34.36.22.48.68.26 1.04zm.08-3.03c-3.15-1.87-8.36-2.04-11.38-1.13-.44.13-.9-.12-1.03-.56-.13-.44.12-.9.56-1.03 3.52-1.06 9.28-.86 12.96 1.36.4.24.54.74.3 1.14-.24.4-.74.54-1.14.3z"/></svg>
                        Open on Spotify
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- TIPS SECTION -->
    <!-- ========================================================== -->
    <div style="margin-top: 48px; background: white; border-radius: 20px; padding: 32px; border: 1px solid #f3f4f6; box-shadow: 0 4px 20px rgba(0,0,0,0.02);">
        <div style="text-align: center; margin-bottom: 24px;">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; justify-content: center; gap: 10px;">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/></svg>
                Tips Mendengarkan
            </h3>
            <p style="color: #6b7280;">Untuk pengalaman terbaik</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
            <div style="background: #fce7f3; border-radius: 16px; padding: 20px; text-align: center;">
                <div style="width: 48px; height: 48px; margin: 0 auto 10px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #db2777;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                </div>
                <h4 style="font-weight: 700; color: #1f2937; margin: 0 0 4px;">Gunakan Headphone</h4>
                <p style="font-size: 0.85rem; color: #6b7280; margin: 0;">Nikmati kualitas audio terbaik</p>
            </div>
            <div style="background: #fef3c7; border-radius: 16px; padding: 20px; text-align: center;">
                <div style="width: 48px; height: 48px; margin: 0 auto 10px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #d97706;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.536a5 5 0 010-7.072m-2.828 9.9a9 9 0 010-12.728"/></svg>
                </div>
                <h4 style="font-weight: 700; color: #1f2937; margin: 0 0 4px;">Volume Nyaman</h4>
                <p style="font-size: 0.85rem; color: #6b7280; margin: 0;">Jaga kesehatan telinga Anda</p>
            </div>
            <div style="background: #dbeafe; border-radius: 16px; padding: 20px; text-align: center;">
                <div style="width: 48px; height: 48px; margin: 0 auto 10px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #2563eb;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/></svg>
                </div>
                <h4 style="font-weight: 700; color: #1f2937; margin: 0 0 4px;">Ruang Nyaman</h4>
                <p style="font-size: 0.85rem; color: #6b7280; margin: 0;">Cari tempat yang tenang</p>
            </div>
        </div>
    </div>

    <!-- ===== FOOTER ===== -->
    <div style="text-align: center; margin-top: 40px; font-size: 0.85rem; color: #9ca3af;">
        Playlist ini diambil dari Spotify. Nikmati musik favoritmu! 🎶
    </div>
</div>

@endsection