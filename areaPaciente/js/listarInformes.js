
 if ($('#msgNoInformesPaciente').show()) {
     $('#msgNoInformesPaciente').hide();
 }

window.onload = listarInformesPaciente();

function listarInformesPaciente() {
    $.ajax({
        url: "back/listarInformes.php",
        type: "post",
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
        arrayRespuesta.informes.forEach((informe, i) => {

        // Construcción del path del fichero a abrir
        var rootServer = 'CLICK_DOCTOR/historiales/';
        var folder = informe.id_paciente_FK+'/';
        var file = informe.nombre;
        var filePath = rootServer+folder+file;

        htmlTr += "<tr>"+
                    "<td>"+ formatearFechaDDMMYYY(informe.creado_el) +"</td>"+
                    "<td>"+ informe.especialidad +"</td>"+
                    "<td><a href=../../"+filePath+" data-idInforme='"+informe.id_informe+"' class='btn btn-info btn-sm btnStyle waves-effect waves-light' target='_blank'>Ver <i class='fa fa-eye iconoOjo'></i></a></td>"+
                  "</tr>";

        });

        if (arrayRespuesta.informes.length === 0) {
            $('#tablaInformesPaciente').hide();
            $('#msgNoInformesPaciente').show();
        }

        $('#listaInformesPaciente').html(htmlTr);
    });

}
