<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}
require '../clases/claseDB.php';

?>


<!-- NAVEGADOR -->
<div id="navegador">
    <nav class="navbar light-blue accent-1 mynav fixed-top scrolling-navbar">
        <i class="fas fa-bars openbtn light-blue accent-1" onclick="openNav()"></i>
        <!-- <i id="openNav" class="fas fa-bars openbtn light-blue accent-1" ></i> -->
        <!-- <button class="openbtn light-blue accent-1" onclick="openNav()">☰</button> -->
        <!-- <button class="openbtn light-blue accent-1" id="openNav">☰</button> -->
        <a class="navbar-brand" href="areaProfesional.php">
            <img src="../img/logoNav.png" height="30" alt="click doctor logo">
        </a>
        <img class="avatarNav" src="../areaProfesional/perfil/images/default-avatar.png">
        <div id="mySidebar" class="sidebar light-blue accent-1 ">

            <a class="closebtn" onclick="closeNav()">×</a>
            <!-- <a id="closeNav" class="closebtn">×</a> -->
            <a href="citasPaciente.php">Citas</a>
            <a href="mensajesPaciente.php">Mensajes</a>
            <a href="historial.php">Historiales</a>
            <!-- TODO: pagina salir real, que cierre sesión y no debe entrar si vuelve atrás en navegador -->
            <a href="../index.php">Salir</a>
        </div>
    </nav>
</div>
