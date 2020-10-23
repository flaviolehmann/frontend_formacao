<?php

namespace App\Http\Controllers\Funcionario;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FuncionarioService;
use App\Http\Requests\FuncionarioRequest;

class FuncionariosController extends Controller
{
    public function __construct(FuncionarioService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Funcionario::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {
        try {
            $funcionario = $this->service->createFuncionario($request);

            return response()->json($funcionario, 201);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        try {
            $funcionario = $this->service->updateFuncionario($request, $id);

            return response()->json($funcionario, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 200);
        }
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
