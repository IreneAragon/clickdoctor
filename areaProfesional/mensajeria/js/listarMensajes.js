
var btnEnviarMensaje = document.getElementById('btnEnviarMensajeProf');
var id_chat = btnEnviarMensaje.getAttribute('data-chat');
var inputAgregarMensaje = document.getElementById('inputAgregarMensajeProf');
var divError = document.getElementById('errorMsgProf');
divError.style.display = 'none';

btnEnviarMensaje.addEventListener("click", agregarMensaje);
// El botón "enter" también envía el mensaje
inputAgregarMensaje.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   document.getElementById("btnEnviarMensajeProf").click();
  }
});

window.onload = listarMensajes(id_chat);

function listarMensajes(id_chat) {

    $.ajax({
        url: "mensajeria/back/listarMensajes.php",
        type: "post",
        data: {"id_chat": id_chat},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);

        // Datos del paciente
        let datosPaciente = arrayRespuesta.paciente;
        let nombrePaciente = datosPaciente.nombre+' '+datosPaciente.apellidos;
        let srcImgPerfilPaciente = '../areaPaciente/perfil/'+datosPaciente.srcImg;

        // Datos del chat
        let htmlEmisor = "";
        let htmlReceptor = "";
        let html = "";
        let asunto = arrayRespuesta.correo['asunto'];
        let texto_primer_mensaje = arrayRespuesta.correo['primer_texto'];
        let emisor = arrayRespuesta.correo['emisor'];

        // Construcción de la hora del mensaje
        let creado_el = arrayRespuesta.correo['creado_el'];
        let horaMensaje = new Date(creado_el);
        let hora_primer_mensaje = horaMensaje.getHours();
        let minuto_primer_mensaje = horaMensaje.getMinutes();

        let hora_primer_mensaje_chat = addZero(hora_primer_mensaje)+':'+addZero(minuto_primer_mensaje);

        let html_primer_mensaje = "";

        // Dependiendo de si el emisor es paciente o profesional cambia la clase del primer texto y el tipo de 'pico' del chat
        let claseTipoUsuario = '';
        let pico = '';
        if (emisor === 'profesional') {
            claseTipoUsuario = 'emisor';
            // Pico emisor
            pico = '<span data-testid="tail-out" data-icon="tail-out" class="pico">'+
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13">'+
                                '<path opacity="0" d="M5.188 1H0v11.193l6.467-8.625C7.526 2.156 6.958 1 5.188 1z"></path>' +
                                '<path fill="rgba(128, 216, 255, 0.7)" d="M5.188 0H0v11.193l6.467-8.625C7.526 1.156 6.958 0 5.188 0z"></path>'+
                            '</svg>' +
                        '</span>';
        } else {
            claseTipoUsuario = 'receptor';
            // Pico receptor
            pico = '<span data-testid="tail-out" data-icon="tail-out" class="pico-receptor">'+
                           '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13">'+
                               '<path opacity="0" d="M1.533 3.568L8 12.193V1H2.812C1.042 1 .474 2.156 1.533 3.568z"></path>' +
                               '<path fill="rgba(222, 243, 250, 0.7)" d="M1.533 2.568L8 11.193V0H2.812C1.042 0 .474 1.156 1.533 2.568z"></path>'+
                           '</svg>' +
                       '</span>';
        }

        html_primer_mensaje += '<div class="'+claseTipoUsuario+'">' +
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
               classContenedor = 'receptor contenedor-receptor';
           } else {
               classContenedor = 'emisor contenedor-emisor';
           }

           let pico = '';

           if (classContenedor === "emisor contenedor-emisor"){
               pico = '<span data-testid="tail-out" data-icon="tail-out" class="pico">'+
                           '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13">'+
                               '<path opacity="0" d="M5.188 1H0v11.193l6.467-8.625C7.526 2.156 6.958 1 5.188 1z"></path>' +
                               '<path fill="rgba(128, 216, 255, 0.7)" d="M5.188 0H0v11.193l6.467-8.625C7.526 1.156 6.958 0 5.188 0z"></path>'+
                           '</svg>' +
                       '</span>';
           } else if (classContenedor === "receptor contenedor-receptor") {
               pico = '<span data-testid="tail-out" data-icon="tail-out" class="pico-receptor">'+
                           '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 13" width="8" height="13">'+
                               '<path opacity="0" d="M1.533 3.568L8 12.193V1H2.812C1.042 1 .474 2.156 1.533 3.568z"></path>' +
                               '<path fill="rgba(222, 243, 250, 0.7)" d="M1.533 2.568L8 11.193V0H2.812C1.042 0 .474 1.156 1.533 2.568z"></path>'+
                           '</svg>' +
                       '</span>';
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

       $('#imgPerfilPaciente').attr('src', srcImgPerfilPaciente);
       $('#nombrePaciente').html('Chat con '+nombrePaciente);
       $('#asuntoProf').html('Asunto: '+asunto);
       $('.chat-previo').html(html_primer_mensaje);

       // Mantiene el chat abajo del todo, para ver el último mensaje enviado
       var chat = document.getElementById("box-chat-prof");
       chat.scrollTop = chat.scrollHeight;
       refrescarMensajes();
    });
}

function agregarMensaje() {

    let nuevoMensaje = inputAgregarMensaje.value;
    let msgError = '';

    if (inputAgregarMensaje.value === "") {
        msgError = 'No puedes enviar un mensaje vacío, escribe algo.';
        divError.style.display = 'block';
        $('#errorMsgProf').html(msgError);
        $("#errorMsgProf").show("fast");
        setTimeout(function(){ $("#errorMsgProf").fadeOut(); }, 4000);
    } else {
        $.ajax({
            url: "mensajeria/back/agregarMensajeProfesional.php",
            type: "post",
            data: {"nuevoMensaje": nuevoMensaje,
                   "id_chat": id_chat},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);

            if (arrayRespuesta.success) {
                $("#inputAgregarMensajeProf").val('');
                listarMensajes(id_chat);
            } else {
                msgError = 'Ocurrió un error, prueba de nuevo.';
                $('#errorMsgProf').html(msgError);
                $("#errorMsgProf").show("fast");
                setTimeout(function(){ $("#errorMsgProf").fadeOut(); }, 4000);
            }
        });
    }
}

function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function refrescarMensajes() {
  setTimeout(function(){
      listarMensajes(id_chat);
  }, 3000);
}
