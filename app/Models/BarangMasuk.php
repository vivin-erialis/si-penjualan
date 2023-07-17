<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BarangMasuk extends Model
{
    use HasFactory;

    protected $guarded=[];
    

//     public function barangs()
// {
//     return $this->belongsTo(Barang::class, 'id_barang');
// }

public function save(array $options = [])
{
    DB::beginTransaction();

    try {
        parent::save($options);
        
        // Update stok pada tabel barang
        $barang = $this->barang;
        $barang->stok += $this->jumlah;
        $barang->save();
        
        DB::commit();
    } catch (Exception $e) {
        DB::rollback();
        throw $e;
    }
}

}
