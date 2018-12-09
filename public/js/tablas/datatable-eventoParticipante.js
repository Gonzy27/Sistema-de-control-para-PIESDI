$(document).ready(function() {
	var tableEditAlumno;
	var tableEdit;
	var tableEditExterno;
	
	var tableAddAlumno;
	var tableAddProfesional;
	var tableAddExterno;		
	var events = $('#events');	
	
	
	
	$('#ModalEditEvento').on('shown.bs.modal', function() {
		var x = $('#ModalEditEvento #update');
		var getAlumno = 'tablas/participanteAlumno?id=' + x.attr('data-id');
		var getProfesional = 'tablas/participanteProfesional?id=' + x.attr('data-id');
		var getExterno = 'tablas/participanteExterno?id=' + x.attr('data-id');
		
		tableEditAlumno = $('#ModalEditEvento #editEventoAlumno').DataTable({
			"language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
			"ajax": {
				"processing": true,
                "serverSide": true,
				"url": getAlumno
			},
			 "columns": [
					{ "data": "nombres" },
					{ "data": "apellidos" },
					{ "data": "pivot.encargado",
					  "render": function (data,type,row,meta) {
									return (data == true) ? '<input type="checkbox" id="alumnoEditCheckbox'+ meta.row +'" name="alumnoEditCheckbox" checked="true"><label for="alumnoEditCheckbox'+ meta.row +'">Encargado</label><input type="hidden" name="alumnoEditId" id="alumnoEditId" value="'+ row.idAlumno +'" readonly>' : '<input type="checkbox" id="alumnoEditCheckbox'+ tableEditAlumno.row().index() +'" name="alumnoEditCheckbox"><label for="alumnoEditCheckbox'+ meta.row +'">Encargado</label><input type="hidden" name="alumnoEditId" id="alumnoEditId" value="'+ row.idAlumno +'" readonly>';
								}
					},
					{ "data": "idAlumno",
						  "render": function (data,type, row) {
									return '<button type="button" class="btn btn-danger" id="'+ data +'">Borrar!</button>';
								}				
					}
			]
		});
		
		//Elimina un alumno de la tabla de editar alumnos en un evento ya creado
		$('#editEventoAlumno tbody').on( 'click', 'button', function (e) {
			var x = $('#ModalEditEvento #update');
			var deleteAlumnoDeEvento= 'tablas/deleteAlumno';
			var alumno = this;
			csrfToken = document.getElementsByName("_token")[0].value;
			e.preventDefault()
			swal({
				title : "Atención",
				text : "¿Desea borrar este alumno de participar en el evento?",
				type : "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Si",
				cancelButtonText: "No",
				showLoaderOnConfirm: true,
			},
			function(isConfirm){
				if (isConfirm){ 
					$.ajax({
						url: deleteAlumnoDeEvento,
						type: 'POST',
						data: {data: alumno.id, idEvento: x.attr('data-id')},
						headers: {
						  "X-CSRF-TOKEN": csrfToken
						},
						success: function(){
							$.notify({
								// options
								message: 'Alumno eliminado correctamente',
							},{
								// settings
								type: 'success',
								offset: {
									y: 45
								},
								z_index: 3000,
								delay: 3000,
								placement: {
									from: "top",
									align: "center"
								}
							});
							tableEditAlumno.ajax.reload();
						},
						error: function(){
								$.notify({
								// options
								message: 'Un error ha ocurrido con la eliminación',
							},{
								// settings
								type: 'danger',
								offset: {
									y: 45
								},
								z_index: 3000,
								delay: 3000,
								placement: {
									from: "top",
									align: "center"
								}
							});
						}
					});
				};
			});
		});
		
		tableEdit = $('#ModalEditEvento #editEventoProfesional').DataTable({
			"language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
			"ajax": {
				"processing": true,
                "serverSide": true,
				"url": getProfesional
			},
			 "columns": [
					{ "data": "nombre" },
					{ "data": "apellidoPaterno" },
					{ "data": "apellidoMaterno" },
					{ "data": "pivot.encargado",
					  "render": function (data, type, row, meta) {
									return (data == true) ? '<input type="checkbox" id="profesionalEditCheckbox'+ meta.row +'" name="profesionalEditCheckbox" checked="true"><label for="profesionalEditCheckbox'+ meta.row+'">Encargado</label> <input type="hidden" name="profesionalEditId" id="profesionalEditId" value="'+ row.idProfesional+'" readonly>': '<input type="checkbox" id="profesionalEditCheckbox'+ meta.row +'" name="profesionalEditCheckbox"><label for="profesionalEditCheckbox'+ meta.row +'">Encargado</label><input type="hidden" name="profesionalEditId" id="profesionalEditId" value="'+ row.idProfesional+'" readonly>';
								}
					},
					{ "data": "idProfesional",
						  "render": function (data,type, row) {
									return '<button type="button" class="btn btn-danger" id="'+ data +'">Borrar!</button>';
								}				
					}
					
			]
		});
		
		//Elimina un profesional de la tabla de editar profesionales en un evento ya creado
		$('#editEventoProfesional tbody').on( 'click', 'button', function (e) {
			var x = $('#ModalEditEvento #update');
			var deleteProfesionalDeEvento= 'tablas/deleteProfesional';
			var profesional = this;
			csrfToken = document.getElementsByName("_token")[0].value;
			e.preventDefault()
			swal({
				title : "Atención",
				text : "¿Desea borrar este profesional de participar en el evento?",
				type : "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Si",
				cancelButtonText: "No",
				showLoaderOnConfirm: true,
			},
			function(isConfirm){
				if (isConfirm){ 
					$.ajax({
						url: deleteProfesionalDeEvento,
						type: 'POST',
						data: {data: profesional.id, idEvento: x.attr('data-id')},
						headers: {
						  "X-CSRF-TOKEN": csrfToken
						},
						success: function(){
								$.notify({
								// options
								message: 'Profesional eliminado correctamente',
							},{
								// settings
								type: 'success',
								offset: {
									y: 45
								},
								z_index: 3000,
								delay: 3000,
								placement: {
									from: "top",
									align: "center"
								}
							});
							tableEdit.ajax.reload();	
						},
						error: function(){
								$.notify({
								// options
								message: 'Un error ha ocurrido con la eliminación',
							},{
								// settings
								type: 'danger',
								offset: {
									y: 45
								},
								z_index: 3000,
								delay: 3000,
								placement: {
									from: "top",
									align: "center"
								}
							});
						}
					});
				};
			});
		});
		
		tableEditExterno = $('#ModalEditEvento #editEventoExterno').DataTable({
			"language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },			
			"ajax": {
				"processing": true,
                "serverSide": true,
				"url": getExterno
			},
			 "columns": [
					{ "data": "nombre" },
					{ "data": "apellidoPaterno" },
					{ "data": "apellidoMaterno" },
					{ "data": "pivot.encargado",
					  "render": function (data, type, row, meta) {
									return (data == true) ? '<input type="checkbox" id="externoEditCheckbox'+ meta.row +'" name="externoEditCheckbox" checked="true"><label for="externoEditCheckbox'+ meta.row +'">Encargado</label> <input type="hidden" name="participanteExternoEditId" id="participanteExternoEditId" value="'+ row.idParticipanteExterno +'" readonly>' : '<input type="checkbox" id="externoEditCheckbox'+ meta.row +'" name="externoEditCheckbox"><label for="externoEditCheckbox'+ meta.row +'">Encargado</label><input type="hidden" name="participanteExternoEditId" id="participanteExternoEditId" value="'+ row.idParticipanteExterno +'" readonly>';
								}
					},
					{ "data": "idParticipanteExterno",
						  "render": function (data,type, row) {
									return '<button type="button" class="btn btn-danger" id="'+ data +'">Borrar!</button>';
								}				
					}
			]
		});
		
		//Elimina un participante externo de la tabla de participantes externos en un evento ya creado
		$('#editEventoExterno tbody').on( 'click', 'button', function (e) {
			var x = $('#ModalEditEvento #update');
			var deleteExternoDeEvento= 'tablas/deleteExterno';
			var externo = this;
			csrfToken = document.getElementsByName("_token")[0].value;
			e.preventDefault()
			swal({
				title : "Atención",
				text : "¿Desea borrar este participante externo de participar en el evento?",
				type : "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Si",
				cancelButtonText: "No",
				showLoaderOnConfirm: true,
			},
			function(isConfirm){
				if (isConfirm){ 
					$.ajax({
						url: deleteExternoDeEvento,
						type: 'POST',
						data: {data: externo.id, idEvento: x.attr('data-id')},
						headers: {
						  "X-CSRF-TOKEN": csrfToken
						},
						success: function(){
							$.notify({
								// options
								message: 'Participante Externo eliminado correctamente',
							},{
								// settings
								type: 'success',
								offset: {
									y: 45
								},
								z_index: 3000,
								delay: 3000,
								placement: {
									from: "top",
									align: "center"
								}
							});
							tableEditExterno.ajax.reload();	
						},
						error: function(){
							$.notify({
								// options
								message: 'Un error ha ocurrido con la eliminación',
							},{
								// settings
								type: 'danger',
								offset: {
									y: 45
								},
								z_index: 3000,
								delay: 3000,
								placement: {
									from: "top",
									align: "center"
								}
							});
						}
					});
				};	
			});
		});

		//Fin función modal
	});	
	
	//Datatables para agregar nuevos participantes a un evento ya creado
	$('#ModalAddParticipante').on('shown.bs.modal', function() {
		var x = $('#ModalEditEvento #update');
		var getAlumno = 'tablas/getAlumno?id=' + x.attr('data-id');
		var getProfesional = 'tablas/getProfesional?id=' + x.attr('data-id');
		var getExterno = 'tablas/getExterno?id=' + x.attr('data-id');
		tableAddAlumno = $('#ModalAddParticipante #addtEventoAlumno').DataTable({
			"language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },			
			select: {
				style: 'multi'
			},
			
			dom: 'Blfrtip',
			buttons: [
				{
					text: 'Marcar Todos',
					action: function () {
						tableAddAlumno.rows().select();
					}
				},
				{
					text: 'Desmarcar',
					action: function () {
						tableAddAlumno.rows().deselect();
					}
				}
			],	
			"ajax": {
				"processing": true,
                "serverSide": true,
				"url": getAlumno
			},
			 "columns": [
					{ "data": "nombres" },
					{ "data": "apellidos" },
					{ "data": "idAlumno",
					  "render": function (data, type, row, meta) {
									return '<input type="checkbox" id="alumnoAddCheckbox'+ meta.row +'" name="alumnoAddCheckbox"><label for="alumnoAddCheckbox'+ meta.row +'">Encargado</label><input type="hidden" name="alumnoAddId" id="alumnoAddId" value="'+data+'" readonly>';
								}
					}
			]
		});
		
		tableAddProfesional = $('#ModalAddParticipante #addEventoProfesional').DataTable({
			"language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },			
			select: {
				style: 'multi'
			},
			
			dom: 'Blfrtip',
			buttons: [
				{
					text: 'Marcar Todos',
					action: function () {
						tableAddProfesional.rows().select();
					}
				},
				{
					text: 'Desmarcar',
					action: function () {
						tableAddProfesional.rows().deselect();
					}
				}
			],	
			"ajax": {
				"processing": true,
                "serverSide": true,
				"url": getProfesional
			},
			 "columns": [
					{ "data": "nombre" },
					{ "data": "apellidoPaterno" },
					{ "data": "apellidoMaterno" },
					{ "data": "idProfesional",
					  "render": function (data, type, row, meta) {
									return '<input type="checkbox" id="profesionalAddCheckbox'+ meta.row +'" name="profesionalAddCheckbox"><label for="profesionalAddCheckbox'+ meta.row +'">Encargado</label><input type="hidden" name="profesionalAddId" id="profesionalAddId" value="'+data+'" readonly>';
								}
					}
			]
		});
		
		tableAddExterno = $('#ModalAddParticipante #addEventoExterno').DataTable({
			"language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },			
			select: {
				style: 'multi'
			},
			
			dom: 'Blfrtip',
			buttons: [
				{
					text: 'Marcar Todos',
					action: function () {
						tableAddExterno.rows().select();
					}
				},
				{
					text: 'Desmarcar',
					action: function () {
						tableAddExterno.rows().deselect();
					}
				}
			],	
			"ajax": {
				"processing": true,
                "serverSide": true,
				"url": getExterno
			},
			 "columns": [
					{ "data": "nombre" },
					{ "data": "apellidoPaterno" },
					{ "data": "apellidoMaterno" },
					{ "data": "idParticipanteExterno",
					  "render": function (data, type, row, meta) {
									return '<input type="checkbox" id="participanteExternoAddCheckbox'+ meta.row +'" name="participanteExternoAddCheckbox"><label for="participanteExternoAddCheckbox'+ meta.row +'">Encargado</label><input type="hidden" name="participanteExternoAddId" id="participanteExternoAddId" value="'+data+'" readonly>';
								}
					}
			]
		});
		
	});
	
	//Se agregan los nuevos participantes seleccionados al evento
	$('#ModalAddParticipante #add').click( function (e) {
		var x = $('#ModalEditEvento #update');
		var addAlumno = 'tablas/addParticipante';
		var selectedRowAddInputs = $('.selected input');
		var selectedAddData = selectedRowAddInputs.serialize();
		console.log(selectedAddData);
        csrfToken = document.getElementsByName("_token")[0].value;
		e.preventDefault()
		swal({
            title : "Atención",
            text : "¿Desea agregar estos nuevos participantes al evento?",
            type : "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si",
            cancelButtonText: "No",
			showLoaderOnConfirm: true,
        },
		function(isConfirm){
			if (isConfirm){ 
				$.ajax({
					url: addAlumno,
					type: 'POST',
					data: {data: selectedAddData, idEvento: x.attr('data-id')},
					headers: {
					  "X-CSRF-TOKEN": csrfToken
					},
					success: function(){
						$.notify({
								// options
								message: 'Nuevos participantes agregados correctamente',
							},{
								// settings
								type: 'success',
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
						tableAddAlumno.rows().deselect();
						tableAddProfesional.rows().deselect();
						tableAddExterno.rows().deselect();
						tableAddAlumno.destroy();
						tableAddProfesional.destroy();
						tableAddExterno.destroy();
						tableEditAlumno.ajax.reload();
						tableEdit.ajax.reload();
						tableEditExterno.ajax.reload();
						
						$('#ModalAddParticipante').modal('hide');	
					},
					error: function(){
						$.notify({
								// options
								message: 'Un error ha ocurrido al agregar los participantes,posiblemente no seleccionó ningún participante nuevo',
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
						tableAddAlumno.rows().deselect();
						tableAddProfesional.rows().deselect();
						tableAddExterno.rows().deselect();
						$('#ModalAddParticipante').modal('hide');	
					}
				});
			}; 
		});
		//console.log($('#ModalAddEvento #profesionales').val().toArray);
    } );
	
	//Destruye los Datatable de editar Evento cuando se cierra el modal
	$('#ModalEditEvento').on('hidden.bs.modal', function() {
		$(this).find('.nav-tabs a:first').tab('show');
		tableEditAlumno.destroy();
		tableEdit.destroy();
		tableEditExterno.destroy();
		
	});
	
	//Destruye los Datatable de agregar participantes al editar un Evento cuando se cierra el modal
	$('#ModalAddParticipante').on('hidden.bs.modal', function() {
		$(this).find('.nav-tabs a:first').tab('show');
		tableAddAlumno.destroy();
		tableAddProfesional.destroy();
		tableAddExterno.destroy();
		
	});
	
	 //Actualiza evento
    $('#ModalEditEvento #update').on('click', function(e){
		
		
        var x = $(this);
        var update_url = x.attr('data-href') + '/' + x.attr('data-id');
        var nombre = $('#ModalEditEvento #nombre').val();
        var tipo = $('#ModalEditEvento #tipo').val();
        var lugar = $('#ModalEditEvento #lugar').val();
        var descripcion = $('#ModalEditEvento #descripcion').val();
        var horaInicio = $('#ModalEditEvento #horaInicio').val();
        var horaFin = $('#ModalEditEvento #horaFin').val();
        var alumnos = tableEditAlumno.$('input, select').serialize();
        var profesionales = tableEdit.$('input, select').serialize();
        var externos = tableEditExterno.$('input, select').serialize();
		var color = $('#ModalEditEvento #togglePaletteEdit').val();
        //+$('#ModalEditEvento #nombre').val()
        csrfToken = document.getElementsByName("_token")[0].value;
		e.preventDefault()
		swal({
            title : "Atención",
            text : "¿Confirma la edición de este nuevo evento?",
            type : "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si",
            cancelButtonText: "No",
			showLoaderOnConfirm: true,
        },
		function(isConfirm){
			if (isConfirm){ 
				$.ajax({
					url: update_url,
					data: {nombre: nombre, tipo: tipo, lugar: lugar, descripcion: descripcion, horaInicio: horaInicio, horaFin: horaFin, alumnos: alumnos, profesionales: profesionales, externos: externos, color: color},
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
						$('#ModalEditEvento').modal('hide');	
						$('#calendar').fullCalendar( 'refetchEvents' );
					},
					error: function(data){
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
	
	$('#openBtn').click(function(){
		$('#myModal').modal({show:true})
	});
} );
