<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $fillable = [
        'nama_pengirim',
        'judul',
        'isi',
        'jenis',
        'gambar',
        'tanggal_kirim',
        'banyak_dilihat'
    ];
}
