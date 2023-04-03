<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456')
        ]);
        \App\Models\kategori::factory()->create([
            'kategori_nama' => 'Test-test',
            'kategori_kode' => 'Test',
        ]);
        \App\Models\kategori::factory()->create([
            'kategori_nama' => 'Test-test',
            'kategori_kode' => 'Test',
        ]);
    }
}
