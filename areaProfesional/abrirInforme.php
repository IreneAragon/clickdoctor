<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Inicia sesión solo si no lo está ya
// if (!isset($_SESSION)) {
//     session_start();
// }
// include_once '../include/cabeceraProfesionales.html';
// include_once '../include/navProfesionales.php';


    // Store the file name into variable
    // $file = 'Alicia_Alcaide_Jiménez_17032021121903';
    $filepath = "/Applications/MAMP/htdocs/CLICK_DOCTOR/historiales/19/Alicia_Alcaide_Jiménez_17032021121903.pdf";
    // $filepath = $_SERVER['DOCUMENT_ROOT'].'/CLICK_DOCTOR/historiales/19/Alicia_Alcaide_Jiménez_17032021121903';
    // Header content type
    header("Content-type: application/pdf");
    // Send the file to the browser.
    readfile($filepath);


 ?>
