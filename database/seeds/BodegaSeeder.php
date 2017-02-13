<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodegas')->insert([
            'licitacion' => 'LIC 10-2014',
            'nombreProveedor' => 'MBS',
            'region' => '4',
            'comuna' => 'COQUIMBO',
            'DireccionBodega' => 'Calle 5 N°251 Bodega 1,2,3,4 Coquimbo'
        ]);
        DB::table('bodegas')->insert([
            'licitacion' => 'LIC 10-2014',
            'nombreProveedor' => 'MERKEN',
            'region' => '4',
            'comuna' => 'ILLAPEL',
            'DireccionBodega' => 'Calle Vial Recabarren N° 0369 Illapel'
        ]);
    }
}
