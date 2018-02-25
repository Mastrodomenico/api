<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicacao extends Model
{
    protected $table = 'indicacoes';

    protected $fillable = [
      'nome',
      'email',
      'telefone',
      'status',
      'tipos_seguros_id',
      'clientes_agentes_id',
    ];

    public static  $tipoStauts = ['analise','negociacao','fechado','inativo'];

    public function ClienteAgente(){
        return $this->belongsTo('App\Models\ClienteAgente','clientes_agentes_id');
    }

    public function TipoSeguro(){
        return $this->hasOne('App\Models\TipoSeguro','id','tipos_seguros_id');
    }

}
