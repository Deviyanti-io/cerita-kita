<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curahan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'is_anonymous'];
    protected $casts = ['is_anonymous' => 'boolean'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(CurahanLike::class);
    }

    public function allComments()
    {
        return $this->hasMany(CurahanComment::class);
    }

    public function comments()
    {
        return $this->hasMany(CurahanComment::class)->whereNull('parent_id')->orderBy('created_at', 'desc');
    }

    public function isLikedBy($user)
    {
        if (!$user) return false;
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }

    public function commentsCount()
    {
        return $this->allComments()->count();
    }

    public function isOwnedBy($user)
    {
        if (!$user) return false;
        return $this->user_id === $user->id;
    }

    public function getDisplayNameAttribute()
    {
        return $this->is_anonymous ? 'Anonim' : $this->user->name;
    }
}