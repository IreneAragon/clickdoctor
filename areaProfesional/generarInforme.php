<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// var_dump($nombreInforme);die();
require_once '../clases/claseDB.php';

// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}

// Cargar librerías necesarias para generar el PDF
require 'informes/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

// Constante para la ruta donde alojar los PDF
define("PDF_PATH", $_SERVER['DOCUMENT_ROOT'].'/CLICK_DOCTOR/historiales/');

// Obtiene el string del datetime
$dateTime = date('dmYHis');

// Recibir datos a través de $_POST
if (!empty($_POST)) {

    $error = false;

    $dniPac    = trim(filter_input(INPUT_POST, "infDni", FILTER_DEFAULT));
    $nombre    = trim(filter_input(INPUT_POST, "infNombre", FILTER_DEFAULT));
    $apellidos = trim(filter_input(INPUT_POST, "infApellidos", FILTER_DEFAULT));
    $apellidos = str_replace(' ', '_', $apellidos);
    $paciente  = $nombre.'_'.$apellidos;
    $especialidad = trim(filter_input(INPUT_POST, "selectMiEspecialidad", FILTER_DEFAULT));

    $comprobarDniPac = DB::comprobarDniPacienteExiste($dniPac);

    if ($comprobarDniPac) {
        // $dniPacExiste = true;
        $idPac = DB::obteneridPacientePorDni($dniPac);
        $pathConCarpetaId = PDF_PATH.$idPac.'/';
    } else {
        $error = true;
        $msgError = "El DNI del paciente es incorrecto o el usuario no existe";
        include_once("crearInforme.php");
        return;
    }

    // $idPac     = DB::obteneridPacientePorDni($dniPac);
    // $pathConCarpetaId = PDF_PATH.$idPac.'/';

    if (!file_exists($pathConCarpetaId)) {
        mkdir($pathConCarpetaId, 0777, true);
    }

    ob_start();
    require_once 'vistaInforme.php';
    $html = ob_get_clean();
    $html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
    $html2pdf->writeHTML($html);
    $html2pdf->Output($pathConCarpetaId.$paciente.'_'.$dateTime.'.pdf', 'F');

    // Obtener y guardar datos del informe en la DB
    $nombreInforme = $paciente.'_'.$dateTime.'.pdf';
    $idProf = $_SESSION['idUsuario'];
    $grabarInforme = DB::insertarInforme($nombreInforme, $especialidad, $idProf, $idPac);

    $msgExito =  "Informe creado correctamente";
    include_once("crearInforme.php");
    return;

} else {
    $error = true;
    $msgError .= "Ocurrió un error, pruebe de nuevo";
    include_once("crearInforme.php");
    return;
}

 ?>
<!-- <script src="js/listarInformesProfesional.js" charset="utf-8"></script> -->
