<?php

// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}

require_once '../../../clases/claseDB.php';

$id_paciente =  $_SESSION['idUsuario'];
$listaConversacionesPaciente = DB::listarConversacionesPaciente($id_paciente);
// $id_profesional = $listaConversacionesPaciente['id_prof_FK'];

// Obtener variable que almacena el ID de los profesionales para construir el nombre completo del mismo
$arrayNombres = array();
foreach ($listaConversacionesPaciente as $key => $conversacion) {
    $id_profesional = $conversacion['id_prof_FK'];

    $datosProfesionales = DB::datosProfesional($id_profesional);
    $genero = $datosProfesionales['genero'];
    $nombreApellidos = $datosProfesionales['nombre'].' '.$datosProfesionales['apellidos'];

    // Construcción del nombre del profesional según su género
    if ($genero === 'mujer') {
        $nombreProfesional = 'Dra. '.$nombreApellidos;
    } else {
        $nombreProfesional = 'Dr. '.$nombreApellidos;
    }
    $arrayNombres[] = $nombreProfesional;
    // var_dump('----', $arrayNombres);
    // echo json_encode(array('nombreProfesional' => $nombreProfesional));
    // echo json_encode(array('conversaciones' => $listaConversacionesPaciente, 'nombreProfesional' => $nombreProfesional));
}

// var_dump('----', $arrayNombres);
// die();
echo json_encode(array('conversaciones' => $listaConversacionesPaciente, 'nombreProfesional' => $arrayNombres));

// echo json_encode(array('conversaciones' => $listaConversacionesPaciente));
