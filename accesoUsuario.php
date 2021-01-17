<?php
// MOSTRAR TODOS LOS ERRORES
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'clases/claseDB.php';

// Recibir datos a través de $_POST
if (!empty($_POST)) {

    // Variables utilizadas en las validaciones
    $esAdministrador    = false;
    $esPaciente         = false;
    $esProfesional      = false;
    $formularioCompleto = true;
    $existeUsuario      = false;
    $usuarioActivo      = false;
    $mensajeError       = "";

    // Variables que almacenan los datos del formulario
    $email      = trim(filter_input(INPUT_POST, "loginEmail", FILTER_DEFAULT));
    $contrasena = trim(filter_input(INPUT_POST, "loginContrasena", FILTER_DEFAULT));

    /* Validación: formulario completo */
    if (empty($email) || empty($contrasena)) {
        $mensajeError .= "Debe rellenar todos los datos";
        $formularioCompleto = false;
        include_once("index.php");
    }

    /* Validación: conocer el tipo de usuario */
    if ($formularioCompleto) {
        $tipoUsuario = DB::tipoUsuario($email);
        if ($tipoUsuario === "admin") {
            $esAdministrador = true;
        } else if ($tipoUsuario === "paciente") {
            $esPaciente = true;
        } else {
            $esProfesional = true;
        }
    }

    /* Validación: el usuario existe */
    if ($formularioCompleto) {
        $usuarioExiste = DB::existeUsuario($email);
        if ($usuarioExiste) {
            $existeUsuario = true;
        } else {
            $mensajeError .= "El usuario no existe, revise los datos o regístrese.";
            include_once("index.php");
        }
    }

    /* Validación: la contraseña es correcta */
    if ($formularioCompleto && $existeUsuario) {
        // Obtiene la contraseña del usuario de la base de datos
        $contrasenaUsuario = DB::obtenerContrasena($email);
        // Se compara la contraseña del login con la de la base de datos
        if (password_verify($contrasena, $contrasenaUsuario)){
            if (!$esAdministrador) {
                // Si las contraseñas coinciden, se comprueba que el usuario no esté inactivo
                $estadoUsuario = DB::estadoDelUsuario($email);
                // Si la variable $estadoUsuario trae 0 será usuario inactivo, 1 será activo.
                if ($estadoUsuario === '0') {
                    $mensajeError .= "Su usuario no está activo, espere a que un administrador active su perfil.";
                    include_once("index.php");
                } else {
                    // Obtener el id y el género del usuario
                    $idUsuario = DB::getIdUsuario($email);
                    $generoUsuario = DB::getGeneroUsuario($email);
                    // Iniciar sesión y guardar en ésta el id y el género del usuario logueado
                    session_start();
                    $_SESSION['idUsuario'] = $idUsuario;
                    $_SESSION['generoUsuario'] = $generoUsuario;
                    // Si el usuario está activo, se le redirige a su página privada en función del tipo de usuario
                    if ($esPaciente) {
                        header('Location: areaPaciente/areaPaciente.php');
                        die();
                    } else if ($esProfesional) {
                        header('Location: areaProfesional/areaProfesional.php');
                        die();
                    }
                }
            } else {
                header('Location: areaAdministrador/areaAdministrador.php');
                die();
            }
        } else {
            // Si las contraseñas no coinciden, se notifica al usuario
            $mensajeError .= "Contraseña incorrecta, pruebe de nuevo.";
            include_once("index.php");
        }
    }
}
