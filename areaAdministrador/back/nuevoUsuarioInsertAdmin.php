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
$ejerce = filter_input(INPUT_POST, 'ejerce', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

$hashPass = password_hash($password, PASSWORD_DEFAULT);

if ($rol === "paciente") {
    // insert paciente
    $insertarNuevoUsuarioPaciente = DB::insertarNuevoUsuarioPaciente($nombre, $apellidos, $email, $fNacimiento, $dni, $rol, $genero, $hashPass);
} else {
    // insert profesional
    // $insertarNuevoUsuarioProfesional = DB::insertarNuevoUsuarioProfesional($nombre, $apellidos, $email, $fNacimiento, $dni, $rol, $genero, $hashPass, $ejerce, $nColegiado);

}

// $datosProfesional = DB::modificarDatosProfesional($nombre, $apellidos, $email, $f_nacimiento, $n_colegiado, $hashPass, $idEspecialidades, $idProf);
// if(!empty($idEspecialidades)) {
//     $modifEspecialidades = DB::modificarEspecialidadesProfesional($idEspecialidades, $idProf);
// }
//
// echo json_encode(array('datos' => $datosProfesional));
