<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';

    public function verPublicaciones()
    {
        return $this->hasMany('App\PublicacionModel', 'idUsuario', 'id');
    }
}
