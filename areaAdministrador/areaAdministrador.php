<?php
include_once '../include/cabeceraAdmins.html';
include_once '../include/navAdministrador.php';

?>

<div class="container mt-5">

    <div class="mt-5 text-center">
        <h2> Bienvenido Administrador </h2>
    </div>

    <div id="msgActiveUsu" class="alert alert-info mt-4 text-center" role="alert">
        <h5>Tienes usuarios nuevos a los que dar de alta</h5>
    </div>

    <div id="msgNoActiveUsu"class="alert alert-success mt-4 text-center" role="alert">
        <h5>No tienes usuarios nuevos a los que dar de alta</h5>
    </div>

    <div class="tablaActivarUsuarios">
    <table id="tablaUsuariosNoActivos" class="table table-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">DNI</th>
                <th scope="col">Rol</th>
                <th scope="col">Activar</th>
            </tr>
        </thead>
        <tbody id="listaUsuariosNoActivados">
            <!-- tr obtenidas por ajax -->
        </tbody>
    </table>
    </div>

    <div id="msgExito" class="alert alert-success mt-2 text-center" role="alert">
        Usuario activado con éxito
    </div>

</div> 

<script src="js/activarUsuarios.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
?>
