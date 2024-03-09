//Tabla de control de licenciaturas
let table = new DataTable('#tblcontrolLicenciatura', {
    // config options...
    "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
    "ajax": {
        url: "../ajax/licenciatura.php?op=mostrarlicenciatura",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        }},
        "language": { url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json" },
        "iDisplayLength": 5, //Paginación
        "order": [0, "asc"] //Ordenar (columna,orden)
      
});

//añadir licenciatura
$("#añadirLicenciatura").submit(function( event ) {
  event.preventDefault();
  var parametros = $(this).serialize();
    $.ajax({
         type: "POST",
         url: "../ajax/licenciatura.php?op=añadirLicenciatura",
         data: parametros,
         success: function(datos){
         
         alertify.alert('REGISTRO ASIGNATURAS',datos, function(){ 
           table.ajax.reload();
              });
              limpiar();
       }
     });
  
   });

   //limpiar el formulario
   function limpiar(){
    $("#nombre_licenciatura").val("");
	
   }

   //visualización de datos de la licenciatura en el modal
   $("#ModalEditarLicenciatura").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    var id = button.data("id"); // Extraer la información de atributos de datos
    var licenciatura = button.data("licenciatura"); // Extraer la información de atributos de datos
    
    var modal = $(this);
    modal.find(".modal-body #idLicenciatura").val(id);
    modal.find(".modal-body #nombrelicenciatura").val(licenciatura);
    $(".alert").hide(); //Oculto alert
    });

     //metodo jquery para actualizar datos de la licenciatura
     $("#editarLicenciatura").submit(function( event ) {
      event.preventDefault();
      var parametros = $(this).serialize();
        $.ajax({
             type: "POST",
             url: "../ajax/licenciatura.php?op=editarLicenciatura",
             data: parametros,
             success: function(datos){
             
             alertify.alert('REGISTRO LICENCIATURA',datos, function(){ 
               table.ajax.reload();
                  });
           }
         });
      
       });

       //función para eliminar licenciatura
	  function eliminar(licenciaturas_id){

      alertify.confirm('ELIMINACIÓN LICENCIATURA',"¿Está Seguro de eliminar esta Licenciatura?", function(e){
      $.post("../ajax/licenciatura.php?op=eliminarLicenciatura", {licenciaturas_id : licenciaturas_id}, 
      function(){
        alertify.success("Licenciatura Eliminada")
        table.ajax.reload();
      })
    },function(){
        alertify.error("Licenciatura No Eliminada")
      });
    }