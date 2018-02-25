<?php

namespace App\Repositories;


use App\Models\ClienteAgente;

class ClientesAgentesRepository
{

    public static function clienteAgente($id){
        return ClienteAgente::find($id);
    }

}