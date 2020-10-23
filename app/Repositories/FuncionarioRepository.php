<?php
namespace App\Repositories;

class FuncionarioRepository
{
    public function save($funcionario)
    {
        $funcionario->save();
        return $funcionario;
    }
}
