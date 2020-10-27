<?php

namespace App\Http\Controllers\Filial;

use App\Models\Filial;
use App\Http\Controllers\Controller;
use App\Services\FilialService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class FiliaisController extends Controller
{
    /**
     * @var FilialService
     */
    private $filialService;

    /**
     * FiliaisController constructor.
     * @param FilialService $filialService
     */
    public function __construct(
        FilialService $filialService
    )
    {
        $this->filialService = $filialService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Filial::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->filialService->createFilial($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        return response()->json(Filial::find($id), 200);
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
            $filial = $this->filialService->updateFilial($request, $id);

            return response()->json($filial, 200);
        } catch (Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $idFilial
     * @return Application|ResponseFactory|Response|void
     */
    public function destroy(int $idFilial)
    {
        $this->filialService->destroyFilial($idFilial);
        return response(null, 204);
    }
}
