<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nuptk' => $this->faker->unique()->randomNumber(9, true),
            'nama_guru' => $this->faker->name(),
            'jk_guru' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'no_telp' => $this->faker->phoneNumber(),
            'devisi' => $this->faker->randomElement(['Guru', 'Tatausaha']),
            'tgl_lahir' => $this->faker->dateTimeBetween('-40 years', '-25 years'),
            'alamat' => $this->faker->address(),
            'pendidikan' => $this->faker->randomElement(['S1', 'S2']),
        ];
    }
}
