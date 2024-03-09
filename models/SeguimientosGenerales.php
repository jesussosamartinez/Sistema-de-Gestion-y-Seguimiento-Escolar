<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class SeguimientosGenerales
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Función para enlistar docentes seguimiento generales
    public function seguimientosg()
	{
		$sql="SELECT d.idDocente, a.idAsignatura, a.nombreAsignatura, d.nombreDocente, a.seguimiento1, a.seguimiento2, a.seguimiento3, a.evaluacionFinal, a.VoBo FROM asignaturas a INNER JOIN docentes d ON a.docente = d.idDocente";
		return ejecutarConsulta($sql);
	}

    //Implementamos un método para activar seguimiento I
	public function activarseguimientoI($idAsignatura)
	{
		$sql="UPDATE asignaturas SET seguimiento1='1' WHERE idAsignatura='$idAsignatura'";
		return ejecutarConsulta($sql);
	}

    //Implementamos un método para desactivar seguimiento I
	public function desactivarseguimientoI($idAsignatura)
	{
		$sql="UPDATE asignaturas SET seguimiento1='0' WHERE idAsignatura='$idAsignatura'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar seguimiento II
	public function activarseguimientoII($idAsignatura)
	{
		$sql="UPDATE asignaturas SET seguimiento2='1' WHERE idAsignatura='$idAsignatura'";
		return ejecutarConsulta($sql);
	}

    //Implementamos un método para desactivar seguimiento II
	public function desactivarseguimientoII($idAsignatura)
	{
		$sql="UPDATE asignaturas SET seguimiento2='0' WHERE idAsignatura='$idAsignatura'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar seguimiento III
	public function activarseguimientoIII($idAsignatura)
	{
		$sql="UPDATE asignaturas SET seguimiento3='1' WHERE idAsignatura='$idAsignatura'";
		return ejecutarConsulta($sql);
	}

    //Implementamos un método para desactivar seguimiento III
	public function desactivarseguimientoIII($idAsignatura)
	{
		$sql="UPDATE asignaturas SET seguimiento3='0' WHERE idAsignatura='$idAsignatura'";
		return ejecutarConsulta($sql);
	}
	
	//Implementamos un método para activar evaluación final
	public function activarevaluacionFinal($idAsignatura)
	{
		$sql="UPDATE asignaturas SET evaluacionFinal='1' WHERE idAsignatura='$idAsignatura'";
		return ejecutarConsulta($sql);
	}

    //Implementamos un método para desactivar evaluación final
	public function desactivarevaluacionFinal($idAsignatura)
	{
		$sql="UPDATE asignaturas SET evaluacionFinal='0' WHERE idAsignatura='$idAsignatura'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para crear seguimiento I individual por id de Asignatura
	public function insertarS($idAsignatura,$seguimiento)
	{
		$sql = "INSERT INTO control ( asignatura, seguimiento, aprobados, naprobados, VoBo) VALUES
		('$idAsignatura', '$seguimiento', '0', '0', '1')";
		return ejecutarConsulta($sql);
	}

	public function verificarAsig($idAsignatura,$seguimiento){
		$sql = "SELECT EXISTS (SELECT * FROM control WHERE asignatura ='$idAsignatura' && seguimiento = '$seguimiento')";
		return ejecutarConsulta($sql);
	}
    
}

?>