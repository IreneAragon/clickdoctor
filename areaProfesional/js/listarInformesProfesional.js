console.log('entra listarInformesProfesional');

var inputDniPaciente = document.getElementById('infDni');
let dni_paciente = inputDniPaciente.value;
console.log('DNI PACIENTE : ');
console.log(dni_paciente);
console.log(inputDniPaciente.value);
/*
TODO:
    - Pintar la tabla con
        - Fecha del informe
        - Nombre del paciente
        - Botón con ID de informe que abre el informe en el navegador

    - Datos que necesito
        - ID del paciente, que es la carpeta del archivo
        - ID del informe
        - ID del profesional
 */

/* Lista los informes creados por el profesional */
function listarInformes() {

    // let dni_paciente = inputDniPaciente.value;
    // console.log('DNI PACIENTE : ');
    // console.log(dni_paciente);

    $.ajax({
        url: "back/listarInformesProfesional.php",
        type: "post",
        data: {"dni_paciente": 'dni_paciente'},
    }).done(function(respuesta) {










    });












}
