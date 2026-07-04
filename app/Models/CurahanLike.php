<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurahanLike extends Model
{
    use HasFactory;

    protected $fillable = ['curahan_id', 'user_id'];

    public function curahan()
    {
        return $this->belongsTo(Curahan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}