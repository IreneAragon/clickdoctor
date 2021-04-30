<?php
require_once '../../clases/claseDB.php';

$id = filter_input(INPUT_POST, "id", FILTER_DEFAULT);
$rol = filter_input(INPUT_POST, "rol", FILTER_DEFAULT);

$activaUsuario = DB::activarUsuario($id, $rol);

echo json_encode(array('activado' => $activaUsuario));
