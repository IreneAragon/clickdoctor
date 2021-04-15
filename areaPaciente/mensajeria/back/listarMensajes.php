<?php

// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../../../clases/claseDB.php';

$id_chat = filter_input(INPUT_POST, "id_chat", FILTER_DEFAULT);
$listarMensajesChat = DB::listarMensajesChat($id_chat);
$datosCorreo = DB::obtenerDatosCorreo($id_chat);
$datosProfesional = DB::obtenerDatosProfesionalChat($id_chat);

echo json_encode(array('mensajes' => $listarMensajesChat, 'profesional' => $datosProfesional, 'correo' => $datosCorreo));
