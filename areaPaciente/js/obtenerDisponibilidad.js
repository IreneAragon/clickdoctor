// window.onload = traerDisponibilidad();


/*
TODO
    Querida Irene del futuro, ahí te dejo un marroncito:
        Lo que pasa es que con el nuevo input del datepicker, no me obtiene la disponibilidad del especialista,
        si pones el otro input original (input type date) y comentas las dos funciones asociadas al datepicker
        todo funciona correctamente. El error debe estar en la forma en la que obtiene la fecha, en el formato,
        lo que pasa que no sé porque no me lo muestra el console.log.

        Más pistas: resulta que tengo puesto que dos onchange, cuando selectEspecialista y cuando selectorFecha,
        entonces entra primero en selectEspecialista, obviousli, y en ese momento la fecha aún no tiene valor, además
        cuando hago onchange en el selectorFecha no entra en la función traerDisponibilidad() por lo que no puedo
        obtener el valor de fecha para pasarselo a la función y que me traiga la disponibilidad.

        Una mierda vaya, ¡suerte! confío en ti guapa!!!

 */


console.log('entra obtenerDisponibilidad');

// var selectorEspecialista = document.getElementById("selectEspecialista");
// selectorEspecialista.addEventListener("change", traerDisponibilidad);

var selectorFecha = document.getElementById("fechaCita");
selectorFecha.addEventListener("change", traerDisponibilidad);

console.log('selectorFecha',selectorFecha);

let test = $("#fechaCita").datepicker('getDate');
console.log('test',test);

function traerDisponibilidad() {
    // let test = $("#fechaCita").datepicker('getDate');
    // console.log('test',test);
console.log('entra traerDisponibilidad');
    let idEspecialista = selectorEspecialista.value;
    let fecha = selectorFecha.value;

    fecha = fecha.split("-");
    let fechayyyymmdd =    fecha[2]+'-'+ fecha[1] +'-'+  fecha[0];


    console.log('fecha',fecha);
    console.log('fechaformt',fechayyyymmdd);
    console.log('idEspecialista',idEspecialista);

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
