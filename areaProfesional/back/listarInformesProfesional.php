<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// var_dump($nombreInforme);die();
require_once '../../clases/claseDB.php';

if (!isset($_SESSION)) {
    session_start();
}

$idProfesional =  $_SESSION['idUsuario'];
$listadoInformes = DB::listarInformesProfesional($idProfesional);

echo json_encode(array('informes' => $listadoInformes));
