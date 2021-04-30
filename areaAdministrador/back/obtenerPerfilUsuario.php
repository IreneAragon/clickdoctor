<?php

require_once '../../clases/claseDB.php';

$idUsuario = filter_input(INPUT_POST, "idUsuario", FILTER_DEFAULT);
$rolUsuario = filter_input(INPUT_POST, "rolUsuario", FILTER_DEFAULT);

if ($rolUsuario === "paciente") {
    $datosPaciente = DB::datosPaciente($idUsuario);
    echo json_encode(array('datosUsuario' => $datosPaciente));
}

if ($rolUsuario === "profesional") {
    $datosProfesional = DB::datosProfesional($idUsuario);
    echo json_encode(array('datosUsuario' => $datosProfesional));
}
