<?php

require_once '../../clases/claseDB.php';

$id_especialista = filter_input(INPUT_POST, "id_especialista", FILTER_DEFAULT);
$fecha = filter_input(INPUT_POST, "fecha", FILTER_DEFAULT);

$disponibilidadEspecialista =    DB::obtenerDisponibilidad($id_especialista, $fecha);

echo json_encode(array('isEmpty' => empty($disponibilidadEspecialista), 'datos' => $disponibilidadEspecialista));
