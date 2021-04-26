<?php
include_once '../include/cabeceraAdmins.html';
include_once '../include/navAdministrador.php';

if (!isset($_SESSION)) {
    session_start();
}

// require_once '../clases/claseDB.php';

?>

<!-- CONTENIDO -->
<div id="contenidoPrincipal" class="container mt-5">
    <!-- <h1 class="mt-5 mb-3 text-center"> Yo</h1> -->
    <div class="mt-5 text-center">
        <h2> Bienvenido Administrador </h2>
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
