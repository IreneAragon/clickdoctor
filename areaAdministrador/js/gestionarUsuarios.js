window.onload = conocerRolUsuario();

var btnBorrarUsuario = document.getElementById('btnConfirmaBorrarUsuario');
btnBorrarUsuario.addEventListener("click", borrarUsuario);

function conocerRolUsuario() {
    var listarPacientes = true; 
    var listarProfesionales = false;
    var rol = 'paciente';

    // Si 'posicionSwitch' es true, se listan los profesionales, si es false listan los pacientes
    $('[type="checkbox"]').click(function(e) {
        var posicionSwitch = $(this).is(":checked");
        if (posicionSwitch) {
            listarPacientes = false; 
            listarProfesionales = true;
            rol = 'profesional';
            listarUsuarios(rol);
        } else {
            listarPacientes = true; 
            listarProfesionales = false;
            rol = 'paciente';
            listarUsuarios(rol);
        }
    });
    listarUsuarios(rol);
}

function listarUsuarios(rol) {

    $.ajax({
        url: "back/listarUsuarios.php",
        type: "post",
        data: {"rol" : rol},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        console.log(arrayRespuesta);
        let htmlTr = "";
        arrayRespuesta.usuarios.forEach((usuario, i) => {
            htmlTr += "<tr>"+
                        "<td id='tdIdUsuario("+usuario.id_usuario+")' data-rol="+rol+" data-id="+usuario.id_usuario+">"+ usuario.nombre +" "+ usuario.apellidos + "</td>"+
                        "<td><a href='editarUsuario.php?rol="+rol+"&id="+usuario.id_usuario+"' id='btnEditarUsuario("+usuario.id_usuario+")' class='btn btn-warning btn-sm mt-0 px-3'><i class='fas fa-pen' aria-hidden='true'></i></a></td>"+
                        "<td><button type='button' onclick='modalBorrarUsuario("+usuario.id_usuario+")' id='btnModalBorrarUsuario'  data-rol="+rol+" class='btn btn-danger btn-sm mt-0 px-3' data-toggle='modal' data-target='#eliminarUsuario'><i class='fas fa-trash' aria-hidden='true'></i></button></td>"+
                    "</tr>";
        });
        $('#listaUsuarios').html(htmlTr);
    });
}


/* BORRAR */
/* Asignar al botón de borrado el ID del paciente a eliminar */
function modalBorrarUsuario(id_usuario) {
    btnBorrarUsuario.setAttribute('data-id_usuario',id_usuario);
}

function borrarUsuario() {
    var btnModalBorrarUsuario = document.getElementById('btnModalBorrarUsuario');
    var rol = btnModalBorrarUsuario.getAttribute('data-rol');
    var id_usuario = btnBorrarUsuario.getAttribute('data-id_usuario');

    $.ajax({
        url: "back/borrarUsuario.php",
        type: "post",
        data: {"id_usuario": id_usuario,
               "rol" : rol },
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        if (arrayRespuesta.borradoOk) {
            $('#msgBorradoUsuario').show();
            $('#eliminarUsuario').modal('hide');
            listarUsuarios(rol);
            $("#msgBorradoUsuario").delay(4000).slideUp(200, function() {
                $('#msgBorradoUsuario').hide();
            });
        }
    });
}

