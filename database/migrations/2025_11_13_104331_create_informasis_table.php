<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informasis', function (Blueprint $table) {
            $table->id();

            // Pengirim informasi (admin atau staf)
            $table->string('nama_pengirim');

            // Isi informasi
            $table->string('judul');
            $table->text('isi')->nullable();

            // Jenis kategori informasi
            $table->enum('jenis', ['PENTING', 'DOKUMEN', 'LAINNYA'])->default('LAINNYA');

            // Gambar opsional
            $table->string('gambar')->nullable();

            // Waktu pengiriman otomatis
            $table->dateTime('tanggal_kirim')->useCurrent();

            // Counter banyak dilihat
            $table->unsignedBigInteger('banyak_dilihat')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasis');
    }
};
