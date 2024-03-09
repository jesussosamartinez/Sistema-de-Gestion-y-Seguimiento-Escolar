//Tabla de control de asignaturas
let table = new DataTable('#tblcontrolasignaturas', {
    // config options...
    "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
    "ajax": {
        url: "../ajax/asignaturas.php?op=mostrarasignaturas",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        }},
        "language": { url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json" },
        "iDisplayLength": 5, //Paginación
        "order": [0, "asc"] //Ordenar (columna,orden)
});


//Mostrar datos en el select de docentes dentro del modal editar asignaturas
$.post("../ajax/asignaturas.php?op=select", function(data, status){
  var data = JSON.parse(data);

  for (var i = 0; i < data.aaData.length; i++) {
    var $option =  '<option value="' + data.aaData[i].id + '">' + data.aaData[i].nombre + '</option>';
    $("#nombre_docente").append($option);
    
  }
    
});

//Mostrar datos en el select de docentes dentro del modal agregar asignaturas
$.post("../ajax/asignaturas.php?op=select", function(data, status){
  var data = JSON.parse(data);

  for (var i = 0; i < data.aaData.length; i++) {
    var $option =  '<option value="' + data.aaData[i].id + '">' + data.aaData[i].nombre + '</option>';
    $("#nombredocente").append($option);
    
  }
    
});

//añadir asignaturas
$("#añadirAsignaturas").submit(function( event ) {
  event.preventDefault();
  var parametros = $(this).serialize();
    $.ajax({
         type: "POST",
         url: "../ajax/asignaturas.php?op=añadirAsignaturas",
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
    $("#nombreAsignatura").val("");
    $("#nombredocente").selectpicker('refresh');
    $("#nombre_depto").selectpicker('refresh');
    $("#nombrecarrera").selectpicker('refresh');
    $("#grupo").val("");
    $("#cantidad").val("");
    $("#semestre").val("");
	
   }

    //visualización de datos de la asignatura en el modal
    $("#ModalEditarAsignatura").on("show.bs.modal", function (event) {
      var button = $(event.relatedTarget); // Botón que activó el modal
      var id = button.data("id"); // Extraer la información de atributos de datos
      var asignatura = button.data("asignatura"); // Extraer la información de atributos de datos
      var docente = button.data("docente"); // Extraer la información de atributos de datos
      var departamento = button.data("departamento"); // Extraer la información de atributos de datos
      var grupo = button.data("grupo"); // Extraer la información de atributos de datos
      var cantidadA = button.data("cantidad"); // Extraer la información de atributos de datos
      var semestre = button.data("semestre"); // Extraer la información de atributos de datos
      var carrera = button.data("carrera"); // Extraer la información de atributos de datos
      
      var modal = $(this);
      modal.find(".modal-body #idAsignatura").val(id);
      modal.find(".modal-body #nombreAsignatura").val(asignatura);
      modal.find(".modal-body #nombre_docente").val(docente);
      modal.find(".modal-body #nombre_deptoE").val(departamento);
      modal.find(".modal-body #grupoE").val(grupo);
      modal.find(".modal-body #cantidadE").val(cantidadA);
      modal.find(".modal-body #semestreE").val(semestre);
      modal.find(".modal-body #nombre_carrera").val(carrera);
      $(".alert").hide(); //Oculto alert
      });

      //metodo jquery para actualizar datos de asignatura
      $("#editarAsignatura").submit(function( event ) {
        event.preventDefault();
        var parametros = $(this).serialize();
          $.ajax({
               type: "POST",
               url: "../ajax/asignaturas.php?op=editarAsignatura",
               data: parametros,
               success: function(datos){
               
               alertify.alert('REGISTRO ASIGNATURAS',datos, function(){ 
                 table.ajax.reload();
                    });
             }
           });
        
         });

         //función para eliminar asignaturas
	  function eliminar(idAsignatura){

      alertify.confirm('ELIMINACIÓN ASIGNATURA',"¿Está Seguro de eliminar esta Asignatura?", function(e){
      $.post("../ajax/asignaturas.php?op=eliminarAsignatura", {idAsignatura : idAsignatura}, 
      function(){
        alertify.success("Asignatura Eliminada")
        table.ajax.reload();
      })
    },function(){
        alertify.error("Asignatura No Eliminada")
      });
    }

    //Mostrar datos en el select de licenciaturas dentro del modal agregar asignaturas
$.post("../ajax/asignaturas.php?op=selectCarreras", function(data, status){
  var data = JSON.parse(data);

  for (var i = 0; i < data.aaData.length; i++) {
    var $opcion =  '<option value="' + data.aaData[i].id + '">' + data.aaData[i].nombre + '</option>';
    $("#nombrecarrera").append($opcion);
  }
    
});

//Mostrar datos en el select de licenciaturas dentro del modal editar asignaturas
$.post("../ajax/asignaturas.php?op=selectCarreras", function(data, status){
  var data = JSON.parse(data);

  for (var i = 0; i < data.aaData.length; i++) {
    var $opcion =  '<option value="' + data.aaData[i].id + '">' + data.aaData[i].nombre + '</option>';
    $("#nombre_carrera").append($opcion);
  }
    
});