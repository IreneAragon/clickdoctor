<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// include_once '../../include/cabeceraProfesionales.html';
// include_once '../../include/navProfesionales.php';
require_once '../clases/claseDB.php';

// Cargar librerías necesarias para generar el PDF
require 'informes/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

// Constante para la ruta donde alojar los PDF
define("PDF_PATH", $_SERVER['DOCUMENT_ROOT'].'/CLICK_DOCTOR/historiales/');

// Obtiene el string del datetime
$dateTime = date('dmYHis');

// Recibir datos a través de $_POST
if (!empty($_POST)) {

    // $pdfCreado = true;

    $dniPac    = trim(filter_input(INPUT_POST, "infDni", FILTER_DEFAULT));
    $nombre    = trim(filter_input(INPUT_POST, "infNombre", FILTER_DEFAULT));
    $apellidos = trim(filter_input(INPUT_POST, "infApellidos", FILTER_DEFAULT));
    $apellidos = str_replace(' ', '_', $apellidos);
    $paciente  = $nombre.'_'.$apellidos;
    $idPac     = DB::obteneridPacientePorDni($dniPac);
    $pathConCarpetaId = PDF_PATH.$idPac.'/';

    if (!file_exists($pathConCarpetaId)) {
        mkdir($pathConCarpetaId, 0777, true);
    }

    ob_start();
    require_once 'vistaInforme.php';
    $html = ob_get_clean();
    $html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
    $html2pdf->writeHTML($html);
    $html2pdf->Output($pathConCarpetaId.$paciente.'_'.$dateTime.'.pdf', 'F');


    $msgExito =  "Informe creado correctamente";
    include_once("historial.php");
    return;

} else {
    $msgError = "Ocurrió un error, pruebe de nuevo";
    include_once("historial.php");
    return;
}

 ?>
