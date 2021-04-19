
/*
    pattern: cualquier letra, número o símbolo más que acabe en .pdf
        var patt = /^[a-z0-9_()\-\[\]]+\.pdf$/i;
*/
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

            htmlTr += "<tr>"+
                        "<td id='tdFechaInforme("+informe.id_informe+")'>"+ formatearFechaDDMMYYY(informe.creado_el) +"</td>"+
                        "<td id='tdNombrePaciente("+informe.id_informe+")'>"+ nombre +"</td>"+
                        "<td><button type='button' onclick='abrirInforme("+informe.id_informe+")' id='btnAbrirInforme("+informe.id_informe+")' class='btn btn-info mt-0 px-3'>Ver <i class='fa fa-eye iconoOjo'></i></button></td>"+
                    "</tr>";
        });

        $('#listaProfInformes').html(htmlTr);

    });



}
