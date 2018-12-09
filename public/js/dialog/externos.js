	$(document).ready(function() {

        $(".externoEdit").click(function(e) {
            var href = $(this).attr('href');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Desea editar el participante externo seleccionado?",
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

          
        $(".externoDelete").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Desea eliminar el participante externo?\nTodos sus participaciones en eventos serán borrados",
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
		
		$(".externoSave").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Confirma el ingreso del nuevo participante externo?",
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
		
		$(".externoUpdate").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Confirma la actualización de los datos del participante externo?",
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
    
	