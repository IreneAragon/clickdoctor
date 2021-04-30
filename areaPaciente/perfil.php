<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_SESSION)) {
    session_start();
}

include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';

$idPaciente = $_SESSION['idUsuario'];
$datosPaciente = DB::datosPaciente($idPaciente);
$nombreApellidos = $datosPaciente['nombre'].' '.$datosPaciente['apellidos'];
$dni = $datosPaciente['dni'];
$email = $datosPaciente['email'];
$fNac = $datosPaciente['f_nacimiento'];
$srcImgPerfil = 'perfil/'.$datosPaciente['srcImg'];
$exp = explode('-', $fNac);
$fNacDDMMYYY = $exp[2].'-'.$exp[1].'-'.$exp[0];

?>

<div class="container mt-5 d-flex justify-content-center">
    <div class="col-lg-4 col-sm-12 text-center mt-5">
        <div class="text-center">
            <img src="<?php echo $srcImgPerfil; ?>" class="avatar mt-5" alt="avatar">
        </div>
        <div class="text-center mt-5">
            <h5><?php isset($nombreApellidos) ? print $nombreApellidos : ''; ?></h5>
            <p><?php isset($dni) ? print $dni : ''; ?></p>
            <p><?php isset($fNacDDMMYYY) ? print $fNacDDMMYYY : ''; ?></p>
            <p><?php isset($email) ? print $email : ''; ?></p>
        </div>
        <br>
        <a id="btnEditarPerfil" name="btnEditarPerfil" class="btn btn-info" href="editarPerfil.php" role="button">EDITAR PERFIL</a>
    </div>
</div>

<?php
include_once '../include/footer.html';
?>
