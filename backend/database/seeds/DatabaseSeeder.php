<?php

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
        $this->call(CategoriaSeeder::class);
        $this->call(AutomovelSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(FilialSeeder::class);
        $this->call(FuncionarioSeeder::class);
        $this->call(ModeloSeeder::class);
    }
}
