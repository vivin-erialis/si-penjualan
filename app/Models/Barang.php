<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategoribarang()
    {
    	// return $this->belongsTo(Kategori::class,'id');
        // return $this->hasOne(Kategori::class,'id');
    	return $this->belongsTo(KategoriBarang::class,'kode_kategori', 'id');

    }
    public function barang()
    {
    	// return $this->belongsTo(Kategori::class,'id');
        // return $this->hasOne(Kategori::class,'id');
        return $this->hasMany(BarangMasuk::class, 'nama_barang', 'id');
        return $this->hasMany(BarangKeluar::class, 'nama_barang', 'id');
        return $this->hasMany(Transaksi::class, 'nama_barang', 'id');


    }
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'produk_komponen')->withPivot('jumlah');
    }



}
