<?php

require '../../clases/claseDB.php';

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



// var_dump('$datosPaciente',$datosPaciente);
// var_dump('$datosProfesional',$datosProfesional);die;


// echo json_encode(array('datosPaciente' => $datosPaciente));
// echo json_encode(array('datosProfesional' => $datosProfesional, 'datosPaciente' => $datosPaciente));