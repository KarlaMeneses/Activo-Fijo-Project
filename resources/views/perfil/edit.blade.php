@extends('adminlte::page')

@section('title', 'ActivoFijo')
@section('content_header')
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<div class="card-header  text-center">
    <h1><b>Perfil de Empleado</b></h1>
</div>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">

        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold px-2">Información Personal</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('user.update', $user) }}" novalidate>
                    @csrf
                    @method('PATCH')

                    <center>
                        <div class="form-group col-md-6">
                            <br>
                            @section('js')
                            <script src="{{ asset('js/usuario.js') }}"></script>
                            @endsection
                            {{-- separador --}}
                            <img width="200" height="200" class="img-circle" src="{{ old('foto', $user->foto) }}">

                            <div class="custom-input-file">
                                <input type="file" id="file" accept="image/*" class="input-file" value="">
                                <i class="fas fa-file-upload"></i> Subir Foto...
                            </div>
                            <!--<input  type="url" value="" name="foto" id="foto" title="foto" placeholder="https://example.com" pattern="https?://.*" list="defaultURLs" class="focus border-primary  form-control" required oninvalid="this.setCustomValidity('Please match the requested format')" >-->
                            @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <progress id="progress_bar" value="0" max="100"></progress>

                            <input type="hidden" value="{{ old('foto', $user->foto) }}" name="foto" id="fotov" title="foto" placeholder="https://example.com" list="defaultURLs" class="focus border-dark form-control" required oninvalid="this.setCustomValidity('Please match the requested format')">

                            <img height=0 width=0 id="foto" src="">
                            @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </center>




                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                        <div class="col-md-6">
                            <select name="sexo" id="select-roles" class="form-control" onchange="habilitar()">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                            @error('sexo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <h5>Identificación como Empleado</h5>
                    <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                        <div class="col-md-6">
                            <input type="number" name="telefono" class="form-control" value="{{ $user->telefono }}" required>

                            @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>

                        <div class="col-md-6">
                            <input type="text" name="direccion" class="form-control" value="{{ $user->direccion }}" required>

                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


            </div>

            <h5>Acceso al Sistema</h5>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar
                    Contraseña</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <center>
                        <button class="btn btn-primary btb-sm text-light" type="submit">Guardar</button>
                        <button class="btn btn-warning btb-sm text-light" type="button" onclick="history.back()"></i> Volver</button>
                    </center>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
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
        $('#clientes').DataTable();
    });

</script>
@stop
