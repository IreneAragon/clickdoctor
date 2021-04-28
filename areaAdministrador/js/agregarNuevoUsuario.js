console.log('agregarNuevoUsuario.js');

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
    var idEspecialidades =  document.getElementById("nuevoUsuarioEspecialidades").value;
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
    } else {
        
        console.log('gender mal');
    }
    
    // conocer rol
    if (paciente.checked) {
        esPaciente = true;
        rol = "paciente";
    } else if (profesional.checked) {
        esProfesional = true;
        rol = "profesional";
    } else {
        
        console.log('rol mal');
    }

    /* VALIDACIONES */
    // campos obligatorios
    if (!nombre || !apellidos || !email || !dni || !fNacimiento || checkGenero === null || checkRol === null ) {
        msgError += 'Ningún campo del formulario puede estar vacío<br>';
        console.log('campos vacios');
    } 

   if (esProfesional) {
        if (!nombre || !apellidos || !email || !dni || !fNacimiento || checkGenero === null ||  checkRol === null || !nColegiado || !ejerce || idEspecialidades.length < 1) {
            msgError += 'Ningún campo del formulario puede estar vacío<br>';
            console.log('campos vacios prof');
        } 
    }

    // email
    if (email != "") {
        if (!regexEmail.test(email)) {
            msgError += 'Email incorrecto<br>';
            console.log('mail mal');
        }
    }

    
    // dni
    if (dni != "") {
        if (!regexDni.test(dni)) {
            msgError += 'DNI incorrecto<br>';
            console.log('dni mal');
        } 
    }

    // número de colegiado
    if (nColegiado != "") {
        if (!regexNCol.test(nColegiado)) {
            msgError += 'Número de colegiado incorrecto<br>';
            console.log('n col mal');
        } 
    }

    // fecha de nacimiento regexFnacimiento
    if (fNacimiento != "") {
        if (!regexFnacimiento.test(fNacimiento)) {
            msgError += 'Formato de fecha incorrecto<br>';
            console.log('fecha mal');
        } 
    }
    
    // contraseña
    if (password != "") {
        if (!regexPsw.test(password)) {
            msgError += "Formato de contraseña incorrecto, debe contener mayúsuclas, minúsculas y números y tener entre 6 y 16 caracteres.<br>";
            console.log('passssss mal');
        } 
    }

    if (passwordRep != "") {
        if (!regexPsw.test(passwordRep)) {
            msgError += "El formato de la contraseña repetida es incorrecto, debe contener mayúsuclas, minúsculas y números y tener entre 6 y 16 caracteres.<br>";
            console.log('passsssrep mal');
        } 
    }


    // si alguno de los campos de la contraseña está vacío
    if ( (!password && passwordRep) || (password && !passwordRep) ) {
        msgError += 'Debes escribir la contraseña en ambos campos<br>';
        console.log('pass 1 mal');
    } else {
        // comprobar regex 
        if ( (!regexPsw.test(password)) || (!regexPsw.test(passwordRep)) ) {
            msgError += "Formato de contraseña incorrecto, debe contener mayúsuclas, minúsculas y números y tener entre 6 y 16 caracteres.<br>";
            console.log('pass 2 mal');
        } else {
            //comprobar que coinciden
            if (password != passwordRep) {
                msgError += 'Las contraseñas no coinciden<br>';
                console.log('pass 3 mal');
            } 
        }
    }

    // si no hay errores se procede a hacer el ajax que inserta la usuario en la base de datos
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

            msgExito += 'Has agregado un nuevo usuario con éxito'
            if (msgExito === '') {
                divExito.style.display = 'none';
            } else {
                divExito.innerHTML = msgExito;
                divExito.style.display = 'block';
                divError.style.display = 'none';
            }
        });

    } else {
        // pintar errores
        divExito.style.display = 'none';
        divError.style.display = 'block';
        divError.innerHTML = msgError;
    }

  






























// let rol = document.querySelector('input[name="rol"]:checked');
    // console.log('rol',rol);
   
    // if (rol === null) {
    //     console.log('esnull');
    // } else {
    //     console.log('no es nul');
    // }

    // if ( idEspecialidades.length < 1) {
    //     console.log('menos que uno - vacio');
    // } else {
    //     console.log('hay algo selecionado');
    // }


}



