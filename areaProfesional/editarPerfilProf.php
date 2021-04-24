<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';

$idProfesional = $_SESSION['idUsuario'];

?>

<!-- TODO: falta input DNI -->
<div class="container mt-5">
    <!-- Muestra los mensajes de error o de éxito en caso de haberlos -->
    <div class="alert-danger mt-5 text-center">
      <?php
        if(isset($msgError)){
          echo $msgError;
        }
      ?>
    </div>
    <div class="alert-success text-center">
      <?php
        if(isset($msgExito)){
          echo $msgExito;
        }

      ?>
    </div>
</div>

<div class="container d-flex justify-content-center">
    <div class="col-lg-4 col-sm-12 text-center">
        <h4 class="m-4">Modifica tu imagen de perfil</h4>
        <div class="row text-center">
            <div id="content" class="col-lg-12">
                <form method="post" action="#" enctype="multipart/form-data">
                    <!-- IMG -->
                   <img class="avatar pointer" id="img" src="">
                    <div class="form-group text-center">
                        <input type="file" class="form-control-file fileInput text-center" name="image" id="image">
                    </div>
                    <small class="form-text text-muted">Haz click en la imagen para cambiarla</small>
                    <input type="button" class="btn btn-primary upload" value="Previsualizar">
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <h4 class="m-4">Modifica tus datos</h4>
    <!-- Formulario de edición -->
    <form id="formEditarPerfilProf" class="p-4 formBackground" action="#" method="post">
      <div class="form-group">
        <!-- NOMBRE APELLIDOS -->
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <label for="editarNombreProf"><h6>Nombre</h6></label>
            <input type="text" class="form-control" name="editarNombreProf" id="editarNombreProf" placeholder="Nombre" title="Modifica tu nombre" value="">
          </div>
          <div class="col-sm-12 col-md-8">
            <label for="editarApellidosProf"><h6>Apellidos</h6></label>
            <input type="text" class="form-control" name="editarApellidosProf" id="editarApellidosProf" placeholder="Apellido Apellido" title="Modifica tu apellido" value="">
          </div>
        </div>
      </div>
      <div class="form-group">
        <!-- EMAIL FECHA DE NACIMIENTO  -->
        <div class="row">
          <div class="col-sm-12 col-md-8">
              <!-- EMAIL -->
              <label for="editarEmailProf"><h6>Email</h6></label>
              <input type="email" class="form-control" name="editarEmailProf" id="editarEmailProf" placeholder="you@email.com" title="Modifica tu email" value="">
         </div>
          <div class="col-sm-12 col-md-4">
              <!-- FECHA DE NACIMIENTO -->
            <label for="editarFnacProf"><h6>Fecha de Nacimiento</h6></label>
            <input type="date" class="form-control" name="editarFnacProf" id="editarFnacProf" title="Modifica tu fecha de nacimiento" value="">
          </div>
        </div>
      </div>


      <div class="form-group">
        <!-- N COLEGIADO ESPECIALIDADES  -->
        <div class="row">
          <div class="col-sm-12 col-md-6">
              <!-- N COLEGIADO -->
              <label for="editNcolegiado"><h6>Número de colegiado</h6></label>
              <input type="number" class="form-control" name="editNcolegiado" id="editNcolegiado" placeholder="123456789" title="Modifica tu número de colegiado" value="">
         </div>
          <div class="col-sm-12 col-md-6">
              <!-- ESPECIALIDADES -->
            <label for="editarEspecialidades"><h6>Especialidades</h6></label>
            <select id="selectToEspecialidades" class="mul-select w-100 h-70 form-control mb-5" multiple="true">
                <!-- options cargadas desde ajax -->
            </select>
          </div>
        </div>
      </div>

      <div class="form-group mb-5">
        <!-- CONTRASEÑA -->
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <label for="editarPasswordProf"><h6>Cambia tu contraseña</h6></label>
            <input type="password" class="form-control" name="editarPasswordProf" id="editarPasswordProf" placeholder="******" title="Cambiar contraseña">
          </div>
          <div class="col-md-6 col-sm-12">
            <label for="editarPasswordRepProf"><h6>Confirma la contraseña</h6></label>
            <input type="password" class="form-control" name="editarPasswordRepProf" id="editarPasswordRepProf" placeholder="******" title="Confirma tu contraseña">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <!-- Botón para enviar consulta -->
        <button type="submit" id="btnGuardarPerfilProf" class="btn btn-info">Guardar Cambios</button>
      </div>
    </form>
    <input type="hidden" id="idProf" name="idProf" value="<?=$idProfesional?>">
</div>

<script src="js/obtenerDatosPerfilProfesional.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
?>
