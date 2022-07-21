@extends('adminlte::page')

@section('title', 'Activo Fijo')
@section('content_header')
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

<h1>Crear Revalorizacion</h1>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('revalorizacion.store') }}" method="post" novalidate>
            @csrf
            @section('js')
            <script src="{{ asset('js/revalorizacion.js') }}"></script>

            @endsection

            <center>
                {{-- separador --}}
                <div class="form-group col-md-3">
                    <img width="200" height="200" class="img-circle" id="foto">
                    <div class="custom-input-file">
                        <input type="file" id="file" accept="image/*" class="input-file" value="">
                        <i class="fas fa-file-upload"></i> Subir Foto...
                    </div>
                    <div class="col-12" id="app" style="text-align:center;">
                        <progress id="progress_bar" value="0" max="100"></progress>
                        <input type="hidden" value="{{ old('foto') }}" name="foto" id="fotov" title="foto" placeholder="https://example.com" list="defaultURLs" class="focus border-dark  form-control" oninvalid="this.setCustomValidity('Please match the requested format')">
                    </div>
                    @error('foto')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </center>

            <label for="tiempo_vida">tiempo_vida</label>
            <input type="text" name="tiempo_vida" class="form-control"> <br>
            @error('tiempo_vida')
            <small class="text-danger">*{{ $message }}</small>
            <br><br>
            @enderror

            <label for="valor">valor</label>
            <input type="text" name="valor" class="form-control"> <br>
            @error('valor')
            <small class="text-danger">*{{ $message }}</small>
            <br><br>
            @enderror

            <label for="valor">costo</label>
            <input type="decimal" name="monto" class="form-control"> <br>
            @error('monto')
            <small class="text-danger">*{{ $message }}</small>
            <br><br>
            @enderror

            <label for="id_activo">id_activo</label>
            <input type="text" name="id_activo" class="form-control"> <br>
            @error('id_activo')
            <small class="text-danger">*{{ $message }}</small>
            <br><br>
            @enderror

            <button class="btn btn-danger btn-sm" type="submit">Crear Departamento</button>
            <a class="btn btn-primary btn-sm" href="{{ route('revalorizacion.index') }}">Volver</a>
        </form>

    </div>
</div>
<div>
    <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">

</div>


@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/bot.css') }}">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
<script>
    console.log('Hi!');

</script>
@stop
