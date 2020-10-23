<?php
namespace App\Repositories;

use App\Models\Funcionario;

class FuncionarioRepository
{

    public function save($funcionario)
    {
        $funcionario->save();
        return $funcionario;
    }

    public function delete(int $idFuncionario)
    {
        Funcionario::destroy($idFuncionario);
    }

}
