<?php

namespace App\Http\Controllers\Modelo;

use App\Http\Controllers\Controller;
use App\Models\Modelo;
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
        return response()->json( Modelo::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ModeloRequest $request
     * @return JsonResponse
     */
    public function store(ModeloRequest $request)
    {
        try {
            $modelo = $this->modeloService->createModelo($request);

            return response()->json($modelo, 201);
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
        return response()->json(Modelo::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ModeloRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(ModeloRequest $request, int $id)
    {
        try {
            $modelo = $this->modeloService->updateModelo($request, $id);

            return response()->json($modelo, 200);
        } catch (Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $idModelo
     * @return Response
     */
    public function destroy(int $idModelo)
    {
        $this->modeloService->destroyModelo($idModelo);
        return response(null, 204);
    }
}
