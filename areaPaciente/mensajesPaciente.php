<?php
include_once '../include/cabeceraUsuarios.html';
include_once '../include/navPacientes.php';
?>

<div class="container pt-5">
    <div class="row">
        <div class="col">
            <h2 class="pt-5">MENSAJES</h2>

            <a href="nuevaConversacion.php " class="btn btn-primary"> Crear nueva conversación </a>

            <div class="container mt-5 table-responsive">
                <!-- Se muestra cuando la conversación ha sido borrada -->
                <div id="msgEliminarConver" class="alert alert-success mt-5" role="alert">
                    Su conversación ha sido borrada con éxito.
                </div>
                <h3>Mis conversaciones</h3>
                <table class="table table-sm table-hover" id="x">
                    <thead>
                        <tr>
                            <th class="min-w" scope="col">Fecha</th>
                            <th class="min-w" scope="col">Profesional</th>
                            <th class="min-w" scope="col">Asunto</th>
                            <th class="min-w" scope="col">Abrir</th>
                            <th class="min-w" scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="listaConversacionesPaciente">
                        <!-- tr obtenidas por ajax en listarConversacionesPaciente.js -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal eliminar Conversación -->
    <div class="modal fade" id="eliminarConversacion" tabindex="-1" role="dialog" aria-labelledby="eliminarConversacionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarConversacionLabel">Eliminar conversación</h5>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">¿Seguro que desea eliminar la conversación?</h3>
                    <h6 class="text-center">Todos los mensajes se eliminarán y no podrán ser recuperados.</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">¡no!</button>
                    <button type="button" id="btnConfirmaEliminar" data-idConver="" class="btn btn-success">Sí, Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal -->

</div>


<script src="mensajeria/js/listarConversacionesPaciente.js" charset="utf-8"></script>
<?php
include_once '../include/footer.html';
?>
