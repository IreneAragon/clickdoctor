<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../../../clases/claseDB.php';

$idConver = filter_input(INPUT_POST, "idConver", FILTER_DEFAULT);
$eliminarConversacion = DB::eliminarConversacion($idConver);

echo json_encode(array('borradoOk' => $eliminarConversacion));



 ?>
