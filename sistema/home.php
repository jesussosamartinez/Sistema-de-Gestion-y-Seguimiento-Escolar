<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["user"]))
{
  header("Location: index.html");
}
else
{
require "header.php";
?>
                <?php if($_SESSION['homeAdmin']==1){echo'
                <div class="text text-center">
                  <h2>Bienvenido, '.$_SESSION['jdepto'].' <br> '.$_SESSION['ndepto'].'</h2>
                </div>
                <div id="btn-chart">
                 <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#graficas" ><i class="bi bi-pie-chart-fill"></i></button>
                </div>';
                require "graficas.php";
                }?>
              
              <?php if($_SESSION['homeDocente']==1){ echo'
                <div class="text text-center">
                  <h2>Bienvenido, '.$_SESSION['cdocente'].' <br> '.$_SESSION['ndocente'].'</h2>
                </div>';}?>

                <?php if($_SESSION['homeDepartamento']==1){ echo'
                <div class="text text-center">
                  <h2>Bienvenido, '.$_SESSION['jdepto'].' <br> '.$_SESSION['ndepto'].'</h2>
                </div>';}?>

                </div>
            </div>
        </div>
      </div>
    <?php
}
?>
</body>
</html>
<?php 
ob_end_flush();
?>
