@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

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
                        <input type="text" name="edificio" class="form-control" value="{{ $ubi->edificio }}"> <br>
                        @error('edificio')
                            <small class="text-danger">*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="ciudad">Ingrese la Ciudad</label>
                        <input type="text" name="ciudad" class="form-control" value="{{ $ubi->ciudad }}"> <br>
                        @error('ciudad')
                            <small class="text-danger">*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="pais">Ingrese el País</label>
                        <input type="text" name="pais" class="form-control" value="{{ $ubi->pais }}"> <br>
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



                <div>
                    <button class="btn btn-danger btn-sm" type="submit">Actualizar Ubicación</button>
                    <a class="btn btn-primary btn-sm" href="{{ route('ubicaciones.index') }}">Volver</a>
                </div>

            </form>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
