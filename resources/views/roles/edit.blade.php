@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <form action="{{route('roles.update', $role)}}" method="post" novalidate >
                @csrf
                @method('put')
                <label for="name">Ingrese el nombre del Rol</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $role->name)}}" placeholder="Nombre para el nuevo rol"><br>
                @error('name')                    
                <small class="text-danger">*{{$message}}</small>
                <br><br>                                            
                @enderror                                                
                

                <label for="permisos">Asignación de permisos</label><br>

                <div class="form-check">
                    <div class="form row">
                            @foreach ($permisos as $permiso)
                            <div class="form-group col-md-3">
                                @if (in_array($permiso->name, $perA))
                                    <input type="checkbox" value="{{$permiso->id}}" name="permisos[]" 
                                        class="form-check-input" checked> {{$permiso->name}} <br>
                                @else
                                    <input type="checkbox" value="{{$permiso->id}}" name="permisos[]"       
                                        class="form-check-input"> {{$permiso->name}} <br>
                                @endif
                            </div>
                            @endforeach
                    </div>
                </div> <br> 

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar Rol</button>
                <a class="btn btn-primary btn-sm" href="{{route('roles.index')}}">Volver</a>
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