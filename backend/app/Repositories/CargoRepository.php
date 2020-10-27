<?php

namespace App\Repositories;

use App\Models\Cargo;

class CargoRepository implements BaseRepository
{
    /**
     * @var Cargo
     */
    protected $model;

    public function __construct(Cargo $cargo)
    {
        $this->model = $cargo;
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $cargo = $this->model->find($id);
        $cargo->update($data);

        return $cargo;
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
