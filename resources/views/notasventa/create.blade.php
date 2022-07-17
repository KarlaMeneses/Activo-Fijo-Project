@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

<div class="card-header  text-center">
    <h3><b>Registrar Nota De Venta</b></h3>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        @error('name')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Este usuario ya está registrado.
        </div>
        @enderror
        @php
        $sw = 1;
        $anterior = 0;
        @endphp
        <form action="{{ route('notasventa.store') }}" method="post">
            @csrf
            {{-- <button class="btn btn-danger " type="submit">Crear Nota</button>
                <a class="btn btn-primary " href="{{ route('notasventa.index') }}">Volver</a>
            --}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="adquirente">Adquirente</label>
                    <input type="text" name="adquirente" class="form-control" min="5" max="20" maxlength="20" size="0" pattern="{5,20}" placeholder="adquirente" required>
                    @error('adquirente')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" class="form-control" size="0" maxlength="9" pattern="[0-9-+()]{6,9}" placeholder="+591XXXXXXXXX" require>
                    @error('telefono')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="fecha_venta">Fecha venta</label>
                    <input type="date" name="fecha_venta" class="form-control" required>

                    <label for="encargado">Encargado</label>
                    <input type="text" name="encargado" class="form-control" min="5" max="20" maxlength="20" size="0" pattern="{5,20}" placeholder="encargado" required>
                    @error('encargado')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <label for="cargo">Cargo</label>
                    <input type="text" name="cargo" class="form-control" min="5" max="20" maxlength="20" size="0" pattern="{5,20}" placeholder="cargo" required>
                    @error('cargo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group col-md-6">
                    <!---karla todo esto es subir imagenes --->
                    @section('js')
                    <script src="{{ asset('js/notasventas.js') }}"></script>
                    @endsection
                    <center>
                        <label>Subir foto de Comprobante - Nota de venta fisica</label>
                        <img width="300" height="400" id="foto">
                        <div class="custom-input-file">
                            <input type="file" id="file" accept="image/*" class="input-file" value="" required>
                            <i class="fas fa-file-upload"></i> Subir Foto...
                        </div>
                        <div class="col-12" id="app" style="text-align:center;">
                            <progress id="progress_bar" value="0" max="100"></progress>
                            <input type="hidden" value="{{ old('foto') }}" name="foto" id="fotov" title="foto" placeholder="https://example.com" list="defaultURLs" class="focus border-dark  form-control" required oninvalid="this.setCustomValidity('Please match the requested format')">
                        </div>
                        @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </center>
                    <!---karla todo esto es subir imagenes --->

                </div>

            </div>
            <center>
                <button class="btn btn-primary btb-sm text-light" type="submit">Crear Nota</button>
                <button class="btn btn-warning btb-sm text-light" type="button" onclick="history.back()"></i> Volver</button>

            </center>
        </form>

    </div>
</div>
<script></script>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')



<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    let checkP = document.getElementById('check_password');
    let contra = document.getElementById('passwordInput');

    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');

    function get_nota_id_last() {
        $nota_aux = DB::table('notas') -
            >
            latest('id') -
            >
            first();
        $nota_id = $nota_aux - > id;
        return $nota_id;
    }

    /*****************************/
    $(document).ready(function() {
        $('#bt_add').click(function() {
            agregar();
        });
    });

    var cont = 0;
    total = 0;
    subtotal = [];
    $("#guardar").hide();


    function limpiar() {
        $("#pcantidad").val("");
        $("#pprecio_compra").val("");
        $("#pprecio_venta").val("");
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        $("#total").html("S/. " + total);
        $("#fila" + index).remove();
        evaluar();

    }

</script>

@stop
