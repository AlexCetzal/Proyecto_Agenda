<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->insert([
            [
                'id' => 35,
                'user_id' => 6,
                'nombre' => 'ver_actividades_modelo',
                'created_at' => '2024-11-14 07:17:53',
                'updated_at' => '2024-11-14 07:17:53',
            ],
            [
                'id' => 36,
                'user_id' => 6,
                'nombre' => 'ver_centro_cultural',
                'created_at' => '2024-11-14 07:17:53',
                'updated_at' => '2024-11-14 07:17:53',
            ],
            [
                'id' => 37,
                'user_id' => 6,
                'nombre' => 'ver_campos_modelo',
                'created_at' => '2024-11-14 07:17:53',
                'updated_at' => '2024-11-14 07:17:53',
            ],
            [
                'id' => 38,
                'user_id' => 6,
                'nombre' => 'ver_transporte',
                'created_at' => '2024-11-14 07:17:53',
                'updated_at' => '2024-11-14 07:17:53',
            ],
            [
                'id' => 39,
                'user_id' => 6,
                'nombre' => 'ver_configuracion',
                'created_at' => '2024-11-14 07:17:53',
                'updated_at' => '2024-11-14 07:17:53',
            ],
        ]);
    }
}
