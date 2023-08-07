<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function kategoriproduk()
    {
    	// return $this->belongsTo(Kategori::class,'id');
        // return $this->hasOne(Kategori::class,'id');
    	// return $this->belongsTo(KategoriProduk::class,'id_kategori');
        return $this->belongsTo(KategoriProduk::class, 'kode_kategori', 'id');

    }
    public function komponen()
{
    return $this->belongsToMany(Barang::class, 'produk_komponen')->withPivot('jumlah');
}
}
