@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <title>CodePen - Login form with slider in Bootstrap 4</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>
        <!-- partial:index.partial.html -->
        <section class="login-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 login-sec">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                ¡La contraseña y/o correo ingresado es incorrecto!
                            </div>
                        @enderror
                        <h2 class="text-center">Iniciar sesión</h2>
                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-uppercase">Correo</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1" class="text-uppercase">contraseña</label>
                                <input type="password" class="form-control" placeholder="">
                            </div>


                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    <small>Remember Me</small>
                                </label>
                                <button type="submit" class="btn btn-login float-right">Iniciar</button>
                            </div>

                        </form>
                        <div class="copy-text">GRUPO 4 <i class="fa fa-heart"></i> <a href="#">Software
                                Activo Fijo</a></div>
                    </div>
                    <div class="col-md-8 banner-sec">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid"
                                        src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <div class="banner-text">
                                            <h2>SISTEMA DE ACTIVO FIJO</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid"
                                        src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg"
                                        alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <div class="banner-text">
                                            <h2>SISTEMA DE ACTIVO FIJO</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid"
                                        src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg"
                                        alt="Third slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <div class="banner-text">
                                            <h2>SISTEMA DE ACTIVO FIJO</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </section>
        <!-- partial -->
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js'></script>


        <!--
                                                                                        <div class="container">
                                                                                            <div class="row justify-content-center">
                                                                                                <div class="col-md-8">
                                                                                                    <div class="card">
                                                                                                        <div class="card-header">{{ __('Login') }}</div>

                                                                                                        <div class="card-body">
                                                                                                            <form method="POST" action="{{ route('login') }}">
                                                                                                                @csrf

                                                                                                                <div class="row mb-3">
                                                                                                                    <label for="email"
                                                                                                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                                                                                    <div class="col-md-6">
                                                                                                                        <input id="email" type="email"
                                                                                                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                                                                                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                                                                        @error('email')
        <span class="invalid-feedback" role="alert">
                                                                                                                                                                                                                <strong>{{ $message }}</strong>
                                                                                                                                                                                                            </span>
    @enderror
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="row mb-3">
                                                                                                                    <label for="password"
                                                                                                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                                                                                    <div class="col-md-6">
                                                                                                                        <input id="password" type="password"
                                                                                                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                                                                                                            required autocomplete="current-password">

                                                                                                                        @error('password')
        <span class="invalid-feedback" role="alert">
                                                                                                                                                                                                                <strong>{{ $message }}</strong>
                                                                                                                                                                                                            </span>
    @enderror
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="row mb-3">
                                                                                                                    <div class="col-md-6 offset-md-4">
                                                                                                                        <div class="form-check">
                                                                                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                                                                                                {{ old('remember') ? 'checked' : '' }}>

                                                                                                                            <label class="form-check-label" for="remember">
                                                                                                                                {{ __('Remember Me') }}
                                                                                                                            </label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="row mb-0">
                                                                                                                    <div class="col-md-8 offset-md-4">
                                                                                                                        <button type="submit" class="btn btn-primary">
                                                                                                                            {{ __('Login') }}
                                                                                                                        </button>

                                                                                                                        @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                                                                                {{ __('Forgot Your Password?') }}
                                                                                                                            </a>
    @endif
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    -->
    @endsection
