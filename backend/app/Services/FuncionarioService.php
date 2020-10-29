<?php

namespace App\Services;

use App\Models\Funcionario;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use App\Repositories\FuncionarioRepository;
use Throwable;
=======
use App\Repositories\FuncionarioRepository;
use Illuminate\Support\Facades\Hash;
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

class FuncionarioService
{

    /**
     * @var FuncionarioRepository
     */
    private $funcionarioRepository;

    public function __construct()
    {
        $this->funcionarioRepository = new FuncionarioRepository();
    }

    public function createFuncionario($request)
    {
        try {
            $funcionario = new Funcionario();
            $funcionario->fill($request->except(['senha']));
            $funcionario->senha = $this->gerarSenha();

            $funcionarioSalvo = clone $funcionario;
            $funcionario->senha = $this->hashSenha($funcionario->senha);
            $this->funcionarioRepository->save($funcionario);

            return $funcionarioSalvo;
<<<<<<< HEAD
        } catch (Throwable $th) {
=======
        } catch (\Throwable $th) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
            return response()->json(["Erro ao criar novo funcionário \n $th", 404]);
        }

    }

    public function updateFuncionario($request, $id)
    {
        try {
            $funcionario = $this->funcionarioRepository->get($id);
            $funcionario->fill($request->except(['id']));
<<<<<<< HEAD
            $funcionario = $this->funcionarioRepository->save($funcionario);

            return $funcionario;
        } catch (Throwable $th) {
=======

            return $this->funcionarioRepository->save($funcionario);
        } catch (\Throwable $th) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
            return response()->json($th->getMessage(), 404);
        }
    }

    private function hashSenha($senha)
    {
        return Hash::make($senha);
    }

    private function gerarSenha()
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $senha = '';
<<<<<<< HEAD
        for (;strlen($senha) < 6;) {
            $senha .= $caracteres[rand(0, strlen($caracteres)-1)];
=======
        while (strlen($senha) < 6) {
          $senha .= $caracteres[rand(0, strlen($caracteres)-1)];
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
        }
        return $senha;
    }

    public function destroyFuncionario(int $idFuncionario) {
        $this->funcionarioRepository->delete($idFuncionario);
    }

<<<<<<< HEAD
=======
    public function getFuncionario(int $idFuncionario)
    {
      return $this->funcionarioRepository->get($idFuncionario);
    }

>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
}
