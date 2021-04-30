<?php
require_once '../../clases/claseDB.php';

$rol = filter_input(INPUT_POST, "rol", FILTER_DEFAULT);

$listaUsuarios = DB::listarUsuarios($rol);

echo json_encode(array('usuarios' => $listaUsuarios));
