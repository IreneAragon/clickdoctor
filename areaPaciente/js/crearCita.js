
/* CREAR CITA */
// Cuando pulsa el botón crear cita entra en la función
var btnCrearCita = document.getElementById("btnCrearCita");
btnCrearCita.addEventListener("click", crearCitaPaciente);

var especialidad = document.getElementById("selectEspecialidad");
var profesional = document.getElementById("selectEspecialista");
var fecha = document.getElementById("fechaCita");
var orden = document.getElementById("horaCita");

function esFechaFutura(fecha, hora) {
    let ahora = new Date();
    let fechaHora = new Date(fecha + ' ' + hora);

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
        /* AJAX */
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
                $("#citaCreada").show("fast"); //muestro mediante id
            }
        });
    }

 }

































/*TODO: utilizar $("#citaCreada").show("fast"); en este script y eliminar pacientes.js */

// Muestra una alerta de éxito cuando la cita haya sito creada
    // $(document).ready(function(){
    //     $("#btnCrearCita").on( "click", function() {
    //         $("#citaCreada").show("fast"); //muestro mediante id
    //      });
    // });
