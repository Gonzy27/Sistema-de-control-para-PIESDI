@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ingrese los datos para el cambio de contraseña
                            </h2>
                        </div>
                        <div class="body">
                            {!! Form::open(['action' => ['PagesController@resetPass'],'method' => 'POST']) !!}
                            {{Form::hidden('id',Auth::user()->tipoCuenta)}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {{Form::password('antiguaContrasenia',['class' => "form-control"])}}
                                    {{Form::label('antiguaContrasenia','Introduzca la contraseña Antigua', ['class' => "form-label"])}}   
                                </div>
                            </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::password('nuevaContrasenia',['class' => "form-control"])}}
                                        {{Form::label('nuevaContrasenia','Introduzca la contraseña Nueva', ['class' => "form-label"])}}   
                                    </div>
                            </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::password('confirmarContrasenia',['class' => "form-control"])}}
                                        {{Form::label('confirmarContrasenia','Repita la contraseña', ['class' => "form-label"])}}   
                                    </div>
                            </div>
                                {{Form::submit('Guardar',['class' => 'btn btn-primary m-t-15 waves-effect'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
@endsection