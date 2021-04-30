<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}

include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';

?>

<div class="container mt-5">

    <div class="mt-5">
            <a href="crearCitaProfesionales.php" class="btn btn-info">concertar cita</a>
    </div>

    <h2 class="pt-4">Próximas citas</h2>
    <table class="table table-sm table-hover" id="tablaProxCitasProf">
        <thead>
            <tr>
                <th class="min-w" scope="col">Paciente</th>
                <th class="min-w" scope="col">Especialidad</th>
                <th class="min-w" scope="col">Fecha</th>
                <th class="min-w" scope="col">Hora</th>
                <th class="min-w" scope="col">Modificar</th>
                <th class="min-w" scope="col">Cancelar</th>
            </tr>
        </thead>
        <tbody id="listaCitasProfesional">
            <!-- tr obtenidas por ajax -->
        </tbody>
    </table>

    <div id="msgNoCitasProf" class="alert alert-primary" role="alert">
        No tiene citas programadas.
    </div>

    <div id="historialCitasProf">
        <h2 class="pt-4">Historial de citas</h2>
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th class="min-w" scope="col">Paciente</th>
                    <th class="min-w" scope="col">Especialidad</th>
                    <th class="min-w" scope="col">Fecha</th>
                    <th class="min-w" scope="col">Hora</th>
                </tr>
            </thead>
            <tbody id="listaHistorialCitasProf">
                <!-- tr obtenidas por ajax -->
            </tbody>
        </table>
    </div>





    <!-- Modal editar cita -->
    <div class="modal fade" id="editarCitaProf" tabindex="-1" role="dialog" aria-labelledby="editarCitaProfLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarCitaProfLabel">Editar cita</h5>
                </div>
                <div id="modalEditBodyProf" class="modal-body">
                    <!-- FORMULARIO EDITAR CITA -->
                    <form id="tablaEditCitaProf" class="" method="post">
                        <div class="row pt-3">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="editPacienteProf">Paciente</label>
                                    <p id="editPacienteProf"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="editEspecialidadProf">Especialidad</label>
                                    <p id="editEspecialidadProf"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="editFechaProf">Elija la fecha</label>
                                    <!-- <input type="date" name="fechaCita" id="fechaCita" max="2025-12-31" min="2020-01-01" class="form-control"> -->
                                    <input type="text" name="editFechaProf" id="editFechaProf" class="campo form-control">

                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="editHoraProf">Elija la hora</label>
                                    <select class="form-control" name="editHoraProf" id="editHoraProf">
                                        <option value="0">Primero seleccione una fecha</option>
                                        <!-- options obtenidas desde función ajax -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Se muestra cuando la cita ha sido creada -->
                    <div id="citaModificadaProf" class="alert alert-success mt-2" role="alert">
                        La cita ha sido modificada con éxito.
                    </div>
                    <!-- Muestra los errores al crear una cita -->
                    <div id="errorCitaProf" class="alert alert-danger mt-2" role="alert">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button id="btnGuardarCitaEditadaProf" type="button" class="btn btn-success">Guardar cambios</button>
                    <input type="hidden" name="idsCitaProf" id="idsCitaProf" value="" data-valores="">
                </div>
            </div>
        </div>
    </div>
    <!-- /modal editar cita -->



















    <!-- Modal cancelar cita -->
    <div class="modal fade" id="cancelarCitaProf" tabindex="-1" role="dialog" aria-labelledby="cancelarCitaProfLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelarCitaProfLabel">Cancelar cita</h5>
                </div>
                <div class="modal-body">
                    <h3>¿Seguro que deseas cancelar la cita?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">¡no!</button>
                    <button type="button" id="btnConfirmaBorrarProf" data-idcita="" class="btn btn-success">Sí, cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Se muestra cuando la cita ha sido borrada -->
    <div id="msgBorradoCitaProf" class="alert alert-success mt-5" role="alert">
        La cita ha sido borrada con éxito.
    </div>

</div>






















<script src="js/listarCitasProfesional.js" charset="utf-8"></script>
<script src="../js/utils.js" charset="utf-8"></script>
<!-- <script src="js/datepicker.js" charset="utf-8"></script> -->

<?php
include_once '../include/footer.html';
?>
