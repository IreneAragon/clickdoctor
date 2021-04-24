<?php

require '../../clases/claseDB.php';

$idProf = filter_input(INPUT_POST, "idProf", FILTER_DEFAULT);
$datosProfesional = DB::datosProfesional($idProf);

echo json_encode(array('datos' => $datosProfesional));
