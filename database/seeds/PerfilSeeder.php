<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfiles = ['administrador', 'supervisor', 'revisor'];
        foreach ($perfiles as $perfil) {
            DB::table('perfiles')->insert([
                'rol' => $perfil
            ]);
        }
    }
}
