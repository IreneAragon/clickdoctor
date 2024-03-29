<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_SESSION)) {
    session_start();
}

require_once '../../../clases/claseDB.php';

$id_paciente = $_SESSION['idUsuario'];
$listaConversacionesPaciente = DB::listarConversacionesPaciente($id_paciente);

echo json_encode(array('conversaciones' => $listaConversacionesPaciente));
