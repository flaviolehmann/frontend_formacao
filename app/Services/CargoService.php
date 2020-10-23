<?php


namespace App\Services;


use App\Models\Cargo;
use App\Repositories\CargoRepository;

class CargoService
{
    /**
     * @var CargoRepository
     */
    private $cargoRepository;

    /**
     * CargoService constructor.
     * @param CargoRepository $cargoRepository
     */
    public function __construct(
        CargoRepository $cargoRepository
    )
    {
        $this->cargoRepository = $cargoRepository;
    }

    public function createCargo($cargo)
    {
        return $this->cargoRepository->save(new Cargo($cargo));
    }

    public function destroyCargo(int $idFuncionario) {
        $this->cargoRepository->delete($idFuncionario);
    }

}
