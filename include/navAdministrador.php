<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia sesión solo si no lo está ya
// if (!isset($_SESSION)) {
//     session_start();
// }
// var_dump($_SESSION);
// require_once '../clases/claseDB.php';
// $idPaciente = $_SESSION['idUsuario'];
// $datosPaciente = DB::datosPaciente($idPaciente);
// $srcImgPerfil = '../areaPaciente/perfil/'.$datosPaciente['srcImg'];
?>

<!-- NAVEGADOR -->
<div id="navegador">
    <nav class="navbar light-blue accent-1 mynav fixed-top scrolling-navbar">
        <i class="fas fa-bars openbtn light-blue accent-1" onclick="openNav()"></i>
        <!-- <i id="openNav" class="fas fa-bars openbtn light-blue accent-1" ></i> -->
        <!-- <button class="openbtn light-blue accent-1" onclick="openNav()">☰</button> -->
        <!-- <button class="openbtn light-blue accent-1" id="openNav">☰</button> -->
        <a class="navbar-brand" href="areaAdministrador.php">
            <img src="../img/logoNav.png" class="float-right" height="20" alt="click doctor logo" title="Ir a inicio">
        </a>
        <!-- <a href="perfil.php">
            <img class="avatarNav" src="" alt="imagen de perfil" title="Ver perfil">
        </a> -->
        <div id="mySidebar" class="sidebar light-blue accent-1 ">

            <a class="closebtn" onclick="closeNav()">×</a>
            <!-- <a id="closeNav" class="closebtn">×</a> -->
            <a href="#" class="noHover">Panel de gestión</a>
            <a href="gestionarUsuarios.php" class="moverTexto hover">Usuarios</a>
            <a href="gestionarEspecialidades.php" class="moverTexto hover">Especialidades</a>
            <a href="../cerrarSesion.php" class="moverTexto hover">Salir</a>
        </div>
    </nav>
</div>
