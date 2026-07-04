<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mood_level', 'mood_emoji', 'mood_label', 'note', 'date'];
    protected $casts = ['date' => 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getMoodConfig($level)
    {
        $moods = [
            1 => ['emoji' => '😢', 'label' => 'Sangat Sedih', 'color' => '#DC2626'],
            2 => ['emoji' => '😔', 'label' => 'Sedih', 'color' => '#F59E0B'],
            3 => ['emoji' => '😐', 'label' => 'Biasa Saja', 'color' => '#6B7280'],
            4 => ['emoji' => '😊', 'label' => 'Senang', 'color' => '#10B981'],
            5 => ['emoji' => '😄', 'label' => 'Sangat Senang', 'color' => '#3B82F6'],
        ];
        return $moods[$level] ?? null;
    }

    public function getMoodEmojiAttribute($value)
    {
        return $value ?? '😐';
    }

    public function getMoodLabelAttribute($value)
    {
        return $value ?? 'Biasa Saja';
    }
}