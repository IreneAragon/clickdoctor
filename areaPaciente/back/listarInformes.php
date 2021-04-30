<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../../clases/claseDB.php';

if (!isset($_SESSION)) {
    session_start();
}

$idPaciente =  $_SESSION['idUsuario'];
$listadoInformesPaciente = DB::listarInformesPaciente($idPaciente);

echo json_encode(array('informes' => $listadoInformesPaciente));
