<?php

namespace App\Services;

use App\Models\Funcionario;
use App\Repositories\FuncionarioRepository;

class FuncionarioServices
{

    public function __construct()
    {
        $this->repository = new FuncionarioRepository();
    }

    public function novoFuncionario($request)
    {
        try {
            $funcionario = new Funcionario();
            $funcionario->fill($request->all());

            $this->repository->save($funcionario);
            return $funcionario;
        } catch (\Throwable $th) {
            return response()->json(["Erro ao criar novo funcionário \n $th", 404]);
        }

    }
}
