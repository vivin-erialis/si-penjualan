<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function kategoriproduk()
    {
    	// return $this->belongsTo(Kategori::class,'id');
        // return $this->hasOne(Kategori::class,'id');
    	// return $this->belongsTo(KategoriProduk::class,'id_kategori');
        return $this->belongsTo(Produk::class, 'kode_kategori', 'id');

    }

    public function produk()
    {
    	// return $this->belongsTo(Kategori::class,'id');
        // return $this->hasOne(Kategori::class,'id');
    	// return $this->belongsTo(KategoriProduk::class,'id_kategori');
        return $this->belongsTo(Produk::class, 'kode_kategori', 'id');

    }

    
}
