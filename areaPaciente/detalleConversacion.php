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



<div class="container mt-5">

    <div class="mt-5">
        <h4>Conversación con [NOMBRE RECEPTOR]</h4>
        <h5>Sobre <b>[ASUNTO]</b></h5>
    </div>



    <!-- CONVERSACION -->
<div class="chat">

    <!-- EMISOR -->
    <div class="emisor">
        <div class="msg-emisor">
            Hola doctor, me duele la cabeza, qué puedo tomar?
        </div>
    </div>

    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            Puede tomar paracetamol
        </div>
    </div>

    <!-- EMISOR -->
    <div class="emisor">
        <div class="msg-emisor">
            ¿Cada cuánto tiempo?
        </div>
    </div>

    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            Uno cada 8 horas
        </div>
    </div>
    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            ¿vale?
        </div>
    </div>

    <!-- EMISOR -->
    <div class="emisor">
        <div class="msg-emisor">
            Vale
        </div>
    </div>
    <!-- EMISOR -->
    <div class="emisor">
        <div class="msg-emisor">
            Tengo otra pregunta
        </div>
    </div>
    <!-- EMISOR -->
    <div class="emisor">
        <div class="msg-emisor">
            ¿puedo tomar ibuprofeno?
        </div>
    </div>

    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            Solo si el dolor persiste
        </div>
    </div>
    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            No es lo más recomendable
        </div>
    </div>

    <!-- EMISOR -->
    <div class="emisor">
        <div class="msg-emisor">
            ¿puedo tomar ibuprofeno?
        </div>
    </div>
    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            Solo si el dolor persiste
        </div>
    </div>
    <!-- EMISOR -->
    <div class="emisor">
        <div class="msg-emisor">
            ¿puedo tomar ibuprofeno?
        </div>
    </div>

    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            Solo si el dolor persiste
        </div>
    </div>
    <!-- RECEPTOR -->
    <div class="receptor">
        <div class="msg-receptor">
            No es lo más recomendable
        </div>
    </div>

</div>

<div class="campo-respuesta">
    <input type="text" name="" value="" placeholder="Escribe tu respuesta...">
    <!-- <button type="button" name="button" class="btn btn-info">Enviar</button> -->
    <img src="../img/send.png" alt="Enviar mensaje" class="icon-send">
</div>










</div>




















 <?php
 include_once '../include/footer.html';
