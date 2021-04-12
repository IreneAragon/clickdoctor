
/*

TODO:
fijarme en listarcitaspaciente para listar las tr de las conversaciones

 */


window.onload = listarConversaciones();

function listarConversaciones(){

    $.ajax({
        url: "mensajeria/back/listarConversacionesPaciente.php",
        type: "post",
        // data: {"filtro": 'proximas'},
    }).done(function(respuesta) {
        let arrayRespuesta = $.parseJSON(respuesta);
        let htmlTr = "";
        let genero = "";

        arrayRespuesta.conversaciones.forEach((conversacion, i) => {

            let timestamp = conversacion.creado_el;
            let fecha = new Date(timestamp);
            let dia = fecha.getDate();
            let mes = fecha.getMonth();
            let year = fecha.getFullYear();
            if (dia > 0 && dia < 10) {
                dia = '0'+dia;
            }
            if (mes > 0 && mes < 10) {
                mes = '0'+mes;
            }
            let fechaDDMMYYY = dia +'-'+ mes +'-'+ year;

            htmlTr += "<tr>"+
                        "<td>"+ fechaDDMMYYY +"</td>"+
                        "<td>"+ conversacion.id_prof_FK +"</td>"+
                        "<td>"+ conversacion.asunto +"</td>"+
                        "<td> <button type='button' data-idConversacion='"+conversacion.id_correo+"' class='btn btn-info btn-sm btnStyle'>Ver <i class='fa fa-eye iconoOjo'></i></button> </td>"+
                      "</tr>";
        });

        $('#listaConversacionesPaciente').html(htmlTr);

    });
}



/*

<tr>
    <td>2021/15/03</td>
    <td>Dr. Nacho MArtín</td>
    <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver <i class="fa fa-eye iconoOjo"></i></button> </td>
</tr>
<tr>
    <td>2021/15/03</td>
    <td>Dr. Nacho MArtín</td>
    <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver <i class="fa fa-eye iconoOjo"></i></button> </td>
</tr>
<tr>
    <td>2021/15/03</td>
    <td>Dr. Nacho MArtín</td>
    <td> <button type="button" class="btn btn-info btn-sm btnStyle">Ver <i class="fa fa-eye iconoOjo"></i></button> </td>
</tr>

 */
