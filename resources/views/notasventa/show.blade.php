@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>ver usuario</h1>
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a href="{{ route('notasventa.index') }}" class="btn btn-sm btn-success mr-3">
                                Volver </a>

                                <a href="{{ route('notasventa.edit', $nota) }}" class="btn btn-sm btn-success mr-3">
                                    Editar </a>
                        </div>
                        <!--body-->

                        <div class="container">
                            <div class="row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>adquirente: </label>
                                        <input class="form-control" value="{{ $nota->adquirente }}" disabled>
                                    </div>
                                </div>
                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Telefono: </label>
                                        <input class="form-control" value="{{ $nota->telefono }}" disabled>
                                    </div>
                                </div>
                
                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Fecha venta: </label>
                                        <input class="form-control" value="{{ $nota->fecha_venta }}" disabled>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                  <div class="form-group">
                                      <label>encargado: </label>
                                      <input class="form-control" value="  {{ $nota->encargado }}" disabled>
                                  </div>
                              </div>

                              <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label>cargo: </label>
                                    <input class="form-control" value="  {{ $nota->cargo }}" disabled>
                                </div>
                            </div>
                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Totales: </label>
                                        <input class="form-control" value="{{ $nota->totales }}" disabled>
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
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($detallenotas as $detalle)
                                                @if ($detalle->id_notas == $nota->id)
                                                    <tr>
                                                        <td>{{ $detalle->cantidad }}</td>
                                                        <td>{{ $detalle->detalle }}</td>
                                                        <td>{{ $detalle->precio_uni }}</td>
                                                        <td>{{ $detalle->total }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>

                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th scope="col">Totales</th>
                                            <th scope="col">{{ $nota->totales }}</th>
                                        </tr>

                                    </table>
                                    <h5>Comprobante - Nota de venta fisica</h5>
                                    <img src="{{ asset($nota->foto) }}" width="250" height="300" />

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