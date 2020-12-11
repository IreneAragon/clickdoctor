window.onload = listarCitas();


function listarCitas() {
    let idPaciente = 1; /* TODO: traer id paciente real por session */
    $.ajax({
        url: "back/listarCitasPaciente.php",
        type: "post",
        data: {"id_paciente" : idPaciente},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        // console.log(arrayRespuesta.citas);
        let htmlTr = "";
        arrayRespuesta.citas.forEach((cita, i) => {
            // formatearFechaDDMMYYY(cita.fecha);
            htmlTr += "<tr>"+
                        "<td>"+ cita.nombre +" "+ cita.apellidos +"</td>"+
                        "<td>"+ cita.nombre_esp +"</td>"+
                        "<td>"+ formatearFechaDDMMYYY(cita.fecha) +"</td>"+
                        "<td>"+ cita.hora +"</td>"+
                        "<td><button type='button' class='btn btn-warning btn-sm mt-0 px-3' data-toggle='modal' data-target='#editarCita'><i class='fas fa-pen' aria-hidden='true'></i></button></td>"+
                        "<td><button type='button' class='btn btn-danger btn-sm mt-0 px-3' data-toggle='modal' data-target='#cancelarCita'><i class='fas fa-trash' aria-hidden='true'></i></button></td>"+
                    "</tr>";
        });

        console.log(arrayRespuesta.citas.length);

        if (arrayRespuesta.citas.length === 0) {
            $('#tablaProxCitas').hide();
            $('#msgNoCitas').show();

        }

        $('#listaCitasPaciente').html(htmlTr);

    });
}
