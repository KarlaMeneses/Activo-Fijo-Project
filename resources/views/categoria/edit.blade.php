@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>EDITAR DATOS DE CATEGORIA</b></h3>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @error('nombre')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta categoria ya está registrada.
                </div>
            @enderror

            <form method="post" action="{{ route('categorias.update', $cate->id) }}" novalidate>
                @csrf
                @method('PATCH')
                <!--@method('put')-->

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">INGRESE EL NOMBRE DE CUENTA CONTABLE</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $cate->nombre }}"
                            id="nombre" placeholder="Nombre de la cuenta contable">

                    </div>

                    <div class="form-group col-md-6">
                        <label for="descripcion">INGRESE LA DESCRIPCIÓN DEL ACTIVO</label>
                        <input type="text" name="descripcion" class="form-control" value="{{ $cate->descripcion }}"
                            id="descripcion" placeholder="Escriba una descripción del activo">
                    </div>

                    <div class="col-md-3">
                        <label for="tipo_activo">SELECCIONE EL TIPO ACTIVO</label>
                        <select name="tipo_activo" id="tipo_activo" class="form-select" required>
                            @if ($cate->tipo_activo == 'Tangible')
                                <option value="Tangible" selected>Tangible</option>
                                <option value="Intangible">Intangible</option>
                                <option value="Inversion">Inversion</option>
                            @else
                                @if ($cate->tipo_activo == 'Intangible')
                                    <option value="Tangible">Tangible</option>
                                    <option value="Intangible" selected>Intangible</option>
                                    <option value="Inversion">Inversion</option>
                                @else
                                    <option value="Tangible">Tangible</option>
                                    <option value="Intangible">Intangible</option>
                                    <option value="Inversion" selected>Inversion</option>
                                @endif
                            @endif
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="vida_util">INGRESE LA VIDA UTIL (AÑOS)</label>
                        <input name="vida_util" type="tel" size="2" maxlength="2" pattern="[0-9-+()]{1,3}"
                            placeholder="" required class="form-control" value="{{ $cate->vida_util }}" required>
                    </div>

                    <div class="col-md-3">
                        <label for="coeficiente">INGRESE EL COEFICIENTE</label>
                        <input type="tel" name="coeficiente" size="3" maxlength="3" pattern="[0-9-+()]{1,3}"
                            placeholder="Valor numérico" placeholder="" required class="form-control"
                            value="{{ $cate->coeficiente }}" required>
                    </div>
                </div>
        </div>

        <br>
        <center>
            <button class="btn btn-primary btb-sm text-light" type="submit">Guardar</button>
            <a class="btn btn-warning btb-sm text-light" href="{{ route('categorias.index') }}">Volver</a>
        </center>
        </form>
    </div>
    </div>
@stop
