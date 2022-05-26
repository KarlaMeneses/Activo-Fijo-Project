@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <center>
                        <h2 class="font-weight-bold px-2">Información de la Bitacora</h2>
                    </center>
                </div>
            </div>



        <section class="login-block">
            <div class="container">
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                ¡La contraseña y/o correo ingresado es incorrecto!
                            </div>
                        @enderror
                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-uppercase">Correo:</label>
                                <input id="email" type="email" placeholder="correo@example.com"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="text-uppercase">contraseña</label>
                                <input id="password" type="password" placeholder="Contraseña"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                            </div>



                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    <small>Remember Me</small>
                                </label>

                                <button type="submit" class="btn btn-primary btb-sm text-light">Iniciar</button>
                                {{ __('Login') }}
                                </button>
                            </div>


                        </form>
        </section>

            </div>
            <br>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoria').DataTable();
        });
    </script>
@stop
