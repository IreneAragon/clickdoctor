<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once '../include/cabeceraAdmins.html';
include_once '../include/navAdministrador.php';

if (!isset($_SESSION)) {
    session_start();
}

?>

<div class="container mt-5">

    <h2 class="text-center mt-5">Gestión de especialidades</h2>

    <!-- btn crear especialidad -->
    <div class="d-flex justify-content-center m-3">
        <button type='button' id="btnAgregarEspecialidad" class='btn btn-info' data-toggle='modal' data-target='#AgregarNuevaEspecialidad'>Añadir nueva</button>
    </div>

    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody id="listaEspecialidades">
            <!-- tr obtenidas por ajax -->
        </tbody>
    </table>

    <!-- Modal editar especialidad -->
    <div class="modal fade" id="editarEspecialidad" tabindex="-1" role="dialog" aria-labelledby="editarEspecialidadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarEspecialidadLabel">Editar Especialidad</h5>
                </div>
                <div id="modalEditBody" class="modal-body">
                    <form id="tablaEditEspecialidad" class="" method="post">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="editNombreEsp">Nombre</label>
                                <input type="text" id="editNombreEsp" class="form-control">
                                <!-- <p id="editNombreEsp"></p> -->
                            </div>
                        </div>

                    </form>
                    <!-- Se muestra cuando la especialidad ha sido modificada -->
                    <div id="especialidadModificada" class="alert alert-success mt-2" role="alert">
                        Especialidad modificada con éxito
                    </div>
                    <!-- Muestra los errores al editar una especialidad -->
                    <div id="errorEditEsp" class="alert alert-danger mt-2" role="alert">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button id="btnGuardarEditEsp" type="button" class="btn btn-success">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eliminar especialidad -->
    <div class="modal fade" id="eliminarEspecialidad" tabindex="-1" role="dialog" aria-labelledby="eliminarEspecialidadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarEspecialidadLabel">Eliminar especialidad</h5>
                </div>
                <div class="modal-body">
                    <h3>¿Seguro que desea eliminar la especialidad?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">¡no!</button>
                    <button type="button" id="btnConfirmaBorrarEsp" data-idcita="" class="btn btn-success">Sí, eliminar</button>
                </div>
            </div>
        </div>
    </div> <!-- /modal cancelar cita -->
    <!-- Se muestra cuando la cita ha sido borrada -->
    <div id="msgBorradoEsp" class="alert alert-success mt-5" role="alert">
        La especialidad se ha eliminado con éxito.
    </div>

    <!-- Modal agregar nueva especialidad -->
    <div class="modal fade" id="AgregarNuevaEspecialidad" tabindex="-1" role="dialog" aria-labelledby="AgregarNuevaEspecialidadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AgregarNuevaEspecialidadLabel">Añadir Especialidad</h5>
                </div>
                <div id="modalAddBody" class="modal-body">
                    <form id="tablaAddEspecialidad" class="" method="post">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="nuevaEspecialidad">Nombre</label>
                                <input type="text" id="nuevaEspecialidad" class="form-control">
                            </div>
                        </div>
                    </form>
                    <!-- Se muestra cuando la especialidad ha sido añadida -->
                    <div id="especialidadAgregada" class="alert alert-success mt-2" role="alert">
                        Especialidad añadida con éxito
                    </div>
                    <!-- Muestra los errores al editar una especialidad -->
                    <div id="errorAddEsp" class="alert alert-danger mt-2" role="alert">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrarNuevaEsp" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnGuardarNuevaEsp" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/gestionarEspecialidades.js" charset="utf-8"></script>

<?php
include_once '../include/footer.html';
?>
