
<?php

require '../../clases/claseDB.php';

$id_especialidad = filter_input(INPUT_POST, "id_especialidad", FILTER_DEFAULT);
$id_profesional = filter_input(INPUT_POST, "id_profesional", FILTER_DEFAULT);
$id_paciente = filter_input(INPUT_POST, "id_paciente", FILTER_DEFAULT);
$fecha_cita = filter_input(INPUT_POST, "fecha_cita", FILTER_DEFAULT);
$hora_cita = filter_input(INPUT_POST, "hora_cita", FILTER_DEFAULT);

// $crearCitaPaciente = DB::insertarCita($id_especialidad, $id_profesional, $id_paciente, $fecha_cita, $hora_cita);


$consulta = 'INSERT INTO citas (fecha, orden, id_especialidad, id_prof_FK, id_pac_FK)
             VALUES ("'. $fecha_cita .'", "'. $hora_cita .'", "'. $id_especialidad .'", "'. $id_profesional .'", "'. $id_paciente .'")';

$crearCitaPaciente = DB::insertar($consulta);

echo json_encode(array('success' => $crearCitaPaciente));
