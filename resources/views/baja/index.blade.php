@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>BAJAS DE ACTIVOS</b></h3>
    </div>

@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('baja.create')}}" class="btn btn-primary btb-sm">Crear Baja</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Causa de Baja</th>
                        <th scope="col">Fecha Solicitada</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha Aceptada</th>
                        <th scope="col">Acciones</th>
                
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bajas as $baja)
                        <tr>
                          
                            <td>{{$baja->id}}</td>
                            <td>{{$baja->bajaa->codigo}} | {{$baja->bajaa->detalle}}</td>
                            <td>{{$baja->causadebaja}}</td>
                            <td>{{$baja->fechasolicitada}}</td>
                            <td>{{$baja->estado}}</td>
                            <td>{{$baja->fechaaceptada}}</td>
                            <td>
                                <form action="{{ route('baja.delete', $baja->id) }}" method="post">
                                <a href="{{ route('baja.edit', $baja->id) }}"
                                    class="btn btn-primary btn-sm text-light rounded-pill">
                                    <i class="fas fa-edit"></i> </a>
                                    @csrf

                                    
                                    <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                        value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                        <i class="fas fa-trash-alt"></i></button>
                                    @can('eliminar factura')
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
        $('#usuarios').DataTable();
        } );
    </script>
@stop
