<?php
require '../../clases/claseDB.php';

if (!isset($_SESSION)) {
    session_start();
}
$id_paciente =  $_SESSION['idUsuario'];
$filtro = filter_input(INPUT_POST, "filtro", FILTER_DEFAULT);

$listadoCitas = DB::listarCitasPaciente($id_paciente, $filtro);


echo json_encode(array('citas' => $listadoCitas));
