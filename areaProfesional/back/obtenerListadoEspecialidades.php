<?php

require '../../clases/claseDB.php';

$idProf = filter_input(INPUT_POST, "idProf", FILTER_DEFAULT);

$especialidades = DB::especialidades();
$nombreEspecialidadesPracticaProf = DB::nombreEspecialidadesPracticaProf($idProf);

$idEspProf = [];

foreach ($nombreEspecialidadesPracticaProf as $especialidadProf) {
    $idEspProf[] = $especialidadProf['id_especialidad'];
}

$respuesta = [];
foreach ($especialidades as $especialidad) {
    $practica = false;
    if (in_array($especialidad['id_especialidad'], $idEspProf)) {
        $practica = true;
    }

    $respuesta[] = [
        'id' => $especialidad['id_especialidad'],
        'text' => $especialidad['nombre'],
        'practica' => $practica
    ];
}

echo json_encode(array('isEmpty' => empty($respuesta), 'datos' => $respuesta));
