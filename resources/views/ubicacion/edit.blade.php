@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
<h1>Actualizar Ubicación</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('ubicaciones.update', $ubi->id) }}" method="post">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-md-6">
                    <label for="edificio">Ingrese el Edificio</label>
                    <input type="text" name="edificio" class="form-control" value="{{ $ubi->edificio }}" placeholder="Escriba el nombre del edificio"> <br>
                    @error('edificio')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="ciudad">Ingrese la Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" value="{{ $ubi->ciudad }}" placeholder="Escriba el nombre de la ciudad "> <br>
                    @error('ciudad')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                    @enderror
                </div>
            </div>
           

            <div class="row">
                <div class="col-md-6">
                    <label for="pais">Ingrese el País</label>
                    <input type="text" name="pais" class="form-control" value="{{ $ubi->pais }}" placeholder="Escriba el nombre del país "> <br>
                    @error('pais')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="id_departamento">Seleccione el Departamento</label>
                    <select name="id_departamento" class="focus border-dark  form-control">
                        @foreach ($depas as $depa)
                        @if ($ubi->id_departamento == $depa->id)
                        <option value={{ $depa->id }}>{{ $depa->nombre }}</option>
                        @endif
                        @endforeach

                        @foreach ($depas as $depa)
                        @if (!($ubi->id_departamento == $depa->id))
                        <option value={{ $depa->id }}>{{ $depa->nombre }}</option>
                        @endif
                        @endforeach
                    </select><br>
                </div>
            </div>
    </div>


    <center>
        <button class="btn btn-primary btb-sm text-light" type="submit">Actualizar Ubicación</button>
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
