<?php

namespace App\Repositories;


use App\Models\TipoSeguro;

class TiposSegurosRepository
{

    public static function tipoSeguro($id){
        return TipoSeguro::find($id);
    }

    public static function tiposSegurosPorCorretora($id)
    {

        $tiposSeguros = TipoSeguro::where('corretoras_id',$id)->get();
        if(count($tiposSeguros) == 0){
            return [];
        }
        return $tiposSeguros;
    }

}