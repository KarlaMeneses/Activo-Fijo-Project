@extends('adminlte::page')

@section('title', 'Activo Fijo')


@section('content_header')
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>

    <div class="card-header  text-center">
        <h3><b>Registrar Factura de Venta</b></h3>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Este usuario ya está registrado.
                </div>
            @enderror
            @php
                $sw = 1;
                $anterior = 0;
            @endphp
            <form action="{{ route('factura.facturaventa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button class="btn btn-danger " type="submit">Crear Factura</button>
                <a class="btn btn-primary " href="{{ route('factura.facturaventa.index') }}">Volver</a>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="comprador">Comprador</label>
                        <input type="text" name="comprador" class="form-control" required>
                        <label for="nit">NIT</label>
                        <input type="text" name="nit" class="form-control" required>
                        <label for="idvendedor">Responsable de la venta</label>
                        <select name="idvendedor" id="select-room" class="form-control" onchange="habilitar()" >
                            <option value="nulo">Usuarios</option>
    
                            @foreach ($users as $user)
    
                                <option value="{{$user->id}}">
    
                                   <spam>{{$user->name}}</spam>
    
                                </option>
    
                            @endforeach
                        </select>

                        <label for="direccion">Ciudad</label>
                        <input type="text" name="ciudad" class="form-control" required>

           

                        <label for="telefono">Telefono</label>
                        <input type="tel" name="telefono" class="form-control" required>

                        <label for="fechaemitida">Fecha de Emisión</label>
                        <input type="date" name="fechaemitida" class="form-control" required>
                     
                        <label for="formapago">Forma de Pago:</label>
                              
                        <input type="text" name="formapago" class="form-control " placeholder=""  />
                   
          
            
                        <input type="hidden" name="tipo" value="venta"/>
                
                

                    </div>
                    <div class="form-group col-md-6">
                       
                    @section('js')
                        <script src="{{ asset('js/factura.js') }}"></script>
                    @endsection
                    <center>
                        <label>Subir foto de Comprobante - Nota de compra fisica</label>
                        <br>
                        <img width="300" height="400" id="foto">
                        <br> <br>
                        <div class="custom-input-file">
                            
                            <input type="file" id="file" accept="image/*" class="input-file" value="" required>
                            <i class="fas fa-file-upload"></i> Subir Foto...
                        </div>
                        <div class="col-12" id="app" style="text-align:center;">
                            <progress id="progress_bar" value="0" max="100"></progress>
                            <input type="hidden" value="" name="foto" id="fotov" title="foto"
                                placeholder="https://example.com" list="defaultURLs"
                                class="focus border-dark  form-control" required
                                oninvalid="this.setCustomValidity('Please match the requested format')">
                        </div>
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </center>
                    <!---karla todo esto es subir imagenes ---> 
                    </div>

                </div>
            </form>
          
        </div>
    </div>
    <script></script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')



    <script>
        document.addEventListener('DOMContentLoaded', cargar, false);
        let checkP = document.getElementById('check_password');
        let contra = document.getElementById('passwordInput');

        var rol = document.getElementById('select-roles');
        var empleados = document.getElementById('select-empleados');

        function get_nota_id_last() {
            $facturaaux = DB::table('facturas') -
                >
                latest('id') -
                >
                first();
            $facturaid = $facturaaux - > id;
            return $facturaid;
        }

        /*****************************/
        $(document).ready(function() {
            $('#bt_add').click(function() {
                agregar();
            });
        });

        var cont = 0;
        total = 0;
        subtotal = [];
        $("#guardar").hide();


        function limpiar() {
            $("#pcantidad").val("");
            $("#pprecio_compra").val("");
            $("#pprecio_venta").val("");
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            $("#total").html("S/. " + total);
            $("#fila" + index).remove();
            evaluar();

        }
    </script>

@stop
