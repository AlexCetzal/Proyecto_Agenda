<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 6,
                'name' => 'Raul',
                'email' => 'ravila@modelo.edu.mx',
                'email_verified_at' => null,
                'password' => '$2y$10$70h2V.OWF1HTD0GWtR61duywA7aJObK7Ig/g.kdFXyag04b.UgeCG',
                'remember_token' => null,
                'created_at' => '2024-11-12 07:07:08',
                'updated_at' => '2024-11-12 07:07:08',
            ]
        ]);
    }
}
