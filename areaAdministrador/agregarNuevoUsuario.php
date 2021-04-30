<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once '../include/cabeceraAdmins.html';
include_once '../include/navAdministrador.php';
require_once '../clases/claseDB.php';

?>

<div class="container mt-5">
    <p class="h4 mb-4 mt-5">Crear nuevo usuario</p>
    <div class="form-row mb-2">
        <div class="col-12 col-lg-6 mb-2 mb-lg-0">
            <!-- Nombre -->
            <input type="text" id="nuevoUsuarioNombre" name="nuevoUsuarioNombre" class="form-control" placeholder="Nombre" value="">
        </div>
        <div class="col-12 col-lg-6">
            <!-- Apellidos -->
            <input type="text" id="nuevoUsuarioApellidos" name="nuevoUsuarioApellidos" class="form-control" placeholder="Apellidos" value="">
        </div>
    </div>
    <!-- E-mail -->
    <input type="email" id="nuevoUsuarioEmail" name="nuevoUsuarioEmail" class="form-control mb-2" placeholder="E-mail" value="">
    <!-- Contraseña -->
    <input type="password" id="nuevoUsuarioPassword" name="nuevoUsuarioPassword" class="form-control" placeholder="Contraseña" value="">
    <small class="form-text text-muted mb-2">
        Al menos 6 caracteres, mayúsculas y minúsculas y 1 dígito
    </small>
    <!-- Repetir Contraseña -->
    <input type="password" id="nuevoUsuarioPasswordRep" name="nuevoUsuarioPasswordRep" class="form-control mb-2" placeholder="Repite la contraseña" value="">
    <div class="form-row mb-7">
        <div class="col col-12 col-lg-6">
            <!-- DNI -->
            <input type="text" id="nuevoUsuarioDni" name="nuevoUsuarioDni" class="form-control" placeholder="DNI" value="">
            <small class="form-text text-muted mb-2">(Ej: 12345678N)</small>
        </div>
        <div class="col">
            <!-- Fecha de nacimiento -->
            <input type="date" id="nuevoUsuarioNacimiento" name="nuevoUsuarioNacimiento" class="form-control" value="">
            <small class="form-text text-muted mb-2">Fecha de nacimiento</small>
        </div>
    </div>

    <div class="form-row mb-7">
        <div class="col">
            <!-- Género -->
            <p class="h6 mb-2">Género</p>
            <div class="custom-control custom-radio">
                <input type="radio" id="nuevoUsuarioMujer" name="gender" value="mujer" class="form-check-input">
                <label for="mujer" class="form-check-label mb-1">Mujer</label><br>
                <input type="radio" id="nuevoUsuarioHombre" name="gender" value="hombre" class="form-check-input">
                <label for="hombre" class="form-check-label mb-1">Hombre</label><br>
                <input type="radio" id="nuevoUsuarioOtro" name="gender" value="otro" class="form-check-input">
                <label for="otro" class="form-check-label mb-1">Otro</label>
            </div> <br>
        </div>
        <div class="col">
            <!-- Tipo de usuario -->
            <p class="h6 mb-2">Rol</p>
            <div class="custom-control custom-radio">
                <input type="radio" id="rolNuevoUsuarioPaciente" name="rol" value="paciente" class="form-check-input">
                <label for="paciente" class="form-check-label mb-1">Paciente</label><br>
                <input type="radio" id="rolNuevoUsuarioProfesional" name="rol" value="profesional" class="form-check-input">
                <label for="profesional" class="form-check-label mb-1">Profesional sanitario</label>
            </div>
        </div>
    </div>

    <!-- Los siguientes inputs permanecerán inhabilitados mientras el usuario no se identifique como profesional sanitario-->
    <div id="nuevoUsuarioDatosProfesional">
        <div class="form-row mb-7">
            <div class="col col-12 col-lg-6 mb-2">
                <!-- Número de colegiado -->
                <input type="text" id="nuevoUsuarioNcolegiado" name="nuevoUsuarioNcolegiado" class="form-control" placeholder="Número de colegiado" value="">
            </div>
            <div class="col">
                <!-- Lugar de trabajo -->
                <input type="text" id="nuevoUsuarioEjerce" name="nuevoUsuarioEjerce" class="form-control" placeholder="Lugar de trabajo" value="">
                <small class="form-text text-muted mb-2">Nombre de hospital o clínica</small>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-12 col-sm-6">
                <!-- Especialidad -->
                <select id="nuevoUsuarioEspecialidades" class="mul-select w-100 h-100 form-control" multiple="true">
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
    <input type="submit" id="nuevoUsuarioSubmit" name="nuevoUsuarioSubmit" value="GUARDAR" class="btn btn-info my-4 btn-block">

    <!-- Muestra los mensajes de error o de éxito en caso de haberlos -->
    <div class="alert-danger text-center m-3" id="msgErrorNuevoUsuario"></div>
    <div class="alert-success text-center m-3" id="msgExitoNuevoUsuario"></div>

</div>

<script src="../js/habilitarInputAdmin.js"></script>
<script src="../js/multiselect.js"></script>
<script src="js/agregarNuevoUsuario.js" charset="utf-8"></script>

<?php
include_once '../include/footer.html';
?>
