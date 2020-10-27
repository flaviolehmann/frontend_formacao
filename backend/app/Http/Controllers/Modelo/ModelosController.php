<?php

namespace App\Http\Controllers\Modelo;

use App\Http\Controllers\Controller;
use App\Services\ModeloService;
use App\Http\Requests\ModeloRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;

class ModelosController extends Controller
{
    /**
     * @var ModeloService
     */
    private $modeloService;

    public function __construct(ModeloService $service)
    {
        $this->modeloService = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->modeloService->findAll(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(ModeloRequest $request)
    {
        return response()->json($this->modeloService->save($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $modelo = $this->modeloService->findById($id);

        if(!$modelo) {
            return response()->json(['message' => 'Nenhum modelo encontrado.'], 404);
        }

        return response()->json($modelo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ModeloRequest $request, $id)
    {
        try {
            $modelo = $this->modeloService->update($request->all(), $id);

            return response()->json($modelo);
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $idModelo
     * @return Response
     */
    public function destroy($id)
    {
        $this->modeloService->delete($id);

        return response()->noContent();
    }
}
