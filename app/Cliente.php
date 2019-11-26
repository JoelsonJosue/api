<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = [
        'codigo', 'nome', 'sexo', 'data_nascimento'
    ];

}
