<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KetegoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        KategoriProduk::factory(1)->create();
        \App\Models\KategoriProduk::factory()->create(
            [
            'kode_kategori' => 'P01',
            'nama_kategori' => 'Buket Uang',
        ],
    );
    }
}
