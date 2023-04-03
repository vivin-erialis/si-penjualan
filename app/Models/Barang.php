<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function kategori()
    {
    	return $this->belongsTo(Kategori::class,'id');
        // return $this->hasOne(Kategori::class,'id');
    	return $this->belongsTo(Kategori::class,'id_kategori');
    }
    

}
