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
                                Lista de alumnos integrantes
                            </h2>
                        </div>
                        <div class="body">
                                <div class="row clearfix">
                                <div class="col-sm-2">
                                    <a href="/alumnos/listar/pdf/" id="pdf" class="btn btn-danger waves-effect">Obtener PDF</A>
                                </div>
                                <div class="col-sm-2">
                                    <a href="/alumnos/listar/excel/" id="excel" class="btn btn-success waves-effect">Obtener Excel</A>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-listarAlumno dataTable">
                                    <thead>
                                        <tr>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Celular</th>
                                            <th>Carrera</th>
                                            <th>Año Ingreso</th>
                                            <th>Situación</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Celular</th>
                                            <th>Carrera</th>
                                            <th>Año Ingreso</th>
                                            <th>Situación</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td>{{$alumno->rut}}</td>
                                            <td>{{$alumno->nombres}}</td>
                                            <td>{{$alumno->apellidos}}</td>
                                            <td>{{$alumno->direccion}}</td>
                                            <td>{{$alumno->correo}}</td>
                                            <td>{{$alumno->celular}}</td>
                                            <td>{{$alumno->carrera}}</td>
                                            <td>{{$alumno->anioIngreso}}</td>
                                            <td>{{$alumno->situacion}}</td>
                                            <td><a href="/alumnos/mostrar/{{$alumno->idAlumno}}" class="btn btn-default">Eligir</a></td>
                                            <td><a href="/alumnos/{{$alumno->idAlumno}}/edit" id="edit" class="btn btn-default alumnoEdit">Editar</a></td>
                                            <td>{!!Form::open(['action' => ['AlumnosController@destroy',$alumno->idAlumno], 'method' => 'POST'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete',['class' => 'btn btn-danger alumnoDelete'])}}
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
    <script src="{{ asset('js/tablas/datatable-listarAlumno.js')}}"></script>
    <script src="{{ asset('js/dialog/alumnos.js')}}"></script>
@endsection
