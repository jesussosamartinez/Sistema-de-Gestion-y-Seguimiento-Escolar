<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Licenciatura
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Función para listar licenciaturas
    public function listarLicenciaturas()
	{
		$sql="SELECT licenciaturas_id, nombre_licenciatura FROM licenciaturas";
		return ejecutarConsulta($sql);
	}

	//Función para añadir licenciatura
    public function añadirLicenciaturas($nombre_licenciatura)
	{
		$sql="INSERT INTO licenciaturas(nombre_licenciatura) VALUES ('$nombre_licenciatura')";
		return ejecutarConsulta($sql);
	}

	//Función para editar licenciatura
    public function editarLicenciaturas($licenciatura_id, $nombre_licenciatura)
	{
		$sql="UPDATE licenciaturas SET nombre_licenciatura = '$nombre_licenciatura' WHERE licenciaturas_id = '$licenciatura_id'";
		return ejecutarConsulta($sql);
	}

	//Función para eliminar la licenciatura por el id
	public function eliminar($licenciaturas_id){
		$sql = "DELETE FROM licenciaturas WHERE licenciaturas_id = '$licenciaturas_id'";
		return ejecutarConsulta($sql);
	}
}

?>