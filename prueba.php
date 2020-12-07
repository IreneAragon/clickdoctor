<?php

// include connection
require 'clases/claseDB.php';


/**********************************************
*                                             *
*       PRUEBAS OBTENER NOMBRE SEGÚN ID       *
*                    OK                       *
***********************************************/
// $id_pac = 1;
// $nombreDePaciente = DB::getNombrePaciente($id_pac);
//
// var_dump($nombreDePaciente);
// echo "Holi " . $nombreDePaciente['nombre'];

/**********************************
*                                 *
*     PRUEBAS INSERTAR ADMIN      *
*                OK               *
***********************************/

// $email      =   'hola@mail.com';
// $nombre     =   'AdminCIN';
// $apellidos  =   'Apellido Apellido';
// $contrasenia =   'administrame';
//
// $insertaAd  =    DB::insertarAdmin($email, $nombre, $apellidos, $contrasenia);
// var_dump($insertaAd);
// echo "oki";

/**********************************************
*                                             *
*   PRUEBAS INSERTAR PACIENTE O PROFESIONAL   *
*                    OK                       *
***********************************************/

// $nombre         = 'test3';
// $apellidos      = 'test test';
// $email          = 'test@mail.com';
// $password       = '123456';
// $dni            = '12345678N';
// $fnac           = '2020-10-10';
// $genero         = 'mujer';
// $estado         = 0;
// // PROF
// $ncol           = 12345678;
// $ejerce         = 'Clínico';

// $regPaciente    = DB::insertarPaciente($nombre, $apellidos, $email, $password, $dni,
//                                        $fnac, $genero, $estado);

// $regProferional = DB::insertarProfesional($nombre, $apellidos, $email, $password, $dni, $fnac,
//                                            $genero, $estado, $ncol, $ejerce);


/***********************************
*                                  *
*   PRUEBAS CONOCER TIPO USUARIO   *
*               OK                 *
***********************************/

// $email = 'prof2@mail.com';
// $conocerTipoUsuario = DB::tipoUsuario($email);
// var_dump($conocerTipoUsuario);




/***********************************************
*                                              *
*   ALTERNATIVA VERIFICAR FOMULARIO COMPLETO   *
*                    OK                        *
***********************************************/
// Verifiación: ningún campo puede estar vacío
// if ($rol == 'paciente') {
//     $esPaciente = true;
//     if ($nombre === "" || $apellidos === "" || $email === "" || $contrasena === "" || $contrasenaRep === "" ||
//         $dni === "" || $fNacimiento === "" || $genero === "") {
//             $formularioCompleto = false;
//             $mensajeError = "Error: ningún campo del formulario puede estar vacío, por favor, rellene todos los datos.";
//             // include_once("registroUsuario.php");
//         }
// } else {
//     $esProfesional = true;
//     if ($nombre === "" || $apellidos === "" || $email === "" || $contrasena === "" || $contrasenaRep === "" ||
//         $dni === "" || $fNacimiento === "" || $genero === "" || $nColegiado === "" || $ejerce === "") {
//             $formularioCompleto = false;
//             $mensajeError = "Error: ningún campo del formulario puede estar vacío, por favor, rellene todos los datos.";
//             // include_once("registroUsuario.php");
//         }
// }


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
      <div class="row">
        Date formats: yyyy-mm-dd, yyyymmdd, dd-mm-yyyy, dd/mm/yyyy, ddmmyyyyy
      </div>
      <br />
        <div class="row">
            <div class='col-sm-3'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    $(function () {
var bindDatePicker = function() {
   $(".date").datetimepicker({
   format:'YYYY-MM-DD',
       icons: {
           time: "fa fa-clock-o",
           date: "fa fa-calendar",
           up: "fa fa-arrow-up",
           down: "fa fa-arrow-down"
       }
   }).find('input:first').on("blur",function () {
       // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
       // update the format if it's yyyy-mm-dd
       var date = parseDate($(this).val());

       if (! isValidDate(date)) {
           //create date based on momentjs (we have that)
           date = moment().format('YYYY-MM-DD');
       }

       $(this).val(date);
   });
}

var isValidDate = function(value, format) {
   format = format || false;
   // lets parse the date to the best of our knowledge
   if (format) {
       value = parseDate(value);
   }

   var timestamp = Date.parse(value);

   return isNaN(timestamp) == false;
}

var parseDate = function(value) {
   var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
   if (m)
       value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

   return value;
}

bindDatePicker();
});
    </script>

</body>
</html>
































<!--  -->
