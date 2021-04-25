var btnGuardarPerfilProf = document.getElementById('btnGuardarPerfilProf');
btnGuardarPerfilProf.addEventListener("click", modificarPerfil);





function modificarPerfil() {

    let idProf = $('#idProf').val();
    let nombre = $('#editarNombreProf').val();
    let apellidos = $('#editarApellidosProf').val();
    let email = $('#editarEmailProf').val();
    let f_nacimiento = $('#editarFnacProf').val();
    let n_colegiado = $('#editNcolegiado').val();
    let dni = $('#editDniProf').val();
    let idEspecialidades = $('#selectToEspecialidades').val();
    let password = $('#editarPasswordProf').val();
    let passwordRep = $('#editarPasswordRepProf').val();
    console.log(idEspecialidades);
    $.ajax({
        url: "back/modificarPerfilProfesional.php",
        type: "post",
        data: {"idProf" : idProf,
               "nombre" : nombre,
               "apellidos" : apellidos,
               "email" : email,
               "f_nacimiento" : f_nacimiento,
               "n_colegiado" : n_colegiado,
               "dni" : dni,
               "idEspecialidades" : idEspecialidades,
               "password" : password,
               "passwordRep" : passwordRep},
    }).done(function(respuesta) {
        // let arrayRespuesta = $.parseJSON(respuesta);
        // let especialidades = arrayRespuesta.datos;
        // especialidades.forEach((especialidad,i) => {
        //     selectDatos.push( {"id": parseInt(especialidad.id), "text": especialidad.text, selected: especialidad.practica});
        // });
        // pintarSelector(selectDatos);
    });


}
