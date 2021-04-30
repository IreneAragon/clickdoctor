<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once '../../clases/claseDB.php';

$idAdmin =  $_SESSION['idUsuario'];
$nuevaEspecialidad = filter_input(INPUT_POST, "nuevaEspecialidad", FILTER_DEFAULT);

$agregarEspecialidad = DB::agregarEspecialidad($nuevaEspecialidad, $idAdmin);

echo json_encode(array('success' => $agregarEspecialidad));
