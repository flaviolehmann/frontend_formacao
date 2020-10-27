<?php

namespace App\Repositories;

use App\Models\Filial;

class FilialRepository implements BaseRepository
{
    /**
     * @var Filial
     */
    protected $model;

    public function __construct(Filial $filial)
    {
        $this->model = $filial;
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $filial = $this->model->find($id);
        $filial->update($data);

        return $filial;
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
