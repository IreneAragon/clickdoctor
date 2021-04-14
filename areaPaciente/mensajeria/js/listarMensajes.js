

var btnEnviarMensaje = document.getElementById('btnEnviarMensaje');
var id_chat = btnEnviarMensaje.getAttribute('data-chat');

window.onload = listarMensajes(id_chat);

function listarMensajes(id_chat) {

    $.ajax({
        url: "mensajeria/back/listarMensajes.php",
        type: "post",
        data: {"id_chat": id_chat},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
console.log(arrayRespuesta.mensajes);
    });


}
