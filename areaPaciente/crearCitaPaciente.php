<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.html';

require '../clases/claseDB.php';
?>

<div class="container pt-5 text-center">
    <h2 class="mt-5 pt-2">Crea una cita con un profesional</h2>
    <form id="tablaCrearCita" class="pt-5" method="post">
        <!-- 1º row -->
        <div class="row pt-3">
            <!-- 1º col ESPECIALIDAD -->
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="selectEspecialidad">Elija una especialidad</label>
                    <select class="form-control" id="selectEspecialidad">
                        <option value="0">Seleccione</option>
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
                        <option value="0">Primero seleccione una especialidad</option>
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
                    <label for="fechaCita">Elija la fecha</label>
                    <!-- <input type="date" name="fechaCita" id="fechaCita" max="2025-12-31" min="2020-01-01" class="form-control"> -->
                    <input type="text" name="fechaCita" id="fechaCita" class="campo form-control">

                </div>
            </div>
            <!-- 2º col HORA -->
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="horaCita">Elija la hora</label>
                    <select class="form-control" id="horaCita">
                        <option value="0">Primero seleccione una fecha</option>
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
        Su cita ha sido creada con éxito, <a href="citasPaciente.php" class="alert-link">puede verla haciendo click aquí</a>.
    </div>

    <!-- Muestra los errores al crear una cita -->
    <div id="errorCita" class="alert alert-danger mt-5" role="alert">

    </div>

</div>

<script src="js/obtenerEspecialistas.js" charset="utf-8"></script>
<script src="js/obtenerDisponibilidad.js" charset="utf-8"></script>
<script src="js/crearCita.js" charset="utf-8"></script>

<!-- <script>
    // TODO cambiar el icono para moverse entre meses
    //funcion que bloquea sábados y domingo
    function noExcursion(date){
        var day = date.getDay();
        // var string = jQuery.datepicker.formatDate('dd/mm/yy', date);
        // Días que se bloquean, sábado-6 y domingo-0
        return [(day != 0 && day != 6), ''];
    };
var fecha = document.getElementById("fechaCita");
let fechaCita = fecha.value;
console.log('fechaCita',fechaCita);
    //Crear el datepicker
    $("#fechaCita").datepicker({
        beforeShowDay: noExcursion,
        firstDay: 1,
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['D','L','M','X','J','V','S'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        showAnim: "fadeIn"
    });

</script> -->

<?php
include_once '../include/footer.html';
?>
