function s1(seguimiento_id){
 
    if(document.getElementById("seguimiento").checked == true){
             const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
              },
              buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
              title: "¿Estás Seguro?",
              text: "Activar está Sección!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Sí, activarla!",
              cancelButtonText: "No, cancelar!",
              reverseButtons: true
            }).then((result) => {
              if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                  title: "Activada!",
                  text: "Esta sección fue activada.",
                  icon: "success"
                });
                $.post("../ajax/seguimientos.php?op=activarS",{ seguimiento_id : seguimiento_id}, function(e){
                });

                $.post("../ajax/seguimientosgenerales.php?op=activarseguimiento1", function(e){
                  table.ajax.reload();
                });
              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire({
                  title: "Cancelado",
                  text: "Esta sección no se activó :)",
                  icon: "error"
                });
                tbl.load();
              }
            });
           
     }else{
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        title: "¿Estás seguro?",
        text: "Desactivar esta sección!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, Desactivala!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.post("../ajax/seguimientos.php?op=desactivarS",{seguimiento_id : seguimiento_id}, function(e){
            swalWithBootstrapButtons.fire({
              title: "Desactivada!",
              text: "Esta sección ha sido desactivada.",
              icon: "success"
            });
            $.post("../ajax/seguimientosgenerales.php?op=desactivarseguimiento1", function(e){
              table.ajax.reload();
            });
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire({
            title: "Cancelado",
            text: "Esta sección no ha sido desactivada :)",
            icon: "error",
          });     
          location.reload();
        }
      });
                 
                  
     }
 }

 function s2(seguimiento_id){

  if(document.getElementById("seguimiento").checked == true){
           const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: "btn btn-success",
              cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
          });
          swalWithBootstrapButtons.fire({
            title: "¿Estás Seguro?",
            text: "Activar está Sección!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, activarla!",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              swalWithBootstrapButtons.fire({
                title: "Activada!",
                text: "Esta sección fue activada.",
                icon: "success"
              });
              $.post("../ajax/seguimientos.php?op=activarS",{ seguimiento_id : seguimiento_id}, function(e){
              });

              $.post("../ajax/seguimientosgenerales.php?op=activarseguimiento2", function(e){
                table.ajax.reload();
              });
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "Esta sección no se activó :)",
                icon: "error"
              });
              location.reload();
            }
          });
         
   }else{
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      title: "¿Estás seguro?",
      text: "Desactivar esta sección!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, Desactivala!",
      cancelButtonText: "No, cancelar!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.post("../ajax/seguimientos.php?op=desactivarS",{seguimiento_id : seguimiento_id}, function(e){
          swalWithBootstrapButtons.fire({
            title: "Desactivada!",
            text: "Esta sección ha sido desactivada.",
            icon: "success"
          });
          $.post("../ajax/seguimientosgenerales.php?op=desactivarseguimiento2", function(e){
            table.ajax.reload();
          });
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire({
          title: "Cancelado",
          text: "Esta sección no ha sido desactivada :)",
          icon: "error",
        });     
        location.reload();  
      }
    });
               
                
   }
}

function s3(seguimiento_id){

  if(document.getElementById("seguimiento").checked == true){
           const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: "btn btn-success",
              cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
          });
          swalWithBootstrapButtons.fire({
            title: "¿Estás Seguro?",
            text: "Activar está Sección!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, activarla!",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              swalWithBootstrapButtons.fire({
                title: "Activada!",
                text: "Esta sección fue activada.",
                icon: "success"
              });
              $.post("../ajax/seguimientos.php?op=activarS",{ seguimiento_id : seguimiento_id}, function(e){
              });

              $.post("../ajax/seguimientosgenerales.php?op=activarseguimiento3", function(e){
                table.ajax.reload();
              });
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "Esta sección no se activó :)",
                icon: "error"
              });
              table.ajax.reload();
            }
          });
         
   }else{
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      title: "¿Estás seguro?",
      text: "Desactivar esta sección!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, Desactivala!",
      cancelButtonText: "No, cancelar!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.post("../ajax/seguimientos.php?op=desactivarS",{seguimiento_id : seguimiento_id}, function(e){
          swalWithBootstrapButtons.fire({
            title: "Desactivada!",
            text: "Esta sección ha sido desactivada.",
            icon: "success"
          });
          $.post("../ajax/seguimientosgenerales.php?op=desactivarseguimiento3", function(e){
            table.ajax.reload();
          });
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire({
          title: "Cancelado",
          text: "Esta sección no ha sido desactivada :)",
          icon: "error",
        });     
        $('#tbl').ajax.reload();  
      }
    });
               
                
   }
}

function s4(seguimiento_id){

  if(document.getElementById("seguimiento").checked == true){
           const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: "btn btn-success",
              cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
          });
          swalWithBootstrapButtons.fire({
            title: "¿Estás Seguro?",
            text: "Activar está Sección!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, activarla!",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              swalWithBootstrapButtons.fire({
                title: "Activada!",
                text: "Esta sección fue activada.",
                icon: "success"
              });
              $.post("../ajax/seguimientos.php?op=activarS",{ seguimiento_id : seguimiento_id}, function(e){
              });

              $.post("../ajax/seguimientosgenerales.php?op=activarevaFinal", function(e){
                table.ajax.reload();
              });
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "Esta sección no se activó :)",
                icon: "error"
              });
              location.reload();
            }
          });
         
   }else{
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      title: "¿Estás seguro?",
      text: "Desactivar esta sección!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, Desactivala!",
      cancelButtonText: "No, cancelar!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.post("../ajax/seguimientos.php?op=desactivarS",{seguimiento_id : seguimiento_id}, function(e){
          swalWithBootstrapButtons.fire({
            title: "Desactivada!",
            text: "Esta sección ha sido desactivada.",
            icon: "success"
          });
          $.post("../ajax/seguimientosgenerales.php?op=desactivarvaFinal", function(e){
            table.ajax.reload();
          });
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire({
          title: "Cancelado",
          text: "Esta sección no ha sido desactivada :)",
          icon: "error",
        });     
        location.reload(); 
      }
    });
               
                
   }
}

 /*
 $.post("../ajax/seguimientos.php?op=mostrarS", function(data, status){
    var data = JSON.parse(data);


    for (var i = 0; i < data.aaData.length; i++) {
      var $td = '<td>'+data.aaData[i].seguimiento+'</td>'; 
      $("#tbl").append($td);
      // agrego los campos a la tabla
    }
      
  });
*/


 