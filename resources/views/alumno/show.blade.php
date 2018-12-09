@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ingrese los datos restantes del nuevo alumno
                            </h2>
                        </div>
                        <div class="body">
                               {!! Form::open(['action' => 'AlumnosController@store','method' => 'POST'])!!}

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('rut',$alumno->rut,['class' => "form-control", 'id' => 'rut'])}}
                                        {{Form::label('rut','Rut', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombres',$alumno->nombres,['class' => "form-control"])}}
                                        {{Form::label('nombres','Nombre', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidos',$alumno->apellidos,['class' => "form-control"])}}
                                        {{Form::label('apellidos','Apellidos', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('direccion',$alumno->direccion,['class' => "form-control"])}}
                                        {{Form::label('direccion','Dirección', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::email('correo',$alumno->correo,['class' => "form-control",'required'])}}
                                        {{Form::label('correo','Correo', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('celular',$alumno->celular,['class' => "form-control"])}}
                                        {{Form::label('celular','Celular', ['class' => "form-label"])}}   
                                    </div>
                                </div>    

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('carrera',$alumno->carrera,['class' => "form-control"])}}
                                        {{Form::label('carrera','Carrera', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('anio_ingreso',$alumno->anio_ingreso,['class' => "form-control"])}}
                                        {{Form::label('anio_ingreso','Año de Ingreso', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                  <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('situacion','',['class' => "form-control"])}}
                                        {{Form::label('situacion','Situacion', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <br>
                                {{Form::submit('Guardar',['class' => 'btn btn-primary m-t-15 waves-effect alumnoSave'])}}
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
    <script src="{{ asset('js/dialog/alumnos.js')}}"></script>
@endsection