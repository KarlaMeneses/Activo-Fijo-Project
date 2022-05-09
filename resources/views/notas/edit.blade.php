@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Editar Nota de compra</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('name')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Esta nota ya está registrada.
      </div>
         
        @enderror 
            <form action="{{route('notas.update', $nota)}}" method="post" novalidate >
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="unidad">Unidad</label>
                        <input type="text" name="unidad" class="form-control" value="{{ old('unidad') }}" required>
          
                        
                <label for="concepto">Concepto</label>
                <input type="text" name="concepto" class="form-control" value="{{ old('concepto') }}" required>

                <label for="precio_uni">Precio unitario</label>
                <input type="text" name="precio_uni" class="form-control" value="{{ old('precio_uni') }}" required>

    
                    </div>
               
                </div>

                <br>
                
                <button  class="btn btn-primary" type="submit">Actualizar Nota</button>
                <a class="btn btn-danger" href="{{route('notas.index')}}">Volver</a>
            </form>

    </div>
</div>

<script>
   
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop