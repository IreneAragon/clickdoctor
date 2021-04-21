<?php

require '../../clases/claseDB.php';


$idPaciente = filter_input(INPUT_POST, "idPaciente", FILTER_DEFAULT);
$idProfesional = filter_input(INPUT_POST, "idProfesional", FILTER_DEFAULT);
$idEspecialidad = filter_input(INPUT_POST, "idEspecialidad", FILTER_DEFAULT);
$fechaCita = filter_input(INPUT_POST, "fechaCita", FILTER_DEFAULT);
$horaCita = filter_input(INPUT_POST, "horaCita", FILTER_DEFAULT);
$fechaDB = date("Y-m-d", strtotime($fechaCita));

$consulta = 'INSERT INTO citas (fecha, orden, id_especialidad, id_prof_FK, id_pac_FK)
             VALUES ("'. $fechaDB .'", "'. $horaCita .'", "'. $idEspecialidad .'", "'. $idProfesional .'", "'. $idPaciente .'")';

$crearCitaProfesional = DB::insertar($consulta);

echo json_encode(array('success' => $crearCitaProfesional));
