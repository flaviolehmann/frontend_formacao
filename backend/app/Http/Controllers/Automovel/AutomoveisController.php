<?php

namespace App\Http\Controllers\Automovel;

use Illuminate\Http\Request;
use App\Services\AutomovelService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;

class AutomoveisController extends Controller
{
    /**
     * @var AutomovelService
     */
    private $automovelService;

    public function __construct(AutomovelService $automovelService)
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
        return response()->json($this->automovelService->findAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->automovelService->save($request->all()), 201);
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
            $automovel = $this->automovelService->update($request->all(), $id);
            return response()->json($automovel);
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->automovelService->delete($id);

        return response()->noContent();
    }
}
