@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ingrese datos actualizados del participante externo
                            </h2>
                        </div>
                        <div class="body">
                            {!! Form::open(['action' => ['ParticipanteExternoController@update', $participanteExterno->idParticipanteExterno],'method' => 'POST'])!!}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombre',$participanteExterno->nombre,['class' => "form-control"])}}
                                        {{Form::label('nombre','Nombre de la persona o empresa', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidoPaterno',$participanteExterno->apellidoPaterno,['class' => "form-control"])}}
                                        {{Form::label('apellidoPaterno','Apellido Paterno', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidoMaterno',$participanteExterno->apellidoMaterno,['class' => "form-control"])}}
                                        {{Form::label('apellidoMaterno','Apellido Materno', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('direccion',$participanteExterno->direccion,['class' => "form-control"])}}
                                        {{Form::label('direccion','Dirección', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('correo',$participanteExterno->correo,['class' => "form-control"])}}
                                        {{Form::label('correo','Correo', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('telefono',$participanteExterno->telefono,['class' => "form-control"])}}
                                        {{Form::label('telefono','Telefono', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::textarea('descripcion',$participanteExterno->descripcion,['class' => "form-control"])}}
                                        {{Form::label('descripcion','Descripción', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                {{Form::hidden('_method','PUT')}}  
                                {{Form::submit('Editar',['class' => 'btn btn-primary m-t-15 waves-effect externoUpdate'])}}
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