<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

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
            <img src="" id="imgPerfilProf" alt="Imagen de perfil del Profesional" class="chat-avatar">
            <h4 id="nombreProfesional"></h4>
        </div>
        <div class="chat-asunto" id="asunto">
            <h5>Sobre <b>[ASUNTO]</b></h5>
        </div>
    </div>


    <!-- CHAT -->
    <div id="box-chat" class="contenedor-chat">
        <div class="chat-previo">
            <!-- Pinta por ajax el primer mensaje -->
        </div>
        <div class="chat" id="chat">
            <!-- Pinta por ajax el resto de mensajes -->
        </div>
    </div>

    <div class="campo-respuesta">
        <input type="text" name="" id="inputAgregarMensaje" placeholder="Escribe tu respuesta..." class="">
        <button type="submit" id="btnEnviarMensaje" name="button" data-chat="<?= $idConversacion ?>"><img src="../img/send.png" alt="Enviar mensaje" class="icon-send"></button>
    </div>
    <div class="alert alert-danger errorCita text-center" role="alert">
    </div>
</div>

<script src="mensajeria/js/listarMensajes.js" charset="utf-8"></script>
 <?php
 include_once '../include/footer.html';
