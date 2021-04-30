<?php

require_once '../../clases/claseDB.php';

$idUsuario = filter_input(INPUT_POST, "idUsuario", FILTER_DEFAULT);
$rolUsuario = filter_input(INPUT_POST, "rolUsuario", FILTER_DEFAULT);
$nombre = filter_input(INPUT_POST, "nombre", FILTER_DEFAULT);
$apellidos = filter_input(INPUT_POST, "apellidos", FILTER_DEFAULT);
$email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
$fNacimiento = filter_input(INPUT_POST, "fNacimiento", FILTER_DEFAULT);
$n_colegiado = filter_input(INPUT_POST, "n_colegiado", FILTER_DEFAULT);
$idEspecialidades = filter_input(INPUT_POST, "idEspecialidades", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

if ($rolUsuario === "paciente") {
    $adminModificaPaciente = DB::adminModificaPaciente($idUsuario, $nombre, $apellidos, $email, $fNacimiento);
    echo json_encode(array('success' => $adminModificaPaciente));
}

if ($rolUsuario === "profesional") {
    $adminModificaProfesional = DB::adminModificaProfesional($idUsuario, $nombre, $apellidos, $email, $fNacimiento, $n_colegiado);
    $adminModificaEspecialidadesProfesional = DB::modificarEspecialidadesProfesional($idEspecialidades, $idUsuario);
    echo json_encode(array('successData' => $adminModificaProfesional, 'successEsp' => $adminModificaEspecialidadesProfesional ));
}
