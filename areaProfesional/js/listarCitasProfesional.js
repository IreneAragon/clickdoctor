
window.onload = listarCitas();
window.onload = listarHistorialCitas();
$('#msgNoCitasProf').hide();
$('#msgBorradoCitaProf').hide();
$('#citaModificadaProf').hide();
$('#errorCitaProf').hide();

var btnBorrarCita = document.getElementById('btnConfirmaBorrarProf');
btnBorrarCita.addEventListener("click", borrarCita);
var btnGuardarCitaEditada = document.getElementById("btnGuardarCitaEditadaProf");
btnGuardarCitaEditada.addEventListener("click", modificarCita);


var idProf =    '';
var tdFechaText =    '';
var tdFecha =    '';

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
                        "<td><button type='button' onclick='modalEditarCita("+cita.id_cita+","+cita.id_prof_FK+", "+ cita.id_especialidad +")' id='btnEditarCitaProf("+cita.id_cita+")' class='btn btn-warning btn-sm mt-0 px-3 testing("+cita.id_cita+")' data-toggle='modal' data-target='#editarCitaProf'><i class='fas fa-pen' aria-hidden='true'></i></button></td>"+
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

/* EDITAR */
/* Asignar al botón de edición el ID de la cita a editar */
function modalEditarCita(idCita, idProf, idEsp) {

    // if ($("#errorCitaProf").show()) {
    //     $("#errorCitaProf").hide()
    // }

    var btnEditarCita = document.getElementById('btnEditarCitaProf('+idCita+')');
    btnEditarCita.setAttribute('data-idcita',idCita);
    let idCitaEditar = btnEditarCita.getAttribute('data-idcita');

    // Obtiene los datos de la cita para cargarlos en el formulario editable
    let tdPaciente = document.getElementById('tdNombrePac('+idCita+')');
    let tdEspecialidad = document.getElementById('tdEspecialidad('+idCita+')');
     tdFecha = document.getElementById('tdFechaCita('+idCita+')');
    let tdHora = document.getElementById('tdHoraCita('+idCita+')');
    let tdPacText = tdPaciente.innerHTML;
    let tdEspText = tdEspecialidad.innerHTML;
     tdFechaText = tdFecha.innerHTML;
    let tdHoraText = tdHora.innerHTML;
    console.log('tdFechaText',tdFechaText);

    let divExito = document.getElementById("citaModificadaProf");
    divExito.style.display = 'none';

    // Pinta los datos de la cita a modificar
    $('#editPacienteProf').html(tdPacText);
    $('#editEspecialidadProf').html(tdEspText);


    var idsCita = document.getElementById('idsCitaProf');
    idsCita.setAttribute('data-valores', JSON.stringify({'idProf' : idProf, 'idEsp' : idEsp, 'idCita' : idCita}));

    /*******************************/
    /*******************************/
    /*******************************/
    $("#editFechaProf").datepicker("setDate", tdFechaText);


    traerDisponibilidad(idProf, tdFechaText);

}


function traerDisponibilidad(idEspecialista, fecha) {

    // Cambiar el formato de la fecha recibida para que la acepte la consulta a la BD
    fecha = fecha.split("-");
    let fechayyyymmdd =    fecha[2]+'-'+ fecha[1] +'-'+  fecha[0];
    console.log('fecha',fecha);
    console.log('fechayyyymmdd',fechayyyymmdd);

    $.ajax({
        url: "back/obtenerDisponibilidad.php",
        type: "post",
        data: {"idEspecialista" : idEspecialista, "fechayyyymmdd" : fechayyyymmdd},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlOptions = '<option value="0">Selecciona la hora</option>';
        if (arrayRespuesta.isEmpty) {
            htmlOptions = '<option value="0">No hay citas para este día</option>';
        }
        for (var key in arrayRespuesta.datos){
            var attrName = key;
            var attrValue = arrayRespuesta.datos[key];
            htmlOptions += '<option value="'+key+'">'+arrayRespuesta.datos[key]+'</option>';
        }
        $('#editHoraProf').html(htmlOptions);
    });
}


function modificarCita() {

    // Obtener los datos de la cita
    let idsCita = document.getElementById('idsCitaProf').value;
    let valores = document.getElementById('idsCitaProf').getAttribute('data-valores');
    let jsonValores = JSON.parse(valores);

    // Valores
    let idEsp =  jsonValores.idEsp;
     idProf =  jsonValores.idProf;
    let idCita =  jsonValores.idCita;
    let fecha = document.getElementById('editFechaProf').value
    fecha = fecha.split("-");
    let fechayyyymmdd =    fecha[2]+'-'+ fecha[1] +'-'+  fecha[0];
    let hora = document.getElementById('editHoraProf').value

    /*Validaciones*/
    let divError = document.getElementById("errorCitaProf");
    let divExito = document.getElementById("citaModificadaProf");
    let regexFecha = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
    let msgError = '';

    if (fechayyyymmdd === 'undefined-undefined-') {
        msgError += "Debe seleccionar una fecha.<br>";
    }

    if (!regexFecha.test(fechayyyymmdd)) {
        msgError += "Formato de fecha incorrecto.<br>";
    }

    if (hora === '0') {
        msgError += "Debe seleccionar una hora.";
    }

    if (msgError === '') {
        divError.style.display = 'none';
    } else {
        divError.innerHTML = msgError;
        divError.style.display = 'block';
    }

    if (msgError === '') {

        $.ajax({
            url: "back/editarCitaProfesional.php",
            type: "post",
            data: {"idCita" : idCita,
                   "idEsp" : idEsp,
                   "idProf" : idProf,
                   "fecha" : fechayyyymmdd,
                   "hora" : hora},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            if (arrayRespuesta.success) {

                divExito.style.display = 'block';
                listarCitas();

            }
        });

    }

}
















//Función que bloquea sábados y domingos
 function bloquearFinSemana(date){
     var day = date.getDay();
     // Días que se bloquean, sábado-6 y domingo-0
     return [(day != 0 && day != 6), ''];
 };

$("#editFechaProf").datepicker({
    beforeShowDay: bloquearFinSemana,
    firstDay: 1,
    closeText: 'Cerrar',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['D','L','M','X','J','V','S'],
    weekHeader: 'Sm',
    dateFormat: 'dd-mm-yy',
    // onSelect: '25-01-2021',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: '',
    showAnim: "fadeIn"
});
