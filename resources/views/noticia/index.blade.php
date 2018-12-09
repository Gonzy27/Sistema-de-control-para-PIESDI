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
                                Lista de noticias enviadas
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-listarNoticia dataTable">
                                    <thead>
                                        <tr>
                                            <th>Asunto</th>
                                            <th>Para</th>
                                            <th>Introducción</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Nombre Evento</th>
                                            <th>Tipo</th>
                                            <th>Lugar</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Final</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Asunto</th>
                                            <th>Para</th>
                                            <th>Introducción</th>
                                            <th>Descripción</th>
                                            <th>Nombre Evento</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Lugar</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Final</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($noticias as $noticia)
                                        <tr>
                                            <td>{{$noticia->asunto}}</td>
                                            <td>{{$noticia->para}}</td>
                                            <td>{{$noticia->introduccion}}</td>
                                            <td>{{$noticia->descripcion}}</td>
                                            <td>{{\Carbon\Carbon::parse($noticia->fecha)->format('d/m/Y h:i')}}</td>
                                            <td>{{$noticia->evento()->first()->nombre}}</td>
                                            <td>{{$noticia->evento()->first()->tipo}}</td>
                                            <td>{{$noticia->evento()->first()->lugar}}</td>
                                            <td>{{\Carbon\Carbon::parse($noticia->evento()->first()->horaInicio)->format('d/m/Y h:i')}}</td>
                                            <td>{{\Carbon\Carbon::parse($noticia->evento()->first()->horaFin)->format('d/m/Y h:i')}}</td>
                                            <td>{!!Form::open(['action' => ['NoticiaController@destroy',$noticia->idNoticia], 'method' => 'POST'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Eliminar',['class' => 'btn btn-danger deleteNoticia'])}}
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

@section('page-script')
<script>
    $(document).ready(function () {
        $(".deleteNoticia").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Desea borrar este registro de noticia?",
                  type : "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si",
                  cancelButtonText: "No",
             },
          function(isConfirm){
            if (isConfirm) form.submit();
          });
        });
    });
</script>
@endsection

@section('script')
    <script src="{{ asset('js/tablas/datatable-listarNoticia.js')}}"></script>
@endsection