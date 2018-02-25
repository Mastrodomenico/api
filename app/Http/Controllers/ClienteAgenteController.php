<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteAgenteRequest;
use App\Models\ClienteAgente;
use App\Repositories\ClientesAgentesRepository;
use Illuminate\Http\Request;

class ClienteAgenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @param  \App\Models\ClienteAgente  $clienteAgente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clienteagente = ClientesAgentesRepository::clienteAgente($id);
        return
            $clienteagente
            ? response()->json($clienteagente,200)
            : response()->json(['message' => 'recurso não encontrado'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClienteAgente  $clienteAgente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteAgenteRequest $request, $clienteAgente)
    {
        $clienteagente = ClienteAgente::find($clienteAgente)->update($request->all());
        return response()->json($clienteagente,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClienteAgente  $clienteAgente
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClienteAgente $clienteAgente)
    {
        //
    }
}
