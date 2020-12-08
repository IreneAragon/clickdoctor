// TODO: mover esta función a crearCita.js ¿?
// Muestra una alerta de éxito cuando la cita haya sito creada
    $(document).ready(function(){
        $("#btnCrearCita").on( "click", function() {
            $("#citaCreada").show("fast"); //muestro mediante id
         });
    });
