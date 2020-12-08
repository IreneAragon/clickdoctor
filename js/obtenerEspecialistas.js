
var selectorEspecialidades = document.getElementById("selectEspecialidad");
selectorEspecialidades.addEventListener("change", traerEspecialistas);


function traerEspecialistas() {
    let idEspecialidad = selectorEspecialidades.value;

    $.ajax({
        url: "back/obtenerEspecialistas.php",
        type: "post",
        data: {"id_especialidad" : idEspecialidad},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlOptions = "";
        if (arrayRespuesta.isEmpty) {
            htmlOptions = '<option value="0">No existe especialista</option>';
        }
        for (let i=0; i<arrayRespuesta.datos.length; i++) {
            let profesional = arrayRespuesta.datos[i];
            htmlOptions += '<option value="'+profesional['id_prof']+'">'+profesional['nombre']+' '+profesional['apellidos']+'</option>';
        }
        $('#selectEspecialista').html(htmlOptions);
    });
}
