<?php

// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}

require_once '../../../clases/claseDB.php';

$idProf =  $_SESSION['idUsuario'];
$listaConversacionesProfesional = DB::listarConversacionesProfesional($idProf);

echo json_encode(array('conversaciones' => $listaConversacionesProfesional));
