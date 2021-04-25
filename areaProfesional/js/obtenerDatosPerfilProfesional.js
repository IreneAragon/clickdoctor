

function obtenerListadoEspecialidades(idProf) {
    let selectDatos = [];
    $.ajax({
        url: "back/obtenerListadoEspecialidades.php",
        type: "post",
        data: {"idProf" : idProf},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let especialidades = arrayRespuesta.datos;
        especialidades.forEach((especialidad,i) => {
            selectDatos.push( {"id": parseInt(especialidad.id), "text": especialidad.text, selected: especialidad.practica});
        });
        pintarSelector(selectDatos);
    });
}

function pintarSelector(data) {
    $("#selectToEspecialidades").select2({
        placeholder: "Elija una o varias especialidades",
        tags: true,
        tokenSeparators: ['/',',',';'," "],
        data: data
    });
}

function obtenerDatosPerfil(idProf) {

    $.ajax({
        url: "back/obtenerPerfilProfesional.php",
        type: "post",
        data: {"idProf" : idProf},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let datosPerfil = arrayRespuesta.datos;
        // console.log(datosPerfil);
        $('#editarNombreProf').val(datosPerfil.nombre);
        $('#editarApellidosProf').val(datosPerfil.apellidos);
        $('#editarEmailProf').val(datosPerfil.email);
        $('#editarFnacProf').val(datosPerfil.f_nacimiento);
        $('#editNcolegiado').val(datosPerfil.n_colegiado);
        $('#editDniProf').val(datosPerfil.dni);
        $('#img').attr('src', 'perfil/' + datosPerfil.srcImg);
    });
}

$(document).ready(function() {
    let idProf = $("#idProf").val();
    obtenerListadoEspecialidades(idProf);
    obtenerDatosPerfil(idProf);
});
