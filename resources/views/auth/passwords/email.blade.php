@extends('layouts.inicio')

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

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="input-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                                <i class="material-icons">mail</i>
                            </span>
                            <div class="form-line">
                                <input id="correo" type="email" class="form-control" name="correo" value="{{ old('email') }}" placeholder="Correo" required>
                            </div>
                                @if ($errors->has('correo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6 align-center">
                                <button type="submit" class="btn btn-primary">
                                    Enviar Link de cambio de contraseña
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
