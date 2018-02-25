<?php

namespace App\Repositories;


use App\Models\ClienteAgente;
use App\Models\Indicacao;

class IndicacoesRepository
{

    public static function indicacoes($status){
        $indicacoes = Indicacao::where('status','like','%'.$status.'%')->orderBy('id','desc')->get();
        foreach ($indicacoes as $key => $indicacao){
            $indicacoes[$key]['tipo_seguro'] =  $indicacao->tipoSeguro()->get()->first()->nome;
            $indicacoes[$key]['valor_seguro'] =  $indicacao->tipoSeguro()->get()->first()->valor;
        }
        return $indicacoes;
    }

    public static function indicacao($id){
        $indicacao = Indicacao::find($id);
        if(!$indicacao == null){
            $indicacao['tipo_seguro'] = $indicacao->tipoSeguro()->get()->first()->nome;
            $indicacao['valor_seguro'] = $indicacao->tipoSeguro()->get()->first()->valor;
        }
        return $indicacao;
    }


    public static function indicacoesPorCorretoras($id,$status)
    {

        $clientes_agentes = ClienteAgente::where('corretoras_id',$id)->orderBy('id','desc')->get();
        $indicacoes = [];
        foreach ($clientes_agentes as $cliente_agente){
            foreach(Indicacao::where('clientes_agentes_id', $cliente_agente->id)->where('status','like','%'.$status.'%')->get() as $indicacao){
                array_push($indicacoes,$indicacao);
            }
        }
        return $indicacoes;

    }

    public static function indicacoesPorClientesAgentes($id,$status)
    {

        $indicacoes = Indicacao::where('clientes_agentes_id', $id)->get();
        if(count($indicacoes) == 0){
            return [];
        }

        $indicacoes = Indicacao::where('clientes_agentes_id', $id)->where('status','like','%'.$status.'%')->orderBy('id','desc')->get();
        if(count($indicacoes) == 0){
           return [
               "status" => "ok",
               "message" => "status não encontrado"
           ];
        }
        $indicacoesRetorno = [];
        foreach($indicacoes as $indicacao){
            $indicacao['tipo_seguro'] = $indicacao->tipoSeguro()->get()->first()->nome;
            $indicacao['valor_seguro'] = $indicacao->tipoSeguro()->get()->first()->valor;
            array_push($indicacoesRetorno,$indicacao);
        }
        return $indicacoesRetorno;

    }
}