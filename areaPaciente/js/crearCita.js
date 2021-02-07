
/* CREAR CITA */
// Cuando pulsa el botón crear cita entra en la función
var btnCrearCita = document.getElementById("btnCrearCita");
btnCrearCita.addEventListener("click", crearCitaPaciente);
var especialidad = document.getElementById("selectEspecialidad");
var profesional = document.getElementById("selectEspecialista");
var fecha = document.getElementById("fechaCita");
var orden = document.getElementById("horaCita");

// Comprueba que si fecha de la cita es anterior al momento presente
function esFechaFutura(fecha, hora) {
    fecha = fecha.split("-");
    let fechayyyymmdd =    fecha[2]+'-'+ fecha[1] +'-'+  fecha[0];
    let ahora = new Date();
    let fechaHora = new Date(fechayyyymmdd + ' ' + hora);
    return (fechaHora > ahora);
}

function crearCitaPaciente() {
    /* Recoger valores del formulario Crear Cita */
    let idEspecialidad = especialidad.value;
    let idProfesional = profesional.value;
    let fechaCita = fecha.value;
    let horaCita = orden.value;
    let msgError = "";
    let divError = document.getElementById("errorCita");
    let horaSeleccionada = orden.options[orden.selectedIndex].text;

    if (idEspecialidad === '0') {
        msgError += "Debe seleccionar una especialidad.<br>";
    }
    if (idProfesional === '0') {
        msgError += "Debe seleccionar un especialista.<br>";
    }
    if (fechaCita === '') {
        msgError += "Debe seleccionar una fecha.<br>";
    }
    if (horaCita === '0') {
        msgError += "Debe seleccionar una hora.";
    }
    if (!esFechaFutura(fechaCita, horaSeleccionada)){
        msgError += "Debe seleccionar fecha y hora posterior a este momento.";
    }

    if (msgError === '') {
        divError.style.display = 'none';
    } else {
        divError.innerHTML = msgError;
        divError.style.display = 'block';
    }

    if (msgError === '') {

        $.ajax({
            url: "back/crearCita.php",
            type: "post",
            data: {"id_especialidad" : idEspecialidad,
                   "id_profesional" : idProfesional,
                   "fecha_cita" : fechaCita,
                   "hora_cita" : horaCita},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            if (arrayRespuesta.success) {
                // Muestra una alerta de éxito cuando la cita haya sido creada
                $("#citaCreada").show("fast");
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

 //Crear el datepicker
 $("#fechaCita").datepicker({
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
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     yearSuffix: '',
     showAnim: "fadeIn"
 });
