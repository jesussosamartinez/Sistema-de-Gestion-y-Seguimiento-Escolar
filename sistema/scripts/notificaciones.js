$("#mensaje").submit(function( event ) {
    event.preventDefault();
    var parametros = $(this).serialize();
        $.ajax({
               type: "POST",
               url: "../ajax/notificaciones.php?op=insertar",
               data: parametros,
               success: function(datos){
               
               alertify.alert('SEGUIMIENTOS',datos, function(){ 
                            });
               
             }
       });
    
   });

 $.post("../ajax/notificaciones.php?op=listar", function(data, status){
    var data = JSON.parse(data);
  
    for (var i = 0; i < data.aaData.length; i++) {
      var $tr =  '<tr> <th>'+data.aaData[i].contenido+'</th></tr>';
      $("#tblcontroln").append($tr);
      // agrego los campos a la tabla
    }
      
  });   