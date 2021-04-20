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
$idPaciente = filter_input(INPUT_POST, "idPaciente", FILTER_DEFAULT);
$asunto = filter_input(INPUT_POST, "asunto", FILTER_DEFAULT);
$mensaje = filter_input(INPUT_POST, "mensaje", FILTER_DEFAULT);

$crearConversacion = DB::crearConversacion($asunto, $mensaje, $idProf, $idPaciente);

echo json_encode(array('success' => $crearConversacion));
