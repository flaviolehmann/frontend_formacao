<?php

namespace App\Repositories;

use App\Models\Funcionario;

class FuncionarioRepository implements BaseRepository
{
    /**
     * @var Funcionario
     */
    protected $model;

    public function __construct(Funcionario $funcionario)
    {
        $this->model = $funcionario;
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $funcionario = $this->model->find($id);
        $funcionario->update($data);

        return $funcionario;
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

    // public function save($funcionario)
    // {
    //     $funcionario->save();
    //     return $funcionario;
    // }

    // public function get($id)
    // {
    //     return Funcionario::findOrFail($id);
    // }

    // public function delete(int $idFuncionario)
    // {
    //     Funcionario::destroy($idFuncionario);
    // }

}
