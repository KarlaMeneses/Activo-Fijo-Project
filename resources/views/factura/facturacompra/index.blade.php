@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>Factura Compra</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('factura.facturacompra.create')}}" class="btn btn-primary btb-sm">Crear Factura</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body " style="overflow-x: scroll">
            <table class="table table-striped table-bordered shadow-lg mt-4 " id="facturas" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Forma de Pago</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Acciones</th>
                        <th scope="col">Reportes</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($facturas as $factura)
                        <tr>
                            @if ($factura->tipo == 'compra')
                            <td>{{$factura->id}}</td>
                            <td>{{$factura->compradoru->name}}</td>
                            <td>{{$factura->vendedor}}</td>
                            <td>{{$factura->telefono}}</td>
                            <td>{{$factura->email}}</td>
                            <td>{{$factura->direccion}}</td>
                            <td>{{$factura->ciudad}}</td>
                            <td>{{$factura->formapago}}</td>
                            <td>{{$factura->referencia}}</td>

                            <td>
                                <form action="{{ route('factura.facturacompra.delete', $factura->id) }}" method="post">

                                    <a class="btn btn-warning btn-sm text-light rounded-pill"
                                        href="{{ route('factura.facturacompra.show', $factura->id) }}">
                                        <i class="fas fa-eye"></i> </a>


                                    <a href="{{ route('factura.facturacompra.edit', $factura) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i> </a>
                                            @csrf

                                            @can('editar factura')
                                            @endcan
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                <i class="fas fa-trash-alt"></i></button>
                                            @can('eliminar factura')
                                            @endcan
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm text-light rounded-pill"
                                href="{{ route('factura.facturacompra.reportehmtl', $factura->id) }}">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-html" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-9.736 7.35v3.999h-.791v-1.714H1.79v1.714H1V11.85h.791v1.626h1.682V11.85h.79Zm2.251.662v3.337h-.794v-3.337H4.588v-.662h3.064v.662H6.515Zm2.176 3.337v-2.66h.038l.952 2.159h.516l.946-2.16h.038v2.661h.715V11.85h-.8l-1.14 2.596H9.93L8.79 11.85h-.805v3.999h.706Zm4.71-.674h1.696v.674H12.61V11.85h.79v3.325Z"/>
                                  </svg> </a>
                                  <a class="btn btn-warning btn-sm text-light rounded-pill"
                                  href="{{ route('factura.facturacompra.reporte', $factura->id) }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                  </svg>
                                </a>
                            </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#facturas').DataTable();
        });
    </script>
@stop
