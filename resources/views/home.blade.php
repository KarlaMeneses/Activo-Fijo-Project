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
<!--
    <div class="container">
        <nav>
            <ul class="mcd-menu">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                        <strong>Home</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="" class="active">
                        <i class="fa fa-edit"></i>
                        <strong>About us</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-gift"></i>
                        <strong>Features</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-globe"></i>
                        <strong>News</strong>
                        <small>sweet home</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Blog</strong>
                        <small>what they say</small>
                    </a>
                    <ul>
                        <li><a href="#"><i class="fa fa-globe"></i>Mission</a></li>
                        <li>
                            <a href="#"><i class="fa fa-group"></i>Our Team</a>
                            <ul>
                                <li><a href="#"><i class="fa fa-female"></i>Leyla Sparks</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-male"></i>Gleb Ismailov</a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-leaf"></i>About</a></li>
                                        <li><a href="#"><i class="fa fa-tasks"></i>Skills</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-female"></i>Viktoria Gibbers</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-trophy"></i>Rewards</a></li>
                        <li><a href="#"><i class="fa fa-certificate"></i>Certificates</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-envelope-o"></i>
                        <strong>Contacts</strong>
                        <small>drop a line</small>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

-->





@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@section('js')
    <script src="asset('js/app.js')"></script>
    <script src="asset('js/home.js')"></script>
@stop
