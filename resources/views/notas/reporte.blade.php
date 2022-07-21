<!DOCTYPE html>
<html>

<head>
    {{-- <link rel="icon" type="image/svg" href="{{asset('images/logoweb.svg')}}" /> --}}
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <title>Reporte Nota</title>
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
        background-color: #0077b5;
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
            <div style="position: relative;text-align: left">
                <p style="font-size: 10px;margin-top: 3em;margin-left: 25em;vertical-align:middle;">Reporte de Nota:
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

  
        <h4 style="text-align: center;color:#0077b5"><strong> NOTA DE COMPRA</strong> </h4>
        <p style="font-size: 12px;margin-top: 0.5em;padding: 0; margin: 0;"><strong>DATOS DEL PROVEEDOR</strong>
            
           
        </p>

            <table class="table-borderless" style="font-size:12px;border-style:none">
                <tr>
                   
                    <th style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none;width:100px;"><strong>Proveedor: </strong></th>
                    <td style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);width:250px;border-style:none" >{{$nota->proveedor}}</td>
                    
                  
                  
                </tr>
                <tr>
                    <th style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none;width:2%"><strong>Dirección</strong></th>
                    <td style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none">{{$nota->direccion}}</td>
                   
                </tr>
                
                <tr>
                    <th style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none"><strong>Fecha de Entrega</strong></th>
                    <td style="text-align: left;background-color: #ffffff;
                    color: rgb(4, 4, 4);border-style:none">{{$nota->fecha_entrega}}</td>
               
               
                </tr>
                
              <tr>
                <th style="text-align: left;background-color: #ffffff;
                color: rgb(4, 4, 4);border-style:none"><strong>Teléfono</strong></th>
                <td style="text-align: left;background-color: #ffffff;
                color: rgb(4, 4, 4);width:250px;border-style:none">{{$nota->telefono}}</td>
              </tr>
             
            </table>
            
       
        
            
                    
                    <h4>DETALLES</h4>
                   
                    <table id='kardex'>

                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Detalle</th>
                                <th>Precio Unitario</th>
                               
                                <th>Total</th>

                            </tr>
                            {{-- <th>user</th> --}}
                        </thead>

                        <tbody>
                            @foreach ($detalles as $detalle )
                                
                            <tr>

                                <td>{{$detalle->cantidad}}</td>
                                <td>{{$detalle->detalle}} </td>
                                <td> {{$detalle->precio_uni}} </td>
                               
                                <td> {{$detalle->total}} </td>
                                
                                {{-- <td>{{$contrato->users->name}}</td> --}}

                            </tr>
                            @endforeach

                        </tbody>
                        <tr>
                            
                            <th style="text-align: left;background-color: #ffffff;
                            color: rgb(4, 4, 4);border-style:none"></th>
                            <th style="text-align: left;background-color: #ffffff;
                            color: rgb(4, 4, 4);border-style:none"></th>
                            <th scope="col">Total</th>
                            <td scope="col">{{ $nota->totales }}</td>
                        </tr>
                      
                    </table>

                           
                            




    

    </div>

    </div>

</body>

</html>
