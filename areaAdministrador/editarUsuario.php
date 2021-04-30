<?php

include_once '../include/cabeceraAdmins.html';
include_once '../include/navAdministrador.php';

$rol = $_GET['rol'];
$id = $_GET['id'];

?>

<div class="container mt-5">
    <h4 class="mt-5 text-center">Modifica los datos</h4>
    <div class="form-group">
    <!-- NOMBRE APELLIDOS -->
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <label for="editarNombreAdmin"><h6>Nombre</h6></label>
                <input type="text" class="form-control" name="editarNombreAdmin" id="editarNombreAdmin" placeholder="Nombre" title="Modifica tu nombre" value="">
            </div>
            <div class="col-sm-12 col-md-8">
                <label for="editarApellidosAdmin"><h6>Apellidos</h6></label>
                <input type="text" class="form-control" name="editarApellidosAdmin" id="editarApellidosAdmin" placeholder="Apellido Apellido" title="Modifica tu apellido" value="">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <label for="editarEmailAdmin"><h6>Email</h6></label>
                <input type="email" class="form-control" name="editarEmailAdmin" id="editarEmailAdmin" placeholder="you@email.com" title="Modifica tu email" value="">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <label for="editarFnacAdmin"><h6>Fecha de Nacimiento</h6></label>
                <input type="date" class="form-control" name="editarFnacAdmin" id="editarFnacAdmin" title="Modifica tu fecha de nacimiento" value="">
            </div>
            <div id="formNCol" class="col-sm-12 col-md-6">
                <label for="editNcolegiadoAdmin"><h6>Número de colegiado</h6></label>
                <input type="number" class="form-control" name="editNcolegiadoAdmin" id="editNcolegiadoAdmin" placeholder="123456789" title="Modifica tu número de colegiado" value="">
            </div>
        </div>
    </div>

    <div  id="formEsp" class="form-group">
        <div class="col-12">
            <label for="editarEspecialidades"><h6>Especialidades</h6></label>
            <select id="selectToEspecialidadesAdmin" class="mul-select w-100 h-70 form-control mb-5" multiple="true">
            <!-- options cargadas desde ajax -->
            </select>
        </div>
    </div>

    <div class="container mt-3 mb-5">
        <!-- Muestra los mensajes de error o de éxito en caso de haberlos -->
        <div class="alert-danger text-center" id="msgErrorPerfilAdmin"></div>
        <div class="alert-success text-center" id="msgExitoPerfilAdmin"></div>
    </div>

    <div class="d-flex justify-content-center mb-3">
        <button type="submit" id="btnGuardarPerfilAdmin" class="btn btn-info">Guardar Cambios</button>
    </div>

    <input type="hidden" id="idUsuario" name="idUsuario" value="<?=$id?>">
    <input type="hidden" id="rolUsuario" name="rolUsuario" value="<?=$rol?>">


</div>

<script src="../js/multiselect.js"></script>
<script src="js/obtenerDatosPerfilUsuario.js" charset="utf-8"></script>
<script src="js/modificarPerfilUsuario.js" charset="utf-8"></script>

<?php
include_once '../include/footer.html';
?>
