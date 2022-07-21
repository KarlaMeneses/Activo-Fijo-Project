<!DOCTYPE html>
<html>

<head>
    <title>Reporte Usuarios</title>
</head>

<style>
    @page {
        margin: 90px 60px;
    }

    header {
        position: fixed;
        top: -90px;
        left: 0px;
        right: 0px;
        height: 10px;
    }

    footer {
        position: fixed;
        bottom: -90px;
        left: 0px;
        right: 0px;
        height: 50px;
    }

    .page-number:after {
        content: counter(page);
    }

    table {
        border-collapse: collapse;
        width: 100%;
        padding-left: 0%;
        border: 1px solid #e0e0e0;
        border-style:none
    }

    p.saltodepagina {
        page-break-after: always;
    }

    td {
        padding: 2px;
        text-align: left;
        border-bottom: 2px solid #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;

    }

    th {
        background-color: #00a914;
        color: white;
        text-align: center;
        padding: 2px;
      
        
    }

    body {
        padding-top: 50px;
        font-family: Helvetica, Futura, Arial, Verdana, sans-serif;
    }

    .page-break {
        page-break-after: always;
    }

</style>

<body>
    <header>
        <?php
        $nombreImagen = $empresa->foto;
        $imagenBase64 = 'data:image/jpg;base64,' . base64_encode(file_get_contents($nombreImagen));
        ?>

        <div style="position: relative">
            <div style="position: absolute">
                <img src="<?php echo $imagenBase64; ?>" style="height: 150px;width:auto;margin-top: 2.5em;"/>
              
            </div>
            <div style="position: absolute;text-align: left">
                {{-- <p style="font-size: 10px;margin-top: 3em;margin-left: 25em;vertical-align:middle;">Reporte de Usuarios:
                    {{ \Carbon\Carbon::now() }}</p> --}}
                 
            </div>
        </div>
    </header>
    <footer>
        <div style="position: relative">
            <div style="position: absolute;text-align: left">
                <p style="font-size: 10px;margin-left: 10em;vertical-align:middle;color: #888888;">
                    <strong>"Sistema Activo Fijo"</strong>
                    Para contactarse llamar al 71005231 angelicamirandau@gmail.com
                </p>
            </div>
            <div style="position: absolute;text-align: right">
                <p class="page-number"
                    style="font-size: 10px;margin-top: 1em;margin-left: 1em;vertical-align:middle;">
                    Página </p>
            </div>
        </div>


    </footer>
    <div>

  
        <h4 style="text-align: center;color:#00a914"><strong> REPORTE DEL ACTIVO FIJO   {{ $activo->codigo }} </strong> </h4>
        <p style="font-size: 12px;margin-top: 0.5em;padding: 0; margin: 0;"><h4>RESPONSABLE</h4>
            
        </p>
        @if ($lol->responsable)
            <table  id='kardex' >
                <tr>
                   
                    <th style="text-align: left;background-color: #00a914;
                    color:white;border-style:none;width:20px"><strong>Nombre: </strong></th>
                    <td  >{{$activo->responsable}}</td>
                    
                </tr>
                
                
             
            </table>
           
        
            @endif
      
        
            
                  @if ($lol->activo)
                  <h4>DETALLES DEL ACTIVO</h4>
                   
                  <table id='kardex'>

                          <tr>
                              <th style="text-align: middle;background-color: #00a914;
                              color:white;border-style:none;width:20px">Codigo</th>
                              <td>{{$activo->codigo}}</td>
                          </tr>
                          <tr>
                            <th>Nombre</th> 
                            <td> {{$activo->nombre}} </td> 
                        </tr>   
                         <tr>

                            <th>Detalle</th> 
                            <td>{{$activo->detalle}} </td>
                         </tr>
                         <tr>
                            <th>Proveedor</th> 
                            <td> {{$activo->proveedor}} </td>
                            </tr>  
                         <tr>
                            <th>Fecha Ingreso</th> 
                            <td> {{$activo->fecha_ingreso}} </td>
                         </tr>
                             <tr>
                                <th>Costo</th> 
                              
                                <td> {{$activo->costo}} </td>
                                </tr> 
                         
                           
                             <tr>
                                <th>Valor</th> 
                                <td> {{$activo->v_actual}} </td>
                                </tr> 
                             
                              
                   
                              {{-- <td>{{$contrato->users->name}}</td> --}}

                       
                     
                     
                  </table> 
                  @endif   
                  

                           
                            

 
                  @if ($lol->ubicacion)
                  <h4>DETALLES DE LA UBICACIÓN</h4>
                   
                  <table id='kardex'>

                          <tr>
                              <th style="text-align: middle;background-color: #00a914;
                              color:white;border-style:none;width:20px">Edificio</th>
                              <td>{{$ubicacion->edificio}}</td>
                          </tr>
                          <tr>
                            <th>Ciudad</th> 
                            <td> {{$ubicacion->ciudad}} </td> 
                        </tr>   
                         <tr>

                            <th>País</th> 
                            <td>{{$ubicacion->pais}} </td>
                         </tr>
                         <tr>
                            <th>Departamento / Área</th> 
                            <td> {{$departamento->nombre}} </td>
                            </tr>  
                         
                     
                  </table> 
                  @endif   

                  @if ($lol->categoria)
                  <h4>DETALLES DE CATEGORÍA</h4>
                   
                  <table id='kardex'>

                          <tr>
                              <th style="text-align: middle;background-color: #00a914;
                              color:white;border-style:none;width:20px">Bienes</th>
                              <td>{{$categoria->nombre}}</td>
                          </tr>
                          <tr>
                            <th>Descripción</th> 
                            <td> {{$categoria->descripcion}} </td> 
                        </tr>   
                         <tr>

                            <th>Tipo de Activo</th> 
                            <td>{{$categoria->tipo_activo}} </td>
                         </tr>
                         <tr>
                            <th> Vida Útil</th> 
                            <td> {{$categoria->vida_util}} </td>
                            </tr>  
                            <tr>
                                <th> Valor Residual</th> 
                                <td> {{$activo->valor_residual}} </td>
                                </tr>    
                     
                  </table> 
                  @endif 
    

    </div>

    </div>

</body>

</html>
