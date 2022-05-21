@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Ver Factura De Venta</b></h3>
    </div>
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a href="{{ route('factura.facturaventa.index') }}" class="btn btn-sm btn-success mr-3">
                                Volver </a>

                                <a href="{{ route('factura.facturaventa.edit', $factura->id) }}" class="btn btn-sm btn-success mr-3">
                                    Editar </a>
                        </div>
                        <!--body-->

                        <div class="container">
                            <div class="row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Comprador: </label>
                                        <input class="form-control" value="{{ $factura->comprador }}" disabled>
                                    </div>
                                </div>
                
                                
                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Ciudad: </label>
                                        <input class="form-control" value="  {{ $factura->ciudad }}" disabled>
                                    </div>
                                </div>
                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Telefono: </label>
                                        <input class="form-control" value="{{ $factura->telefono }}" disabled>
                                    </div>
                                </div>
                
                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Fecha entrega: </label>
                                        <input class="form-control" value="{{ $factura->fechaemitida }}" disabled>
                                    </div>
                                </div>
                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Total Neto: </label>
                                        <input class="form-control" value="{{ $factura->totalneto }}" disabled>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>IVA 13%: </label>
                                        <input class="form-control" value="{{ $factura->iva }}" disabled>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Total: </label>
                                        <input class="form-control" value="{{ $factura->totaliva }}" disabled>
                                    </div>
                                </div>
            
                                <br>
                            </div>
                        </div>
                        
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">

                                <!--end card nota-->

                                <!--end card nota 2-->

                                <!--Start third-->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Detalle</th>
                                                <th scope="col">Precio unitario</th>
                                                <th scope="col">Descuento</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($detalles as $detalle)
                                                @if ($detalle->idfactura == $factura->id)
                                                    <tr>
                                                        <td>{{ $detalle->cantidad }}</td>
                                                        <td>{{ $detalle->articulo }}</td>
                                                        <td>{{ $detalle->valor_unitario }}</td>
                                                        <td>{{ $detalle->descuento }}</td>
                                                        <td>{{ $detalle->valor_total }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>

                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th scope="col">Total Neto</th>
                                            <th scope="col">{{ $factura->totalneto }}</th>
                                        </tr>

                                    </table>
                                    <h5>Comprobante - Factura de venta fisica</h5>
                                    <img src="{{ asset($factura->foto) }}" width="250" height="300" />

                                </div>
                                <!--end third-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
