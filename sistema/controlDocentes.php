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
if ($_SESSION['controlAdmin']==1 || $_SESSION['ControlJDepto']==1)
{
?>

<div id="tbl-control" class="div-table">
    <h5>Lista de Docentes</h5>
    <div class="btns">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAgregarDocentes"><i
                class="bi bi-person-fill-add" style="color: #ffff;"></i></button>
    </div>
    <table id="tblcontroldocentes" class="display table-bordered table-collapsed" style="width:100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Docente</th>
                <th>Departamento</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tblcontrolDoc">

        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Docente</th>
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

<form enctype="multipart/form-data" id="editardocentes" method="POST">
    <div class="modal fade" id="Modaleditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">Edición | Docentes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control txt" id="idDocente" name="idDocente" hidden>
                        <label class="col-form-label label">Nombre del Docente:</label>
                        <input type="text" class="form-control txt" id="nombreD" name="nombreD">
                    </div>
                    <div class="mb-3">
                    <label class="col-form-label label">Departamento Perteneciente:*</label>
                            <select class="form-control input-sm form-select select-picker" name="nombre_depto"
                        id="nombre_depto" required>
                        <option value="">Selecciona Departamento</option>
                        <option value="1">Departamento de Ciencias Básicas</option>
                        <option value="2">Departamento de Ciencias Económico-Administrativas</option>
                        <option value="3">Departamento de Eléctrica y Electrónica</option>
                        <option value="4">Departamento de Metal Mecánica</option>
                        <option value="5">Departamento de Sistemas y Computación</option>
                    </select>
                    </div>
                    <label class="col-form-label label">Correo:*</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="nombre de usuario" aria-label="username"
                                aria-describedby="basic-addon2" id="correoDoc" name="correoDoc" required readonly>
                        </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Contraseña:</label>
                        <input type="text" class="form-control txt" id="pass" name="pass">
                    </div>
                    
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal"
                        id="guardarnuevos">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>

<form method="post" id="añadirDocentes">
    <div class="modal fade" id="ModalAgregarDocentes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Registro | Docentes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="col-form-label label">Nombre del Docente:*</label>
                            <input type="text" class="form-control txt" id="nombreD" name="nombreD" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label label">Departamento Perteneciente:*</label>
                            <select class="form-control input-sm form-select select-picker" name="nombre_depto"
                        id="nombre_depto" required>
                        <option value="">Selecciona Departamento</option>
                        <option value="1">Departamento de Ciencias Básicas</option>
                        <option value="2">Departamento de Ciencias Económico-Administrativas</option>
                        <option value="3">Departamento de Eléctrica y Electrónica</option>
                        <option value="4">Departamento de Metal Mecánica</option>
                        <option value="5">Departamento de Sistemas y Computación</option>
                    </select>
                        </div>
                        <label class="col-form-label label">Correo:*</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="nombre de usuario" aria-label="username"
                                aria-describedby="basic-addon2" id="correoDoc" name="correoDoc" required>
                            <span class="input-group-text" id="basic-addon2">@cuautla.tecnm.mx</span>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label label">Contraseña:*</label>
                            <input type="text" class="form-control txt" id="contraseña" name="contraseña" required>
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
<script type="text/javascript" src="scripts/controldocentes.js"></script>
</body>
</html>
<?php 
}
ob_end_flush();
?>