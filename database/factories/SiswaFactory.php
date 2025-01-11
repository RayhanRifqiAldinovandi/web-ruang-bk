<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
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
            'nama_siswa' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'kelas_id'=> 1,
            'jenis_kelamin' =>$this->faker->randomElement(['Laki-Laki','Perempuan']),
            'nomor_ortu'=> $this->faker->phoneNumber()
        ];
    }
}
