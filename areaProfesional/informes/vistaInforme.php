<?php  ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Generar PDF con PHP</title>
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
            /* .campo {
                font-weight: bold;
            } */

            img {
                width: 200px;
                float: right;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="../../img/logo2.png" alt="">
            <?php if (isset($_POST['infNombre'])): ?>
                <p>Informe clínico del paciente <?=$_POST['infNombre'].' '.$_POST['infApellidos']?></p>
            <?php endif; ?>
            <div class="datosPacienteContainer">
                <h4>Datos del paciente:</h4>
                <p class="campo"><strong>Nombre:</strong>Irene</p>
                <p class="campo"><strong>Apellidos:</strong> Aragón Gómez</p>
                <p class="campo"><strong>Fecha de nacimiento:</strong> 23/06/1988</p>
                <p class="campo"><strong>Domicilio:</strong> Av de los Guindos, Málaga</p>
            </div>

            <div class="datosProfesionalContainer">
                <h4>Atendido por:</h4>
                <p class="campo"><strong>Nombre:</strong> Dr Nacho Martín</p>
                <p class="campo"><strong>Especialidad:</strong> Medicina General</p>
                <p class="campo"><strong>Centro:</strong> Hospital Quirón</p>
                <p class="campo"><strong>Dirección:</strong> Av Imperio Argentina, Málaga</p>
            </div>



        </div>


    </body>
</html>
