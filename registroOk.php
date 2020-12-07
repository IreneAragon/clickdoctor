<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// require_once 'registroUsuario.php'
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
		<!-- Asegura correcto visionado en dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Ayuda a mejor posicionamiento SEO -->
		<meta name="Description" content="Click Doctor, página de registro. ">
		<link rel="icon" href="img/favicon.png" sizes="16x16" type="image/png">
        <title>CLICK DOCTOR</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="MDBootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="MDBootstrap/css/mdb.min.css" rel="stylesheet">
        <!-- Estilos propios de css -->
        <link rel="stylesheet" type="text/css" href="css/styleHome.css">
    </head>
    <body>
        <!-- Starts content -->
        <div class="container col-12 col-lg-6">
            <!-- Logo Click Doctor -->
			<a href="index.php">
				<img src="img/logo2.png" alt="Click Doctor logo" class="align-items-center sizeLogo mt-5 mt-lg-2">
			</a>
            <br><br>
            <div>

                <div class="alert alert-success" role="alert">
                  Te has registrado con éxito,<a href="index.php" class="alert-link"> haz login </a>para acceder a tu zona privada.
                </div>

                <!-- <hr> -->
                <!-- <h3 class="registroOK">Te has registrado con éxito, ya puedes acceder a tu perfil.</h3>
                <hr>
                <a href="index.php" class="btn btn-info btn-block"> LOGIN </a> -->
                <!-- <input type="submit" id="submit" name="submit" value="REGISTRAR" class="btn btn-info my-4 btn-block"> -->
            </div>
        </div>




        <!-- Ends content -->
    </body>
</html>
