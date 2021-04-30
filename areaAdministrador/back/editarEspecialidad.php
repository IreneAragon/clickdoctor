<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../clases/claseDB.php';

$idEsp = filter_input(INPUT_POST, "idEsp", FILTER_DEFAULT);
$especialidad = filter_input(INPUT_POST, "valorNombreEspEditada", FILTER_DEFAULT);
$editarEspecialidad = DB::editarEspecialidad($idEsp, $especialidad);

echo json_encode(array('success' => $editarEspecialidad));
