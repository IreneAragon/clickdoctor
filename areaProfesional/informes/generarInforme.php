<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

/*

    TODO:
        - crear constante con el path de donde se crea el archivo
            $_SERVER['DOCUMENT_ROOT'].'CLICK_DOCTOR/areaProfesional/informes/historiales/'
        - recibir id paciente
        - asignar el nombre del id paciente como nombre de la folder
        - crear folder if not exists
        - agregar nombre de folder al path OUTPUT
 */


// Cargar librerías necesarias para generar el PDF
require 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

// Obtiene el string del datetime
$dateTime = date('dmYHis');

// Recibir datos a través de $_POST
if (!empty($_POST)) {

    $nombre    = trim(filter_input(INPUT_POST, "infNombre", FILTER_DEFAULT));
    $apellidos = trim(filter_input(INPUT_POST, "infApellidos", FILTER_DEFAULT));
    $apellidos = str_replace(' ', '_', $apellidos);
    $paciente  = $nombre.'_'.$apellidos;

    /*TODO: crear folder if no exists*/

    ob_start();
    require_once 'vistaInforme.php';
    $html = ob_get_clean();
    $html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
    $html2pdf->writeHTML($html);

    $html2pdf->Output($_SERVER['DOCUMENT_ROOT'].'CLICK_DOCTOR/areaProfesional/informes/historiales/'.$paciente.'_'.$dateTime.'.pdf', 'F');

}



 ?>
