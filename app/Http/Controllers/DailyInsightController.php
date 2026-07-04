<?php

namespace App\Http\Controllers;

use App\Models\DailyInsight;
use Illuminate\Http\Request;

class DailyInsightController extends Controller
{
    public function index()
    {
        $randomInsight = DailyInsight::inRandomOrder()->first();

        return view('daily-insight', compact('randomInsight'));
    }
}