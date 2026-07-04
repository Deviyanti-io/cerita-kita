@extends('layouts.app')

@section('title', 'Mood Tracker')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 0 16px 64px;">

    <!-- Header -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-size: 2.25rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; justify-content: center; gap: 12px;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Mood Tracker
        </h1>
        <p style="color: #6b7280; margin-top: 8px;">Lacak perasaanmu setiap hari</p>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 12px; margin-bottom: 16px; display: flex; align-items: center; gap: 12px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div style="background: #fee2e2; color: #991b1b; padding: 12px 16px; border-radius: 12px; margin-bottom: 16px; display: flex; align-items: center; gap: 12px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('error') }}
        </div>
    @endif

    <!-- ========================================================== -->
    <!-- STATISTIK - KARTU MENDATAR -->
    <!-- ========================================================== -->
    <div style="display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: 32px;">
        
        <!-- Kartu 1 -->
        <div style="flex: 1 1 calc(25% - 16px); min-width: 180px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 16px 20px; display: flex; align-items: center; gap: 16px; border: 1px solid #f3f4f6;">
            <div style="width: 48px; height: 48px; border-radius: 50%; background: #fce7f3; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#db2777" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <p style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin: 0;">{{ $totalEntries }}</p>
                <p style="font-size: 0.9rem; font-weight: 600; color: #1f2937; margin: 0;">Total Catatan</p>
                <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">Semua moodmu</p>
            </div>
        </div>

        <!-- Kartu 2 -->
        <div style="flex: 1 1 calc(25% - 16px); min-width: 180px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 16px 20px; display: flex; align-items: center; gap: 16px; border: 1px solid #f3f4f6;">
            <div style="width: 48px; height: 48px; border-radius: 50%; background: #f3e8ff; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#9333ea" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin: 0;">{{ $averageMood }}</p>
                <p style="font-size: 0.9rem; font-weight: 600; color: #1f2937; margin: 0;">Rata-rata Mood</p>
                <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">Dari semua catatan</p>
            </div>
        </div>

        <!-- Kartu 3 -->
        <div style="flex: 1 1 calc(25% - 16px); min-width: 180px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 16px 20px; display: flex; align-items: center; gap: 16px; border: 1px solid #f3f4f6;">
            <div style="width: 48px; height: 48px; border-radius: 50%; background: #ffedd5; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ea580c" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/></svg>
            </div>
            <div>
                <p style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin: 0;">{{ $streak }}</p>
                <p style="font-size: 0.9rem; font-weight: 600; color: #1f2937; margin: 0;">Streak Hari</p>
                <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">Berturut-turut</p>
            </div>
        </div>

        <!-- Kartu 4 -->
        <div style="flex: 1 1 calc(25% - 16px); min-width: 180px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 16px 20px; display: flex; align-items: center; gap: 16px; border: 1px solid #f3f4f6;">
            <div style="width: 48px; height: 48px; border-radius: 50%; background: #fef9c3; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ca8a04" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
            <div>
                <p style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin: 0;">{{ $bestMonth }}</p>
                <p style="font-size: 0.9rem; font-weight: 600; color: #1f2937; margin: 0;">Bulan Terbaik</p>
                <p style="font-size: 0.75rem; color: #9ca3af; margin: 0;">Mood tertinggi</p>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FORM MOOD HARI INI -->
    <!-- ========================================================== -->
    <div style="background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); padding: 32px; margin-bottom: 32px; border: 1px solid #e5e7eb;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            {{ Carbon\Carbon::today()->format('l, d F Y') }}
        </h2>

        @if($todayMood)
            <div style="background: #f0fdf4; border-radius: 12px; padding: 16px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #bbf7d0;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <span style="font-size: 2.5rem;">{{ $todayMood->mood_emoji }}</span>
                    <div>
                        <p style="font-weight: 700; color: #1f2937; margin: 0;">{{ $todayMood->mood_label }}</p>
                        @if($todayMood->note)
                            <p style="font-size: 0.9rem; color: #6b7280; margin: 0;">"{{ $todayMood->note }}"</p>
                        @endif
                    </div>
                </div>
                <form action="{{ route('mood.destroy', $todayMood) }}" method="POST" onsubmit="return confirm('Hapus mood hari ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: #f87171; cursor: pointer; font-size: 0.9rem; display: flex; align-items: center; gap: 4px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Hapus
                    </button>
                </form>
            </div>
        @else
            <form action="{{ route('mood.store') }}" method="POST">
                @csrf
                <p style="color: #4b5563; margin-bottom: 16px;">Bagaimana perasaanmu hari ini?</p>
                
                <!-- ===== PILIHAN MOOD - EMOJI DI TENGAH ===== -->
                <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 16px; justify-content: center;">
                    @for($i = 1; $i <= 5; $i++)
                        @php 
                            $config = App\Models\Mood::getMoodConfig($i);
                            $bgColors = ['#FEE2E2', '#FEF3C7', '#F3F4F6', '#D1FAE5', '#DBEAFE'];
                        @endphp
                        <label style="cursor: pointer; flex: 1; min-width: 70px; max-width: 100px; text-align: center;">
                            <input type="radio" name="mood_level" value="{{ $i }}" required style="display: none;" class="mood-radio">
                            <div style="padding: 12px 8px; border-radius: 12px; border: 2px solid #e5e7eb; text-align: center; background: {{ $bgColors[$i-1] }}; transition: all 0.2s; display: flex; flex-direction: column; align-items: center; justify-content: center;" class="mood-option">
                                <div style="font-size: 2.5rem; line-height: 1; text-align: center;">{{ $config['emoji'] }}</div>
                                <p style="font-size: 0.7rem; color: #4b5563; margin-top: 4px; font-weight: 500; text-align: center; width: 100%;">{{ $config['label'] }}</p>
                            </div>
                        </label>
                    @endfor
                </div>

                <textarea name="note" rows="2" style="width: 100%; padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 12px; resize: vertical; outline: none; font-size: 1rem;" placeholder="Catatan (opsional)"></textarea>
                
                <!-- ===== TOMBOL SIMPAN MOOD ===== -->
                <button type="submit" style="margin-top: 16px; padding: 14px 44px; background: linear-gradient(135deg, #ec4899, #a855f7); color: white; font-weight: 700; font-size: 1rem; border: none; border-radius: 12px; cursor: pointer; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35); transition: all 0.2s;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    Simpan Mood
                </button>
            </form>
        @endif
    </div>

    <!-- ========================================================== -->
    <!-- GRAFIK -->
    <!-- ========================================================== -->
    <div style="background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); padding: 24px; margin-bottom: 32px; border: 1px solid #e5e7eb;">
        <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            Pola Mood 7 Hari Terakhir
        </h3>
        <canvas id="moodChart" height="200"></canvas>
    </div>

    <!-- ========================================================== -->
    <!-- RIWAYAT -->
    <!-- ========================================================== -->
    <div style="background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); padding: 24px; border: 1px solid #e5e7eb;">
        <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Riwayat Mood
        </h3>
        @forelse($moodHistory as $mood)
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f3f4f6;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <span style="font-size: 2rem;">{{ $mood->mood_emoji }}</span>
                    <div>
                        <p style="font-weight: 600; color: #1f2937; margin: 0;">{{ $mood->mood_label }}</p>
                        <p style="font-size: 0.85rem; color: #9ca3af; margin: 0;">{{ $mood->date->format('d F Y') }}</p>
                    </div>
                </div>
                @if($mood->note)
                    <p style="font-size: 0.9rem; color: #6b7280; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">"{{ $mood->note }}"</p>
                @endif
            </div>
        @empty
            <p style="text-align: center; color: #6b7280; padding: 32px 0;">Belum ada catatan mood. Yuk, catat hari ini!</p>
        @endforelse
    </div>
