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
                                Lista de participantes externos al programa
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-listarParticipanteExterno dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Descripción</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Descripción</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($participantesExterno as $participanteExterno)
                                        <tr>
                                            <td>{{$participanteExterno->nombre}}</td>
                                            <td>{{$participanteExterno->apellidoPaterno}}</td>
                                            <td>{{$participanteExterno->apellidoMaterno}}</td>
                                            <td>{{$participanteExterno->direccion}}</td>
                                            <td>{{$participanteExterno->correo}}</td>
                                            <td>{{$participanteExterno->telefono}}</td>
                                            <td>{{$participanteExterno->descripcion}}</td>
                                            <td><a href="/externos/{{$participanteExterno->idParticipanteExterno}}/edit" class="btn btn-default externoEdit">Editar</a></td>
                                            <td>{!!Form::open(['action' => ['ParticipanteExternoController@destroy',$participanteExterno->idParticipanteExterno], 'method' => 'POST'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete',['class' => 'btn btn-danger externoDelete'])}}
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
    <script src="{{ asset('js/tablas/datatable-listarParticipanteExterno.js')}}"></script>
    <script src="{{ asset('js/dialog/externos.js')}}"></script>
@endsection