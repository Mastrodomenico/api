<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corretora extends Model
{
    protected $table = 'corretoras';

    protected $fillable = [
        'nome',
        'cnpj',
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
        'descricao',
        'logotipo',
        'titulares_id',
        'temas_id'
    ];

    public function Titular(){
        return $this->belongsTo('App\Models\Titular','titulares_id','id');
    }

    public function Tema(){
        return $this->hasOne('App\Models\Tema');
    }

    public function ClienteAgente(){
        return $this->hasMany('App\Models\ClienteAgente');
    }

}
