
var btnCrearConver = document.getElementById("btnCrearConver");
btnCrearConver.addEventListener("click", crearConversacion);
var divError = document.getElementById("errorCrearConver");
divError.style.display = 'none';
var divExito = document.getElementById("converCreada");
divExito.style.display = 'none';

function crearConversacion() {

    let idEspecialidad = document.getElementById('selectEspecialidadMsg').value;
    let idProfesional = document.getElementById('selectEspecialistaMsg').value;
    let asunto = document.getElementById('newAsunto').value;
    let mensaje = document.getElementById('newMens').value;
    let msgError = "";

    if (idEspecialidad === '0') {
        msgError += "Debes seleccionar una especialidad.<br>";
    }
    if (idProfesional === '0') {
        msgError += "Debes seleccionar un especialista.<br>";
    }
    if (asunto === '') {
        msgError += "Debes escribir un asunto.<br>";
    }
    if (mensaje === '') {
        msgError += "Debes escribir un mensaje.<br>";
    }

    if (msgError === '') {
        divError.style.display = 'none';
    } else {
        divError.innerHTML = msgError;
        divError.style.display = 'block';
    }

    if (msgError === '') {
        $.ajax({
            url: "mensajeria/back/crearConversacion.php",
            type: "post",
            data: {"id_especialidad" : idEspecialidad,
                   "idProfesional" : idProfesional,
                   "asunto" : asunto,
                   "mensaje" : mensaje},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            if (arrayRespuesta.success) {
                // Muestra una alerta de éxito cuando la conversación haya sido creada
                $("#converCreada").show("fast");

            }
        });
    }
















}
