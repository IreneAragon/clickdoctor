
if ($('#msgNoInformes').show()) {
    $('#msgNoInformes').hide();
}

window.onload = listarInformes();

/* Lista los informes creados por el profesional */
function listarInformes() {
    $.ajax({
        url: "back/listarInformesProfesional.php",
        type: "post",
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
        arrayRespuesta.informes.forEach((informe, i) => {
            // Construcción del nombre del paciente a través del nombre del fichero pdf
            var nombrePaciente = informe.nombre;
            var res = nombrePaciente.split("_");
            /* pattern: cualquier número + que acabe en .pdf */
            var patt = /^[0-9]+\.pdf$/i;
            var segApellido = res[2];

            if (segApellido.search(patt) < 0) {
              // existe segundo apellido
              var nombre = res[0] +' '+ res[1] +' '+ res[2];
            } else {
              // no existe segundo apellito
              var nombre = res[0] +' '+ res[1];
            }

            // Construcción del path del fichero a abrir
            var rootServer = 'CLICK_DOCTOR/historiales/';
            var folder = informe.id_paciente_FK+'/';
            var file = informe.nombre;
            var filePath = rootServer+folder+file;

            htmlTr += "<tr>"+
                        "<td id='tdFechaInforme("+informe.id_informe+")'>"+ formatearFechaDDMMYYY(informe.creado_el) +"</td>"+
                        "<td id='tdNombrePaciente("+informe.id_informe+")'>"+ nombre +"</td>"+
                        "<td><a href=../../"+filePath+" class='btn btn-info' target='_blank' data-informe='"+informe.id_informe+"'>Ver <i class='fa fa-eye iconoOjo'></i></a></td>"+
                    "</tr>";
        });
        if (arrayRespuesta.informes.length === 0) {
            $('#tablaProfInformes').hide();
            $('#msgNoInformes').show();
        }
        $('#listaProfInformes').html(htmlTr);
    });
}







/*
    pattern: cualquier letra, número o símbolo más que acabe en .pdf
        var patt = /^[a-z0-9_()\-\[\]]+\.pdf$/i;
*/
