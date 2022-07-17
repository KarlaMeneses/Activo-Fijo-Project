@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
<div class="card-header text-center">
    <h3><b>Ver Nota De Venta</b></h3>
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

                    <!--<div class="card-header card-header-primary">
                            <a href="{{ route('notasventa.index') }}" class="btn btn-sm btn-success mr-3">
                                Volver </a>

                                <a href="{{ route('notasventa.edit', $nota) }}" class="btn btn-sm btn-success mr-3">
                                    Editar </a>
                        </div> -->
                    <!--body-->

                    <div class="container">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>adquirente: </label>
                                <input class="form-control" value="{{ $nota->adquirente }}" disabled>

                                <label>Telefono: </label>
                                <input class="form-control" value="{{ $nota->telefono }}" disabled>

                                <label>Fecha venta: </label>
                                <input class="form-control" value="{{ $nota->fecha_venta }}" disabled>


                                <label>encargado: </label>
                                <input class="form-control" value="  {{ $nota->encargado }}" disabled>

                                <label>cargo: </label>
                                <input class="form-control" value="  {{ $nota->cargo }}" disabled>

                                <label>Total Bs.: </label>
                                <input class="form-control" value="{{ $nota->totales }}" disabled>

                            </div>
                            <div class="form-group col-md-6">

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
                                <h5 style=" font-size:23px;text-align: center;color:rgb(40, 147, 253);">DETALLE DE NOTA</h5>
                                <table class="table table-bordered border-dark">
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
                                        <th class="table-dark" scope="col">Total Bs.</th>
                                        <th class="table-dark" scope="col">{{ $nota->totales }}</th>
                                    </tr>

                                </table>

                            </div>
                            <!--end third-->

                        </div>
                                        <button class="btn btn-warning btb-sm text-light" type="button" onclick="history.back()"></i> Volver</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
