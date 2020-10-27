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
     */
    public function __construct(FilialService $filialService)
    {
        $this->filialService = $filialService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json($this->filialService->findAll(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->filialService->save($request->all()), 201);
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
            $filial = $this->filialService->update($request->all(), $id);

            return response()->json($filial);
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|ResponseFactory|Response|void
     */
    public function destroy($id)
    {
        $this->filialService->delete($id);

        return response()->noContent();
    }
}
