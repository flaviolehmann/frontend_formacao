<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\JsonResponse;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Categoria::all(), 200);
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
        return response()->json(Categoria::find($id), 200);
    }

=======
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

}
