@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ingrese datos del nuevo usuario
                            </h2>
                        </div>
                        <div class="body">
                            {!! Form::open(['action' => 'ProfesionalesController@store','method' => 'POST'])!!}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('rut','',['class' => "form-control", 'id' => 'rut'])}}
                                        {{Form::label('rut','Rut', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombre','',['class' => "form-control"])}}
                                        {{Form::label('nombre','Nombre', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidoPaterno','',['class' => "form-control"])}}
                                        {{Form::label('apellidoPaterno','Apellido Paterno', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidoMaterno','',['class' => "form-control"])}}
                                        {{Form::label('apellidoMaterno','Apellido Materno', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('direccion','',['class' => "form-control"])}}
                                        {{Form::label('direccion','Dirección', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::email('correo','',['class' => "form-control"])}}
                                        {{Form::label('correo','Correo', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('telefono','',['class' => "form-control"])}}
                                        {{Form::label('telefono','Telefono', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('celular','',['class' => "form-control"])}}
                                        {{Form::label('celular','Celular', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('cargo','',['class' => "form-control"])}}
                                        {{Form::label('cargo','Cargo', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <input type="checkbox" name="tipoCuenta" id="tipoCuenta" check='false'>
                                    <label for="tipoCuenta">¿Es Coordinador?</label>  
                                    </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::password('pass',['class' => "form-control"])}}
                                        {{Form::label('pass','Contraseña', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                        <div class="form-line">
                                            {{Form::password('passSeguridad',['class' => "form-control"])}}
                                            {{Form::label('passSeguridad','Repita la contraseña', ['class' => "form-label"])}}   
                                        </div>
                                </div>
                                {{Form::submit('Enviar',['class' => 'btn btn-primary m-t-15 waves-effect profefionalSave'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('page-script')
<script>
$(document).ready(function () {
        $('#rut').Rut({           
            format_on: 'keyup'
        });
    });
</script>
@endsection

@section('script')
    <script src="{{ asset('js/dialog/profesionales.js')}}"></script>
@endsection