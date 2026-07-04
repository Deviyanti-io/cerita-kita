@extends('layouts.app')

@section('title', 'Daily Insight')

@section('content')
<style>
    .bg-option {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.2s;
        background-size: cover;
        background-position: center;
    }
    .bg-option:hover {
        transform: scale(1.05);
    }
    .bg-option.active {
        border-color: #ec4899 !important;
        box-shadow: 0 0 0 2px #ec4899 !important;
    }
    .preview-card {
        transition: all 0.3s ease;
        border-radius: 20px;
        padding: 40px 32px;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .preview-card .quote-text {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.6rem;
        font-style: italic;
        line-height: 1.8;
        max-width: 500px;
        color: #ffffff !important;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5), 0 4px 12px rgba(0,0,0,0.3), 0 8px 24px rgba(0,0,0,0.2) !important;
        position: relative;
        z-index: 2;
    }
    .preview-card .quote-author {
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        color: rgba(255,255,255,0.9) !important;
        margin-top: 16px;
        letter-spacing: 1px;
        position: relative;
        z-index: 2;
        text-shadow: 0 2px 8px rgba(0,0,0,0.4);
    }
    .preview-card .watermark {
        position: absolute;
        bottom: 16px;
        right: 24px;
        font-size: 0.75rem;
        color: rgba(255,255,255,0.25);
        font-family: 'Poppins', sans-serif;
        letter-spacing: 2px;
        z-index: 2;
    }
    .preview-card .overlay {
        position: absolute;
        inset: 0;
        border-radius: 20px;
        background: rgba(0,0,0,0.35) !important;
        z-index: 1;
    }
    .preview-card .quote-mark {
        font-size: 5rem;
        color: rgba(255,255,255,0.08);
        font-family: Georgia, serif;
        position: absolute;
        z-index: 1;
    }
    .btn-instagram {
        background: linear-gradient(135deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        transition: all 0.2s;
    }
    .btn-instagram:hover {
        opacity: 0.85;
        transform: scale(1.02);
    }
</style>

<div style="max-width: 800px; margin: 0 auto; padding: 0 16px 64px;">

    <!-- Header -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-size: 2.25rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; justify-content: center; gap: 12px;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                <path d="M12 8v4l3 3"/>
            </svg>
            Daily Insight
        </h1>
        <p style="color: #6b7280; margin-top: 8px;">Renungan harian untuk jiwa yang lebih tenang</p>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 12px; margin-bottom: 16px; display: flex; align-items: center; gap: 12px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- ========================================================== -->
    <!-- INSIGHT CARD -->
    <!-- ========================================================== -->
    <div style="background: white; border-radius: 24px; box-shadow: 0 4px 24px rgba(0,0,0,0.04); padding: 48px 32px; margin-bottom: 32px; border: 1px solid #e5e7eb; position: relative; overflow: hidden;">
        
        <div style="position: absolute; top: 8px; left: 20px; font-size: 7rem; color: #fef3c7; font-family: Georgia, serif; line-height: 1; opacity: 0.6;">"</div>
        <div style="position: absolute; bottom: 8px; right: 20px; font-size: 7rem; color: #fef3c7; font-family: Georgia, serif; line-height: 1; opacity: 0.6; transform: rotate(180deg);">"</div>

        <div style="position: relative; z-index: 1; text-align: center;">
            <div style="width: 64px; height: 64px; margin: 0 auto 20px; background: linear-gradient(135deg, #fbbf24, #f59e0b); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                    <path d="M12 8v4l3 3"/>
                </svg>
            </div>

            @if($randomInsight)
                <p style="font-size: 1.65rem; font-family: 'Playfair Display', Georgia, serif; font-style: italic; color: #1f2937; line-height: 1.7; max-width: 600px; margin: 0 auto 20px;">
                    "{{ $randomInsight->insight }}"
                </p>

                <!-- Tombol -->
                <div style="display: flex; flex-wrap: wrap; gap: 12px; justify-content: center; margin: 16px 0 8px;">
                    
                    <button onclick="copyInsight()" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #f3f4f6; color: #1f2937; border: none; border-radius: 50px; font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.background='#e5e7eb';" onmouseout="this.style.background='#f3f4f6';">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                        Salin
                    </button>

                    <a href="https://wa.me/?text={{ urlencode('"'.$randomInsight->insight.'" - dari Cerita Kita') }}" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #25D366; color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 0.9rem; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.opacity='0.85';" onmouseout="this.style.opacity='1';">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="white" stroke="white" stroke-width="2"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884z"/></svg>
                        WhatsApp
                    </a>

                    <a href="https://twitter.com/intent/tweet?text={{ urlencode('"'.$randomInsight->insight.'" - dari Cerita Kita') }}" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #000000; color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 0.9rem; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.opacity='0.8';" onmouseout="this.style.opacity='1';">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="white" stroke="white" stroke-width="1.5"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        X
                    </a>

                    <button onclick="shareToInstagram()" class="btn-instagram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/></svg>
                        Instagram
                    </button>

                    <button onclick="openDownloadModal()" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #8b5cf6; color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.opacity='0.85';" onmouseout="this.style.opacity='1';">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Download
                    </button>
                </div>

                <!-- Insight Baru -->
                <div style="margin-top: 20px;">
                    <a href="{{ route('insight') }}" style="display: inline-flex; align-items: center; gap: 10px; padding: 14px 40px; background: linear-gradient(135deg, #f59e0b, #d97706); color: white; font-weight: 600; font-size: 1rem; border-radius: 50px; text-decoration: none; box-shadow: 0 4px 16px rgba(245, 158, 11, 0.3); transition: all 0.2s; border: none; cursor: pointer;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        Insight Baru
                    </a>
                </div>
            @else
                <p style="color: #6b7280; font-size: 1.1rem;">Belum ada insight tersedia.</p>
                <a href="{{ route('insight') }}" style="display: inline-block; margin-top: 16px; padding: 12px 32px; background: linear-gradient(135deg, #f59e0b, #d97706); color: white; font-weight: 600; border-radius: 50px; text-decoration: none;">Refresh</a>
            @endif
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- INFO CARDS -->
    <!-- ========================================================== -->
    <div style="display: flex; flex-wrap: wrap; gap: 16px;">
        <div style="flex: 1 1 calc(33.33% - 16px); min-width: 160px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); padding: 24px 20px; text-align: center; border: 1px solid #f3f4f6; transition: all 0.2s;">
            <div style="width: 48px; height: 48px; margin: 0 auto 12px; background: #fce7f3; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#db2777" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <p style="font-weight: 700; color: #1f2937; margin: 0;">Renungan</p>
            <p style="font-size: 0.85rem; color: #6b7280; margin: 4px 0 0;">Untuk jiwa yang lebih tenang</p>
        </div>

        <div style="flex: 1 1 calc(33.33% - 16px); min-width: 160px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); padding: 24px 20px; text-align: center; border: 1px solid #f3f4f6; transition: all 0.2s;">
            <div style="width: 48px; height: 48px; margin: 0 auto 12px; background: #fef3c7; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
            <p style="font-weight: 700; color: #1f2937; margin: 0;">Inspirasi</p>
            <p style="font-size: 0.85rem; color: #6b7280; margin: 4px 0 0;">Untuk hidup lebih bermakna</p>
        </div>

        <div style="flex: 1 1 calc(33.33% - 16px); min-width: 160px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); padding: 24px 20px; text-align: center; border: 1px solid #f3f4f6; transition: all 0.2s;">
            <div style="width: 48px; height: 48px; margin: 0 auto 12px; background: #dbeafe; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <p style="font-weight: 700; color: #1f2937; margin: 0;">Motivasi</p>
            <p style="font-size: 0.85rem; color: #6b7280; margin: 4px 0 0;">Untuk langkah lebih maju</p>
        </div>
    </div>

</div>

<!-- ========================================================== -->
<!-- MODAL DOWNLOAD -->
<!-- ========================================================== -->
<div id="downloadModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); backdrop-filter: blur(8px); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: white; border-radius: 24px; max-width: 600px; width: 100%; max-height: 90vh; overflow-y: auto; padding: 32px; box-shadow: 0 20px 60px rgba(0,0,0,0.2);">
        
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h2 style="font-size: 1.3rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; gap: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Download Kutipan
            </h2>
            <button onclick="closeDownloadModal()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #9ca3af;">&times;</button>
        </div>

        <!-- Preview -->
        <div style="margin-bottom: 20px;">
            <div id="previewCard" style="border-radius: 20px; padding: 40px 32px; min-height: 280px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; position: relative; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); background-size: cover; background-position: center;">
                <div style="position: absolute; inset: 0; border-radius: 20px; background: rgba(0,0,0,0.35); z-index: 1;"></div>
                <div style="position: absolute; top: 16px; left: 24px; font-size: 5rem; color: rgba(255,255,255,0.08); font-family: Georgia, serif; z-index: 1; line-height: 1;">"</div>
                <div style="position: absolute; bottom: 16px; right: 24px; font-size: 5rem; color: rgba(255,255,255,0.08); font-family: Georgia, serif; z-index: 1; line-height: 1; transform: rotate(180deg);">"</div>
                <div id="previewQuote" style="position: relative; z-index: 2; font-family: 'Playfair Display', Georgia, serif; font-size: 1.6rem; font-style: italic; line-height: 1.8; max-width: 500px; color: #ffffff !important; text-shadow: 0 2px 4px rgba(0,0,0,0.5), 0 4px 12px rgba(0,0,0,0.3), 0 8px 24px rgba(0,0,0,0.2) !important;">
                    "{{ $randomInsight ? $randomInsight->insight : 'Kutipan tidak tersedia' }}"
                </div>
                <div style="position: relative; z-index: 2; font-family: 'Poppins', sans-serif; font-size: 1rem; color: rgba(255,255,255,0.9) !important; margin-top: 16px; letter-spacing: 1px; text-shadow: 0 2px 8px rgba(0,0,0,0.4);">
                    — Cerita Kita
                </div>
                <div style="position: absolute; bottom: 16px; right: 24px; font-size: 0.75rem; color: rgba(255,255,255,0.25); font-family: 'Poppins', sans-serif; letter-spacing: 2px; z-index: 2;">
                    ✦ Cerita Kita
                </div>
            </div>
        </div>

        <!-- Pilihan Background -->
        <div style="margin-bottom: 20px;">
            <p style="font-weight: 600; color: #1f2937; margin-bottom: 12px;">Pilih Latar Belakang:</p>
            <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center;" id="bgOptions">
                
                <!-- Gradien 1 -->
                <div class="bg-option active" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" data-bg="linear-gradient(135deg, #667eea 0%, #764ba2 100%)" onclick="selectBg(this)"></div>
                <!-- Gradien 2 -->
                <div class="bg-option" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);" data-bg="linear-gradient(135deg, #f093fb 0%, #f5576c 100%)" onclick="selectBg(this)"></div>
                <!-- Gradien 3 -->
                <div class="bg-option" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);" data-bg="linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)" onclick="selectBg(this)"></div>
                <!-- Gradien 4 -->
                <div class="bg-option" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);" data-bg="linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)" onclick="selectBg(this)"></div>
                <!-- Gradien 5 -->
                <div class="bg-option" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);" data-bg="linear-gradient(135deg, #fa709a 0%, #fee140 100%)" onclick="selectBg(this)"></div>
                <!-- Gradien 6 -->
                <div class="bg-option" style="background: linear-gradient(135deg, #f12711 0%, #f5af19 100%);" data-bg="linear-gradient(135deg, #f12711 0%, #f5af19 100%)" onclick="selectBg(this)"></div>
                <!-- Gradien 7 -->
                <div class="bg-option" style="background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);" data-bg="linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%)" onclick="selectBg(this)"></div>
                
                <!-- Solid -->
                <div class="bg-option" style="background: #1f2937;" data-bg="#1f2937" onclick="selectBg(this)"></div>
                <div class="bg-option" style="background: #831843;" data-bg="#831843" onclick="selectBg(this)"></div>
                <div class="bg-option" style="background: #0d9488;" data-bg="#0d9488" onclick="selectBg(this)"></div>
                
                <!-- Upload -->
                <label class="bg-option" style="background: #f3f4f6; border: 2px dashed #d1d5db; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; cursor: pointer;" onmouseover="this.style.background='#e5e7eb';" onmouseout="this.style.background='#f3f4f6';">
                    <span style="color: #6b7280;">+</span>
                    <input type="file" accept="image/*" style="display: none;" onchange="uploadBg(event)">
                </label>
            </div>
            <p style="font-size: 0.75rem; color: #9ca3af; margin-top: 8px;">Klik + untuk upload gambar custom</p>
        </div>

        <!-- Download Button -->
        <button onclick="downloadImage()" style="width: 100%; padding: 14px; background: linear-gradient(135deg, #8b5cf6, #6d28d9); color: white; font-weight: 700; font-size: 1rem; border: none; border-radius: 12px; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 14px rgba(139, 92, 246, 0.3);" onmouseover="this.style.opacity='0.9';" onmouseout="this.style.opacity='1';">
            <span style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Unduh Gambar
            </span>
        </button>

        <button onclick="closeDownloadModal()" style="width: 100%; margin-top: 8px; padding: 10px; background: none; border: none; color: #6b7280; cursor: pointer; font-size: 0.9rem;">Batal</button>
    </div>
</div>

<!-- ========================================================== -->
<!-- SCRIPTS -->
<!-- ========================================================== -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    // Variabel global
    let selectedBg = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
    let customBgImage = null;

    // Pilih background
    function selectBg(element) {
        // Reset semua
        document.querySelectorAll('.bg-option').forEach(el => {
            el.classList.remove('active');
        });
        // Aktifkan yang dipilih
        element.classList.add('active');
        
        const bgValue = element.getAttribute('data-bg');
        if (bgValue) {
            selectedBg = bgValue;
            customBgImage = null;
            updatePreview();
        }
    }

    // Upload custom
    function uploadBg(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                customBgImage = e.target.result;
                selectedBg = `url(${customBgImage})`;
                // Reset semua
                document.querySelectorAll('.bg-option').forEach(el => {
                    el.classList.remove('active');
                });
                // Aktifkan label upload
                event.target.closest('.bg-option').classList.add('active');
                updatePreview();
            };
            reader.readAsDataURL(file);
        }
    }

    // Update preview
    function updatePreview() {
        const preview = document.getElementById('previewCard');
        if (customBgImage) {
            preview.style.backgroundImage = `url(${customBgImage})`;
            preview.style.backgroundSize = 'cover';
            preview.style.backgroundPosition = 'center';
            preview.style.background = '';
        } else {
            preview.style.background = selectedBg;
            preview.style.backgroundImage = '';
        }
    }

    // Buka modal
    function openDownloadModal() {
        document.getElementById('downloadModal').style.display = 'flex';
        // Reset ke default
        const preview = document.getElementById('previewCard');
        preview.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
        preview.style.backgroundImage = '';
        document.querySelectorAll('.bg-option').forEach(el => {
            el.classList.remove('active');
        });
        const firstOption = document.querySelector('.bg-option');
        if (firstOption) {
            firstOption.classList.add('active');
        }
        selectedBg = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
        customBgImage = null;
        document.body.style.overflow = 'hidden';
    }

    // Tutup modal
    function closeDownloadModal() {
        document.getElementById('downloadModal').style.display = 'none';
        document.body.style.overflow = '';
    }

    // Download gambar
    function downloadImage() {
        const preview = document.getElementById('previewCard');
        html2canvas(preview, {
            scale: 2,
            useCORS: true,
            allowTaint: true,
            backgroundColor: null,
            logging: false,
        }).then(canvas => {
            const link = document.createElement('a');
            link.download = 'cerita-kita-insight.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        }).catch(err => {
            alert('Gagal mengunduh gambar. Silakan coba lagi.');
            console.error(err);
        });
    }

    // Share ke Instagram
    function shareToInstagram() {
        const modal = document.getElementById('downloadModal');
        if (modal.style.display !== 'flex') {
            openDownloadModal();
            setTimeout(() => {
                alert('📸 Download gambar terlebih dahulu, lalu bagikan ke Instagram Story atau Feed!');
            }, 500);
        } else {
            downloadImage();
            setTimeout(() => {
                alert('📸 Gambar berhasil diunduh! Silakan bagikan ke Instagram Story atau Feed.');
            }, 1000);
        }
    }

    // Copy insight
    function copyInsight() {
        const quote = @json($randomInsight ? $randomInsight->insight : '');
        if (!quote) return;
        const text = '"' + quote + '" - dari Cerita Kita';
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(() => {
                alert('✅ Kutipan berhasil disalin!');
            }).catch(() => {
                fallbackCopy(text);
            });
        } else {
            fallbackCopy(text);
        }
    }

    function fallbackCopy(text) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.select();
        try {
            document.execCommand('copy');
            alert('✅ Kutipan berhasil disalin!');
        } catch (err) {
            alert('❌ Gagal menyalin, silakan salin manual.');
        }
        document.body.removeChild(textarea);
    }

    // Event listeners
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDownloadModal();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('downloadModal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeDownloadModal();
                }
            });
        }
        // Set default active
        const firstOption = document.querySelector('.bg-option');
        if (firstOption) {
            firstOption.classList.add('active');
        }
    });
</script>
@endsection