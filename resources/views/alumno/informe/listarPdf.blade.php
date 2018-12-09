<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/informe/bootstrap.min.css') }}" rel="stylesheet">
   <!-- DataTables CSS -->
    <link href="{{ asset('css/informe/dataTables.bootstrap.min.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('css/informe/dataTables.responsive.css') }}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/informe/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/informe/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/informe/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    </head>
        <div id="page-wrapper">    
            <center><div class="panel panel-default">
                <div  class="panel-heading text-center">
                    Informe de alumnos integrantes del PIESDI
                </div>
            </div></center>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Rut</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Dirección</th>
                                        <th>Correo</th>
                                        <th>Celular</th>
                                        <th>Carrera</th>
                                        <th>Año Ingreso</th>
                                        <th>Situación</th>
                                    </tr>
                                </thead>
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
                                        </tr>
                                       @endforeach

                                </tbody>
                            </table>
        </div>  
</div>
</html>