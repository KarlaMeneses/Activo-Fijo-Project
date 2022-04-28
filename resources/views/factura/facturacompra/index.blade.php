@extends('adminlte::page')

@section('title', 'PROSALUD+')

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
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de usuario</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Articulo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Valor Unitario</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Forma de Pago</th>
                        <th scope="col">Referencia</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($facturas as $factura)
                        <tr>
                            @if ($factura->tipo == 'compra')
                            <td>{{$factura->id}}</td>
                            <td>{{$factura->user->name}}</td>
                            <td>{{$factura->telefono}}</td>
                            <td>{{$factura->email}}</td>
                            <td>{{$factura->direccion}}</td>
                            <td>{{$factura->ciudad}}</td>
                            <td>{{$factura->articulo}}</td>
                            <td>{{$factura->cantidad}}</td>
                            <td>{{$factura->ciudad}}</td>
                            <td>{{$factura->vendedor}}</td>
                            <td>{{$factura->vunitario}}</td>
                            <td>{{$factura->vtotal}}</td>
                            <td>{{$factura->descripcion}}</td>
                            <td>{{$factura->formapago}}</td>
                            <td>{{$factura->referencia}}</td>
                         
                            <td>
                               
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