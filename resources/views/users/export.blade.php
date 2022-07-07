<!DOCTYPE html>
<html>

<head>
    <title>Reporte Usuarios</title>
</head>



<body>
    <header>
        
     
       
        
            
                    
                    <h4>DETALLES DEL REPORTE</h4>
                   
                    <table id='kardex'>

                        <thead>
                            <tr>
                                <th>ID</th>
                                
                                <th>Nombre</th> 
                               
                                <th>Sexo</th> 
                             
                                @if ($lol->edad == 'true')
                                <th>Edad</th> 
                                @endif
                                @if ($lol->cargo == 'true')
                                <th>Cargo</th> 
                                @endif
                                @if ($lol->direccion == 'true')
                                <th>Dirección</th> 
                                @endif
                                @if ($lol->telefono == 'true')
                                <th>teléfono</th> 
                                @endif
                                @if ($lol->email == 'true')
                                <th>Email</th> 
                                @endif
                                
                               
            
                            </tr>
                            {{-- <th>user</th> --}}
                        </thead>

                        <tbody>
                            @foreach ($users as $us )
                                
                            <tr>

                                <td>{{$us->id}}</td>
                                @if ($lol->nombre == 'true')
                                <td> {{$us->name}} </td> 
                                @endif
                                @if ($lol->sexo == 'true')
                                <td>{{$us->sexo}} </td>
                                @endif
                                @if ($lol->edad == 'true')
                                <td> {{$us->edad}} </td>
                                @endif
                                @if ($lol->cargo == 'true')
                                <td> {{$us->cargo}} </td>
                                @endif
                                @if ($lol->direccion == 'true')
                                <td> {{$us->direccion}} </td>
                                @endif
                                @if ($lol->telefono == 'true')
                                <td> {{$us->telefono}} </td>
                                @endif
                                @if ($lol->email == 'true')
                                <td> {{$us->email}} </td>
                                @endif
                                {{-- <td>{{$contrato->users->name}}</td> --}}

                            </tr>
                            @endforeach

                        </tbody>
                       
                    </table>

                           
                            




    

    </div>

    </div>

</body>

</html>
