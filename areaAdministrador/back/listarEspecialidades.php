<?php
require_once '../../clases/claseDB.php';

$especialidades = DB::especialidades();

echo json_encode(array('especialidades' => $especialidades));
