<?php
// muestra errores php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once '../include/cabeceraAdmins.html';
include_once '../include/navAdministrador.php';

if (!isset($_SESSION)) {
    session_start();
}

// require_once '../clases/claseDB.php';

?>

<div class="container mt-5">

    <h2 class="text-center mt-5">Gestión de Usuarios</h2>
    
    <div class="d-flex justify-content-around flex-wrap">
        <!-- btn crear usuario -->
        <div class="d-flex justify-content-center  align-content-center m-3">
            <a href="agregarNuevoUsuario.php" id="btnAgregarUsuario" class='btn btn-info'>Añadir nuevo</a>
        </div>
        <!-- switch rol usuario -->
        <div class="f-flex justify-content-center align-content-center  m-4 pt-2">
            <div class="contenedorSwitch row d-flex justify-content-center flex-nowrap align-items-baseline">
                <p class="mr-3 align-items-center">Pacientes</p>
                <label class="switch align-items-center">
                    <input type="checkbox" id="switchAdmin">
                    <span class="slider round"></span>
                </label>
                <p class="ml-3 align-items-center">Profesionales</p>
            </div>
        </div>
    </div>
    
    <!-- tabla listar usuarios -->
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody id="listaUsuarios">
            <!-- tr obtenidas por ajax -->
        </tbody>
    </table>

    <!-- Modal eliminar usuarios -->
    <div class="modal fade" id="eliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="eliminarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarUsuarioLabel">Eliminar usuario</h5>
                </div>
                <div class="modal-body">
                    <h3>¿Seguro que deseas eliminar al usuario?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">¡no!</button>
                    <button type="button" id="btnConfirmaBorrarUsuario" class="btn btn-success">Sí, eliminar</button>
                </div>
            </div>
        </div>
    </div> <!-- /modal eliminar usuarios -->
    <!-- Se muestra cuando el usuario ha sido borrado -->
    <div id="msgBorradoUsuario" class="alert alert-success mt-5" role="alert">
        El usuario se ha eliminado con éxito. 
    </div>

















</div> <!-- end container -->














<script src="js/gestionarUsuarios.js" charset="utf-8"></script>

<?php
include_once '../include/footer.html';
?>
