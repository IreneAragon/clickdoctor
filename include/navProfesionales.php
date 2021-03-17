<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}
// TODO: mensaje para la irene del futuro: si llamas a la claseDB para agregar la img de perfil
// te va a dejar de funcionar el generador de informes, así que NO LLAMES AQUÍ a la claseDB,
// inserta el src de la imagen de perfil por SESSION. Ánimo guapa!

?>


<!-- NAVEGADOR -->
<div id="navegador">
    <nav class="navbar light-blue accent-1 mynav fixed-top scrolling-navbar">
        <i class="fas fa-bars openbtn light-blue accent-1" onclick="openNav()"></i>
        <!-- <i id="openNav" class="fas fa-bars openbtn light-blue accent-1" ></i> -->
        <!-- <button class="openbtn light-blue accent-1" onclick="openNav()">☰</button> -->
        <!-- <button class="openbtn light-blue accent-1" id="openNav">☰</button> -->
        <a class="navbar-brand" href="areaProfesional.php">
            <img src="../img/logoNav.png" height="20" alt="click doctor logo">
        </a>
        <img class="avatarNav" src="../areaProfesional/perfil/images/default-avatar.png">
        <div id="mySidebar" class="sidebar light-blue accent-1 ">

            <a class="closebtn" onclick="closeNav()">×</a>
            <a href="citasPaciente.php" class="hover">Citas</a>
            <a href="mensajesPaciente.php" class="hover">Mensajes</a>
            <a href="#" class="noHover">Informes</a>
            <a href="crearInforme.php" class="moverTexto hover">Generar informes</a>
            <a href="verInformes.php" class="moverTexto hover">Ver informes</a>

            <!-- TODO: pagina salir real, que cierre sesión y no debe entrar si vuelve atrás en navegador -->
            <a href="../index.php" class="hover">Salir</a>
        </div>
    </nav>
</div>
