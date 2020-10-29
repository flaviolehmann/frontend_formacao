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
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

class FiliaisController extends Controller
{
    /**
     * @var FilialService
     */
    private $filialService;

    /**
     * FiliaisController constructor.
<<<<<<< HEAD
     * @param FilialService $filialService
=======
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
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
<<<<<<< HEAD
     * @return JsonResponse
=======
     * @return Response
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
     */
    public function index()
    {
        return response()->json(Filial::all(), 200);
    }

    /**
<<<<<<< HEAD
=======
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
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
<<<<<<< HEAD
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        return response()->json(Filial::find($id), 200);
=======
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
     * @param Request $request
<<<<<<< HEAD
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
=======
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
    {
        try {
            $filial = $this->filialService->updateFilial($request, $id);

            return response()->json($filial, 200);
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
     * @param int $idFilial
     * @return Application|ResponseFactory|Response|void
     */
    public function destroy(int $idFilial)
    {
        $this->filialService->destroyFilial($idFilial);
        return response(null, 204);
    }
}
