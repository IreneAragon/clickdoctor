<?php

if (!isset($_SESSION)) {
    session_start();
}

$idProf = $_SESSION['idUsuario'];
$datosProfesional = DB::datosProfesional($idProf);

$nombreProf = $datosProfesional['nombre'];
$apellidosProf = $datosProfesional['apellidos'];
$nombreApellidosProf = $nombreProf.' '.$apellidosProf;
$genero = $datosProfesional['genero'];
$centro = $datosProfesional['ejerce_en'];
$nCol = $datosProfesional['n_colegiado'];

if ($genero === 'mujer' ) {
    $nombreCompletoProf = 'Dra. '.$nombreApellidosProf;
} else {
    $nombreCompletoProf = 'Dr. '.$nombreApellidosProf;
}

 // Formatear fecha de nacimiento
 $fNac = trim(filter_input(INPUT_POST, "infFnac", FILTER_DEFAULT));
 $exp = explode('-', $fNac);
 $fNacDDMMYYY = $exp[2].'-'.$exp[1].'-'.$exp[0];

 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Informe Clínico PDF</title>
        <style type="text/css">
            .container {
                margin: 50px 50px;
            }
            .datosPacienteContainer {
                border: 1px solid black;
                width: 40%;
                float: left;
            }
            .datosProfesionalContainer {
                border: 1px solid black;
                width: 40%;
                float: right;
            }

            .pl {
                padding-left: 20px;
            }
            img {
                width: 250px;
                float: right;
            }
            .tableContainer {
                background-color: #ededed;
                margin-top: 10px;
                border-radius: 5px;
            }
            table {
                width: 100%;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            table thead {
                font-size: 16px;

            }
            table thead tr th, table tbody tr td {
                padding-left: 50px;
                padding-right: 50px;
            }
            .cabecera {
                width: 60%;
                background-color: #3A8AFF;
                color: white;
                text-align: center;
                border-radius: 5px;
                line-height: 10px;
            }
            .cabecera h1 {
                font-size: 32px;
            }
            .informeContainer h4{
                color: #004DBC;
                line-height: 0px;
            }
            .firmaContainer {
                background-color: #ededed;
                padding-bottom: 15px;
                margin-top: 15px;
                border-radius: 5px;
                padding-left: 30px;
            }
            .firmaContainer h4 {
                margin-left: 30px;
                line-height: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Logo de Click Doctor -->
            <img src="../img/logo2.png" alt="">

            <!-- Cabecera y fecha -->
            <div class="cabecera">
                <h1>INFORME CLÍNICO</h1>
                <h4><?php echo date('d\-m\-Y'); ?></h4>
            </div>

            <!-- Tabla con los datos del paciente y el profesional -->
            <div class="tableContainer">
                <table>
                    <thead>
                      <tr>
                        <th>Datos del paciente: </th>
                        <th>Atendido por: </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><strong>Paciente:</strong> <?=$_POST['infApellidos'].', '.$_POST['infNombre']?></td>
                        <td><strong>Nombre:</strong> <?=$nombreCompletoProf?></td>
                      </tr>
                      <tr>
                        <td><strong>DNI:</strong> <?=$_POST['infDni']?></td>
                        <td><strong>Especialidad:</strong> <?=$especialidad?></td>
                      </tr>
                      <tr>
                        <td><strong>Fecha de nacimiento:</strong> <?=$fNacDDMMYYY?></td>
                        <td><strong>Centro:</strong> <?=$centro?></td>
                      </tr>
                    </tbody>
                </table>
            </div>

            <!-- Datos del informe -->
            <div class="informeContainer">

                <h4>MOTIVO DE LA CONSULTA</h4>
                <p><?=$_POST['infMotivo']?></p>

                <h4>ANTECEDENTES</h4>
                <p><?=$_POST['infAntecedentes']?></p>

                <h4>ALERGIAS</h4>
                <p><?=$_POST['infAlergias']?></p>

                <h4>ANAMNESIS</h4>
                <p><?=$_POST['infAnamnesis']?></p>

                <h4>EXPLORACIÓN</h4>
                <p><?=$_POST['infExploración']?></p>

                <h4>DIAGNÓSTICO</h4>
                <p><?=$_POST['infDiagnostico']?></p>

                <h4>PRESCRIPCIÓN</h4>
                <p><?=$_POST['infPrescripcion']?></p>


                <?php if (trim($_POST['infObservaciones']) !== ''){ ?>
                    <h4>OBSERVACIONES</h4>
                    <p><?=$_POST['infObservaciones']?></p>
                <?php } ?>


            </div>

            <!-- Firma del profesional -->
            <div class="firmaContainer">
                <h4>Firmado: <?=$nombreCompletoProf?></h4>
                <p><strong>Nº Colegiado:</strong> <?=$nCol?></p>
            </div>

        </div>

    </body>
</html>
