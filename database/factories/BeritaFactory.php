<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'judul' => $this->faker->word(4),
            'isi' => $this->faker->sentence(),
            'penulis' => $this->faker->name(),
            'gambar_url' => $this->faker->imageURL()
        ];
    }
}
