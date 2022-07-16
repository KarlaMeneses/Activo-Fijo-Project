@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header  text-center">
        <h3><b>REGISTRAR CATEGORIA</b></h3>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop
@section('content')
    <div class="card">

        <div class="card-body">
            @error('nombre')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta CATEGORIA ya está registrada.
                </div>
            @enderror


            <form method="post" action="{{ route('categorias.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">INGRESE EL NOMBRE DE CUENTA CONTABLE</label>
                        <input type="text" name="nombre" class="form-control" value="" placeholder="Nombre de la cuenta contable" required >
                    </div>

                    <div class="col-md-6">
                        <label for="descripcion">INGRESE LA DESCRIPCIÓN</label>
                        <input type="text" name="descripcion" class="form-control" value="" placeholder="Escriba una descripción del activo" required >
                    </div>

                    <div class="col-md-6">
                        <label for="tipo_activo">INGRESE EL TIPO</label>
                        <input type="text" name="tipo_activo" class="form-control" value="" placeholder="tangible, intangible , etc " required >
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="vida_util">INGRESE LA VIDA UTIL (AÑOS)</label>
                        <input name="vida_util" type="tel" size="0" maxlength="3" pattern="[0-9-+()]{0,2}" 
                        placeholder="Valor numérico" required class="form-control" value="" ">

                    </div>
                    <div class="col-md-6">
                        <label for="coeficiente">INGRESE EL COEFICIENTE (%)</label>
                        <input type="tel" name="coeficiente" size="0" maxlength="3" pattern="[0-9-+()]{0,2}"
                            placeholder="Valor numérico" required class="form-control" value="">
                    </div>
                </div>
                <br>
                <center>
                    <button class="btn btn-primary btb-sm text-light" type="submit">Registrar</button>
                    <a class="btn btn-warning btb-sm text-light" href="{{ route('categorias.index') }}">Volver</a>
                </center>
            </form>


        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
