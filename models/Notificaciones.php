<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Notificacion
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT n.contenido, a.nombreAsignatura ,c.aprobados,c.naprobados,c.seguimiento, c.control_id, n.docentes FROM notificaciones n INNER JOIN control c ON (n.control_id=c.control_id) INNER JOIN asignaturas a ON (c.asignatura = a.idAsignatura);";
		return ejecutarConsulta($sql);		
	}

    //Implementar un método para insertar los registros
	public function insertar($control_id,$docentes,$contenido)
	{
		$sql="INSERT INTO notificaciones ( control_id, docentes, contenido, estado) VALUES 
        ('$control_id', $docentes', '$contenido' , '1')";
		return ejecutarConsulta($sql);		
	}

}

?>