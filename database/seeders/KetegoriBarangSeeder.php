<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KetegoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\KategoriBarang::factory()->create(
            [
            'kode_kategori' => 'K01',
            'nama_kategori' => 'Kertas Hias',
        ],
    );
    }
}
