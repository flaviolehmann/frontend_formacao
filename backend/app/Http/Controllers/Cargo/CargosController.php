<?php

namespace App\Http\Controllers\Cargo;

use App\Http\Controllers\Controller;
use App\Services\CargoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CargosController extends Controller
{
    /**
     * @var CargoService
     */
    private $cargoService;

    /**
     * CargosController constructor.
     * @param CargoService $cargoService
     */
    public function __construct(
        CargoService $cargoService
    )
    {
        $this->cargoService = $cargoService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(Cargo::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->cargoService->createCargo($request->all()), 201);
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
        try {
            $cargo = $this->cargoService->updateCargo($request, $id);

            return response()->json($cargo, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $idCargo
     * @return Response
     */
    public function destroy(int $idCargo)
    {
        $this->cargoService->destroyCargo($idCargo);
        return response(null, 204);
    }
}
