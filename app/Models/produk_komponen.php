<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk_komponen extends Model
{
    use HasFactory;
    protected $table = 'produk_komponens'; // Nama tabel komponen (sesuaikan dengan nama tabel yang Anda gunakan)
    protected $guarded=[];

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id' ,'id');
    }
}
