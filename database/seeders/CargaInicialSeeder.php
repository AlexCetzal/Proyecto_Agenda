<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CargaInicialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PermisosSeeder::class,
        ]);
    }
}
