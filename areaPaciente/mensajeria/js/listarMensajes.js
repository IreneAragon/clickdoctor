
var btnEnviarMensaje = document.getElementById('btnEnviarMensaje');
var id_chat = btnEnviarMensaje.getAttribute('data-chat');
var inputAgregarMensaje = document.getElementById('inputAgregarMensaje');

btnEnviarMensaje.addEventListener("click", agregarMensaje);
// El botón "enter" también envía el mensaje
inputAgregarMensaje.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   // event.preventDefault();
   document.getElementById("btnEnviarMensaje").click();
  }
});

if ($(".errorCita").show()) {
    $(".errorCita").hide();
}

window.onload = listarMensajes(id_chat);

function listarMensajes(id_chat) {

    $.ajax({
        url: "mensajeria/back/listarMensajes.php",
        type: "post",
        data: {"id_chat": id_chat},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);

        // Datos del profesional
        let datosProfesional = arrayRespuesta.profesional;
        let nombreProfesional = datosProfesional.nombre+' '+datosProfesional.apellidos;
        let srcImgPerfilProfesional = '../areaProfesional/perfil/'+datosProfesional.srcImg;

        // Datos del chat
        let htmlEmisor = "";
        let htmlReceptor = "";
        let html = "";
        let asunto = arrayRespuesta.correo['asunto'];
        let texto_primer_mensaje = arrayRespuesta.correo['primer_texto'];

        // Construcción de la hora del mensaje
        let creado_el = arrayRespuesta.correo['creado_el'];
        let horaMensaje = new Date(creado_el);
        let hora_primer_mensaje = horaMensaje.getHours();
        let minuto_primer_mensaje = horaMensaje.getMinutes();

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        let pico = '<span data-testid="tail-out" data-icon="tail-out" class="pico">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13">'+
                            '<path opacity="0" d="M5.188 1H0v11.193l6.467-8.625C7.526 2.156 6.958 1 5.188 1z"></path>' +
                            '<path fill="rgba(128, 216, 255, 0.7)" d="M5.188 0H0v11.193l6.467-8.625C7.526 1.156 6.958 0 5.188 0z"></path>'+
                        '</svg>' +
                    '</span>';

        let hora_primer_mensaje_chat = addZero(hora_primer_mensaje)+':'+addZero(minuto_primer_mensaje);

        let html_primer_mensaje = "";
        html_primer_mensaje += '<div class="emisor">' +
                                    '<div class="msg contenedor-pico" id="primer-mensaje">' +
                                        pico +
                                        texto_primer_mensaje +
                                        '<small class="ml-3">'+hora_primer_mensaje_chat+'</small>' +
                                    '</div>'+
                               '</div>';

        arrayRespuesta.mensajes.forEach((mensaje, i) => {

            // Construir hora de los mensajes
            let timestamp = mensaje.timestamp;
            let horaMensajes = new Date(timestamp);
            let hora = horaMensajes.getHours();
            let minutos = horaMensajes.getMinutes();
            let hora_mensajes_chat = addZero(hora)+':'+addZero(minutos);

            let rol = mensaje.rol;
            let msg = mensaje.texto;
            let classContenedor = "";

            if (rol === '1') {
                classContenedor = 'emisor contenedor-emisor';
            } else {
                classContenedor = 'receptor contenedor-receptor';
            }





            let pico = '';

            if (classContenedor === "emisor contenedor-emisor"){
                // pico = '';
                pico = '<span data-testid="tail-out" data-icon="tail-out" class="pico">'+
                                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13">'+
                                    '<path opacity="0" d="M5.188 1H0v11.193l6.467-8.625C7.526 2.156 6.958 1 5.188 1z"></path>' +
                                    '<path fill="rgba(128, 216, 255, 0.7)" d="M5.188 0H0v11.193l6.467-8.625C7.526 1.156 6.958 0 5.188 0z"></path>'+
                                '</svg>' +
                            '</span>';
            } else if (classContenedor === "receptor contenedor-receptor") {
                pico = '';
                // pico = '<span data-testid="tail-out" data-icon="tail-out" class="_1bUzr">'+
                //                 '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13">'+
                //                     '<path opacity="0" d="M5.188 1H0v11.193l6.467-8.625C7.526 2.156 6.958 1 5.188 1z"></path>' +
                //                     '<path fill="rgba(128, 216, 255, 0.7)" d="M5.188 0H0v11.193l6.467-8.625C7.526 1.156 6.958 0 5.188 0z"></path>'+
                //                 '</svg>' +
                //             '</span>';
            }




            html += '<div class="'+classContenedor+'">'+
                        '<div class="msg contenedor-pico">' +
                            pico +
                            msg +
                            '<small class="ml-3">'+hora_mensajes_chat+'</small>' +
                        '</div>' +
                    '</div>';

            $('.chat').html(html);
        });

        $('#imgPerfilProf').attr('src', srcImgPerfilProfesional);
        $('#nombreProfesional').html('Chat con '+nombreProfesional);
        $('#asunto').html('Asunto: '+asunto);
        $('.chat-previo').html(html_primer_mensaje);

    });
}

/* INSERTAR MENSAJES NUEVOS */
function agregarMensaje(){

    let nuevoMensaje = inputAgregarMensaje.value;
    let msgError = '';

    $.ajax({
        url: "mensajeria/back/agregarMensajePaciente.php",
        type: "post",
        data: {"nuevoMensaje": nuevoMensaje,
               "id_chat": id_chat},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);

        if (arrayRespuesta.success) {
            $("#inputAgregarMensaje").val('');
            listarMensajes(id_chat);
        } else {
            // TODO: FIX IT no muestra mensaje de error
            msgError = 'FALLO';
            $('.errorCita').html(msgError);
            $(".errorCita").show("fast");
        }

    });

}
























/**/
