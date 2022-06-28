@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

<div class="card-header  text-center">
    <h3><b>Registrar Usuario</b></h3>
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
            <strong>¡Error!</strong> Este usuario ya está registrado.
        </div>
        @enderror
        <form action="{{ route('users.store') }}" method="post">
            @csrf

            @section('js')
            <script src="{{ asset('js/usuario.js') }}"></script>
            @endsection
            <center>
                {{-- separador --}}
                <div class="form-group col-md-3">
                    <img width="200" height="200" class="img-circle" id="foto">
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
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Ingrese el nombre de usuario</label>
                    <input type="text" name="name" class="form-control" value="" placeholder="Nombres y Apellidos " required>
                </div>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="col-md-3">
                    <label for="sexo">Seleccione un sexo</label>
                    <select name="sexo" id="sexo" class="form-control" onchange="habilitar()" placeholder="sexo" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                @error('sexo')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-md-3">
                    <label for="roles">Seleccione un rol</label>
                    <select name="roles" id="select-roles" class="form-control" onchange="habilitar()" required>
                        @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="direccion">Ingrese la dirección</label>
                    <input type="text" name="direccion" class="form-control" value="" maxlength="30" size="0" pattern="{5,30}" placeholder="dirección del usuario" required>
                </div>
                @error('direccion')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-md-3">
                    <label for="edad">Ingrese la edad</label>
                    <input name="edad" type="tel" size="2" maxlength="2" pattern="[0-9-+()]{2,2}"
                        class="form-control" value="" placeholder="Edad del ususario" required>
                    @error('edad')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="col-md-3">
                    <label for="telefono">Ingrese el teléfono</label>
                    <input name="telefono" type="tel" placeholder="+591XXXXXXXXX" class="form-control" value="{{ old('telefono') }}" size="0" maxlength="9" pattern="[0-9-+()]{6,9}" placeholder="+591XXXXXXXXX" require>
                    @error('telefono')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="email">Ingrese el correo electronico</label>
                    <input type="text" name="email" class="form-control" value="" placeholder="Ecriba el correo" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password">Ingrese la contraseña</label>
                    <input type="password" name="password" class="form-control" value="" placeholder="***********" required>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <br>

            <center>
                <button class="btn btn-primary btb-sm text-light" type="submit">Crear Usuario</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('users.index') }}">Volver</a>
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
