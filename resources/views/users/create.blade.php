@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Registrar Usuario</h1>
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

                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Ingrese el nombre de usuario</label>
                        <input type="text" name="name" class="form-control" value="" required>
                    </div>
                    <div class="col-md-3">
                        <label for="sexo">Seleccione un sexo</label>
                        <select name="sexo" id="select-roles" class="form-control" onchange="habilitar()">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="roles">Seleccione un rol</label>
                        <select name="roles" id="select-roles" class="form-control" onchange="habilitar()">
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="direccion">Ingrese la direccion</label>
                        <input type="text" name="direccion" class="form-control" value="" required>
                    </div>
                    <div class="col-md-3">
                        <label for="edad">Ingrese la edad</label>
                        <input type="text" name="edad" class="form-control" value="" required>
                    </div>
                    <div class="col-md-3">
                        <label for="telefono">Ingrese el telefono</label>
                        <input type="number" name="telefono" class="form-control" value="" required>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="email">Ingrese el correo electronico</label>
                        <input type="text" name="email" class="form-control" value="" required>
                        @error('email')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password">Ingrese la contraseña</label>
                        <input type="password" name="password" class="form-control" value="" required>
                        @error('password')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                </div>



                <label for="foto">Ingrese la foto</label>
                <input type="text" name="foto" class="form-control" value="" required>
                <br>
                <button class="btn btn-danger btn-sm" type="submit">Crear Usuario</button>
                <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">Volver</a>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop