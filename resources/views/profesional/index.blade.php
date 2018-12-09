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
                                Lista de alumnos de la Universidad
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-listarProfesional dataTable">
                                    <thead>
                                        <tr>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Celular</th>
                                            <th>Tipo Cuenta</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Celular</th>
                                            <th>Cargo</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($profesionales as $profesional)
                                        <tr>
                                            <td>{{$profesional->rut}}</td>
                                            <td>{{$profesional->nombre}}</td>
                                            <td>{{$profesional->apellidoPaterno}}</td>
                                            <td>{{$profesional->apellidoMaterno}}</td>
                                            <td>{{$profesional->direccion}}</td>
                                            <td>{{$profesional->correo}}</td>
                                            <td>{{$profesional->telefono}}</td>
                                            <td>{{$profesional->celular}}</td>
                                            <td>{{$profesional->cargo}}</td>
                                            @if ($profesional->correo != Auth::user()->correo)
                                            <td><a href="/profesionales/{{$profesional->idProfesional}}/edit" class="btn btn-default profesionalEdit">Editar</a></td>
                                            <td>{!!Form::open(['action' => ['ProfesionalesController@destroy',$profesional->idProfesional], 'method' => 'POST'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete',['class' => 'btn btn-danger profesionalDelete'])}}
                                                {!!Form::close()!!}
                                            </td>   
                                            @else   
                                                <td></td>
                                                <td></td>                                   
                                            @endif
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
    <script src="{{ asset('js/tablas/datatable-listarProfesional.js')}}"></script>
    <script src="{{ asset('js/dialog/profesionales.js')}}"></script>
@endsection