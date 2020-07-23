@extends('Plantilla.Principal')
@section('contenido')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link rel="stylesheet" href="{{asset('Css/usosL.css')}}">
    <div class="column">
        <div class="field">
            <div id="titulo"></div>
        </div>
    </div>
    <div class="field">
        <label class="label is-large">{{__('publication.publication')}}</label>
        <div id="publicacion" class="editor"></div>
    </div>
    <script>
        var options = {
            placeholder: '<?php echo __('publication.holdTit') ?>',
            readOnly: true,
            theme: 'bubble'
        };
        var titul = new Quill('#titulo', options);
        var contenido = new Quill('#publicacion', options);
        titul.setContents(<?php echo $publicacion->titulo;?>);
        contenido.setContents(<?php echo $publicacion->contenido;?>);
    </script>
@stop