
var btnAgregaUsuario = document.getElementById('nuevoUsuarioSubmit');
btnAgregaUsuario.addEventListener("click", agregarUsuario);

function agregarUsuario() {
    // datos
    var nombre =  document.getElementById("nuevoUsuarioNombre").value;
    var apellidos =  document.getElementById("nuevoUsuarioApellidos").value;
    var email =  document.getElementById("nuevoUsuarioEmail").value;
    var password =  document.getElementById("nuevoUsuarioPassword").value;
    var passwordRep =  document.getElementById("nuevoUsuarioPasswordRep").value;
    var dni =  document.getElementById("nuevoUsuarioDni").value;
    var fNacimiento =  document.getElementById("nuevoUsuarioNacimiento").value;
    var mujer = document.getElementById('nuevoUsuarioMujer');
    var hombre = document.getElementById('nuevoUsuarioHombre');
    var otro = document.getElementById('nuevoUsuarioOtro');
    let checkGenero = document.querySelector('input[name="gender"]:checked');
    var paciente =  document.getElementById("rolNuevoUsuarioPaciente");
    var profesional =  document.getElementById("rolNuevoUsuarioProfesional");
    let checkRol = document.querySelector('input[name="rol"]:checked');
    var nColegiado =  document.getElementById("nuevoUsuarioNcolegiado").value;
    var ejerce =  document.getElementById("nuevoUsuarioEjerce").value;
    var idEspecialidades = $('#nuevoUsuarioEspecialidades').val();
    var divError = document.getElementById('msgErrorNuevoUsuario');
    var divExito = document.getElementById('msgExitoNuevoUsuario');

    // flags
    let esMujer = false;
    let esHombre = false;
    let esOtro = false;
    let esPaciente = false;
    let esProfesional = false;
    let msgError = "";
    let msgExito = "";
    let genero = "";
    let rol = "";

    // regex
    let regexDni = /^[0-9]{8,8}[A-Za-z]$/;
    let regexEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    let regexPsw = /(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).{6,16}/;
    let regexNCol = /^(\d{9})$/;
    let regexFnacimiento = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

    // conocer género
    if (mujer.checked) {
        esMujer = true;
        genero = "mujer";
    } else if (hombre.checked) {
        esHombre = true;
        genero = "hombre"
    } else if (otro.checked) {
        esOtro = true;
        genero = "no_binario";
    }

    // conocer rol
    if (paciente.checked) {
        esPaciente = true;
        rol = "paciente";
    } else if (profesional.checked) {
        esProfesional = true;
        rol = "profesional";
    }

    /* VALIDACIONES */
    // campos obligatorios
    if (!nombre || !apellidos || !email || !dni || !fNacimiento || checkGenero === null || checkRol === null ) {
        msgError += 'Ningún campo del formulario puede estar vacío<br>';
    }

   if (esProfesional) {
        if (!nombre || !apellidos || !email || !dni || !fNacimiento || checkGenero === null ||  checkRol === null || !nColegiado || !ejerce || idEspecialidades.length < 1) {
            msgError += 'Ningún campo del formulario puede estar vacío<br>';
        }
    }

    // email
    if (email != "") {
        if (!regexEmail.test(email)) {
            msgError += 'Email incorrecto<br>';
        }
    }


    // dni
    if (dni != "") {
        if (!regexDni.test(dni)) {
            msgError += 'DNI incorrecto<br>';
        }
    }

    // número de colegiado
    if (nColegiado != "") {
        if (!regexNCol.test(nColegiado)) {
            msgError += 'Número de colegiado incorrecto<br>';
        }
    }

    // fecha de nacimiento regexFnacimiento
    if (fNacimiento != "") {
        if (!regexFnacimiento.test(fNacimiento)) {
            msgError += 'Formato de fecha incorrecto<br>';
        }
    }

    // contraseña
    if (password != "") {
        if (!regexPsw.test(password)) {
            msgError += "Formato de contraseña incorrecto, debe contener mayúsuclas, minúsculas y números y tener entre 6 y 16 caracteres.<br>";
        }
    }

    if (passwordRep != "") {
        if (!regexPsw.test(passwordRep)) {
            msgError += "El formato de la contraseña repetida es incorrecto, debe contener mayúsuclas, minúsculas y números y tener entre 6 y 16 caracteres.<br>";
        }
    }

    // si alguno de los campos de la contraseña está vacío
    if ( (!password && passwordRep) || (password && !passwordRep) ) {
        msgError += 'Debes escribir la contraseña en ambos campos<br>';
    } else {
        // comprobar regex
        if ( (!regexPsw.test(password)) || (!regexPsw.test(passwordRep)) ) {
            msgError += "Formato de contraseña incorrecto, debe contener mayúsuclas, minúsculas y números y tener entre 6 y 16 caracteres.<br>";
        } else {
            //comprobar que coinciden
            if (password != passwordRep) {
                msgError += 'Las contraseñas no coinciden<br>';
            }
        }
    }

    if (msgError ==="") {
        divError.style.display = 'none';
        $.ajax({
            url: "back/nuevoUsuarioInsertAdmin.php",
            type: "post",
            data: {"nombre" : nombre,
                   "apellidos" : apellidos,
                   "email" : email,
                   "fNacimiento" : fNacimiento,
                   "nColegiado" : nColegiado,
                   "dni" : dni,
                   "rol" : rol,
                   "genero" : genero,
                   "idEspecialidades" : idEspecialidades,
                   "ejerce" : ejerce,
                   "password" : password,
                   "passwordRep" : passwordRep},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            if (arrayRespuesta.respuesta) {
                msgExito += 'Has agregado un nuevo usuario con éxito';
                divExito.innerHTML = msgExito;
                divExito.style.display = 'block';
                divError.style.display = 'none';
                $("#formNuevoUsuario").trigger("reset");
                $('#nuevoUsuarioEspecialidades').val(null).trigger('change');
            } else {
                msgError += 'Ocurrió un error inesperado';
                // pintar errores
                divExito.style.display = 'none';
                divError.style.display = 'block';
                divError.innerHTML = msgError;
            }
            if (msgExito === '') {
                divExito.style.display = 'none';
            }
        });
    } else {
        // pintar errores
        divExito.style.display = 'none';
        divError.style.display = 'block';
        divError.innerHTML = msgError;
    }

}
