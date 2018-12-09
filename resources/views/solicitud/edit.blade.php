@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Datos de Solicitud
                            </h2>
                        </div>
                        <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('asunto',$solicitud->asunto,['class' => "form-control",'readonly'])}}
                                        {{Form::label('asunto','Asunto', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombreEmisor',$solicitud->nombreEmisor,['class' => "form-control",'readonly'])}}
                                        {{Form::label('nombreEmisor','Nombre Emisor', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('cargoEmisor',$solicitud->cargoEmisor,['class' => "form-control",'readonly'])}}
                                        {{Form::label('cargoEmisor','Cargo Emisor', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('correoDestinatario',$solicitud->correoDestinatario,['class' => "form-control",'readonly'])}}
                                        {{Form::label('correoDestinatario','Correo Destino', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                        <div class="form-line">
                                            {{Form::text('fecha',$solicitud->fecha,['class' => "form-control",'readonly'])}}
                                            {{Form::label('fecha','Fecha', ['class' => "form-label"])}}   
                                        </div>
                                    </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::textarea('mensaje',$solicitud->mensaje,['class' => "form-control",'readonly'])}}
                                        {{Form::label('Mensaje','Dirección', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                
                                {!! Form::open(['action' => ['SolicitudesController@update',$solicitud->idSolicitud ],'method' => 'POST']) !!}
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        @if ($solicitud->estado == true)
                                            {{Form::checkbox('estado',1,true,['id' => 'estado'])}}
                                        @else
                                            {{Form::checkbox('estado',1, false,['id' => 'estado'])}} 
                                        @endif
                                        {{Form::label('estado','Completado', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <br>
                                {{Form::hidden('_method','PUT')}}  
                                {{Form::submit('Editar',['class' => 'btn btn-primary m-t-15 waves-effect solicitudUptate'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/dialog/solicitud.js')}}"></script>
@endsection