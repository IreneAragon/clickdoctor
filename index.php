<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// include 'accesoUsuario.php';
	// require_once 'accesoUsuario.php';

	// $mensajeError = "";
	//
	// HOLIIII
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<!-- Asegura correcto visionado en dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Ayuda a mejor posicionamiento SEO -->
		<meta name="Description" content="Click Doctor, página de login o registro. ">
		<link rel="icon" href="img/favicon.png" sizes="16x16" type="image/png">
		<title>Click Doctor</title>
		<!-- Estilos CSS necesarios para Bootstrap y MDB -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
		<link href="MDBootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="MDBootstrap/css/mdb.min.css" rel="stylesheet">
		<!-- Estilos propios de css -->
		<link rel="stylesheet" type="text/css" href="css/styleHome.css">
	</head>
	<body>
		<!-- CONTENIDO -->
		<div class="view full-page-intro">
			<div class="mask d-flex justify-content-center align-items-center">
				<!-- CONTAINER -->
				<div class="container">
					<div class="row wow fadeIn">
						<a href="index.php">
							<img src="img/logo2.png" alt="Click Doctor logo" class="align-items-center sizeLogo">
						</a>
						<!-- Primera columna [IMAGEN] -->
						<div class="col-md-6 mb-4 justify-content-center">
							<img src="img/OnlineDoctor.png" alt="Online Doctor image" class="sizeDoctor">
						</div>
						<!-- Segunda columna [FORMULARIO] -->
						<div class="col-md-6 col-xl-5 mb-4">
							<form class="text-center" action="accesoUsuario.php" method="post">
								<br>
								<div class="card">
									<h5 class="card-header grey-text text-center py-4">
									<strong>Accede</strong>
									</h5>
									<!-- Inputs -->
									<div class="card-body px-lg-5 pt-0">
										<div class="md-form">
											<input type="email" id="loginEmail" name="loginEmail" class="form-control" placeholder="E-mail" value="<?php isset($email) ? print $email : ''; ?>">
										</div>
										<div class="md-form">
											<input type="password" id="loginContrasena" name="loginContrasena" class="form-control" placeholder="Contraseña" value="<?php isset($contrasena) ? print $contrasena : ''; ?>">
										</div>
										<!-- Muestra los mensajes de error en caso de haberlos -->
										<div class="alert-danger">
											<?php
												if(isset($mensajeError)){
													echo $mensajeError;
												}
											?>
										</div>
										<br>
										<div class="d-flex justify-content-around">
											<a href="#">¿Olvidaste tu contraseña?</a>
										</div>
										<button id="entrar" name="entrar" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Entrar</button>
										<p>
											¿No tienes cuenta?
											<a href="registro.php">Regístrate</a>
										</p>
									</div>
								</div>
							</form>
						</div> <!-- /formulario -->
					</div>
				</div> <!-- /container -->
			</div>
		</div> <!-- /contenido -->

		<!-- SCRIPTS -->
	    <!-- Propios -->
	    <script defer type="text/javascript" src="js/navegador.js"></script>
	    <!-- JQuery -->
	    <script defer type="text/javascript" src="MDBootstrap/js/jquery.min.js"></script>
	    <!-- Bootstrap tooltips -->
	    <script defer type="text/javascript" src="MDBootstrap/js/popper.min.js"></script>
	    <!-- Bootstrap core JavaScript -->
	    <script defer type="text/javascript" src="MDBootstrap/js/bootstrap.min.js"></script>
	    <!-- MDB core JavaScript -->
	    <script defer type="text/javascript" src="MDBootstrap/js/mdb.min.js"></script>
	</body>
</html>
