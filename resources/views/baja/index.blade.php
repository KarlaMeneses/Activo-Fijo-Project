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
                        <th scope="col">Reportes</th>
                
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
                           
                            <td>
                              
                                  <a class="btn btn-warning btn-sm text-light rounded-pill"
                                  href="{{ route('baja.reporte', $baja->id) }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                  </svg>
                                </a>
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
