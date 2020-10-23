<?php

namespace App\Services;

use App\Models\Modelo;
use App\Repositories\ModeloRepository;

class ModeloService
{
    public function __construct()
    {
        $this->repository = new ModeloRepository();
    }

    public function novoModelo($request)
    {
        try {
            $modelo = new Modelo();
            $modelo->fill($request->all());

            $this->repository->save($modelo);

            return $modelo;
        } catch (\Throwable $th) {
            return response()->json("Erro ao criar novo modelo \n $th", 404);
        }

    }
}
