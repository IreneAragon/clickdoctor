console.log('entra');
window.onload = listarCitas();
window.onload = listarHistorialCitas();
// window.onload = formularioEditarCita();





var btnBorrarCita = document.getElementById('btnConfirmaBorrar');
btnBorrarCita.addEventListener("click", borrarCita);


/* Listar las próximas citas del paciente */
function listarCitas() {
    $.ajax({
        url: "back/listarCitasPaciente.php",
        type: "post",
        data: {"filtro": 'proximas'},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
        let genero = "";
        arrayRespuesta.citas.forEach((cita, i) => {
            let genero = (cita.genero === "mujer") ? "Dra. " : "Dr. " ;
            htmlTr += "<tr>"+
                        "<td id='tdNombreProf("+cita.id_cita+")'>"+ genero + cita.nombre +" "+ cita.apellidos +"</td>"+
                        "<td id='tdEspecialidad("+cita.id_cita+")'>"+ cita.nombre_esp +"</td>"+
                        "<td id='tdFechaCita("+cita.id_cita+")'>"+ formatearFechaDDMMYYY(cita.fecha) +"</td>"+
                        "<td id='tdHoraCita("+cita.id_cita+")'>"+ cita.hora +"</td>"+
                        "<td><button type='button' onclick='modalEditarCita("+cita.id_cita+")' id='btnEditarCita("+cita.id_cita+")' class='btn btn-warning btn-sm mt-0 px-3 testing("+cita.id_cita+")' data-toggle='modal' data-target='#editarCita'><i class='fas fa-pen' aria-hidden='true'></i></button></td>"+
                        "<td><button type='button' onclick='modalBorrarCita("+cita.id_cita+")' class='btn btn-danger btn-sm mt-0 px-3' data-toggle='modal' data-target='#cancelarCita'><i class='fas fa-trash' aria-hidden='true'></i></button></td>"+
                    "</tr>";
        });
        if (arrayRespuesta.citas.length === 0) {
            $('#tablaProxCitas').hide();
            $('#msgNoCitas').show();
        }
        $('#listaCitasPaciente').html(htmlTr);

    });
}

/* Listar el historial de citas del paciente */
function listarHistorialCitas() {
    $.ajax({
        url: "back/listarCitasPaciente.php",
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
            $('#historialCitas').hide();
        } else {
            $('#listaHistorialCitas').html(htmlTr);
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
        url: "back/borrarCitaPaciente.php",
        type: "post",
        data: {"id_cita": idCita},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        if (arrayRespuesta.borradoOk) {
            $('#msgBorradoCita').show();
            $('#cancelarCita').modal('hide');
            listarCitas();
            $("#msgBorradoCita").delay(4000).slideUp(200, function() {
                $('#msgBorradoCita').hide();
            });
        }
    });
}

/* EDITAR */
/* Asignar al botón de edición el ID de la cita a editar */
function modalEditarCita(idCita) {

    var btnEditarCita = document.getElementById('btnEditarCita('+idCita+')');
    btnEditarCita.setAttribute('data-idcita',idCita);
    let idCitaEditar = btnEditarCita.getAttribute('data-idcita');
    console.log('xxxxxx',idCitaEditar);

    // Obtiene los datos de la cita para cargarlos en el formulario editable
    let tdProfesional = document.getElementById('tdNombreProf('+idCita+')');
    let tdEspecialidad = document.getElementById('tdEspecialidad('+idCita+')');
    let tdFecha = document.getElementById('tdFechaCita('+idCita+')');
    let tdHora = document.getElementById('tdHoraCita('+idCita+')');

    let tdProfText = tdProfesional.innerHTML;
    let tdEspText = tdEspecialidad.innerHTML;
    let tdFechaText = tdFecha.innerHTML;
    let tdHoraText = tdHora.innerHTML;

    // Pinta los datos de la cita a modificar
    $('#editEspecialista').html(tdProfText);
    $('#editEspecialidad').html(tdEspText);
    $("#editFecha").datepicker("setDate", tdFechaText);
    $('#editHora').html(tdHoraText);


       // btnEditarCita.addEventListener("click", formularioEditarCita);
}

function formularioEditarCita() {





    // let tdProfesional = document.getElementById ( "tdProf" );
    // let tdText = tdProfesional.innerHTML;


    // $.ajax({
    //     url: "back/editarCitaPaciente.php",
    //     type: "post",
    //     data: {"id_cita": idCita},
    // }).done(function(respuesta) {
    //     console.log('resp');
    //     // let arrayRespuesta = $.parseJSON(respuesta);
    //
    // });

   console.log('entra formEdit');

}

/* TODO:
    - obtener el formulario crear cita con los valores FECHA Y HORA EDITABLES
    - insertarlo en citasPaciente.php modal -> id modalEditBody
            - algo así
                let test = "<h1> Hola Mundo </h1>"
                $('#modalEditBody').html(test);
*/

/* TODO: preguntar Ali -> por qué no puedo acceder al formularioEditarCita() a través del evento click
            Uncaught TypeError: Cannot read property 'addEventListener' of null
            at listarCitasPaciente.js:93
*/


/* DO:
    - Obtener el id de la cita a modificar
    -
*/













/**/
