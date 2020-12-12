
window.onload = listarCitas();
window.onload = listarHistorialCitas();

function listarCitas() {

    /* Conocer el género del profesional */


    $.ajax({
        url: "back/listarCitasPaciente.php",
        type: "post",
        data: {"filtro": 'proximas'},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";

        arrayRespuesta.citas.forEach((cita, i) => {

            // console.log('test',cita.id_prof_FK);
            // let id_prof = cita.id_prof_FK;
            // console.log(id_prof);
            // let genero =





            htmlTr += "<tr>"+
                        "<td>"+ cita.nombre +" "+ cita.apellidos +"</td>"+
                        "<td>"+ cita.nombre_esp +"</td>"+
                        "<td>"+ formatearFechaDDMMYYY(cita.fecha) +"</td>"+
                        "<td>"+ cita.hora +"</td>"+
                        "<td><button type='button' class='btn btn-warning btn-sm mt-0 px-3' data-toggle='modal' data-target='#editarCita'><i class='fas fa-pen' aria-hidden='true'></i></button></td>"+
                        "<td><button type='button' class='btn btn-danger btn-sm mt-0 px-3' data-toggle='modal' data-target='#cancelarCita'><i class='fas fa-trash' aria-hidden='true'></i></button></td>"+
                    "</tr>";
        });

        if (arrayRespuesta.citas.length === 0) {
            $('#tablaProxCitas').hide();
            $('#msgNoCitas').show();
        }

        $('#listaCitasPaciente').html(htmlTr);

    });
}

function listarHistorialCitas() {
    $.ajax({
        url: "back/listarCitasPaciente.php",
        type: "post",
        data: {"filtro": 'pasadas'},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
        arrayRespuesta.citas.forEach((cita, i) => {
            htmlTr += "<tr>"+
                        "<td>"+ cita.nombre +" "+ cita.apellidos +"</td>"+
                        "<td>"+ cita.nombre_esp +"</td>"+
                        "<td>"+ formatearFechaDDMMYYY(cita.fecha) +"</td>"+
                        "<td>"+ cita.hora +"</td>"+
                    "</tr>";
        });

        if (arrayRespuesta.citas.length === 0) {
            $('#historialCitas').hide();
        } else {
            $('#listaHistorialCitas').html(htmlTr);
        }
    });

}
