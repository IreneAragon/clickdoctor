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
    <div class="chat-asunto">
        <h5>Sobre <b>[ASUNTO]</b></h5>
    </div>



    <!-- CONVERSACION -->
<div class="chat">

    <!-- EMISOR -->
    <div class="emisor">
        <div class="msg-emisor">
            Hola doctor, me duele la cabeza, qué puedo tomar?
            <small class="ml-3">19:43</small>
        </div>

    </div>

    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            Puede tomar paracetamol
            <small class="ml-3">19:45</small>
        </div>
    </div>

</div>

<div class="campo-respuesta">
    <form class="" action="" method="post">
        <input type="text" name="" value="" placeholder="Escribe tu respuesta..." class="">
        <button type="submit" name="button"><img src="../img/send.png" alt="Enviar mensaje" class="icon-send"></button>
    </form>
</div>










</div>




















 <?php
 include_once '../include/footer.html';
