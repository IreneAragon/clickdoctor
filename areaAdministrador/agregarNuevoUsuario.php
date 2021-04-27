<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once '../include/cabeceraAdmins.html';
include_once '../include/navAdministrador.php';

if (!isset($_SESSION)) {
    session_start();
}

require_once '../clases/claseDB.php';

?>

<div class="container mt-5">
    
    <p class="h4 mb-4 mt-5">Crear nuevo usuario</p>
    <div class="form-row mb-2">
        <div class="col-12 col-lg-6 mb-2 mb-lg-0">
            <!-- Nombre -->
            <input type="text" id="NuevoUsuarioNombre" name="NuevoUsuarioNombre" class="form-control" placeholder="Nombre" value="<?php isset($nombre) ? print $nombre : ''; ?>">
        </div>
        <div class="col-12 col-lg-6">
            <!-- Apellidos -->
            <input type="text" id="NuevoUsuarioApellidos" name="NuevoUsuarioApellidos" class="form-control" placeholder="Apellidos" value="<?php isset($apellidos) ? print $apellidos : ''; ?>">
        </div>
    </div>
    <!-- E-mail -->
    <input type="email" id="NuevoUsuarioEmail" name="NuevoUsuarioEmail" class="form-control mb-2" placeholder="E-mail" value="<?php isset($email) ? print $email : ''; ?>">
    <!-- Contraseña -->
    <input type="password" id="NuevoUsuarioPassword" name="NuevoUsuarioPassword" class="form-control" placeholder="Contraseña" value="<?php isset($contrasena) ? print $contrasena : ''; ?>">
    <small class="form-text text-muted mb-2">
        Al menos 6 caracteres, mayúsculas y minúsculas y 1 dígito
    </small>
    <!-- Repetir Contraseña -->
    <input type="password" id="NuevoUsuarioPasswordRep" name="NuevoUsuarioPasswordRep" class="form-control mb-2" placeholder="Repite la contraseña" value="<?php isset($contrasenaRep) ? print $contrasenaRep : ''; ?>">
    <div class="form-row mb-7">
        <div class="col col-12 col-lg-6">
            <!-- DNI -->
            <input type="text" id="NuevoUsuarioDni" name="NuevoUsuarioDni" class="form-control" placeholder="DNI" value="<?php isset($dni) ? print $dni : ''; ?>">
            <small class="form-text text-muted mb-2">(Ej: 12345678N)</small>
        </div>
        <div class="col">
            <!-- Fecha de nacimiento -->
            <input type="date" id="NuevoUsuarioNacimiento" name="NuevoUsuarioNacimiento" class="form-control" value="<?php isset($fNacimiento) ? print $fNacimiento : ''; ?>">
            <small class="form-text text-muted mb-2">Fecha de nacimiento</small>
        </div>
    </div>

    <div class="form-row mb-7">
        <div class="col">
            <!-- Género -->
            <p class="h6 mb-2">Género</p>
            <div class="custom-control custom-radio">
                <input type="radio" id="NuevoUsuarioMujer" name="gender" value="mujer" class="form-check-input" <?= isset($valueMujer) ?  $valueMujer : ''; ?> >
                <label for="mujer" class="form-check-label mb-1">Mujer</label><br>
                <input type="radio" id="NuevoUsuarioHombre" name="gender" value="hombre" class="form-check-input" <?= isset($valueHombre) ?  $valueHombre : ''; ?> >
                <label for="hombre" class="form-check-label mb-1">Hombre</label><br>
                <input type="radio" id="NuevoUsuarioOtro" name="gender" value="otro" class="form-check-input" <?= isset($valueOtro) ?  $valueOtro : ''; ?> >
                <label for="otro" class="form-check-label mb-1">Otro</label>
            </div> <br>
        </div>
        <div class="col">
            <!-- Tipo de usuario -->
            <p class="h6 mb-2">Rol</p>
            <div class="custom-control custom-radio">
                <input type="radio" id="RolNuevoUsuarioPaciente" name="rol" value="paciente" class="form-check-input" <?= isset($valuePaciente) ?  $valuePaciente : ''; ?>>
                <label for="paciente" class="form-check-label mb-1">Paciente</label><br>
                <input type="radio" id="RolNuevoUsuarioProfesional" name="rol" value="profesional" class="form-check-input" <?= isset($valueProfesional) ?  $valueProfesional : ''; ?>>
                <label for="profesional" class="form-check-label mb-1">Profesional sanitario</label>
            </div>
        </div>
    </div>

    <!-- Los siguientes inputs permanecerán inhabilitados mientras el usuario no se identifique como profesional sanitario-->
    <div id="NuevoUsuarioDatosProfesional">
        <div class="form-row mb-7">
            <div class="col col-12 col-lg-6 mb-2">
                <!-- Número de colegiado -->
                <input type="text" id="NuevoUsuarioNcolegiado" name="NuevoUsuarioNcolegiado" class="form-control" placeholder="Número de colegiado" value="<?php isset($nColegiado) ? print $nColegiado : ''; ?>">
            </div>
            <div class="col">
                <!-- Lugar de trabajo -->
                <input type="text" id="NuevoUsuarioEjerce" name="NuevoUsuarioEjerce" class="form-control" placeholder="Lugar de trabajo" value="<?php isset($ejerce) ? print $ejerce : ''; ?>">
                <small class="form-text text-muted mb-2">Nombre de hospital o clínica</small>
            </div>
        </div>
        <div class="form-row">
            <div class="col-xl-12">
                <!-- Especialidad -->
                <select class="mul-select w-100 h-100 form-control" multiple="true">
                    <!-- Options cargadas desde la base de datos -->
                    <?php
                        $especialidades = DB::especialidades();
                        foreach ($especialidades as $especialidad) {
                            echo '<option value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
                        }
                    ?>

                </select>
            </div>
        </div>
    </div>

    <!-- Botón de registro -->
    <input type="submit" id="NuevoUsuarioSubmit" name="NuevoUsuarioSubmit" value="GUARDAR" class="btn btn-info my-4 btn-block">
    <!-- <button class="btn btn-info my-4 btn-block" type="submit">REGISTRAR</button> -->
    <!-- Muestra los mensajes de error en caso de haberlos -->
    <div class="mensajeError">
        <?php
        // TODO: Arreglar --> aunque haya varios errores solo muestra el primero
            // if(isset($mensajeError)){
            //     echo ($mensajeError);
                // var_dump($mensajeError);
            // }
        ?>
    </div>
    <hr>
    <!-- Terms of service -->
    <!-- <p> Haciendo click en <em>Registrar</em> acepta nuestros
        <a href="../index.php" target="_blank">términos y condiciones del servicio</a>
        y reconoce que ha leído nuestra
        <a href="../index.php" target="_blank">política de privacidad</a>
    </p> -->




</div>

                







<!-- <script src="js/agregarNuevoUsuario.js" charset="utf-8"></script> -->
<!-- Script muestra o no los inputs correspondientes según el tipo de paciente -->
		<!-- TODO llevar la función del multi select a un fichero .js externo -->
        <script src="../js/habilitarInputAdmin.js"></script>
		<script>
			$(document).ready(function(){
				$(".mul-select").select2({
						placeholder: "Elige una o varias especialidades",
						tags: true,
						tokenSeparators: ['/',',',';'," "]
					});
				})
		</script>

<?php
include_once '../include/footer.html';
?>
