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
if($_SESSION['controlAdmin']==1)
{
?>

<div id="tbl-control" class="div-table">
    <h5>Lista de Asignaturas</h5>
    <div class="btns">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAgregarLicenciaturas"><i class="bi bi-file-earmark-plus-fill" style="color: #ffff;"></i></button>
    </div>
    <table id="tblcontrolLicenciatura" class="display table-bordered table-collapsed" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tblcontrolL">

        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
<form method="post" id="editarLicenciatura">
<div class="modal fade" id="ModalEditarLicenciatura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Datos | Licenciaturas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control txt" id="idLicenciatura" name="idLicenciatura" required hidden>
                        <label class="col-form-label label">Nombre de la Licenciatura:</label>
                        <input type="text" class="form-control txt" id="nombrelicenciatura" name="nombrelicenciatura" placeholder="Ingresa Nombre de Licenciatura" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>
</div>

<form method="post" id="añadirLicenciatura">
<div class="modal fade" id="ModalAgregarLicenciaturas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Datos | Licenciaturas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label label">Nombre de la Licenciatura:</label>
                        <input type="text" class="form-control txt" id="nombre_licenciatura" name="nombre_licenciatura" placeholder="Ingresa Nombre de Licenciatura" required>
                    </div>
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
<script type="text/javascript" src="scripts/licenciatura.js"></script>
</body>
</html>
<?php 
}
ob_end_flush();
?>