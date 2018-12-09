@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid">
             
               <!-- Agregar Evento -->
            <div class="row clearfix">

			
			<div class="modal fade" id="ModalAddEvento" tabindex="-1" role="dialog" data-backdrop='static'>
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="defaultModalLabel">Registrar Evento</h4>
							</div>
                             {!! Form::open(['action' => 'EventosController@store','method' => 'POST', 'role' => 'form', 'id' => 'formAddEvento'])!!}
							<div class="modal-body">
                                {{Form::label('horaInicio','Hora de Inicio')}}   
								<div class="form-group">
                                    <div class="form-line">
                                        {{Form::text('horaInicio',' ',['id' => 'horaInicio', 'class' => "form-control",'readonly'])}}
                                    </div>
                                </div>
                                    {{Form::label('horaFin','Hora de Fin', ['class' => "form-label"])}}   
									<div class="form-group">
                                    <div class="form-line">
                                        {{Form::text('horaFin',' ',['id' => 'horaFin', 'class' => "form-control",'readonly'])}}
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombre','',['id'=> 'nombre', 'class' => "form-control"])}}
                                        {{Form::label('nombre','Nombre del Evento', ['class' => "form-label"])}}   
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('tipo','',['id'=> 'tipo', 'class' => "form-control"])}}
                                        {{Form::label('tipo','Tipo de Evento', ['class' => "form-label"])}}   
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('lugar','',['id'=> 'lugar', 'class' => "form-control"])}}
                                        {{Form::label('lugar','Lugar', ['class' => "form-label"])}}   
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::textarea('descripcion','',['id'=> 'descripcion', 'class' => "form-control"])}}
                                        {{Form::label('descripcion','Descripcion', ['class' => "form-label"])}}   
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                        <h5>Color</h5>
                                        {{Form::text('color','',['id'=> 'togglePalette',])}}        
                                </div>
                                

                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Menú de participantes
                                       </h2>
                            
                                    </div>
                                     <div class="body">
                                    
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#alumnos" data-toggle="tab">
                                                    <i class="material-icons">home</i> Alumnos
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#profesionales" data-toggle="tab">
                                                    <i class="material-icons">face</i> Profesionales
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#participantesExterno" data-toggle="tab">
                                                    <i class="material-icons">email</i> Externos
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="alumnos">
                                            
                                                <div class="form-group form-float">
                                                    <h4>Agregar asistentes alumnos</h4>
                                                </div>
                                                
                                                <!--Tabla Alumnos-->
                                                <div class="table-responsive">
                                                    <table id='eventoAlumno' class="table table-bordered table-striped table-hover js-eventoAlumno dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Apellidos</th>
                                                                <th>Responsable</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Apellidos</th>
                                                                <th>Responsable</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @foreach ($alumnos as $alumno)
                                                            <tr>
                                                                <td>{{$alumno->idAlumno}}</td>
                                                                <td>{{$alumno->nombres}}</td>
                                                                <td>{{$alumno->apellidos}}</td>
                                                                <td> 
                                                                        <input type="checkbox" id="alumnoCheckbox{{$loop->index}}" name="alumnoCheckbox">
                                                                        <label for="alumnoCheckbox{{$loop->index}}">Encargado</label>
                                                                        <input type="hidden" name="alumnoId" id="alumnoId" value="{{$alumno->idAlumno}}" readonly>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>    

                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="profesionales">                                      
                                                <div class="form-group form-float">
                                                    <h4>Agregar asistentes profesionales</h4>
                                                </div>
                                                
                                                <!--Tabla Profesional-->
                                                <div class="table-responsive">
                                                    <table id='eventoProfesional' class="table table-bordered table-striped table-hover js-eventoProfesional dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Apellido Paterno</th>
                                                                <th>Apellido Materno</th>
                                                                <th>Responsable</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Apellido Paterno</th>
                                                                <th>Apellido Materno</th>
                                                                <th>Responsable</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @foreach ($profesionales as $profesional)
                                                            <tr>
                                                                <td>{{$profesional->idProfesional}}</td>
                                                                <td>{{$profesional->nombre}}</td>
                                                                <td>{{$profesional->apellidoPaterno}}</td>
                                                                <td>{{$profesional->apellidoMaterno}}</td>
                                                                <td>                                                   
                                                                        <input type="checkbox" id="profesionalCheckbox{{$loop->index}}" name="profesionalCheckbox">
                                                                        <label for="profesionalCheckbox{{$loop->index}}">Encargado</label>     
                                                                        <input type="hidden" name="profesionalId" id="profesionalId" value="{{$profesional->idProfesional}}" readonly>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>      
                                                </div>

                                            </div>


                                            <div role="tabpanel" class="tab-pane fade" id="participantesExterno">
                                                
                                                <div class="form-group form-float">
                                                    <h4>Agregar asistentes externos al programa</h4>
                                                </div>
                                                <!--Tabla Participantes Externos-->
                                                <div class="table-responsive">
                                                    <table id='eventoExterno' class="table table-bordered table-striped table-hover js-eventoExterno dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellido Paterno</th>
                                                                <th>Apellido Materno</th>
                                                                <th>Responsable</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellido Paterno</th>
                                                                <th>Apellido Materno</th>
                                                                <th>Responsable</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @foreach ($participantesExterno as $participanteExterno)
                                                            <tr>
                                                                <td>{{$participanteExterno->nombre}}</td>
                                                                <td>{{$participanteExterno->apellidoPaterno}}</td>
                                                                <td>{{$participanteExterno->apellidoMaterno}}</td>
                                                                <td>                                                   
                                                                        <input type="checkbox" id="participanteExternoCheckbox{{$loop->index}}" name="participanteExternoCheckbox">
                                                                        <label for="participanteExternoCheckbox{{$loop->index}}">Encargado</label>     
                                                                        <input type="hidden" name="participanteExternoId" id="participanteExternoId" value="{{$participanteExterno->idParticipanteExterno}}" readonly>
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

                                <!--Variable en donde se gurdan los participantes agregados en las tablas-->
                                {{ Form::hidden('profesionales', '', ['id' => 'profesionales'])}}
                                
							</div>
							<div class="modal-footer">
                                <a id="guardar" data-href="{{ url('eventos')}}" data-id="" class="btn btn-link waves-effect eventoSave">Guardar</a>
                                <button type="button" id="cerrar" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
							</div>
                            {!! Form::close() !!}
						</div>
					</div>
				</div>
			



            <!-- Editar Evento -->
			<div class="modal fade" id="ModalEditEvento" tabindex="-1" role="dialog" data-backdrop='static'>
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="defaultModalLabel">Registrar Evento</h4>
							</div>
                            {!! Form::open(['action' => ['AlumnosController@store'],'method' => 'POST', 'role' => 'form', 'id' =>'form-calendario'])!!}
							<div class="modal-body">
								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('horaInicio',' ',['id' => 'horaInicio', 'class' => "form-control",'readonly'])}}
                                        {{Form::label('horaInicio','Hora de Inicio', ['class' => "form-label"])}}   
                                    </div>
                                </div>

									<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('horaFin',' ',['id' => 'horaFin', 'class' => "form-control",'readonly'])}}
                                        {{Form::label('horaFin','Hora de Fin', ['class' => "form-label"])}}   
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('nombre',' ',['id' => 'nombre', 'class' => "form-control"])}}
                                        {{Form::label('nombre','Nombre del Evento', ['class' => "form-label"])}}   
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('tipo',' ',['id' => 'tipo', 'class' => "form-control"])}}
                                        {{Form::label('tipo','Tipo de Evento', ['class' => "form-label"])}}   
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('lugar',' ',['id' => 'lugar', 'class' => "form-control"])}}
                                        {{Form::label('lugar','Lugar', ['class' => "form-label"])}}   
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::textarea('descripcion',' ',['id' => 'descripcion', 'class' => "form-control"])}}
                                        {{Form::label('descripcion','Descripcion', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                        <h5>Color</h5>
                                        {{Form::text('color','',['id'=> 'togglePaletteEdit',])}}        
                                </div>


                                <a href="javascript:void(0);" id="enlaceAddParticipante" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#ModalAddParticipante">+ Agregar más participantes</A>
                                <br></br>
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            Menú de participantes
                                       </h2>
                            
                                    </div>
                                     <div class="body">
                                    
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#editAlumnos" data-toggle="tab">
                                                    <i class="material-icons">home</i> Alumnos
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#editProfesionales" data-toggle="tab">
                                                    <i class="material-icons">face</i> Profesionales
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#editParticipantesExterno" data-toggle="tab">
                                                    <i class="material-icons">email</i> Externos
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="editAlumnos">
                                            
                                                <div class="form-group form-float">
                                                    <h4>Agregar asistentes alumnos</h4>
                                                </div>
                                                
                                                <!--Tabla Alumnos-->
                                                <div class="table-responsive">
                                                    <table id='editEventoAlumno' class="table table-bordered table-striped table-hover js-eventoAlumno dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellidos</th>
                                                                <th>Responsable</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellidos</th>
                                                                <th>Responsable</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </tfoot>
                                                    
                                                    </table>
                                                </div>    

                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="editProfesionales">                                      
                                                <div class="form-group form-float">
                                                    <h4>Agregar asistentes profesionales</h4>
                                                </div>
                                                
                                                <!--Tabla Profesional-->
                                                <div class="table-responsive">
                                                    <table id='editEventoProfesional' class="table table-bordered table-striped table-hover js-eventoProfesional dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellido Paterno</th>
                                                                <th>Apellido Materno</th>
                                                                <th>Responsable</th>
                                                                 <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellido Paterno</th>
                                                                <th>Apellido Materno</th>
                                                                <th>Responsable</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>      
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="editParticipantesExterno">
                                                
                                                <div class="form-group form-float">
                                                    <h4>Agregar asistentes externos al programa</h4>
                                                </div>
                                                <!--Tabla Participantes Externos-->
                                                <div class="table-responsive">
                                                    <table id='editEventoExterno' class="table table-bordered table-striped table-hover js-eventoExterno dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellido Paterno</th>
                                                                <th>Apellido Materno</th>
                                                                <th>Responsable</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Apellido Paterno</th>
                                                                <th>Apellido Materno</th>
                                                                <th>Responsable</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>      
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" id="enlaceEnviarInvitacion" data-toggle="modal" data-target="#enviarInvitacion" class="btn btn-success waves-effect">Enviar invitaciones</A>
                                <a href="javascript:void(0);" id="enlaceEnviarNoticia" data-toggle="modal" data-target="#enviarNoticia" class="btn btn-primary waves-effect">Enviar Noticia</A>
							</div>
                            
                            
                            {{ Form::hidden('alumnos', '', ['id' => 'alumnos'])}}
                            {{ Form::hidden('profesionales', '', ['id' => 'profesionales'])}}
                            {{ Form::hidden('externos', '', ['id' => 'externos'])}}

							<div class="modal-footer">
                                <a id="delete" data-href="{{ url('eventos')}}" data-id="" class="btn btn-link waves-effect">Eliminar</a>
                                <a id="update" data-href="{{ url('eventos')}}" data-id="" class="btn btn-link waves-effect">Actualizar</a>
								<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
							</div>
                            {!! Form::close() !!}
						</div>
					</div>
				</div>

            <!--Modal Agregar participante -->
            <div class="modal fade" id="ModalAddParticipante" tabindex="-1" role="dialog" data-backdrop='static'>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="defaultModalLabel">Registrar Evento</h4>
                                </div>
                                 {!! Form::open(['action' => ['AlumnosController@store'],'method' => 'POST', 'role' => 'form', 'id' =>'form-calendario'])!!}
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Agregar Participantes
                                        </h2>
                                
                                        </div>
                                        <div class="body">
                                        
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active">
                                                    <a href="#addAlumnos" data-toggle="tab">
                                                        <i class="material-icons">home</i> Alumnos
                                                    </a>
                                                </li>
                                                <li role="presentation">
                                                    <a href="#addProfesionales" data-toggle="tab">
                                                        <i class="material-icons">face</i> Profesionales
                                                    </a>
                                                </li>
                                                <li role="presentation">
                                                    <a href="#addExternos" data-toggle="tab">
                                                        <i class="material-icons">email</i> Externos
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="addAlumnos">
                                                
                                                    <div class="form-group form-float">
                                                        <h4>Agregar asistentes alumnos</h4>
                                                    </div>
                                                    
                                                    <!--Tabla Alumnos-->
                                                    <div class="table-responsive">
                                                        <table id='addtEventoAlumno' class="table table-bordered table-striped table-hover js-eventoAlumno dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Apellidos</th>
                                                                    <th>Responsable</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Apellidos</th>
                                                                    <th>Responsable</th>
                                                                </tr>
                                                            </tfoot>
                                                        
                                                        </table>
                                                    </div>    

                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="addProfesionales">                                      
                                                    <div class="form-group form-float">
                                                        <h4>Agregar asistentes profesionales</h4>
                                                    </div>
                                                    
                                                    <!--Tabla Profesional-->
                                                    <div class="table-responsive">
                                                        <table id='addEventoProfesional' class="table table-bordered table-striped table-hover js-eventoProfesional dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Apellido Paterno</th>
                                                                    <th>Apellido Materno</th>
                                                                    <th>Responsable</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Apellido Paterno</th>
                                                                    <th>Apellido Materno</th>
                                                                    <th>Responsable</th>
                                                                </tr>
                                                            </tfoot>                                                
                                                        </table>      
                                                    </div>

                                                </div>


                                                <div role="tabpanel" class="tab-pane fade" id="addExternos">
                                                    
                                                    <div class="form-group form-float">
                                                        <h4>Agregar asistentes externos al programa</h4>
                                                    </div>
                                                    <!--Tabla Participantes Externos-->
                                                    <div class="table-responsive">
                                                        <table id='addEventoExterno' class="table table-bordered table-striped table-hover js-eventoExterno dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Apellido Paterno</th>
                                                                    <th>Apellido Materno</th>
                                                                    <th>Responsable</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Apellido Paterno</th>
                                                                    <th>Apellido Materno</th>
                                                                    <th>Responsable</th>
                                                                </tr>
                                                            </tfoot>                                                      
                                                        </table>      
                                                    </div>  
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a id="add" data-id="" class="btn btn-link waves-effect">Agregar</a>
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>


        <!--Modal Enviar invitaciones-->
		<div class="modal fade" id="enviarInvitacion" tabindex="-1" role="dialog" data-backdrop='static'>
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="defaultModalLabel">Enviar invitaciones</h4>
							</div>
                             {!! Form::open(['action' => ['AlumnosController@store'],'method' => 'POST', 'role' => 'form', 'id' =>'form-invitacion'])!!}
							<div class="modal-body">
								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('asunto','',['id' => 'asunto', 'class' => "form-control"])}}
                                        {{Form::label('asunto','Asunto', ['class' => "form-label"])}}   
                                    </div>
                                </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::textarea('mensaje','',['id' => 'mensaje', 'class' => "form-control"])}}
                                        {{Form::label('mensaje','Mensaje', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    {{Form::file('imagen',['id' => 'imagen'])}}
                                </div>

							</div>
							<div class="modal-footer">
                                <a id="enviar" data-href="{{ url('invitaciones')}}" data-id="" class="btn btn-link waves-effect">Enviar</a>
								<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
							</div>
                            {!! Form::close() !!}
						</div>
					</div>
                </div>



               <!--Modal Enviar noticia-->
		        <div class="modal fade" id="enviarNoticia" tabindex="-1" role="dialog" data-backdrop='static'>
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="defaultModalLabel">Enviar noticia</h4>
							</div>
                             {!! Form::open(['action' => ['AlumnosController@store'],'method' => 'POST', 'role' => 'form', 'id' =>'form-noticia'])!!}
							<div class="modal-body">
								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('asunto','',['id' => 'asunto', 'class' => "form-control"])}}
                                        {{Form::label('asunto','Asunto', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::text('destinatario','',['id' => 'asunto', 'class' => "form-control"])}}
                                        {{Form::label('destinatario','Para', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                        <div class="form-line">
                                            {{Form::text('introduccion','',['id' => 'introduccion', 'class' => "form-control"])}}
                                            {{Form::label('introduccion','Introduccion', ['class' => "form-label"])}}   
                                        </div>
                                    </div>

								<div class="form-group form-float">
                                    <div class="form-line">
                                        {{Form::textarea('mensaje','',['id' => 'mensaje', 'class' => "form-control"])}}
                                        {{Form::label('mensaje','Mensaje', ['class' => "form-label"])}}   
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    {{Form::file('imagen[]',['id' => 'imagen','multiple'])}}
                                </div>

							</div>
							<div class="modal-footer">
                                <a id="enviarNoticia" data-href="{{ url('noticias')}}" data-id="" class="btn btn-link waves-effect">Enviar</a>
								<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
							</div>
                            {!! Form::close() !!}
						</div>
					</div>
                </div>

                <div id="calendar" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   
                </div>
            </div>

        </div>


    </section>

@endsection

@section('page-script')
<script>
	$(document).ready(function() {

        $("#togglePalette").spectrum({
            showPalette: true,
            color: '#000',
            palette: [
                ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
            ]
        });

		var BASEURL = '{{ url('/') }}';
		$('#calendar').fullCalendar({
			lang: 'es',
			header: {
				left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            views: {
                month: {// name of view
                    selectable: false,
                    // other view-specific options here
                }
            },
           // themeSystem:'bootstrap3',     
			navLinks: true, // can click day/week names to navigate views
			editable: true,
		    eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            displayEventEnd: true,
			eventLimit: true, // allow "more" link when too many events
			events: BASEURL + '/eventos',
			select: function (start, end) {

                $('#ModalAddEvento #horaInicio').val(moment(start).format('DD-MM-YYYY HH:mm:ss'));
                $('#ModalAddEvento #horaFin').val(moment(end).format('DD-MM-YYYY HH:mm:ss'));
                $('#ModalAddEvento').modal('show');
            },

            //Seleccionar un evento
			eventClick: function (event, jsEvent, view){
                $('#ModalEditEvento #delete').attr('data-id', event.idEvento);
                $('#ModalEditEvento #update').attr('data-id', event.idEvento);
			 	$('#ModalEditEvento #horaInicio').val(event.start.format('DD-MM-YYYY HH:mm:ss'));
                $('#ModalEditEvento #horaFin').val(event.end.format('DD-MM-YYYY HH:mm:ss'));
                $('#ModalEditEvento #nombre').val(event.title);
                $('#ModalEditEvento #tipo').val(event.tipo);
                $('#ModalEditEvento #lugar').val(event.lugar);
                $("#ModalEditEvento #togglePaletteEdit").spectrum({
                    showPalette: true,
                    color: event.color,
                    palette: [
                        ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                        ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                        ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                        ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                        ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                        ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                        ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                        ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
                    ]
                });
				$('#ModalEditEvento #descripcion').val(event.descripcion);
                $('#ModalEditEvento').modal('show');	
			},
            //Cambiar horas ajustando los bloques de eventos
             eventResize: function(event) {
                var update_url = "{{ url('eventos')}}" + '/' + event.idEvento;
                var horaInicio = event.start.format("YYYY-MM-DD HH:mm");
                var horaFin = event.end.format("YYYY-MM-DD HH:mm");
                csrfToken = document.getElementsByName("_token")[0].value;
                $.ajax({
                    url: update_url,
                    data: {horaInicio: horaInicio, horaFin: horaFin},
                    type: 'PUT',
                    headers: {
                    "X-CSRF-TOKEN": csrfToken
                    },
                    success: function(){
                        $.notify({
                            // options
                            message: 'Evento actualizado correctamente',
                        },{
                            // settings
                            type: 'success',
                            offset: {
                                y: 75
                            },
                            z_index: 2000,
                            delay: 3000,
                            placement: {
                                from: "top",
                                align: "center"
                            }
                        });		
                        $('#calendar').fullCalendar( 'refetchEvents' );
                    },
                    error: function(){
                        $.notify({
                            // options
                            message: 'Ocurrió un error durante la actualización',
                        },{
                            // settings
                            type: 'danger',
                            offset: {
                                y: 75
                            },
                            z_index: 2000,
                            delay: 3000,
                            placement: {
                                from: "top",
                                align: "center"
                            }
                        });		
                        $('#calendar').fullCalendar( 'refetchEvents' );
                    }
                });
            },

            //Soltar Evento
             eventDrop: function(event, delta) {
                var update_url = "{{ url('eventos')}}" + '/' + event.idEvento;
                var horaInicio = event.start.format("YYYY-MM-DD HH:mm");
                if(event.end){
                    var horaFin = event.end.format("YYYY-MM-DD HH:mm");
                }else{
                    var end="NULL";
                }
                crsfToken = document.getElementsByName("_token")[0].value;
                $.ajax({  
                    url: update_url,
                    data: {horaInicio: horaInicio, horaFin: horaFin},
                    type: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": crsfToken
                    },
                    success: function(){
                        $.notify({
                            // options
                            message: 'Evento actualizado correctamente',
                        },{
                            // settings
                            type: 'success',
                            offset: {
                                y: 75
                            },
                            z_index: 2000,
                            delay: 3000,
                            placement: {
                                from: "top",
                                align: "center"
                            }
                        });	
                        $('#calendar').fullCalendar( 'refetchEvents' );
                    },
                    error: function(){
                        $.notify({
                            // options
                            message: 'Ocurrió un error durante la actualización',
                        },{
                            // settings
                            type: 'danger',
                            offset: {
                                y: 75
                            },
                            z_index: 2000,
                            delay: 3000,
                            placement: {
                                from: "top",
                                align: "center"
                            }
                        });
                         $('#calendar').fullCalendar( 'refetchEvents' );
                    }
                });
            },
		});	

         $('.js-basic-example').DataTable({
            responsive: true
        });
    });

    //Función que elimina un evento
    $('#ModalEditEvento #delete').on('click', function(){
        var x = $(this);
        var delete_url = x.attr('data-href') + '/' + x.attr('data-id');
        csrfToken = document.getElementsByName("_token")[0].value;
        $.ajax({
            url: delete_url,
            type: 'DELETE',
             headers: {
              "X-CSRF-TOKEN": csrfToken
            },
            success: function(){
                $.notify({
                    // options
                    message: 'Evento eliminado correctamente',
                },{
                    // settings
                    type: 'success',
                    offset: {
                        y: 75
                    },
                    z_index: 2000,
                    delay: 3000,
                    placement: {
                        from: "top",
                        align: "center"
                    }
                });
                $('#ModalEditEvento').modal('hide');	
                $('#calendar').fullCalendar( 'refetchEvents' );
            },
            error: function(){
                $.notify({
                    // options
                    message: 'Ocurrió uun error durante la eliminación del evento',
                },{
                    // settings
                    type: 'danger',
                    offset: {
                        y: 75
                    },
                    z_index: 2000,
                    delay: 3000,
                    placement: {
                        from: "top",
                        align: "center"
                    }
                });
                 $('#ModalEditEvento').modal('hide');	
            }
        });
    });

    $('.modal').on('hidden.bs.modal', function (e) {
      if($('.modal').hasClass('in')) {
        $('body').addClass('modal-open');
      }    
    });

    //Envia invitaciones
    $('#enviarInvitacion #enviar').on('click', function(e){
        var x = $('#ModalEditEvento #update');
        var invitacion = 'invitaciones';
        csrfToken = document.getElementsByName("_token")[0].value;
        var fd = new FormData(document.getElementById("form-invitacion"));
        fd.append("idEvento", x.attr('data-id'));
        e.preventDefault()
		swal({
            title : "Atención",
            text : "¿Desea enviar esta invitación a los participantes de este evento?",
            type : "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si",
            cancelButtonText: "No",
            showLoaderOnConfirm: true,
            closeOnConfirm: false,
        },
        function(isConfirm){
			if (isConfirm){ 
                $.ajax({
                    url: invitacion,
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    headers: {
                    "X-CSRF-TOKEN": csrfToken
                    },
                    success: function(){
                        swal.close();
                        $.notify({
                            // options
                            message: 'Invitaciones enviadas correctamente',
                        },{
                            // settings
                            type: 'success',
                            offset: {
                                y: 75
                            },
                            z_index: 2000,
                            delay: 3000,
                            placement: {
                                from: "top",
                                align: "center"
                            }
                        });
                        $('#enviarInvitacion').modal('hide');	
                        $('#calendar').fullCalendar( 'refetchEvents' );
                    },
                    error: function(data){
                        swal.close();
                        var errors = data.responseJSON;
                        console.log(errors);
                        $.each( errors, function( key, value ) {
                            $.notify({
                                // options
                                message: value[0],
                            },{
                                // settings
                                type: 'danger',
                                offset: {
                                    y: 45
                                },
                                z_index: 2000,
                                delay: 3000,
                                placement: {
                                    from: "top",
                                    align: "center"
                                }
                            });
                        });	
                    }
                });
            };
        });
    });  

    //resetea el formulario al cerrar el modal que envía invitaciones
    $('#enviarInvitacion').on('hidden.bs.modal', function() {
		document.getElementById("form-invitacion").reset();
		$('#form-invitacion')
		.find("input,textarea,select")
		   .focusout()
		   .end();
    });
    
    //Toma información del evento seleccionado
    $('#enviarNoticia').on('shown.bs.modal', function() {
        var horaInicio = $('#ModalEditEvento #horaInicio').val();
        var horaFin = $('#ModalEditEvento #horaFin').val();
        var nombre = $('#ModalEditEvento #nombre').val();
		var tipo = $('#ModalEditEvento #tipo').val();
		var lugar = $('#ModalEditEvento #lugar').val();
        var descripcion = $('#ModalEditEvento #descripcion').val();
        var datos = horaInicio + '\n' + horaFin + '\n' + nombre + '\n' + tipo + '\n' + lugar + '\n' + descripcion;
        $('#form-noticia #mensaje').val(datos);
        
	});

    //Envia noticias
    $('#enviarNoticia #enviarNoticia').on('click', function(e){
        var x = $('#ModalEditEvento #update');
        var noticia = 'noticias';
        csrfToken = document.getElementsByName("_token")[0].value;
        var fd = new FormData(document.getElementById("form-noticia"));
        fd.append("idEvento", x.attr('data-id'));
        e.preventDefault()
		swal({
            title : "Atención",
            text : "¿Desea enviar esta noticia del evento?",
            type : "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si",
            cancelButtonText: "No",
            showLoaderOnConfirm: true,
            closeOnConfirm: false,
        },
        function(isConfirm){
			if (isConfirm){ 
                $.ajax({
                    url: noticia,
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    headers: {
                    "X-CSRF-TOKEN": csrfToken
                    },
                    success: function(){
                        swal.close();
                        $.notify({
                            // options
                            message: 'Notica enviada correctamente',
                        },{
                            // settings
                            type: 'success',
                            offset: {
                                y: 75
                            },
                            z_index: 2000,
                            delay: 3000,
                            placement: {
                                from: "top",
                                align: "center"
                            }
                        });
                        $('#enviarNoticia').modal('hide');	
                        $('#calendar').fullCalendar( 'refetchEvents' );
                    },
                    error: function(data){
                        swal.close();
                        var errors = data.responseJSON;
                        console.log(errors);
                        $.each( errors, function( key, value ) {
                            $.notify({
                                // options
                                message: value[0],
                            },{
                                // settings
                                type: 'danger',
                                offset: {
                                    y: 45
                                },
                                z_index: 2000,
                                delay: 3000,
                                placement: {
                                    from: "top",
                                    align: "center"
                                }
                            });
                        });	
                    }
                });
            };
        });
    });  

    //resetea el formulario al cerrar el modal que envía noticias
    $('#enviarNoticia').on('hidden.bs.modal', function() {
		document.getElementById("form-noticia").reset();
		$('#form-noticia')
		.find("input,textarea,select")
		   .focusout()
		   .end();
    });
    
	
	$('#openBtn').click(function(){
		$('#myModal').modal({show:true})
	});
</script>

<style>
.fc-today {
    background: #fcf8e3 !important;
    border: none !important;
    border-top: 2px solid #ddd !important;
    font-weight: bold;
} 

.fc-event {
    border-width: 2px;
}

.fc td, .fc th{
    background:#ffffff9c;
}

.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto;
}
</style>
@endsection

@section('script')
    <script src="{{ asset('js/tablas/datatable-eventoGestion.js')}}"></script>
    <script src="{{ asset('js/tablas/datatable-eventoParticipante.js')}}"></script>
    <script src="{{ asset('js/advanced-form-elements.js')}}"></script>
@endsection