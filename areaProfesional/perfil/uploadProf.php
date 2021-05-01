<?php

require_once '../../clases/claseDB.php';


if (!isset($_SESSION)) {
    session_start();
}
// Establece la zona horaria española
date_default_timezone_set("Europe/Madrid");
// Obtiene el string del datetime
$dateTime = date('dmYHis');

if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/gif")) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$dateTime.$_FILES['file']['name'])) {

            // Obtiene el nombre del fichero - concatenar datetime para crear nombre único
            $srcImg = "images/".$dateTime.$_FILES['file']['name'];

            $email = $_SESSION['email'];
            $guardaSrc = DB::guardarSrcProf($srcImg, $email);

            $srcImagenPerfil = DB::obtenerSrcProf($email);
            echo 'perfil/'.$srcImagenPerfil['srcImg'];

            $_SESSION['srcImg'] = $srcImg;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
} else {
    echo 0;
}
