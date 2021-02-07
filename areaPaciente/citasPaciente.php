<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.html';
?>

<div id="contenidoCitas" class="main">
    <div class="container pt-5">
        <!-- 1º row contiene botón para pedir cita-->
        <div class="row">
            <div class="col">
                <a href="crearCitaPaciente.php" class="btn btn-info">Pedir cita</a>
            </div>
        </div>

        <!-- 2º row contiene listado de próximas citas -->
        <div class="row">
            <div class="col">
                <h2 class="pt-4">Próximas citas</h2>
                <table class="table table-sm table-hover" id="tablaProxCitas">
                    <thead>
                        <tr>
                            <th scope="col">Profesional</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Cancelar</th>
                        </tr>
                    </thead>
                    <tbody id="listaCitasPaciente">
                        <!-- tr obtenidas por ajax -->
                    </tbody>
                </table>

                <div id="msgNoCitas" class="alert alert-primary" role="alert">
                    No tiene citas programadas.
                </div>

            </div>
        </div> <!-- /row2 -->

        <!-- 3º row contiene listado de citas pasadas -->
        <div id="historialCitas" class="row">
            <div class="col">
                <h2 class="pt-4">Historial de citas</h2>
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Profesional</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                        </tr>
                    </thead>
                    <tbody id="listaHistorialCitas">
                        <!-- <tr>
                            <td>Dr Periquito Palotes</td>
                            <td>Medicina General</td>
                            <td>10-10-2020</td>
                            <td>09:56</td>
                        </tr>
                        <tr>
                            <td>Dr Periquito Palotes</td>
                            <td>Medicina General</td>
                            <td>10-10-2020</td>
                            <td>09:56</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div> <!-- /row3 -->







        <!-- Modal editar cita -->
        <div class="modal fade" id="editarCita" tabindex="-1" role="dialog" aria-labelledby="editarCitaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarCitaLabel">Editar cita</h5>
                    </div>
                    <div id="modalEditBody" class="modal-body">
                        <!-- TODO:
                                - mortrar el mismo formulario de crear cita
                                    - xxtabla con id tablaProxCitasxx
                                - con los valores editables
                                - cuando click "guardar cambios" llame función alter table
                                - cuando cambios se guarden: cerrar modal  y mostrar mensaje OK
                        -->
                        <!-- <h1>contenido</h1> -->

                        <!-- FORMULARIO EDITAR CITA -->
                        <form id="tablaEditCita" class="" method="post">
                            <!-- 1º row -->
                            <div class="row pt-3">
                                <!-- 1º col ESPECIALIDAD -->
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="editEspecialista">Especialista</label>
                                        <p id="editEspecialista"></p>
                                        <!-- <input type="text" id="editEspecialidad" name="editEspecialidad" value=""> -->
                                        <!-- <select class="form-control" id="editEspecialidad"> -->
                                            <!-- <option value="0">Seleccione</option> -->
                                            <?php
                                                // $especialidades = DB::especialidades();
                                                // foreach ($especialidades as $especialidad) {
                                                //     echo '<option value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
                                                // }
                                            ?>
                                        <!-- </select> -->
                                    </div>
                                </div>
                                <!-- 2º col ESPECIALISTA -->
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="editEspecialidad">Especialidad</label>
                                        <p id="editEspecialidad"></p>
                                        <!-- <select class="form-control" id="editEspecialidad"> -->
                                            <!-- <option value="0">Primero seleccione una especialidad</option> -->
                                            <!-- options obtenidas desde función ajax -->
                                        <!-- </select> -->
                                    </div>
                                </div>
                            </div>
                            <!-- /1º row -->
                            <!-- 2º row -->
                            <div class="row pt-3">
                                <!-- 1º col FECHA -->
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="fechaCita">Elija la fecha</label>
                                        <!-- <input type="date" name="fechaCita" id="fechaCita" max="2025-12-31" min="2020-01-01" class="form-control"> -->
                                        <input type="text" name="editFecha" id="editFecha" class="campo form-control">

                                    </div>
                                </div>
                                <!-- 2º col HORA -->
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="horaCita">Elija la hora</label>
                                        <select class="form-control" id="editHora">
                                            <option value="0">Primero seleccione una fecha</option>
                                            <!-- options obtenidas desde función ajax -->
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- /2º row -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button id="btnGuardarCitaEditada" type="button" class="btn btn-success">Guardar cambios</button>
                        <input type="hidden" name="idsCita" id="idsCita" value="" data-valores="">
                    </div>
                </div>
            </div>
        </div> <!-- /modal editar cita -->






        <!-- Modal cancelar cita -->
        <div class="modal fade" id="cancelarCita" tabindex="-1" role="dialog" aria-labelledby="cancelarCitaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelarCitaLabel">Cancelar cita</h5>
                    </div>
                    <div class="modal-body">
                        <h3>¿Seguro que desea cancelar la cita?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">¡no!</button>
                        <button type="button" id="btnConfirmaBorrar" data-idcita="" class="btn btn-success">Sí, cancelar</button>
                    </div>
                </div>
            </div>
        </div> <!-- /modal cancelar cita -->
        <!-- Se muestra cuando la cita ha sido borrada -->
        <div id="msgBorradoCita" class="alert alert-success mt-5" role="alert">
            Su cita ha sido borrada con éxito.
        </div>
    </div> <!-- /container -->
</div> <!-- /main -->

<script src="js/listarCitasPaciente.js" charset="utf-8"></script>
<script src="../js/utils.js" charset="utf-8"></script>
<!-- <script src="js/obtenerEspecialistas.js" charset="utf-8"></script> -->
<!-- <script src="js/obtenerDisponibilidad.js" charset="utf-8"></script> -->
<!-- <script src="js/editarCita.js" charset="utf-8"></script> -->
<script src="js/datepicker.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
?>
