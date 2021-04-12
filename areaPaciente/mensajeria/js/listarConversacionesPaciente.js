window.onload = listarConversaciones();

var btnEliminarConver = document.getElementById('btnConfirmaEliminar');
btnEliminarConver.addEventListener("click", eliminarConversacion);

if ($('#msgEliminarConver').show()) {
    $('#msgEliminarConver').hide();
}


/* LISTAR CONVERSACIONES */
function listarConversaciones(){

    $.ajax({
        url: "mensajeria/back/listarConversacionesPaciente.php",
        type: "post",
        // data: {"filtro": 'proximas'},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
        let genero = "";

        arrayRespuesta.conversaciones.forEach((conversacion, i) => {

            let timestamp = conversacion.creado_el;
            let fecha = new Date(timestamp);
            let dia = fecha.getDate();
            let mes = fecha.getMonth();
            let year = fecha.getFullYear();
            if (dia > 0 && dia < 10) {
                dia = '0'+dia;
            }
            if (mes > 0 && mes < 10) {
                mes = '0'+mes;
            }
            let fechaDDMMYYY = dia +'-'+ mes +'-'+ year;

            htmlTr += "<tr>"+
                        "<td>"+ fechaDDMMYYY +"</td>"+
                        "<td>"+ conversacion.id_prof_FK +"</td>"+
                        "<td>"+ conversacion.asunto +"</td>"+
                        "<td> <button type='button' data-idConversacion='"+conversacion.id_correo+"' class='btn btn-info btn-sm btnStyle'>Ver <i class='fa fa-eye iconoOjo'></i></button> </td>"+
                        "<td> <button type='button' data-idConversacion='"+conversacion.id_correo+"' onclick='modalEliminarConver("+conversacion.id_correo+")' class='btn btn-danger btn-sm btnStyle' data-toggle='modal' data-target='#eliminarConversacion'>Eliminar <i class='fa fa-trash iconoOjo'></i></button> </td>"+
                      "</tr>";
        });

        $('#listaConversacionesPaciente').html(htmlTr);

    });
}

/* ELIMINAR CONVERSACIÓN */
/* Asignar al botón de borrado el ID de la conversación a eliminar */
function modalEliminarConver(idConver) {
    btnEliminarConver.setAttribute('data-idConver',idConver);
}


function eliminarConversacion() {
    let idConver = btnEliminarConver.getAttribute('data-idConver');
    $.ajax({
        url: "mensajeria/back/eliminarConversacionPaciente.php",
        type: "post",
        data: {"idConver": idConver},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        if (arrayRespuesta.borradoOk) {
            $('#msgEliminarConver').show();
            $('#eliminarConversacion').modal('hide');
            listarConversaciones();
            $("#msgEliminarConver").delay(4000).slideUp(200, function() {
                $('#msgEliminarConver').hide();
            });
        }
    });
}















/**/
