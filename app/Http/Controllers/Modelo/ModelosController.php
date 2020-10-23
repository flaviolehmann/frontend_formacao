<?php

namespace App\Http\Controllers\Modelo;

use App\Models\Modelo;
use Illuminate\Http\Request;
use App\Services\ModeloService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModeloRequest;

class ModelosController extends Controller
{

    public function __construct(ModeloService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Modelo::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModeloRequest $request)
    {
        try {
            $modelo = $this->service->createModelo($request);

            return response()->json($modelo, 201);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(ModeloRequest $request, $id)
    {
        try {
            $modelo = $this->service->updateModelo($request, $id);

            return response()->json($modelo, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
