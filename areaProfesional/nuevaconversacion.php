<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';
require_once '../clases/claseDB.php';
?>

<div class="mt-5 container">
    <div class="mt-5">
        <h1>Crea una conversación nueva con un paciente</h1>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Nombre Paciente -->
                    <label for="selectNombrePaciente">A quién va dirigido el mensaje</label>
                    <select class="form-control" id="selectNombrePaciente">
                        <option value="0">Selecciona un paciente</option>
                        <?php
                            $datosPaciente = DB::pacientes();
                            foreach ($datosPaciente as $paciente) {
                                echo '<option value="'.$paciente['id_paciente'].'">'.$paciente['nombre'].' '.$paciente['apellidos'].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Asunto -->
                    <label for="asuntoProf" class="form-label ml-2">Asunto</label>
                    <input type="text" id="asuntoProf" name="asuntoProf" class="form-control" placeholder="Resume el motivo de tu mensaje" required>
                </div>
            </div>
            <div class="form-row mb-2 mt-3">
                <div class="col-12">
                    <!-- Mensaje -->
                    <label for="msgProf" class="form-label ml-2">Mensaje</label>
                    <textarea name="msgProf" id="msgProf" class="form-control" rows="3" placeholder="Escribe aquí tu mensaje" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info" name="button" id="btnCrearConverProf">ENVIAR</button>
        <!-- </form> -->
    </div>

    <!-- Se muestra cuando la conversación ha sido creada -->
    <div id="converCreadaProf" class="text-center mb-5">
        <h5 class="alert alert-success mt-5" role="alert">El mensaje ha sido enviado con éxito.</h5>
        <a href="mensajesProfesionales.php" class="btn btn-primary mb-5"> Mis mensajes </a>
    </div>
    <!-- Muestra los errores al crear una conversación -->
    <div id="errorCrearConverProf" class="alert alert-danger mt-5" role="alert"></div>

</div>


<script src="mensajeria/js/crearConversacion.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
?>
