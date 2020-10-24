<?php

namespace App\Services;

use App\Models\Modelo;
use App\Repositories\ModeloRepository;

class ModeloService
{
    /**
     * @var ModeloRepository
     */
    private $modeloRepository;

    public function __construct()
    {
        $this->modeloRepository = new ModeloRepository();
    }

    public function createModelo($request)
    {
        try {
            $modelo = new Modelo();
            $modelo->fill($request->all());

            $this->modeloRepository->save($modelo);

            return $modelo;
        } catch (\Throwable $th) {
            return response()->json("Erro ao criar novo modelo \n $th", 404);
        }

    }

    public function updateModelo($request, $id)
    {
        try {
            $modelo = $this->repository->get($id);
            $modelo->fill($request->except('id'));
            $this->repository->save($modelo);

            return $modelo;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }
    public function destroyModelo(int $idModelo) {
        $this->modeloRepository->delete($idModelo);
    }

}
