@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <div class="card-header  text-center">
        <h3><b>Actualizar Activo Fijo</b></h3>
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
            <form action="{{ route('activosfijo.update', $activofijo) }}" method="post" novalidate>
                @csrf
                @method('put')
                <div class="row">
                    <label for="name">Vista detallada de {{ $activofijo->detalle }} </label>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        @section('js')
                            <script src="{{ asset('js/activo.js') }}"></script>
                        @endsection
                        <img width="350" height="300" src="{{ old('foto', $activofijo->foto) }}">
                        <div class="custom-input-file">
                            <input type="file" id="file" accept="image/*" class="input-file" value="">
                            <i class="fas fa-file-upload"></i> Subir Foto...
                        </div>
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <progress id="progress_bar" value="0" max="100"></progress>
                        <input type="hidden" value="{{ old('foto', $activofijo->foto) }}" name="foto" id="fotov"
                            title="foto" placeholder="https://example.com" list="defaultURLs"
                            class="focus border-dark form-control" required
                            oninvalid="this.setCustomValidity('Please match the requested format')">
                        <img height=0 width=0 id="foto" src="">
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <center>
                            <label for="name">Vista detallada de {{ $activofijo->detalle }} </label>
                            <div id="qrcode">
                                <a href="{{ $activofijo->id }}">descagar</a>
                            </div>
                        </center>
                    </div>

                </div>
            </div>

            <br>
            <div class="card">
                <div class="card-body" style="background-color: #00AA9E;">
                    <div class="row">
                        <div class="form-row">
                            <div class="card-header form-group col-md-12">
                                <h5 class="font-weight-bold px-2">DATOS DEL ACTIVO</h5>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="codigo">Codigo De Activo</label>
                                <input type="text" name="codigo" class="form-control"
                                    value="{{ $activofijo->codigo }}">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre Del Activo</label>
                                <input type="text" name="nombre" class="form-control"
                                    value="{{ $activofijo->nombre }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="detalle">Descripcion Del Activo</label>
                                <input type="text" name="detalle" class="form-control"
                                    value="{{ $activofijo->detalle }}">
                            </div>

                            <div class="col-md-3">
                                <label for="fecha_ingreso">Fecha Ingreso</label>
                                <input name="fecha_ingreso" type="date" class="form-control"
                                    value="{{ $activofijo->fecha_ingreso }}">
                            </div>

                            <div class="col-md-3">
                                <label for="costo">Costo Activo</label>
                                <input name="costo" type="text" class="form-control"
                                    value="{{ $activofijo->costo }}">
                            </div>

                            <div class="col-md-3">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" class="form-control"
                                    value="{{ $activofijo->estado }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="proveedor">Proveedor Del Activo</label>
                                <input type="text" name="proveedor" class="form-control"
                                    value="{{ $activofijo->proveedor }}">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body" style="background-color: #00AA9E;">
                    <div class="row">
                        <div class="form-row">
                            <div class="card-header form-group col-md-12">
                                <h5 class="font-weight-bold px-2">UBICACION DEL ACTIVO</h5>
                            </div>
                            <div class="col-md-12">
                                <label for="id_ubicacion">Seleccione la Ubicacion</label>
                                <select name="id_ubicacion" class="focus border-dark  form-control">
                                    <option hidden disabled selected value> -- {{ $ubicaci->edificio }} /
                                        {{ $depa->nombre }} / {{ $ubicaci->ciudad }} -- </option>
                                    @foreach ($ubicaciones as $ubi)
                                        @foreach ($departamentos as $departamento)
                                            @if ($departamento->id == $ubi->id_departamento)
                                                <option value="{{ $ubi->edificio }}">
                                                    {{ $ubi->edificio }} / {{ $departamento->nombre }} /
                                                    {{ $ubi->ciudad }}</option>
                                            @endif
                                        @endforeach
                                    @endforeach

                                </select><br>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-body" style="background-color: #E6E6E6;">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <br>
                        <center>
                            <img height=120 width=200 data-value="{{ $activofijo->codigo }}" class="codigo"
                                id="contenedor" />
                        </center>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <button class="btn btn-primary" type="submit">Actualizar Usuario</button>
            {{-- <a class="btn btn-danger" href="{{ route('activosfijo.index') }}">Volver</a> --}}
            <button class="btn btn-warning btb-sm text-light" type="button" onclick="history.back()"></i>
                Volver</button>

        </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    let checkP = document.getElementById('check_password');
    let contra = document.getElementById('passwordInput');

    function cambiarEstado() {
        if (contra. == true) {
            contra. = false
        } else {
            if (contra. == false) {
                contra. = true
                contra.value = ''
            }
        }
    }
    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');

    function cargar() {
        contra. = true
        contra.value = ''
        empleados. = false
    }

    function habilitar() {
        if (rol.value > 0) {
            empleados. = false
        } else {
            empleados. = true
            empleados.value = 0
        }
    }
    /* function elegirE(){
        if(odontologos.value > 0){
            odontologos. = false
        }
    } */
</script>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    window.addEventListener("load", () => {
        var qrc = new QRCode(document.getElementById("qrcode"), "{{ $activofijo->id }}");
    });
</script>

<script>
    const activo = [{
        nombre: "activo",
        precio: 20,
        codigo: "123",
    }];
    const $contenedor = document.querySelector("#contenedor");
    // Por cada producto, crear un SVG y adjuntarlo
    activo.forEach(activo => {
        const elemento = document.createElement("img");
        elemento.dataset.format = "CODE128";
        elemento.dataset.value = activo.codigo;
        elemento.dataset.text = activo.nombre + " " + activo.precio.toFixed(2);
        elemento.classList.add("codigo");
        $contenedor.appendChild(elemento);
    });
    // Al final, inicializamos
    JsBarcode(".codigo").init();
</script>

@stop
