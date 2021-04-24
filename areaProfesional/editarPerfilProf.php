<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia sesión solo si no lo está ya
// if (!isset($_SESSION)) {
//     session_start();
// }

include_once '../include/cabeceraProfesionales.html';
include_once '../include/navProfesionales.php';


$idProfesional = $_SESSION['idUsuario'];
$datosProfesional = DB::datosProfesional($idProfesional);
// $especialidades = DB::nombreEspecialidadesPracticaProf($idProfesional);

$nombre = $datosProfesional['nombre'];
$apellidos = $datosProfesional['apellidos'];
$dni = $datosProfesional['dni'];
$email = $datosProfesional['email'];
$fNac = $datosProfesional['f_nacimiento'];
$srcImgPerfil = 'perfil/'.$datosProfesional['srcImg'];
$n_colegiado = $datosProfesional['n_colegiado'];
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
    <form id="formEditarPerfilProf" class="p-4 formBackground" action="#" method="post">
      <div class="form-group">
        <!-- NOMBRE APELLIDOS -->
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <label for="editarNombreProf"><h6>Nombre</h6></label>
            <input type="text" class="form-control" name="editarNombreProf" id="editarNombreProf" placeholder="Nombre" title="Modifica tu nombre" value="<?php isset($nombre) ? print $nombre : ''; ?>">
          </div>
          <div class="col-sm-12 col-md-8">
            <label for="editarApellidosProf"><h6>Apellidos</h6></label>
            <input type="text" class="form-control" name="editarApellidosProf" id="editarApellidosProf" placeholder="Apellido Apellido" title="Modifica tu apellido" value="<?php isset($apellidos) ? print $apellidos : ''; ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <!-- EMAIL FECHA DE NACIMIENTO  -->
        <div class="row">
          <div class="col-sm-12 col-md-8">
              <!-- EMAIL -->
              <label for="editarEmailProf"><h6>Email</h6></label>
              <input type="email" class="form-control" name="editarEmailProf" id="editarEmailProf" placeholder="you@email.com" title="Modifica tu email" value="<?php isset($email) ? print $email : ''; ?>">
         </div>
          <div class="col-sm-12 col-md-4">
              <!-- FECHA DE NACIMIENTO -->
            <label for="editarFnacProf"><h6>Fecha de Nacimiento</h6></label>
            <input type="date" class="form-control" name="editarFnacProf" id="editarFnacProf" title="Modifica tu fecha de nacimiento" value="<?php isset($fNac) ? print $fNac : ''; ?>">
          </div>
        </div>
      </div>


      <div class="form-group">
        <!-- N COLEGIADO ESPECIALIDADES  -->
        <div class="row">
          <div class="col-sm-12 col-md-6">
              <!-- N COLEGIADO -->
              <label for="editNcolegiado"><h6>Número de colegiado</h6></label>
              <input type="number" class="form-control" name="editNcolegiado" id="editNcolegiado" placeholder="123456789" title="Modifica tu número de colegiado" value="<?php isset($n_colegiado) ? print $n_colegiado : ''; ?>">
         </div>
          <div class="col-sm-12 col-md-6">

              <!-- ESPECIALIDADES -->
            <label for="editarEspecialidades"><h6>Especialidades</h6></label>
            <select id="selectToEspecialidades" class="mul-select w-100 h-70 form-control mb-5" multiple="true">

                <?php
                // TODO: hola irene del futuro, busca la forma de listar las especialidades que ya tiene asignadas
                // el profesional, y además que sean editables, que se puedan quitar o agregar más y guardar esa
                // modificación en base de datos. Enga wapa, tú puede, muá!
                    $selectEspecialidades = DB::especialidades();
                    $especialidades = DB::nombreEspecialidadesPracticaProf($idProfesional);
                    foreach ($selectEspecialidades as $selectEspecialidad) {
                        echo '<option value="'.$selectEspecialidad['id_especialidad'].'">'.$selectEspecialidad['nombre'].'</option>';
                    }
                    //
                    // foreach ($especialidades as $especialidad) {
                    //     // echo '<option value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
                    //     // echo '<li class="select2-selection__choice" title="'.$especialidad['nombre'].'"><span class="select2-selection__choice__remove" role="presentation">×</span>'.$especialidad['nombre'].'</li>';
                    //     // echo '<li class="select2-selection__choice" title="'.$especialidad['nombre'].'"><span class="select2-selection__choice__remove" role="presentation">×</span>'.$especialidad['nombre'].'</li>';
                    // }


                ?>
            </select>
            <!-- <span class="select2 select2-container select2-container-default" dir="ltr" style="width: 462px;">
                <span class="selection">
                    <span class="select2-selection select2-selection-multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
                        <ul class="select2-selection__rendered">
                            <?php
                            // foreach ($especialidades as $especialidad) {
                            //     // echo '<option value="'.$especialidad['id_especialidad'].'">'.$especialidad['nombre'].'</option>';
                            //     // echo '<li class="select2-selection__choice" title="'.$especialidad['nombre'].'"><span class="select2-selection__choice__remove" role="presentation">×</span>'.$especialidad['nombre'].'</li>';
                            //     echo '<li class="select2-selection__choice" title="'.$especialidad['nombre'].'"><span class="select2-selection__choice__remove" role="presentation">×</span>'.$especialidad['nombre'].'</li>';
                            // }
                             ?>
                             <li class="select2-search select2-search-inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" placeholder="" style="width: 0.75em;"></li>
                        </ul>
                    </span>
                </span>
                <span class="dropdown-wrapper" aria-hidden="true"></span>
            </span> -->




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
</div>

















<script>

    // $('#selectToEspecialidades').select2('data', {id: '1', text: 'HOLA', selected: true});



    // $(document).ready(function(){
    //     $("#selectToEspecialidades").select2({
    //             placeholder: "Elija una o varias especialidades",
    //             tags: true,
    //             tokenSeparators: ['/',',',';'," "],
    //             results: [ {“id”: 0022,“text”: “Red”, selected: true},
    //                        {“id”: 0045,“text”: “Yellow”, selected: true},
    //                        {“id”: 0065,“text”: “Green”, selected: true}]
    //             // data: {id: '1', text: 'HOLA'}
    //         });
    //     })

        $(document).ready(function(){
            $("#selectToEspecialidades").select2({
                    placeholder: "Elija una o varias especialidades",
                    tags: true,
                    tokenSeparators: ['/',',',';'," "]
                });
            })
</script>
<?php
include_once '../include/footer.html';
?>
