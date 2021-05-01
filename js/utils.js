
/* Recibe fecha en formato YYYY-MM-DD
   Devuelve fecha en formato DD-MM-YYYY */
function formatearFechaDDMMYYY(fecha, separacion = '-') {
    var objFecha = new Date(fecha);
    var dia = objFecha.getDate();
    var mes = objFecha.getMonth() + 1;
    var ano = objFecha.getFullYear();

    if (dia < 10) {
        dia = "0"+dia;
    }
    if (mes < 10) {
        mes = "0"+mes;
    }

    return dia + separacion + mes + separacion + ano;
    
}
