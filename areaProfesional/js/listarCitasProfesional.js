
window.onload = listarCitas();
window.onload = listarHistorialCitas();
$('#msgNoCitasProf').hide();
$('#msgBorradoCitaProf').hide();

var btnBorrarCita = document.getElementById('btnConfirmaBorrarProf');
btnBorrarCita.addEventListener("click", borrarCita);


function listarCitas() {
    $.ajax({
        url: "back/listarCitasProfesionales.php",
        type: "post",
        data: {"filtro": 'proximas'},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
        let genero = "";
        arrayRespuesta.citas.forEach((cita, i) => {
            htmlTr += "<tr>"+
                        "<td id='tdNombrePac("+cita.id_cita+")' data-idpac='"+ cita.id_pac_FK +"' >"+ cita.nombre +" "+ cita.apellidos +"</td>"+
                        "<td id='tdEspecialidad("+cita.id_cita+")'>"+ cita.nombre_esp +"</td>"+
                        "<td id='tdFechaCita("+cita.id_cita+")'>"+ formatearFechaDDMMYYY(cita.fecha) +"</td>"+
                        "<td id='tdHoraCita("+cita.id_cita+")'>"+ cita.hora +"</td>"+
                        "<td><button type='button' onclick='modalEditarCita("+cita.id_cita+","+cita.id_pac_FK+", "+ cita.id_especialidad +")' id='btnEditarCitaProf("+cita.id_cita+")' class='btn btn-warning btn-sm mt-0 px-3 testing("+cita.id_cita+")' data-toggle='modal' data-target='#editarCitaProf'><i class='fas fa-pen' aria-hidden='true'></i></button></td>"+
                        "<td><button type='button' onclick='modalBorrarCita("+cita.id_cita+")' class='btn btn-danger btn-sm mt-0 px-3' data-toggle='modal' data-target='#cancelarCitaProf'><i class='fas fa-trash' aria-hidden='true'></i></button></td>"+
                    "</tr>";
        });
        if (arrayRespuesta.citas.length === 0) {
            $('#tablaProxCitasProf').hide();
            $('#msgNoCitasProf').show();
        }
        $('#listaCitasProfesional').html(htmlTr);
    });
}

function listarHistorialCitas() {
    $.ajax({
        url: "back/listarCitasProfesionales.php",
        type: "post",
        data: {"filtro": 'pasadas'},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
        arrayRespuesta.citas.forEach((cita, i) => {
            let genero = (cita.genero === "mujer") ? "Dra. " : "Dr. " ;
            htmlTr += "<tr>"+
                        "<td id='tdProf' >"+ genero + cita.nombre +" "+ cita.apellidos +"</td>"+
                        "<td id='tdEsp' >"+ cita.nombre_esp +"</td>"+
                        "<td id='tdFecha' >"+ formatearFechaDDMMYYY(cita.fecha) +"</td>"+
                        "<td id='tdHora' >"+ cita.hora +"</td>"+
                    "</tr>";
        });
        if (arrayRespuesta.citas.length === 0) {
            $('#historialCitasProf').hide();
        } else {
            $('#listaHistorialCitasProf').html(htmlTr);
        }
    });
}

/* BORRAR */
/* Asignar al botón de borrado el ID de la cita a eliminar */
function modalBorrarCita(idCita) {
    btnBorrarCita.setAttribute('data-idcita',idCita);
}
function borrarCita() {
    let idCita = btnBorrarCita.getAttribute('data-idcita');
    $.ajax({
        url: "back/borrarCitaProfesionales.php",
        type: "post",
        data: {"idCita": idCita},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        console.log(arrayRespuesta);
        if (arrayRespuesta.borradoOk) {
            $('#msgBorradoCitaProf').show();
            $('#cancelarCitaProf').modal('hide');
            listarCitas();
            $("#msgBorradoCitaProf").delay(4000).slideUp(200, function() {
                $('#msgBorradoCitaProf').hide();
            });
        }
    });
}
