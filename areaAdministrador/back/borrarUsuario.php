<?php
require '../../clases/claseDB.php';

$id_usuario = filter_input(INPUT_POST, "id_usuario", FILTER_DEFAULT);
$rol = filter_input(INPUT_POST, "rol", FILTER_DEFAULT);

$borrarUsuario = DB::borrarUsuario($id_usuario, $rol);

echo json_encode(array('borradoOk' => $borrarUsuario));
