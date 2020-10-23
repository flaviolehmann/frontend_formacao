<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use App\Http\Requests\FuncionarioRequest;
use App\Models\Funcionario;
use App\Services\FuncionarioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(FuncionarioRequest $request)
    {
        try {
            $funcionario = $this->funcionarioService->novoFuncionario($request);

            return response()->json($funcionario, 201);
        } catch (\Throwable $th) {
            return response()->json(["message => $th"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
