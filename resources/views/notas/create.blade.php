@extends('adminlte::page')

@section('title', 'Activo Fijo')


@section('content_header')
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

    <div class="card-header  text-center">
        <h3><b>Registrar nota de compra</b></h3>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Este usuario ya está registrado.
                </div>
            @enderror
            <form action="{{ route('notas.store') }}" method="post">
                @csrf


                <label for="proveedor">proveedor</label>
                <input type="text" name="proveedor" class="form-control" required>

                <label for="direccion">direccion</label>
                <input type="text" name="direccion" class="form-control" required>

                <label for="telefono">telefono</label>
                <input type="tel" name="telefono" class="form-control" required>

                <label for="fecha_entrega">fecha_entrega</label>
                <input type="date" name="fecha_entrega" class="form-control" required>

                <label for="totales">totales</label>
                <input type="text" name="totales" class="form-control" required>

                <!---karla todo esto es subir imagenes --->
            @section('js')
                <script src="{{ asset('js/notascompras.js') }}"></script>
            @endsection
            <center>

                {{-- separador --}}
                <div class="form-group col-md-3">
                    <label for="totales">Subir foto de Comprobante - Nota de compra fisica</label>

                    <img width="300" height="400" id="foto">
                    <div class="custom-input-file">
                        <input type="file" id="file" accept="image/*" class="input-file" value="" required>
                        <i class="fas fa-file-upload"></i> Subir Foto...
                    </div>
                    <div class="col-12" id="app" style="text-align:center;">
                        <progress id="progress_bar" value="0" max="100"></progress>
                        <input type="hidden" value="" name="foto" id="fotov" title="foto"
                            placeholder="https://example.com" list="defaultURLs" class="focus border-dark  form-control"
                            required oninvalid="this.setCustomValidity('Please match the requested format')">
                    </div>
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </center>
            <!---karla todo esto es subir imagenes --->

            <h5>DETALLE DE LA COMPRA</h5>
            <button class="btn btn-danger btn-sm" type="submit">Crear Nota</button>
            <a class="btn btn-primary btn-sm" href="{{ route('notas.index') }}">Volver</a>
        </form>
    </div>
</div>
<script></script>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
