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
        <img style="margin:auto;display:block; padding-top: 6rem" width="400rem"
            src="https://anepsa.com.mx/wp-content/uploads/2021/05/SAAF-logo-con-tipografi%CC%81a.png" alt="">
    </div>

<div class="container mt-2">
<!--   <div class="card card-block mb-2">
    <h4 class="card-title">Card 1</h4>
    <p class="card-text">Welcom to bootstrap card styles</p>
    <a href="#" class="btn btn-primary">Submit</a>
  </div>   -->
  <div class="row">
    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
      <h4 class="card-title text-right"><i class="material-icons">settings</i></h4>
    <img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg" alt="Photo of sunset">
        <h5 class="card-title mt-3 mb-3">Sierra Web Development • Owner</h5>
        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p>
  </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
      <h4 class="card-title text-right"><i class="material-icons">settings</i></h4>
    <img src="https://static.pexels.com/photos/7357/startup-photos.jpg" alt="Photo of sunset">
        <h5 class="card-title  mt-3 mb-3">ProVyuh</h5>
        <p class="card-text">This is a company that builds websites, web .</p>
  </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
      <h4 class="card-title text-right"><i class="material-icons">settings</i></h4>
    <img src="https://static.pexels.com/photos/262550/pexels-photo-262550.jpeg" alt="Photo of sunset">
        <h5 class="card-title  mt-3 mb-3">ProVyuh</h5>
        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p>
  </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
      <h4 class="card-title text-right"><i class="material-icons">settings</i></h4>
    <img src="https://static.pexels.com/photos/326424/pexels-photo-326424.jpeg" alt="Photo of sunset">
        <h5 class="card-title  mt-3 mb-3">ProVyuh</h5>
        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p>
  </div>
    </div>
  </div>

</div>



<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="bots"
  agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7"
  language-code="es"
></df-messenger>





@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
@stop

@section('js')
    <script src="asset('js/app.js')"></script>
    <script src="asset('js/home.js')"></script>
@stop
