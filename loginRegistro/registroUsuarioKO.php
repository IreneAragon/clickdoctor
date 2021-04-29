<?php

// MOSTRAR TODOS LOS ERRORES
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../clases/claseDB.php';

// Recibir datos a través de $_POST
if (!empty($_POST)) {

    // Variables utilizadas para las verificaciones
    $noExistenErrores     = true;
    $formularioCompleto   = true;
    $contrasenaValida     = true;
    $contrasenasCoinciden = true;
    $noExisteUsuario      = true;
    $emailValido          = true;
    $dniValido            = true;
    $nColegiadoValido     = true;
    $esPaciente           = false;
    $esProfesional        = false;
    $mensajeError         = '';
    $gender_value         = '';
    $rol_value            = '';


    // Variables que almacenan los datos del formulario
    $nombre           = trim(filter_input(INPUT_POST, "regNombre", FILTER_DEFAULT));
    $apellidos        = trim(filter_input(INPUT_POST, "regApellidos", FILTER_DEFAULT));
    $email            = trim(filter_input(INPUT_POST, "regEmail", FILTER_DEFAULT));
    $contrasena       = trim(filter_input(INPUT_POST, "regPassword", FILTER_DEFAULT));
    $contrasenaRep    = trim(filter_input(INPUT_POST, "regPasswordRep", FILTER_DEFAULT));
    $dni              = trim(filter_input(INPUT_POST, "regDni", FILTER_DEFAULT));
    $fNacimiento      = trim(filter_input(INPUT_POST, "regNacimiento", FILTER_DEFAULT));
    $genero           = trim(filter_input(INPUT_POST, "gender", FILTER_DEFAULT));
    $rol              = trim(filter_input(INPUT_POST, "rol", FILTER_DEFAULT));
    $nColegiado       = trim(filter_input(INPUT_POST, "regNcolegiado", FILTER_DEFAULT));
    $ejerce           = trim(filter_input(INPUT_POST, "regEjerce", FILTER_DEFAULT));
    $idEspecialidades = trim(filter_input(INPUT_POST, "regEspecialidadess", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY));

    var_dump('---->',$idEspecialidades);


    // Variable para almacenar la contraseña con hash
    $hashPass = password_hash($contrasena, PASSWORD_DEFAULT);

    // Almacena el valor del género para recordarlo en el formulario en caso de algún error
    if($genero != ""){
        $gender_value = $_POST["gender"];
    }
    if($gender_value === "mujer"){
        $valueMujer = "checked";
        $valueHombre = "";
        $valueOtro = "";
    } elseif($gender_value === "hombre"){
        $valueMujer = "";
        $valueHombre = "checked";
        $valueOtro = "";
    } elseif($gender_value === "otro"){
        $valueMujer = "";
        $valueHombre = "";
        $valueOtro = "checked";
    }

    // Almacena el valor del rol para recordarlo en el formulario en caso de algún error
    if($rol != ""){
        $rol_value = $_POST["rol"];
    }
    if($rol_value === "paciente"){
        $valuePaciente = "checked";
        $valueProfesional = "";
    } elseif($rol_value === "profesional"){
        $valuePaciente = "";
        $valueProfesional = "checked";
    }

    /* Validación: ningún campo puede estar vacío */
    // Si el usuario es paciente se comprueban los campos del rol paciente
    if ($rol == 'paciente') {
        $esPaciente = true;
        if (empty($nombre) || empty($apellidos) || empty($email) || empty($contrasena) || empty($contrasenaRep) ||
            empty($dni) || empty($fNacimiento) || empty($genero)) {
                $formularioCompleto = false;
                $noExistenErrores   = false;
                $mensajeError      .= "Error: ningún campo del formulario puede estar vacío, por favor, rellene todos los datos.\n";
                include_once("registro.php");
            }
    // Si el usuario es profesional se comprueban los campos del rol profesional
    } else {
        $esProfesional = true;
        if (empty($nombre) || empty($apellidos) || empty($email) || empty($contrasena) || empty($contrasenaRep) ||
            empty($dni) || empty($fNacimiento) || empty($genero) || empty($nColegiado) || empty($ejerce)) {
                $formularioCompleto = false;
                $noExistenErrores   = false;
                $mensajeError .= "Error: ningún campo del formulario puede estar vacío, por favor, rellene todos los datos.\n";
                include_once("registro.php");
            }
    }

    /* Validación: formato de email válido */
    $fomatoEmailValido = DB::emailValido($email);
    if ($formularioCompleto && !$fomatoEmailValido) {
        $emailValido        = false;
        $noExistenErrores   = false;
        $mensajeError      .= "Error: introduzca un e-mail válido.\n";
        include_once("registro.php");
    }

    /* Validación: el formato del dni es válido */
    $formatoDni = DB::dniValido($dni);
    if ($formularioCompleto && !$formatoDni) {
        $dniValido        = false;
        $noExistenErrores = false;
        $mensajeError    .= "Error: introduzca un DNI válido.\n";
        include_once("registro.php");
    }

    /* Validación: las contraseñas coinciden */
    if ($formularioCompleto && ($contrasena !== $contrasenaRep)) {
        $contrasenasCoinciden = false;
        $noExistenErrores     = false;
        $mensajeError        .= "Error: las contraseñas no coinciden.\n";
        include_once("registro.php");
    }

    /* Validación: el formato de la contraseña es válido */
    $formatoContrasena = DB::contrasenaValida($contrasena);
    if ($formularioCompleto && $contrasenasCoinciden && (!$formatoContrasena)) {
        $contrasenaValida   = false;
        $noExistenErrores   = false;
        $mensajeError      .= "Error: la contraseña debe contener mayúsculas, minúsculas y al menos un número.\n";
        include_once("registro.php");
    }

    /* Validación: el número de colegiado es válido */
    if ($esProfesional) {
        $formatoColegiado = DB::nColegiadoValido($nColegiado);
        if ($formularioCompleto && $contrasenasCoinciden && (!$formatoColegiado)) {
            $nColegiadoValido   = false;
            $noExistenErrores   = false;
            $mensajeError      .= "Error: el número de colegiado no es válido, debe contener 9 dígitos.\n";
            include_once("registro.php");
        }
    }

    /* Validación: el usuario no existe en la base de datos */
    // Solo cuando no exista ningún error en el formulario se procede a comprobar si el usuario
    // introducido ya existe en la base de datos
    if ($noExistenErrores) {
        if ($esPaciente) {
            $existeEmail = DB::existePaciente($email);
            if ($existeEmail) {
                $noExisteUsuario = false;
                $mensajeError   .= "Error: el email ya existe en la base de datos, inicie sesión con su cuenta.";
                include_once("registro.php");
            }
        // si es profesional
        } else {
            $existeEmail = DB::existeProfesional($email);
            if ($existeEmail) {
                $noExisteUsuario = false;
                $mensajeError   .= "Error: el email ya existe en la base de datos, inicie sesión con su cuenta.";
                include_once("registro.php");
            }
        }
    }

    /* Si no hay ningún error y el paciente no existe, se inserta al usuario en la base de datos */
    if ($noExistenErrores && $noExisteUsuario) {
        if ($esPaciente) {
            $registrarPaciente = DB::insertarPaciente($nombre, $apellidos, $email, $hashPass, $dni,
                                                      $fNacimiento, $genero);
            header('Location: registroOK.php');
        } else {
            var_dump('--end-->',$idEspecialidades);die;
            $registrarProfesional = DB::insertarProfesional($nombre, $apellidos, $email, $hashPass, $dni,
                                                            $fNacimiento, $genero, $nColegiado, $ejerce);
            // $guardarEspecialidadesProfesional = DB::insertarEspecialidadNuevoProf($idEspecialidades, $idNuevoProf)
            header('Location: registroOK.php');
        }
    }
}

// Si existe algún mensaje de error lo mostramos
// if(isset($mensajeError)){
//     echo nl2br($mensajeError);
//     // var_dump($mensajeError);
//     // header('Location: registro.html'); // no para la ejecución a no ser que ponga return
//     // return;
// }
