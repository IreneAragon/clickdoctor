<?php

// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}

$idConversacion = $_GET['chat'];

require_once '../include/cabeceraUsuarios.html';
require_once '../include/navPacientes.php';
?>



<div class="container mt-5 mb-5">

    <div class="mt-5 box-header">
        <div class="box-img-nombre">
            <img src="../areaProfesional/perfil/images/default-avatar.png" alt="Imagen de perfil del Profesional" class="chat-avatar">
            <h4>Chat con [NOMBRE RECEPTOR]</h4>
        </div>

    </div>
    <div class="chat-asunto" id="asunto">
        <h5>Sobre <b>[ASUNTO]</b></h5>
    </div>


    <div class="chat-previo">
        <!-- Pinta por ajax el primer mensaje -->
    </div>
    <!-- CONVERSACION -->
    <div class="chat" id="chat">

        <!-- EMISOR -->
        <div class="emisor">
            <div class="msg-emisor" id="primer-mensaje">
                Hola doctor, me duele la cabeza, qué puedo tomar?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <small class="ml-3">19:43</small>
            </div>
        </div>

        <!-- RECEPTOR -->
        <div class="receptor contenedor-receptor">
            <div class="msg-receptor" id="receptor">
                Puede tomar paracetamol
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.s
                <small class="ml-3">19:45</small>
            </div>
        </div>

        <!-- EMISOR -->
        <div class="emisor contenedor-receptor">
            <div class="msg-emisor" id="emisor">
                XXXXX
                <small class="ml-3">19:43</small>
            </div>
        </div>

    </div>

    <div class="campo-respuesta">
        <form class="" action="" method="post">
            <input type="text" name="" value="" placeholder="Escribe tu respuesta..." class="">
            <button type="submit" id="btnEnviarMensaje" name="button" data-chat="<?= $idConversacion ?>"><img src="../img/send.png" alt="Enviar mensaje" class="icon-send"></button>
        </form>
    </div>

</div>



<!-- <script src="mensajeria/js/agregarMensaje.js" charset="utf-8"></script> -->
<!-- <script src="mensajeria/js/listarMensajes.js" charset="utf-8"></script> -->
 <?php
 include_once '../include/footer.html';
