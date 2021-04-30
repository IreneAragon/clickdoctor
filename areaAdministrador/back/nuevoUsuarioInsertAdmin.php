<?php

require_once '../../clases/claseDB.php';

$nombre = filter_input(INPUT_POST, "nombre", FILTER_DEFAULT);
$apellidos = filter_input(INPUT_POST, "apellidos", FILTER_DEFAULT);
$email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
$fNacimiento = filter_input(INPUT_POST, "fNacimiento", FILTER_DEFAULT);
$nColegiado = filter_input(INPUT_POST, "nColegiado", FILTER_DEFAULT);
$dni = filter_input(INPUT_POST, "dni", FILTER_DEFAULT);
$rol = filter_input(INPUT_POST, "rol", FILTER_DEFAULT);
$genero = filter_input(INPUT_POST, "genero", FILTER_DEFAULT);
$idEspecialidades = filter_input(INPUT_POST, 'idEspecialidades', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$ejerce = filter_input(INPUT_POST, 'ejerce', FILTER_DEFAULT);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);
$hashPass = password_hash($password, PASSWORD_DEFAULT);
$repuesta = 1;
if ($rol === "paciente") {
    $insertarNuevoUsuarioPaciente = DB::insertarNuevoUsuarioPaciente($nombre, $apellidos, $email, $fNacimiento, $dni, $rol, $genero, $hashPass);
} else {
    $idProfesionalInsertado = DB::insertarNuevoUsuarioProfesional($nombre, $apellidos, $email, $fNacimiento, $dni, $rol, $genero, $hashPass, $ejerce, $nColegiado);
    if(!is_null($idProfesionalInsertado)) {
        $insertaEspecialidadNuevoProf = DB::insertarEspecialidadNuevoProf($idEspecialidades, $idProfesionalInsertado);
        $repuesta = $idProfesionalInsertado;
    }
}

// echo json_encode(array('idProf' => null));
echo json_encode(array('respuesta' => $repuesta));
