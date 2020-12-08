<?php

require '../../clases/claseDB.php';

$id_especialidad = filter_input(INPUT_POST, "id_especialidad", FILTER_DEFAULT);

// var_dump($id_especialidad);

$datosEspecialistas = DB::obtenerEspecialista($id_especialidad);
// var_dump($datosEspecialistas);


echo json_encode(array('isEmpty' => empty($datosEspecialistas), 'datos' => $datosEspecialistas));
