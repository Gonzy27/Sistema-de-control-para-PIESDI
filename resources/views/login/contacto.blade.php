@extends('layouts.inicio')

@section('title', 'Contacto')

@section('content')
<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
                <a href="{{url('home')}}">Sistema<b> PIESDI</b></a>
                <small>Sistema de control de integrantes, solicitudes y eventos</small>
        </div>
        @include('inc.messages')

        <div class="card">
            <div class="body">
                 {!! Form::open(['action' => 'SolicitudesController@store','method' => 'POST'])!!}
                    <h2 class="align-center">Formulario de Contacto</h2>
                    <br>
                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">check</i>
                        </span>
                        <div class="form-line">
                            {{Form::text('asunto','',['class' => "form-control", 'placeholder'=>"Asunto", 'autofocus'])}}
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            {{Form::text('nombre','',['class' => "form-control", 'placeholder'=>"Nombre"])}}
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>                 
                            <div class="form-line">
                                {{Form::text('cargo','',['class' => "form-control", 'placeholder'=>"Cargo"])}}
                            </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            {{Form::email('correo','',['class' => "form-control", 'placeholder'=>"Correo"])}}
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">group</i>
                        </span>
                        {{ Form::select('destinatario', $profesionales, null,['class' =>'form-control show-tick','data-live-search="true"'] )}}
                    
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">assignment</i>
                        </span>
                        <div class="form-line">
                            {{Form::textarea('mensaje','',['class' => "form-control", 'placeholder'=>"Mensaje", 'required'])}}
                        </div>
                    </div>
                    {{Form::submit('Enviar',['class' => 'btn btn-block btn-lg bg-pink waves-effect', 'id' => 'contactoSubmit'])}}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/dialog/contacto.js')}}"></script>
@endsection