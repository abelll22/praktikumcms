<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->sentence(),
            'id_pemasok' => $this->faker->randomNumber(3),
            'stok_barang' => $this->faker->numberBetween(10, 100),
            'pesanan_barang' => $this->faker->numberBetween(1, 50),
        ];
    }
}
