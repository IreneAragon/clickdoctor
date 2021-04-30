<?php
include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';
// datosProfesional($idProfesional)

if (!isset($_SESSION)) {
    session_start();
}
require_once '../clases/claseDB.php';

$idProfesional = $_SESSION['idUsuario'];
$datosProfesional = DB::datosProfesional($idProfesional);
$nombreProfesional = $datosProfesional['nombre'].' '.$datosProfesional['apellidos'];

if ($datosProfesional['genero'] === 'mujer') {
    $welcome = 'Bienvenida';
} else {
    $welcome = 'Bienvenido';
}

?>

<!-- CONTENIDO -->
<div id="contenidoPrincipalProf" class="container mt-5">
    <h1 class="mt-5 text-center"> <?=$nombreProfesional ?></h1>
    <div class="m-2 text-center">
        <h2> <?=$welcome ?> a tu centro de salud virtual </h2>
    </div>

    <div class="text-center m-3">
        <div class="banner-lg">
            <a href="https://www.mscbs.gob.es/profesionales/saludPublica/ccayes/alertasActual/nCov/home.htm" target="_blank">
                <img src="../img/banner-covid-19-lg.png" class="img-fluid" alt="Banner sobre la covid-19" title="Imagen con informacion sobre la covid-19">
            </a>
        </div>
        <div class="banner-sm">
            <a href="https://www.mscbs.gob.es/profesionales/saludPublica/ccayes/alertasActual/nCov/home.htm" target="_blank">
                <img src="../img/bnn-covid-sm.png" class="img-fluid" alt="Banner sobre la covid-19" title="Imagen con informacion sobre la covid-19">
            </a>
        </div>

    </div>

</div>


<?php
include_once '../include/footer.html';
?>
