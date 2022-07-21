@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
@stop


@section('content')

    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <center>
                        <h2 class="font-weight-bold px-2">Información de Activo fijo</h2>
                    </center>
                </div>
            </div>

            <div class="card">
                <div class="card-body" style="background-color: #E6E6E6;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <center>
                                <img src="{{ asset($activofijo->foto) }}" width="350" height="300" />
                            </center>
                        </div>
                        <div class="form-group col-md-6">
                            <center>
                                <label for="name">Vista detallada de {{ $activofijo->detalle }} </label>
                                <div id="qrcode">
                                    <a href="{{ $activofijo->id }}">descagar</a>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body" style="background-color: #00AA9E;">
                        <div class="row">
                            <div class="form-row">
                                <div class="card-header form-group col-md-12">
                                    <h5 class="font-weight-bold px-2">DATOS DEL ACTIVO</h5>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="codigo">Codigo De Activo</label>
                                    <input type="text" name="codigo" class="form-control"
                                        value="{{ $activofijo->codigo }}" disabled>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="detalle">Nombre Del Activo</label>
                                    <input type="text" name="detalle" class="form-control"
                                        value="{{ $activofijo->nombre }}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="detalle">Descripcion Del Activo</label>
                                    <input type="text" name="detalle" class="form-control"
                                        value="{{ $activofijo->detalle }}" disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="fecha_ingreso">Fecha Ingreso</label>
                                    <input name="fecha_ingreso" type="tel" class="form-control"
                                        value="{{ $activofijo->fecha_ingreso }}" disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="costo">Costo Activo</label>
                                    <input name="costo" type="tel" class="form-control"
                                        value="{{ $activofijo->costo }}" disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="estado">Estado</label>
                                    <input type="tel" name="estado" class="form-control"
                                        value="{{ $activofijo->estado }}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="detalle">Proveedor Del Activo</label>
                                    <input type="text" name="detalle" class="form-control"
                                        value="{{ $activofijo->proveedor }}" disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="v_actual">Valor Actual</label>
                                    <input type="text" name="v_actual" class="form-control"
                                        value="{{ $activofijo->v_actual }} Bs" disabled>
                                </div>

                                <div class="col-md-4">
                                    <label for="responsable">Responsable</label>
                                    @if ($activofijo->responsable != null)
                                        <input type="text" name="responsable" class="form-control"
                                            value="{{ $activofijo->responsable }}" disabled>
                                    @else
                                        <input type="text" name="responsable" class="form-control" value="Por designar"
                                            disabled>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body" style="background-color: #00AA9E;">
                        <div class="row">
                            <div class="form-row">
                                <div class="card-header form-group col-md-12">
                                    <h5 class="font-weight-bold px-2">UBICACION DEL ACTIVO</h5>
                                </div>

                                @foreach ($ubicaciones as $ubicacion)
                                    @if ($activofijo->id_ubicacion == $ubicacion->id)
                                        <div class="col-md-6">
                                            <label for="edificio">Edificio</label>
                                            <input name="edificio" type="tel" class="form-control"
                                                value="{{ $ubicacion->edificio }}" disabled>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="ciudad">Ciudad</label>
                                            <input name="ciudad" type="tel" class="form-control"
                                                value="{{ $ubicacion->ciudad }}" disabled>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="pais">Pais</label>
                                            <input name="pais" type="tel" class="form-control"
                                                value="{{ $ubicacion->pais }}" disabled>
                                        </div>

                                        @foreach ($departamentos as $departamento)
                                            @if ($departamento->id == $ubicacion->id_departamento)
                                                <div class="col-md-6">
                                                    <label for="pais">Departamento/Area</label>
                                                    <input name="pais" type="tel" class="form-control"
                                                        value="{{ $departamento->nombre }}" disabled>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body " style="background-color: #00AA9E;">
                        <div class="row">
                            <div class="form-row">
                                <div class="card-header form-group col-md-12">
                                    <h5 class="font-weight-bold px-2">CATEGORIA</h5>
                                </div>

                                <div class="col-md-3">
                                    <label for="nombre">Bienes</label>
                                    <input name="nombre" type="tel" class="form-control"
                                        value="{{ $categoria->nombre }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="proveedor">Descripcion</label>
                                    <input name="proveedor" type="tel" class="form-control"
                                        value="{{ $categoria->descripcion }}" disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="estado">Tipo Activo</label>
                                    <input type="tel" name="estado" class="form-control"
                                        value="{{ $categoria->tipo_activo }}" disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="estado">Vida util</label>
                                    <input type="tel" name="estado" class="form-control"
                                        value="{{ $categoria->vida_util }} años" disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="estado">Valor residual</label>
                                    <input type="tel" name="estado" class="form-control"
                                        value="{{ $activofijo->valor_residual }} Bs" disabled>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="background-color: #E6E6E6;">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <br>
                            <center>
                                <img height=120 width=200 data-value="{{ $activofijo->codigo }}" class="codigo"
                                    id="contenedor" />
                            </center>
                        </div>
                    </div>
                </div>

                <table class="table table-striped" style="width:100%">
                    <div class="card-header form-group col-md-12">
                        <h5 class="font-weight-bold px-2">TABLA DE DEPRECIACION DEL ACTIVO</h5>
                    </div>
                    <thead class="bg-dark">
                        <tr>
                            <th scope="col">AÑO</th>
                            <th scope="col">VALOR CON DEPRECIACION</th>
                            <th scope="col">DEP. ANUAL</th>
                            <th scope="col">DEP. ACUMULADA</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($depreciacion as $depreciacion)
                            @if ($depreciacion->id_activo == $activofijo->id)
                                <tr>
                                    <td>{{ $depreciacion->año }} año</td>
                                    <td>{{ $depreciacion->valor }}Bs</td>
                                    <td>{{ $activofijo->d_anual }}Bs</td>
                                    <td>{{ $depreciacion->d_acumulada }}Bs</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>


                <br>


                <center>
                    <button class="btn btn-warning btb-sm text-light" type="button" onclick="history.back()"></i>
                        Volver</button>
                    <a href="{{ route('activosfijo.edit', $activofijo->id) }}"
                        class="btn btn-primary btb-sm text-light">Editar </a>
                </center>

                <br>

            </div>
        </div>
    @stop
    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    @stop

    @section('js')
        <script>
            window.addEventListener("load", () => {
                var qrc = new QRCode(document.getElementById("qrcode"), "{{ $activofijo->id }}");
            });
        </script>

        <script>
            const activo = [{
                nombre: "activo",
                precio: 20,
                codigo: "123",
            }];
            const $contenedor = document.querySelector("#contenedor");
            // Por cada producto, crear un SVG y adjuntarlo
            activo.forEach(activo => {
                const elemento = document.createElement("img");
                elemento.dataset.format = "CODE128";
                elemento.dataset.value = activo.codigo;
                elemento.dataset.text = activo.nombre + " " + activo.precio.toFixed(2);
                elemento.classList.add("codigo");
                $contenedor.appendChild(elemento);
            });
            // Al final, inicializamos
            JsBarcode(".codigo").init();
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#categoria').DataTable();
            });
        </script>
    @stop
