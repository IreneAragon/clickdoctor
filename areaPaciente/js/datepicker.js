//Función que bloquea sábados y domingos
 function bloquearFinSemana(date){
     var day = date.getDay();
     // Días que se bloquean, sábado-6 y domingo-0
     return [(day != 0 && day != 6), ''];
 };

 //Crear el datepicker
 $("#editFecha").datepicker({
     beforeShowDay: bloquearFinSemana,
     firstDay: 1,
     closeText: 'Cerrar',
     currentText: 'Hoy',
     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
     dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
     dayNamesMin: ['D','L','M','X','J','V','S'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     yearSuffix: '',
     showAnim: "fadeIn"
 });
