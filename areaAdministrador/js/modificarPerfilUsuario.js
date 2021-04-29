var idUsuario = $('#idUsuario').val();
var rolUsuario = $('#rolUsuario').val();

var btnGuardarPerfilAdmin = document.getElementById('btnGuardarPerfilAdmin');
btnGuardarPerfilAdmin.addEventListener("click", modificarPerfil);

function modificarPerfil() {

    let nombre = $('#editarNombreAdmin').val();
    let apellidos = $('#editarApellidosAdmin').val();
    let email = $('#editarEmailAdmin').val();
    let fNacimiento = $('#editarFnacAdmin').val();
    
    let n_colegiado = $('#editNcolegiadoAdmin').val();
    let idEspecialidades = $('#selectToEspecialidadesAdmin').val();

    let divError = document.getElementById("msgErrorPerfilAdmin");
    let divExito = document.getElementById("msgExitoPerfilAdmin");
    divExito.style.display = 'none';
    divError.style.display = 'none';
    let msgError = "";
    let msgExito = "";

    let regexEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    let regexFnacimiento = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
    let regexNCol = /^(\d{9})$/;

    if (rolUsuario === "paciente") {
        if (!nombre || !apellidos || !email || !fNacimiento) {
            msgError += 'Ningún campo del formulario puede estar vacío<br>';
        }
    
    } else if (rolUsuario === "profesional") {
        if (!nombre || !apellidos || !email || !fNacimiento || !n_colegiado || idEspecialidades.length < 1) {
            msgError += 'Ningún campo del formulario puede estar vacío<br>';
        } 
    }

    if (email != "") {
        if (!regexEmail.test(email)) {
            msgError += 'Email incorrecto<br>';
        } 
    }

    if (fNacimiento != "") {
        if (!regexFnacimiento.test(fNacimiento)) {
            msgError += 'Formato de fecha incorrecto<br>';
        } 
    } else {
        msgError += 'Formato de fecha incorrectox<br>';
    }

    if (rolUsuario === "profesional") {
        if (n_colegiado != "") {
            if (!regexNCol.test(n_colegiado)) {
                msgError += 'Número de colegiado incorrecto<br>';
            } 
        }
    }

    if (msgError === "") {
    
        divError.style.display = 'none';
        $.ajax({
            url: "back/usuarioModificadoAdmin.php",
            type: "post",
            data: {"idUsuario" : idUsuario,
                   "rolUsuario" : rolUsuario,
                   "nombre" : nombre,
                   "apellidos" : apellidos,
                   "email" : email,
                   "fNacimiento" : fNacimiento,
                   "n_colegiado" : n_colegiado,
                   "idEspecialidades" : idEspecialidades},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            msgExito += 'Has modificado la información del usuario con éxito'
            if (msgExito === '') {
                divExito.style.display = 'none';
            } else {
                divExito.innerHTML = msgExito;
                divExito.style.display = 'block';
                divError.style.display = 'none';
            }
        });

    } else {
        divExito.style.display = 'none';
        divError.style.display = 'block';
        divError.innerHTML = msgError;
    } 

}