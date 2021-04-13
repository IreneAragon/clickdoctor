<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';
?>


<div class="mt-5 container">
    <div class="mt-5">
        <h1>Crea una conversación nueva con un profesional</h1>
            <div class="form-row mb-2">
                <div class="col-sm-6 col-12">
                    <!-- Especialidad -->
                    <label for="selectEspecialidadMsg">Elija una especialidad</label>
                    <select class="form-control" id="selectEspecialidadMsg">
                        <option value="0">Seleccione</option>
                        <?php
                            $especialidades = DB::especialidades();
                            foreach ($especialidades as $especialidad) {
                                echo '<option value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-6 col-12">
                    <!-- Prosesional -->
                    <!-- <label for="newProf" class="form-label ml-2">Profesional</label>
                    <input type="text" id="newProf" name="newProf" class="form-control" placeholder="Elija un profesional" required> -->
                    <label for="selectEspecialistaMsg">Elija especialista</label>
                    <select class="form-control" id="selectEspecialistaMsg">
                        <option value="0">Primero seleccione una especialidad</option>
                        <!-- options obtenidas desde función ajax -->
                    </select>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-12">
                    <!-- Asunto -->
                    <label for="newAsunto" class="form-label ml-2">Asunto</label>
                    <input type="text" id="newAsunto" name="newAsunto" class="form-control" placeholder="Resume el motivo de tu mensaje" required>
                </div>
            </div>
            <div class="form-row mb-2 mt-3">
                <div class="col-12">
                    <!-- Mensaje -->
                    <label for="newMens" class="form-label ml-2">Mensaje</label>
                    <textarea name="newMens" id="newMens" class="form-control" rows="3" placeholder="Escribe aquí tu mensaje" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info" name="button" id="btnCrearConver">ENVIAR</button>
        <!-- </form> -->
    </div>

    <!-- Se muestra cuando la conversación ha sido creada -->
    <div id="converCreada" class="text-center mb-5">
        <h5 class="alert alert-success mt-5" role="alert">Su mensaje ha sido enviado con éxito, el profesional le contestará lo antes posible.</h5>
        <a href="mensajesPaciente.php" class="btn btn-primary mb-5"> Mis mensajes </a>
    </div>
    <!-- Muestra los errores al crear una conversación -->
    <div id="errorCrearConver" class="alert alert-danger mt-5" role="alert"></div>

</div>

<script src="mensajeria/js/obtenerEspecialistasMsg.js" charset="utf-8"></script>
<script src="mensajeria/js/crearConversacion.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
