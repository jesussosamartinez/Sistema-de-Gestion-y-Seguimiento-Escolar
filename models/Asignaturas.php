<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Asignaturas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Función para enlistar los datos de los departamentos
    public function listarAsignaturas()
	{
		$sql="SELECT a.idAsignatura, a.nombreAsignatura, a.cantidad_Alumnos,l.nombre_licenciatura, l.licenciaturas_id, dc.nombreDocente, dc.idDocente, dt.idDepartamento, dt.nombreDepartamento, a.semestre, a.asignaturaGrupo FROM asignaturas a 
        INNER JOIN departamentos dt ON (a.departamento = dt.idDepartamento)
		INNER JOIN docentes dc ON (a.docente = dc.idDocente)
		INNER JOIN licenciaturas l ON (a.licenciatura_id = l.licenciaturas_id)";
		return ejecutarConsulta($sql);
	}

	//Función para añadir asignaturas
	public function añadirAsignaturas($nombreAsignatura,$docente,$idDepartamento,$semestre,$cantidadA,$grupo,$carrera){
		$sql = "INSERT INTO asignaturas (nombreAsignatura, docente, departamento, licenciatura_id, semestre, cantidad_Alumnos, asignaturaGrupo, seguimiento1, seguimiento2, seguimiento3, evaluacionFinal,VoBo)
		VALUES ('$nombreAsignatura','$docente','$idDepartamento','$carrera','$semestre','$cantidadA','$grupo','0','0','0','0','0')";
		return ejecutarConsulta($sql);
	}
	
	//Función para visualizar los docentes en el select
	public function select(){
		$sql = "SELECT idDocente, nombreDocente FROM docentes";
		return ejecutarConsulta($sql);
	}

	//Funcion para editar los campos de asignatura
	public function editarAsignatura($nombreAsignatura,$docente,$idDepartamento,$carrera,$semestre,$cantidadA,$grupo,$idAsignatura)
	{
		$sql = "UPDATE asignaturas SET nombreAsignatura = '$nombreAsignatura', docente = '$docente', departamento = '$idDepartamento', 
		licenciatura_id = '$carrera' ,semestre = '$semestre', cantidad_Alumnos = '$cantidadA', asignaturaGrupo = '$grupo' WHERE idAsignatura = '$idAsignatura'";
		return ejecutarConsulta($sql);
	}

	//Función para eliminar las asignaturas por el id
	public function eliminar($idAsignatura){
		$sql = "DELETE FROM asignaturas WHERE idAsignatura = '$idAsignatura'";
		return ejecutarConsulta($sql);

	}

	//Función para visualizar los docentes en el select
	public function selectCarreras(){
		$sql = "SELECT licenciaturas_id, nombre_licenciatura FROM licenciaturas";
		return ejecutarConsulta($sql);
	}	
	
	
}
?>