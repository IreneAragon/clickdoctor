<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once '../include/cabeceraAdmins.html';
include_once '../include/navAdministrador.php';

if (!isset($_SESSION)) {
    session_start();
}

// require_once '../clases/claseDB.php';

/*
TODO: 
    - botón para crear un nuevo usuario  
    - tabla que liste todos los usuarios 
        - switch entre pacientes y profesionales (rol)
        nombre + btn edit + btn delete
*/
?>





<div class="container mt-5">
    <div class="mt-5">
        <h2>Gestión de Usuarios</h2>
    </div>
</div>

















<?php
include_once '../include/footer.html';
?>
