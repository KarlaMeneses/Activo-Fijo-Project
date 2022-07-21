@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')


@section('content_header')
    <h1>Menu de Inicio</h1>

@stop

@section('content')


    <div class="card">
        <div class="card-header">
            <h1 class="card-title">SAAF</h1>
        </div>

        <div class="card-body">
            <p>El Software de Administración de Activo Fijo (SAAF) es un software que ofrece de manera junta un ambiente
                amigable y funcional en el cual encontrarás eficiencia al momento de subir y llevar el control de los
                activos que hay en tu empresa o múltiples empresas.</p>
        </div>
    </div>


    <div style="width: 6rem; position:relative;width:100%">



        <img style="margin:auto;display:block; padding-top: 5rem" width="400rem" src="{{ $empresa->foto }}" alt="">
    </div>

    <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
    </df-messenger>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
@stop

@section('js')
    <script src="asset('js/app.js')"></script>
    <script src="asset('js/home.js')"></script>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
@stop
