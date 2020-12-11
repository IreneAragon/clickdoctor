<?php
require '../../clases/claseDB.php';

$id_paciente = filter_input(INPUT_POST, "id_paciente", FILTER_DEFAULT);

$listadoCitas = DB::listarCitasPaciente($id_paciente);


echo json_encode(array('citas' => $listadoCitas));
