
let table = new DataTable('#tblcontrolseguimientog', {
    // config options...
    "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
    "ajax": {
      url: "../ajax/seguimientosgenerales.php?op=mostrarSeguimientosg",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      }},
    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"},
"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
});

//Función para activar seguimiento I
function SeguimientoI(idAsignatura)
{
    if(document.getElementById('s1-'+idAsignatura+'').checked){
        alertify.confirm('SEGUIMIENTO I', '¿Está Seguro de Activar el Seguimiento 1?', function(){ 
            $.post("../ajax/seguimientosgenerales.php?op=activarseguimientoI", { idAsignatura : idAsignatura }, function(e){
            alertify.success("SEGUIMIENTO 1 ACTIVADO");
            table.ajax.reload();
            Insertar(idAsignatura,1)
         });	
        }
            , function(){ 
                alertify.error("SEGUIMIENTO 1 NO ACTIVADO")
                table.ajax.reload();  
        });
    }else {
        alertify.confirm('SEGUIMIENTO I', '¿Está Seguro de Desactivar el Seguimiento 1?', function(){ 
            $.post("../ajax/seguimientosgenerales.php?op=desactivarseguimientoI", { idAsignatura : idAsignatura }, function(e){
                alertify.success("SEGUIMIENTO 1 DESACTIVADO");
                table.ajax.reload();
            });	
            }
            , function(){ 
                alertify.error("SEGUIMIENTO 1 NO DESACTIVADO")
                table.ajax.reload();
            });
    }
}

function SeguimientoIII(idAsignatura)
{
    if(document.getElementById('s3-'+idAsignatura+'').checked){
        alertify.confirm('SEGUIMIENTO III', '¿Está Seguro de Activar el Seguimiento 3?', function(){ 
            $.post("../ajax/seguimientosgenerales.php?op=activarseguimientoIII", { idAsignatura : idAsignatura }, function(e){
                alertify.success("SEGUIMIENTO 3 ACTIVADO");
                table.ajax.reload();
                Insertar(idAsignatura,3);
            });	
           }
            , function(){ 
                alertify.error("SEGUIMIENTO 3 NO ACTIVADO")
                table.ajax.reload();
        });
    }else{
        alertify.confirm('SEGUIMIENTO III', '¿Está Seguro de Desactivar el Seguimiento 3?', function(){ 
            $.post("../ajax/seguimientosgenerales.php?op=desactivarseguimientoIII", { idAsignatura : idAsignatura }, function(e){
             alertify.success("SEGUIMIENTO 3 DESACTIVADO");
             table.ajax.reload();
            });	
           }
            , function(){ 
                alertify.error("SEGUIMIENTO 3 NO DESACTIVADO")
                table.ajax.reload();
            });
    }
}

function evaluacionFinal(idAsignatura)
{
    if(document.getElementById('s4-'+idAsignatura+'').checked){
        alertify.confirm('Evaluación Final', '¿Está Seguro de Activar Evaluación Final?', function(){ 
            $.post("../ajax/seguimientosgenerales.php?op=activarevaluacionFinal", { idAsignatura : idAsignatura }, function(e){
           alertify.success("EVALUACIÓN FINAL ACTIVADA");
           table.ajax.reload();
           Insertar(idAsignatura,4);
         });	
            }
            , function(){ 
                alertify.error("EVALUACIÓN FINAL NO ACTIVADA")
                table.ajax.reload();
        });
    }else{
        alertify.confirm('Evaluación Final', '¿Está Seguro de Desactivar Evaluación Final?', function(){ 
            $.post("../ajax/seguimientosgenerales.php?op=desactivarevaluacionFinal", { idAsignatura : idAsignatura }, function(e){
             alertify.success("EVALUACIÓN FINAL DESACTIVADA");
            });	
           }
            , function(){ 
                alertify.error("EVALUACIÓN FINAL NO DESACTIVADA")
                table.ajax.reload();
            });
    }
}

function SeguimientoII(idAsignatura)
{
    if(document.getElementById('s2-'+idAsignatura+'').checked){
        alertify.confirm('Seguimiento II', '¿Está Seguro de Activar Seguimiento II?', function(){ 
            $.post("../ajax/seguimientosgenerales.php?op=activarseguimientoII", { idAsignatura : idAsignatura }, function(e){
                alertify.success("SEGUIMIENTO II ACTIVADO");
                table.ajax.reload();
                Insertar(idAsignatura,2);
            });	
           }
            , function(){ 
                alertify.error("SEGUIMIENTO II NO ACTIVADO")
                table.ajax.reload();
        });
    }else{
        alertify.confirm('Seguimiento II', '¿Está Seguro de Desactivar Seguimiento II?', function(){ 
            $.post("../ajax/seguimientosgenerales.php?op=desactivarseguimientoII", { idAsignatura : idAsignatura }, function(e){
                alertify.success("SEGUIMIENTO II DESACTIVADO");
                table.ajax.reload();
            });	
           }
            , function(){ 
                alertify.error("SEGUIMIENTO II NO DESACTIVADO")
                table.ajax.reload();
            });
    }
}


function Insertar(idAsignatura, seguimiento){
    $.post("../ajax/seguimientosgenerales.php?op=insertarSeguimiento", {idAsignatura : idAsignatura, seguimiento : seguimiento }, function(e){
        alert(e);
    });
}