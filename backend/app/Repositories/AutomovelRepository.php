<?php

namespace App\Repositories;

use App\Models\Automovel;

class AutomovelRepository
{
    /**
     * @var Automovel
     */
    protected $model;

    public function __construct(Automovel $automovel)
    {
        $this->model = $automovel;
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $automovel = $this->model->find($id);
        $automovel->update($data);

        return $automovel;
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