</div>

<script>
// ============================================================
// SCRIPT UNTUK PILIHAN MOOD (HIGHLIGHT)
// ============================================================
document.querySelectorAll('.mood-radio').forEach(function(radio) {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.mood-option').forEach(function(opt) {
            opt.style.borderColor = '#e5e7eb';
        });
        if (this.checked) {
            var parent = this.closest('label');
            var option = parent.querySelector('.mood-option');
            option.style.borderColor = '#ec4899';
            option.style.background = '#fdf2f8';
        }
    });
});

// ============================================================
// CHART.JS
// ============================================================
document.addEventListener('DOMContentLoaded', function() {
    const chartData = @json($chartData);

    if (chartData.length > 0) {
        const ctx = document.getElementById('moodChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.map(d => d.date),
                datasets: [{
                    label: 'Level Mood',
                    data: chartData.map(d => d.level),
                    borderColor: '#8b5cf6',
                    backgroundColor: 'rgba(139, 92, 246, 0.08)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 6,
                    pointBackgroundColor: 'white',
                    pointBorderColor: '#8b5cf6',
                    pointBorderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Level: ' + context.parsed.y;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                const labels = ['', '😢', '😔', '😐', '😊', '😄'];
                                return labels[value] || value;
                            }
                        }
                    }
                }
            }
        });
    } else {
        document.getElementById('moodChart').innerHTML = '<p style="color: #9ca3af; text-align: center; padding: 32px 0;">Belum ada data mood untuk ditampilkan.</p>';
    }
});
</script>

<style>
.mood-option {
    transition: all 0.2s ease;
}
.mood-option:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
</style>
@endsection