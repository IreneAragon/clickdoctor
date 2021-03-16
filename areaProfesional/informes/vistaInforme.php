<?php

/*

<?php if (isset($_POST['infNombre'])): ?>
    <p>Informe clínico de paciente <?=$_POST['infNombre'].' '.$_POST['infApellidos']?></p>
<?php endif; ?>

 */

 ?>

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
            .firmaContainer p {
                /* margin-left: 30px; */
            }
            /* .firma{
                color: red;
            } */
        </style>
    </head>
    <body>
        <div class="container">
            <img src="../../img/logo2.png" alt="">
            <div class="cabecera">
                <h1>INFORME CLÍNICO</h1>
                <h4>16 de marzo de 2021</h4>
            </div>

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
                        <td><strong>Paciente:</strong> Aragón Gómez, Irene</td>
                        <td><strong>Nombre:</strong> Dr. Nacho Martín</td>
                      </tr>
                      <tr>
                        <td><strong>DNI:</strong> 74875562M</td>
                        <td><strong>Especialidad:</strong> Medicina general</td>
                      </tr>
                      <tr>
                        <td><strong>Fecha de nacimiento:</strong> 23/06/1988</td>
                        <td><strong>Centro:</strong> Hospital Quirón</td>
                      </tr>
                      <tr>
                        <td><strong>Domicilio:</strong> Av de los Guindos, Málaga</td>
                        <td><strong>Dirección:</strong> Av Imperio Argentina, Málaga</td>
                      </tr>
                    </tbody>
                </table>
            </div>

            <div class="informeContainer">

                <h4>MOTIVO DE LA CONSULTA</h4>
                <p>Lorem ipsum dolor sit amet</p>

                <h4>ANTECEDENTES</h4>
                <p>Nullam non imperdiet mauris</p>

                <h4>ALERGIAS</h4>
                <p>Consectetur adipiscing</p>

                <h4>ANAMNESIS</h4>
                <p>
                    Sed volutpat ipsum vitae arcu elementum, ut vulputate libero rhoncus. Vivamus blandit
                    vulputate volutpat. Mauris tristique leo vel tellus porta, ut molestie turpis faucibus.
                    Morbi ornare felis eu laoreet iaculis.
                </p>

                <h4>EXPLORACIÓN</h4>
                <p>Consectetur adipiscing</p>

                <h4>DIAGNÓSITCO</h4>
                <p>
                    Aliquam nec elementum quam, id lacinia nisl. Phasellus at augue rhoncus, mattis magna vel,
                    mollis sem. Integer sodales eleifend dui, a varius tortor ultrices sed. Curabitur gravida,
                    ligula at pulvinar pellentesque, ante mi maximus lectus, nec rutrum ipsum magna a nisi.
                    Sed posuere fringilla lorem in dapibus. Quisque in mattis metus.
                </p>

                <h4>PRESCRIPCIÓN</h4>
                <p>Ibuprofeno 1gr cada 8 horas</p>

                <h4>OBSERVACIONES</h4>
                <p>Consectetur adipiscing</p>

            </div>

            <div class="firmaContainer">
                <h4 class="firma">Firma el Dr. Nacho Martín</h4>
                <p><strong>Nº Colegiado:</strong> 29/29/11047</p>
            </div>



        </div>


    </body>
</html>
