

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
        // console.log(arrayRespuesta.mensajes);
        let htmlEmisor = "";
        let htmlReceptor = "";
        let html = "";
        let asunto = arrayRespuesta.mensajes[0]['asunto'];
        let texto_primer_mensaje = arrayRespuesta.mensajes[0]['primer_texto'];
        let html_primer_mensaje = "";
        html_primer_mensaje += '<div class="emisor">' +
                                    '<div class="msg" id="primer-mensaje">' +
                                        texto_primer_mensaje +
                                        '<small class="ml-3">19:43</small>' +
                                    '</div>'+
                               '</div>';

        arrayRespuesta.mensajes.forEach((mensaje, i) => {

            let rol = mensaje.rol;
            let msg = mensaje.texto;
            let classContenedor = "";

            if (rol === '1') {
                classContenedor = 'emisor contenedor-emisor';
            } else {
                classContenedor = 'receptor contenedor-receptor';
            }

            html += '<div class="'+classContenedor+'">'+
                        '<div class="msg">' +
                            msg +
                            '<small class="ml-3">19:43</small>' +
                        '</div>' +
                    '</div>';

            $('.chat').html(html);

        });
// console.log(htmlEmisor);
// console.log(htmlEmisor);

        // Pintar el asunto
        $('#asunto').html('Asunto: '+asunto);
        $('.chat-previo').html(html_primer_mensaje);
        // $('#primer-mensaje').html(primer_mensaje);
        // $('.chat').html(htmlReceptor);
        // $('.chat').html(htmlEmisor);


    });


}
