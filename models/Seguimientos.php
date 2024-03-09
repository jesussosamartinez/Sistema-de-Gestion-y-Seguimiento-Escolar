<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Seguimientos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	
	//Implementar un método para activar secciónes
	public function activarS($id_seguimiento)
	{
		$sql="UPDATE seguimientos SET marcador ='1' WHERE seguimiento_id='$id_seguimiento'";
		return ejecutarConsulta($sql);		
	}

    //Implementar un método para desactivar secciónes
	public function desactivarS($id_seguimiento)
	{
		$sql="UPDATE seguimientos SET marcador = '0' WHERE seguimiento_id='$id_seguimiento'";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para mostrar seguimientos tbl seguimientos
    public function mostrarS()
    {
        $sql="SELECT seguimiento_id, nombreSeguimiento, estado, marcador FROM seguimientos";
		return ejecutarConsulta($sql);	
    }

	
	public function NAC($control_id){
		$sql="SELECT a.cantidad_Alumnos, c.aprobados, c.naprobados FROM control c INNER JOIN asignaturas a ON ( c.asignatura = a.idAsignatura) WHERE c.control_id = '$control_id'";
		return ejecutarConsulta($sql);
	}
}

?>