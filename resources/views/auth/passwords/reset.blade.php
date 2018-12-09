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
                    <div class="msg">Reinicio de contraseña</div>
                <div class="panel-body">
                    <!--
                    @if (session('status'))
                        <script type="text/javascript">
                            $.notify({
                                // options
                                message: " {{ session('status') }}",
                            },{
                                // settings
                                type: 'success',
                                offset: {
                                    y: 75
                                },
                                delay: 3000,
                                placement: {
                                    from: "top",
                                    align: "center"
                                }
                            });
                        </script>
                    @endif
                    -->
                    @include('inc.messages')

                    <form class="form-horizontal" method="POST" action="{{ url('/forgotPassword') }}">
                        {{ csrf_field() }}

                        <div class="input-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                                <i class="material-icons">mail</i>
                            </span>
                            <input type="hidden" value="{{$token}}">
                            <div class="form-line">
                                <input id="correo" type="email" class="form-control" name="correo" placeholder="Correo" required>
                            </div>
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                            </div>
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input id="passwordConfirmacion" type="password" class="form-control" name="passwordConfirmacion" placeholder="Confirmar Contraseña" required>
                            </div>    
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6 align-center">
                                <button type="submit" class="btn btn-primary">
                                    Cambar la contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
