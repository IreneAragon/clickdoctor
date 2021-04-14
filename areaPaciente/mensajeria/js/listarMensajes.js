

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
                                    '<div class="msg-emisor" id="primer-mensaje">' +
                                        texto_primer_mensaje +
                                        '<small class="ml-3">19:43</small>' +
                                    '</div>'+
                               '</div>';



console.log(html_primer_mensaje);

        arrayRespuesta.mensajes.forEach((mensaje, i) => {

            let rol = mensaje.rol;
            let msg = mensaje.texto;




            if (rol === '1') {
                html += '<div class="emisor contenedor-emisor">' +
                                  '<div class="msg-emisor" id="emisor">' +
                                      msg +
                                      '<small class="ml-3">19:43</small>' +
                                  '</div>' +
                              '</div>';
                // $('#emisor').html(msg);
                $('.chat').html(html);
            } else if (rol === '2'){

                html += '<div class="receptor contenedor-receptor">'+
                                    '<div class="msg-receptor" id="receptor">' +
                                        msg +
                                        '<small class="ml-3">19:43</small>' +
                                    '</div>' +
                                '</div>';
                // $('#receptor').html(msg);
                $('.chat').html(html);
            }



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
