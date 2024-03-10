<?php 
ob_start();
if(strlen(session_id()) < 1){
    session_start(); //validacion de sesion
}
if(!isset($_SESSION["user"]))
{
    header("Location: ../sistema/index.html");
}
else
{
    //Validamos el acceso solo al usuario logueado y autorizado.
    if($_SESSION['controlAdmin']==1)
{

require_once "../models/Departamentos.php";

$departamentos = new Departamentos();

$usuario_id= isset($_POST["usuario_id"])? limpiarCadena($_POST["usuario_id"]):"";
$idDepartamento= isset($_POST["idDepartamento"])? limpiarCadena($_POST["idDepartamento"]):"";
$nombreDepartamento = isset($_POST["nombreDepartamento"])? limpiarCadena($_POST["nombreDepartamento"]): "";
$jefeDepartamento = isset($_POST["jefeDepartamento"])? limpiarCadena($_POST["jefeDepartamento"]):"";
$correoDepartamento = isset($_POST["correoDepartamento"])? limpiarCadena($_POST["correoDepartamento"]):"";
$contraseña = isset($_POST["contraseña"])? limpiarCadena($_POST["contraseña"]):"";
$idRol = isset($_POST["idRol"])? limpiarCadena($_POST["idRol"]):"";


switch ($_GET["op"]){

    case 'mostrardepartamentos':
        $rspta = $departamentos->listarDeptos();
        $data = Array();
        $i = 1;
        while ($reg=$rspta->fetch_object()){
       
            $data[]=array(
                "0"=>$i++,
                "1"=>$reg->jefeDepartamento,
                "2"=>$reg->nombreDepartamento,
                "3"=>$reg->correoDepartamento,
                "4"=>'**** ****',
                "5"=>'<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdicion" data-id="'.$reg->idDepartamento.'" data-nombre="'.$reg->nombreDepartamento.'" data-correo="'.$reg->correoDepartamento.'" data-jefe="'.$reg->jefeDepartamento.'"  data-contraseña="'.$reg->password.'" data-usuario="'.$reg->usuario_id.'"><i class="fa fa-pencil"></i></button>'. 
                ' <button class="btn btn-danger btn-sm"  onclick="eliminar('.$reg->usuario_id.')"><i class="bi bi-trash"></i></button>'
            );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar('.$reg->idAlumnoT.')
            "aaData"=>$data);
        echo json_encode($results);
        break;

    case 'añadirdepartamentos':
        $nombreDepartamento = $_POST["nombre_Departamento"];
        $jefeDepartamento = $_POST["jefe_Departamento"];
        $correoDepartamento = $_POST["correo_Departamento"];
        $password = $_POST["contraseña"];
    
        //Hash SHA256 en la contraseña
        //$clavehash=hash("SHA256",$password);
    
        $rspta = $departamentos->añadirJU($correoDepartamento,$password);
        $result =  $departamentos->añadirJD($nombreDepartamento,$jefeDepartamento,$correoDepartamento);
        echo $rspta ? 'Departamento Añadido' : 'Departamento No añadido';
        break;
    
    
    case 'editardepartamentos':
        $nombreDepartamento = $_POST["nombreDep"];
        $jefeDepartamento = $_POST["jefeDepartamento"];
        $correoDepartamento = $_POST["correoDepartamento"];
        $idDepartamento = $_POST["idDepartamento"];
        $usuario_id = $_POST["usuario_id"];
        $contraseña = $_POST["contraseña"];

        $rspta = $departamentos->editar($nombreDepartamento,$jefeDepartamento,$correoDepartamento,$idDepartamento); 
        $result= $departamentos->user_editar($contraseña,$correoDepartamento,$usuario_id);
        echo $rspta ? 'Departamento Actualizado':'Departamento No Actualizado';
        break;

        //case para eliminar departamento
    case 'eliminarDepartamento':
       $rspta=$departamentos->eliminar($usuario_id) ." ". $departamentos->eliminarU($usuario_id);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break; 
}
//Fin de las validaciones de acceso
}
else 
{
    require 'noacceso.php';
}
}
ob_end_flush();
?>