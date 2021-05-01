<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}
require_once '../clases/claseDB.php';
$idPaciente = $_SESSION['idUsuario'];
$datosPaciente = DB::datosPaciente($idPaciente);
$srcImgPerfil = '../areaPaciente/perfil/'.$datosPaciente['srcImg'];
?>

<!-- NAVEGADOR -->
<div id="navegador">
    <nav class="navbar light-blue accent-1 mynav fixed-top scrolling-navbar">
        <i class="fas fa-bars openbtn light-blue accent-1" onclick="openNav()"></i>
        <a class="navbar-brand" href="areaPaciente.php">
            <img class="img-fluid img-logo" src="../img/logoNav.png" class="float-right" height="20" alt="click doctor logo" title="Ir a inicio">
        </a>
        <a href="perfil.php">
            <img class="avatarNav" src="<?php echo $srcImgPerfil; ?>" alt="imagen de perfil" title="Ver perfil">
        </a>
        <div id="mySidebar" class="sidebar light-blue accent-1 ">

            <a class="closebtn" onclick="closeNav()">×</a>
            <a class="hover" href="citasPaciente.php">Citas</a>
            <a class="hover" href="mensajesPaciente.php">Mensajes</a>
            <a class="hover" href="historialPaciente.php">Historial</a>
            <a class="hover" href="perfil.php">Perfil</a>
            <a class="hover" href="../cerrarSesion.php">Salir</a>
        </div>
    </nav>
</div>
