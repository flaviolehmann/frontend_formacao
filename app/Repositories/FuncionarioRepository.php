<?php
namespace App\Repositories;

class FuncionarioRepository
{
    public function save($funcionario)
    {
        // dd($funcionario);
        $funcionario->save();
        return $funcionario;
    }
}
