<?php

namespace App\Http\Controllers;

use App\Models\Curahan;
use App\Models\Mood;
use App\Models\DailyInsight;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Total curahan user
        $totalCurahan = Curahan::where('user_id', $user->id)->count();

        // Mood hari ini
        $todayMood = Mood::where('user_id', $user->id)
            ->where('date', Carbon::today())
            ->first();
        $todayMoodLabel = $todayMood ? $todayMood->mood_label : 'Belum';

        // Streak
        $streak = $this->calculateStreak($user->id);

        // Insight baru (dalam 7 hari terakhir)
        $newInsights = DailyInsight::where('date', '>=', Carbon::now()->subDays(7))->count();

        // ===== CURAHAN TERBARU (untuk user yang login) =====
        $latestCurahan = Curahan::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        // ===== SEMUA CURAHAN TERBARU (untuk ditampilkan di dashboard) =====
        $allCurahan = Curahan::with(['user', 'likes'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalCurahan',
            'todayMoodLabel',
            'streak',
            'newInsights',
            'latestCurahan',
            'allCurahan'
        ));
    }

    private function calculateStreak($userId)
    {
        $moods = Mood::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->get();

        $streak = 0;
        $currentDate = Carbon::today();

        foreach ($moods as $mood) {
            if ($mood->date->eq($currentDate)) {
                $streak++;
                $currentDate = $currentDate->subDay();
            } else {
                break;
            }
        }

        return $streak;
    }
}