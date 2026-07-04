<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurahanComment extends Model
{
    use HasFactory;

    protected $fillable = ['curahan_id', 'user_id', 'comment', 'parent_id'];

    public function curahan()
    {
        return $this->belongsTo(Curahan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(CurahanComment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(CurahanComment::class, 'parent_id')->orderBy('created_at', 'asc');
    }

    public function isReply()
    {
        return $this->parent_id !== null;
    }
}