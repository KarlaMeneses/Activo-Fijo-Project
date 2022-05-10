@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>
    <h1>Editar Usuario</h1>
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
            <form action="{{ route('users.update', $user) }}" method="post" novalidate>
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Ingrese el nombre de usuario</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                            id="name">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="activar-contraseña">Nueva contraseña</label>
                        <input type="checkbox" name="activar-contraseña" id="check_password" onclick="cambiarEstado()">
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                            id="passwordInput" placeholder="Escriba la nueva contraseña">
                        @error('password')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                </div>

                <label for="email">Ingrese el correo electronico</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
                @error('email')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror

                <!--<label for="foto">Ingrese la foto</label>
                                    <input type="text" name="foto" class="form-control" value="{{ $user->foto }}" required>-->

                <div class="form-group col-md-6">
                    <label for="foto">Actual Foto</label>
                    <br>
                    <!--<img src="" alt="" id="foto">-->
                @section('js')
                    <script src="{{ asset('js/usuario.js') }}"></script>
                @endsection

                {{-- separador --}}
                <img height=100 width=100 src="{{ old('foto', $user->foto) }}">
                <br>
                <div class="custom-input-file">
                    <input type="file" id="file" accept="image/*" class="input-file" value="">
                    <i class="fas fa-file-upload"></i> Subir Foto...
                </div>
                <!--<input  type="url" value="" name="foto" id="foto" title="foto" placeholder="https://example.com" pattern="https?://.*" list="defaultURLs" class="focus border-primary  form-control" required oninvalid="this.setCustomValidity('Please match the requested format')" >-->
                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <label for="foto">Ingrese una nueva Foto</label>
                <br>
                <progress id="progress_bar" value="0" max="100"></progress>
                <br>
                <input type="hidden" value="{{ old('foto', $user->foto) }}" name="foto" id="fotov" title="foto"
                    placeholder="https://example.com" list="defaultURLs" class="focus border-dark form-control" required
                    oninvalid="this.setCustomValidity('Please match the requested format')">

                <img height=100 width=100 id="foto" src="">
                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <label for="edad">Ingrese la edad</label>
                <input type="number" name="edad" class="form-control" value="{{ $user->edad }}" required>

                <div>
                    <label for="sexo">Seleccione un sexo</label>
                    <select name="sexo" id="select-roles" class="form-control" onchange="habilitar()">

                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>

                    </select>
                    <br>
                </div>

                <label for="cargo">Ingrese el cargo</label>
                <input type="text" name="cargo" class="form-control" value="{{ $user->cargo }}" required>

                <label for="direccion">Ingrese la direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{ $user->direccion }}" required>

                <label for="telefono">Ingrese el telefono</label>
                <input type="number" name="telefono" class="form-control" value="{{ $user->telefono }}" required>

                <div>
                    <p>Seleccione un rol</p>
                    <select name="roles" id="select-roles" class="form-control" onchange="habilitar()">
                        <option value="{{ old('roles', $rol->role_id) }}">{{ $rol_name->name }}</option>
                        @foreach ($roles as $role)
                            @if (!($role->id == $rol->role_id))
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('roles')
                        <small>*{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div>
                    {{-- <label for="empleados">Seleccione un empleado</label>
                    <select name="empleados" class="form-control" id="select-empleados" disabled="" onchange="elegirE()" >
                        @if ($e > 0)
                            <option value="{{old('empleados' ,$empleado->id)}}">{{$empleado->nombre}}</option>                            
                        @else
                            <option value=0>Seleccione al empleado</option>                            
                        @endif
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre}}</option>
                            @endforeach
                    </select>
                    @error('empleados')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror --}}
                </div>
                <br>

                <button class="btn btn-primary" type="submit">Actualizar Usuario</button>
                <a class="btn btn-danger" href="{{ route('users.index') }}">Volver</a>
        </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    let checkP = document.getElementById('check_password');
    let contra = document.getElementById('passwordInput');

    function cambiarEstado() {
        if (contra.disabled == true) {
            contra.disabled = false
        } else {
            if (contra.disabled == false) {
                contra.disabled = true
                contra.value = ''
            }
        }
    }
    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');

    function cargar() {
        contra.disabled = true
        contra.value = ''
        empleados.disabled = false
    }

    function habilitar() {
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
