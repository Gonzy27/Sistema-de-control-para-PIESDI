	$(document).ready(function() {

        $(".profesionalEdit").click(function(e) {
            var href = $(this).attr('href');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Desea editar el profesional seleccionado?",
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

          
        $(".profesionalDelete").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Desea eliminar el profesional seleccionado?\nTodos sus participaciones en eventos serán borrados",
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
		
		$(".profefionalSave").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Confirma el ingreso del nuevo profesional?",
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
		
		$(".profesionalUpdate").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Confirma la actualización de los datos del profesional?",
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
		
		function swapModalButtons(){
		  $("button.cancel").before($("button.confirm"))
		}
    });
	

    
	
	