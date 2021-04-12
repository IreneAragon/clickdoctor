<?php

require '../../../clases/claseDB.php';

$id_especialidad = filter_input(INPUT_POST, "id_especialidad", FILTER_DEFAULT);

$datosEspecialistas = DB::obtenerEspecialista($id_especialidad);

echo json_encode(array('isEmpty' => empty($datosEspecialistas), 'datos' => $datosEspecialistas));
