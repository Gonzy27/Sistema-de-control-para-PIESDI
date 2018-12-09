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
                    Informe de participación de alumno
                </div>
            </div></center>

                           <table align="center">
                                <tr><th>Rut: </th><td>{{$alumno->rut}}</td><i></i>
                                    <th>Nombres: </th><td>{{$alumno->nombres}}</td></tr>      
                                   <tr><th>Apellidos: </th><td>{{$alumno->apellidos}}<?php echo  " "." "."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></td>
                                       <th>Direccion: </th><td>{{$alumno->direccion}}</td></tr>
                                   <tr><th>Correo: </th><td>{{$alumno->correo}}</td>
                                    <th>Celular: </th><td>{{$alumno->Celular}}</td></tr>
                                    <tr><th>Carrera: </th><td>{{$alumno->carrera}}</td>
                                        <th>Año Ingreso: </th><td>{{$alumno->anioINgreso}}</td></tr>
                                    <tr><th>Situación: </th><td>{{$alumno->situacion}}</td>
                            </table>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Lugar</th>
                                        <th>Descripción</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Final</th>
                                        <th>Responsable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        
                                        @foreach ($eventos as $evento)
                                        <tr>
                                            <td>{{$evento->nombre}}</td>
                                            <td>{{$evento->tipo}}</td>
                                            <td>{{$evento->lugar}}</td>
                                            <td>{{$evento->descripcion}}</td>
                                            <td>{{ \Carbon\Carbon::parse($evento->horaInicio)->format('d/m/Y h:i')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($evento->horaFin)->format('d/m/Y h:i')}}</td>
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
</html>