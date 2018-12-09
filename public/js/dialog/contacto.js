	$(document).ready(function() {

        $("#contactoSubmit").click(function(e) {
			var form = $(this).parents('form');
            e.preventDefault()
              swal({
                  title : "Atención",
                  text : "¿Confirma el envío de la solicitud?",
                  type : "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si",
                  cancelButtonText: "No",
				  showLoaderOnConfirm: true,
             },
          function(isConfirm){
				if (isConfirm) {
					form.submit();
				} else {
				}
           });
        });        

    });
	

    
	
	