var btnCrearCita = document.getElementById("btnCrearCitaProf");
btnCrearCita.addEventListener("click", crearCitaPaciente);

var paciente = document.getElementById("selectCitaNombrePaciente");
var profesional = document.getElementById("idProf");
var especialidad = document.getElementById("selectCitaEspecialidad");
var fecha = document.getElementById("fechaCitaProf");
var orden = document.getElementById("horaCitaProf");

var divError = document.getElementById("errorCitaProf");
divError.style.display = 'none';
var divExito = document.getElementById("citaCreadaProf");
divExito.style.display = 'none';

// Comprueba si fecha de la cita es anterior al momento presente
function esFechaFutura(fecha, hora) {
    fecha = fecha.split("-");
    let fechayyyymmdd =    fecha[2]+'-'+ fecha[1] +'-'+  fecha[0];
    let ahora = new Date();
    let fechaHora = new Date(fechayyyymmdd + ' ' + hora);
    return (fechaHora > ahora);
}

function crearCitaPaciente() {

    let idPaciente = paciente.value;
    let idProfesional = profesional.value;
    let idEspecialidad = especialidad.value;
    let fechaCita = fecha.value;
    let horaCita = orden.value;

    let msgError = "";
    let horaSeleccionada = orden.options[orden.selectedIndex].text;

    if (idPaciente === '0') {
        msgError += "Debes seleccionar un paciente.<br>";
    }
    if (idEspecialidad === '0') {
        msgError += "Debes seleccionar una especialidad.<br>";
    }
    if (fechaCita === '') {
        msgError += "Debes seleccionar una fecha.<br>";
    }
    if (horaCita === '0') {
        msgError += "Debe seleccionar una hora.<br>";
    }
    if (!esFechaFutura(fechaCita, horaSeleccionada)){
        msgError += "Debes seleccionar fecha y hora posterior a este momento.";
    }

    if (msgError === '') {
        divError.style.display = 'none';
    } else {
        divError.innerHTML = msgError;
        divError.style.display = 'block';
    }

    if (msgError === '') {

        $.ajax({
            url: "back/crearCitaProfesionales.php",
            type: "post",
            data: {"idPaciente" : idPaciente,
                   "idProfesional" : idProfesional,
                   "idEspecialidad" : idEspecialidad,
                   "fechaCita" : fechaCita,
                   "horaCita" : horaCita},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            if (arrayRespuesta.success) {
                // Muestra una alerta de éxito cuando la cita haya sido creada
                $("#citaCreadaProf").show("fast");
            }
        });
    }

}

//Función que bloquea sábados y domingos
 function bloquearFinSemanaP(date){
     var day = date.getDay();
     // Días que se bloquean, sábado-6 y domingo-0
     return [(day != 0 && day != 6), ''];
 };

 //Crear el datepicker
 $("#fechaCitaProf").datepicker({
     beforeShowDay: bloquearFinSemanaP,
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
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     yearSuffix: '',
     showAnim: "fadeIn",
     onSelect: function() {
         traerDisponibilidad();
     }
 });
