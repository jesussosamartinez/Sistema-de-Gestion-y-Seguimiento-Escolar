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
    if($_SESSION['seguimientos']==1)
{
?>

<div id="tbl-control" class="div-table">
    <h5>Seguimiento III</h5>
    <div class="btns">
    </div>
    <?php if($_SESSION['tblseguimientosG']==1){echo'
    <!-- Tabla del seguimiento III para admin-->
    <table id="tblcontrolseguimientoIII" class="display table-bordered table-collapsed" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Asignatura</th>
                <th>Cantidad Alumnos</th>
                <th>Aprobados</th>
                <th>No Aprobados</th>
                <th>Indicador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tblseguimientoIII">
        </tbody>
        <tfoot>
            <tr>
            <th>#</th>
                <th>Asignatura</th>
                <th>Cantidad Alumnos</th>
                <th>Aprobados</th>
                <th>No Aprobados</th>
                <th>Indicador</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>';}?>
    
    <?php if($_SESSION['tblseguimientosE']==1){echo'
    <!-- Tabla del seguimiento III para docentes-->
    <table id="tblSeguimientoIII" class="display table-bordered table-collapsed" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Asignatura</th>
                <th>Cantidad Alumnos</th>
                <th>Aprobados</th>
                <th>No Aprobados</th>
                <th>Acciones</th>
                <th>VoBo</th>
            </tr>
        </thead>
        <tbody id="tbllseguimientoIII">
        </tbody>
        <tfoot>
            <tr>
            <th>#</th>
                <th>Asignatura</th>
                <th>Cantidad Alumnos</th>
                <th>Aprobados</th>
                <th>No Aprobados</th>
                <th>Acciones</th>
                <th>VoBo</th>
            </tr>
        </tfoot>
    </table>';} ?>
</div>
</div>
</div>
</div>

<form method="post" id="mensaje">
<div class="modal fade" id="Modalmensaje" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Seguimiento III</h1>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Asignatura" id="id" name="id" hidden>
                        <input type="text" class="form-control" value="Seguimiento III" id="seguimientoIII" name="seguimientoIII" hidden>
                        <label class="col-form-label label">Docente:</label>
                        <input type="text" class="form-control"  placeholder="Docente" id="nombreD" value="<?php echo $_SESSION['ndocente']?>" name="nombreD" required readonly> 
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Justificación:</label>
                        <textarea class="form-control" id="message-text" name="message-text" placeholder="Justiqué el Alto Indicé de Reprobados" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>

</div>

<form method="post" id="editarseguimientoIII">
<div class="modal fade" id="ModalEditarSeguimientoIII" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Registro | Seguimiento III</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="id" name="id" hidden>
                        <label class="col-form-label label">Asignatura:</label>
                        <input type="text" class="form-control" id="nombreA" name="nombreA" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Cantidad de Alumnos:</label>
                        <input type="text" class="form-control" id="cantAlumnos" name="cantAlumnos" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Alumnos Aprobados:</label>
                        <input type="number" class="form-control" placeholder="Ingresa No. Alumnos Aprobados" id="Aprobados" name="Aprobados">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Alumnos No Aprobados:</label>
                        <input type="number" class="form-control" id="noAprobados" placeholder="Ingresa No. Alumnos  No Aprobados" name="noAprobados">
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
<?php
}
else
{
  require 'noacceso.php';
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/seguimiento3.js"></script>
<script type="text/javascript" src="scripts/machinelearning.js"></script>
<script type="text/javascript" src="scripts/notificaciones.js"></script>
</body>
</html>
<?php 
}
ob_end_flush();
?>