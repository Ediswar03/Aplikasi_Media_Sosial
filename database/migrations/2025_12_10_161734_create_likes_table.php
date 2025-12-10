<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            // Relasi ke user (siapa yang like)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Relasi ke post (post mana yang di-like)
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();

            // Mencegah duplikasi like (User A tidak bisa like Post B dua kali)
            $table->unique(['user_id', 'post_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};