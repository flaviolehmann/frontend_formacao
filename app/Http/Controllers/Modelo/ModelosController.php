<?php

namespace App\Http\Controllers\Modelo;

use App\Models\Modelo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\ModeloService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

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
    public function store(Request $request)
    {
        try {
            $funcionario = $this->modeloService->novoModelo($request);

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
     * @param int $idModelo
     * @return Response
     */
    public function destroy(int $idModelo)
    {
        $this->modeloService->destroyModelo($idModelo);
        return response(null, 204);
    }
}
