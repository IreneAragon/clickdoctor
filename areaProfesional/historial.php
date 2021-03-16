<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}
include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';


 ?>

<body>
    <div class="container mt-5">
        <form class="mt-5" action="informes/generarInforme.php" method="post">
            <p class="h4 mb-4">Introduce tus datos</p>
            <div class="form-row mb-2">
                <div class="col-6">
                    <!-- Nombre -->
                    <input type="text" id="infNombre" name="infNombre" class="form-control" placeholder="Nombre">
                </div>
                <div class="col-6">
                    <!-- Apellidos -->
                    <input type="text" id="infApellidos" name="infApellidos" class="form-control" placeholder="Apellidos">
                </div>
            </div>
            <input type="submit" id="infSubmit" name="infSubmit" value="Genera PDF" class="btn btn-info my-4 btn-block">
        </form>
    </div>
</body>


 <?php
 include_once '../include/footer.html';
