<?php 
ob_start();
if(strlen(session_id()) < 1){
    session_start(); //validacion de sesion
}

if (!isset($_SESSION["user"]) )
{
    header("Location: ../sistema/index.html");
}
else
{ 
    //Validamos el acceso solo al usuario logueado y autorizado
    if($_SESSION['controlAdmin']==1 || $_SESSION['ControlJDepto']==1)
    {

require_once "../models/Asignaturas.php";

$asignaturas = new Asignaturas();

$idAsignatura= isset($_POST["idAsignatura"])? limpiarCadena($_POST["idAsignatura"]):"";
$nombreAsignatura = isset($_POST["nombreAsignatura"])? limpiarCadena($_POST["nombreAsignatura"]): "";
$docente = isset($_POST["docente"])? limpiarCadena($_POST["docente"]):"";
$departamento = isset($_POST["departamento"])? limpiarCadena($_POST["departamento"]):"";
$semestre = isset($_POST["semestre"])? limpiarCadena($_POST["semestre"]):"";


switch ($_GET["op"]){

    case 'mostrarasignaturas':
        $rspta = $asignaturas->listarAsignaturas();
        $data = Array();
        $i=1;
        while ($reg=$rspta->fetch_object()){
       //Datos de la tabla asignaturass
            $data[]=array(
                "0"=>$i++,
                "1"=>$reg->nombreAsignatura,
                "2"=>$reg->nombreDocente,
                "3"=>$reg->nombreDepartamento,
                "4"=>$reg->nombre_licenciatura,
                "5"=>$reg->asignaturaGrupo,
                "6"=>$reg->semestre,
                "7"=>'<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditarAsignatura" data-id="'.$reg->idAsignatura.'" data-asignatura="'.$reg->nombreAsignatura.'" data-docente="'.$reg->idDocente.'" data-departamento="'.$reg->idDepartamento.'" data-grupo="'.$reg->asignaturaGrupo.'" data-cantidad="'.$reg->cantidad_Alumnos.'" data-semestre="'.$reg->semestre.'" data-carrera="'.$reg->licenciaturas_id.'" ><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-danger btn-sm"  onclick="eliminar('.$reg->idAsignatura.')"><i class="bi bi-trash"></i></button>'
            );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
        break;

    case 'añadirAsignaturas':
        $nombreAsignatura = $_POST["nombre_Asignatura"];
        $docente = $_POST["nombre_docente"];
        $idDepartamento = $_POST["nombre_depto"];
        $carrera = $_POST['nombrecarrera'];
        $semestre = $_POST["semestre"];
        $cantidadA = $_POST["cantidad"];
        $grupo = $_POST["grupo"]; 

        $rspta = $asignaturas->añadirAsignaturas($nombreAsignatura,$docente,$idDepartamento,$semestre,$cantidadA,$grupo,$carrera);
        echo $rspta ? 'Asignatura Registrada' : 'Asignatura No Registrada';
        break;
    
    case 'select':
        $rspta = $asignaturas->select();
        $data = Array();

        while($reg=$rspta->fetch_object()){
            $data[]=array(
                "id"=>$reg->idDocente,
                "nombre"=>$reg->nombreDocente
            );
 }
            $results = array(
                "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
                "aaData"=>$data);
            echo json_encode($results);

       
        break;

    case 'editarAsignatura':
        $nombreAsignatura = $_POST["nombreAsignatura"];
        $docente = $_POST["nombre_docente"];
        $idDepartamento = $_POST["nombre_deptoE"];
        $carrera = $_POST["nombre_carrera"];
        $semestre = $_POST["semestreE"];
        $cantidadA = $_POST["cantidad"];
        $grupo = $_POST["grupoE"];
        $idAsignatura = $_POST["idAsignatura"];

        $rspta = $asignaturas->editarAsignatura($nombreAsignatura,$docente,$idDepartamento,$carrera,$semestre,$cantidadA,$grupo,$idAsignatura);
        echo $rspta ? 'Asignatura Actualizada' : 'Asignatura No Actualizada';
        break;
    
        case 'eliminarAsignatura':
            $rspta=$asignaturas->eliminar($idAsignatura);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
            break;
        
        case 'selectCarreras':
            $rspta = $asignaturas->selectCarreras();
            $data = Array();
        
            while($reg=$rspta->fetch_object()){
                $data[]=array(
                    "id"=>$reg->licenciaturas_id,
                    "nombre"=>$reg->nombre_licenciatura
                );
             }
            $results = array(
                "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
                "aaData"=>$data);
            echo json_encode($results);               
            break;

}
//Fin de la validaciones de acceso
}
else
{
    require 'noacceso.php';
}
}
ob_end_flush();
?>