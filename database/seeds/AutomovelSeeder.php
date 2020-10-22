<?php

use Illuminate\Database\Seeder;
use App\Models\Automovel;

class AutomovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Automovel::class, 10)->create();
    }
}
