<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titular extends Model
{
    protected $table = 'titulares';

    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'email',
        'telefone_1',
        'telefone_2',
        'telefone_1_wp',
        'telefone_2_wp',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'pais',
        'complemento'
    ];

    public function Corretora(){
        return $this->hasOne('App\Models\Corretora','titulares_id','id');
    }
}
