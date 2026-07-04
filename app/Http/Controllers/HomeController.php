<?php

namespace App\Http\Controllers;

use App\Models\Curahan;
use App\Models\KataMutiara;
use App\Models\DailyInsight;
use App\Models\Mood;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalCurahans = Curahan::count();
        $totalUsers = \App\Models\User::count();
        $totalMutiaras = KataMutiara::count();
        $todayInsight = DailyInsight::where('date', today())->first();
        $randomQuote = KataMutiara::inRandomOrder()->first();

        return view('welcome', compact('totalCurahans', 'totalUsers', 'totalMutiaras', 'todayInsight', 'randomQuote'));
    }
}