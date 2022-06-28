@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <center>
                        <h2 class="font-weight-bold px-2">Información de la guía </h2>
                    </center>
                </div>
            </div>

            <center>
            <div>
           
                    <img src="{{ asset($ayud->foto) }}" width="600" height="400"  />
                    <br>
               
            </div>
          
                    <div class="form-group col-md-6">
                        <label for="descripcion">Descripción </label> 
                        <br> 
                        <label name="descripcion"  >{{ $ayud->descripcion }}</label>
                    </div>
                </center>
            <br>
            <center>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('ayudas.index') }}">Volver</a>
                <a href="" class="btn btn-primary btb-sm text-light">
                    Editar </a>
            </center>


       
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
            $('#categoria').DataTable();
        });
    </script>
@stop
