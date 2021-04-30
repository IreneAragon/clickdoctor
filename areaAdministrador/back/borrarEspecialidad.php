<?php
require_once '../../clases/claseDB.php';

$idEsp = filter_input(INPUT_POST, "idEsp", FILTER_DEFAULT);
$borrarEspecialidad = DB::borrarEspecialidad($idEsp);

echo json_encode(array('borradoOk' => $borrarEspecialidad));
