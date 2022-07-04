@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

<div class="card-header  text-center">
    <h3><b>Crear Activo Fijo</b></h3>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/subir.css') }}">
<link rel="stylesheet" href="{{ asset('css/qr.css') }}">

@stop



@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('activosfijo.store') }}" method="post">
            @csrf

            @section('js')
            <script src="{{ asset('js/activo.js') }}"></script>
            @endsection
            <center>
                {{-- separador --}}
                <div class="form-group col-md-3">
                    <img width="200" height="200" id="foto">
                    <div class="custom-input-file">
                        <input type="file" id="file" accept="image/*" class="input-file" value="">
                        <i class="fas fa-file-upload"></i> Subir Foto...
                    </div>
                    <div class="col-12" id="app" style="text-align:center;">
                        <progress id="progress_bar" value="0" max="100"></progress>
                        <input type="hidden" value="{{ old('foto') }}" name="foto" id="fotov" title="foto" placeholder="https://example.com" list="defaultURLs" class="focus border-dark  form-control" oninvalid="this.setCustomValidity('Please match the requested format')">
                    </div>
                    @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </center>

            <br>
            <div class="row">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="codigo">Codigo De Activo</label>
                        <input type="text" name="codigo" class="form-control" value="">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre Del Activo</label>
                        <input type="text" name="nombre" class="form-control" value="">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="detalle">Descripcion Del Activo</label>
                        <input type="text" name="detalle" class="form-control" value="">
                    </div>

                    <div class="col-md-3">
                        <label for="tipo">Tipo De Activo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option hidden disabled selected> -- seleccionar-- </option>
                            <option value="Tangible">Tangible</option>
                            <option value="Intangible">Intangible</option>
                            <option value="Inversion">Inversion</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="fecha_ingreso">Fecha Ingreso</label>
                        <input type="date" name="fecha_ingreso" class="form-control" value="">
                    </div>

                    <div class="col-md-3">
                        <label for="costo">Costo Activo</label>
                        <input name="costo" type="decimal" class="form-control" value="">
                    </div>

                    <div class="col-md-3">
                        <label for="vida_util">Vida Util Del Activo (años/meses)</label>
                        <input name="vida_util" type="text" class="form-control" value="">
                    </div>

                    <div class="col-md-3">
                        <label for="estado">Seleccione El Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option hidden disabled selected> -- seleccionar-- </option>
                            <option value="Activo">Activo</option>
                            <option value="En Mantenimiento">En Mantenimiento</option>
                            <option value="No Activo">No Activo</option>
                            <option value="Perdida/Extrabio">Perdidad / Extrabio</option>
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="proveedor">Proveedor Del Activo</label>
                        <input type="text" name="proveedor" class="form-control" value="">
                    </div>


                    <div class="col-md-3">
                        <label for="id_ubicacion">Seleccione la Ubicacion</label>
                        <select name="id_ubicacion" class="focus border-dark  form-control">
                            <option hidden disabled selected value> -- seleccionar-- </option>
                            @foreach ($ubi as $ubi)
                            <option value="{{ $ubi->edificio }}">{{ $ubi->edificio }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="col-md-6">
                        <label for="id_factura">Factura</label>
                        <input type="text" name="id_factura" class="form-control" value="Automatico id al realizar la factura">
                    </div>

                </div>
            </div>
            <br>


            <button class="btn btn-danger btn-sm" type="submit">Crear Activo</button>
            <a class="btn btn-primary btn-sm" href="{{ route('activosfijo.index') }}">Volver</a>
        </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');

    function habilitar() {
        if (rol.value > 0) {
            empleados = false
        } else {
            empleados = true
            empleados.value = 0
        }
    }

    function cargar() {
        if (rol.value > 0) {
            empleados = false
        } else {
            empleados = true
            empleados.value = 0
        }
    }
    /* function elegirE(){
        if(odontologos.value > 0){
            odontologos = false
        }
    } */

</script>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
