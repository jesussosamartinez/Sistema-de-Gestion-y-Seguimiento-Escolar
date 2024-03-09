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
if ($_SESSION['notificaciones']==1)
{
?>
<div id="tbl-control" class="div-table" style=" height: 500px;">
    <h5 style="font-family: Montserrat;">NOTIFICACIONES</h5>
    <table id="tblnotificaciones" class="display table-bordered table-collapsed table-borderless" style="width:100%;">
        <thead>
        </thead>
        <tbody id="tblcontroln">
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
</div>
<?php
}
else
{
  require 'noacceso.php';
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/notificaciones.js"></script>
</body>
</html>
<?php 
}
ob_end_flush();
?>