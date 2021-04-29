<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// require_once 'registroUsuario.php'
	require_once '../clases/claseDB.php';
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
		<!-- Asegura correcto visionado en dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Ayuda a mejor posicionamiento SEO -->
		<meta name="Description" content="Click Doctor, página de registro. ">
		<link rel="icon" href="../img/favicon.png" sizes="16x16" type="image/png">
        <title>CLICK DOCTOR</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
		<!-- JQuery -->
		<script src="../MDBootstrap/js/jquery.min.js"></script>
        <!-- Bootstrap y Material Design Bootstrap CSS -->
        <link href="../MDBootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../MDBootstrap/css/mdb.min.css" rel="stylesheet">
		<!-- Estilos y librerías necesarias para utilizar multiple select -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

		<!-- Estilos propios de css -->
        <link rel="stylesheet" type="text/css" href="../css/styleHome.css">
    </head>
    <body>
        <!-- Starts content -->
        <div class="container col-12 col-lg-6">
            <!-- Logo Click Doctor -->
			<a href="../index.php">
				<img src="../img/logo2.png" alt="Click Doctor logo" class="align-items-center sizeLogo mt-5 mt-lg-2">
			</a>
            <br><br>
            <!-- Formulario de Registro -->
			<!-- TODO: arreglar, pantalla 991px formulario demasiado grande -->
            <!-- <form class="p-5 formBackground" action="" method="post"> -->
                <p class="h4 mb-4">Crear cuenta</p>
                <div class="form-row mb-2">
                    <div class="col-12 col-lg-6 mb-2 mb-lg-0">
                        <!-- Nombre -->
                        <input type="text" id="regNombre" name="regNombre" class="form-control" placeholder="Nombre" value="<?php isset($nombre) ? print $nombre : ''; ?>">
                    </div>
                    <div class="col-12 col-lg-6">
                        <!-- Apellidos -->
                        <input type="text" id="regApellidos" name="regApellidos" class="form-control" placeholder="Apellidos" value="<?php isset($apellidos) ? print $apellidos : ''; ?>">
                    </div>
                </div>
                <!-- E-mail -->
                <input type="email" id="regEmail" name="regEmail" class="form-control mb-2" placeholder="E-mail" value="<?php isset($email) ? print $email : ''; ?>">
                <!-- Contraseña -->
                <input type="password" id="regPassword" name="regPassword" class="form-control" placeholder="Contraseña" value="<?php isset($contrasena) ? print $contrasena : ''; ?>">
                <small class="form-text text-muted mb-2">
                    Al menos 6 caracteres y 1 dígito
                </small>
                <!-- Repetir Contraseña -->
                <input type="password" id="regPasswordRep" name="regPasswordRep" class="form-control mb-2" placeholder="Repita contraseña" value="<?php isset($contrasenaRep) ? print $contrasenaRep : ''; ?>">
                <div class="form-row mb-7">
                    <div class="col col-12 col-lg-6">
                        <!-- DNI -->
                        <input type="text" id="regDni" name="regDni" class="form-control" placeholder="DNI" value="<?php isset($dni) ? print $dni : ''; ?>">
                        <small class="form-text text-muted mb-2">(Ej: 12345678N)</small>
                    </div>
                    <div class="col">
                        <!-- Fecha de nacimiento -->
                        <input type="date" id="regNacimiento" name="regNacimiento" class="form-control" value="<?php isset($fNacimiento) ? print $fNacimiento : ''; ?>">
                        <small class="form-text text-muted mb-2">Fecha de nacimiento</small>
                    </div>
                </div>

                <div class="form-row mb-7">
                    <div class="col">
                        <!-- Género -->
                        <p class="h6 mb-2">Género</p>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="mujer" name="gender" value="mujer" class="form-check-input" <?= isset($valueMujer) ?  $valueMujer : ''; ?> >
                            <label for="mujer" class="form-check-label mb-1">Mujer</label><br>
                            <input type="radio" id="hombre" name="gender" value="hombre" class="form-check-input" <?= isset($valueHombre) ?  $valueHombre : ''; ?> >
                            <label for="hombre" class="form-check-label mb-1">Hombre</label><br>
                            <input type="radio" id="otro" name="gender" value="otro" class="form-check-input" <?= isset($valueOtro) ?  $valueOtro : ''; ?> >
                            <label for="otro" class="form-check-label mb-1">Otro</label>
                        </div> <br>
                    </div>
                    <div class="col">
                        <!-- Tipo de usuario -->
                        <p class="h6 mb-2">Soy</p>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="paciente" name="rol" value="paciente" class="form-check-input" <?= isset($valuePaciente) ?  $valuePaciente : ''; ?>>
                            <label for="paciente" class="form-check-label mb-1">Paciente</label><br>
                            <input type="radio" id="profesional" name="rol" value="profesional" class="form-check-input" <?= isset($valueProfesional) ?  $valueProfesional : ''; ?>>
                            <label for="profesional" class="form-check-label mb-1">Profesional sanitario</label>
                        </div>
                    </div>
                </div>

                <!-- Los siguientes inputs permanecerán inhabilitados mientras el usuario no se identifique como profesional sanitario-->
				<div id="datosProfesional">
					<div class="form-row mb-7">
						<div class="col col-12 col-lg-6 mb-2">
							<!-- Número de colegiado -->
							<input type="text" id="regNcolegiado" name="regNcolegiado" class="form-control" placeholder="Número de colegiado" value="<?php isset($nColegiado) ? print $nColegiado : ''; ?>">
						</div>
						<div class="col">
							<!-- Lugar de trabajo -->
							<input type="text" id="regEjerce" name="regEjerce" class="form-control" placeholder="Lugar de trabajo" value="<?php isset($ejerce) ? print $ejerce : ''; ?>">
							<small class="form-text text-muted mb-2">Nombre de hospital o clínica</small>
						</div>
					</div>
					<div class="form-row">
						<div class="col-xl-12">                                                 
							<!-- Especialidad -->
							<select id="regEspecialidades" name="regEspecialidades" class="mul-select w-100 h-100 form-control" multiple="true">
								<!-- Options cargadas desde la base de datos -->
								<?php
									$especialidades = DB::especialidades();
									foreach ($especialidades as $especialidad) {
										echo '<option name="regEspecialidadess" value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
									}
								?>

							</select>
						</div>
					</div>
				</div>
                <!-- Muestra los mensajes de error o de éxito en caso de haberlos -->
                <div class="alert-danger text-center m-3" id="msgErrorReg"></div>
                <div class="alert-success text-center m-3" id="msgExitoReg"></div>
    
                <!-- Botón de registro -->
				<input type="submit" id="submitReg" name="submitReg" value="REGISTRAR" class="btn btn-info my-4 btn-block">
                <!-- <button class="btn btn-info my-4 btn-block" type="submit">REGISTRAR</button> -->
				<!-- Muestra los mensajes de error en caso de haberlos -->
				<!-- <div class="mensajeError">
					<?php
					// TODO: Arreglar --> aunque haya varios errores solo muestra el primero
						// if(isset($mensajeError)){
						// 	echo ($mensajeError);
						// 	var_dump($mensajeError);
						// }
					?>
				</div> -->
				<hr>
                <!-- Terms of service -->
                <p> Haciendo click en <em>Registrar</em> acepta nuestros
                    <a href="../index.php" target="_blank">términos y condiciones del servicio</a>
                    y reconoce que ha leído nuestra
                    <a href="../index.php" target="_blank">política de privacidad</a>
                </p>
            <!-- </form> -->
            <!-- Default form register -->
        </div>
        <!-- Ends content -->

 <!-- if(isset($mensajeError)){
    echo $mensajeError;
    header('Location: registro.php'); // no para la ejecución a no ser que ponga return
    return;
 } -->




		<!-- Script muestra o no los inputs correspondientes según el tipo de paciente -->
		<!-- TODO llevar la función del multi select a un fichero .js externo -->
        <script src="../js/habilitarInput.js"></script>
        <script src="js/insertarNuevoUsuario.js" charset="utf-8"></script>

		<script>
			$(document).ready(function(){
				$(".mul-select").select2({
						placeholder: "Elija una o varias especialidades",
						tags: true,
						tokenSeparators: ['/',',',';'," "]
					});
				})
		</script>


    </body>
</html>
