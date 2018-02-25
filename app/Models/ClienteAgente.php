<?php

namespace App\Models;

use App\Helpers\MaskStringHelper;
use Illuminate\Database\Eloquent\Model;

class ClienteAgente extends Model
{
    protected $table = "clientes_agentes";

    protected $fillable = [
        'nome',
        'foto',
        'data_nascimento',
        'cpf',
        'email',
        'telefone_1',
        'telefone_2',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'profissao',
        'hobbies',
        'sobre',
        'receber_informacoes',
        'corretoras_id'
    ];


    /*Relationships*/
    public function Indicacoes(){
        return $this->hasMany('App\Models\Indicacao');
    }

    public function Corretora(){
        return $this->belongsTo('App\Models\Corretoras','corretoras_id');
    }


    /*Mutators*/
    public function getDataNascimentoAttribute(){
        return implode('/',array_reverse(explode('-',$this->attributes['data_nascimento'])));
    }

    public function setDataNascimentoAttribute($data_nascimento){
        $this->attributes['data_nascimento'] = implode('-',array_reverse(explode('/',$data_nascimento)));
    }

    public function setCpfAttribute($cpf){
        $this->attributes['cpf'] = MaskStringHelper::mask($cpf, '###.###.###-##');
    }
}
