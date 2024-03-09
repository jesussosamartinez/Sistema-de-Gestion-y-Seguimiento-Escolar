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
require_once "../models/Docentes.php";

$docentes = new Docentes();

$idDocente = isset($_POST["idDocentes"])? limpiarCadena($_POST["idDocentes"]):"";
$nombreDocente = isset($_POST["nombreDocente"])? limpiarCadena($_POST["nombreDocente"]): "";
$correoDocente = isset($_POST["correoDocente"])? limpiarCadena($_POST["correoDocente"]):"";
$Departamento = isset($_POST["Departamento"])? limpiarCadena($_POST["Departamento"]):"";
$idRol = isset($_POST["idRol"])? limpiarCadena($_POST["idRol"]):"";
$usuario_id = isset($_POST["usuario_id"])? limpiarCadena($_POST["usuario_id"]):"";


switch ($_GET["op"]){

    case 'mostrardocentes':
        $rspta = $docentes->listarDocentes();
        $data = Array();
        while ($reg=$rspta->fetch_object()){
       
            $data[]=array(
                "0"=> $reg->idDocente,
                "1"=>$reg->nombreDocente,
                "2"=>$reg->nombreDepartamento,
                "3"=>$reg->correoDocente,
                "4"=>'********',
                "5"=>'<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#Modaleditar" data-id="'.$reg->idDocente.'" data-docente="'.$reg->nombreDocente.'" data-ndepto="'.$reg->idDepartamento.'" data-correo="'.$reg->correoDocente.'" data-contraseña="'.$reg->password.'" ><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-danger btn-sm"  onclick="eliminar('.$reg->usuario_id.')"><i class="bi bi-trash"></i></button>'
            );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
        break;
    
    case 'añadirdocentes':
        $nombreDocente = $_POST["nombreD"];
        $idDepartamento = $_POST["nombre_depto"];
        $correoDocente = $_POST["correoDoc"];
        $password = $_POST["contraseña"];

        //Hash SHA256 en la contraseña
		//$clavehash=hash("SHA256",$password);

        $rspta = $docentes->añadirUser($correoDocente,$password);
        $result =  $docentes->añadirDocentes($nombreDocente,$correoDocente,$idDepartamento);
        echo $rspta ? 'Docente Añadido' : 'Docente No añadido';
        break;

        //case para eliminar docente
    case 'eliminarDocente':
        $rspta=$docentes->eliminar($usuario_id) ." ". $docentes->eliminarU($usuario_id);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;   

        //case paraa editar docente
    case 'editarDocente':
        $idDocente = $_POST["idDocente"];
        $nombreDocente = $_POST["nombreD"];
        $correoDocente = $_POST["correoDoc"];
        $idDepartamento = $_POST["nombre_depto"];
        $password = $_POST["pass"];

        $rspta=$docentes->actualizar($idDocente,$nombreDocente,$correoDocente,$idDepartamento) ." ". $docentes->editar($password,$correoDocente);
        echo $rspta ? 'Docente Actualizado' : 'Docente No actualizado';
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