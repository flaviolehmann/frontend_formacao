<?php
namespace App\Repositories;

class ModeloRepository
{
    public function save($modelo)
    {
        $modelo->save();
        return $modelo;
    }
}
