<?php

namespace App\Services;

use App\Repositories\AutomovelRepository;
use App\Services\BaseService;

class AutomovelService implements BaseService
{
    /**
     * @var AutomovelRepository
     */
    private $automovelRepository;

    /**
     * AutomovelService constructor.
     * @param AutomovelRepository $automovelRepository
     */
    public function __construct(AutomovelRepository $automovelRepository)
    {
        $this->automovelRepository = $automovelRepository;
    }

    public function save(array $data)
    {
        return $this->automovelRepository->save($data);
    }

    public function update(array $data, $id)
    {
        return $this->automovelRepository->update($data, $id);
    }

    public function findAll()
    {
        return $this->automovelRepository->findAll();
    }

    public function findById($id)
    {
        return $this->automovelRepository->findById($id);
    }

    public function delete($id)
    {
        return $this->automovelRepository->delete($id);
    }
}
