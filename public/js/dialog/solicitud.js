	$(document).ready(function() {

		$(".solicitudUptate").click(function(e) {
            var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Desea actualizar el estado de esta solicitud?",
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
    
	