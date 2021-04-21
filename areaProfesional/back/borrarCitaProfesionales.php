<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require '../../clases/claseDB.php';

$idCita = filter_input(INPUT_POST, "idCita", FILTER_DEFAULT);
$respuesta = DB::borrarCita($idCita);

echo json_encode(array('borradoOk' => $respuesta));
