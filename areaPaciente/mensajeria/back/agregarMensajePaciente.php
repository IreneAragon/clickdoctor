<?php

// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../../../clases/claseDB.php';

$id_chat = filter_input(INPUT_POST, "id_chat", FILTER_DEFAULT);
$nuevoMensaje = filter_input(INPUT_POST, "nuevoMensaje", FILTER_DEFAULT);
$rol = '1';

$insertarMensaje = DB::insertarMensajePaciente($id_chat, $nuevoMensaje, $rol);

echo json_encode(array('success' => $insertarMensaje));
