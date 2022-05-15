@extends('adminlte::page')

@section('title', 'Activo Fijo')


@section('content_header')
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

    <div class="card-header  text-center">
        <h3><b>Registrar Nota De Compra</b></h3>
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
            <form action="{{ route('notas.store') }}" method="post">
                @csrf

                <button class="btn btn-danger " type="submit">Crear Nota</button>
                <a class="btn btn-primary " href="{{ route('notas.index') }}">Volver</a>

                <div class="form-row">
                    <div class="form-group col-md-6">

                        <label for="proveedor">Proveedor</label>
                        <input type="text" name="proveedor" class="form-control" required>

                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control" required>

                        <label for="telefono">Telefono</label>
                        <input type="tel" name="telefono" class="form-control" required>

                        <label for="fecha_entrega">Fecha compra</label>
                        <input type="date" name="fecha_entrega" class="form-control" required>

                        <label for="totales">Totales</label>
                        <input type="text" name="totales" class="form-control" required>

                    </div>
                    <div class="form-group col-md-6">
                        <!---karla todo esto es subir imagenes --->
                    @section('js')
                        <script src="{{ asset('js/notascompras.js') }}"></script>
                    @endsection
                    <center>
                        <label>Subir foto de Comprobante - Nota de compra fisica</label>
                        <img width="300" height="400" id="foto">
                        <div class="custom-input-file">
                            <input type="file" id="file" accept="image/*" class="input-file" value="" required>
                            <i class="fas fa-file-upload"></i> Subir Foto...
                        </div>
                        <div class="col-12" id="app" style="text-align:center;">
                            <progress id="progress_bar" value="0" max="100"></progress>
                            <input type="hidden" value="" name="foto" id="fotov" title="foto"
                                placeholder="https://example.com" list="defaultURLs"
                                class="focus border-dark  form-control" required
                                oninvalid="this.setCustomValidity('Please match the requested format')">
                        </div>
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </center>
                    <!---karla todo esto es subir imagenes --->

                </div>
                <?php
                $nota_aux = DB::table('notas')
                    ->latest('id')
                    ->first();
                $nota_id = $nota_aux->id;
                ?>


            </div>
            <h5>DETALLE DE LA COMPRA</h5>

            <div class="form-group col-md-6">
                <label for="activar-contraseña">Nueva contraseña</label>

                <input type="checkbox" name="activar-contraseña" id="check_password" onclick="get_nota_id_last()">
                <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                    id="passwordInput" placeholder="Escriba la nueva contraseña">
            </div>

            <a id="option1" data-id="10" data-option="21" href="#" onclick="goDoSomething(?,?);">
                Click to do something
            </a>

            {{-- <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>

                            <th scope="col">Cantidad</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Precio unitario</th>
                            <th scope="col">Total</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $suma_total = 0;
                        @endphp
                        @foreach ($detallenotas as $detalle)
                            @if ($detalle->id_notas == $nota->id)
                                <tr>
                                    <td>{{ $detalle->id }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>{{ $detalle->detalle }}</td>
                                    <td>{{ $detalle->precio_uni }}</td>
                                    <td>{{ $detalle->total }}</td>
                                    @php
                                        $suma_total = $suma_total + $detalle->total;
                                    @endphp
                                    <td>
                                        <form action="{{ url('notas/detalle_destroy', $detalle->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <input type="hidden" name="id_nota" value="{{ $nota->id }}">
                                            <input type="hidden" name="nota_totales" value="{{ $nota->totales }}">

                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" style="margin-top: 5px"
                                                value="Borrar">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th scope="col">Totales</th>
                        <th scope="col">{{ $nota->totales }}</th>
                        @if ($suma_total != $nota->totales)
                            <h1>VERIFIQUE LA SUMA TOTAL</h1>
                        @endif
                    </tr>
                </table>

            </div>

            <body>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Agregar detalles de la compra
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"> Agregar activo </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>

                            <form action="{{ url('notas/detalle_update', $nota->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cantidad" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="detalle">Detalle</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="detalle" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="precio_uni">Precio unitario</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="precio_uni" class="form-control" required>
                                        </div>
                                    </div>

                                    <input type="hidden" name="nota_totales" value="{{ $nota->totales }}">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Agregar detalle</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </body> --}}
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
