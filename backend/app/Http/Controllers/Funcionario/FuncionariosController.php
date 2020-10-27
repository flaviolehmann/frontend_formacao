<?php

namespace App\Http\Controllers\Funcionario;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\FuncionarioService;
use App\Http\Requests\FuncionarioRequest;
use Throwable;

class FuncionariosController extends Controller
{
    /**
     * @var FuncionarioService
     */
    private $funcionarioService;

    public function __construct(FuncionarioService $service)
    {
        $this->funcionarioService = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Funcionario::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FuncionarioRequest $request
     * @return JsonResponse
     */
    public function store(FuncionarioRequest $request)
    {
        try {
            $funcionario = $this->funcionarioService->createFuncionario($request);

            return response()->json($funcionario, 201);
        } catch (Throwable $th) {
            return response()->json(["message" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        return response()->json(Funcionario::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        try {
            $funcionario = $this->funcionarioService->updateFuncionario($request, $id);

            return response()->json($funcionario, 200);
        } catch (Throwable $th) {
            return response()->json($th->getMessage(), 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $idFuncionario
     * @return Response
     */
    public function destroy(int $idFuncionario)
    {
        $this->funcionarioService->destroyFuncionario($idFuncionario);
        return response(null, 204);
    }
}
