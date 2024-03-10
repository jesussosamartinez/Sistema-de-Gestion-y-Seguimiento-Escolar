<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Departamentos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Función para enlistar los datos de los departamentos
    public function listarDeptos()
	{
		$sql="SELECT departamentos.idDepartamento, departamentos.nombreDepartamento, departamentos.correoDepartamento, departamentos.jefeDepartamento, usuarios.password, departamentos.usuario_id FROM departamentos INNER JOIN usuarios ON departamentos.correoDepartamento = usuarios.user WHERE usuarios.idRol = '2'";
		return ejecutarConsulta($sql);
	}

	//Función para añadir usuario jefe departamento a tabla sql departamentos
	public function añadirJD($nombreDepartamento,$jefeDepartamento,$correoDepartamento){
		$sql = "INSERT INTO departamentos (nombreDepartamento, jefeDepartamento, correoDepartamento ,usuario_id,idRol)
		VALUES ('$nombreDepartamento','$jefeDepartamento','$correoDepartamento@cuautla.tecnm.mx',(SELECT idUsuario FROM usuarios WHERE user='$correoDepartamento@cuautla.tecnm.mx'), '2')";
		return ejecutarConsulta($sql);
	}
	//Función para añadir usuario jede de depto. a tabla sql usuarios
	public function añadirJU($user,$password){
		$sql = "INSERT INTO usuarios (user,password,idRol)
		VALUES ('$user@cuautla.tecnm.mx','$password','2')";
		return ejecutarConsulta($sql);
	}
	
	//Función para editar jefes de departamento
	public function editar($nombreDepartamento,$jefeDepartamento,$correoDepartamento,$idDepartamento)
	{
		$sql="UPDATE departamentos SET nombreDepartamento = '$nombreDepartamento', jefeDepartamento = '$jefeDepartamento', 
		correoDepartamento = '$correoDepartamento' WHERE idDepartamento = '$idDepartamento'";
		return ejecutarConsulta($sql);
	}

	//Funcion para editar el usuario jdepto en usuarios
	public function user_editar($contraseña,$correoDepartamento,$usuario_id){
		$sql="UPDATE usuarios SET password ='$contraseña', user='$correoDepartamento' WHERE idUsuario=$usuario_id";
		return ejecutarConsulta($sql);
	}

	//Función para eliminar jefes de departamento
	public function eliminar($usuario_id)
	{
		$sql="DELETE FROM departamentos WHERE usuario_id ='$usuario_id'";
		return ejecutarConsulta($sql);
	}
	//Funcion para eliminar jdeptos en la tabla de usuarios
	public function eliminarU($usuario_id)
	{
		$sql="DELETE FROM usuarios WHERE idUsuario='$usuario_id'";
		return ejecutarConsulta($sql);
	}
    
}
?>