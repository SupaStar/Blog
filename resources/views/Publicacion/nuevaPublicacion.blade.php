@extends('Plantilla.Principal')
@section('contenido')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <div class="notification is-danger" id="notificacion" style="display: none">
        <button class="delete" onclick="cerrarNotificacion()"></button>
        {{__('publication.msjPublication')}}
    </div>
    <div class="field">
        <label class="label is-large">{{__('publication.title')}}</label>
        <div id="titulo"></div>
    </div>
    <form method="post" action="{{route('nPub.new')}}" name="NuevaPublicacion">
        @csrf
        <input id="dataT" name="dataT" hidden>
        <input id="dataPub" name="dataPub" hidden>
        <input id="tituloSN" name="tituloSN" hidden>
        <div class="field">
            <label class="label is-large">{{__('publication.description')}}</label>
            <textarea aria-label="Descripcion" name="descripcion" class="textarea is-primary"
                      placeholder="{{__('publication.holdDesc')}}"></textarea>
        </div>
    </form>
    <div class="field">
        <label class="label is-large">{{__('publication.publication')}}</label>
        <div id="publicacion" class="editor"></div>
    </div>
    <button aria-label="Publicar." type="button" class="button is-primary is-medium is-fullwidth" id="publicar">{{__('publication.post')}}</button>
<script>
    /*

     Quill de nueva publicacion

     */
    var toolbarOptions = [
        [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
        [{'header': [1, 2, 3, 4, 5, 6, false]}],
        [{'font': []}],
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],
        [{'header': 1}, {'header': 2}],               // custom button values
        [{'list': 'ordered'}, {'list': 'bullet'}],
        //[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{'color': []}, {'background': []}],          // dropdown with defaults from theme
        [{'align': []}]
    ];
    var toolbarOptionsPub = [
        [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
        [{'header': [1, 2, 3, 4, 5, 6, false]}],
        [{'font': []}],
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],
        [{'header': 1}, {'header': 2}],               // custom button values
        [{'list': 'ordered'}, {'list': 'bullet'}],
        //[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{'color': []}, {'background': []}],          // dropdown with defaults from theme
        [{'align': []}],
        ['image'/*, 'video'*/]
    ];
    var options = {
        placeholder: '<?php echo __('publication.holdTit') ?>',
        readOnly: false,
        theme: 'snow',
        modules: {
            toolbar: toolbarOptions
        }
    };
    var optionsPub = {
        placeholder: '<?php echo __('publication.holdPub') ?>',
        readOnly: false,
        theme: 'snow',
        modules: {
            toolbar: toolbarOptionsPub
        }
    };
    var titulo = new Quill('#titulo', options);
    var publicacion = new Quill('#publicacion', optionsPub);
    var btnPublicar=document.getElementById("publicar");
    btnPublicar.onclick=function() {
        titulobd = titulo.getContents();
        otrotitulo=titulo.getText();
        publicacionbd = publicacion.getContents();
        if (titulobd.ops[0].insert !== "\n" && publicacionbd.ops[0].insert !== "\n") {
            document.getElementById('dataT').value = JSON.stringify(titulobd);
            document.getElementById('dataPub').value = JSON.stringify(publicacionbd);
            document.getElementById('tituloSN').value = otrotitulo;
            document.NuevaPublicacion.submit();
        } else {
            document.getElementById('notificacion').style.display = "block";
            window.scroll(0, 0);
        }
    }
    function cerrarNotificacion() {
        document.getElementById('notificacion').style.display = "none";
    }
</script>
@stop