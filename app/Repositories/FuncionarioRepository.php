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

    public function get($id)
    {
        return Funcionario::findOrFail($id);
    }
}
