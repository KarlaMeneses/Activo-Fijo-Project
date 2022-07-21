@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

<div class="card-header  text-center">
    <h3><b>Registrar Empresa</b></h3>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('content')
<div class="card">
    <div class="card-body">

        @error('name')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Esta empresa ya está registrada.
        </div>
        @enderror
        <form action="{{ route('empresa.store') }}" method="post">
            @csrf

            @section('js')
            <script src="{{ asset('js/empresa.js') }}"></script>
            @endsection
            <center>
                {{-- separador --}}
                <div class="form-group col-md-3">
                    <img width="200" height="200" class="img-circle" id="foto">
                    <div class="custom-input-file">
                        <input type="file" id="file" accept="image/*" class="input-file" value="">
                        <i class="fas fa-file-upload"></i> Subir Logo...
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
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Ingrese el nombre de la empresa</label>
                    <input type="text" name="nombre" class="form-control" value="" placeholder="nombre de la empresa" required>
                </div>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="col-md-3">
                    <label for="juridica">Seleccione la estructura jurídica de la empresa</label>
                    <select name="juridica" id="juridica" class="form-control" onchange="habilitar()" placeholder="sexo" required>
                        <option value="S.C.">Sociedad Colectiva. (S.C.)</option>
                        <option value="S.C.S">Sociedad en Comandita Simple. (S.C.S.)</option>
                        <option value="S.R.L.">Sociedad de Responsabilidad Limitada. (S.R.L.)</option>
                        <option value="S.A.">Sociedad Anónima. (S.A.)</option>
                        <option value="S.C.A.">Sociedad en Comandita por Acciones. (S.C.A.)</option>
                        <option value="As">Asociación Accidental o de Cuentas en Participación</option>
                    </select>
                </div>
                @error('sexo')
                <span class="text-danger">{{ $message }}</span>
                @enderror

               
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="nit">Ingrese el NIT</label>
                    <input type="text" name="nit" class="form-control" value="" maxlength="30" size="0" pattern="{5,30}" placeholder="NIT" required>
                </div>
                <div class="col-md-6">
                    <label for="direccion">Ingrese la dirección</label>
                    <input type="text" name="direccion" class="form-control" value="" maxlength="30" size="0" pattern="{5,30}" placeholder="dirección" required>
                </div>
                @error('direccion')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-md-3">
                    <label for="email">Ingrese el correo de la empresa</label>
                    <input name="email" type="email"placeholder="empresa@gmail.com" class="form-control" value="" placeholder="edad" required>
                    @error('edad')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="col-md-3">
                    <label for="telefono">Ingrese el telefono</label>
                    <input name="telefono" type="tel" placeholder="+591XXXXXXXXX" class="form-control" value="{{ old('telefono') }}" size="0" maxlength="9" pattern="[0-9-+()]{6,9}" placeholder="+591XXXXXXXXX" require>
                    @error('telefono')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            

            <center>
                <button class="btn btn-primary btb-sm text-light" type="submit">Crear Empresa</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('empresa.index') }}">Volver</a>
            </center>
        </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');

    function habilitar() {
        if (rol.value > 0) {
            empleados.disabled = false
        } else {
            empleados.disabled = true
            empleados.value = 0
        }
    }

    function cargar() {
        if (rol.value > 0) {
            empleados.disabled = false
        } else {
            empleados.disabled = true
            empleados.value = 0
        }
    }
    /* function elegirE(){
        if(odontologos.value > 0){
            odontologos.disabled = false
        }
    } */

</script>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/bot.css') }}">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
