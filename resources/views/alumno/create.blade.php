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
                                Seleccionar el alumno a agregar
                            </h2>
                        </div>
                        <div class="body">
                         <a href="{{ url('alumnos/0') }}" class="btn btn-default">Agregar alumno manual</a>
                         <br></br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-crearAlumno dataTable">
                                    <thead>
                                        <tr>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Celular</th>
                                            <th>Año Ingreso</th>
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
                                            <th>Año Ingreso</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($arr_alumnos as $alumno)
                                        <tr>
                                            <td>{{$alumno->rut}}</td>
                                            <td>{{$alumno->nombres}}</td>
                                            <td>{{$alumno->apellidos}}</td>
                                            <td>{{$alumno->direccion}}</td>
                                            <td>{{$alumno->correo}}</td>
                                            <td>{{$alumno->celular}}</td>
                                            <td>{{$alumno->anio_ingreso}}</td>
                                            <td><a href="{{ action('AlumnosController@show', $alumno->id_alumno) }}" class="btn btn-default">Elegir</a></td>
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
	$(document).ready(function() {
         $('.js-basic-example').DataTable({
            responsive: true
        });
    });
</script>
@endsection

@section('script')
    <script src="{{ asset('js/tablas/datatable-crearAlumno.js')}}"></script>
@endsection