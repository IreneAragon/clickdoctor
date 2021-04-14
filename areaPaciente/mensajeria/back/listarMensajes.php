<?php

// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}

require_once '../../../clases/claseDB.php';

$id_chat = filter_input(INPUT_POST, "id_chat", FILTER_DEFAULT);

$listarMensajesChat = DB::listarMensajesChat($id_chat);
$datosProfesional = DB::obtenerDatosProfesionalChat($id_chat);
// var_dump($id_chat);
// var_dump($datosProfesional);
// die();


echo json_encode(array('mensajes' => $listarMensajesChat, 'profesional' => $datosProfesional));
