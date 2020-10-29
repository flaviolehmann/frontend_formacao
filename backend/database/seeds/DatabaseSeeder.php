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
<<<<<<< HEAD
=======
        $this->call(AutomovelSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(FilialSeeder::class);
        $this->call(FuncionarioSeeder::class);
        $this->call(ModeloSeeder::class);
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
    }
}
