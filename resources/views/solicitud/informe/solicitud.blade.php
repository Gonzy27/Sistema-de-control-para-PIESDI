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
                    Informe de solicitudes de {{Auth::user()->nombre}} {{Auth::user()->apellidoPaterno}} {{Auth::user()->apellidoMaterno}}
                </div>
            </div></center>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Asunto</th>
                                        <th>Nombre Emisor</th>
                                        <th>Cargo Emisor</th>
                                        <th>Correo Emisor</th>
                                        @if(Auth::user()->tipoCuenta == 1){
                                            <th>Correo Destino</th>
                                        @endif
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        
                                        @foreach ($solicitudes as $solicitud)
                                        <tr>
                                            <td>{{$solicitud->asunto}}</td>
                                            <td>{{$solicitud->nombreEmisor}}</td>
                                            <td>{{$solicitud->cargoEmisor}}</td>
                                            <td>{{$solicitud->correoEmisor}}</td>
                                            @if(Auth::user()->tipoCuenta == 1){
                                                <td>{{$solicitud->correoDestinatario}}</td>
                                            @endif   
                                            <td>{{$solicitud->mensaje}}</td>   
                                            <td>{{$solicitud->fecha}}</td>                            
                                        </tr>
                                       @endforeach

                                </tbody>
                            </table>
        </div>  
</div>
</html>