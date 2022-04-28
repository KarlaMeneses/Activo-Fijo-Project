@extends('adminlte::page')

@section('title', 'SI2+')

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
                        </div>
                        <!--body-->
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <!--end card nota-->

                                <!--end card nota 2-->

                                <!--Start third-->
                                <div class="col-md-4">
                                    <div class="card card-nota">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <tbody>

                                                    <tr>
                                                        <th scope="col">unidad</th>
                                                        <td>{{ $nota->unidad }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="col">concepto</th>
                                                        <td>{{ $nota->concepto }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="col">precio_uni</th>
                                                        <td>{{ $nota->precio_uni }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="col">importe</th>
                                                        <td>{{ $nota->importe }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="col">condicion_pago</th>
                                                        <td>{{ $nota->condicion_pago }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="col">fecha_envio</th>
                                                        <td>{{ $nota->fecha_envio }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="col">fecha_entrega</th>
                                                        <td>{{ $nota->fecha_entrega }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="col">lugar_entrega</th>
                                                        <td>{{ $nota->lugar_entrega }}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ route('notas.index') }}" class="btn btn-sm btn-success mr-3">
                                                    Volver </a>
                                                <a href="{{ route('notas.edit', $nota->id) }}"
                                                    class="btn btn-sm btn-primary"> Editar </a>
                                            </div>
                                        </div>
                                    </div>
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
