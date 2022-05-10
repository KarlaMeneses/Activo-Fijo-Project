@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>
    <h1>Registrar Usuario</h1>
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
                <label for="name">Ingrese el nombre de usuario</label>
                <!--<input type="text" name="name" class="form-control" value="" required>-->
                <input type="text" min="5" max="30" maxlength="30" size="0" pattern="{5,30}" placeholder="Nombre de usuario"
                    name="name" class="focus border-dark  form-control form-group col-md-3" value="" required>
                <br>
                <label for="email">Ingrese el correo electronico</label>
                <input type="text" name="email" class="form-control" value="" required>
                @error('email')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror



                <!--<label for="foto">Ingrese la foto</label>
                                        <input type="text" name="foto" class="form-control" value="" required>-->

                <label for="foto">Ingrese una foto</label>
                <!--<img src="" alt="" id="foto">-->
            @section('js')
                <script src="{{ asset('js/usuario.js') }}"></script>
            @endsection

            {{-- separador --}}
            <div class="form-group col-md-3">
                <div class="custom-input-file">
                    <input type="file" id="file" accept="image/*" class="input-file" value="">
                    <i class="fas fa-file-upload"></i> Subir Foto...
                </div>
                <div class="col-12" id="app" style="text-align:center;">

                    <progress id="progress_bar" value="0" max="100"></progress>
                    <br><img height=200 width=215 id="foto" src="">
                    <input type="hidden" value="" name="foto" id="fotov" title="foto" placeholder="https://example.com"
                        list="defaultURLs" class="focus border-dark  form-control" required
                        oninvalid="this.setCustomValidity('Please match the requested format')">
                    <!--<input  type="url" value="" name="foto" id="foto" title="foto" placeholder="https://example.com" pattern="https?://.*" list="defaultURLs" class="focus border-primary  form-control" required oninvalid="this.setCustomValidity('Please match the requested format')" >-->
                </div>
                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <label for="edad">Ingrese la edad</label>
            <input type="text" name="edad" class="form-control" value="" required>

            <div>
                <label for="sexo">Seleccione un sexo</label>
                <select name="sexo" id="select-roles" class="form-control" onchange="habilitar()">

                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>

                </select>
                <br>
            </div>

            <label for="cargo">Ingrese el cargo</label>
            <input type="text" name="cargo" class="form-control" value="" required>

            <label for="direccion">Ingrese la direccion</label>
            <input type="text" name="direccion" class="form-control" value="" required>

            <label for="telefono">Ingrese el telefono</label>
            <input type="number" name="telefono" class="form-control" value="" required>



            <br>
            <label for="password">Ingrese la contraseña</label>
            <input type="password" name="password" class="form-control" value="" required>
            @error('password')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
            <br>


            <div>
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
                <br>
            </div>


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
