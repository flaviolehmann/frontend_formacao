<?php

namespace App\Http\Controllers\Cargo;

use App\Http\Controllers\Controller;
use App\Services\CargoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

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
    public function __construct(CargoService $cargoService)
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
        return response()->json($this->cargoService->findAll(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->cargoService->save($request->all()), 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $cargo = $this->cargoService->update($request->all(), $id);
            return response()->json($cargo);
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $this->cargoService->delete($id);

        return response()->noContent();
    }
}
