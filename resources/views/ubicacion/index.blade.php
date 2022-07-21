@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
<div class="card-header text-center">
    <h3><b>Ubicaciones</b></h3>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('ubicaciones.create') }}" class="btn btn-primary btb-sm">
            <i class="fas fa-address-book"></i> Crear Ubicación</a>
    </div>
</div>
<div class="card">
    <div class="card-body " style="overflow-x: scroll">

        <table class="table table-striped shadow-lg mt-4" id="roles" style="width:100%">
            <thead class="bg-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Edificio</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Pais</th>
                    <th scope="col">Departamento</th>
                  
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ubis as $ubi)
                <tr>
                    <td>{{ $ubi->id }}</td>
                    <td>{{ $ubi->edificio }}</td>
                    <td>{{ $ubi->ciudad }}</td>
                    <td>{{ $ubi->pais }}</td>

                    @foreach ($depas as $depa)
                    @if ($ubi->id_departamento == $depa->id)
                    <td>{{ $depa->nombre }}</td>
                    @endif
                    @endforeach

                
                    <td>
                        <form action="{{ route('ubicaciones.destroy', $ubi->id) }}" method="post">
                            <a href="{{ route('ubicaciones.edit', $ubi->id) }}" class="btn btn-primary btn-sm text-light rounded-pill">
                                <i class="fas fa-edit"></i><a>
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit" value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                        <i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>

                    

                </tr>
                @endforeach
            </tbody>
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
