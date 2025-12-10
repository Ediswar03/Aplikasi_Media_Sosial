<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    // Mengizinkan pengisian data ini secara langsung (create/update)
    protected $fillable = ['user_id', 'title', 'body', 'image'];

    // Relasi: Post dimiliki oleh satu User
    // Cara panggil: $post->user->name
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Post memiliki banyak Likes
    // Cara panggil: $post->likes->count()
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
    
    // Helper: Cek apakah post ini sudah di-like oleh user tertentu?
    // Cara panggil: $post->isLikedBy(auth()->user())
    public function isLikedBy(?User $user): bool
    {
        if (!$user) return false;
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}