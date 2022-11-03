<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prodi = ['manajemen', 'akuntansi', 'perbankan syariah'];
        $jk = ['L', 'P'];
        return [
            //
            'kode_dosen' => $this->faker->uuid(4),
            'nidn' => $this->faker->uuid(),
            'nama' => $this->faker->word(4),
            'prodi' => Arr::random($prodi),
            'jenis_kelamin' => Arr::random($jk),
            'nomer_hp' => $this->faker->phoneNumber(),
            'tempat_lahir' => $this->faker->word(4),
            'tanggal_lahir' => $this->faker->date,
            'nik' => $this->faker->uuid(),
        ];
    }
}
