<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Author: Obed Martinez Gonzalez,
    Engineer, Category: Forum,">
    <title>DeveloperObedNoe22</title>
</head>
<header>
    {{--<link rel="stylesheet" href="{{asset('Css/bulma.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('Css/all.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</header>
<nav class="navbar is-fixed-top is-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{route('inicio.show')}}">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28" alt="Logo.">
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
           data-target="navMenu" id="burguer">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{route('inicio.show')}}"
               aria-label="{{__('messages.start')}}">{{__('messages.start')}}</a>
            <a class="navbar-item" aria-label="{{__('messages.themes')}}">{{__('messages.themes')}}</a>
            <a class="navbar-item" aria-label="{{__('messages.projects')}}">{{__('messages.projects')}}</a>
            <a class="navbar-item" aria-label="{{__('messages.contact')}}">{{__('messages.contact')}}</a>
        </div>
        <div class="navbar-end field has-addons">
            <div class="control">
                <button type="button" class="button" aria-label="Buscar.">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="control">
                <input class="input" placeholder="{{__('messages.search')}}" aria-label="{{__('messages.search')}}">
            </div>
        </div>
    </div>
</nav>
<body>
<main class="content contenido">
    @yield('contenido')
</main>
<footer class="footer">
    <div class="columns has-text-centered">
        <div class="column">
            <a href="{{route('inicio.show')}}">{{__('messages.start')}}</a>
        </div>
        <div class="column ">
            <p>Web diseñada por Obed Noe Martinez</p>
        </div>
    </div>
    <div class="columns has-text-centered">
        <div class="column">
            <p>Top tutoriales</p>
            <div class="pared">
                <a>Prueba1</a>
                <a>Prueba1</a>
            </div>
        </div>
        <div class="column">
            <p>Top ejemplos</p>
            <a>Prueba1</a>
            <a>Prueba1</a>
        </div>
    </div>
    <div class="column">
        <a href="{{route('change.locale',"es")}}">{{__('messages.liEsp')}}</a>
        <a href="{{route('change.locale',"en")}}">{{__('messages.liEng')}}</a>
    </div>
    <div style="font-size: 12px">
        <p>Copyright © 2019 – 2022 All Rights Reserved.</p>
        <a href="{{route('inicio.show')}}">{{__('messages.msjContenido')}}</a>
    </div>
</footer>
</body>
<script src="{{asset('js/scripts.js')}}"></script>
</html>
