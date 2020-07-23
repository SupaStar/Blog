<?php

namespace App\Http\Controllers;

use App\PublicacionModel;
use App\RecursosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PublicacionController extends Controller
{
    public function nueva(Request $request)
    {
        $publicacionn = new PublicacionModel();
        $publicacionn->idUsuario = "1";
        $publicacionn->titulo = "";
        $publicacionn->tituloSNFormato = "";
        $publicacionn->descripcion = "";
        $publicacionn->contenido = "";
        $publicacionn->save();
        $tituloPublicacion = $request->input('dataT');
        $publicacionCompleta = $request->input("dataPub");
        $descripcionPublicacion = $request->input("descripcion");
        $tituloSNFormato = $request->input("tituloSN");
        $publicacionJSON = json_decode($publicacionCompleta);
        $publicacionArreglo = [];
        $idProv = $publicacionn->id;
        //Revisa si la publicacion contiene imagenes y las almacena
        foreach ($publicacionJSON->ops as $dato) {
            if (array_key_exists('insert', $dato)) {
                if (!is_string($dato->insert)) {
                    if (array_key_exists('image', $dato->insert)) {
                        foreach ($dato->insert as $imagen) {
                            if (!strpos($imagen, 'recursos')) {
                                //Se crea un recurso temporal
                                $idR = $this->crearRecursos($idProv, "");
                                preg_match("/data:image\/(.*?);/", $imagen, $image_extension); // extract the image extension
                                $image = preg_replace('/data:image\/(.*?);base64,/', '', $imagen); // remove the type part
                                $image = str_replace(' ', '+', $image);
                                $nombreImg = $idR . 'image_' . time() . "." . $image_extension[1];
                                $this->editarRecursos($idR, $idProv, $nombreImg);
                                Storage::disk('public')->put($nombreImg, base64_decode($image));
                                $variable = ["insert" => ["image" => "/recursos/imgs/" . $nombreImg]];
                                array_push($publicacionArreglo, $variable);
                            } else {
                                $variable = ["insert" => ["image" => $imagen]];
                                array_push($publicacionArreglo, $variable);
                            }
                        }
                    }
                } else {
                    array_push($publicacionArreglo, $dato);
                }
            }
        }
        //Se reformatea el arreglo de publicacion
        $stringPublicacion = json_encode($publicacionArreglo);
        $tituloArreglo = $this->formatoTitulo($tituloPublicacion);
        $stringTitulo = json_encode($tituloArreglo);
        $publicacion = PublicacionModel::find($idProv);
        $publicacion->idUsuario = "1";
        $publicacion->titulo = $stringTitulo;
        $publicacion->tituloSNFormato = $tituloSNFormato;
        $publicacion->descripcion = $descripcionPublicacion;
        $publicacion->contenido = $stringPublicacion;
        $publicacion->save();
        return redirect()->action('PublicacionController@verPagina');
    }

    public function formatoTitulo($tituloPublicacion)
    {
        //Formatea el titulo para mejor manejo
        $tituloJSON = json_decode($tituloPublicacion);
        $arregloTitulo = [];
        foreach ($tituloJSON->ops as $dato) {
            array_push($arregloTitulo, $dato);
        }
        return $arregloTitulo;
    }

    public function crearRecursos($id, $img)
    {
        $recurso = new RecursosModel();
        $recurso->idPublicacion = $id;
        $recurso->ruta = $img;
        $recurso->save();
        return $recurso->id;
    }

    public function editarRecursos($idR, $id, $img)
    {
        $recurso = RecursosModel::find($idR);
        $recurso->idPublicacion = $id;
        $recurso->ruta = $img;
        $recurso->save();
    }

    public function verPagina()
    {
        $now = new \DateTime();
        $mes = $now->format('m');
        $publicaciones = PublicacionModel::whereMonth('created_at', '>=', $mes)->paginate(10);
        return view('inicio')->with('publicaciones', $publicaciones);
    }

    public function ver($id)
    {
        session_start();
        $publicacion = PublicacionModel::find($id);
        if (isset($_SESSION["id"])) {
            $idS = $_SESSION["id"];
            if ($idS == $publicacion->idUsuario) {
                return view('Publicacion.editarPublicacion')->with('publicacion', $publicacion);
            } else {
                return view('Publicacion.verPublicacion')->with('publicacion', $publicacion);
            }
        } else {
            return view('Publicacion.verPublicacion')->with('publicacion', $publicacion);
        }
    }

    public function editar($id, Request $request)
    {
        $publicacion = PublicacionModel::find($id);
        $tituloPublicacion = $request->input('dataT');
        $publicacionCompleta = $request->input("dataPub");
        $descripcionPublicacion = $request->input("descripcion");
        $tituloSNFormato = $request->input("tituloSN");
        $publicacionJSON = json_decode($publicacionCompleta);
        $publicacionArreglo = [];
        //Revisa si la publicacion contiene imagenes y las almacena
        foreach ($publicacionJSON->ops as $dato) {
            if (array_key_exists('insert', $dato)) {
                if (!is_string($dato->insert)) {
                    if (array_key_exists('image', $dato->insert)) {
                        foreach ($dato->insert as $imagen) {
                            if (!strpos($imagen, 'recursos')) {
                                preg_match("/data:image\/(.*?);/", $imagen, $image_extension); // extract the image extension
                                $image = preg_replace('/data:image\/(.*?);base64,/', '', $imagen); // remove the type part
                                $image = str_replace(' ', '+', $image);
                                $nombreImg = 'image_' . time() . "." . $image_extension[1];
                                Storage::disk('public')->put($nombreImg, base64_decode($image));
                                $this->crearRecursos($publicacion->id, $nombreImg);
                                $variable = ["insert" => ["image" => "/recursos/imgs/" . $nombreImg]];
                                array_push($publicacionArreglo, $variable);
                            } else {
                                /*$idR=$imagen[15];
                                $arreglo=explode("imgs/", $imagen);
                                $this->editarRecursos($idR,$publicacion->id,$arreglo[1],0);*/
                                $variable = ["insert" => ["image" => $imagen]];
                                array_push($publicacionArreglo, $variable);
                            }
                        }
                    }
                } else {
                    array_push($publicacionArreglo, $dato);
                }
            }
        }
        //Se reformatea el arreglo de publicacion
        $stringPublicacion = json_encode($publicacionArreglo);
        $tituloArreglo = $this->formatoTitulo($tituloPublicacion);
        $stringTitulo = json_encode($tituloArreglo);
        $publicacion->titulo = $stringTitulo;
        $publicacion->tituloSNFormato = $tituloSNFormato;
        $publicacion->descripcion = $descripcionPublicacion;
        $publicacion->contenido = $stringPublicacion;
        $publicacion->save();
        return redirect()->action('PublicacionController@verPagina');
    }

    public function eliminarPub($id)
    {
        PublicacionModel::destroy($id);
        return json_encode(["estado" => true]);
    }
}
