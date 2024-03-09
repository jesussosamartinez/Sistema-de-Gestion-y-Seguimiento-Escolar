<?php
    ob_start();
    if(strlen(session_id()) < 1){
        session_start(); //validacion de sesion
    }
    if(!isset($_SESSION["user"]))
{
    header("Location: ../sistema/login.html");
}
else
{
    //Validamos el acceso solo al usuario logueado y autorizado.
   
    
    require_once "../models/Notificaciones.php";
    
    $notificacion = new Notificacion();
    
    $notificaciones_id= isset($_POST["notificaciones_id"])? limpiarCadena($_POST["notificaciones_id"]):"";
    $control_id = isset($_POST["control_id"])? limpiarCadena($_POST["control_id"]): "";
    $docentes = isset($_POST["docente"])? limpiarCadena($_POST["docente"]): "";
    $contenido = isset($_POST["contenido"])? limpiarCadena($_POST["contenido"]):"";
    $estado = isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
    
    
    switch ($_GET["op"]){
        //case para insertar las notificaciones a la bd
        case 'insertar':
            $control_id = $_POST["id"];
            $docentes = $_POST["nombreD"];
            $contenido = $_POST["message-text"];

            $rspta = $notificacion->insertar($control_id,$docentes,$contenido);
            echo $rspta ? 'Reporte Enviado':'Reporte No Enviado';
            break;
        
        //case  para listar las notificaciones a la bd
        case 'listar':
            $rspta = $notificacion->listar();
        $data = Array();

        while($reg=$rspta->fetch_object()){
            $data[]=array(
                "contenido"=>'<a style="color: gray;">Se obtuvo un total de alumnos reprobados '.$reg->naprobados.' de '.$reg->naprobados+$reg->aprobados.' en '.$reg->nombreAsignatura.'
                 impartida por '.$reg->docentes.' el cual resporta en el seguimiento '.$reg->seguimiento.': '.$reg->contenido.'.<span style="color: red;"> ¡Se recomienda estar en Observación!</span></a>'
            );
        }
            $results = array(
                "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
                "aaData"=>$data,
            );
            echo json_encode($results);
            break;


    //Fin de las validaciones de acceso

            }
}
ob_end_flush();
?>
    