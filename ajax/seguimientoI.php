<?php 
ob_start();
if(strlen(session_id()) < 1){
    session_start(); //validacion de sesion
}

require_once "../models/SeguimientoI.php";

$seguimientoI = new SeguimientoI();

$idControl = isset($_POST["idControl"])? limpiarCadena($_POST["idControl"]):"";
$nombreAsignatura = isset($_POST["nombreAsignatura"])? limpiarCadena($_POST["nombreAsignatura"]): "";
$alumnosAprobados = isset($_POST["alumnosAprobados"])? limpiarCadena($_POST["alumnosAprobados"]):"";
$alumnosnAprobados = isset($_POST["alumnosnAprobados"])? limpiarCadena($_POST["alumnosnAprobados"]):"";


switch ($_GET["op"]){

    case 'mostrarSeguimientoI':
        $rspta = $seguimientoI->seguimientoI();
        $data = Array();

        $i=1;
        while ($reg=$rspta->fetch_object()){
       
            $data[]=array(
                "0"=> $i++,
                "1"=>$reg->nombreAsignatura,
                "2"=>$reg->cantidad_Alumnos,
                "3"=>$reg->aprobados,
                "4"=>$reg->naprobados,
                "5"=>'<a onclick="iniciarI('.$reg->control_id.');" id="status" >Status</a>',
                "6"=>($reg->VoBo)?'<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditarSeguimientoI" data-id="'.$reg->control_id.'" data-asignatura="'.$reg->nombreAsignatura.'" data-alumnos="'.$reg->cantidad_Alumnos.'" data-aprobados="'.$reg->aprobados.'" data-naprobados="'.$reg->naprobados.'"><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-danger btn-sm"><i class="fa fa-close" onclick="desactivar('.$reg->control_id.')"></i> </button>':
                '<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditarSeguimientoI" data-id="'.$reg->control_id.'" disabled ><i class="fa fa-pencil"></i></button> '.
                ' <button class="btn btn-success btn-sm"><i class="fa fa-check" onclick="activar('.$reg->control_id.')"></i> </button>'
            );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
        break;

        case 'activarBtnEditar':
            $rspta=$seguimientoI->activarEditar($idControl);
            break;
        
        case 'desactivarBtnEditar':
            $rspta=$seguimientoI->desactivarEditar($idControl);
            break;
        
        case 'editarSeguimientoI':
            $idControl = $_POST["id"];
            $alumnosAprobados = $_POST["Aprobados"];
            $alumnosnAprobados = $_POST["noAprobados"];


            $rspta=$seguimientoI->editarSeguimientoI($idControl,$alumnosAprobados, $alumnosnAprobados);
            echo $rspta ? 'Seguimiento Actualizado':'Seguimiento No Actualizado';
            break;
        
        case 'listarEsp':
            $rspta = $seguimientoI->listarEsp();
            $data = Array();
            $i=1;
            while ($reg=$rspta->fetch_object()){
           
                $data[]=array(
                    "0"=> $i++,
                    "1"=>$reg->nombreAsignatura,
                    "2"=>$reg->cantidad_Alumnos,
                    "3"=>$reg->aprobados,
                    "4"=>$reg->naprobados,
                    "5"=>($reg->VoBo)?'<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditarSeguimientoI" data-id="'.$reg->control_id.'" data-asignatura="'.$reg->nombreAsignatura.'" data-alumnos="'.$reg->cantidad_Alumnos.'" data-aprobados="'.$reg->aprobados.'" data-naprobados="'.$reg->naprobados.'"><i class="fa fa-pencil"></i></button>':
                    '<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditarSeguimientoI" data-id="'.$reg->control_id.'" disabled ><i class="fa fa-pencil"></i></button>',
                    "6"=>($reg->VoBo)?'<a onclick="alerta('.$reg->control_id.');">VoBo</a>':'<a disabled>VoBo</a>'
                );
            }
            $results = array(
                "sEcho"=>1, //Información para el datatables
                "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
                "aaData"=>$data);
            echo json_encode($results);
            break;
 
}
?>