window.onload = listarConversaciones();
var btnEliminarConver = document.getElementById('btnConfirmaEliminarProf');
btnEliminarConver.addEventListener("click", eliminarConversacion);

if ($('#msgEliminarConverProf').show()) {
    $('#msgEliminarConverProf').hide();
}

function listarConversaciones() {

    $.ajax({
        url: "mensajeria/back/listarConversacionesProfesionales.php",
        type: "post",
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
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
                        "<td>"+ conversacion.nombre + " " +conversacion.apellidos + "</td>"+
                        "<td>"+ conversacion.asunto +"</td>"+
                        "<td> <a href='detalleConversacion.php?chat="+conversacion.id_correo+"' data-idConversacion='"+conversacion.id_correo+"' class='btn btn-info btn-sm btnStyle'>Ver <i class='fa fa-eye iconoOjo'></i></a> </td>"+
                        "<td> <button type='button' data-idConversacion='"+conversacion.id_correo+"' onclick='modalEliminarConver("+conversacion.id_correo+")' class='btn btn-danger btn-sm btnStyle' data-toggle='modal' data-target='#eliminarConversacionProf'>Eliminar <i class='fa fa-trash iconoOjo'></i></button> </td>"+
                      "</tr>";
        });
        $('#listaConversacionesProfesional').html(htmlTr);
    });

}

/* ELIMINAR CONVERSACIÓN */
/* Asignar al botón de borrado el ID de la conversación a eliminar */
function modalEliminarConver(idConver) {
    btnEliminarConver.setAttribute('data-idConver',idConver);
}

function eliminarConversacion(){
    let idConver = btnEliminarConver.getAttribute('data-idConver');

    $.ajax({
        url: "mensajeria/back/eliminarConversacionProfesional.php",
        type: "post",
        data: {"idConver": idConver},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        if (arrayRespuesta.borradoOk) {
            $('#msgEliminarConverProf').show();
            $('#eliminarConversacionProf').modal('hide');
            listarConversaciones();
            $("#msgEliminarConverProf").delay(4000).slideUp(200, function() {
                $('#msgEliminarConverProf').hide();
            });
        }
    });

}
