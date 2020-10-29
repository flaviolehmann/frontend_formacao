<?php

namespace App\Http\Controllers\Cargo;

<<<<<<< HEAD
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CargoService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Throwable;
=======
use App\Http\Controllers\Controller;
use App\Services\CargoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

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
<<<<<<< HEAD
     * @return JsonResponse
=======
     * @return Response
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
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
<<<<<<< HEAD
     * @param Request $request
=======
     * @param  \Illuminate\Http\Request  $request
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->cargoService->createCargo($request->all()), 201);
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
        return response()->json(Cargo::find($id), 200);
=======
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
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
    }

    /**
     * Update the specified resource in storage.
     *
<<<<<<< HEAD
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
=======
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
    {
        try {
            $cargo = $this->cargoService->updateCargo($request, $id);

            return response()->json($cargo, 200);
<<<<<<< HEAD
        } catch (Throwable $th) {
=======
        } catch (\Throwable $th) {
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
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
