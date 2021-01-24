<?php

require '../../clases/claseDB.php';

$id_especialista = filter_input(INPUT_POST, "id_especialista", FILTER_DEFAULT);
$fecha = filter_input(INPUT_POST, "fecha", FILTER_DEFAULT);
var_dump('$fecha---------',$fecha);

$disponibilidadEspecialista =    DB::obtenerDisponibilidad($id_especialista, $fecha);

echo json_encode(array('isEmpty' => empty($disponibilidadEspecialista), 'datos' => $disponibilidadEspecialista));
