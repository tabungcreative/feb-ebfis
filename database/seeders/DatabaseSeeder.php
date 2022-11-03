<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Berita::factory(100)->create();
        Dosen::factory(20)->create();
    }
}
