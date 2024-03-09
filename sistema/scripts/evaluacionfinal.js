let table4 = new DataTable('#tblcontrolseguimientoIV', {
    // config options...
    "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
    "ajax": {
      url: "../ajax/seguimientoII.php?op=SeguimientoIV",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      }},
    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"},
"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "Asc" ]]//Ordenar (columna,orden)
});

//tabla para docentes
let tableIV = new DataTable('#tblSeguimientoIV', {
    // config options...
    "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
    "ajax": {
      url: "../ajax/seguimientoII.php?op=listarIVEsp",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      }},
    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"},
"iDisplayLength": 5,//Paginación
      "order": [[ 0, "Asc" ]]//Ordenar (columna,orden)
});

//visualización de datos del seguimiento en el modal
$("#ModalEditarSeguimientoIV").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Botón que activó el modal
  var id = button.data("id"); // Extraer la información de atributos de datos
  var Asignatura = button.data("asignatura"); // Extraer la información de atributos de datos
  var alumnos = button.data("alumnos"); // Extraer la información de atributos de datos
  var aprobados = button.data("aprobados"); // Extraer la información de atributos de datos
  var naprobados = button.data("naprobados"); // Extraer la información de atributos de datos
  
  var modal = $(this);
  modal.find(".modal-body #id").val(id);
  modal.find(".modal-body #nombreA").val(Asignatura);
  modal.find(".modal-body #cantAlumnos").val(alumnos);
  modal.find(".modal-body #Aprobados").val(aprobados);
  modal.find(".modal-body #noAprobados").val(naprobados);
  $(".alert").hide(); //Oculto alert
  });

  $("#editarseguimientoIV").submit(function( event ) {
		event.preventDefault();
		var parametros = $(this).serialize();
			$.ajax({
				   type: "POST",
				   url: "../ajax/seguimientoI.php?op=editarSeguimientoI",
				   data: parametros,
				   success: function(datos){
				   
				   alertify.alert('Evaluación Final',datos, function(){ 
					   table4.ajax.reload();
             tableIV.ajax.reload();
								});
				   
				 }
		   });
		
	   });

     function activar(idControl){
      alertify.confirm('SEGUIMIENTO IV','¿Estás Seguro de Activar?', function(){ 
      $.post("../ajax/seguimientoI.php?op=activarBtnEditar", { idControl : idControl }, function(e){
      alertify.success('Activado')
      table4.ajax.reload();
      tableIV.ajax.reload(); });
      }, function(){ alertify.error('Cancelado')});
    
    }
  
    function desactivar(idControl){
      alertify.confirm('SEGUIMIENTO IV','¿Estás Seguro de Desactivar?', function(){ 
        $.post("../ajax/seguimientoI.php?op=desactivarBtnEditar", { idControl : idControl }, function(e){
        table4.ajax.reload();
      tableIV.ajax.reload();
        alertify.success('Desactivado')
      });
      }, function(){ alertify.error('Cancelado')});
      
    }

    function alerta(idControl){
      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
          },
          buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
          title: "Estás Seguro?",
          text: "No podrás revertir los cambios!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Sí, Guardar y Finalizar!",
          cancelButtonText: "No, cancelar!",
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
              title: "Guardado Correctamente!",
              text: "Los cambios han sido Guardados.",
              icon: "success"
            });
            $.post("../ajax/seguimientoI.php?op=desactivarBtnEditar", { idControl : idControl }, function(e){
              table4.ajax.reload();
              tableIV.ajax.reload();
            });
            iniciar(idControl);
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire({
              title: "Cancelado",
              text: "Cambios no realizados. :)",
              icon: "error"
            });
          }
        });
  }