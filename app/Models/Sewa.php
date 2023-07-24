<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function kategoriProduk(){
        return $this->belongsTo(KategoriProduk::class, 'kode_produk', 'id');
    }

}
