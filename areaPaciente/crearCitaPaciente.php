<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.html';

require '../clases/claseDB.php';
?>



<div class="container pt-5 text-center">
    <h2 class="mt-5 pt-2">Crea una cita con un profesional</h2>
    <form class="pt-5" method="post">
        <!-- 1º row -->
        <div class="row pt-3">
            <!-- 1º col ESPECIALIDAD -->
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="selectEspecialidad">Elija una especialidad</label>
                    <select class="form-control" id="selectEspecialidad">
                        <option value="0">Seleccione:</option>
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
                    <label for="selectEspecialista">Elija especialista</label>
                    <select class="form-control" id="selectEspecialista">
                        <!-- <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option> -->
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
                    <label for="fechaCita">Elija la fecha</label>
                    <input type="date" name="fechaCita" max="2025-12-31" min="2020-01-01" class="form-control">
                </div>
            </div>
            <!-- 2º col HORA -->
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="horaCita">Elija la hora</label>
                    <select class="form-control" id="horaCita">
                        <option>09:55</option>
                        <option>12:20</option>
                        <option>12:50</option>
                        <option>13:05</option>
                        <option>13:20</option>
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
        Su cita ha sido creada con éxito, <a href="citasPaciente.php" class="alert-link">puede verla haciendo click aquí</a>.
    </div>

</div>

<script src="../js/obtenerEspecialistas.js" charset="utf-8"></script>



<?php
include_once '../include/footer.html';
?>
