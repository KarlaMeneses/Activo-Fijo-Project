@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
<h1>Crear Ubicación</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('ubicaciones.store') }}" method="post" novalidate>
            @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="edificio">Ingrese el Edificio</label>
                        <input type="text" name="edificio" class="form-control" placeholder="Escriba el nombre del edificio">  <br>
                        @error('edificio')
                            <small class="text-danger">*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="ciudad">Ingrese la Ciudad</label>
                        <input type="text" name="ciudad" class="form-control" placeholder="Escriba el nombre de la ciudad "> <br>
                        @error('ciudad')
                            <small class="text-danger">*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>

                 
            <div class="row">
                <div class="col-md-6">
                    <label for="edificio">Ingrese el Edificio</label>
                    <input type="text" name="edificio" class="form-control" placeholder="Escriba el nombre del edificio"> <br>
                    @error('edificio')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="ciudad">Ingrese la Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" placeholder="Escriba el nombre de la ciudad "> <br>
                    @error('ciudad')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                    @enderror
                </div>
            </div>

           

            <center>
                <button class="btn btn-primary btb-sm text-light" type="submit">Crear Ubicación</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('ubicaciones.index') }}">Volver</a>
            </center>


        </form>


            <div class="row">
                <div class="col-md-6">
                    <label for="pais">Ingrese el País</label>
                    <input type="text" name="pais" class="form-control" placeholder="Escriba el nombre del país "> <br>
                    @error('pais')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="id_departamento">Seleccione el Departamento</label>
                    <select name="id_departamento" class="focus border-dark  form-control">
                        @foreach ($depas as $depa)
                        <option value={{ $depa->id }}>{{ $depa->nombre }}</option>
                        @endforeach
                    </select><br>
                </div>
            </div>
    </div>



    <center>
        <button class="btn btn-primary btb-sm text-light" type="submit">Crear Ubicación</button>
        <button class="btn btn-warning btb-sm text-light" type="button" onclick="history.back()"></i> Volver</button>

    </center>


    </form>

</div>
<df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
    </div>
    @stop

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script>
        console.log('Hi!');

    </script>
    @stop
