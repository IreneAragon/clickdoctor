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
                <table class="table table-sm table-hover">
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
                    <tbody>
                        <tr>
                            <td>Dr Periquito Palotes</td>
                            <td>Medicina General</td>
                            <td>10-10-2021</td>
                            <td>09:56</td>
                            <td><button type="button" class="btn btn-warning btn-sm mt-0 px-3" data-toggle="modal" data-target="#editarCita"><i class="fas fa-pen" aria-hidden="true"></i></button></td>
                            <td><button type="button" class="btn btn-danger btn-sm mt-0 px-3" data-toggle="modal" data-target="#cancelarCita"><i class="fas fa-trash" aria-hidden="true"></i></button></td>
                        </tr>
                        <tr>
                            <td>Dr Periquito Palotes</td>
                            <td>Medicina General</td>
                            <td>10-10-2021</td>
                            <td>09:56</td>
                            <td><button type="button" class="btn btn-warning btn-sm mt-0 px-3"><i class="fas fa-pen" aria-hidden="true"></i></button></td>
                            <td><button type="button" class="btn btn-danger btn-sm mt-0 px-3"><i class="fas fa-trash" aria-hidden="true"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> <!-- /row2 -->

        <!-- 3º row contiene listado de citas pasadas -->
        <div class="row">
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
                    <tbody>
                        <tr>
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
                        </tr>
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
                    <div class="modal-body">
                        <h1>contenido</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success">Guardar cambios</button>
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
                        <button type="button" class="btn btn-success">Sí, cancelar</button>
                    </div>
                </div>
            </div>
        </div> <!-- /modal cancelar cita -->
    </div> <!-- /container -->
</div> <!-- /main -->


<?php
include_once '../include/footer.html';
?>