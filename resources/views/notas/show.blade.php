@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Ver Nota De Compra</b></h3>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/descaga.css') }}">
@stop

@section('js')
    <link rel="stylesheet" href="{{ asset('js/descaga.js') }}">
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!--
                        <div class="card-header card-header-primary">
                            <a href="{{ route('notas.index') }}" class="btn btn-sm btn-success mr-3">
                                Volver </a>

                                <a href="{{ route('notas.edit', $nota) }}" class="btn btn-sm btn-success mr-3">
                                    Editar </a>
                        </div>
                    -->
                        <!--body-->

                        <div class="container">
                            <div class="row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Proveedor: </label>
                                        <input class="form-control" value="{{ $nota->proveedor }}" disabled>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Direccion: </label>
                                        <input class="form-control" value="  {{ $nota->direccion }}" disabled>
                                    </div>
                                </div>


                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label>Telefono: </label>
                                        <input class="form-control" value="{{ $nota->telefono }}" disabled>
                                    </div>
                                </div>


                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label>Fecha entrega: </label>
                                        <input class="form-control" value="{{ $nota->fecha_entrega }}" disabled>
                                    </div>
                                </div>

                                <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
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
                                        <thead class="table-dark">
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
                                <center>
                                     <h5>Comprobante - Nota de compra fisica</h5>
                                    <img src="{{ asset($nota->foto) }}" width="250" height="300" />

                                        <!--Descagar imagen--->
                                    <div class="download-wrap">
                                        <div class="download">
                                        <a target="_blanck" href="{{($nota->foto) }}" class="button-download">
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
                                </center>

                                </div>
                                <!--end third-->
                            </div>
            <center>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('notas.index') }}">Volver</a>
                <a href="{{ route('notas.edit', $nota->id) }}" class="btn btn-primary btb-sm text-light">
                    Editar </a>
            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
@stop
