<?php
require_once '../../clases/claseDB.php';

if (!isset($_SESSION)) {
    session_start();
}
$id_paciente     =  $_SESSION['idUsuario'];
$id_cita = filter_input(INPUT_POST, "idCita", FILTER_DEFAULT);
$id_especialidad = filter_input(INPUT_POST, "idEsp", FILTER_DEFAULT);
$id_profesional  = filter_input(INPUT_POST, "idProf", FILTER_DEFAULT);
$fecha_cita      = filter_input(INPUT_POST, "fecha", FILTER_DEFAULT);
$hora_cita       = filter_input(INPUT_POST, "hora", FILTER_DEFAULT);
$fechaDB         = date("Y-m-d", strtotime($fecha_cita) );

// $consulta = 'UPDATE citas SET fecha = '.$fechaDB.', orden ='.$hora_cita .' WHERE id_cita ='.$id_cita ;

$editarCitaPaciente = DB::editarCitaPaciente($id_cita, $fechaDB, $hora_cita);
echo json_encode(array('success' => $editarCitaPaciente));
