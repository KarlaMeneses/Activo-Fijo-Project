@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <h1>Editar Guía</h1>
@stop


@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ayudas.update', $ayud->id) }}" method="post" novalidate>
                @csrf
                @method('put')

                <center>
                    <div class="form-group col-md-3">
                        <label for="foto">Ingrese una foto</label>
                        @section('js')
                        <script src="{{ asset('js/ayuda.js') }}"></script>
                        @endsection
    
                        <!--<h5>Foto:</h5>-->
                        <div class="col-12" id="app" style="text-align:center;">
                            <img width="500" height="350"  src="{{ old('foto', $ayud->foto) }}" onerror="this.style.display='none'">
                            <progress id="progress_bar" value="0" max="100"></progress>
                        </div>
                        @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
    
                        <input type="hidden" value="{{ old('foto', $ayud->foto) }}" name="foto" id="fotov" title="foto" placeholder="https://example.com" list="defaultURLs" class="focus border-dark  form-control" required oninvalid="this.setCustomValidity('Please match the requested format')">
    
                        <div class="custom-input-file">
                            <input type="file" id="file" accept="image/*" class="input-file" value="">
                            <i class="fas fa-file-upload"></i> Subir Foto...
                        </div>
    
                        <!--Nueva Foto-->
                        <div class="col-12" id="app" style="text-align:center;">
                            <img width="0" height="0"  id="foto" src="">
                            @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </center>

                <label for="descripcion">Ingresar Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{ $ayud->descripcion }}" placeholder="Escriba los pasos a seguir"> <br>
                @error('descripcion')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror


                <button class="btn btn-primary btb-sm text-light" type="submit">Actualizar Guía</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('ayudas.index') }}">Volver</a>

            </form>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
