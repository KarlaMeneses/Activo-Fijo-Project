<!DOCTYPE html>
<html>

<head>
    <title>Reporte Baja</title>
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
                <img src="<?php echo $imagenBase64; ?>" style="height: 100px;width:auto;margin-top: 4.0em; ">
            </div>
            
            <div style="position: relative;text-align: middle">
                <p style="font-size: 10px;margin-top: 3em;margin-left: 30em;vertical-align:middle;">Reporte de Factura:
                    {{ \Carbon\Carbon::now() }}</p>
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

  
        <h4 style="text-align: center;color:#00a914"><strong> SOLICITUD DE BAJA DE BIENES DE ACTIVO FIJO</strong> </h4>
        <br><br><br>
        <p style="font-size: 15px;margin-top: 0.5em;padding: 0; margin: 0;">Por el medio de la presente, solicito registre la baja del bien de activo fijo que a continuación se detallará:</p>
        
        <br><br>
        <p style="font-size: 15px;margin-top: 0.5em;padding: 0; margin: 0;"><strong>DATOS DEL ACTIVO</strong>
            <br> <br>
        </p>

            <table class="table-borderless" style="font-size:15px;border-style:none">
                <tr>
                   
                    <th style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none;width:20px"><strong>Código: </strong></th>
                    <td style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);width:250px;border-style:none" >{{$activo->codigo}}</td>
                    <br><br>
                </tr>
                
                
                <tr>
                    <th style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none"><strong>Nombre: </strong></th>
                    <td style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none">{{$activo->nombre}}</td>
               <br><br>
                </tr>
                
              
                <tr>
                    <th style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none"><strong>Detalle: </strong></th>
                    <td style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none">{{$activo->detalle}}</td>  
                    <br><br>    
                </tr>
                  
                <tr>
                    <th style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none"><strong>Proveedor: </strong></th>
                    <td style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none">{{$activo->proveedor}}</td>  
                    <br><br>    
                </tr>
                <tr>
                    <th style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none"><strong>Fecha Adquisición: </strong></th>
                    <td style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none">{{$activo->fecha_ingreso}}</td>  
                    <br><br>    
                </tr>
                     
               
            
            </table>
            
       <br><br>
            <p style="font-size: 15px;margin-top: 0.5em;padding: 0; margin: 0;">El artículo antes descrito aquirido y registrado como bien de activo fijo el día {{$activo->fecha_ingreso}} siendo el responsable el señor@ {{$activo->responsable}}. </p>
            <br><br>
            <p style="font-size: 15px;margin-top: 0.5em;padding: 0; margin: 0;">La causa que originó la baja: {{$baja->causadebaja}} el día {{$baja->fechasolicitada}} </p>
    </div>

    </div>

</body>

</html>
