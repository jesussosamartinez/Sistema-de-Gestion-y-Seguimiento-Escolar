let table = new DataTable('#tblcontroldocentes', {
    // config options...
    "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
    "ajax": {
        url: "../ajax/docentes.php?op=mostrardocentes",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        }},
    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
},
"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
});


    $("#añadirDocentes").submit(function( event ) {
		event.preventDefault();
		var parametros = $(this).serialize();
			$.ajax({
				   type: "POST",
				   url: "../ajax/docentes.php?op=añadirdocentes",
				   data: parametros,
				   success: function(datos){
				   
				   alertify.alert('REGISTRO DOCENTES',datos, function(){ 
					   table.ajax.reload();
								});
				   
				 }
		   });
		
	   });
	
	   //visualización de datos del docente en el modal
	   $("#Modaleditar").on("show.bs.modal", function (event) {
		var button = $(event.relatedTarget); // Botón que activó el modal
		var id = button.data("id"); // Extraer la información de atributos de datos
		var nombreDocente = button.data("docente"); // Extraer la información de atributos de datos
		var departamento = button.data("ndepto"); // Extraer la información de atributos de datos
		var correoDocente = button.data("correo"); // Extraer la información de atributos de datos
		var contraseña = button.data("contraseña"); // Extraer la información de atributos de datos
	  
		var modal = $(this);
		modal.find(".modal-body #idDocente").val(id);
		modal.find(".modal-body #nombreD").val(nombreDocente);
		modal.find(".modal-body #nombre_depto").val(departamento);
		modal.find(".modal-body #correoDoc").val(correoDocente);
		modal.find(".modal-body #pass").val(contraseña);
		$(".alert").hide(); //Oculto alert
	  });

	  //función para eliminar docente
	  function eliminar(usuario_id){

		alertify.confirm('ELIMINACIÓN DOCENTE',"¿Está Seguro de eliminar al Docente?", function(e){
		$.post("../ajax/docentes.php?op=eliminarDocente", {usuario_id : usuario_id}, 
		function(){
			alertify.success("Docente Eliminado")
			table.ajax.reload();
		})
	},function(){
			alertify.error("Docente No Eliminado")
		});
	}

	  $("#editardocentes").submit(function( event ) {
		event.preventDefault();
		var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "../ajax/docentes.php?op=editarDocente",
			data: parametros,
			success: function(datos){
			
			alertify.alert('REGISTRO DOCENTES',datos, function(){ 
				table.ajax.reload();
						 });
			
		  }
	});
		
	   });