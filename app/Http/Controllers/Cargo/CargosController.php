<?php

namespace App\Http\Controllers\Cargo;

use App\Http\Controllers\Controller;
use App\Services\CargoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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