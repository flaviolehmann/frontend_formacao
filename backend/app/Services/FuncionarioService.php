<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\FuncionarioRepository;
use Illuminate\Support\Str;

class FuncionarioService implements BaseService
{
    /**
     * @var FuncionarioRepository
     */
    private $funcionarioRepository;

    public function __construct(FuncionarioRepository $funcionarioRepository)
    {
        $this->funcionarioRepository = $funcionarioRepository;
    }

    public function save(array $data)
    {
        $data['senha'] = Str::upper(Str::random(6));

        return $this->funcionarioRepository->save($data);
    }

    public function update(array $data, $id)
    {
        return $this->funcionarioRepository->update($data, $id);
    }

    public function findAll()
    {
        return $this->funcionarioRepository->findAll();
    }

    public function findById($id)
    {
        return $this->funcionarioRepository->findById($id);
    }

    public function delete($id)
    {
        return $this->funcionarioRepository->delete($id);
    }
}
