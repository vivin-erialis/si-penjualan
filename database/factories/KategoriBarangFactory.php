<?php

namespace Database\Factories;

use App\Models\KategoriBarang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriBarang>
 */
class KategoriBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = KategoriBarang::class;

    public function definition()
    {
        return [
            'kode_kategori' => $this->faker->unique()->randomNumber(),
            'nama_kategori' => $this->faker->word(),
        ];
    }
}
