@extends('Plantilla.Principal')
@section('contenido')
    {{__('messages.welcome')}}
<div class="columns">
    <div class="column">
        @foreach($publicaciones as $publicacion)
        @if($loop->iteration%2==1)
            <a class="box" href="{{route('nPub.ver',[$publicacion->id])}}" aria-label="Publicacion.">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{$publicacion->tituloSNFormato}}</strong>
                                <br>
                                {{$publicacion->descripcion}}
                            </p>
                        </div>
                    </div>
                </article>
            </a>
        @endif
        @endforeach
    </div>
    <div class="column">
        @foreach($publicaciones as $publicacion)
        @if($loop->iteration%2==0)
            <a class="box" href="{{route('nPub.ver',[$publicacion->id])}}" aria-label="Publicacion.">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{$publicacion->tituloSNFormato}}</strong>
                                <br>
                                {{$publicacion->descripcion}}
                            </p>
                        </div>
                    </div>
                </article>
            </a>
        @endif
        @endforeach
    </div>
</div>
        {{ $publicaciones->links('pagination.bulma')->with("elements",$publicaciones) }}
@stop