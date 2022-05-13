@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>ver nota compra</h1>
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="card-title">Nota </div>
                            <p class="card-category"> Vista detallada de nota compra</p>
                            <a href="{{ route('notas.index') }}" class="btn btn-sm btn-success mr-3">
                                Volver </a>
                        </div>
                        <!--body-->
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
                                    <h5>Comprobante - Nota de compra fisica</h5>
                                    <img src="{{ asset($nota->foto) }}" width="350" height="500" />

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
