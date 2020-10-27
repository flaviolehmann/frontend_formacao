<?php

namespace App\Http\Controllers\Automovel;

use App\Models\Automovel;
use App\Models\AutomovelList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\AutomovelService;
use App\Http\Controllers\Controller;
use Throwable;

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
     * @return JsonResponse
     */
    public function index()
    {
        $listaAutomoveis = Automovel::
            with(array('modelo' => function($query)
            {
                $query->select('id', 'descricao');
            }))
            ->with(array('filial' => function($query)
            {
                $query->select('id', 'nome');
            }))
            ->with(array('categoria' => function($query)
            {
                $query->select('id', 'descricao');
            }))
            ->get();
        return response()->json($listaAutomoveis, 200);
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
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        return response()->json(Automovel::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        try {
            $automovel = $this->automovelService->updateAutomovel($request, $id);

            return response()->json($automovel, 200);
        } catch (Throwable $th) {
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
