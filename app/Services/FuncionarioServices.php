<?php

namespace App\Services;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Hash;
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
            $funcionario->fill($request->except(['senha']));
            $funcionario->senha = $this->gerarSenha();

            $this->repository->save($funcionario);
            return $funcionario;
        } catch (\Throwable $th) {
            return response()->json(["Erro ao criar novo funcionário \n $th", 404]);
        }

    }

    private function gerarSenha()
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $senha = '';
        for (;strlen($senha) < 6;) {
            $senha .= $caracteres[rand(0, strlen($caracteres)-1)];
        }
        return $senha;
    }
}
