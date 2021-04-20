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
    <div class="row">
        <div class="col">
            <h2 class="pt-5">MENSAJES</h2>

            <a href="nuevaConversacion.php " class="btn btn-primary"> Crear nueva conversación </a>

            <div class="container mt-5">
                <!-- Se muestra cuando la conversación ha sido borrada -->
                <!-- <div id="msgEliminarConver" class="alert alert-success mt-5" role="alert">
                    Su conversación ha sido borrada con éxito.
                </div> -->
                <h3>Mis conversaciones</h3>
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Asunto</th>
                            <th scope="col">Abrir</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="listaConversacionesProfesional">
                        <!-- tr obtenidas por ajax en listarConversacionesProfesional.js -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



















<?php
include_once '../include/footer.html';
?>
