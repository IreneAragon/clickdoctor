<?php

require_once '../../clases/claseDB.php';

if (!isset($_SESSION)) {
    session_start();
}

$idProfesional =  $_SESSION['idUsuario'];
$listadoInformes = DB::listarInformesProfesional($idProfesional);

echo json_encode(array('informes' => $listadoInformes));
