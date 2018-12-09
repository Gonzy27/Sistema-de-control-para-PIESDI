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
                    Informe de Eventos desde {{$request->datestart}} hasta {{$request->dateend}}
                </div>
            </div></center>
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
                                        </tr>
                                       @endforeach

                                </tbody>
                            </table>
        </div>  
</div>
</html>