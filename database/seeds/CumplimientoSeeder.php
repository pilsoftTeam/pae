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
            'nombreCumplimiento' => 'Opcion uno',
            'contenido' => 'C, NC, NA, NV'
        ]);
        DB::table('estados_cumplimientos')->insert([
            'nombreCumplimiento' => 'Opcion dos',
            'contenido' => 'A, NA'
        ]);
    }
}
