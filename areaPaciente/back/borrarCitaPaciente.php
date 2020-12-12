<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../clases/claseDB.php';

$id_cita = filter_input(INPUT_POST, "id_cita", FILTER_DEFAULT);
$respuesta = DB::borrarCita($id_cita);

echo json_encode(array('borradoOk' => $respuesta));
