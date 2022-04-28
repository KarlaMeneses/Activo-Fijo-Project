@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Lista Categorias</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('categorias.create') }}">Registrar Categoria</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="categorias">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>

                        <th>Acciones</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoria as $categorias)
                        <tr>
                            <td>{{ $categorias->id }}</td>
                            <td>{{ $categorias->nombre }}</td>
                            <td>

                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('categorias.edit', $categorias) }}">Editar</a>


                                <form action="{{ route('categorias.destroy', $categorias) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                        onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>


                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($categoria as $categorias)
                    <div class="col">
                        <div class="card h-100">
                            <img href="img/SmarHome.jpeg" class="card-img-top" width="200" height="300" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $categorias->id }}</h5>
                                <p class="card-text">{{ $categorias->nombre }}</p>
                            </div>
                            <div class="card-footer">
                                @can('gestionar usuario')
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('categorias.edit', $categorias) }}">Editar</a>
                                @endcan

                                <form action="{{ route('categorias.destroy', $categorias) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    @can('gestionar usuario')
                                        <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                            onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>
                                    @endcan

                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#categorias').DataTable({
            autoWidth: false
        });
    </script>

@endsection
