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
                'id' => 3,
                'name' => 'lucas',
                'email' => 'gantPruebas@test.mx',
                'email_verified_at' => null,
                'password' => '$2y$10$H8u3m2NQ.7fFJ0bpUGW0x.fo9lA2tLxTbDVApZTe1kK7NKMWVOLSG',
                'remember_token' => null,
                'created_at' => '2024-11-10 21:49:38',
                'updated_at' => '2024-11-10 21:49:38',
            ],
            [
                'id' => 4,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$QR0dKs.AUMFr/zuO/piYZuZEWubD.oP5m/3oCOM89WUeZi2cM3KIC',
                'remember_token' => null,
                'created_at' => '2024-11-10 21:51:50',
                'updated_at' => '2024-11-10 21:51:50',
            ],
            [
                'id' => 5,
                'name' => 'alberto',
                'email' => 'albertoL@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$rnj/xGAWoHuNRgryi4KVHefGLFsB.eKLXOo7JIHOv8jalDxGSZAmq',
                'remember_token' => null,
                'created_at' => '2024-11-12 07:07:08',
                'updated_at' => '2024-11-12 07:07:08',
            ],
            [
                'id' => 6,
                'name' => 'admin2',
                'email' => 'admin2@hormail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$p1bDSdAec4SR048kQdu76OpAW7RkTx8FaDN6ct2NcJhtlpGm0.T0y',
                'remember_token' => null,
                'created_at' => '2024-11-12 07:07:08',
                'updated_at' => '2024-11-12 07:07:08',
            ]
        ]);
    }
}
