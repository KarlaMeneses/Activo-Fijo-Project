@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Crear Guía</h1>
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

@stop


@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ayudas.store') }}" method="post" novalidate>
                @csrf
                   <div class="form-group col-md-6">
                


                @section('js')
                <script src="{{ asset('js/notascompras.js') }}"></script>
            @endsection
            <center>
                <label>Subir imagen</label>
                <br>
                <img width="600" height="400" id="foto">
                <div class="custom-input-file">
                    <input type="file" id="file" accept="image/*" class="input-file" value="">
                    <i class="fas fa-file-upload"></i> Subir Foto...
                </div>
                <div class="col-12" id="app" style="text-align:center;">
                    <progress id="progress_bar" value="0" max="100"></progress>
                    <input type="hidden" value="{{ old('foto') }}" name="foto" id="fotov"
                        title="foto" placeholder="https://example.com" list="defaultURLs"
                        class="focus border-dark  form-control"
                        oninvalid="this.setCustomValidity('Please match the requested format')">
                </div>
                @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

           



                <label for="descripcion">Ingresar Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Escriba los pasos a seguir"> <br>
                @error('descripcion')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror
                   </div>

                <button class="btn btn-primary btb-sm text-light" type="submit">Guardar Guía</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('ayudas.index') }}">Volver</a>

            </center>
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
