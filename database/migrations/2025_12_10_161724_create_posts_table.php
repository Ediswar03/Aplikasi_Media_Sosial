<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('title')->nullable(); // Opsional
            $table->text('body'); // Isi postingan
            $table->string('image')->nullable(); // Jika ada upload gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};