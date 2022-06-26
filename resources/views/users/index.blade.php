@extends('adminlte::page')

@section('title', 'ActivoFijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>Usuarios</b></h3>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.create') }}" class="btn btn-primary btb-sm"><i class="fas fa-user-plus"></i> Crear
                Usuario</a>
        </div>
    </div>

    <div class="card">
        <!--<div class="card-body">-->
        <div class="card-body " style="overflow-x: scroll">

            <!-- <table class="table table-striped" id="usuarios" style="width:100%">-->
            <table class="table table-striped table-bordered shadow-lg mt-4 " id="usuarios" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img src="{{ asset($user->foto) }}" class="img-circle" width="50" height="50" />
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNames()[0] }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user) }}" method="post">
                                    <!--<a class="btn btn-warning btn-sm text-light" href="#">-->
                                    <a class="btn btn-warning btn-sm text-light rounded-pill"
                                        href="{{ route('users.show', $user->id) }}">
                                        <i class="fas fa-eye"></i></a>

                                    <a href="{{ route('users.edit', $user) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i><a>
                                            @csrf
                                            @method('delete')
                                            @can('editar users')
                                            @endcan
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                <i class="fas fa-trash-alt"></i></button>
                                            @can('eliminar users')
                                            @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">

    </df-messenger>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable();
        });
    </script>
@stop
