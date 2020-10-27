<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\CargoRepository;

class CargoService implements BaseService
{
    /**
     * @var CargoRepository
     */
    private $cargoRepository;

    /**
     * CargoService constructor.
     * @param CargoRepository $cargoRepository
     */
    public function __construct(CargoRepository $cargoRepository)
    {
        $this->cargoRepository = $cargoRepository;
    }

    public function save(array $data)
    {
        return $this->cargoRepository->save($data);
    }

    public function update(array $data, $id)
    {
        return $this->cargoRepository->update($data, $id);
    }

    public function findAll()
    {
        return $this->cargoRepository->findAll();
    }

    public function findById($id)
    {
        return $this->cargoRepository->findById($id);
    }

    public function delete($id)
    {
        return $this->cargoRepository->delete($id);
    }
}
