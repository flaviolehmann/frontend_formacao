<?php

namespace App\Http\Controllers\Funcionario;

<<<<<<< HEAD
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\FuncionarioService;
use App\Http\Requests\FuncionarioRequest;
use Throwable;
=======
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Services\FuncionarioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

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
<<<<<<< HEAD
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
=======
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            return response()->json($this->funcionarioService->createFuncionario($request), 201);
        } catch (\Throwable $th) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
            return response()->json(["message" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        return response()->json(Funcionario::find($id), 200);
=======
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      return $this->funcionarioService->getFuncionario($id);
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
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
<<<<<<< HEAD
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        try {
            $funcionario = $this->funcionarioService->updateFuncionario($request, $id);

            return response()->json($funcionario, 200);
        } catch (Throwable $th) {
=======
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $funcionario = $this->service->updateFuncionario($request, $id);

            return response()->json($funcionario, 200);
        } catch (\Throwable $th) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
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
