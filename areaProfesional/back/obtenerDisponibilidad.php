<?php

require '../../clases/claseDB.php';

$id_especialista = filter_input(INPUT_POST, "idEspecialista", FILTER_DEFAULT);
$fecha = filter_input(INPUT_POST, "fechayyyymmdd", FILTER_DEFAULT);

$disponibilidadEspecialista =    DB::obtenerDisponibilidad($id_especialista, $fecha);

echo json_encode(array('isEmpty' => empty($disponibilidadEspecialista), 'datos' => $disponibilidadEspecialista));
