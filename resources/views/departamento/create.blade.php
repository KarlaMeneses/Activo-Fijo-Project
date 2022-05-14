@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Crear Departamento</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <form action="{{route('departamentos.store')}}" method="post" novalidate >
                @csrf
                <label for="nombre">Ingrese el nombre del Departamento</label>
                <input type="text" name="nombre" class="form-control"> <br>
                @error('nombre')                    
                <small class="text-danger">*{{$message}}</small>
                <br><br>                                            
                @enderror                                                
                
                <label for="descripcion">Ingresar Descripción</label>
                <input type="text" name="descripcion" class="form-control"> <br>
                @error('descripcion')                    
                <small class="text-danger">*{{$message}}</small>
                <br><br>                                            
                @enderror        

                <button  class="btn btn-danger btn-sm" type="submit">Crear Departamento</button>
                <a class="btn btn-primary btn-sm" href="{{route('departamentos.index')}}">Volver</a>
            </form> 
            
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop