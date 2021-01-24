<?php

require '../../clases/claseDB.php';

session_start();
$id_paciente     =  $_SESSION['idUsuario'];

$id_especialidad = filter_input(INPUT_POST, "id_especialidad", FILTER_DEFAULT);
$id_profesional  = filter_input(INPUT_POST, "id_profesional", FILTER_DEFAULT);
$fecha_cita      = filter_input(INPUT_POST, "fecha_cita", FILTER_DEFAULT);
$hora_cita       = filter_input(INPUT_POST, "hora_cita", FILTER_DEFAULT);
$fechaDB         = date("Y-m-d", strtotime($fecha_cita) );



$consulta = 'INSERT INTO citas (fecha, orden, id_especialidad, id_prof_FK, id_pac_FK)
             VALUES ("'. $fechaDB .'", "'. $hora_cita .'", "'. $id_especialidad .'", "'. $id_profesional .'", "'. $id_paciente .'")';

$crearCitaPaciente = DB::insertar($consulta);

echo json_encode(array('success' => $crearCitaPaciente));
