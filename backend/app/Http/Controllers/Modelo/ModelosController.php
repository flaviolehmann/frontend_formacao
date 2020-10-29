<?php

namespace App\Http\Controllers\Modelo;

use App\Http\Controllers\Controller;
use App\Models\Modelo;
use App\Services\ModeloService;
use App\Http\Requests\ModeloRequest;
use Illuminate\Http\JsonResponse;
<<<<<<< HEAD
use Illuminate\Http\Response;
use Throwable;
=======
use Illuminate\Http\Request;
use Illuminate\Http\Response;
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

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
<<<<<<< HEAD
     * Store a newly created resource in storage.
     *
     * @param ModeloRequest $request
     * @return JsonResponse
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
     * @param  \Illuminate\Http\Request  $request
     * @return Response
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
     */
    public function store(ModeloRequest $request)
    {
        try {
<<<<<<< HEAD
            $modelo = $this->modeloService->createModelo($request);

            return response()->json($modelo, 201);
        } catch (Throwable $th) {
=======
            $modelo = $this->service->createModelo($request);

            return response()->json($modelo, 201);
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
        return response()->json(Modelo::find($id), 200);
=======
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            return response()->json(Modelo::find($id));
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
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
<<<<<<< HEAD
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
=======
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ModeloRequest $request, $id)
    {
        try {
            $modelo = $this->service->updateModelo($request, $id);

            return response()->json($modelo, 200);
        } catch (\Throwable $th) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
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
