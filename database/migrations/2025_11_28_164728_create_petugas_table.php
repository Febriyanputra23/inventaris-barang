<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('petugas', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('email')->unique();
    $table->string('password');
    $table->string('no_hp')->nullable();
    $table->string('shift')->nullable(); // pagi / siang / malam (opsional)
    $table->string('bagian')->nullable(); // gudang / perpustakaan / lab, dll
    
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
