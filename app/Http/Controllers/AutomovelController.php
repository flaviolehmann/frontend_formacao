<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutomovelRequest;
use App\Models\Automovel;
use App\Services\AutomovelService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutomovelController extends Controller
{
    /**
     * @var AutomovelService
     */
    private $automovelService;

    /**
     * AutomovelController constructor.
     * @param AutomovelService $automovelService
     */
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
        return response()->json(Automovel::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AutomovelRequest $request
     * @return JsonResponse
     */
    public function store(AutomovelRequest $request)
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
        return response()->json(Automovel::all()->where('id', '=', $id), 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
