<?php
require '../../clases/claseDB.php';

$id_paciente = filter_input(INPUT_POST, "id_paciente", FILTER_DEFAULT);
$filtro = filter_input(INPUT_POST, "filtro", FILTER_DEFAULT);

$listadoCitas = DB::listarCitasPaciente($id_paciente, $filtro);


echo json_encode(array('citas' => $listadoCitas));
