@extends('adminlte::page')
@section('title', 'Activo Fijo')
@section('content_header')
    <div class="card-header  text-center">
        <h3><b>LISTA DE CATEGORIA</b></h3>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('categorias.create') }}">
                <i class="fas fa-bookmark"></i> Registrar
                Categoria</a>
        </div>
    </div>

    <div class="card">
          <!--<div class="card-body">-->
            <div class="card-body " style="overflow-x: scroll">

                <!-- <table class="table table-striped" id="usuarios" style="width:100%">-->
                <table class="table table-striped" id="categorias" style="width:100%">
                    <thead class="bg-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">CUENTA CONTABLE BIENES</th>
                            <th scope="col">DESCRIPCION</th>
                            <th scope="col">TIPO</th>
    
                            <th scope="col">VIDA UTIL</th>
                            <th scope="col">COEFICIENTE</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
    
                        @foreach ($cate as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>{{ $categoria->tipo_activo }}</td>
                                <td>{{ $categoria->vida_util }} años</td>
                                <td>{{ $categoria->coeficiente }} %</td>
                                <td>
                                    <form action="{{ route('categorias.destroy', $categoria) }}" method="post">
                                        <!--<a class="btn btn-warning btn-sm text-light" href="#">
                                            <a class="btn btn-warning btn-sm text-light rounded-pill"
                                                href="{{ route('categorias.show', $categoria->id) }}">
                                                <i class="fas fa-eye"></i></a>
        -->
                                        <a href="{{ route('categorias.edit', $categoria) }}"
                                            class="btn btn-primary btn-sm text-light rounded-pill">
                                            <i class="fas fa-edit"></i><a>
                                                @csrf
                                                @method('delete')
                                                @can('editar categoria')
                                                @endcan
                                                <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                    value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                    <i class="fas fa-trash-alt"></i></button>
                                                @can('eliminar categoria')
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
            $('#categorias').DataTable();
        });
    </script>
@stop
