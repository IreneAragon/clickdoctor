
var idUsuario = $('#idUsuario').val();
var rolUsuario = $('#rolUsuario').val();
window.onload = obtenerDatosUsuario(idUsuario, rolUsuario);
window.onload = obtenerListadoEspecialidades(idUsuario);


function obtenerListadoEspecialidades(idUsuario) {
    let selectDatos = [];
    $.ajax({
        url: "back/obtenerListadoEspecialidades.php",
        type: "post",
        data: {"idUsuario" : idUsuario},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let especialidades = arrayRespuesta.datos;

        if (rolUsuario === 'profesional') {
            especialidades.forEach((especialidad,i) => {
                selectDatos.push( {"id": parseInt(especialidad.id), "text": especialidad.text, selected: especialidad.practica});
            });
            pintarSelector(selectDatos);
        } else {
            $('#formEsp').hide();
        }

    });
}

function pintarSelector(data) {
    $("#selectToEspecialidadesAdmin").select2({
        placeholder: "Elija una o varias especialidades",
        tags: true,
        tokenSeparators: ['/',',',';'," "],
        data: data
    });
}

function obtenerDatosUsuario(idUsuario, rolUsuario) {

    $.ajax({
        url: "back/obtenerPerfilUsuario.php",
        type: "post",
        data: {"idUsuario" : idUsuario,
               "rolUsuario" : rolUsuario},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let datosPerfil = arrayRespuesta.datosUsuario;
        $('#editarNombreAdmin').val(datosPerfil.nombre);
        $('#editarApellidosAdmin').val(datosPerfil.apellidos);
        $('#editarEmailAdmin').val(datosPerfil.email);
        $('#editarFnacAdmin').val(datosPerfil.f_nacimiento);
        if (!datosPerfil.n_colegiado) {
            $('#formNCol').hide();
        } else {
            $('#editNcolegiadoAdmin').val(datosPerfil.n_colegiado);
        }
    });
}
