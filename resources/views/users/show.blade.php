@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Ver Usuario</h1>
@stop

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">Vista detallada del usuario {{ $user->name }}</div>
           
          </div>
          <!--body-->
          <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="success">
              {{ session('success') }}
            </div>
            @endif
            <div class="row">
              <div class="col-md-4">
               
              </div><!--end card user-->

            <!--end card user 2-->

              <!--Start third-->
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                      <tbody>

                        <tr>
                            <th style="text-align: center; ">Foto de Perfil</th>
                            <td> <img src="{{ asset('img/leodc.jpg') }}" style="width: 200px" alt=""></td>
                          </tr>

                        <tr>
                          <th>Nombre de usuario</th>
                          <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <th>Sexo</th>
                            <td>{{ $user->sexo }}</td>
                          </tr>

                          <tr>
                            <th>Edad</th>
                            <td>{{ $user->edad }}</td>
                          </tr>

                          <tr>
                            <th>Cargo</th>
                            <td>{{ $user->cargo }}</td>
                          </tr>

                          <tr>
                            <th>Dirección </th>
                            <td>{{ $user->direccion }}</td>
                          </tr>

                          <tr>
                            <th>Teléfono </th>
                            <td>{{ $user->telefono }}</td>
                          </tr>

                        <tr>
                          <th>Email</th>
                          <td>{{ $user->email }}</td>
                        </tr>
                       
                        <tr>
                         <th>Rol</th>
                           <td>
                             {{$user->getRoleNames()[0]}}
                           </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"> Editar </a>
                    </div>
                  </div>
                </div>
              </div>
              <!--end third-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection