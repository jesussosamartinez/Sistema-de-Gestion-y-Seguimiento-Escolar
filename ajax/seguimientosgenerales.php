<?php 
ob_start();
if(strlen(session_id()) < 1){
    session_start(); //validacion de sesion
}

require_once "../models/SeguimientosGenerales.php";

$seguimientosgenerales = new SeguimientosGenerales();

$idAsignatura= isset($_POST["idAsignatura"])? limpiarCadena($_POST["idAsignatura"]):"";
$seguimiento= isset($_POST["seguimiento"])? limpiarCadena($_POST["seguimiento"]):"";

switch ($_GET["op"]){

    case 'mostrarSeguimientosg':
        $rspta = $seguimientosgenerales->seguimientosg();
        $data = Array();
        $i= 1;
        while ($reg=$rspta->fetch_object()){
       
            $data[]=array(
                "0"=>$i++,
                "1"=>$reg->nombreAsignatura,
                "2"=>$reg->nombreDocente,
                "3"=>($reg->seguimiento1)?'<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="s1-'.$reg->idAsignatura.'" checked onclick="SeguimientoI('.$reg->idAsignatura.')" style="width: 3rem; height: 1.5rem; margin-left:1.5em;">
              </div>':'<div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="s1-'.$reg->idAsignatura.'" onclick="SeguimientoI('.$reg->idAsignatura.')" style="width: 3rem; height: 1.5rem; margin-left:1.5em;">
            </div>',
                "4"=>($reg->seguimiento2)?'<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="s2-'.$reg->idAsignatura.'" checked onclick="SeguimientoII('.$reg->idAsignatura.')" style="width: 3rem; height: 1.5rem; margin-left:1.5em;">
              </div>':'<div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="s2-'.$reg->idAsignatura.'" onclick="SeguimientoII('.$reg->idAsignatura.')" style="width: 3rem; height: 1.5rem; margin-left:1.5em;">
            </div>',
                "5"=>($reg->seguimiento3)?'<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="s3-'.$reg->idAsignatura.'" checked onclick="SeguimientoIII('.$reg->idAsignatura.')" style="width: 3rem; height: 1.5rem; margin-left:1.5em;">
              </div>':'<div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="s3-'.$reg->idAsignatura.'" onclick="SeguimientoIII('.$reg->idAsignatura.')" style="width: 3rem; height: 1.5rem; margin-left:1.5em;">
            </div>',
                "6"=>($reg->evaluacionFinal)?'<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="s4-'.$reg->idAsignatura.'" checked onclick="evaluacionFinal('.$reg->idAsignatura.')" style="width: 3rem; height: 1.5rem; margin-left:1.5em;">
              </div>':'<div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="s4-'.$reg->idAsignatura.'" onclick="evaluacionFinal('.$reg->idAsignatura.')" style="width: 3rem; height: 1.5rem; margin-left:1.5em;">
            </div>',
                "7"=>$reg->VoBo
            );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatablesxx
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar editar
            "aaData"=>$data);
        echo json_encode($results);
        break;

        case 'desactivarseguimientoI':
            $rspta=$seguimientosgenerales->desactivarseguimientoI($idAsignatura);
             echo $rspta ? "Segimiento I Desactivado" : "Seguimiento I no desactivado";

        break;
    
        case 'activarseguimientoI':
            $rspta=$seguimientosgenerales->activarseguimientoI($idAsignatura);
             echo $rspta ? "Seguimiento I Activado" : "Seguimiento I no activado";
        break;

        case 'desactivarseguimientoII':
          $rspta=$seguimientosgenerales->desactivarseguimientoII($idAsignatura);
           echo $rspta ? "Seguimiento II Desactivado" : "Seguimiento II no desactivado";

        break;
  
        case 'activarseguimientoII':
          $rspta=$seguimientosgenerales->activarseguimientoII($idAsignatura);
           echo $rspta ? "Seguimiento II Activado" : "Seguimiento II no activado";
        break;

        case 'desactivarseguimientoIII':
          $rspta=$seguimientosgenerales->desactivarseguimientoIII($idAsignatura);
           echo $rspta ? "Seguimiento III Desactivado" : "Seguimiento III no desactivado";

        break;
  
        case 'activarseguimientoIII':
          $rspta=$seguimientosgenerales->activarseguimientoIII($idAsignatura);
           echo $rspta ? "Seguimiento III Activado" : "Seguimiento III no activado";
        break;

        case 'desactivarevaluacionFinal':
          $rspta=$seguimientosgenerales->desactivarevaluacionFinal($idAsignatura);
           echo $rspta ? "Evaluación Final Desactivada" : "Evaluación Final no desactivada";
        break;
  
        case 'activarevaluacionFinal':
          $rspta=$seguimientosgenerales->activarevaluacionFinal($idAsignatura);
           echo $rspta ? "Evaluación Final Activada" : "Evaluación Final no activada";
        break;

        case 'insertarSeguimiento':
          $rspta = $seguimientosgenerales->verificarAsig($idAsignatura,$seguimiento);
          $row=mysqli_fetch_row($rspta);
          if($row[0] == "0"){
          $seguimientosgenerales->insertarS($idAsignatura,$seguimiento);
          }else{
            echo "ya existe";
          }
          
          break;
}
  
?>