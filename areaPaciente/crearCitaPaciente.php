<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';

// require '../clases/claseDB.php';
?>

<div class="container pt-5 text-center">
    <h2 class="mt-5 pt-2">Crea una cita con un profesional</h2>
    <form id="tablaCrearCita" class="pt-5" method="post">
        <!-- 1º row -->
        <div class="row pt-3">
            <!-- 1º col ESPECIALIDAD -->
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="selectEspecialidad">Elige una especialidad</label>
                    <select class="form-control" id="selectEspecialidad">
                        <option value="0">Selecciona</option>
                        <?php
                            $especialidades = DB::especialidades();
                            foreach ($especialidades as $especialidad) {
                                echo '<option value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!-- 2º col ESPECIALISTA -->
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="selectEspecialista">Elige especialista</label>
                    <select class="form-control" id="selectEspecialista">
                        <option value="0">Primero selecciona una especialidad</option>
                        <!-- options obtenidas desde función ajax -->
                    </select>
                </div>
            </div>
        </div>
        <!-- /1º row -->
        <!-- 2º row -->
        <div class="row pt-3">
            <!-- 1º col FECHA -->
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="fechaCita">Elige la fecha</label>
                    <!-- <input type="date" name="fechaCita" id="fechaCita" max="2025-12-31" min="2020-01-01" class="form-control"> -->
                    <input type="text" name="fechaCita" id="fechaCita" class="campo form-control" placeholder="Haga click para elegir la fecha">

                </div>
            </div>
            <!-- 2º col HORA -->
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="horaCita">Elija la hora</label>
                    <select class="form-control" id="horaCita">
                        <option value="0">Primero selecciona una fecha</option>
                        <!-- options obtenidas desde función ajax -->
                    </select>
                </div>
            </div>
        </div>
        <!-- /2º row -->
        <!-- 3º row -->
        <div class="row mt-2">
            <div class="col">
                <button type="button" id="btnCrearCita" class="btn btn-success">Crear cita</button>
            </div>
        </div>
        <!-- /3º row -->
    </form>

    <!-- Se muestra cuando la cita ha sido creada -->
    <div id="citaCreada" class="alert alert-success mt-5" role="alert">
        La cita ha sido creada con éxito, <a href="citasPaciente.php" class="alert-link">puedes verla haciendo click aquí</a>.
    </div>

    <!-- Muestra los errores al crear una cita -->
    <div id="errorCita" class="alert alert-danger mt-5" role="alert">
    </div>
</div>

<script src="js/obtenerEspecialistas.js" charset="utf-8"></script>
<script src="js/obtenerDisponibilidad.js" charset="utf-8"></script>
<script src="js/crearCita.js" charset="utf-8"></script>

<?php
include_once '../include/footer.html';
?>
