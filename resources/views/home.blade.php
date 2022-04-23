

@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')


@section('content_header')
   <h1>Menu de Inicio</h1>
  
@stop

@section('content')



   <p>Bienvenido al panel de administrador.</p>




   
@stop

@section('css')
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
   <script src="asset('js/app.js')"></script>
@stop



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}

