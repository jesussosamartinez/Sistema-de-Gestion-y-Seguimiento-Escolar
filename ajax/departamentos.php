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
        while ($reg=$rspta->fetch_object()){
       
            $data[]=array(
                "0"=>$reg->idDepartamento,
                "1"=>$reg->jefeDepartamento,
                "2"=>$reg->nombreDepartamento,
                "3"=>$reg->correoDepartamento,
                "4"=>'**** ****',
                "5"=>'<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdicion" data-id="'.$reg->idDepartamento.'" data-nombre="'.$reg->nombreDepartamento.'" data-correo="'.$reg->correoDepartamento.'" data-jefe="'.$reg->jefeDepartamento.'"  data-contraseña="'.$reg->password.'"><i class="fa fa-pencil"></i></button>'
            );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar('.$reg->idAlumnoT.')
            "aaData"=>$data);
        echo json_encode($results);
        break;
    
    case 'editardepartamentos':
        $nombreDepartamento = $_POST["nombreDep"];
        $jefeDepartamento = $_POST["jefeDepartamento"];
        $correoDepartamento = $_POST["correoDepartamento"];
        $idDepartamento = $_POST["idDepartamento"];
        $contraseña = $_POST["contraseña"];

        $rspta = $departamentos->editar($nombreDepartamento,$jefeDepartamento,$correoDepartamento,$idDepartamento) ." ". $departamentos->user_editar($contraseña,$correoDepartamento);
        echo $rspta ? 'Departamento Actualizado':'Departamento No Actualizado';
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