<?php
if(strlen(session_id())<1)
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecNM Campus Cuautla</title>
    <link rel="stylesheet" href="../assets/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="../assets/js/brain.js" type="text/javascript"></script>
    <script src="//unpkg.com/brain.js"></script>
    <script src="https://cdnjs.com/libraries/Chart.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!--DataTables-->
    <link rel="stylesheet" href="../assets/DataTable/datatables.css">
    <link rel="stylesheet" href="../assets/DataTable/datatables.min.css">
    <script src="../assets/DataTable/datatables.js" type="text/javascript"></script>
    <script src="../assets/DataTable/datatables.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="../assets/DataTable/DataTables-1.13.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="../assets/DataTable/DataTables-1.13.8/css/dataTables.bootstrap5.min.css">
    <script src="../assets/DataTable/DataTables-1.13.8/js/dataTables.bootstrap5.js" type="text/javascript"></script>
    <script src="../assets/DataTable/DataTables-1.13.8/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />


</head>
<body>
    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://www.cuautla.tecnm.mx/images/LogoTecNM%20Blanco.png" alt="TecNM" width="100">
                <img src="../assets/img/Imagen1.png" alt="ITCuautla" width="40">
                Sistema de Gestion Escolar
                <?php if($_SESSION['notificaciones']==1){echo' 
                <a href="notificaciones.php" class="btn btn-primary position-relative" style="margin-left: 45em;">
                <i class="bi bi-bell-fill"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <span class="visually-hidden">unread messages</span>
                    </span>';}?>
</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menú - Sistema de Gestion Escolar
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-underline justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.php"><i class="fa-solid fa-house"></i>
                                Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false"><i class="bi bi-file-text-fill"></i> Seguimientos</a>
                            <ul class="dropdown-menu">
                            <?php if($_SESSION['seguimientos']==1){echo'    <li><a class="dropdown-item" href="seguimientoI.php">Seguimiento I</a></li>
                                <li><a class="dropdown-item" href="seguimientoII.php">Seguimiento II</a></li>
                                <li><a class="dropdown-item" href="seguimientoIII.php">Seguimiento III</a></li>
                                <li><a class="dropdown-item" href="evaluacionFinal.php">Evaluación Final</a></li>
                                <li>';}?>
                                <?php if($_SESSION['seguimientosG']==1){echo' 
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="seguimientosgenerales.php">Seguimientos Generales</a>
                                </li>';}?>
                            </ul>
                        </li>
                        <?php if($_SESSION['controlG']==1){echo'
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false"><i class="bi bi-file-text-fill"></i> Control</a>
                            <ul class="dropdown-menu">';}?>
                            <?php if($_SESSION['controlAdmin']==1){echo'
                                <li><a class="dropdown-item" href="licenciatura.php">Licenciaturas</a></li>
                                <li><a class="dropdown-item" href="control_JDepto.php">Jefes de Departamento</a></li>';}?>
                                <?php if($_SESSION['ControlJDepto']==1){echo' 
                                <li><a class="dropdown-item" href="controlDocentes.php">Docentes</a></li>
                                <li><a class="dropdown-item" href="asignaturas.php">Asignaturas</a></li>';}?>
                           <?php if($_SESSION['controlG']==1){echo' </ul>
                        </li>';}?>
                        <li class="nav-item">
                            <a class="nav-link" href="../ajax/usuario.php?op=salir"><i
                                    class="fa-solid fa-right-from-bracket"></i> Salir</a>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-footer">
                    <ul class="nav nav-underline justify-content-center  pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/ITCuautlaOficial/?ref=embed_page"><i
                                    class="bi bi-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><i class="bi bi-twitter-x"></i></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><i class="bi bi-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="d-flex min-vh-100">
            <div class="row d-flex flex-grow-1 justify-content-center align-items-center" id="border">
                <div>