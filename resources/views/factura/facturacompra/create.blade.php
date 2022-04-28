@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Factura de Compra</h1>
@stop
@section('content')
<style>
            #imagen{
        display: none;
        }

        .circle{
            border-radius: 10%;
            width: 100px;
            height: 50px;
            background-color: #939fce;
            border-style: solid;
            border-color: #939fbe; 
            text-align: center;
            text-size-adjust: auto;
        }
</style>

    <div class="card">
        <div class="card-body">
               
                @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Este usuario ya está registrado.
              </div>
                 
                @enderror 
                <form method="POST" action="{{route('factura.facturacompra.store')}}" enctype="multipart/form-data">
                    @csrf
                   
                        <!--begin::Label-->
                        <label >Nombre Completo:</label>
                        <!--end::Label-->
                     
                                    <select name="iduser" id="select-room" class="form-control" onchange="habilitar()" >
                                        <option value="nulo">Usuarios</option>
                
                                        @foreach ($users as $user)
                
                                            <option value="{{$user->id}}">
                
                                               <spam>{{$user->name}}</spam>
                
                                            </option>
                
                                        @endforeach
                                    </select>
                             
                    
                     <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">NIT:</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                                 <input type="text" name="nit" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Numero de Celular"  />
                            
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Ciudad:</label>
                        <!--end::Label-->
                                   <input type="text" name="ciudad" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Ciudad"  />
                             
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Dirección:</label>
                                       <input type="text" name="direccion" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Direccion"  />
                                        
                          
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Telefono:</label>
                            
                                            <input type="number" name="telefono" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                        
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Email:</label>
                              
                                            <input type="email" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                        

                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Vendedor:</label>
                               
                                            <input type="text" name="vendedor" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                     
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Artículo:</label>
                             
                                            <input type="text" name="articulo" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                       
                           
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Descripción:</label>
                               
                                            <input type="text" name="descripcion" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                     
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Forma de Pago:</label>
                              
                                            <input type="text" name="formapago" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                       
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Cantidad:</label>
                               
                                            <input type="number" name="cantidad" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                    
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Valor unitario:</label>
                               
                                            <input type="number" name="vunitario" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Valor total:</label>
                               
                                            <input type="number" name="vtotal" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                       
                           
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Referencia:</label>
                              
                                            <input type="text" name="referencia" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Email"  />
                                    
                                    
                                
                                     <br> 
                    
                    <input type="hidden" name="tipo" value="compra">
                    
                    
                    <div class="row mb-6">
                        <!--begin::Label-->
                        
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <button type="submit"  class="btn btn-lg btn-primary w-100 mb-5">
                                    Guardar
                                </button>
            
                           
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <br>
                        </div>
                    </div>    
                
                   
                </form>
            </div> 
</div>

<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');
    function habilitar(){
        if(rol.value > 0){
            empleados.disabled = false
        }else{
            empleados.disabled = true
            empleados.value = 0
        }
    }
    function cargar(){
        if(rol.value > 0){
            empleados.disabled = false
        }else{
            empleados.disabled = true
            empleados.value = 0
        }
    }
    /* function elegirE(){
        if(odontologos.value > 0){
            odontologos.disabled = false
        }
    } */
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop