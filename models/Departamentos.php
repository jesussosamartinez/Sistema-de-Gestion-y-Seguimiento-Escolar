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
		$sql="SELECT departamentos.idDepartamento, departamentos.nombreDepartamento, departamentos.correoDepartamento, departamentos.jefeDepartamento, usuarios.password FROM departamentos INNER JOIN usuarios ON departamentos.correoDepartamento = usuarios.user WHERE usuarios.idRol = '2'";
		return ejecutarConsulta($sql);
	}

	//Función para editar jefes de departamento
	public function editar($nombreDepartamento,$jefeDepartamento,$correoDepartamento,$idDepartamento)
	{
		$sql="UPDATE departamentos SET nombreDepartamento = '$nombreDepartamento', jefeDepartamento = '$jefeDepartamento', 
		correoDepartamento = '$correoDepartamento' WHERE idDepartamento = '$idDepartamento'";
		return ejecutarConsulta($sql);
	}

	public function user_editar($contraseña,$correoDepartamento){
		$sql="UPDATE usuarios SET password ='$contraseña' WHERE user='$correoDepartamento'";
		return ejecutarConsulta($sql);
	}

    
}
?>