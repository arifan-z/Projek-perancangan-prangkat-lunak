<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('judul');
            $table->text('isi');
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu');

            $table->string('gambar')->nullable(); // upload foto bukti laporan
            $table->string('nama_fakultas')->nullable();
            $table->string('nama_prodi')->nullable();
            $table->string('nama_lokasi')->nullable();

            $table->dateTime('tanggal_lapor')->default(now());
            $table->dateTime('tanggal_selesai')->nullable();

            $table->integer('view-count')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
