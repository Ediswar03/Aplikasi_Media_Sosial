<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    // Relasi: Satu User punya banyak Post
    // Cara panggil: $user->posts
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    // Relasi: Satu User punya banyak Likes (riwayat like user tersebut)
    // Cara panggil: $user->likes
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}