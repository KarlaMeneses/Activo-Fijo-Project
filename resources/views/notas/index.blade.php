@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Nota de compra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('notas.create')}}" class="btn btn-primary btb-sm">Crear nota de compra</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="notas" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">unidad</th>
                        <th scope="col">concepto</th>
                        <th scope="col">precio_uni</th>
                        <th scope="col">importe</th>
                        <th scope="col">condicion_pago</th>
                        <th scope="col">fecha_envio</th>
                        <th scope="col">fecha_entrega</th>
                        <th scope="col">lugar_entrega</th>

                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($notas as $nota)
                        <tr>
                            <td>{{$nota->unidad}}</td>
                            <td>{{$nota->concepto}}</td>
                            <td>{{$nota->precio_uni}}</td>
                            <td>{{$nota->importe}}</td>
                            <td>{{$nota->condicion_pago}}</td>
                            <td>{{$nota->fecha_envio}}</td>
                            <td>{{$nota->fecha_entrega}}</td>
                            <td>{{$nota->lugar_entrega}}</td>
                            <td>
                                <form action="{{route('notas.destroy', $nota)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('notas.edit', $nota)}}" class="btn btn-primary btn-sm">Editar<a>
                                    <a href="{{route('notas.show', $nota->id)}}" class="btn btn-success btn-sm">Ver<a>

                                    

                                        @can('editar nota')
                                    @endcan
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button> 
                                    @can('eliminar nota')
                                    @endcan
                                </form>
                            </td>
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
        $('#notas').DataTable();
        } );
    </script> 
@stop