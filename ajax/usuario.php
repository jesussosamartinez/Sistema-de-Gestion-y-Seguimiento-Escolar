<?php
    ob_start();
    if(strlen(session_id()) < 1){
        session_start(); //validacion de sesion
    }
    
    require_once "../models/Usuario.php";
    
    $usuario = new Usuario();
    
    $idUsuario= isset($_POST["idUsuario"])? limpiarCadena($_POST["idUsuario"]):"";
    $user = isset($_POST["user"])? limpiarCadena($_POST["user"]): "";
    $password = isset($_POST["password"])? limpiarCadena($_POST["password"]):"";
    $idRol = isset($_POST["idRol"])? limpiarCadena($_POST["idRol"]):"";
    
    
    switch ($_GET["op"]){
        case 'permisos':
            //Obtenemos todos los permisos de la tabla permisos
            require_once "../models/Permiso.php";
            $permiso = new Permiso();
            $rspta = $permiso->listar();
    
            //Obtener los permisos asignados al usuario
            $id=$_GET['id'];
            $marcados = $usuario->listarmarcados($id);
            //Declaramos el array para almacenar todos los permisos marcados
            $valores=array();
    
            //Almacenar los permisos asignados al usuario en el array
            while ($per = $marcados->fetch_object())
                {
                    array_push($valores, $per->idpermiso);
                }
        break;
    
        case 'verificar':
            $user=$_POST['user'];
            $password=$_POST['password'];
    
        //consultamos al metodo que esta en la carpeta modelos usuario    
        $rspta=$usuario->verificar($user, $password);
        $fetch=$rspta->fetch_object();
    
        if(isset($fetch)){

            $deptos = $usuario->variables($user);
            $list = $deptos->fetch_object();

            $docentes = $usuario->variablesDocentes($user);
            $listdoc = $docentes->fetch_object();

            //variables de session
            $_SESSION['idusuario']=$fetch->idUsuario;
            $_SESSION['user']=$fetch->user;
            $_SESSION['password']=$fetch->password;
            $_SESSION['idRol']=$fetch->idRol;
            $_SESSION['jdepto']=$list->jefeDepartamento;
            $_SESSION['ndepto']=$list->nombreDepartamento;
            $_SESSION['cdocente']=$listdoc->correoDocente;
            $_SESSION['ndocente']=$listdoc->nombreDocente;
            $_SESSION['idDocente']=$listdoc->idDocente;
        
            //obtenemos los permisos del usuario segun rol
            $marcados = $usuario->listarmarcados($fetch->user);
    
            //Declaramos el array para almacenar todos los permisos marcados
            $valores= array();
            
            //Almacenamos los permisos marcados en el array
            while($per = $marcados->fetch_object())
            {
                array_push($valores, $per->permisos_id);
            }
    
            //Determinamos los permisos del usuario
                in_array(1,$valores)?$_SESSION['ControlJDepto']=1:$_SESSION['ControlJDepto']=0;
                in_array(2,$valores)?$_SESSION['homeDepartamento']=1:$_SESSION['homeDepartamento']=0;
                in_array(3,$valores)?$_SESSION['homeDocente']=1:$_SESSION['homeDocente']=0;
                in_array(4,$valores)?$_SESSION['homeAdmin']=1:$_SESSION['homeAdmin']=0;
                in_array(5,$valores)?$_SESSION['seguimientos']=1:$_SESSION['seguimientos']=0;
                in_array(6,$valores)?$_SESSION['seguimientosG']=1:$_SESSION['seguimientosG']=0;
                in_array(7,$valores)?$_SESSION['controlAdmin']=1:$_SESSION['controlAdmin']=0;
                in_array(8,$valores)?$_SESSION['controlG']=1:$_SESSION['controlG']=0;
                in_array(9,$valores)?$_SESSION['tblseguimientosG']=1:$_SESSION['tblseguimientosG']=0;
                in_array(10,$valores)?$_SESSION['tblseguimientosE']=1:$_SESSION['tblseguimientosE']=0;
                in_array(11,$valores)?$_SESSION['notificaciones']=1:$_SESSION['notificaciones']=0;
        }
    
        echo json_encode($fetch);
    
        break;
        

        case 'salir':
            //limpiamos las variables de sesion
            session_unset();
            //destruimos la sesion
            session_destroy();
            //redireccionamos al home
            header("Location: ../sistema/index.php");
    
        break;
    }

    ob_end_flush();
?>