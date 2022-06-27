@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

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
        {{-- datos --}}
        <div class="card">
            <div class="card-header">
                <center>
                    <h2 class="font-weight-bold px-2">Información de la Empresa</h2>
                </center>
            </div>
        </div>


        <div>
            <center>
                <img src="{{ asset($empresa->foto) }}" width="200" height="200" class="img-circle" />
                <br>
                <label for="name">Vista detallada de {{ $empresa->nombre }} {{ $empresa->juridica }}  </label>

            </center>
        </div>

        <div class="row">

            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="name">Nombre de la Empresa: </label>
                    <input type="text" name="nombre" class="form-control" value="{{ $empresa->nombre }}" disabled>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="nit">NIT: </label>
                    <input type="text" name="nit" class="form-control" value="{{ $empresa->nit }}" disabled>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="name">Telefono: </label>
                    <input type="text" name="telefono" class="form-control" value="{{ $empresa->telefono }}" disabled>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="name">Estrcutura Jurídica: </label>
                    <input type="text" name="juridica" class="form-control" value="{{ $empresa->juridica }}" disabled>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="direccion">Direccion: </label>
                    <input type="text" name="direccion" class="form-control" value="{{ $empresa->direccion }}" disabled>
                </div>
            </div>


            

            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="email">Correo: </label>
                    <input type="text" name="email" class="form-control" value="{{ $empresa->email }}" disabled>
                </div>
            </div>

            
            <br>
        </div>
        <center>
            <a class="btn btn-warning btb-sm text-light" href="{{ route('empresa.index') }}">Volver</a>
            <a href="{{ route('empresa.edit', $empresa->id) }}" class="btn btn-primary btb-sm text-light"> Editar </a>
        </center>

    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/bot.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#empresas').DataTable();
    });

</script>
@stop
