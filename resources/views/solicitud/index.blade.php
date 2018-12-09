@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             
               <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Lista de solicitudes
                            </h2>
                        </div>
                        <div class="body">
                                    <div class="row clearfix">
                                        {!! Form::open(['action' => ['SolicitudesController@listarPdf', ],'method' => 'POST']) !!}
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        {{Form::text('datestart','',['class' => "datepicker form-control", 'id' => 'date-start', 'required', 'placeholder' => 'Por favor elija fecha de inicio...'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                    <div class="form-group">
                                                            <div class="form-line">
                                                    {{Form::text('dateend','',['class' => "datepicker form-control", 'id' => 'date-end', 'required', 'placeholder' => 'Por favor elija fecha de fin...'])}}
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-xs-4">
                                                    <div class="form-group">
                                                            <div class="form-line">
                                                        {{Form::submit('Obtener PDF',['class' => 'btn btn-block bg-red waves-effect'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                        </div>

                                        <div class="row clearfix">
                                                {!! Form::open(['action' => ['SolicitudesController@listarExcel'],'method' => 'POST']) !!}
                                                    <div class="col-sm-4">
                                                            <div class="form-group">
                                                                    <div class="form-line">
                                                                 {{Form::text('datestart2','',['class' => "datepicker form-control", 'id' => 'date-start2', 'required', 'placeholder' => 'Por favor elija fecha de inicio...'])}}
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                            <div class="form-group">
                                                                    <div class="form-line">
                                                                        {{Form::text('dateend2','',['class' => "datepicker form-control", 'id' => 'date-end2', 'required', 'placeholder' => 'Por favor elija fecha de fin...'])}}
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    <div class="col-xs-4">
                                                            <div class="form-group">
                                                                 <div class="form-line">
                                                                {{Form::submit('Obtener Excel',['class' => 'btn btn-block bg-green waves-effect'])}}
                                                            </div>
                                                        </div>
                                                    </div>
                                            {!! Form::close() !!}
                                                </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-listarSolicitud dataTable">
                                    <thead>
                                        <tr>
                                            <th>Asunto</th>
                                            <th>Nombre Emisor</th>
                                            <th>Cargo Emisor</th>
                                            <th>Correo Emisor</th>
                                            <th>Correo Destino</th>
                                            <th>Fecha</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Asunto</th>
                                            <th>Nombre Emisor</th>
                                            <th>Cargo Emisor</th>
                                            <th>Correo Emisor</th>
                                            <th>Correo Destino</th>
                                            <th>Fecha</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($solicitudes as $solicitud)
                                        <tr>
                                            @if ($solicitud->estado == true)
                                                <td>{{$solicitud->asunto}}</td>
                                                <td>{{$solicitud->nombreEmisor}}</td>
                                                <td>{{$solicitud->cargoEmisor}}</td>
                                                <td>{{$solicitud->correoEmisor}}</td>
                                                <td>{{$solicitud->correoDestinatario}}</td>
                                                <td>{{\Carbon\Carbon::parse($solicitud->fecha)->format('d/m/Y h:i')}}</td>
                                            @else
                                                <td><b>{{$solicitud->asunto}}</b></td>
                                                <td><b>{{$solicitud->nombreEmisor}}</b></td>
                                                <td><b>{{$solicitud->cargoEmisor}}</b></td>
                                                <td><b>{{$solicitud->correoEmisor}}</b></td> 
                                                <td><b>{{$solicitud->correoDestinatario}}</b></td> 
                                                <td><b>{{\Carbon\Carbon::parse($solicitud->fecha)->format('d/m/Y h:i')}}</b></td> 
                                            @endif
                                            <td><a href="/solicitudes/{{$solicitud->idSolicitud}}/edit" class="btn btn-default">Mostrar</a></td>
                                            <td>{!!Form::open(['action' => ['SolicitudesController@destroy',$solicitud->idSolicitud], 'method' => 'POST'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Eliminar',['class' => 'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/tablas/datatable-listarSolicitud.js')}}"></script>
@endsection