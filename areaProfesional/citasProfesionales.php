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
                <th scope="col">Paciente</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Modificar</th>
                <th scope="col">Cancelar</th>
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
                    <th scope="col">Paciente</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                </tr>
            </thead>
            <tbody id="listaHistorialCitasProf">
                <!-- TODO: tr obtenidas por ajax -->
            </tbody>
        </table>
    </div>
















</div>






















<script src="js/listarCitasProfesional.js" charset="utf-8"></script>
<script src="../js/utils.js" charset="utf-8"></script>
<!-- <script src="js/datepicker.js" charset="utf-8"></script> -->

<?php
include_once '../include/footer.html';
?>
