
window.onload = listarEspecialidades();

var divMsgBorradoOk = document.getElementById("msgBorradoEsp");
divMsgBorradoOk.style.display = 'none';
var divExito = document.getElementById("especialidadModificada");
divExito.style.display = 'none';
var btnBorrarEspecialidad = document.getElementById('btnConfirmaBorrarEsp');
btnBorrarEspecialidad.addEventListener("click", borrarEspecialidad);
var btnEditarEspecialidad = document.getElementById("btnGuardarEditEsp");
btnEditarEspecialidad.addEventListener("click", modificarEspecialidad);
var btnAgregarEspecialidad = document.getElementById("btnGuardarNuevaEsp");
btnAgregarEspecialidad.addEventListener("click", agregarEspecialidad);
var btnCerrarNuevaEsp = document.getElementById("btnCerrarNuevaEsp");
btnCerrarNuevaEsp.addEventListener("click", cerrarModalNuevaEsp);

function listarEspecialidades() {
    $.ajax({
        url: "back/listarEspecialidades.php",
        type: "post"
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
    
        arrayRespuesta.especialidades.forEach((especialidad, i) => {
            htmlTr += "<tr>"+
                        "<td id='tdNombreEsp("+especialidad.id_especialidad+")'>"+ especialidad.nombre +"</td>"+
                        "<td><button type='button' onclick='modalEditarEspecialidad("+especialidad.id_especialidad+")' id='btnEditarEspecialidad("+especialidad.id_especialidad+")' class='btn btn-warning btn-sm mt-0 px-3' data-toggle='modal' data-target='#editarEspecialidad'><i class='fas fa-pen' aria-hidden='true'></i></button></td>"+
                        "<td><button type='button' onclick='modalBorrarEspecialidad("+especialidad.id_especialidad+")' class='btn btn-danger btn-sm mt-0 px-3' data-toggle='modal' data-target='#eliminarEspecialidad'><i class='fas fa-trash' aria-hidden='true'></i></button></td>"+
                    "</tr>";
        });
        $('#listaEspecialidades').html(htmlTr);
    });
}

/* BORRAR */
/* Asignar al botón de borrado el ID de la especialidad a eliminar */
function modalBorrarEspecialidad(idEsp) {
    btnBorrarEspecialidad.setAttribute('data-idEsp',idEsp);
}
function borrarEspecialidad() {
    let idEsp = btnBorrarEspecialidad.getAttribute('data-idEsp');
    $.ajax({
        url: "back/borrarEspecialidad.php",
        type: "post",
        data: {"idEsp": idEsp},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        if (arrayRespuesta.borradoOk) {
            $('#msgBorradoEsp').show();
            $('#eliminarEspecialidad').modal('hide');
            listarEspecialidades();
            $("#msgBorradoEsp").delay(4000).slideUp(200, function() {
                $('#msgBorradoEsp').hide();
            });
        }
    });
}

function modalEditarEspecialidad(idEsp) {
    if ($("#errorEditEsp").show()) {
        $("#errorEditEsp").hide()
    }
    if ($("#especialidadModificada").show()) {
        $("#especialidadModificada").hide()
    }
    let nombreEspAeditar = document.getElementById('tdNombreEsp('+idEsp+')');
    let nombreEspText = nombreEspAeditar.innerHTML;
    $('#editNombreEsp').val(nombreEspText);
    btnEditarEspecialidad.setAttribute('data-idEsp',idEsp);
}

function modificarEspecialidad() {
    let valorNombreEspEditada = document.getElementById('editNombreEsp').value;
    let idEsp = btnEditarEspecialidad.getAttribute('data-idEsp');
    let divError = document.getElementById("errorEditEsp");
    let msgError =""

    if (valorNombreEspEditada === "") {
        divExito.style.display = 'none';
        msgError += 'Error: el campo no puede estar vacío';
        divError.style.display = 'block';
        divError.innerHTML = msgError;
    } else {
        $.ajax({
            url: "back/editarEspecialidad.php",
            type: "post",
            data: {"idEsp" : idEsp,
                   "valorNombreEspEditada" : valorNombreEspEditada},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            if (arrayRespuesta.success) {
                divExito.style.display = 'block';
                divError.style.display = 'none'; 
            }
            listarEspecialidades();
        });
    }
}

function agregarEspecialidad() {
    let nuevaEspecialidad = document.getElementById('nuevaEspecialidad').value;
    let divError = document.getElementById("errorAddEsp");
    let divExito = document.getElementById("especialidadAgregada");
    divExito.style.display = 'none';
    divError.style.display = 'none';
    let msgError = "";
  
    if (nuevaEspecialidad === "") {
        divExito.style.display = 'none';
        msgError += 'Error: el campo no puede estar vacío';
        divError.style.display = 'block';
        divError.innerHTML = msgError;
    } else {
        divError.style.display = 'block';
        $.ajax({
            url: "back/agregarEspecialidad.php",
            type: "post",
            data: {"nuevaEspecialidad" : nuevaEspecialidad},
        }).done(function(respuesta) {
            let arrayRespuesta = $.parseJSON(respuesta);
            
            if (arrayRespuesta.success) {
                divExito.style.display = 'block';
                divError.style.display = 'none';
            }
            listarEspecialidades();
        });
    }
}

function cerrarModalNuevaEsp() {
    let divErrorNuevaEsp = document.getElementById("errorAddEsp");
    let divExitoNuevaEsp = document.getElementById("especialidadAgregada");
    divExitoNuevaEsp.style.display = 'none';
    divErrorNuevaEsp.style.display = 'none';
}
