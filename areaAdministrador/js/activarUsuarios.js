
window.onload = listarUsuariosNoActivados();

$('#msgExito').hide();

function listarUsuariosNoActivados() {

    $.ajax({
        url: "back/listarUsuariosNoActivados.php",
        type: "post",
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);

        if (arrayRespuesta.usuarios.length < 1) {
            $('#msgActiveUsu').hide();
            $('#tablaUsuariosNoActivos').hide();
            $('#msgNoActiveUsu').show();
        } else {
            $('#msgActiveUsu').show();
            $('#msgNoActiveUsu').hide();
        }

        let htmlTr = "";

        arrayRespuesta.usuarios.forEach((usuario, i) => {

            let rolUsuario = 0;
            (usuario.rol === "profesional") ? rolUsuario = 1  : rolUsuario = 2 ;

            htmlTr += "<tr>"+
                        "<td id='tdIdUsuarioNoActivado("+usuario.id_usuario+")' data-rol="+usuario.rol+" data-id="+usuario.id_usuario+">"+ usuario.nombre +" "+ usuario.apellidos + "</td>"+
                        "<td>"+ usuario.dni +"</td>"+
                        "<td>"+ usuario.rol +"</td>"+
                        "<td><button type='button' id='btnActivarUsuario("+usuario.id_usuario+","+usuario.rol+")' onclick='activarUsuario("+usuario.id_usuario+","+rolUsuario+")' class='btn btn-success btn-sm mt-0 px-3'><i class='fas fa-check-circle fa-lg'></i></button></td>"+
                      "</tr>";
        });
        $('#listaUsuariosNoActivados').html(htmlTr);
    });
}

function activarUsuario(id, rolUsuario) {
    let rol = "";
    (rolUsuario === 1) ? rol = "profesional" : rol = "paciente";
    $.ajax({
        url: "back/activarUsuario.php",
        type: "post",
        data: {"id": id,
               "rol" : rol},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        if (arrayRespuesta.activado) {
            $('#msgExito').show();
            listarUsuariosNoActivados();
            $("#msgExito").delay(3000).slideUp(200, function() {
                $('#msgExito').hide();
            });
        }
    });
}
