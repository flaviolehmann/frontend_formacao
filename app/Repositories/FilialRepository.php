<?php


namespace App\Repositories;


use App\Models\Filial;

class FilialRepository
{
    public function save(Filial $filial)
    {
        $filial->save();
        return $filial;
    }

    public function delete(int $idFilial)
    {
        Filial::destroy($idFilial);
    }

    public function get($id)
    {
        return Filial::findOrFail($id);
    }
}
