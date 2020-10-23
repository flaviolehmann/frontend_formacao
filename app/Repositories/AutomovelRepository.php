<?php


namespace App\Repositories;


use App\Models\Automovel;

class AutomovelRepository
{

    public function save(Automovel $automovel)
    {
        $automovel->save();
        return $automovel;
    }

    public function get($id)
    {
        return Automovel::findOrFail($id);
    }
}
