<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $table = 'cliente';

    protected $fillable = [
        'codigo', 'nome', 'sexo', 'data_nascimento'
    ];

}
