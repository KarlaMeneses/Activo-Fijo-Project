@extends('adminlte::page')

@section('title', 'Activo Fijo')

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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Reporte
            </button>
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
                            <a class="btn btn-warning btn-sm text-light rounded-pill" href="{{ route('users.show', $user->id) }}">
                                <i class="fas fa-eye"></i></a>

                            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm text-light rounded-pill">
                                <i class="fas fa-edit"></i><a>
                                    @csrf
                                    @method('delete')
                                    @can('editar users')
                                    @endcan
                                    <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit" value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
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


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Generar Reporte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('users.reporte')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="codigo">Fecha de Inicio</label>
                        <div class="col-sm-10">
                            <input type="date" name="inicio" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fin">Fecha de Fin</label>
                        <div class="col-sm-10">
                            <input type="date" name="fin" class="form-control" required>
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <label for="fin">Seleccione los Atributos para el reporte</label>
                      <br>
                      <div class="checkbox">
                            <input type="checkbox" name="nombre" value="true" > Nombre <br>
                            <input type="checkbox" name="sexo" value="true" > Sexo <br>
                            <input type="checkbox" name="edad" value="true"> Edad <br>
                            <input type="checkbox" name="cargo" value="true"> Cargo <br>
                            <input type="checkbox" name="direccion" value="true" > Dirección <br>
                            <input type="checkbox" name="telefono" value="true"> Telefono <br>
                            <input type="checkbox" name="email" value="true"> Email <br>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="fin">Seleccione el formato</label>
                      <br>
                      <div class="checkbox">
                            <select name="tipo" id="">
                                <option value="pdf">PDF</option>
                                <option value="excel">EXCEL</option>
                                <option value="html">HTML</option>
                            </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Reporte</button>
                   
            </form>

        </div>
    </div>
</div>
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
