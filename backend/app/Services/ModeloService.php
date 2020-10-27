<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\ModeloRepository;

class ModeloService implements BaseService
{
    /**
     * @var ModeloRepository
     */
    private $modeloRepository;

    public function __construct(ModeloRepository $modeloRepository)
    {
        $this->modeloRepository = $modeloRepository;
    }

    public function save(array $data)
    {
        return $this->modeloRepository->save($data);
    }

    public function update(array $data, $id)
    {
        return $this->modeloRepository->update($data, $id);
    }

    public function findAll()
    {
        return $this->modeloRepository->findAll();
    }

    public function findById($id)
    {
        return $this->modeloRepository->findById($id);
    }

    public function delete($id)
    {
        return $this->modeloRepository->delete($id);
    }

}
