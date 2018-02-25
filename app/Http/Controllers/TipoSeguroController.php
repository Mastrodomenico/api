<?php

namespace App\Http\Controllers;

use App\Models\TipoSeguro;
use App\Repositories\TiposSegurosRepository;
use Illuminate\Http\Request;

class TipoSeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            TipoSeguro::all(),200
        );
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoSeguro  $tipoSeguro
     * @return \Illuminate\Http\Response
     */
    public function show(TipoSeguro $tipoSeguro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoSeguro  $tipoSeguro
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoSeguro $tipoSeguro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoSeguro  $tipoSeguro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoSeguro $tipoSeguro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoSeguro  $tipoSeguro
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoSeguro $tipoSeguro)
    {
        //
    }


    public function porCorretora_index($idCorretora)
    {
        $tiposSeguros = TiposSegurosRepository::tiposSegurosPorCorretora($idCorretora);
        return
            $tiposSeguros
            ? response()->json($tiposSeguros, 200)
            : response()->json(['message' => 'corretora inexistente'],404);
    }
}
