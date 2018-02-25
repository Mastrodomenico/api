<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicacaoRequest;
use App\Models\Indicacao;
use App\Repositories\IndicacoesRepository;

class IndicacaoController extends Controller
{

    /**
     * @param IndicacaoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndicacaoRequest $request)
    {
        return response()->json(
            IndicacoesRepository::indicacoes($request->get('status')),200
        );
    }


    /**
     * @param IndicacaoRequest $request
     * @return mixed
     */
    public function store(IndicacaoRequest $request)
    {
        $novaIndicacao = Indicacao::create($request->all());
        return response()->json(IndicacoesRepository::indicacao($novaIndicacao->id),201);
    }


    /**
     * @param Indicacao $indicacao
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $indicaco = IndicacoesRepository::indicacao($id);
        return
            $indicaco
                ? response()->json($indicaco,200)
                : response()->json(['message' => 'recurso não encontrado'],404);

    }
    /**
     * @param IndicacaoRequest $request
     * @param Indicacao $indicacao
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(IndicacaoRequest $request, Indicacao $indicacao)
    {
        $indicacao->update($request->except('clientes_agentes_id'));
        return response()->json($indicacao, 200);
    }


    /**
     * @param Indicacao $indicacao
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Indicacao $indicacao)
    {
        $indicacao->delete();
        return response()->json($indicacao, 204);
    }

    /**
     * @param IndicacaoRequest $request
     * @param $idCorretora
     * @return \Illuminate\Http\JsonResponse
     */
    public function porCorretora_index(IndicacaoRequest $request, $idCorretora)
    {
        $indicacoes = IndicacoesRepository::indicacoesPorCorretoras($idCorretora,$request->get('status'));
        return
            $indicacoes
                ? response()->json($indicacoes,200)
                : response()->json(['message' => 'recurso não encontrado'], 404);
    }


    /**
     * @param IndicacaoRequest $request
     * @param $idCorretora
     * @return \Illuminate\Http\JsonResponse
     */
    public function porClienteAgente_index(IndicacaoRequest $request, $idClienteAgente)
    {
        $indicacoes = IndicacoesRepository::indicacoesPorClientesAgentes($idClienteAgente,$request->get('status'));
        return
            $indicacoes
                ? response()->json($indicacoes,200)
                : response()->json(['message' => 'recurso não encontrado'], 404);
    }
}
