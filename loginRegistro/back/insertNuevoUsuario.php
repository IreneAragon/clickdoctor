<?php

require '../../clases/claseDB.php';

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
// var_dump('idEspecialidades', $idEspecialidades); die;

if ($rol === "profesional") {
    // insertar especialidades del profesional
    $ultimoIdProfresional = DB::ultimoIdProfresional();
    $idNuevoProf = intval($ultimoIdProfresional['max_id']) +1;  
    $insertaEspecialidadNuevoProf = DB::insertarEspecialidadNuevoProf($idEspecialidades, $idNuevoProf);

}

if ($rol === "paciente") {
    // insert paciente
    $insertarNuevoUsuarioPaciente = DB::insertarNuevoUsuarioPaciente($nombre, $apellidos, $email, $fNacimiento, $dni, $rol, $genero, $hashPass);
} else {
    // insert profesional
    $insertarNuevoUsuarioProfesional = DB::insertarNuevoUsuarioProfesional($nombre, $apellidos, $email, $fNacimiento, $dni, $rol, $genero, $hashPass, $ejerce, $nColegiado);

}

// echo json_encode(array('especialidades' => $insertaEspecialidadNuevoProf, 'paciente' => $insertarNuevoUsuarioPaciente, 'profesional' => $insertarNuevoUsuarioProfesional ));
