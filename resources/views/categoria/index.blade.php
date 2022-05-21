@extends('adminlte::page')
@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>Lista Categorias</b></h3>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
       
        <div class="card-body " style="overflow-x: scroll">
           
            <table class="table table-striped table-bordered shadow-lg mt-4 " id="usuarios" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Cuenta contable Bienes</th>
                        <th>Descripcion</th>
                        <th>Cacateristica</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                   
                    @foreach ($cates as $cate)
                        <tr>
                            <td>{{ $cate->id }}</td>
                            

                            @foreach ($depres as $depre)
                                @if ($cate->id_depreciacion == $depre->id)
                                    <td>{{ $depre->nombre }}</td>
                                    <td>{{ $depre->descripcion }}</td>
                                    <td>{{ $depre->cacateristica }}</td>
                                    <td>{{ $depre->tipo_activo }}</td>
                                @endif
                            @endforeach
                            <td>
                                <form action="{{ route('categorias.destroy', $cate) }}" method="post">
                                    
                                    <a class="btn btn-warning btn-sm text-light rounded-pill"
                                        href="{{ route('categorias.show', $cate->id) }}">
                                        <i class="fas fa-eye"></i></a>

                                    <a href="{{ route('categorias.edit', $cate) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i><a>
                                            @csrf
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                <i class="fas fa-trash-alt"></i></button>

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
        $('#categorias').DataTable({
            autoWidth: false
        });
    </script>

@endsection
