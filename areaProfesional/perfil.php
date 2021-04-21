<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia sesión solo si no lo está ya
if (!isset($_SESSION)) {
    session_start();
}

include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';

$idProfesional = $_SESSION['idUsuario'];
$datosProfesional = DB::datosProfesional($idProfesional);
$especialidades = DB::nombreEspecialidadesPracticaProf($idProfesional);

$nombreApellidos = $datosProfesional['nombre'].' '.$datosProfesional['apellidos'];
$dni = $datosProfesional['dni'];
$email = $datosProfesional['email'];
$fNac = $datosProfesional['f_nacimiento'];
$srcImgPerfil = 'perfil/'.$datosProfesional['srcImg'];
$n_colegiado = $datosProfesional['n_colegiado'];
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
            <p><?php isset($email) ? print $email : ''; ?></p>
            <p><?php isset($dni) ? print $dni : ''; ?></p>
            <p><?php isset($fNacDDMMYYY) ? print $fNacDDMMYYY : ''; ?></p>
            <p><?php isset($n_colegiado) ? print $n_colegiado : ''; ?></p>
            <p>
                <?php
                foreach ($especialidades as $especialidad) {
                    $esp = $especialidad['nombre'];
                    isset($esp) ? print $esp.'<br>' : '';
                }
                 ?>
            </p>
        </div>
        <br>
        <a id="btnEditarPerfilProf" name="btnEditarPerfilProf" class="btn btn-info" href="editarPerfilProf.php" role="button">EDITAR PERFIL</a>
    </div>
</div>

<?php
include_once '../include/footer.html';
?>
