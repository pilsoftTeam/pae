<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CumplimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('estados_cumplimientos')->insert([
            'nombreCumplimiento' => 'Cumple - No Cumple - No Aplica - No Verificable',
            'contenido' => 'C,NC,NA,NV'
        ]);
        DB::table('estados_cumplimientos')->insert([
            'nombreCumplimiento' => 'Aprueba - No Aprueba',
            'contenido' => 'A,Na'
        ]);
    }
}
