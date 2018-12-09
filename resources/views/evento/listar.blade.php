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
                                Lista de eventos del PIESDI
                            </h2>
                        </div>
                        <div class="body">
                                <div class="row clearfix">
                                        {!! Form::open(['action' => ['EventosController@mostrarPDFFecha', ],'method' => 'POST']) !!}
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
                                                {!! Form::open(['action' => ['EventosController@mostrarExcelFecha'],'method' => 'POST']) !!}
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
                                <table class="table table-bordered table-striped table-hover js-listarEvento dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Lugar</th>
                                            <th>Tipo</th>
                                            <th>Descripción</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Lugar</th>
                                            <th>Tipo</th>
                                            <th>Descripción</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($eventos as $evento)
                                        <tr>
                                            <td>{{$evento->nombre}}</td>
                                            <td>{{$evento->lugar}}</td>
                                            <td>{{$evento->tipo}}</td>
                                            <td>{{$evento->descripcion}}</td>
                                            <td>{{\Carbon\Carbon::parse($evento->horaInicio)->format('d/m/Y h:i')}}</td>
                                            <td>{{\Carbon\Carbon::parse($evento->horaFin)->format('d/m/Y h:i')}}</td>
                                            
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
    <script src="{{ asset('js/tablas/datatable-listarEvento.js')}}"></script>
@endsection