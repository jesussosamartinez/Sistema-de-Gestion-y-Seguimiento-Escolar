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
if($_SESSION['controlAdmin']==1 || $_SESSION['ControlJDepto']==1)
{
?>

<div id="tbl-control" class="div-table">
    <h5>Lista de Asignaturas</h5>
    <div class="btns">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAgregarAsignaturas"><i class="bi bi-file-earmark-plus-fill" style="color: #ffff;"></i></button>
    </div>
    <table id="tblcontrolasignaturas" class="display table-bordered table-collapsed" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Departamento</th>
                <th>Carrera</th>
                <th>Grupo</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tblcontrolJ">

        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Departamento</th>
                <th>Carrera</th>
                <th>Grupo</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
<form method="post" id="editarAsignatura">
<div class="modal fade" id="ModalEditarAsignatura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Datos | Asignaturas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control txt" id="idAsignatura" name="idAsignatura" required hidden>
                        <label class="col-form-label label">Nombre de la Asignatura:</label>
                        <input type="text" class="form-control txt" id="nombreAsignatura" name="nombreAsignatura" required>
                    </div>
                    <div class="mb-3">
                            <label class="col-form-label label">Docente:*</label>
                            <select class="form-control input-sm form-select select-picker" name="nombre_docente"
                        id="nombre_docente" required>
                        <option value="">Selecciona Docente</option>
                    </select>
                        </div>
                    <div class="mb-3">
                            <label class="col-form-label label">Departamento Perteneciente:*</label>
                            <select class="form-control input-sm form-select select-picker" name="nombre_deptoE"
                        id="nombre_deptoE" required>
                        <option value="">Selecciona Departamento</option>
                        <option value="1">Departamento de Ciencias Básicas</option>
                        <option value="2">Departamento de Ciencias Económico-Administrativas</option>
                        <option value="3">Departamento de Eléctrica y Electrónica</option>
                        <option value="4">Departamento de Metal Mecánica</option>
                        <option value="5">Departamento de Sistemas y Computación</option>
                    </select>
                        </div>
                    <div class="mb-3">
                            <label class="col-form-label label">Carrera Perteneciente:*</label>
                            <select class="form-control input-sm form-select select-picker" name="nombre_carrera"
                        id="nombre_carrera" required>
                        <option value="">Selecciona la Carrera</option>
                    </select>
                        </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Grupo:</label>
                        <input type="number" class="form-control txt" id="grupoE" name="grupoE" min="1" max="10" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Cantidad de Alumnos:</label>
                        <input type="number" class="form-control txt" id="cantidadE" name="cantidad" min="1" max="60" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Semestre:</label>
                        <input type="number" class="form-control txt" id="semestreE" name="semestreE" min="1" max="13">
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

<form method="post" id="añadirAsignaturas">
<div class="modal fade" id="ModalAgregarAsignaturas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5  w-100" id="exampleModalLabel">Datos | Asignaturas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label label">Nombre de la Asignatura:</label>
                        <input type="text" class="form-control txt" id="nombre_Asignatura" name="nombre_Asignatura" placeholder="Ingresa Nombre de Asignatura" required>
                    </div>
                    <div class="mb-3">
                            <label class="col-form-label label">Docente:*</label>
                            <select class="form-control input-sm form-select select-picker" name="nombre_docente"
                        id="nombredocente" required>
                        <option value="">Selecciona Docente</option>
                    </select>
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
                        <div class="mb-3">
                            <label class="col-form-label label">Carrera Perteneciente:*</label>
                            <select class="form-control input-sm form-select select-picker" name="nombrecarrera"
                        id="nombrecarrera" required>
                        <option value="">Selecciona la Carrera</option>
                    </select>
                        </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Grupo:</label>
                        <input type="number" class="form-control txt" id="grupo" name="grupo" min="1" max="10" placeholder="Ingresa el Grupo ej. 1" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Cantidad de Alumnos:</label>
                        <input type="number" class="form-control txt" id="cantidad" name="cantidad" min="1" max="60" placeholder="Ingresa la cantidad de alumnos ej. 25" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label label">Semestre:</label>
                        <input type="number" class="form-control txt" id="semestre" name="semestre" min="1" max="13" placeholder="Ingresa el Semestre ej. 7">
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
<script type="text/javascript" src="scripts/asignaturas.js"></script>
</body>
</html>
<?php 
}
ob_end_flush();
?>