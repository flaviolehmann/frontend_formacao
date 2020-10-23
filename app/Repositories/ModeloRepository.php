<?php
namespace App\Repositories;

use App\Models\Modelo;

class ModeloRepository
{
    public function save($modelo)
    {
        $modelo->save();
        return $modelo;
    }

    public function get($id)
    {
        return Modelo::findOrFail($id);
    }
}
