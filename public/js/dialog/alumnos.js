	$(document).ready(function() {

        $(".alumnoEdit").click(function(e) {
            var href = $(this).attr('href');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Desea editar el alumno seleccionado?",
                  type : "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si",
                  cancelButtonText: "No",
             },
          function(isConfirm){
            if (isConfirm) window.location.href = href; 
           });
        });

          
        $(".alumnoDelete").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Desea eliminar el alumno seleccionado?\nTodos sus participaciones en eventos serán borrados",
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
		
		$(".alumnoSave").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Confirma el ingreso del nuevo alumno?",
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
		
		$(".alumnoUpdate").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Confirma la actualización de los datos del alumno?",
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
    
	