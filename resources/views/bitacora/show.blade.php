@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
@stop


@section('content')
<br>
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {{-- @if (session('success'))
                <div class="alert alert-success" role="success">
                    {{ session('success') }}
                </div>
            @endif --}}



            <div class="card">
                <div class="card-header">
                    <center>
                        <h2 class="font-weight-bold px-2">Información de la Bitacora</h2>
                    </center>
                </div>
            </div>



            <section class="login-block">
                <div class="container">


                    <form method="POST" action="{{ route('bitacora.downloadTxt') }}" class="login-form">
                        @csrf


                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">contraseña</label>
                            <input id="contra" type="password" placeholder="Ingrese la contraseña"
                                class="form-control" name="contra" required>
                            {{-- <input id="contra" type="text" placeholder="Contraseña"
                                class="form-control @error('password') is-invalid @enderror" name="contra" required> --}}
                        </div>


                        <button type="submit" class="btn btn-primary btb-sm text-light">Autenticar Key</button>



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
