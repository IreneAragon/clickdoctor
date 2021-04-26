<?php
require '../../clases/claseDB.php';

$especialidades = DB::especialidades();

echo json_encode(array('especialidades' => $especialidades));