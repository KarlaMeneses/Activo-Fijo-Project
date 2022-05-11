@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Editar Nota De Compra</b></h3>
    </div>
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
                <button class="btn btn-primary" type="submit">Actualizar Nota</button>
                <a class="btn btn-danger" href="{{ route('notas.index') }}">Volver</a>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="proveedor">Proveedor</label>
                        <input type="text" name="proveedor" class="form-control" value="{{ $nota->proveedor }}" required>

                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $nota->direccion }}" required>

                        <label for="telefono">Telefono</label>
                        <input type="tel" name="telefono" class="form-control" value="{{ $nota->telefono }}" required>

                        <label for="fecha_entrega">Fecha entrega</label>
                        <input type="date" name="fecha_entrega" class="form-control" value="{{ $nota->fecha_entrega }}"
                            required>

                        <label for="totales">Totales</label>
                        <input type="text" name="totales" class="form-control" value="{{ $nota->totales }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <h5>Comprobante - Nota de compra fisica</h5>
                  
                            <img src="{{ asset($nota->foto) }}" width="250" height="300" />
                      
                    </div>
                </div>

            </form>

            <h5>DETALLES DE NOTA</h5>
            <div class="card-body">
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
            </body>

        </div>
    </div>
@stop

@section('css')
    <style>
        <link rel="stylesheet"href="/css/admin_custom.css">img.zoom {
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
