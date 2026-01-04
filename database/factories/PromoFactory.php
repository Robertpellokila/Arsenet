<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipe = $this->faker->randomElement(['persen', 'nominal']);

    return [
        'judul' => $this->faker->sentence(3),
        'kode_promo' => strtoupper(Str::random(8)),
        'deskripsi' => $this->faker->sentence(),
        'tipe_diskon' => $tipe,
        'nilai_diskon' => $tipe === 'persen'
            ? $this->faker->numberBetween(5, 50)
            : $this->faker->numberBetween(10000, 50000),
        'maks_diskon' => $tipe === 'persen'
            ? $this->faker->numberBetween(20000, 50000)
            : null,
        'min_transaksi' => $this->faker->numberBetween(50000, 150000),
        'mulai' => now()->subDays(2),
        'berakhir' => now()->addDays(7),
        'kuota' => 100,
        'digunakan' => 0,
        'is_active' => true,
    ];
    }
}
