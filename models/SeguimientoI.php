<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class SeguimientoI
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Función para enlistar las materias del seguimiento I
    public function seguimientoI()
	{
		$sql="SELECT c.control_id, a.nombreAsignatura, a.cantidad_Alumnos, c.aprobados, c.naprobados, c.VoBo FROM control c INNER JOIN asignaturas a ON c.asignatura =  a.idAsignatura WHERE c.seguimiento = '1'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar botón de editar seguimiento
	public function desactivarEditar($idControl)
	{
		$sql="UPDATE control SET VoBo='0' WHERE control_id='$idControl'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar botón de editar seguimiento
	public function activarEditar($idControl)
	{
		$sql="UPDATE control SET VoBo='1' WHERE control_id='$idControl'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar seguimiento
	public function editarSeguimientoI($idControl,$aprobados,$naprobados)
	{
		$sql="UPDATE control SET aprobados='$aprobados', naprobados = '$naprobados' WHERE control_id='$idControl'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para listar el seguimiento I para cada docente
	public function listarEsp(){
		$sql = "SELECT c.control_id, a.docente , a.nombreAsignatura, a.cantidad_Alumnos, c.aprobados, c.naprobados, c.VoBo FROM control c INNER JOIN asignaturas a ON (c.asignatura = a.idAsignatura) 
		WHERE c.seguimiento = '1' and a.docente = '".$_SESSION['idDocente']."'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para listar el seguimiento II
	public function SeguimientoII(){
		$sql="SELECT c.control_id, a.nombreAsignatura, a.cantidad_Alumnos, c.aprobados, c.naprobados, c.VoBo FROM control c INNER JOIN asignaturas a ON c.asignatura =  a.idAsignatura WHERE c.seguimiento = '2'";
		return ejecutarConsulta($sql);
	}
    
	//Implementamos un método para listar el seguimiento II para cada docente
	public function listarIIEsp(){
		$sql = "SELECT c.control_id, a.docente , a.nombreAsignatura, a.cantidad_Alumnos, c.aprobados, c.naprobados, c.VoBo FROM control c INNER JOIN asignaturas a ON (c.asignatura = a.idAsignatura) 
		WHERE c.seguimiento = '2' and a.docente = '".$_SESSION['idDocente']."'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para listar el seguimiento III
	public function SeguimientoIII(){
		$sql="SELECT c.control_id, a.nombreAsignatura, a.cantidad_Alumnos, c.aprobados, c.naprobados, c.VoBo FROM control c INNER JOIN asignaturas a ON c.asignatura =  a.idAsignatura WHERE c.seguimiento = '3'";
		return ejecutarConsulta($sql);
	}
    
	//Implementamos un método para listar el seguimiento III para cada docente
	public function listarIIIEsp(){
		$sql = "SELECT c.control_id, a.docente , a.nombreAsignatura, a.cantidad_Alumnos, c.aprobados, c.naprobados, c.VoBo FROM control c INNER JOIN asignaturas a ON (c.asignatura = a.idAsignatura) 
		WHERE c.seguimiento = '3' and a.docente = '".$_SESSION['idDocente']."'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para listar el seguimiento IV
	public function SeguimientoIV(){
		$sql="SELECT c.control_id, a.nombreAsignatura, a.cantidad_Alumnos, c.aprobados, c.naprobados, c.VoBo FROM control c INNER JOIN asignaturas a ON c.asignatura =  a.idAsignatura WHERE c.seguimiento = '4'";
		return ejecutarConsulta($sql);
	}
    
	//Implementamos un método para listar el seguimiento IV para cada docente
	public function listarIVEsp(){
		$sql = "SELECT c.control_id, a.docente , a.nombreAsignatura, a.cantidad_Alumnos, c.aprobados, c.naprobados, c.VoBo FROM control c INNER JOIN asignaturas a ON (c.asignatura = a.idAsignatura) 
		WHERE c.seguimiento = '4' and a.docente = '".$_SESSION['idDocente']."'";
		return ejecutarConsulta($sql);
	}

	//Función para gráfica seguimientoI
	public function graficaI(){
		$sql = "SELECT a.nombreAsignatura, c.naprobados FROM control AS c INNER JOIN asignaturas AS a ON c.asignatura=a.idAsignatura WHERE seguimiento = 1 ORDER BY naprobados DESC LIMIT 10";
		return ejecutarConsulta($sql);
	}

	//Función para gráfica seguimientoII
	public function graficaII(){
		$sql = "SELECT a.nombreAsignatura, c.naprobados FROM control AS c INNER JOIN asignaturas AS a ON c.asignatura=a.idAsignatura WHERE seguimiento = 2 ORDER BY naprobados DESC LIMIT 10";
		return ejecutarConsulta($sql);
	}

	//Funcion para gráfica seguimientoIII
	public function graficaIII(){
		$sql = "SELECT a.nombreAsignatura, c.naprobados FROM control AS c INNER JOIN asignaturas AS a ON c.asignatura=a.idAsignatura WHERE seguimiento = 3 ORDER BY naprobados DESC LIMIT 10";
		return ejecutarConsulta($sql);
	}

	//Función para gráfica evaluacion Final
	public function graficaIV(){
		$sql = "SELECT a.nombreAsignatura, c.naprobados FROM control AS c INNER JOIN asignaturas AS a ON c.asignatura=a.idAsignatura WHERE seguimiento = 4 ORDER BY naprobados DESC LIMIT 10";
		return ejecutarConsulta($sql);
	}

}

?>