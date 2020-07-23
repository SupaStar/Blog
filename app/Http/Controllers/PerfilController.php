<?php

namespace App\Http\Controllers;

use App\UsuarioModel;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function ver($id)
    {
        session_start();
        $_SESSION["id"]=1;
        if (!isset($_SESSION["id"])) {
            return redirect()->action('PublicacionController@verPagina');
        } else {
            $idS = $_SESSION["id"];
            if ($idS == $id) {
                return view('Perfil.ver')->with("idU", $id);
            } else {
                return redirect()->action('PublicacionController@verPagina');
            }
        }
    }

    public function cargarPublicaciones($id)
    {
        $usuario = UsuarioModel::find($id);
        return json_encode(["estado" => true, 'publicaciones' => $usuario->verPublicaciones]);
    }
}
