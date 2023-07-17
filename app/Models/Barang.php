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
    	return $this->belongsTo(KategoriBarang::class,'id_kategori');
    }
    public static function generateKodeBarang($jenisBarang)
{
    $lastBarang = self::latest()->first();
    $nomorUrut = $lastBarang ? (int) substr($lastBarang->kode_barang, 3, 3) + 1 : 1;
    $nomorUrutPadded = str_pad($nomorUrut, 3, '0', STR_PAD_LEFT);
    $kodeBarang = 'B' . $jenisBarang . '-' . $nomorUrutPadded;
    return $kodeBarang;
}

    

}
