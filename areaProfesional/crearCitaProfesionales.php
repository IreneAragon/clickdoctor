<?php

if (!isset($_SESSION)) {
    session_start();
}
$idProf = $_SESSION['idUsuario'];

include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';
require_once '../clases/claseDB.php';
?>

<div class="container mt-5 text-center">
    <h2 class="mt-5 pt-2">Concierta una cita con un paciente</h2>

    <form id="tablaCrearCitaProf" class="pt-5" method="post">

        <div class="form-group form-row mb-2">
            <div class="col-sm-12 col-md-6">
                <label for="selectCitaNombrePaciente">Paciente</label>
                <select class="form-control" id="selectCitaNombrePaciente">
                    <option value="0">Selecciona un paciente</option>
                    <?php
                        $datosPaciente = DB::pacientes();
                        foreach ($datosPaciente as $paciente) {
                            echo '<option value="'.$paciente['id_paciente'].'">'.$paciente['nombre'].' '.$paciente['apellidos'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-12 col-md-6">
                <label for="selectCitaEspecialidad">Elije la especialidad</label>
                <select class="form-control" id="selectCitaEspecialidad">
                    <option value="0">Selecciona</option>
                    <?php
                        $especialidades = DB::nombreEspecialidadesPracticaProf($idProf);
                        foreach ($especialidades as $especialidad) {
                            echo '<option value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group form-row mb-2">
            <div class="col-sm-12 col-md-6">
                <label for="fechaCitaProf">Elije la fecha</label>
                <!-- <input type="date" name="fechaCitaProf" id="fechaCitaProf" max="2025-12-31" min="2020-01-01" class="form-control"> -->
                <input type="text" name="fechaCitaProf" id="fechaCitaProf" class="campo form-control fechaCitaProf" placeholder="Haz click para elegir la fecha">

            </div>
            <div class="col-sm-12 col-md-6">
                <label for="horaCitaProf">Elije el turno</label>
                <select class="form-control" id="horaCitaProf">
                    <option value="0">Primero selecciona una fecha</option>
                    <!-- options obtenidas desde función ajax -->
                </select>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <button type="button" id="btnCrearCitaProf" class="btn btn-success">Crear cita</button>
        </div>

    </form>

    <!-- Se muestra cuando la cita ha sido creada -->
    <div id="citaCreadaProf" class="alert alert-success mt-5" role="alert">
        La cita ha sido creada con éxito, <a href="citasProfesionales.php" class="alert-link">puedes verla haciendo click aquí</a>.
    </div>

    <!-- Muestra los errores al crear una cita -->
    <div id="errorCitaProf" class="alert alert-danger mt-5" role="alert">
    </div>

</div>

<input type="hidden" name="idProf" id="idProf" value="<?= $idProf ?>">

<script src="js/obtenerDisponibilidadProf.js" charset="utf-8"></script>
<script src="js/crearCitaProfesionales.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
?>
