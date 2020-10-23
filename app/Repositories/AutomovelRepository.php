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

    public function delete(int $idAutomovel)
    {
        Automovel::destroy($idAutomovel);
    }

}
