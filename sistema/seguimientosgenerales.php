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
if ($_SESSION['seguimientosG']==1)
{
?>

<div id="tbl-control" class="div-table">
    <h5>Seguimientos</h5>
    <div class="btns" id="div">
    </div>
    <table id="tblcontrolseguimientog" class="display table-bordered table-collapsed" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Seguimiento I</th>
                <th>Seguimiento II</th>
                <th>Seguimiento III</th>
                <th>Evaluación Final</th>
                <th>VoBo</th>
            </tr>
        </thead>
        <tbody id="tblcontrolDoc">
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Seguimiento I</th>
                <th>Seguimiento II</th>
                <th>Seguimiento III</th>
                <th>Evaluación Final</th>
                <th>VoBo</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="ModalAgregarDocentes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Datos | Docentes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="col-form-label label">Nombre del Docente:</label>
                        <input type="text" class="form-control txt" id="nombreD" name="nombreD">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Departamento Perteneciente:</label>
                        <input type="text" class="form-control txt" id="DeptoP" name="DeptoP">
                    </div>
                    <label class="col-form-label label">Correo:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="usuario" aria-label="username"
                            aria-describedby="basic-addon2" id="correoDoc">
                        <span class="input-group-text" id="basic-addon2">@cuautla.tecnm.mx</span>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Contraseña:</label>
                        <input type="text" class="form-control txt" id="contraseña" name="contraseña">
                        <div>
                            <div class="mb-3">
                                <label class="col-form-label label">Asignaturas:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Default checkbox
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Checked checkbox
                                    </label>
                                </div>
                                <div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="añadirdocentes()">Guardar</button>
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
<script type="text/javascript" src="scripts/seguimientosgenerales.js"></script>
<script type="text/javascript" src="scripts/seguimientos.js"></script>
</body>
</html>
<?php 
}
ob_end_flush();
?>