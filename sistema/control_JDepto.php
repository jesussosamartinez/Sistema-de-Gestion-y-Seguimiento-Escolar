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
if ($_SESSION['controlAdmin']==1)
{
?>
<div id="tbl-control" class="div-table">
<h5>Lista de Departamentos</h5>
    <table id="tblcontrol" class="display table-bordered table-collapsed" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tblcontrolJ">
            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
</div>

<form method="post" id="editardepartamentos">
<div class="modal fade" id="ModalEdicion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Datos | Jefes de Departamento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label class="col-form-label label">Nombre del Jefe de Departamento:</label>
            <input type="text" class="form-control" id="idDepartamento" name="idDepartamento" hidden>
            <input type="text" class="form-control txt" id="jefeDepartamento" name="jefeDepartamento">
          </div>
          <div class="mb-3">
            <label class="col-form-label label">Nombre del Departamento:</label>
            <input type="text" class="form-control txt" id="nombreDep" name="nombreDep">
          </div>
          <div class="mb-3">
            <label class="col-form-label label">Correo del Departamento:</label>
            <input type="text" class="form-control txt" id="correoDepartamento" name="correoDepartamento">
          </div>
          <div class="mb-3">
            <label class="col-form-label label">Contraseña:</label>
            <input type="text" class="form-control txt" id="contraseña" name="contraseña">
          <div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php
}
else
{
  require 'noacceso.php';
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/control.js"></script>
</body>
</html>
<?php 
}
ob_end_flush();
?>