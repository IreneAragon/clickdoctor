<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_SESSION)) {
    session_start();
}

require_once '../clases/claseDB.php';

$idUsuario = $_SESSION['idUsuario'];

if (!empty($_POST)) {

    // Variables utilizadas para las verificaciones
    $noErrors       = true;
    $required       = true;
    $validPassword  = true;
    $equalPasswords = true;
    $validEmail     = true;
    $editPassword   = false;
    $msgError       = "";
    $msgExito       = "";

    // Variables que almacenan los datos del Formulario
    $name        = trim(filter_input(INPUT_POST, "editarNombre", FILTER_DEFAULT));
    $lastname    = trim(filter_input(INPUT_POST, "editarApellidos", FILTER_DEFAULT));
    $email       = trim(filter_input(INPUT_POST, "editarEmail", FILTER_DEFAULT));
    $fNac        = trim(filter_input(INPUT_POST, "editarFnac", FILTER_DEFAULT));
    $password    = trim(filter_input(INPUT_POST, "editarPassword", FILTER_DEFAULT));
    $passwordRep = trim(filter_input(INPUT_POST, "editarPasswordRep", FILTER_DEFAULT));

    // Variable para almacenar la contraseña con hash, esta es la variable que se inserta en la base de datos
    $hashPass = password_hash($password, PASSWORD_DEFAULT);

    // Validación: campos que no pueden quedar vacíos
    if ( empty($name) || empty($lastname) || empty($email) || empty($fNac) ) {
        $required  = false;
        $msgError .= "Error: No puedes dejar en blanco el nombre, los apellidos, el email o la fecha de nacimiento.\n";
        include_once("editarPerfil.php");
    }

    // Validación: formato de email válido
    $validEmailFormat = DB::emailValido($email);
    if ($required && !$validEmailFormat) {
        $required  = false;
        $noErrors  = false;
        $msgError .= "Error: introduce un e-mail válido.\n";
        include_once("editarPerfil.php");
    }

    // Si los campos obligatorios están rellenos procedemos a validar la contraseña y el resto de campos
    if ($required) {
        /****************************************
        *   Validación de cambio de contraseña  *
        *****************************************/
        // Si los inputs contraseña están vacíos es que el usuario no va a modificarlas,
        // por lo que no se hace ningun otra comprobación
        if ( empty($password) && empty($passwordRep) ) {
            $noErrors = true;
        }
        // Si uno de los campos de la contraseña está completo pero el otro no, se avisa al usuario
        if ( (!empty($password) && empty($passwordRep)) || (empty($password) && !empty($passwordRep)) ) {
            $noErrors  = false;
            $msgError .= "Error: debes escribir la nueva contraseña en los dos campos.\n";
            include_once("editarPerfil.php");
        }
        // Si los dos campos están rellenos, se procede a las validaciones
        if (!empty($password) && !empty($passwordRep)) {
            // contraseñas son distintas
            if ($password !== $passwordRep) {
                $equalPasswords = false;
                $noErrors       = false;
                $msgError      .= "Error: las contraseñas no coinciden.\n";
                include_once("editarPerfil.php");
            }
            // contraseñas coinciden
            if ($equalPasswords) {
                // comprueba el formato
                $passFormat = DB::contrasenaValida($password);
                // formato incorrecto
                if (!$passFormat) {
                    $validPassword = false;
                    $noErrors      = false;
                    $msgError     .= "Error: la contraseña debe contener mayúsculas, minúsculas y al menos un número.\n";
                    include_once("editarPerfil.php");
                } else {
                    $editPassword = true;
                }
            }
        }
    } // fin if ($required)

    /**************************************
    *   Modificación de la base de datos  *
    ***************************************/
    // Si no hay ningún error se modifican los datos en la base de datos
    if ($noErrors) {
        if ($editPassword) {
            // Si se ha cambiado la contraseña se utiliza esta función
            $modificaDatosUsuario = DB::modificarDatosUsuario($name, $lastname, $email, $fNac, $hashPass, $idUsuario);
            $msgExito .= "Tus datos se han modificado correctamente";
            include_once("editarPerfil.php");
        } else {
            // Si no se ha modificado la contraseña se utiliza esta otra función
            $modificaDatosUsuario = DB::modificarDatosUsuarioNoPass($name, $lastname, $email, $fNac, $idUsuario);
            $msgExito .= "Tus datos se han modificado correctamente";
            include_once("editarPerfil.php");
        }
    }
}
