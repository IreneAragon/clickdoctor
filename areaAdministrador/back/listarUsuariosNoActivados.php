<?php
require_once '../../clases/claseDB.php';

$listaUsuariosNoActivados = DB::listarUsuariosNoActivados();

echo json_encode(array('usuarios' => $listaUsuariosNoActivados));
