
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

    let divError = document.getElementById("msgErrorPerfilProf");
    let divExito = document.getElementById("msgExitoPerfilProf");
    divExito.style.display = 'none';
    divError.style.display = 'none';
    let msgError = "";
    let msgExito = "";

    let infoRequerida = false;
    let pswEsOk = false;
    let emailOK = false;
    let nColOK = false;
    let regexEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    let regexPsw = /(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).{6,16}/;
    let regexNCol = /^(\d{9})$/;

    /* VALIDACIONES */
    /* CAMPOS REQUERIDOS */
    if (!nombre || !apellidos || !email || !f_nacimiento || !n_colegiado || idEspecialidades.length < 1) {
        msgError += 'Ningún campo del formulario puede estar vacío<br>';
        infoRequerida = false;
    } else {
        infoRequerida = true;
    }

    /* EMAIL */
    if (email != "") {
        if (!regexEmail.test(email)) {
            msgError += 'Email incorrecto<br>';
            emailOK = false;
        } else {
            emailOK = true;
        }
    }

    /* Nº COLEGIADO */
    if (n_colegiado != "") {
        if (!regexNCol.test(n_colegiado)) {
            msgError += 'Número de colegiado incorrecto<br>';
            nColOK = false;
        } else {
            nColOK = true;
        }
    }

    /* CONTRASEÑA */
    if (password === "" && passwordRep === "") {
        pswEsOk = true;
    } else {
        // si alguno de los campos de la contraseña está vacío
        if ( (!password && passwordRep) || (password && !passwordRep) ) {
            msgError += 'Debes escribir la contraseña en ambos campos<br>';
            pswEsOk = false;
        } else {
            // Comprobar regex de la contraseña y que coincidan
            if ( (!regexPsw.test(password)) || (!regexPsw.test(passwordRep)) ) {
                msgError += "Formato de contraseña incorrecto, debe contener mayúsuclas, minúsculas y números y tener entre 6 y 16 caracteres.<br>";
                pswEsOk = false;
            } else {
                if (password != passwordRep) {
                    msgError += 'Las contraseñas no coinciden<br>';
                    pswEsOk = false;
                } else {
                    // Si el regex está bien y las contraseñas coinciden
                    pswEsOk = true;
                }
            }
        }
    }

    if (msgError === '') {
        divError.style.display = 'none';
    } else {
        divError.innerHTML = msgError;
        divError.style.display = 'block';
    }

    // Si no hay ningún error, se procede a realizar las modificaciones
    if (infoRequerida && pswEsOk && emailOK && nColOK) {
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

            msgExito += 'Has modificado tu perfil con éxito'
            if (msgExito === '') {
                divExito.style.display = 'none';
            } else {
                divExito.innerHTML = msgExito;
                divExito.style.display = 'block';
            }
        });
    }
}
