@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')

<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<div class="card-header  text-center">

    <h3><b>Editar Datos De Revalorizacion</b></h3>
</div>
@stop


@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop


@section('content')
<div class="card">
    <div class="card-body">
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Esta Revalorizacion ya está registrada.
        </div>
        @enderror


        <form method="post" action="{{ route('revalorizacion.update', $revalorizacion->id) }}" novalidate>
            @csrf
            @method('PUT')


            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-row">
                            <div class="card-header form-group col-md-12">
                                <h5 class="font-weight-bold px-2">DATOS DEL ACTIVO FIJO</h5>
                            </div>
                            @foreach ($activosfijo as $activo)
                            @if ($activo->id == $revalorizacion->id_activo)
                            <div class="form-group col-md-6">
                                <label for="codigo">CODIGO DE ACTIVO</label>
                                <input type="text" name="codigo" class="form-control" value="{{ $activo->codigo }}" disabled>

                            </div>

                            <div class="form-group col-md-6">
                                <label for="detalle">NOMBRE DEL ACTIVO</label>
                                <input type="text" name="detalle" class="form-control" value="{{ $activo->nombre }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fecha_ingreso">FECHA DE INGRESO DEL ACTIVO</label>
                                <input name="fecha_ingreso" type="date" class="form-control" value="{{ $activo->fecha_ingreso }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="costo">COSTO ACTIVO</label>
                                <input name="costo" type="text" class="form-control" value="{{ $activo->costo }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="v_actual">VALOR ACTUAL</label>
                                <input name="v_actual" type="text" class="form-control" value="{{ $activo->v_actual }}" disabled>
                            </div>


                            <div class="col-md-3">
                                <label for="estado">ESTADO</label>
                                <input type="tel" name="estado" class="form-control" value="{{ $activo->estado }}" disabled>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-row">
                            <div class="card-header form-group col-md-12">
                                <h5 class="font-weight-bold px-2">DATOS DE REVALORIZACION</h5>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="valor">VALOR REVALUADO</label>
                                <input type="text" name="valor" class="form-control" value="{{ $revalorizacion->valor }}" id="valor">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tiempo_vida">VIDA UTIL REVALUADO</label>
                                <input type="text" name="tiempo_vida" class="form-control" value="{{ $revalorizacion->tiempo_vida }}" id="tiempo_vida">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="estado">ESTADO</label>
                                <select name="estado" class="form-control" disabled>
                                    @if ($revalorizacion->estado == 'Aprobado')
                                    <option selected value> {{ $revalorizacion->estado }}</option>
                                    <option value="En espera">En espera</option>
                                    <option value="En proceso">En proceso</option>
                                    @else
                                    @if ($revalorizacion->estado == 'En espera')
                                    <option selected value> {{ $revalorizacion->estado }}</option>
                                    <option value="Aprobado">Aprobado</option>
                                    <option value="En proceso">En proceso</option>
                                    @else
                                    <option selected value> {{ $revalorizacion->estado }}</option>
                                    <option value="Aprobado">Aprobado</option>
                                    <option value="En espera">En espera</option>
                                    @endif
                                    @endif

                                </select>
                            </div>


                            <div class="form-group col-md-4">
                                <label for="estado">FECHA SOLICITUD</label>
                                <input type="text" name="estado" class="form-control" value="{{ $revalorizacion->created_at }}" id="descripcion" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="costo_revaluo">COSTO DE LA REVALUACION</label>
                                <input type="text" name="costo_revaluo" class="form-control" value="{{ $revalorizacion->costo_revaluo }}" id="costo_revaluo">
                            </div>
                        </div>
                    </div>
                    <!-- <h3>BOTON PARA EDITAR IMAGEN DEL INFORME TECNICO </h3>-->
                    <center>
                        <div class="form-group col-md-3">
                            <label for="foto">Ingrese una foto</label>
                            @section('js')
                            <script src="{{ asset('js/recalorizacion.js') }}"></script>
                            @endsection

                            <!--<h5>Foto:</h5>-->
                            <div class="col-12" id="app" style="text-align:center;">
                                <img width="200" height="200" class="img-circle" src="{{ old('foto', $revalorizacion->foto) }}" onerror="this.style.display='none'">
                                <progress id="progress_bar" value="0" max="100"></progress>
                            </div>
                            @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="hidden" value="{{ old('foto', $revalorizacion->foto) }}" name="foto" id="fotov" title="foto" placeholder="https://example.com" list="defaultURLs" class="focus border-dark  form-control" required oninvalid="this.setCustomValidity('Please match the requested format')">

                            <div class="custom-input-file">
                                <input type="file" id="file" accept="image/*" class="input-file" value="">
                                <i class="fas fa-file-upload"></i> Subir Foto...
                            </div>

                            <!--Nueva Foto-->
                            <div class="col-12" id="app" style="text-align:center;">
                                <img width="0" height="0" class="img-circle" id="foto" src="">
                                @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </center>

                </div>
            </div>
            <br>

            <center>
                {{-- el admi solo puede aprobar o rechazar
                        <button class="btn btn-primary btb-sm text-light" type="submit">Rechazar</button>
                        <button class="btn btn-primary btb-sm text-light" type="submit">Aprobar</button> --}}
                <button class="btn btn-primary btb-sm text-light" type="submit">Guardar</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('revalorizacion.index') }}">Volver</a>
            </center>

        </form>
    </div>
</div>
</div>
<div>
    <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">

</div>
</div>

@stop
@section('css')
<link rel="stylesheet" href="{{ asset('css/bot.css') }}">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
