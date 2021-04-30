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
// TODO: ACTUALIZACIÓN día 21 de abril, no sé qué me está contando la irene del pasado, he llamado
// a la clase DB para insertar el srcImg de la foto de perfil y el generador de informer sigue
// funcionando correctamente. No voy a borrar esta bella conversación por si acaso...


require_once '../clases/claseDB.php';
$idProf = $_SESSION['idUsuario'];
$datosProfesional = DB::datosProfesional($idProf);
$srcImgPerfil = '../areaProfesional/perfil/'.$datosProfesional['srcImg'];



?>


<!-- NAVEGADOR -->
<div id="navegador">
    <nav class="navbar light-blue accent-1 mynav fixed-top scrolling-navbar">
        <i class="fas fa-bars openbtn light-blue accent-1" onclick="openNav()"></i>
        <a class="navbar-brand" href="areaProfesional.php">
            <img class="img-fluid img-logo" src="../img/logoNav.png" height="20" alt="click doctor logo" title="Ir a inicio">
        </a>
        <a href="perfil.php">
            <img class="avatarNav reduce" src="<?php echo $srcImgPerfil; ?>" alt="imagen de perfil" title="Ver perfil">
        </a>
        <div id="mySidebar" class="sidebar light-blue accent-1 ">
            <a class="closebtn" onclick="closeNav()">×</a>
            <a href="citasProfesionales.php" class="hover">Citas</a>
            <a href="mensajesProfesionales.php" class="hover">Mensajes</a>
            <a href="#" class="noHover">Informes</a>
            <a href="crearInforme.php" class="moverTexto hover">Generar informes</a>
            <a href="verInformes.php" class="moverTexto hover">Ver informes</a>
            <a href="perfil.php" class="hover">Perfil</a>
            <a href="../cerrarSesion.php" class="hover">Salir</a>
        </div>
    </nav>
</div>
