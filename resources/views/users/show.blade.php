@extends('adminlte::page')

@section('title', 'SI2+')

@section('content_header')
    <h1>ver usuario</h1>
@stop

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">Usuarios</div>
            <p class="card-category">Vista detallada del usuario {{ $user->name }}</p>
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
                          <th>Nombre de usuario</th>
                          <td>{{ $user->name }}</td>
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