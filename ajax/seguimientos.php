<?php 
ob_start();
if(strlen(session_id()) < 1){
    session_start(); //validacion de sesion
}

require_once "../models/Seguimientos.php";

require_once "../models/SeguimientoI.php";

$graficas = new SeguimientoI();

$seguimientos = new Seguimientos();

$seguimiento_id= isset($_POST["seguimiento_id"])? limpiarCadena($_POST["seguimiento_id"]):"";
$control_id= isset($_POST["control_id"])? limpiarCadena($_POST["control_id"]):"";


switch ($_GET["op"]){
    case 'desactivarS':
        $rspta=$seguimientos->desactivarS($seguimiento_id);
    break;

    case 'activarS':
        $rspta=$seguimientos->activarS($seguimiento_id);
    break;


    case 'mostrarS':
        $rspta=$seguimientos->mostrarS();
        //Vamos a declarar un array
        $data= Array();
        $i=1;
        while ($reg=$rspta->fetch_object()){
       
            $data[]=array(
                "seguimiento"=>($reg->marcador)?'<input type="checkbox" id="seguimiento" onclick="s'.$reg->seguimiento_id.'('.$reg->seguimiento_id.');" checked >Desactivar '.$reg->nombreSeguimiento.'':'<input type="checkbox" id="seguimiento" onchange="s'.$reg->seguimiento_id.'('.$reg->seguimiento_id.');">Activar '.$reg->nombreSeguimiento.''
            );
        }
        $results = array(
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar('.$reg->idAlumnoT.')
            "aaData"=>$data);
        echo json_encode($results);

        break;
    
    case 'NAC':
        $rspta = $seguimientos->NAC($control_id);

        $data = Array();
        while ($reg=$rspta->fetch_object()){
       
            $data[]=array(
                "alumnos"=>$reg->cantidad_Alumnos,
                "Aprobados"=>$reg->aprobados,
                "Naprobados"=>$reg->naprobados
            );
        }
        $results = array(
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar('.$reg->idAlumnoT.')
            "aaData"=>$data);
        echo json_encode($results);
        
        break;

        case 'graficaI':
            $rspta = $graficas->graficaI();
            $data = Array();

        while($reg=$rspta->fetch_object()){
            $data[]=array(
                "asignatura"=>$reg->nombreAsignatura,
                "na"=>$reg->naprobados
            );
        }
        $results = array(
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
            break;
        case 'graficaII':
            $rspta = $graficas->graficaII();
            $data = Array();

        while($reg=$rspta->fetch_object()){
            $data[]=array(
                "asignatura"=>$reg->nombreAsignatura,
                "na"=>$reg->naprobados
            );
        }
        $results = array(
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
            break;
        case 'graficaIII':
            $rspta = $graficas->graficaIII();
            $data = Array();

        while($reg=$rspta->fetch_object()){
            $data[]=array(
                "asignatura"=>$reg->nombreAsignatura,
                "na"=>$reg->naprobados
            );
        }
        $results = array(
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
            break;
        case 'graficaIV':
            $rspta = $graficas->graficaIV();
            $data = Array();

        while($reg=$rspta->fetch_object()){
            $data[]=array(
                "asignatura"=>$reg->nombreAsignatura,
                "na"=>$reg->naprobados
            );
        }
        $results = array(
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
            break;

}
?>