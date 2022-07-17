@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
<div class="card-header text-center">
    <h3><b>Nota De Compra</b></h3>
</div>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('css/descaga.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('js')
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<link rel="stylesheet" href="{{ asset('js/descaga.js') }}">
@stop
@section('content')
<div class="card">
    <div class="card-body table-responsive">
        @error('name')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Esta nota ya está registrada.
        </div>
        @enderror
        <form action="{{ route('notas.update', $nota) }}" method="post" novalidate>
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $nota->id }}">
            <button class="btn btn-primary btb-sm text-light" type="submit">Guardar</button>
            <button class="btn btn-warning btb-sm text-light" type="button" onclick="history.back()"></i> Volver</button>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="proveedor">Proveedor</label>
                    <input type="text" name="proveedor" class="form-control" value="{{ $nota->proveedor }}" required>

                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" value="{{ $nota->direccion }}" required>

                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" class="form-control" value="{{ $nota->telefono }}" required>

                    <label for="fecha_entrega">Fecha entrega</label>
                    <input type="date" name="fecha_entrega" class="form-control" value="{{ $nota->fecha_entrega }}" required>

                    <label for="totales">Total Bs.</label>
                    <input type="text" name="totales" class="form-control" value="{{ $nota->totales }}" disabled>
                </div>

                <div class="form-group col-md-6">

                    <!--Descagar imagen--->
                    <p style="text-align: center">Comprobante - Nota de compra fisica</p>
                    <div class="download-wrap">
                        <img src="{{ old('foto', $nota->foto) }}" width="240" height="300" required />
                        <div class="download">
                            <a target="_blanck" href="{{ old('foto', $nota->foto) }}" class="button-download">
                                Descagar
                                <span class="icon-wrap">
                                    <i class="icon-download"></i>
                                </span>
                            </a>
                            <div class="meter">
                                <span class="meter-progress"></span>
                            </div>
                        </div>
                    </div>
                    <!--<button id="reset">Reset</button>
                        Descagar imagen--->

                </div>

            </div>
        </form>

        <div class="card-body">
            <h5 style=" font-size:23px;text-align: center;color:rgb(40, 147, 253);">DETALLE DE NOTA</h5>
            <table class="table table-bordered border-dark">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Precio unitario</th>
                        <th scope="col">Total</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $suma_total = 0;
                    $switch = 0;
                    @endphp

                    @foreach ($detallenotas as $detalle)
                    @if ($detalle->id_notas == $nota->id)
                    @php
                    $switch = 1;
                    @endphp
                    <tr>
                        <td>{{ $detalle->id }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->nombre }}</td>
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

                                <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" style="margin-top: 5px" value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                    <i class="fas fa-trash-alt"></i></button>
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
                    <th></th>
                    <th class="table-dark" scope="col">Total Bs.</th>
                    <th class="table-dark" scope="col">{{ $nota->totales }}</th>
                    @if ($suma_total != $nota->totales)
                    <div class="alert alert-success" role="alert">
                        VERIFIQUE LA SUMA TOTAL
                    </div>
                    @endif
                </tr>
            </table>

        </div>

        <body>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Agregar detalles de la compra
            </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"> Agregar detalles de la compra </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>

                        <form action="{{ url('notas/detalle_update', $nota->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="cantidad" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nombre" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="detalle">Detalle:</label>
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
        </body>

    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    img.zoom {
        width: 350px;
        height: 200px;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
    }

    .transition {
        -webkit-transform: scale(1.8);
        -moz-transform: scale(1.8);
        -o-transform: scale(1.8);
        transform: scale(1.8);
    }

</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.zoom').hover(function() {
            $(this).addClass('transition');
        }, function() {
            $(this).removeClass('transition');
        });
    });

</script>
@stop
@section('css')
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
@stop
