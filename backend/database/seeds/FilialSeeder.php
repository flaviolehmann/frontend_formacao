<?php

use Illuminate\Database\Seeder;
use App\Models\Filial;

class FilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Filial::class, 10)->create();
    }
}
