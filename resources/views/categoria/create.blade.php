@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header  text-center">
        <h3><b>Registrar Categoria</b></h3>
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
                    <strong>¡Error!</strong> Esta categoria ya está registrada.
                </div>
            @enderror


            <form method="post" action="{{ route('categorias.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Ingrese el nombre de cuenta contable</label>
                        <input type="text" name="nombre" class="form-control" value="" required>
                    </div>

                    <div class="col-md-6">
                        <label for="descripcion">Ingrese la descripción del activo</label>
                        <input type="text" name="descripcion" class="form-control" value="" required>
                    </div>


                    <div class="col-md-6">
                        <label for="estado">Ingrese la descripción del activo</label>
                        <input type="text" name="estado" class="form-control" value="" required>
                    </div>


<!--
                <div class="row">
                    <div class="col-md-3">
                        <label for="estado">Seleccione el Departamento</label>
                        <select name="estado" class="focus border-dark  form-control" value="{{ old('estado') }}">
                           <option value="Null">Null</option>
                           <option value="Disponible">Disponible</option>
                            <option value="No Disponible">No Disponible</option>
                       </select><br>
                    </div>
                -->

                    <div class="col-md-3">
                        <label for="id_depreciacion">Seleccione el Departamento</label>
                        <select name="id_depreciacion" class="focus border-dark  form-control">
                            @foreach ($depres as $depre)
                                <option value={{ $depre->id }}>{{ $depre->nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div>


                    <!--
                                                <div class="col-md-3">
                                                    <label for="tipo_activo">Seleccione el tipo activo</label>
                                                    <select name="tipo_activo" value="{{ old('tipo_activo') }}" class="form-control" required>
                                                        <option value="Null">Null</option>
                                                        <option value="Tangible">Tangible</option>
                                                        <option value="Intangible">Intangible</option>
                                                        <option value="Invesión">Invesión</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="cacateristica">Seleccione un cacateristica</label>
                                                    <select name="cacateristica" value="{{ old('cacateristica') }}" class="form-control" required>
                                                        <option value="Null">Null</option>
                                                        <option value="No depreciables">No depreciables</option>
                                                        <option value="Depreciable">Depreciable</option>
                                                        <option value="Agotable">Agotable</option>
                                                        <option value="Amortización">Amortización</option>
                                                        <option value="No Amortizable">No Amortizable</option>
                                                    </select>
                                                </div>

                                            -->
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
