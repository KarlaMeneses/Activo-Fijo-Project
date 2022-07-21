@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>RESPONSABLE</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <a href="#" class="btn btn-primary btb-sm">
                <i class="fas fa-address-book"></i> Crear Responsable</a>
        </div> --}}
    </div>
    <div class="card">
        <div class="card-body " style="overflow-x: scroll">

            <table class="table table-striped shadow-lg mt-4" id="roles" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">RESPONSABLE</th>
                        <th scope="col">COD-ACTIVO</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">FECHA ASIGNADO</th>
                        <th scope="col">FOTO</th>
                        {{-- <th scope="col">ACCIÓN</th> --}}

                    </tr>
                </thead>

                <tbody>
                    @foreach ($res as $respo)
                        <tr>
                            <td>{{ $respo->id }}</td>
                            <td>{{ $respo->responsable }}</td>
                            <td>{{ $respo->codigo }}</td>
                            <td>{{ $respo->nombre }}</td>
                            <td>{{ $respo->fecha_res }}</td>
                            <td><img src="{{ asset($respo->foto) }}" class="img" width="75" height="75" />

                                {{-- <td>
                        <form action="" method="post">
                            <a href="" class="btn btn-primary btn-sm text-light rounded-pill">
                                <i class="fas fa-edit"></i><a>
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit" value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                        <i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td> --}}





                        </tr>
                    @endforeach
                </tbody>

                {{-- <tbody>
                @foreach ($resp as $respo)
                <tr>
                    <td>{{ $respo->id }}</td>
                    <td>{{ $respo->codigo }}</td>
                    <td>{{ $respo->empleado }}</td>
                    <td>{{ $respo->cargo }}</td>
                    <td>{{ $respo->estado }}</td>
                    <td>{{ $respo->fecha }}</td>




                    <td>
                        <form action="" method="post">
                            <a href="" class="btn btn-primary btn-sm text-light rounded-pill">
                                <i class="fas fa-edit"></i><a>
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit" value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                        <i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>





                </tr>
                @endforeach
            </tbody> --}}
            </table>
        </div>
        <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#roles').DataTable();
        });
    </script>
@stop
