<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';


?>
<div class="container pt-5">
    <div class="row">
        <div class="col">
            <h2 class="pt-5">Mis Informes</h2>
            <div class="container mt-5">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="listaInformesPaciente">
                        <!-- TODO: tr obtenidas por ajax  -->
                        <tr>
                            <td>21-04-2021</td>
                            <td>Alergología</td>
                            <td><a href="" data-idconversacion="" class="btn btn-info btn-sm btnStyle waves-effect waves-light">Ver <i class="fa fa-eye iconoOjo"></i></a></td>
                            <td><button type="button" data-idconversacion="" onclick="" class="btn btn-danger btn-sm btnStyle waves-effect waves-light" data-toggle="modal" data-target="#eliminarConversacion">Descargar <i class="fas fa-file-download iconoOjo"></i></i></button></td>
                        </tr>
                        <tr>
                            <td>23-04-2021</td>
                            <td>Medicina General</td>
                            <td><a href="" data-idconversacion="" class="btn btn-info btn-sm btnStyle waves-effect waves-light">Ver <i class="fa fa-eye iconoOjo"></i></a></td>
                            <td><button type="button" data-idconversacion="" onclick="" class="btn btn-danger btn-sm btnStyle waves-effect waves-light" data-toggle="modal" data-target="#eliminarConversacion">Descargar <i class="fas fa-file-download iconoOjo"></i></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../include/footer.html';
?>
