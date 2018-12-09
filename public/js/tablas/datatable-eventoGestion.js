$(document).ready(function() {
	var events = $('#events');	
	var tableAlumno = $('#eventoAlumno').DataTable({
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
		"columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false,
            },
		],
		
		dom: 'Blfrtip',
        buttons: [
            {
                text: 'Marcar Todos',
                action: function () {
                    tableAlumno.rows().select();
                }
            },
            {
                text: 'Desmarcar',
                action: function () {
                    tableAlumno.rows().deselect();
                }
            }
        ]
	});
	
	 var table = $('#ModalAddEvento #eventoProfesional').DataTable({
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
		"columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false,
            },
		],
		
		dom: 'Blfrtip',
        buttons: [
            {
                text: 'Marcar Todos',
                action: function () {
                    table.rows().select();
                }
            },
            {
                text: 'Desmarcar',
                action: function () {
                    table.rows().deselect();
                }
            }
        ]
	});
	
	
	var tableExterno = $('#eventoExterno').DataTable({
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
                    tableExterno.rows().select();
                }
            },
            {
                text: 'Desmarcar',
                action: function () {
                    tableExterno.rows().deselect();
                }
            }
        ]
	});
	
	$('#ModalAddEvento #ver').click( function () {

		 var selectedRowInputs =  $(".selected input").serialize();
		 console.log('serlialized inputs: ',selectedRowInputs);

    } );
	
	$('#ModalAddEvento #guardar').click( function () {
		var selectedRowInputs = $('.selected input');
		var selectedData = selectedRowInputs.serialize();
		$('#ModalAddEvento #profesionales').val(selectedData);
		//console.log($('#ModalAddEvento #profesionales').val().toArray);
    } );
	
	$('#ModalAddEvento').on('hidden.bs.modal', function() {
		document.getElementById("formAddEvento").reset();
		$('#formAddEvento')
		.find("input,textarea,select")
		   .focusout()
		   .end();
		table.rows().deselect();
		tableAlumno.rows().deselect();
		tableExterno.rows().deselect();
	});
	
	 //Guardar evento
    $('#ModalAddEvento #guardar').on('click', function(e){
			var x = $(this);
			var add = x.attr('data-href');
			var nombre = $('#ModalAddEvento #nombre').val();
			var tipo = $('#ModalAddEvento #tipo').val();
			var lugar = $('#ModalAddEvento #lugar').val();
			var descripcion = $('#ModalAddEvento #descripcion').val();
			var horaInicio = $('#ModalAddEvento #horaInicio').val();
			var horaFin = $('#ModalAddEvento #horaFin').val();
			var profesionales = $('#ModalAddEvento #profesionales').val();
			var color = $('#ModalAddEvento #togglePalette').val();
			csrfToken = document.getElementsByName("_token")[0].value;
            e.preventDefault()
            swal({
                title : "Atención",
                text : "¿Confirma el ingreso de este nuevo evento?",
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
						url: add,
						data: {nombre: nombre, tipo: tipo, lugar: lugar, descripcion: descripcion, horaInicio: horaInicio, horaFin: horaFin, profesionales: profesionales, color: color},
						type: 'POST',
						 headers: {
						  "X-CSRF-TOKEN": csrfToken
						},
						success: function(){
								$.notify({
									// options
									message: 'Evento agregado correctamente',
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
							$('#ModalAddEvento').modal('hide');	
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
	
} );

