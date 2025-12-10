<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    // Kita butuh user_id dan post_id bisa diisi manual
    protected $fillable = ['user_id', 'post_id'];

    // Relasi: Like ini milik siapa?
    // Cara panggil: $like->user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Like ini untuk post yang mana?
    // Cara panggil: $like->post
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}