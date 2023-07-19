<?php

namespace Database\Factories;

use App\Models\KategoriProduk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriProduk>
 */
class KategoriProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = KategoriProduk::class;

    public function definition()
    {
        return [
            'kode_kategori' => $this->faker->unique()->randomNumber(),
            'nama_kategori' => $this->faker->word(),
        ];
    }
}
