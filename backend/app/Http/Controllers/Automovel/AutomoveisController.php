<?php

namespace App\Http\Controllers\Automovel;

use Illuminate\Http\Request;
use App\Services\AutomovelService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AutomoveisController extends Controller
{

    /**
     * @var AutomovelService
     */
    private $automovelService;

    public function __construct(
        AutomovelService $automovelService
    )
    {
        $this->automovelService = $automovelService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(Automovel::all(), 200);
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->automovelService->createAutomovel($request->all()), 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $automovel = $this->automovelService->updateAutomovel($request, $id);

            return response()->json($automovel, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idAutomovel
     * @return Response
     */
    public function destroy(int $idAutomovel)
    {
        $this->automovelService->destroyAutomovel($idAutomovel);
        return response(null, 204);
    }
}
