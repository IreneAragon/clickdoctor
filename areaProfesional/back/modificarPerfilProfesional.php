<?php

require '../../clases/claseDB.php';

$idProf = filter_input(INPUT_POST, "idProf", FILTER_DEFAULT);
$nombre = filter_input(INPUT_POST, "nombre", FILTER_DEFAULT);
$apellidos = filter_input(INPUT_POST, "apellidos", FILTER_DEFAULT);
$email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
$f_nacimiento = filter_input(INPUT_POST, "f_nacimiento", FILTER_DEFAULT);
$n_colegiado = filter_input(INPUT_POST, "n_colegiado", FILTER_DEFAULT);
$dni = filter_input(INPUT_POST, "dni", FILTER_DEFAULT);
$idEspecialidades = filter_input(INPUT_POST, 'idEspecialidades', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);
$passwordRep = filter_input(INPUT_POST, "passwordRep", FILTER_DEFAULT);
// var_dump('kkk',$_POST['idEspecialidades']);die;
$hashPass = "";
if(!empty($password)) {
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
}

$datosProfesional = DB::modificarDatosProfesional($nombre, $apellidos, $email, $f_nacimiento, $n_colegiado, $hashPass, $idEspecialidades, $idProf);
if(!empty($idEspecialidades)) {
    $modifEspecialidades = DB::modificarEspecialidadesProfesional($idEspecialidades, $idProf);
}
//
// echo json_encode(array('datos' => $datosProfesional));
