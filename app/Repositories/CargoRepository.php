<?php


namespace App\Repositories;


use App\Models\Cargo;

class CargoRepository
{

    public function save(Cargo $cargo)
    {
        $cargo->save();
        return $cargo;
    }

    public function delete(int $idCargo)
    {
        Cargo::destroy($idCargo);
    }

}
