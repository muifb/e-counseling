<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PerkembanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'siswa_id' => mt_rand(1, 50),
            'tema_id' => mt_rand(1, 6),
            'status_perkembangan' => $this->faker->sentence(3),
            'keterangan' => collect($this->faker->paragraphs(mt_rand(2, 4)))
                ->map(function ($paragraph) {
                    return "<p>$paragraph</p>";
                })
                ->implode(''),
            'tanggal' => $this->faker->date(),
            // 'keterangan' => collect($this->faker->paragraphs(mt_rand(2, 4)))
            //     ->map(fn ($paragraph) => "<p>$paragraph</p>")
            //     ->implode(''),
        ];
    }
}
