
var selectorEspecialista = document.getElementById("selectEspecialista");
var selectorFecha = document.getElementById("fechaCita");

// a la función traerDisponibilidad() se entra desde crearCita.js, donde se configura el datepicker con onSelect


function traerDisponibilidad() {

    let idEspecialista = selectorEspecialista.value;
    let fecha = selectorFecha.value;
    fecha = fecha.split("-");
    let fechayyyymmdd =    fecha[2]+'-'+ fecha[1] +'-'+  fecha[0];

    $.ajax({
        url: "back/obtenerDisponibilidad.php",
        type: "post",
        data: {"id_especialista" : idEspecialista, "fecha" : fechayyyymmdd},
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

        $('#horaCita').html(htmlOptions);
    });
}
