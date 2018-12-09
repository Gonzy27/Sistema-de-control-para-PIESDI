@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ingrese datos del nuevo participante externo
                            </h2>
                        </div>
                        <div class="body">
                            {!! Form::open(['action' => 'ParticipanteExternoController@store','method' => 'POST'])!!}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombre','',['class' => "form-control"])}}
                                        {{Form::label('nombre','Nombre de la persona o empresa', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidoPaterno','',['class' => "form-control"])}}
                                        {{Form::label('apellidoPaterno','Apellido Paterno (si es necesario)', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidoMaterno','',['class' => "form-control"])}}
                                        {{Form::label('apellidoMaterno','Apellido Materno (si es necesario)', ['class' => "form-label"])}}   
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
                                        {{Form::text('correo','',['class' => "form-control"])}}
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
                                        {{Form::textarea('descripcion','',['class' => "form-control"])}}
                                        {{Form::label('descripcion','Descripción', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                {{Form::submit('Guardar',['class' => 'btn btn-primary m-t-15 waves-effect externoSave'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{ asset('js/dialog/externos.js')}}"></script>
@endsection