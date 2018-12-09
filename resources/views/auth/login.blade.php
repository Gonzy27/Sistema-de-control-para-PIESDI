@extends('layouts.inicio')

@section('title', 'Sistema PIESDI')

@section('content')
<body class="login-page">
    <div class="login-box">
        <div class="logo">
                <div class="logo">
                        <a href="{{url('home')}}">Sistema<b> PIESDI</b></a>
                        <small>Sistema de control de integrantes, solicitudes y eventos</small>
                </div>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                 {{ csrf_field() }}
                    <div class="msg">Ingrese sus datos de inicio</div>
                    <div class="input-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="rut" type="text" class="form-control" name="rut" placeholder="Rut"  value="{{ old('rut') }}" required autofocus>
                        </div>
                        @if ($errors->has('rut'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rut') }}</strong>
                            </span>
                         @endif
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                         @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Recordar mis datos</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Ingresar</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <!--
                        <div class="col-xs-6 align-right">
                            <a href="{{ url('password/reset') }}">¿Olvido su contraseña?</a>
                        </div>
                    -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
            $(document).ready(function () {
                $('#rut').Rut({           
                    format_on: 'keyup'
                });
            });
    </script>
@endsection