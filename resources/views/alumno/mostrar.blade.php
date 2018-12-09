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
                                Datos de alumno
                            </h2>
                        </div>
                        <div class="body">
                            {!! Form::open(['action' => ['AlumnosController@update',$alumno->idAlumno ],'method' => 'POST']) !!}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('rut',$alumno->rut,['class' => "form-control","readonly"])}}
                                        {{Form::label('rut','Rut', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombres',$alumno->nombres,['class' => "form-control", 'id' => 'nombres',"readonly"])}}
                                        {{Form::label('nombres','Nombres', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('apellidos',$alumno->apellidos,['class' => "form-control","readonly"])}}
                                        {{Form::label('apellidos','Apellidos', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('direccion',$alumno->direccion,['class' => "form-control","readonly"])}}
                                        {{Form::label('direccion','Dirección', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('correo',$alumno->correo,['class' => "form-control","readonly"])}}
                                        {{Form::label('correo','Correo', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('celular',$alumno->celular,['class' => "form-control","readonly"])}}
                                        {{Form::label('celular','Celular', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                        <div class="form-line">
                                            {{Form::text('carrera',$alumno->carrera,['class' => "form-control","readonly"])}}
                                            {{Form::label('carrera','Carrera', ['class' => "form-label"])}}   
                                        </div>
                                </div>
                                <div class="form-group form-float">
                                        <div class="form-line">
                                            {{Form::text('anioIngreso',$alumno->anioIngreso,['class' => "form-control","readonly"])}}
                                            {{Form::label('anioIngreso','Año Ingreso', ['class' => "form-label"])}}   
                                        </div>
                                </div>
                                <div class="form-group form-float">
                                        <div class="form-line">
                                            {{Form::text('situacion',$alumno->situacion,['class' => "form-control","readonly"])}}
                                            {{Form::label('situacion','Situación', ['class' => "form-label"])}}   
                                        </div>
                                </div>
                                 {!! Form::close() !!}
                                <br>

                                <a href="/alumnos/mostrar/excel/{{$alumno->idAlumno}}" id="excel" class="btn btn-success waves-effect">Obtener Excel</A>
                                <a href="/alumnos/mostrar/pdf/{{$alumno->idAlumno}}" id="pdf" class="btn btn-danger waves-effect">Obtener PDF</A>
                              
                                <br></br>
                                <div class="row clearfix">
                                {!! Form::open(['action' => ['AlumnosController@mostrarPDFFecha',$alumno->idAlumno ],'method' => 'POST']) !!}
                                    {{Form::hidden('id',$alumno->idAlumno)}}
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
                                {!! Form::open(['action' => ['AlumnosController@mostrarExcelFecha',$alumno->idAlumno ],'method' => 'POST']) !!}
                                {{Form::hidden('id',$alumno->idAlumno)}}
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
                            
                        <div class="header">
                            <h2>
                                Lista eventos
                            </h2>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-mostrarEventos dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Lugar</th>
                                            <th>Descripción</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                            <th>Responsable</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Lugar</th>
                                            <th>Descripción</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                            <th>Responsable</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($eventos as $evento)
                                        <tr>
                                            <td>{{$evento->nombre}}</td>
                                            <td>{{$evento->tipo}}</td>
                                            <td>{{$evento->lugar}}</td>
                                            <td>{{$evento->descripcion}}</td>
                                            <td>{{ \Carbon\Carbon::parse($evento->horaInicio)->format('d/m/Y h:i')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($evento->horaFin)->format('d/m/Y h:i:s')}}</td>
                                            <td>@if($evento->pivot->encargado == 0)
                                                    No
                                                @else
                                                    Si
                                                @endif</td>      
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
@section('page-script')

<script>
    $('#date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
</script>

@endsection

@section('script')
    <script src="{{ asset('js/tablas/datatable-mostrarEventos.js')}}"></script>
@endsection