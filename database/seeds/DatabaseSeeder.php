<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PerfilSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CumplimientoSeeder::class);
        $this->call(BodegaSeeder::class);
    }
}
