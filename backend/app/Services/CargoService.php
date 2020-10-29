<?php


namespace App\Services;


use App\Models\Cargo;
use App\Repositories\CargoRepository;
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

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

    public function updateCargo($request, $id)
    {
        try {
            $cargo = $this->cargoRepository->get($id);
            $cargo->fill($request->except(['id']));
            $cargo = $this->cargoRepository->save($cargo);

            return $cargo;
<<<<<<< HEAD
        } catch (Throwable $th) {
=======
        } catch (\Throwable $th) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
            return response()->json($th->getMessage(), 404);
        }
    }

<<<<<<< HEAD
    public function destroyCargo(int $idFuncionario)
    {
=======
    public function destroyCargo(int $idFuncionario) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
        $this->cargoRepository->delete($idFuncionario);
    }

}
