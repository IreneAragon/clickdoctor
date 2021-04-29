<?php
require '../../clases/claseDB.php';

$listaUsuariosNoActivados = DB::listarUsuariosNoActivados();

echo json_encode(array('usuarios' => $listaUsuariosNoActivados));