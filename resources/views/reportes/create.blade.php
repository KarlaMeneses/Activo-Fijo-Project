@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Reporte Mantenimiento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('mantenimiento.reporte') }}" method="post" >
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="fecha_ini">Ingrese Parametro Fecha Inicial</label>
                        <input type="date" name="inicio" class="form-control" required> 
                    </div>
                    <div class="col-md-6">
                        <label for="fecha_fin">Ingrese Parametro Fecha Final</label>
                        <input type="date" name="fin" class="form-control" required> 
                    </div>
                </div>

                

                
                <br>
                <button class="btn btn-danger btn-sm" type="submit">Descargar PDF</button>
                <a class="btn btn-primary btn-sm" href="{{ route('mantenimientos.index') }}">Volver</a>
            </form>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
       
        $(document).ready(function(){
            $('#report').on(function(){
                var repor_id = $(this).val();
                if ($.trim(repor_id) != ''){
                    $.get('atri', {repor_id: repor_id}, function(atri){
                        $('#atri').empty();
                        $('#atri').append("<option value=''>Selecciona una Carrera </option>");
                        $.each(atri, function(index, value){
                            $('#atri').append("<input type='checkbox' value='"+value+"'> <label >"+value+"</label><br>");
                        })
                    });
                }
            });
        });
    </script>
@stop