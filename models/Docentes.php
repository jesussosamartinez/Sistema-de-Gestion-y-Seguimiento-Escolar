<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Docentes
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Función para enlistar los datos de los departamentos
    public function listarDocentes()
	{
		$sql="SELECT d.usuario_id,d.idDocente, d.nombreDocente, d.correoDocente, dt.nombreDepartamento, dt.idDepartamento, d.idRol, u.password FROM docentes d INNER JOIN usuarios u ON (d.correoDocente = u.user) INNER JOIN departamentos dt ON (dt.idDepartamento = d.idDepartamento) WHERE u.idRol = '3'";
		return ejecutarConsulta($sql);
	}

	//Función para añadir usuario docente a tabla sql docentes
	public function añadirDocentes($nombreDocente,$correoDocente,$idDepartamento){
		$sql = "INSERT INTO docentes (nombreDocente, correoDocente, idDepartamento,idRol, usuario_id)
		VALUES ('$nombreDocente','$correoDocente@cuautla.tecnm.mx','$idDepartamento','3', (SELECT idUsuario FROM usuarios WHERE user='$correoDocente@cuautla.tecnm.mx'))";
		return ejecutarConsulta($sql);
	}
	//Función para añadir usuario docente a tabla sql usuarios
	public function añadirUser($user,$password){
		$sql = "INSERT INTO usuarios (user,password,idRol)
		VALUES ('$user@cuautla.tecnm.mx','$password','3')";
		return ejecutarConsulta($sql);
	}
    //Función para eliminar docentes
	public function eliminar($usuario_id)
	{
		$sql="DELETE FROM docentes WHERE usuario_id='$usuario_id'";
		return ejecutarConsulta($sql);
	}
	//Funcion para eliminar docentes en la tabla usuarios
	public function eliminarU($idUsuario)
	{
		$sql="DELETE FROM usuarios WHERE idUsuario='$idUsuario'";
		return ejecutarConsulta($sql);
	}

	//Función para actualizar docentes
	public function actualizar($idDocente,$nombreDocente,$correoDocente,$idDepartamento)
	{
		$sql="UPDATE docentes SET nombreDocente='$nombreDocente', correoDocente= '$correoDocente', idDepartamento= '$idDepartamento' WHERE idDocente='$idDocente'";
		return ejecutarConsulta($sql);
	}

	public function editar($contraseña,$correoDocente){
		$sql="UPDATE usuarios SET password ='$contraseña' WHERE user='$correoDocente'";
		return ejecutarConsulta($sql);
	}
	
}
?>