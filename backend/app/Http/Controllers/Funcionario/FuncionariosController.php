<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use App\Http\Requests\FuncionarioRequest;
use App\Services\FuncionarioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
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
        return response()->json($this->funcionarioService->findAll(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(FuncionarioRequest $request)
    {
        return response()->json($this->funcionarioService->save($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $funcionario = $this->funcionarioService->findById($id);

        if(!$funcionario) {
            response()->json(['message' => 'Nenhum funcionario encontrado.'], 404);
        }

        return response()->json($funcionario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(FuncionarioRequest $request, $id)
    {
        try {
            $funcionario = $this->funcionarioService->update($request->all(), $id);

            return response()->json($funcionario);
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->funcionarioService->delete($id);

        return response()->noContent();
    }
}
