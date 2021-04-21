
var especialista = document.getElementById('idProf');
var selectorFecha = document.getElementById('fechaCitaProf');
var selectorEspecialidad = document.getElementById('selectCitaEspecialidad');

// a la función traerDisponibilidad() se entra desde crearCitaProfesionales.js, donde se configura el datepicker con onSelect

function traerDisponibilidad() {

    let idEspecialista = especialista.value;
    let fecha = selectorFecha.value;
    fecha = fecha.split("-");
    let fechayyyymmdd =    fecha[2]+'-'+ fecha[1] +'-'+  fecha[0];

    $.ajax({
        url: "back/obtenerDisponibilidad.php",
        type: "post",
        data: {"idEspecialista" : idEspecialista,
               "fechayyyymmdd" : fechayyyymmdd},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        console.log(arrayRespuesta);
        let htmlOptions = '<option value="0">Selecciona la hora</option>';
        if (arrayRespuesta.isEmpty) {
            htmlOptions = '<option value="0">No hay citas para este día</option>';
        }

        for (var key in arrayRespuesta.datos){
            var attrName = key;
            var attrValue = arrayRespuesta.datos[key];
            htmlOptions += '<option value="'+key+'">'+arrayRespuesta.datos[key]+'</option>';
        }

        $('#horaCitaProf').html(htmlOptions);
    });
}
