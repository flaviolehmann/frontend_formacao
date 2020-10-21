<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'descricao' => 'entrada'
        ]);
        DB::table('categorias')->insert([
            'descricao' => 'hatch pequeno'
        ]);
        DB::table('categorias')->insert([
            'descricao' => 'hatch medio'
        ]);
        DB::table('categorias')->insert([
            'descricao' => 'sedã medio'
        ]);
        DB::table('categorias')->insert([
            'descricao' => 'sedã grande'
        ]);
        DB::table('categorias')->insert([
            'descricao' => 'SUV'
        ]);
        DB::table('categorias')->insert([
            'descricao' => 'pick-up'
        ]);
    }
}
