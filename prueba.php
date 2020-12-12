<?php

// include connection
require 'clases/claseDB.php';


/**********************************************
*                                             *
*       PRUEBAS OBTENER NOMBRE SEGÚN ID       *
*                    OK                       *
***********************************************/
// $id_pac = 1;
// $nombreDePaciente = DB::getNombrePaciente($id_pac);
//
// var_dump($nombreDePaciente);
// echo "Holi " . $nombreDePaciente['nombre'];

/**********************************
*                                 *
*     PRUEBAS INSERTAR ADMIN      *
*                OK               *
***********************************/

// $email      =   'hola@mail.com';
// $nombre     =   'AdminCIN';
// $apellidos  =   'Apellido Apellido';
// $contrasenia =   'administrame';
//
// $insertaAd  =    DB::insertarAdmin($email, $nombre, $apellidos, $contrasenia);
// var_dump($insertaAd);
// echo "oki";

/**********************************************
*                                             *
*   PRUEBAS INSERTAR PACIENTE O PROFESIONAL   *
*                    OK                       *
***********************************************/

// $nombre         = 'test3';
// $apellidos      = 'test test';
// $email          = 'test@mail.com';
// $password       = '123456';
// $dni            = '12345678N';
// $fnac           = '2020-10-10';
// $genero         = 'mujer';
// $estado         = 0;
// // PROF
// $ncol           = 12345678;
// $ejerce         = 'Clínico';

// $regPaciente    = DB::insertarPaciente($nombre, $apellidos, $email, $password, $dni,
//                                        $fnac, $genero, $estado);

// $regProferional = DB::insertarProfesional($nombre, $apellidos, $email, $password, $dni, $fnac,
//                                            $genero, $estado, $ncol, $ejerce);


/***********************************
*                                  *
*   PRUEBAS CONOCER TIPO USUARIO   *
*               OK                 *
***********************************/

// $email = 'prof2@mail.com';
// $conocerTipoUsuario = DB::tipoUsuario($email);
// var_dump($conocerTipoUsuario);




/***********************************************
*                                              *
*   ALTERNATIVA VERIFICAR FOMULARIO COMPLETO   *
*                    OK                        *
***********************************************/
// Verifiación: ningún campo puede estar vacío
// if ($rol == 'paciente') {
//     $esPaciente = true;
//     if ($nombre === "" || $apellidos === "" || $email === "" || $contrasena === "" || $contrasenaRep === "" ||
//         $dni === "" || $fNacimiento === "" || $genero === "") {
//             $formularioCompleto = false;
//             $mensajeError = "Error: ningún campo del formulario puede estar vacío, por favor, rellene todos los datos.";
//             // include_once("registroUsuario.php");
//         }
// } else {
//     $esProfesional = true;
//     if ($nombre === "" || $apellidos === "" || $email === "" || $contrasena === "" || $contrasenaRep === "" ||
//         $dni === "" || $fNacimiento === "" || $genero === "" || $nColegiado === "" || $ejerce === "") {
//             $formularioCompleto = false;
//             $mensajeError = "Error: ningún campo del formulario puede estar vacío, por favor, rellene todos los datos.";
//             // include_once("registroUsuario.php");
//         }
// }


/****************************************************************
*                                                               *
*   PRUEBAS MOSTRAR NOMBRE ESPECIALIDADES EN SELECT FORMULARIO  *
*                          OK                                   *
*****************************************************************/
// $especialidades = DB::especialidades();
// var_dump($especialidades);
/*
?>
<br><br>
<form action="#" method="post">
    <label for="selectEspecialidad">Elija una especialidad</label>
    <select id="selectEspecialidad">
        <option value="0">Seleccione:</option>
        <?php
            foreach ($especialidades as $especialidad) {
                echo '<option value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
            }
        ?>
    </select>
</form>
*/




/**************************************************************
*                                                             *
*   PRUEBAS OBTENER PROFESIONAL SEGÚN ID DE LA ESPECIALIDAD   *
*                                                             *
***************************************************************/
/*
$idEspecialidad = 1;
$especialistas = DB::obtenerEspecialista($idEspecialidad);

// var_dump($especialistas);

?>
<br><br>
<form action="#" method="post">
    <label for="selectEspecialista">Elija un profesional</label>
    <select id="selectEspecialista">
        <option value="0">Seleccione:</option>
        <?php
            foreach ($especialistas as $especialista) {
                echo '<option value="'.$especialista['id_prof'].'">'.$especialista['nombre'].' '.$especialista['apellidos'].'</option>';
            }
        ?>
    </select>
</form>
*/








































/*
<!--  -->
*/
