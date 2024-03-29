
var btnCrearConverProf = document.getElementById("btnCrearConverProf");
btnCrearConverProf.addEventListener("click", crearConversacion);
var divError = document.getElementById("errorCrearConverProf");
divError.style.display = 'none';
var divExito = document.getElementById("converCreadaProf");
divExito.style.display = 'none';

function crearConversacion() {
    let idPaciente = document.getElementById('selectNombrePaciente').value;
    let asunto = document.getElementById('asuntoProf').value;
    let mensaje = document.getElementById('msgProf').value;
    let msgError = "";

    if (idPaciente === '0') {
        msgError += "Debes seleccionar a un paciente.<br>";
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
            data: {"idPaciente" : idPaciente,
                   "asunto" : asunto,
                   "mensaje" : mensaje},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            if (arrayRespuesta.success) {
                // Muestra una alerta de éxito cuando la conversación haya sido creada
                $("#converCreadaProf").show("fast");
            }
        });
    }





}
