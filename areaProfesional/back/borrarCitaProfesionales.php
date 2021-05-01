<?php

require '../../clases/claseDB.php';

$idCita = filter_input(INPUT_POST, "idCita", FILTER_DEFAULT);
$respuesta = DB::borrarCita($idCita);

echo json_encode(array('borradoOk' => $respuesta));
