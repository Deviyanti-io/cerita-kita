<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function kataMutiaras()
{
    return $this->hasMany(KataMutiara::class);
}

public function moods()
{
    return $this->hasMany(Mood::class);
}

public function curahans()
{
    return $this->hasMany(Curahan::class);
}

public function curahanLikes()
{
    return $this->hasMany(CurahanLike::class);
}

public function curahanComments()
{
    return $this->hasMany(CurahanComment::class);
}
}
