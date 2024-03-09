

let table = new DataTable("#tblcontrol", {
  // config options...
  "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
  "ajax": {
    url: "../ajax/departamentos.php?op=mostrardepartamentos",
    type: "get",
    dataType: "json",
    error: function (e) {
      console.log(e.responseText);
    }},
  "language": { url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json" },
  "iDisplayLength": 5, //Paginación
  "order": [0, "asc"], //Ordenar (columna,orden)
});

$("#ModalEdicion").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Botón que activó el modal
  var id = button.data("id"); // Extraer la información de atributos de datos
  var jefeDepartamento = button.data("jefe"); // Extraer la información de atributos de datos
  var correoDepartamento = button.data("correo"); // Extraer la información de atributos de datos
  var nDepto = button.data("nombre"); // Extraer la información de atributos de datos
  var contraseña = button.data("contraseña"); // Extraer la información de atributos de datos

  var modal = $(this);
  modal.find(".modal-body #idDepartamento").val(id);
  modal.find(".modal-body #jefeDepartamento").val(jefeDepartamento);
  modal.find(".modal-body #nombreDep").val(nDepto);
  modal.find(".modal-body #correoDepartamento").val(correoDepartamento);
  modal.find(".modal-body #contraseña").val(contraseña);
  $(".alert").hide(); //Oculto alert
});


$("#editardepartamentos").submit(function( event ) {
  event.preventDefault();
  var parametros = $(this).serialize();
    $.ajax({
         type: "POST",
         url: "../ajax/departamentos.php?op=editardepartamentos",
         data: parametros,
         success: function(datos){
         
         alertify.alert('REGISTRO DE JEFES DE DEPARTAMENTOS',datos, function(){ 
           table.ajax.reload();
              });
         
       }
     });
  
   });
