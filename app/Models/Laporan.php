<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'status',
        'gambar',
        'nama_fakultas',
        'nama_prodi',
        'nama_lokasi',
        'tanggal_lapor',
        'tanggal_selesai',
        'view_count'
    ];

    // protected $casts = [
    //     'tanggal_lapor' => 'datetime',
    //     'tanggal_selesai' => 'datetime',
    // ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filter)
    {
        if ($filter == 'baru') {
            return $query->where('status', 'menunggu');
        }

        if ($filter == 'milik') {
            return $query->where('user_id', auth()->id());
        }

        if ($filter == 'kategori' && request('kategori')) {
            return $query->where('nama_fakultas', request('kategori'));
        }

        return $query;
    }
}
