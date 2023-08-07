<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk_komponen extends Model
{
    use HasFactory;
    protected $table = 'komponen'; // Nama tabel komponen (sesuaikan dengan nama tabel yang Anda gunakan)
    protected $fillable = [
        'produk_id',
        'barang_id',
        'jumlah_digunakan',
    ];

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id');
    }
}
