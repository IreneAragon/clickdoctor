<?php

// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_SESSION)) {
    session_start();
}

require_once '../../../clases/claseDB.php';

$id_paciente  =  $_SESSION['idUsuario'];
$id_profesional = filter_input(INPUT_POST, "idProfesional", FILTER_DEFAULT);
$asunto = filter_input(INPUT_POST, "asunto", FILTER_DEFAULT);
$mensaje = filter_input(INPUT_POST, "mensaje", FILTER_DEFAULT);

$crearConversacion = DB::crearConversacion($asunto, $mensaje, $id_profesional, $id_paciente);

echo json_encode(array('success' => $crearConversacion));
