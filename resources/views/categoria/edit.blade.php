@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>Editar Datos De Categorias</b></h3>
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


            <form method="post" action="{{ route('categorias.update', $categoria) }}">
                @csrf
                @method('PATCH')
                <!--@method('put')-->


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Ingrese el nombre de cuenta contable</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $categoria->nombre }}"
                            id="nombre">

                    </div>

                    <div class="form-group col-md-6">
                        <label for="descripcion">Ingrese la descripción del activo</label>
                        <input type="text" name="descripcion" class="form-control" value="{{ $categoria->descripcion }}"
                            id="descripcion">
                    </div>

                    <div class="col-md-3">
                        <label for="tipo_activo">Seleccione el tipo activo</label>
                        <select name="tipo_activo" id="select-roles" class="form-control" onchange="habilitar()" required>
                            <option value="{{ $categoria->tipo_activo }}">{{ $categoria->tipo_activo }}</option>
                            <option value="Tangible">Tangible</option>
                            <option value="Intangible">Intangible</option>
                            <option value="Invesión">Invesión</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="cacateristica">Seleccione un cacateristica</label>
                        <select name="cacateristica" id="select-roles" class="form-control" onchange="habilitar()"
                            required>
                            <option value="{{ $categoria->cacateristica }}">{{ $categoria->cacateristica }}</option>
                            <option value="No depreciables">No depreciables</option>
                            <option value="Depreciable">Depreciable</option>
                            <option value="Agotable">Agotable</option>
                            <option value="Amortización">Amortización</option>
                            <option value="No Amortizable">No Amortizable</option>
                        </select>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-2">
                        <label for="vida_util">Ingrese la vida util (años)</label>
                        <input name="vida_util" type="tel" size="1" maxlength="2" pattern="[0-9-+()]{1,3}" placeholder=""
                            required class="form-control" value="{{ $categoria->vida_util }}" required>

                    </div>

                    <div class="col-md-2">
                        <label for="valor_residual">Ingrese el valor residual %</label>
                        <input type="tel" name="valor_residual" size="1" maxlength="3" pattern="[0-9-+()]{1,3}"
                            placeholder="" required class="form-control" value="{{ $categoria->vida_util }}" required>

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
