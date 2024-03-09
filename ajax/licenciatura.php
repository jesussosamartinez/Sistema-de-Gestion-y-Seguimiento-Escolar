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

require_once "../models/Licenciatura.php";

$licenciatura = new Licenciatura();

$licenciaturas_id= isset($_POST["licenciaturas_id"])? limpiarCadena($_POST["licenciaturas_id"]):"";
$nombre_licenciatura = isset($_POST["nombre_licenciatura"])? limpiarCadena($_POST["nombre_licenciatura"]): "";



switch ($_GET["op"]){
    //case para mostrar registros en la tabla licenciatura
    case 'mostrarlicenciatura':
        $rspta = $licenciatura->listarLicenciaturas();
        $data = Array();
        $i=1;
        while ($reg=$rspta->fetch_object()){
       //Datos de la tabla licenciaturas
            $data[]=array(
                "0"=>$i++,
                "1"=>$reg->nombre_licenciatura,
                "2"=>'<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditarLicenciatura" data-id="'.$reg->licenciaturas_id.'" data-licenciatura="'.$reg->nombre_licenciatura.'" ><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-danger btn-sm"  onclick="eliminar('.$reg->licenciaturas_id.')"><i class="bi bi-trash"></i></button>'
            );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
        break;

    //case para añadir la licenciatura
    case 'añadirLicenciatura':
            $nombre_licenciatura = $_POST["nombre_licenciatura"];
            $rspta = $licenciatura->añadirLicenciaturas($nombre_licenciatura);
            echo $rspta ? 'Licenciatura Registrada' : 'Licenciatura No Registrada';
            break;

    //case para editar la licenciatura
    case 'editarLicenciatura':
            $nombre_licenciatura = $_POST["nombrelicenciatura"];
            $licenciaturas_id = $_POST["idLicenciatura"];
            $rspta = $licenciatura->editarLicenciaturas($licenciaturas_id,$nombre_licenciatura);
            echo $rspta ? 'Licenciatura Actualizada' : 'Licenciatura No Actualizada';
            break;

    //case para eliminar la licenciatura
    case 'eliminarLicenciatura':
            $rspta=$licenciatura->eliminar($licenciaturas_id);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
            break;
    }
}
else
{
    require 'noacceso.php';
}
}
ob_end_flush();
?>