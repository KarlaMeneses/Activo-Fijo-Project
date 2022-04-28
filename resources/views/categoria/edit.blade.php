@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Editar Datos De Categorias</h1>
@stop

@section('content')
@error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Esta categoria ya está registrada.
      </div>
         
        @enderror 
<form method="post" action="{{route('categorias.update',$categoria)}}">
    @csrf
    @method('PATCH')
     
    <h5>Nombres:</h5>
    <input type="text"  name="nombre" value="{{$categoria->nombre}}" class="focus border-primary  form-control">
    
    
    <br>
    <button type="submit"  class="btn btn-primary">Guardar</button>
    <a class="btn btn-danger" href="{{route('categorias.index')}}">Volver</a>

</form>
@stop