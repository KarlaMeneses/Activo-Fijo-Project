@extends('adminlte::page')

@section('title', 'ActivoFijo')

@section('content_header')
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<div class="card-header  text-center">
    <h3><b>Editar Empresa</b></h3>
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
            <strong>¡Error!</strong> Esta empresa ya esta registrada.
        </div>
        @enderror

        <form action="{{ route('empresa.update', $empresa->id) }}" method="post" novalidate>
            @csrf
            @method('put')

            <center>
                <div class="form-group col-md-3">
                    <label for="foto">Ingrese una foto</label>
                    @section('js')
                    <script src="{{ asset('js/empresa.js') }}"></script>
                    @endsection

                    <!--<h5>Foto:</h5>-->
                    <div class="col-12" id="app" style="text-align:center;">
                        <img width="200" height="200" class="img-circle" src="{{ old('foto', $empresa->foto) }}" onerror="this.style.display='none'">
                        <progress id="progress_bar" value="0" max="100"></progress>
                    </div>
                    @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <input type="hidden" value="{{ old('foto', $empresa->foto) }}" name="foto" id="fotov" title="foto" placeholder="https://example.com" list="defaultURLs" class="focus border-dark  form-control" required oninvalid="this.setCustomValidity('Please match the requested format')">

                    <div class="custom-input-file">
                        <input type="file" id="file" accept="image/*" class="input-file" value="">
                        <i class="fas fa-file-upload"></i> Subir Foto...
                    </div>

                    <!--Nueva Foto-->
                    <div class="col-12" id="app" style="text-align:center;">
                        <img width="0" height="0" class="img-circle" id="foto" src="">
                        @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </center>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Ingrese el nombre de la empresa</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $empresa->nombre) }}" id="nombre">

                </div>
               
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="email">Ingrese el correo electronico</label>
                    <input type="text" name="email" class="form-control" value="{{ $empresa->email }}" required>
                    @error('email')
                    <small>*{{ $message }}</small>
                    <br><br>
                    @enderror

                </div>
                <div class="col-md-3">
                    <label for="edad">Ingrese el NIT</label>
                    <input type="number" name="nit" class="form-control" value="{{ $empresa->nit }}" required>
                </div>
                <div class="col-md-3">
                    <label for="telefono">Ingrese el telefono</label>
                    <input type="number" name="telefono" class="form-control" value="{{ $empresa->telefono }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="direccion">Ingrese la direccion</label>
                    <input type="text" name="direccion" class="form-control" value="{{ $empresa->direccion }}" required>

                </div>
                <div class="col-md-3">
                    <label for="sexo">Seleccione la estructura jurídica de la empresa</label>
       
                        <select name="juridica" id="juridica" class="form-control" onchange="habilitar()" placeholder="" required>
                            <option value="S.C.">Sociedad Colectiva. (S.C.)</option>
                            <option value="S.C.S">Sociedad en Comandita Simple. (S.C.S.)</option>
                            <option value="S.R.L.">Sociedad de Responsabilidad Limitada. (S.R.L.)</option>
                            <option value="S.A.">Sociedad Anónima. (S.A.)</option>
                            <option value="S.C.A.">Sociedad en Comandita por Acciones. (S.C.A.)</option>
                            <option value="As">Asociación Accidental o de Cuentas en Participación</option>
                        </select>
                   
                </div>
               
            </div>

            <br>


            <center>
                <button class="btn btn-primary btb-sm text-light" type="submit">Guardar</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('empresa.index') }}">Volver</a>
            </center>

        </form>

    </div>
    <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
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
<link rel="stylesheet" href="{{ asset('css/bot.css') }}">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
