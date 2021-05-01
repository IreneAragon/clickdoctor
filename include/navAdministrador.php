<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

?>

<!-- NAVEGADOR -->
<div id="navegador">
    <nav class="navbar light-blue accent-1 mynav fixed-top scrolling-navbar">
        <i class="fas fa-bars openbtn light-blue accent-1" onclick="openNav()"></i>
        <a class="navbar-brand" href="areaAdministrador.php">
            <img src="../img/logoNav.png" class="float-right" height="20" alt="click doctor logo" title="Ir a inicio">
        </a>

        <div id="mySidebar" class="sidebar light-blue accent-1 ">
            <a class="closebtn" onclick="closeNav()">×</a>
            <a href="areaAdministrador.php" class="hover">Inicio</a>
            <a href="#" class="noHover">Panel de gestión</a>
            <a href="gestionarUsuarios.php" class="moverTexto hover">Usuarios</a>
            <a href="gestionarEspecialidades.php" class="moverTexto hover">Especialidades</a>
            <a href="../cerrarSesion.php" class="moverTexto hover">Salir</a>
        </div>
    </nav>
</div>
