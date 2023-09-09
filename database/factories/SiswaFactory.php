<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun_id' => mt_rand(2, 3),
            'no_induk' => $this->faker->unique()->randomNumber(9, true),
            'nama' => $this->faker->name(),
            'tempat_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->dateTimeBetween('-5 years', '-3 years'),
            'jk_siswa' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
            'nama_ortu' => $this->faker->name(),
            'no_telp' => $this->faker->phoneNumber(),
        ];
    }
}
