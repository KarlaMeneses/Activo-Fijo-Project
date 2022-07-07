@extends('adminlte::page')

@section('title', 'ActivoFijo')

@section('content_header')

<div class="card-header  text-center">
    <h3><b>Empresas</b></h3>
</div>

@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('empresa.create') }}" class="btn btn-primary btb-sm"><i class="fas fa-user-plus"></i> Crear
            Empresa</a>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Reporte
            </button>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Generar Reporte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('empresa.reporte')}}" method="POST">
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
                            <input type="checkbox" name="nit" value="true" > NIT <br>
                            <input type="checkbox" name="direccion" value="true"> Dirección <br>
                            <input type="checkbox" name="email" value="true"> Email <br>
                            <input type="checkbox" name="juridica" value="true" > Estado Jurídico <br>
                            <input type="checkbox" name="telefono" value="true"> Telefono <br>
                           
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Reporte</button>
                </div>
            </form>

        </div>
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
                    <th scope="col">Telefono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id }}</td>
                    <td><img src="{{ asset($empresa->foto) }}" class="img-circle" width="50" height="50" />
                    <td>{{ $empresa->nombre}} {{$empresa->juridica}}</td>
                    <td>{{ $empresa->email }}</td>
                    <td>{{ $empresa->telefono}}</td>
                    <td>
                        <form action="{{ route('empresa.delete', $empresa->id) }}" method="post">

                            <a class="btn btn-warning btn-sm text-light rounded-pill"
                                href="{{ route('empresa.show', $empresa->id) }}">
                                <i class="fas fa-eye"></i> </a>

                            <a href="{{ route('empresa.edit', $empresa) }}"
                                class="btn btn-primary btn-sm text-light rounded-pill">
                                <i class="fas fa-edit"></i> <a>
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
