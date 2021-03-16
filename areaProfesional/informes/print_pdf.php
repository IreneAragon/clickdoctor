<?php
// carga lo necesario para usar html2pdf
require 'vendor/autoload.php';
// usamos html2pdf
use Spipu\Html2Pdf\Html2Pdf;

// si se ha enviado el formulario, se genera el pdf
if(isset($_POST['crear'])){
    // abre el buffer que almacena el fichero que contiene la vista del informe
    ob_start();
    // llamamos al fichero
    require_once 'print_view.php';
    $html = ob_get_clean();
    // creamos la instancia del objeto html2pdf con parámetros necesarios
    $html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
    // writeHTML es un método que pinta el pdf con lo que contenga, string o variable
    $html2pdf->writeHTML($html);
    // Op 1: muestra el pdf en el navegador
    $html2pdf->output('miarchivo.pdf');

    // Op 2: guarda el fichero en el servidor
    // $html2pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'CLICK_DOCTOR/areaProfesional/informes/historiales/fichero.pdf', 'F');

    // OP 3: esto también muestra el pdf en el navegador
    // $html2pdf->Output('Reporte.pdf','I');
}

?>

<!-- <form action="" method="post">
    <input type="text" name="nombre">
    <input type="submit" name="crear" value="generar pdf">
</form> -->
