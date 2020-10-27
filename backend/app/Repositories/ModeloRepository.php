<?php

namespace App\Repositories;

use App\Models\Modelo;

class ModeloRepository implements BaseRepository
{
    /**
     * @var Modelo
     */
    protected $model;

    public function __construct(Modelo $modelo)
    {
        $this->model = $modelo;
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $modelo = $this->model->find($id);
        $modelo->update($data);

        return $modelo;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
