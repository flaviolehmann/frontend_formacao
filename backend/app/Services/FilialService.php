<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\FilialRepository;

class FilialService implements BaseService
{
    /**
     * @var FilialRepository
     */
    private $filialRepository;

    /**
     * FilialService constructor.
     * @param FilialRepository $filialRepository
     */
    public function __construct(FilialRepository $filialRepository)
    {
        $this->filialRepository = $filialRepository;
    }

    public function save(array $data)
    {
        return $this->filialRepository->save($data);
    }

    public function update(array $data, $id)
    {
        return $this->filialRepository->update($data, $id);
    }

    public function findAll()
    {
        return $this->filialRepository->findAll();
    }

    public function findById($id)
    {
        return $this->filialRepository->findById($id);
    }

    public function delete($id)
    {
        return $this->filialRepository->delete($id);
    }

}
