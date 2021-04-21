<?php
require '../../clases/claseDB.php';

if (!isset($_SESSION)) {
    session_start();
}
$idProfesional =  $_SESSION['idUsuario'];
$filtro = filter_input(INPUT_POST, "filtro", FILTER_DEFAULT);

$listadoCitasProfesionales = DB::listarCitasProfesional($idProfesional, $filtro);

echo json_encode(array('citas' => $listadoCitasProfesionales));
