<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}

include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';

$idPaciente = $_SESSION['idUsuario'];
$datosPaciente = DB::datosPaciente($idPaciente);
// $nombreApellidos = $datosPaciente['nombre'].' '.$datosPaciente['apellidos'];
$nombre = $datosPaciente['nombre'];
$apellidos = $datosPaciente['apellidos'];
$dni = $datosPaciente['dni'];
$email = $datosPaciente['email'];
$fNac = $datosPaciente['f_nacimiento'];
$srcImgPerfil = 'perfil/'.$datosPaciente['srcImg'];
// var_dump('----x-xxx---',$srcImgPerfil);
$exp = explode('-', $fNac);
$fNacDDMMYYY = $exp[2].'-'.$exp[1].'-'.$exp[0];


?>

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
                   <img class="avatar pointer" id="img" src="<?php echo $srcImgPerfil; ?>">

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
    <form id="formEditarPerfil" class="p-4 formBackground" action="gestionaEditarPerfil.php" method="post">
      <div class="form-group">
        <!-- NOMBRE APELLIDOS -->
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <label for="editarNombre"><h6>Nombre</h6></label>
            <input type="text" class="form-control" name="editarNombre" id="editarNombre" placeholder="Nombre" title="Modifica tu nombre" value="<?php isset($nombre) ? print $nombre : ''; ?>">
          </div>
          <div class="col-sm-12 col-md-8">
            <label for="editarApellidos"><h6>Apellidos</h6></label>
            <input type="text" class="form-control" name="editarApellidos" id="editarApellidos" placeholder="Apellido Apellido" title="Modifica tu apellido" value="<?php isset($apellidos) ? print $apellidos : ''; ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <!-- EMAIL FECHA DE NACIMIENTO  -->
        <div class="row">
          <div class="col-sm-12 col-md-8">
              <!-- EMAIL -->
              <label for="editarEmail"><h6>Email</h6></label>
              <input type="email" class="form-control" name="editarEmail" id="editarEmail" placeholder="you@email.com" title="Modifica tu email" value="<?php isset($email) ? print $email : ''; ?>">
         </div>
          <div class="col-sm-12 col-md-4">
              <!-- FECHA DE NACIMIENTO -->
            <label for="editarApellidos"><h6>Fecha de Nacimiento</h6></label>
            <input type="date" class="form-control" name="editarFnac" id="editarFnac" title="Modifica tu fecha de nacimiento" value="<?php isset($fNac) ? print $fNac : ''; ?>">
          </div>
        </div>
      </div>

      <div class="form-group mb-5">
        <!-- CONTRASEÑA -->
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <label for="editarPassword"><h6>Cambia tu contraseña</h6></label>
            <input type="password" class="form-control" name="editarPassword" id="editarPassword" placeholder="******" title="Cambiar contraseña">
          </div>
          <div class="col-md-6 col-sm-12">
            <label for="editarPasswordRep"><h6>Confirma la contraseña</h6></label>
            <input type="password" class="form-control" name="editarPasswordRep" id="editarPasswordRep" placeholder="******" title="Confirma tu contraseña">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <!-- Botón para enviar consulta -->
        <button type="submit" id="btnGuardarPerfil" class="btn btn-info">Guardar Cambios</button>
      </div>
    </form>
</div>

<script type="text/javascript" src="perfil/js/imgPerfil.js"></script>
<script type="text/javascript" src="../sweetAlert/sweetalert2.all.min.js"></script>

<?php
include_once '../include/footer.html';
?>
