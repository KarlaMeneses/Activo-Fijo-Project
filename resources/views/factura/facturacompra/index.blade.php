@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('factura.facturacompra.create')}}" class="btn btn-primary btb-sm">Crear Factura</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="usuarios" style="width:100%">
                <thead  class="bg-dark">
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
                                        <a class="btn btn-secondary btn-sm text-light rounded-pill"
                                    href="{{ route('factura.facturacompra.reporte', $factura->id) }}">
                                    <i class="fas fa-file-alt"></i> </a>
                                    <a href="{{ route('factura.facturacompra.edit', $factura) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i> <a>
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
        $('#usuarios').DataTable();
        } );
    </script> 
@stop