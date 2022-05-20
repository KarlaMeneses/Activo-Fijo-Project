@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Factura De Compra</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta factura ya está registrada.
                </div>
            @enderror
            <form action="{{ route('factura.facturacompra.update', $factura->id ) }}" method="post" novalidate>
               
               
                @csrf
                @method('put')
                <button class="btn btn-primary" type="submit">Actualizar Factura</button>
                <a class="btn btn-danger" href="{{ route('factura.facturacompra.index') }}">Volver</a>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="proveedor">Proveedor</label>
                        <input type="text" name="proveedor" class="form-control" value="{{ $factura->vendedor }}" required>

                        <label for="comprador">Responsable de la compra</label>
                        <select name="idcomprador" id="select-room" class="form-control" onchange="habilitar()" >
                            <option value="{{$factura->idcomprador}}">{{$factura->compradoru->name}}</option>
    
                            @foreach ($users as $user)
    
                                <option value="{{$user->id}}">
    
                                   <spam>{{$user->name}}</spam>
    
                                </option>
    
                            @endforeach
                        </select>
                        
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $factura->direccion }}" required>

                        <label for="telefono">Telefono</label>
                        <input type="tel" name="telefono" class="form-control" value="{{ $factura->telefono }}" required>

                        <label for="fechaemitida">Fecha de Emisión</label>
                        <input type="date" name="fechaemitida" class="form-control" value="{{ $factura->fechaemitida }}"
                            required>

                            <label for="formapago">Fecha entrega</label>
                            <input type="text" name="formapago" class="form-control" value="{{ $factura->formapago }}"
                                required>

                        <label for="totales">Total Neto</label>
                        <input type="text" name="totales" class="form-control" value="{{ $factura->totalneto }}" required>

                        <label for="totales">IVA 13%</label>
                        <input type="text" name="totales" class="form-control" value="{{ $factura->iva }}" required>

                        <label for="totales">Total a Pagar</label>
                        <input type="text" name="totales" class="form-control" value="{{ $factura->totaliva }}" required> 

                    </div>
                    <div class="form-group col-md-6">
                        <h5>Comprobante - Factura de compra fisica</h5>
                  
                            <img src="{{ asset($factura->foto) }}" width="250" height="300" />
                      
                    </div>
                </div>

            </form>

            <h5>DETALLES DE FACTURA</h5>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Precio unitario</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Precio Total</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $suma_total = 0;
                        @endphp
                        @foreach ($detalles as $detalle)
                            @if ($detalle->idfactura == $factura->id)
                                <tr>
                                    <td>{{ $detalle->codigo }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>{{ $detalle->articulo }}</td>
                                    <td>{{ $detalle->valor_unitario }}</td>
                                    <td>{{ $detalle->descuento }}</td>
                                    <td>{{ $detalle->valor_total }}</td>
                                    @php
                                        $suma_total = $suma_total + $detalle->valor_total;
                                    @endphp
                                    <td>
                                    
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
                        <th scope="col">Total Neto</th>
                        <th scope="col">{{ $factura->totalneto }}</th>
                        @if ($suma_total != $factura->totalneto)
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

                            <form action="{{ route('detallefactura.store' ) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="codigo" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cantidad" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="detalle">Detalle</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="articulo" class="form-control" required>
                                        </div>
                                    </div>
                                 <input type="hidden" name="idfactura" value="{{ $factura->id }}">
                                    <div class="form-group">
                                        <label for="precio_uni">Precio unitario</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="valor_unitario" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descuento">Descuento%</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="descuento" class="form-control" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="totalneto" value="{{ $factura->totalneto }}">

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
