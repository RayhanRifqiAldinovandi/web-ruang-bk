<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaporanKonselingIndividu>
 */
class LaporanKonselingIndividuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama'=>$this->faker->name(),
            'kelas'=>$this->faker->randomElement(['XII IPA 1','XII IPS 1']),
            'tanggal'=>$this->faker->date(),
            'pertemuan_ke'=>1,
            'waktu'=>$this->faker->time(),
            'tempat'=>'Ruang BK',
            'teknik_konseling'=>$this->faker->sentence(),
            'penjelasan'=>$this->faker->sentence(),
            'hasil'=>$this->faker->sentence(),
            'gejala'=>$this->faker->sentence(),
            'tipe_dokumen'=>'rpl_individu'
        ];
    }
}
