<?php

namespace CruzRoja;

use Illuminate\Database\Eloquent\Model;

class Voluntarios extends Model
{
    protected $primaryKey = 'id_voluntario';

    protected $hidden = [
        'contraseña', 'id_voluntario',
    ];
}
