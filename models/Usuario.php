<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Función para verificar los permisos
    public function listarmarcados($user)
	{
		$sql="SELECT * FROM usuarios u INNER JOIN permisos_rol r ON r.rol_id = u.idRol WHERE user = '$user'";
		return ejecutarConsulta($sql);
	}

    //Función para verificar el acceso al sistema
	public function verificar($user,$password)
    {
    	$sql="SELECT idUsuario, user, password, idRol FROM usuarios WHERE user='$user' AND password='$password'"; 
    	return ejecutarConsulta($sql);  
    }

	//Función para variables de sesión (departamentos)
	public function variables($user)
    {
    	$sql="SELECT u.idUsuario, u.user, d.jefeDepartamento, d.nombreDepartamento FROM usuarios u INNER JOIN departamentos d ON d.correoDepartamento = u.user WHERE u.user='$user'"; 
    	return ejecutarConsulta($sql);  
    }

	public function variablesDocentes($user)
    {
    	$sql="SELECT u.idUsuario, u.user, d.correoDocente, d.nombreDocente, d.idDocente FROM usuarios u INNER JOIN docentes d ON d.correoDocente = u.user WHERE u.user='$user'"; 
    	return ejecutarConsulta($sql);  
    }
    
}

?>