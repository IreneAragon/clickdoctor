<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
// Recibir datos a través de $_POST
if (!empty($_POST)) {

    $nombre        = trim(filter_input(INPUT_POST, "infNombre", FILTER_DEFAULT));
    $apellidos     = trim(filter_input(INPUT_POST, "infApellidos", FILTER_DEFAULT));

    ob_start();
    require_once 'vistaInforme.php';
    $html = ob_get_clean();
    $html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
    $html2pdf->writeHTML($html);
    $html2pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'CLICK_DOCTOR/areaProfesional/informes/historiales/fichero.pdf', 'F');

}




// $html2pdf = new Html2Pdf();
// $html2pdf->writeHTML('<h1>Hola '.$nombre.' </h1>');
// // $html2pdf->output();
// ob_clean();
// $html2pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'CLICK_DOCTOR/areaProfesional/informes/historiales/fichero.pdf', 'F');
// // $html2pdf->Output('Reporte.pdf','I');

 ?>
