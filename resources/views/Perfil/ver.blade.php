@extends('Plantilla.Principal')
@section('contenido')
    <link rel="stylesheet" type="text/css" href="{{asset('Css/datatables.css')}}">
    <script type="text/javascript" charset="utf8" src="{{asset('js/dataTables.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="pageloader" id="loader"><span class="title">Cargando por favor espere.</span></div>
    <div class="pageloader is-bottom-to-top" id="eliminar"><span class="title">Eliminando</span></div>
    <table id="tabla" class="table is-striped is-hoverable is-fullwidth">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody id="contenido">
        </tbody>
    </table>
    <input hidden id="urlRM" value="{{route('perfil.public')}}">
    <input hidden id="urlPD" value="{{route('Pub.del')}}">
    <input hidden id="idU" value="{{$idU}}">
    <input hidden id="urlVer" value="{{route('nPub.ver')}}">
    <script src="{{asset('js/verPerfil.js')}}"></script>
@stop